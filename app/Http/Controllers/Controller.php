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

    public function uploadImageDrive($avatar)
    {
        if ($avatar == "") {
            return null;
        }
        $imageName = Str::random(32) . '.' . $avatar->getClientOriginalExtension();
        Storage::disk('google')->put($imageName, file_get_contents($avatar));
        $url = Storage::disk('google')->path($imageName);
        return $url;
    }

    public function deleteImageDrive($avatar)
    {
        if ($avatar) {
            Storage::disk('google')->delete($avatar);
        }

        
    }
}
