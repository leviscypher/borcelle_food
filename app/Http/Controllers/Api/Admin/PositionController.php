<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PositionRequest;
use App\Models\Admin\Position;


class PositionController extends Controller
{
    public function index()
    {
        $data = Position::all();
        return response()->json(['data' => $data], 200);
    }

    public function create(PositionRequest $request)
    {
        try {
            Position::create([
                'name' => $request->name
            ]);

            return response()->json(['message' => $this->addSuccess], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => $this->anUnspecifiedError], 404);
        }
    }

    public function delete($id)
    {
        try {

            $position_delete = Position::find($id);

            if (!$position_delete) {
                return response()->json(['message' => $this->doesNotExist], 404);
            }

            $position_delete->delete();

            return response()->json(['message' => $this->deleteSuccess], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $this->anUnspecifiedError], 404);
        }
    }
}
