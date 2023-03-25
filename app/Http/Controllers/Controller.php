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

    public function uploadImageDrive($image)
    {
        if ($image) {
            $imageName = Str::random(32) . '.' . $image->getClientOriginalExtension();
            Storage::disk('google')->put($imageName, file_get_contents($image));
            $url = Storage::disk('google')->path($imageName);
            return $url;
        }
    }

    public function deleteImageDrive($image)
    {
        if ($image) {
            Storage::disk('google')->delete($image);
        }
    }
}
