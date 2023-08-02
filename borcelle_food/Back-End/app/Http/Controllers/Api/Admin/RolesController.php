<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use Illuminate\Http\Response;

class RolesController extends Controller
{
    public function index()
    {
        $data = Roles::all();
        return response()->json(['data' => $data], Response::HTTP_OK);
    }
}
