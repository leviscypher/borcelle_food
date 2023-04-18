<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Http\Requests\CategoriesRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        $datas = [];
        foreach($categories as $item) {
            $data = [
                'name' => $item->name,
                'image' => Storage::disk('google')->url(json_decode($item->image)),
            ];
            $datas[] = $data;
        }
        return response()->json(['data' => $datas], 200);
    }

    public function create(CategoriesRequest $request)
    {
        try {
            $images = $request->file('image');
            $image_path = $this->uploadImageDrive($images);
            Categories::create([
                'name' => $request->name,
                'image' => json_encode($image_path),
            ]);

            return response()->json($this->message($this->addSuccess), 201);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), 404);
        }
    }

    public function edit($id)
    {
        try {
            $category_edit = Categories::find($id);
            if (!$category_edit) {
                return response()->json($this->message($this->doesNotExist), 404);
            }
            return response()->json($category_edit, 200);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), 404);
        }
    }

    public function update(CategoriesRequest $request, $id)
    {
        try {
            $category_update = Categories::find($id);

            if(!$category_update) {
                return response()->json($this->message($this->doesNotExist), 404);
            }

            if($request->file('image')) {
                $images = $request->file('image');
                $image_path = $this->uploadImageDrive($images);
                $this->deleteImageDrive(json_decode($category_update->image));
                $category_update->image = json_encode($image_path);
                $category_update->save();
            }

            $category_update->name = $request->name;
            $category_update->save();

            return response()->json(['message' => $this->updateSuccess], 200);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), 404);
        }
    }

    public function delete($id)
    {
        try {
            $category_delete = Categories::find($id);

            if (!$category_delete) {
                return response()->json($this->message($this->doesNotExist), 404);
            }
            $this->deleteImageDrive(json_decode($category_delete->image));
            $category_delete->delete();
            return response()->json($this->message($this->deleteSuccess), 200);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), 404);
        }
    }
}
