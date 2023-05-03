<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Http\Requests\CategoriesRequest;
use App\Http\Resources\CategoriesResource;
use Illuminate\Http\Response;


class CategoriesController extends Controller
{

    protected $categories;

    public function __construct(Categories $categories)
    {
        $this->categories = $categories;
    }

    public function index()
    {
        $categories = $this->categories->all();
        $categoriesResouce = CategoriesResource::collection($categories);
        return response()->json($categoriesResouce, Response::HTTP_OK);
    }

    public function create(CategoriesRequest $request)
    {
        try {
            $this->categories->name = $request->name;
            $this->categories->save();
            return response()->json($this->message($this->addSuccess), Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function edit($id)
    {
        try {
            $category = Categories::find($id);
            if (!$category) {
                return response()->json($this->message($this->doesNotExist), Response::HTTP_NOT_FOUND);
            }
            return response()->json($category, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(CategoriesRequest $request, $id)
    {
       try {
            $category = $this->categories->find($id);
            if(!$category) {
                return response()->json($this->message($this->doesNotExist), Response::HTTP_NOT_FOUND);
            }
            $category->name = $request->name;
            $category->save();
            return response()->json($this->message($this->updateSuccess), Response::HTTP_OK);
       } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_INTERNAL_SERVER_ERROR);
       }

    }

    public function delete($id)
    {
        try {
            $category = $this->categories->find($id);;
            if (!$category) {
                return response()->json($this->message($this->doesNotExist), Response::HTTP_NOT_FOUND);
            }
            $category->delete();
            return response()->json($this->message($this->deleteSuccess), Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
