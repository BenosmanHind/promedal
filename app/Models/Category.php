<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Category extends Model
{
    use HasFactory;
    public function childrenCategories(){
        return $this->hasMany(Childrencategory::class);
    }

    public function products(): MorphMany
    {
        return $this->morphMany(Product::class, 'productable')->orderBy('flag', 'asc');
    }
}
