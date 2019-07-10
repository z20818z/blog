<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Flight;
use App\User;
use Mail;
use App\Mail\SendEmail;
class formcontroller extends Controller
{
    
    public function editActive(Request $request){
        $data = Flight::where('id',$request->id)->get();
        return view('posts.edit',compact('data'));
    }

    public function insert(Request $request){
        $rand = md5(uniqid());
        $flight = Flight::create([
            'username' => $request -> input('user'),
            'title' => $request -> input('title'),
            'startTime' => $request -> input('startTime'),
            'starthour' => $request -> input('starthour'),
            'endTime' => $request -> input('endTime'),
            'endhour' => $request -> input('endhour'),
            'title' => $request -> input('title'),
            'dataID' => $rand,
            'userID' =>auth()->user()->userID,
            'content_2' => $request -> input('content_2')]);
        $flight->save();
        return back();
    }

    public function delete(Request $request){
        Flight::where('id',$request->id)->delete();
        return redirect('/posts.edittable');
    }

    public function update(Request $request){
        $d = strtotime($request->endTime);
        $x = $request->remind*86400;
        $x = $d-$x;
        $x = date('Y-m-d',$x); 
        $data = Flight::where('dataID',$request->dataid)->update([
            'title'=>$request->title,
            'startTime'=>$request->startTime,
            'starthour'=>$request->starthour,
            'endTime'=>$request->endTime,
            'endhour'=>$request->endhour,
            'content_2'=>$request->content_2,
            'remind'=>$x,
            ]);
        if(isset($request->invite)){
            $search_invite = User::where('email',$request->invite)->get();
            if(isset($search_invite)){
                Flight::create([
                    'title'=>$request->title,
                    'startTime'=>$request->startTime,
                    'starthour'=>$request->starthour,
                    'endTime'=>$request->endTime,
                    'endhour'=>$request->endhour,
                    'content_2'=>$request->content_2,
                    'dataID'=>$request->dataid,
                    'userID'=>$search_invite[0]['userID'],
                    'username'=>$search_invite[0]['email'],
                ]);
            }
            else{
                Mail::to($request->invite)->send(new SendEmail("邀請通知","趕快註冊來參加我的活動"));
            }
        }
        
        
        
        
        return redirect('/posts.edittable');
        
    }

    public function index(){
        $post = Flight::all();
        return view('index',compact('post'));
    }

    public function listActive(){
        $post = Flight::where('username',auth()->user()->email)->get();
        return view('posts.edittable',compact('post'));
    }

    public function sendmail($email,$subject,$message){
        Mail::to($email)->send(new SendEmail($subject,$message));
    }
}
