<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryProductsController extends Controller
{
	// gets all of the related products for a category
	
    public function index(Category $category) 
    {
    	return $category->products()->get();
    }
}
