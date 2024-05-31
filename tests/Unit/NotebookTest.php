<?php

namespace Unit;

use App\Models\Notebook;
use Faker\Factory as FakerFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NotebookTest extends TestCase
{
    private $faker;

    public function setUp(): void
    {
        parent::setUp();
        $this->faker = FakerFactory::create();
    }

    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    use RefreshDatabase;

    /** @test  */
    public function test_get_all()
    {
        $notebooks = Notebook::factory()->count(3)->create();
        foreach ($notebooks as $notebook) {
            var_dump($notebook->toArray());
        }

        $response = $this->get('/api/v1/notebook');
        $response->assertStatus(200);
    }

    public function test_create_notebook()
    {
        $notebookData = [
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->firstNameMale,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
        ];

        $response = $this->post('/api/v1/notebook', $notebookData);
        $response->assertStatus(200);
        $response->assertJson($notebookData);
    }

    public function test_get_notebook_by_id()
    {
        $notebook = Notebook::factory()->create();
        $response = $this->get('/api/v1/notebook/' . $notebook->id);
        $response->assertStatus(200);
        $response->assertJson($notebook->toArray());
    }

    public function test_update_notebook()
    {
        $notebook = Notebook::factory()->create();

        $updatedData = [
            'first_name' => $this->faker->name,
        ];

        $response = $this->post('/api/v1/notebook/' . $notebook->id, $updatedData);
        $response->assertStatus(200);
        $response->assertJson($updatedData);
    }

    public function test_delete_notebook()
    {
        $notebook = Notebook::factory()->create();
        $response = $this->delete('/api/v1/notebook/' . $notebook->id);
        $response->assertStatus(204);
        $this->assertDatabaseMissing('notebooks', ['id' => $notebook->id]);
    }
}
