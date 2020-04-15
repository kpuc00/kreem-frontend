<?php

namespace App\Http\Controllers\InternalAPI;

use App\Http\Controllers\Controller;

class BaseAPIController extends Controller
{
    protected function modelToJson($model){
        $content = json_encode($model, JSON_OBJECT_AS_ARRAY);
        return response($content)->header('Content-Type', 'application/json');
    }
}
