<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Response;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;



class CustomerProductController extends Controller
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index() 
    {
        $product = $this->product->paginate($this->itemsPerPage);
        $productResouce = ProductResource::collection($product);
        $pagination = $this->getPagination($productResouce, $product);
        return response()->json($pagination, Response::HTTP_OK);
    }

    public function getProduct($id) {
        $product = $this->product->find($id);
        $productResouce = new ProductResource($product);
        return response()->json($productResouce, Response::HTTP_OK);
    }
}
