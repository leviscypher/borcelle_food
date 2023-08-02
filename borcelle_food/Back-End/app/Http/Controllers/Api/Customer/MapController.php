<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\District;
use App\Models\Ward;
use Illuminate\Http\Response;

class MapController extends Controller
{
    public function getCity()
    {
        try {
            $city = City::all();
            return response()->json($city, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_NOT_FOUND);
        }
    }

    public function getDistricts($city_id)
    {
        try {
            $district = District::where('city_id', $city_id)->get();
            return response()->json($district, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_NOT_FOUND);
        }
    }

    public function getWards($district_id)
    {
        try {
            $ward = Ward::where('district_id', $district_id)->get();
            return response()->json($ward, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_NOT_FOUND);
        }
    }
}
