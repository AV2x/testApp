<?php

namespace App\Services\Storage;

use App\Models\Article;
use App\Services\Interfaces\SaveImage;
use Illuminate\Support\Facades\Storage;

class ArticleStorageService implements SaveImage
{
    public function __construct()
    {

    }

    public function save($file, $article) :string
    {
        if($file){
            $extension =  $file->getClientOriginalExtension();
            $name = uniqid().'.'.$extension;
            Storage::putFileAs('articles', $file, $name);
            $article->avatar = $name;
            $article->save();
            return $name;
        }
    }
}
