<?php

namespace Database\Seeders;

use App\Models\Notebook;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class NotebookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            Notebook::factory()->count(10)->create();
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
