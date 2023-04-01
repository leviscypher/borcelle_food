<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Categories;
use App\Http\Requests\CategoriesRequest;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return response()->json(['data' => $categories], 200);
    }

    public function create(CategoriesRequest $request)
    {
        try {
            Categories::create([
                'name' => $request->name
            ]);

            return response()->json(['message' => $this->addSuccess], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => $this->anUnspecifiedError], 404);
        }
    }

    public function edit($id)
    {
        try {
            $category_edit = Categories::find($id);
            if (!$category_edit) {
                return response()->json(['message' => $this->doesNotExist], 404);
            }
            return response()->json($category_edit, 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $this->anUnspecifiedError], 404);
        }
    }

    public function update(CategoriesRequest $request, $id)
    {
        try {
            DB::table('categories')->where('id', $id)->update(['name' => $request->name]);
            return response()->json(['message' => $this->updateSuccess], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $this->anUnspecifiedError], 404);
        }
    }

    public function delete($id)
    {
        try {
            $category_delete = Categories::find($id);

            if (!$category_delete) {
                return response()->json(['message' => $this->doesNotExist], 404);
            }

            $category_delete->delete();
            return response()->json(['message' => $this->deleteSuccess], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $this->anUnspecifiedError], 404);
        }
    }
}
