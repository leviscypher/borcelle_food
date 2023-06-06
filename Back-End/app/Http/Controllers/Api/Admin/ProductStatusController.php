<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductStatus;
use Illuminate\Http\Response;

class ProductStatusController extends Controller
{
    public function index()
    {
        $data = ProductStatus::all();
        return response()->json($data, Response::HTTP_OK);
    }
}
