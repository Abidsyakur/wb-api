<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Nama tabel (opsional, jika nama tabel berbeda dari nama model)
    protected $table = 'products';

    // Kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'name', 
        'description', 
        'price', 
        'created_at', 
        'updated_at'
    ];

    // Kolom yang tidak boleh diisi (mass assignment)
    // protected $guarded = ['id'];
}