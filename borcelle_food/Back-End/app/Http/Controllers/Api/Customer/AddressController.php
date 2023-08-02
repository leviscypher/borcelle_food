<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use App\Http\Requests\AddressRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class AddressController extends Controller
{

    public function index()
    {
        $address = Address::all();
        $datas = [];
        foreach ($address as $item) {
            $data = [
                'id' => $item->id,
                'fullname' => $item->fullname,
                'isActive' => $item->isActive,
                'phone' => $item->phone,
                'address' => $item->delivery_address . ', ' . $item->ward->name . ' - ' . $item->district->name . ' - ' . $item->city->name,
            ];

            $datas[] = $data;
        }
        return response()->json($datas, Response::HTTP_OK);
    }

    public function active($user_id)
    {
        $addressActive = Address::where('user_id', $user_id)->where('isActive', 1)->first();
        if ($addressActive) {
            $data = [
                'id' => $addressActive->id,
                'fullname' => $addressActive->fullname,
                'isActive' => $addressActive->isActive,
                'phone' => $addressActive->phone,
                'address' => $addressActive->delivery_address . ', ' . $addressActive->ward->name . ' - ' . $addressActive->district->name . ' - ' . $addressActive->city->name,
            ];
            return response()->json($data, Response::HTTP_OK);
        }
    }

    public function create($user_id)
    {
        $user = User::find($user_id);
        $data = [
            'name' => $user->user_info->fullname,
            'phone' => $user->user_info->phone,
        ];
        return response()->json($data, Response::HTTP_OK);
    }

    public function store(AddressRequest $request, $user_id)
    {
        try {
            $data = $request->all();

            $addressDefault = Address::where('isActive', 1)->where('user_id', $user_id)->first();
            if ($addressDefault && $request->isActive == 1) {
                $addressDefault->update(['isActive' => 0]);
                $addressDefault->save();
            }
            if ($request->city_id == 2) {
                $data['user_id'] = $user_id;
                if (!$addressDefault && $data['isActive'] == 0) {
                    $data['isActive'] = 1;
                } else {
                    $data['isActive'] = (int)$request->isActive;
                }
                Address::create($data);
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
            $address = Address::find($id);
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
            $address = Address::find($id);
            if (!$address) {
                return response()->json($this->message($this->doesNotExist), Response::HTTP_NOT_FOUND);
            }

            $addressDefault = Address::where('isActive', 1)->first();
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
            $address = Address::find($id);
            if (!$address) {
                return response()->json($this->message($this->doesNotExist), Response::HTTP_NOT_FOUND);
            }
            $address->delete();
            return response()->json($this->message($this->deleteSuccess), Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_NOT_FOUND);
        }
    }

    public function activeAddress(Request $request, $address_id)
    {
        try {
            $oldActive = Address::where('user_id', $request->user_id)->where('isActive', 1)->first();
            $newActive = Address::where('user_id', $request->user_id)->where('id', $address_id)->first();
            $oldActive->isActive = 0;
            $oldActive->save();
            $newActive->isActive = 1;
            $newActive->save();
            return response()->json($this->message($this->updateSuccess), Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_NOT_FOUND);
        }
    }
}
