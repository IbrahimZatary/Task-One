<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function products()
    {
        // that mean each catgeory have many products  1-many 
        return $this->hasMany(Product::class);
    }

}
