<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Response;





class ProductsController extends Controller
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


    public function create(ProductRequest $request)
    {
       try {
            $data = $request->all();
            $image_path = $this->uploadImageDrive($request->image_path);
            $data['image_path'] = json_encode($image_path);
            $this->product->create($data);
            return response()->json($this->message($this->addSuccess), Response::HTTP_CREATED);
       } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_INTERNAL_SERVER_ERROR);
       }
    }

    public function edit($id)
    {
        try {
            $product_edit = $this->product->find($id);
            if (!$product_edit) {
                return response()->json($this->message($this->doesNotExist), Response::HTTP_NOT_FOUND);
            }
            $productResouce = new ProductResource($product_edit);
            return response()->json($productResouce, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        try {
            $product = $this->product->find($id);
            if(!$product) {
                return response()->json($this->message($this->doesNotExist), Response::HTTP_NOT_FOUND);
            }
            $data = $request->all();
            if($request->file('image_path')) {
                $images = $request->file('image_path');
                $image_path_new = $this->uploadImageDrive($images);
                $image_path_old = json_decode($product->image_path);
                $this->deleteImageDrive($image_path_old);
                $data['image_path'] = json_encode($image_path_new);
                $product->update($data);
            } else {
                $product->update($data);
            }
            return response()->json(['message' => $this->updateSuccess], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function delete($id)
    {
        try {
            $product_delete = Product::find($id);
            if (!$product_delete) {
                return response()->json($this->message($this->doesNotExist), Response::HTTP_NOT_FOUND);
            }
            $image_path = json_decode($product_delete->image_path);
            $this->deleteImageDrive($image_path);
            $product_delete->delete();
            return response()->json($this->message($this->deleteSuccess), Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
