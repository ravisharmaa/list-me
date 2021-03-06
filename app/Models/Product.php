<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, Searchable;

    protected $guarded = [];

    protected $appends = ['category_name'];

    protected $hidden = ['category'];

    protected $casts = [
    	'is_new' => 'boolean',
    	'in_stock' => 'boolean'
    ];

    // fire event whenver a product is created, by supplier
    // to notify system admin that a product has been created, to 
    // remove duplicates if needed.

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getCategoryNameAttribute() {
        return $this->category->name;
    }

    public function suppliers() {
        return $this->belongsToMany(Supplier::class);
    }
}
