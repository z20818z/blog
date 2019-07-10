
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Work</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ asset('js/calender.js') }}"></script>
    <script src = "{{ asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src = "{{ asset('js/calender_upload.js')}}"></script>
    <script src = "{{ asset('js/ckeditor/ckeditor.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <style type="text/css">
	#contentTable{
		table-layout:fixed; /* bootstrap-table設定colmuns中某列的寬度無效時，需要給整個表設定css屬性 */
		word-break:break-all; word-wrap:break-all; /* 自動換行 */
    }
    .back{
display: none;
position: fixed;
width: 100%;
height: 100%;
z-index: 2;
background: rgba(0,0,0,0.1);
top:0;
left:0;
}
.dialog{
display: none;
position: fixed;
z-index: 3;
width: 530px;
min-height: 300px;
top:50%;
left:50%;
margin: -150px 0 0 -250px;
background: #fff;
padding: 15px;
border-radius: 5px;
}
.close{padding-left: 100px;}
</style>
</head>
<body>
    
@guest
    <meta http-equiv=REFRESH CONTENT=0;url="{{route('login')}}">
@endguest
@auth
    @if(isset($post))
        @if(count($post)>1)
            @foreach ($post as $item)
                <h1>{{$item -> title}}</h1>
            @endforeach
        @endif
    @endif
    <div>
        <a class="btn btn-primary" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
        登出
        </a>                          
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a class="btn btn-primary" href="{{route('edittable')}}">
        查看行程
        </a>
        <a class="btn btn-primary" href="{{route('form.index')}}">
        查看行程(CRUD版)
        </a>
    </div>
<div class="container-fluid">
  <div class="row">
        <div class="col-sm-4">
            <table class="table text-center" id="tb1">
            <thead >
                <tr>
                <th id="y" colspan="7" class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>一</td><td>二</td><td>三</td><td>四</td><td>五</td><td>六</td><td>日</td>
                </tr>
            </tbody>
            </table>
        </div>
        <div class="col-sm-8">
            <table class="table text-center table-striped table-bordered table-condensed" class="tb2" id="contentTable">
                <thead >
                    <tr>
                    <th>time</th><th>一</th><th>二</th><th>三</th><th>四</th><th>五</th><th>六</th><th>日</th>
                    </tr>
                    <tr>
                    <td></td><td id="day1">1</td><td id="day2">2</td><td id="day3">3</td><td id="day4">4</td><td id="day5">5</td><td id="day6">6</td><td id="day7">7</td>
                    </tr>
                </thead>
                <tbody id="schedule">
                <script>
                        var user = '{{auth()->user()->email}}';
                        createTable();
                        if(thisDay==0){
                            thisDay=7;
                        }
                        
                    </script>
                    
                </tbody>
            </table>
        </div>
    </div>
    <div class="back" id="back"></div>
<!--FORM-->

    <div class="dialog" id="dialogBox" >
        <form action="{{route('sendActive')}}" method="POST" enctype="multipart/form-data">
            @csrf    
        <input type="text" name="user" style="display:none;" value="{{auth()->user()->email}}">
        <div>
            <span>任務添加</span><input name="title" placeholder="新增標題"  style=" border:1px; border-bottom-style: solid;border-top-style: none;border-left-style:none;border-right-style:none;">
            <span class="close" style="border-bottom: 1px solid #eee;">X</span>
        </div> 
            <div>起始時間:<br> <input id="start" type="date" name="startTime"><select id="starthr" name="starthour">
            <option>0</option><option>1</option><option>2</option><option>3</option><option>4</option>
            <option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option>
            <option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option>
            <option>20</option><option>21</option><option>22</option><option>23</option></select>點</div>   
            <div>結束時間:<br><input id="end" type="date" name="endTime"><select id="endhr" name="endhour"><br>
            <option>0</option><option>1</option><option>2</option><option>3</option><option>4</option>
            <option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option>
            <option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option>
            <option>20</option><option>21</option><option>22</option><option>23</option></select>點</div>  
            <textarea name="content_2" id="content_2" rows="8" cols="60"></textarea>
            <!--<textarea name="content_2" id="content_2" rows="10" cols="80"></textarea>
            <script>
                CKEDITOR.replace( "content_2", {});
                width:500;
            </script>-->
            <!--<div>圖片名稱:<input type="file" accept=".png, .jpg, .jpeg, .gif" name="file" id="file"></div>-->
            
            <input id="submit" type="submit" name="senddata" value="送出" onclick="closeform()">
        </form>
        <iframe id="id_iframe" name="id_iframe" style="display:none"></iframe>
    </div>
</div>
    
</body>
<script>
var user = '{{auth()->user()->id}}';
function ajax_update(year,month,date){
    month = add_zero_m(month);
    date = add_zero_d(date);
    date = year+'-'+month+'-'+date;
    $.ajax({
        type:'get',
        url: '/time', 
        data:{'date': date,'user':user},
        dataType:'json',
        success: function(data){
            $("."+date+'sch').html();  
            console.log(data);
            for(i=0;i<data.length;i++){
                $("."+date+'sch').append(data[i]['title']+"<p>"+"期限:"+data[i]['endTime'].substring(5,10)+"<p>"); 
            };
            
                for(i=0;i<data.length;i++){
                    for(j=0;j<24;j++){
                        if(j==data[i]['starthour']){
                            $("."+date+'-'+j).append(data[i]['title']+"<p>"+"期限:"+data[i]['endTime'].substring(5,10)+"<p>");
                        };
                    };
                };
            
    }});
}
/*
function ajax_update_time(year,month,date,time){
    month = add_zero_m(month);
    date = add_zero_d(date);
    date = year+'-'+month+'-'+date;
    $.ajax({
        type:'get',
        url: '/time', 
        data:{'date': date,'time':time,'user':user},
        dataType:'json',
        success: function(data){
            console.log(data);
            //console.log(date+'-'+time+":00");
            //$("."+date+'-'+time).html(data);
    }});
}*/
changeWeek(thisDate,thisDay);
    calender(thisYear,thisMonth);
</script>
@endauth
</html>