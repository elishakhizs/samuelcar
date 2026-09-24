<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image',
        'is_active',
    ];

    public function media()
    {
        return $this->hasMany(Media::class);
    }
    protected $casts = [
    'price' => 'float',
    'stock' => 'integer', // 🔥 IMPORTANT
    ];
}
