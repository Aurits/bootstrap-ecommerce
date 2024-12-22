<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sku',
        'category',
        'price',
        'stock',
        'description',
        'is_featured',
        'image',
    ];

    public function getImageUrlAttribute()
    {
        return $this->image ? Storage::url($this->image) : 'https://via.placeholder.com/600';
    }
}
