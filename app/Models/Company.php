<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_numbers',
        'addresses',
        // Add other fillable fields as needed.
    ];

    protected $casts = [
        'phone_numbers' => 'array',
        'addresses' => 'array',
    ];
}
