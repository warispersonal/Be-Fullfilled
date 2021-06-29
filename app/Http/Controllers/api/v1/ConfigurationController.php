<?php

namespace App\Http\Controllers\api\v1;

use App\Configuration;
use App\Http\Controllers\Controller;
use App\Http\Resources\ConfigurationResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfigurationController extends Controller
{
    public function show(){
        $configuration = Auth::user()->configuration;
        return $this->success("User Configuration", new ConfigurationResource($configuration));
    }
}
