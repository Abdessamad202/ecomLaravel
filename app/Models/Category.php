<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    protected $fillable = [
        "id",
        "name",
        "description",
    ];
    public function products()
    {
        return $this->hasMany(Product::class);  // Assuming 'Product' is the related model
    }
}
