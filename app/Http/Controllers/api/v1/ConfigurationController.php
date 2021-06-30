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

    public function update(Request $request){
        $configuration = Auth::user()->configuration;
        if($request->push_notification){
            $configuration->push_notification = $request->push_notification == "true" ? 1 : 0;
        }
        if($request->general_notification){
            $configuration->general_notification = $request->general_notification == "true" ? 1 : 0;
        }
        if($request->partner_invitation){
            $configuration->partner_invitation = $request->partner_invitation == "true" ? 1 : 0;
        }
        if($request->location_access){
            $configuration->location_access = $request->location_access == "true" ? 1 : 0;
        }
        $configuration->save();
        return $this->success("User configuration updated", new ConfigurationResource($configuration));
    }
}
