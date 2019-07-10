
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
    @foreach($data as $data)
    <form action="{{route('updateActive')}}" method="POST" enctype="multipart/form-data">
        @csrf    
    <input type="text" name="id" style="display:none;" value="{{$data->id}}">
    <input type="text" name="dataid" style="display:none;" value="{{$data->dataID}}">
    <div>
    <span>任務添加</span><input name="title" placeholder="新增標題"  style=" border:1px; border-bottom-style: solid;border-top-style: none;border-left-style:none;border-right-style:none;" value="{{$data->title}}">
        <span class="close" style="border-bottom: 1px solid #eee;">X</span>
    </div> 
        <br>
    <div>起始時間: <input id="start" type="date" name="startTime" value="{{$data->startTime}}"><select id="starthr" name="starthour" value="{{$data->starthour}}">
        <option>0</option><option>1</option><option>2</option><option>3</option><option>4</option>
        <option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option>
        <option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option>
        <option>20</option><option>21</option><option>22</option><option>23</option></select>點</div>   
        <div>結束時間:<input id="end" type="date" name="endTime" value="{{$data->endTime}}"><select id="endhr" name="endhour" value="{{$data->endhour}}">
        <option>0</option><option>1</option><option>2</option><option>3</option><option>4</option>
        <option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option>
        <option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option>
        <option>20</option><option>21</option><option>22</option><option>23</option></select>點</div>  
        <textarea name="content_2" id="content_2" rows="8" cols="60" value="{{$data->content_2}}"></textarea>
        <!--<textarea name="content_2" id="content_2" rows="10" cols="80"></textarea>
        <script>
            CKEDITOR.replace( "content_2", {});
            width:500;
        </script>-->
        <div>圖片名稱:<input type="file" accept=".png, .jpg, .jpeg, .gif" name="file" id="file"></div>
        <div>邀請共用對象:<input type="text" name="invite"></div>
        <div>幾天前通知<input type="number" name="remind" min="0"></div>
        <input id="submit" type="submit" name="senddata" value="送出">
    </form>
    @endforeach
</body>
</html>