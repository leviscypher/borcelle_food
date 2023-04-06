<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;




class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $product = Product::paginate($this->itemsPerPage);
        $datas = [];
        foreach ($product->items() as $list) {
            $image_path = json_decode($list->image_path);
            $image_url = [];
            foreach ($image_path as $item) {
                $url = Storage::disk('google')->url($item);
                $image_url[] = $url;
            }
            $data = [
                'id' => $list->id,
                'name' => $list->name,
                'price' => $list->price,
                'quantity' => $list->quantity,
                'description' => $list->description,
                'image_path' => $image_url,
                'categories_id' => $list->categories_id
            ];
            $datas[] = $data;
        }
        $pagination = $this->getPagination($datas, $product);
        return response()->json($pagination, 200);
    }


    public function create(ProductRequest $request)
    {
        try {
            $images = $request->file('image_path');
            $image_path = $this->uploadImageDrive($images);
            Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'image_path' => json_encode($image_path),
                'description' => $request->description,
                'quantity' => $request->quantity,
                'categories_id' => $request->categories_id
            ]);
            return response()->json(['message' => $this->addSuccess], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => $this->anUnspecifiedError], 404);
        }
    }

    public function edit($id)
    {
        try {
            $product_edit = Product::find($id);
            if (!$product_edit) {
                return response()->json(['message' => $this->doesNotExist], 404);
            }
            $image_path = json_decode($product_edit->image_path);
            $image_url = [];
            foreach ($image_path as $item) {
                $url = Storage::disk('google')->url($item);
                $image_url[] = $url;
            };

            $data = [
                'id' => $product_edit->id,
                'name' => $product_edit->name,
                'price' => $product_edit->price,
                'quantity' => $product_edit->quantity,
                'description' => $product_edit->description,
                'image_path' => $image_url,
                'categories_id' => $product_edit->categories_id
            ];

            return response()->json(['data' => $data], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $this->anUnspecifiedError], 404);
        }
    }

    public function update(ProductRequest $request, $id)
    {
        try {
            $product_update = Product::find($id);
            if (!$product_update) {
                return response()->json(['message' => $this->doesNotExist], 404);
            }

            $images = $request->file('image_path');
            $image_path_new = $this->uploadImageDrive($images);
            $image_path_old = json_decode($product_update->image_path);
            $this->deleteImageDrive($image_path_old);

            DB::table('product')->where('id', $id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'description' => $request->description,
                'image_path' => json_encode($image_path_new),
                'categories_id' => $request->categories_id ? $request->categories_id : $product_update->categories_id
            ]);

            return response()->json(['message' => $this->updateSuccess], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $this->anUnspecifiedError], 404);
        }
    }

    public function delete($id)
    {
        try {
            $product_delete = Product::find($id);

            if (!$product_delete) {
                return response()->json(['message' => $this->doesNotExist], 404);
            }
            $image_path = json_decode($product_delete->image_path);
            $this->deleteImageDrive($image_path);
            $product_delete->delete();
            return response()->json(['message' => $this->deleteSuccess], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $this->anUnspecifiedError], 404);
        }
    }
}
