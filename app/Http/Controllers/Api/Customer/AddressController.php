<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\Address;
use App\Models\User;
use App\Http\Requests\AddressRequest;
use Illuminate\Http\Response;


class AddressController extends Controller
{

    protected $address;

    public function __construct(Address $address)
    {
        $this->address = $address;
    }

    public function index()
    {
        $address = $this->address->all();
        return response()->json($address, Response::HTTP_OK);
    }

    public function create($user_id)
    {
        $user = User::find($user_id);
        $data = [
            'name' => $user->user_info[0]->fullname,
            'phone' => $user->user_info[0]->phone,
        ];
        return response()->json($data, Response::HTTP_OK);
    }

    public function store(AddressRequest $request, $user_id)
    {
        try {
            $data = $request->all();
            $addressDefault = $this->address->where('isActive', 1)->where('user_id', $user_id)->first();
            if ($addressDefault && $request->isActive == 1) {
                $addressDefault->update(['isActive' => 0]);
                $addressDefault->save();
            }
            if($request->city_id == 2) {
                $data['user_id'] = $user_id;
                $this->address->create($data);
                return response()->json($this->message($this->addSuccess), Response::HTTP_CREATED);
            }
            return response()->json($this->message('xin lỗi hiện tại chúng tôi chỉ hỗ trợ khu vực Hà Nội'), Response::HTTP_NOT_FOUND);   
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_NOT_FOUND);
        }
    }

    public function edit($id)
    {
        try {
            $address = $this->address->find($id);
            if (!$address) {
                return response()->json($this->message($this->doesNotExist), Response::HTTP_NOT_FOUND);
            }
            return response()->json($address, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_NOT_FOUND);
        }
    }

    public function update(AddressRequest $request, $id)
    {
        try {
            $address =$this->address->find($id);
            if (!$address) {
                return response()->json($this->message($this->doesNotExist), Response::HTTP_NOT_FOUND);
            }

            $addressDefault =$this->address->where('isActive', 1)->first();
            if ($addressDefault && $request->isActive == 1) {
                $addressDefault->update(['isActive' => 0]);
                $addressDefault->save();
            }
            
            $data = $request->all();
            $data['user_id'] = $address->user_id;
            $address->update($data);
            return response()->json($this->message($this->updateSuccess), Response::HTTP_OK);

        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_NOT_FOUND);
        }
    }

    public function delete($id)
    {
        try {
            $address = $this->address->find($id);
            if (!$address) {
                return response()->json($this->message($this->doesNotExist), Response::HTTP_NOT_FOUND);
            }
            $address->delete();
            return response()->json($this->message($this->deleteSuccess), Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_NOT_FOUND);
        }
    }

    public function getCity()
    {
        try {
            $data = DB::table('city')->get();
            return response()->json($data, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_NOT_FOUND);
        }
    }

    public function getDistricts($city_id)
    {
        try {
            $data = DB::table('district')->where('city_id', $city_id)->get();
            return response()->json($data, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_NOT_FOUND);
        }
    }

    public function getWards($district_id)
    {
        try {
            $data = DB::table('ward')->where('district_id', $district_id)->get();
            return response()->json($data, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_NOT_FOUND);
        }
    }
}
