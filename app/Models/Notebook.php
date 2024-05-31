<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notebook extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'company_name',
        'phone',
        'email',
        'birth_date',
        'image_id',
    ];

    public function image() : BelongsTo
    {
        return $this->belongsTo(Image::class, 'image_id');
    }
}
