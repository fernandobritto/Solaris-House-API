<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [ 'categ_id',
        'name', 'description', 'price',
        'status', 'validate', 'slug'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
