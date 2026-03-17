<?php

namespace App\Services;


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
}
