
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>查看行程</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src = "js/jquery-3.3.1.min.js"></script>
</head>

<body>
<a href="{{route('index')}}">返回</a>
    <table class="table text-center table-striped table-bordered table-condensed" id="contentTable">
        <thead>
            <tr>
            <th>開始日</th><th>結束日</th><th>任務標題</th><th>任務內容</th><th>修改</th><th>刪除</th><th>分享</th>
            </tr>
            @if(isset($post))
            @foreach ($post as $item)
                <tr>
                    <td>{{$item->startTime}}</td><td>{{$item->endTime}}</td><td>{{$item->title}}</td><td>{{$item->content_2}}</td><td><a href="/user/{{$item->id}}">修改</a></td><td><a href="/delete/{{$item->id}}">刪除</a></td>
                </tr>
            @endforeach
            @endif
        </thead>
        
    </table>
</body>
</html>