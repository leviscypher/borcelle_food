<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\ProductResource;
use App\Models\Product;


class SearchController extends Controller
{

    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function search($query) {
        $product = $this->product->where('name', 'like', '%'.$query.'%')->paginate($this->itemsPerPage);
        $productResouce = ProductResource::collection($product);
        $pagination = $this->getPagination($productResouce, $product);
        return response()->json($pagination, Response::HTTP_OK);
    }

    public function searchCategory($category_id) {
        $product = $this->product->where('categories_id', $category_id)->paginate($this->itemsPerPage);
        $productResouce = ProductResource::collection($product);
        $pagination = $this->getPagination($productResouce, $product);
        return response()->json($pagination, Response::HTTP_OK);
    }
}
