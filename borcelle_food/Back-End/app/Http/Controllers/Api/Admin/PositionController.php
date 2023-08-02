<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PositionRequest;
use App\Models\Position;
use Illuminate\Http\Response;




class PositionController extends Controller
{
    public function index()
    {
        $data = Position::all();
        return response()->json(['data' => $data], Response::HTTP_OK);
    }

    public function create(PositionRequest $request)
    {
        try {
            Position::create([
                'name' => $request->name
            ]);

            return response()->json($this->message($this->addSuccess), Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_NOT_FOUND);
        }
    }

    public function delete($id)
    {
        try {
            $position = Position::find($id);
            if (!$position) {
                return response()->json($this->message($this->doesNotExist), Response::HTTP_NOT_FOUND);
            }
            $position->delete();
            return response()->json($this->message($this->deleteSuccess), Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_NOT_FOUND);
        }
    }
}
