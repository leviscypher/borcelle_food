<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Http\Response;
use App\Http\Resources\CategoriesResource;



class CustomerCategoryController extends Controller
{

    protected $categories;

    public function __construct(Categories $categories)
    {
        $this->categories = $categories;
    }

    public function index() {
        $categories = $this->categories->all();
        $categoriesResouce = CategoriesResource::collection($categories);
        return response()->json($categoriesResouce, Response::HTTP_OK);
    }
}
