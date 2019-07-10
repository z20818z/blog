@extends('layouts.navbar')
@section('title')
    新增活動
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb" style="margin-top: 20px;">
            <div class="pull-left">
                <h2>添加活動</h2>
            </div>
            <div class="pull-right">
                <a href="{{route('form.index')}}" class="btn btn-primary">返回</a>
            </div>
        </div>
    </div>
    <form action="{{route('form.store')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group{{$errors->has('title')?' has-error':''}}">
                    <strong>活動標題</strong>
                    <input type="text" name="title" class="form-control" placeholder="名稱">
                    <span class="text-danger">{{$errors->first('title')}}</span>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group{{$errors->has('startTime')?' has-error':''}}">
                    <strong>開始時間</strong>
                    <input type="date" name="startTime" class="form-control">
                    <span class="text-danger">{{$errors->first('startTime')}}</span>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group{{$errors->has('endTime')?' has-error':''}}">
                    <strong>結束時間</strong>
                    <input type="date" name="endTime" class="form-control">
                    <span class="text-danger">{{$errors->first('endTime')}}</span>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group{{$errors->has('starthour')?' has-error':''}}">
                    <strong>開始時刻</strong>
                    <input type="number" name="starthour" class="form-control" min="0" max="23">
                    <span class="text-danger">{{$errors->first('starthour')}}</span>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group{{$errors->has('endhour')?' has-error':''}}">
                    <strong>結束時刻</strong>
                    <input type="number" name="endhour" class="form-control" min="0" max="23">
                    <span class="text-danger">{{$errors->first('endhour')}}</span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group{{$errors->has('content_2')?' has-error':''}}">
                    <strong>內容</strong>
                    <textarea name="content_2" id="content_2"  rows="10" placeholder="內容" class="form-control"></textarea>
                    <span class="text-danger">{{$errors->first('content_2')}}</span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">新增</button>
            </div>
        </div>
    </form>
@endsection