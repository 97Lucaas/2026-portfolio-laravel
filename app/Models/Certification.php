<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'logo',
        'short_description',
        'obtained_at',
        'external_url',
    ];

    protected $casts = [
        'obtained_at' => 'date',
    ];
}