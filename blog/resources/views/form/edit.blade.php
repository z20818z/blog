@extends('layouts.navbar')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb" style="margin-top: 20px;">
            <div class="pull-left">
                <h2>Edit List</h2>
            </div>
            <div class="pull-right">
                <a href="{{route('form.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <br>
    <form action="{{route('form.update',$data_list->id)}}" method="post" role="form">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group{{$errors->has('title')?' has-error':''}}">
                        <strong>活動標題</strong>
                        <input type="text" name="title" class="form-control" value="{{$data_list->title}}">
                        <span class="text-danger">{{$errors->first('title')}}</span>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group{{$errors->has('startTime')?' has-error':''}}">
                        <strong>開始時間</strong>
                    <input type="date" name="startTime" class="form-control" value="{{$data_list->startTime}}">
                        <span class="text-danger">{{$errors->first('startTime')}}</span>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group{{$errors->has('endTime')?' has-error':''}}">
                        <strong>結束時間</strong>
                        <input type="date" name="endTime" class="form-control" value="{{$data_list->endTime}}">
                        <span class="text-danger">{{$errors->first('endTime')}}</span>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group{{$errors->has('starthour')?' has-error':''}}">
                        <strong>開始時刻</strong>
                        <input type="number" name="starthour" class="form-control" min="0" max="23" value="{{$data_list->starthour}}">
                        <span class="text-danger">{{$errors->first('starthour')}}</span>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group{{$errors->has('endhour')?' has-error':''}}">
                        <strong>結束時刻</strong>
                        <input type="number" name="endhour" class="form-control" min="0" max="23" value="{{$data_list->endhour}}">
                        <span class="text-danger">{{$errors->first('endhour')}}</span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group{{$errors->has('content_2')?' has-error':''}}">
                        <strong>內容</strong>
                        <textarea name="content_2" id="content_2"  rows="10" value="{{$data_list->content_2}}" class="form-control"></textarea>
                        <span class="text-danger">{{$errors->first('content_2')}}</span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group{{$errors->has('invite')?' has-error':''}}">
                        <strong>邀請共用</strong>
                        <input name="invite" id="invite"  rows="10" class="form-control">
                        <span class="text-danger">{{$errors->first('invite')}}</span>
                    </div>
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">更新</button>
            </div>
        </div>
    </form>
@endsection