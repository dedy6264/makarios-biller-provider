<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;


class HostService
{
    
    public function GetUrl($cc){
        // dump(env('APP_ENV'));
        $hostViller="";
        $hostMakarios="";
        if(env('APP_ENV')=="DEV"){
            $hostMakarios=env('HOST_MD');
        }else{
            $hostMakarios=env('HOST_MP');
        }  
            return $hostMakarios;
        
    }
    public function GetToken(){
        $payload=[
            "id"=>session('outlet_id') ?? 0,
        ];
        $response = Http::withBasicAuth('mocha','michi')->post($this->GetUrl('m').'/getToken', $payload)->json();
        if (!is_array($response) || !isset($response['result']) || !is_array($response['result'])) {
            return response()->json(['error' => 'Invalid API response format or data type'], 500);
        }
        $response = $response['result'];
        $token=$response['access_token'];
        return $token;
    }
}
