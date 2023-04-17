<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\customer\Address;
use App\Models\User;
use App\Http\Requests\AddressRequest;



class AddressController extends Controller
{

    public function index()
    {
        $address = Address::all();
        return response()->json($address, 200);
    }

    public function create($user_id)
    {
        $user = User::find($user_id);
        $data = [
            'name' => $user->user_info[0]->fullname,
            'phone' => $user->user_info[0]->phone,
        ];
        return response()->json($data, 200);
    }

    public function store(AddressRequest $request, $user_id)
    {
        try {
            $addressByUser = Address::where('id', $user_id)->get();
            $addressDefault = Address::where('isActive', 1)->where('user_id', $user_id)->first();


            if ($addressDefault && $request->isActive == 1) {
                DB::table('address')->where('id', $addressDefault->id)->update(['isActive' => 0]);
            }

            if ($request->city_id == 2) {
                Address::create([
                    'fullname' => $request->fullname,
                    'company' => $request->company,
                    'phone' => $request->phone,
                    'delivery_address' => $request->delivery_address,
                    'address_type' => $request->address_type ? $request->address_type : 0,
                    'isActive' => $request->isActive ? $request->isActive : 0,
                    'user_id' => $user_id,
                    'city_id' => $request->city_id,
                    'district_id' => $request->district_id,
                    'ward_id' => $request->ward_id
                ]);
                return response()->json($this->message($this->addSuccess), 201);
            }
            return response()->json($this->message('xin lỗi hiện tại chúng tôi chỉ hỗ trợ khu vực Hà Nội'));
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), 404);
        }
    }

    public function edit($id)
    {
        try {
            $address_edit = Address::find($id);
            if (!$address_edit) {
                return response()->json($this->message($this->doesNotExist), 404);
            }

            return response()->json($address_edit, 200);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), 404);
        }
    }

    public function update(AddressRequest $request, $id)
    {
        try {
            $addressDefault = Address::where('isActive', 1)->first();
            $address_update = Address::find($id);
            if (!$address_update) {
                return response()->json($this->message($this->doesNotExist), 404);
            }
            if ($addressDefault && $request->isActive == 1) {
                DB::table('address')->where('id', $addressDefault->id)->update(['isActive' => 0]);
            }
            DB::table('address')->where('id', $id)->update([
                'fullname' => $request->fullname,
                'company' => $request->company,
                'phone' => $request->phone,
                'address' => $request->address,
                'address_type' => $request->address_type ? $request->address_type : $address_update->address_type,
                'isActive' => $request->isActive ? $request->isActive : $address_update->isActive,
                'user_id' => $address_update->user_id,
                'city_id' => $request->city_id,
                'district_id' => $request->district_id,
                'ward_id' => $request->ward_id
            ]);
            return response()->json(['message' => $this->updateSuccess], 200);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), 404);
        }
    }

    public function delete($id)
    {
        try {
            $address_delete = Address::find($id);
            if (!$address_delete) {
                return response()->json($this->message($this->doesNotExist), 404);
            }
            $address_delete->delete();
            return response()->json(['message' => $this->deleteSuccess], 200);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), 404);
        }
    }

    public function getCity()
    {
        try {
            $data = DB::table('city')->get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), 404);
        }
    }

    public function getDistricts($city_id)
    {
        try {
            $data = DB::table('district')->where('city_id', $city_id)->get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), 404);
        }
    }

    public function getWards($district_id)
    {
        try {
            $data = DB::table('ward')->where('district_id', $district_id)->get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), 404);
        }
    }
}
