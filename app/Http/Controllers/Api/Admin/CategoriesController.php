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
        Categories::create([
            'name' => $request->name
        ]);

        return response()->json(['message' => 'thêm thành công'], 201);
    }

    public function edit($id)
    {
        $category_edit = Categories::find($id);

        if (!$category_edit) {
            return response()->json(['message' => 'danh mục này không tồn tại'], 404);
        }

        return response()->json($category_edit, 200);
    }

    public function update(CategoriesRequest $request, $id)
    {
        DB::table('categories')->where('id', $id)->update(['name' => $request->name]);
        return response()->json(['message' => 'cập nhật thành công'], 200);
    }

    public function delete($id)
    {
        $category_delete = Categories::find($id);

        if (!$category_delete) {
            return response()->json(['message' => 'không có danh mục cần xóa'], 404);
        }

        $category_delete->delete();
        return response()->json(['message' => 'xóa thành công'], 200);
    }
}
