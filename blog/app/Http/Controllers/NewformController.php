<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flight;
use App\User;
class NewformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data_list = Flight::with('user')->where('user_id',Auth()->user()->id)->get();
        return view('form.index',compact('data_list'))->with('i','0');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'startTime' => 'required',
            'endTime' => 'required',
            'starthour' => 'required',
            'endhour' => 'required',
        ]);
        $user = User::where('id',Auth()->user()->id)->first();
        $user->data()->create([
            'title' => $request->title,
            'username' => $user->email,
            'startTime' => $request->startTime,
            'starthour' => $request->starthour,
            'endTime' => $request->endTime,
            'endhour' => $request->endhour,
            'content_2' => $request->content_2,
            'dataID' => md5(uniqid()),
        ]);
        return redirect()->route('form.index')->with('success','已經新增囉');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $data_list = Flight::with('user')->where('id',$id)->first();
        if($data_list->user_id != Auth()->user()->id){
            return redirect()->route('form.index')->with('success','您沒有權限觀看此筆資料');
        }
        return view('form.show',compact('data_list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data_list = Flight::findOrFail($id);
        if($data_list->user_id != Auth()->user()->id){
            return redirect()->route('form.index')->with('success','您沒有權限更改此筆資料');
        }
        return view('form.edit',compact('data_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'startTime' => 'required',
            'endTime' => 'required',
            'starthour' => 'required',
            'endhour' => 'required',
        ]);
        $mytest = Flight::findOrFail($id)->update($request->all());
        $mytest = Flight::findOrFail($id)->first();
        if(isset($request->invite)){
            $search_invite = User::where('email',$request->invite)->first();
            if(isset($search_invite)){
                $search_invite->data()->create([
                    'title'=>$request->title,
                    'startTime'=>$request->startTime,
                    'starthour'=>$request->starthour,
                    'endTime'=>$request->endTime,
                    'endhour'=>$request->endhour,
                    'content_2'=>$request->content_2,
                    'dataID'=>$mytest->dataID,
                    'username'=>$search_invite->email,
                    'remind'=>$mytest->remind,
                ]);
            }
            else{
                Mail::to($request->invite)->send(new SendEmail("邀請通知","趕快註冊來參加我的活動"));
            }
        }
        return redirect()->route('form.index')->with('success','已經更新資料囉');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Flight::findOrFail($id)->delete();
        return redirect()->route('form.index')->with('success','已經刪除資料囉');
    }
}
