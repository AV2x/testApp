<?php

namespace App\Services\Storage;

use App\Models\User;
use App\Services\Interfaces\SaveImage;
use Illuminate\Support\Facades\Storage;

class UserStorageService implements SaveImage
{
    public function __construct()
    {

    }

    public function save($file, $user) :string
    {
        if($file){
          $extension =  $file->getClientOriginalExtension();
          $name = uniqid().'.'.$extension;
            Storage::putFileAs('users', $file, $name);
            $user->avatar = $name;
            $user->save();
            return $name;
        }
    }
}
