<?php

namespace App\Http\Controllers;
use App\Flight;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function time(Request $request){
        $date = $request -> get('date');
        $user = $request -> get('user');
        $time = $request -> get('time');
        $data = Flight::where('user_id',$user)->where('startTime',$date)->get();
        if(count($data)>0){
            return $data->toJson();
        }else{
            return ;
        }
        
    }
    public function select($date){
        $data = Flight::where('remind','=',$date)->get('user');
        return $data;
    }

}
