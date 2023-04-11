<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\customer\Address;
use App\Models\Admin\UserInfo;
use App\Http\Requests\AddressRequest;



class AddressController extends Controller
{

    public function index()
    {
        $address = Address::all();
        return response()->json($address, 200);
    }

    public function setDefaultAdress($id)
    {
        try {
            $addressSetDefault = Address::find($id);
            $addressDefault = Address::where('isActive', 1)->first();
            if ($addressSetDefault->id === $addressDefault->id) {
                DB::table('address')->where('id', $id)->update(['isActive' => 1]);
            } else {
                DB::table('address')->where('id', $id)->update(['isActive' => 1]);
                DB::table('address')->where('id', $addressDefault->id)->update(['isActive' => 0]);
                return 1;
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => $this->anUnspecifiedError], 404);
        }
    }

    public function create(AddressRequest $request, $user_id)
    {
        try {
            $addressDefault = Address::where('isActive', 1)->first();
            Address::create([
                'fullname' => $request->fullname,
                'company' => $request->company,
                'phone' => $request->phone,
                'address' => $request->address,
                'address_type' => $request->address_type ? $request->address_type : 0,
                'isActive' => $request->isActive == 1 ? DB::table('address')->where('id', $addressDefault->id)->update(['isActive' => 0]) : 0,
                'user_id' => $user_id,
                'city_id' => $request->city_id,
                'district_id' => $request->district_id,
                'ward_id' => $request->ward_id
            ]);
            return response()->json(['message' => $this->addSuccess], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => $this->anUnspecifiedError], 404);
        }
    }

    public function edit($id)
    {
        try {
            $address_edit = Address::find($id);
            if (!$address_edit) {
                return response()->json(['message' => $this->doesNotExist], 404);
            }

            return response()->json($address_edit, 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $this->anUnspecifiedError], 404);
        }
    }

    public function update(AddressRequest $request, $id)
    {
        try {
            $addressDefault = Address::where('isActive', 1)->first();
            $address_update = Address::find($id);
            if (!$address_update) {
                return response()->json(['message' => $this->doesNotExist], 404);
            }
            DB::table('address')->where('id', $id)->update([
                'fullname' => $request->fullname,
                'company' => $request->company,
                'phone' => $request->phone,
                'address' => $request->address,
                'address_type' => $request->address_type ? $request->address_type : $address_update->address_type,
                'isActive' => $request->isActive == 1 ? $this->setDefaultAdress($id) : $address_update->isActive,
                'user_id' => $address_update->user_id,
                'city_id' => $request->city_id,
                'district_id' => $request->district_id,
                'ward_id' => $request->ward_id
            ]);
            return response()->json(['message' => $this->updateSuccess], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $this->anUnspecifiedError], 404);
        }
    }

    public function delete($id)
    {
        try {
            $address_delete = Address::find($id);
            if (!$address_delete) {
                return response()->json(['message' => $this->doesNotExist], 404);
            }
            $address_delete->delete();
            return response()->json(['message' => $this->deleteSuccess], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $this->anUnspecifiedError], 404);
        }
    }

    public function getCity()
    {
        try {
            $data = DB::table('city')->get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $this->anUnspecifiedError], 404);
        }
    }

    public function getDistricts($city_id)
    {

        try {
            $data = DB::table('district')->where('city_id', $city_id)->get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $this->anUnspecifiedError], 404);
        }
    }

    public function getWards($district_id)
    {
        try {
            $data = DB::table('ward')->where('district_id', $district_id)->get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $this->anUnspecifiedError], 404);
        }
    }
}
