<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Childrencategory extends Model
{
    use HasFactory;
    public function products(): MorphMany
    {
        return $this->morphMany(Product::class, 'productable');
    }
}
