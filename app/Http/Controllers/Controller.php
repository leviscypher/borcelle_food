<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $itemsPerPage = 10;
    public $addSuccess = 'thêm thành công.';
    public $updateSuccess = "cập nhật thành công.";
    public $deleteSuccess = "xóa thành công.";
    public $anUnspecifiedError = "đã có lỗi xảy ra vui lòng thử lại sau.";
    public $doesNotExist = "nội dung này không tồn tại.";

    public function getPagination($datas = [], $item)
    {
        return  [
            'data' => $datas,
            'current_page' => $item->currentPage(),
            'per_page' => $item->perPage(),
            'total' => $item->total(),
            'last_page' => $item->lastPage(),
            'from' => $item->firstItem(),
            'to' => $item->lastItem(),
            'path' => $item->url($item->currentPage()),
            'first_page_url' => $item->url(1),
            'last_page_url' => $item->url($item->lastPage()),
            'next_page_url' => $item->nextPageUrl(),
            'prev_page_url' => $item->previousPageUrl(),
        ];
    }

    public function uploadImageDrive($image)
    {
        if ($image) {
            if (is_array($image)) {
                $url = [];
                foreach ($image as $name) {
                    $imageName = Str::random(32) . '.' . $name->getClientOriginalExtension();;
                    Storage::disk('google')->put($imageName, file_get_contents($name));
                    $url[] = Storage::disk('google')->path($imageName);
                }
                return $url;
            } else {
                $imageName = Str::random(32) . '.' . $image->getClientOriginalExtension();
                Storage::disk('google')->put($imageName, file_get_contents($image));
                $url = Storage::disk('google')->path($imageName);
                return $url;
            }
        }
    }

    public function deleteImageDrive($image)
    {
        if ($image) {
            Storage::disk('google')->delete($image);
        }
    }

    public function message($message)
    {
        return ['message' => $message];
    }
}
