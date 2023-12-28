<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GlobalController extends Controller
{

    public static function createUuid() { 
        $generated_uuid = explode("-", (String) Str::uuid());
        return $generated_uuid[0];
    }
}
