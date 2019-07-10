@extends('layouts.navbar')
@section('title')
    任務系統
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb" style="margin-top: 20px;">
            <div class="pull-left">
                <h2>任務清單</h2>
            </div>
            <div class="pull-right">
                <a href="{{route('index')}}" class="btn btn-success">Back</a>
                <a href="{{route('form.create')}}" class="btn btn-success">Create New Post</a>
            </div>
        </div>
    </div>
    @if($message=Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Title</th>
                <th width="280px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data_list as $item)     
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$item->user->name}}</td>
                    <td>{{$item->title}}</td>
                    <td>
                        <form action="{{route('form.destroy',$item->id)}}" method="post" role="form">
                            <a href="{{route('form.show',$item->id)}}" class="btn btn-info">Show</a>
                            <a href="{{route('form.edit',$item->id)}}" class="btn btn-primary">Edit</a>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection