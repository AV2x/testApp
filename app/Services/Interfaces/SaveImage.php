<?php

namespace App\Services\Interfaces;

use App\Models\User;

interface SaveImage
{
    public function save($file, $model) : string;
}
