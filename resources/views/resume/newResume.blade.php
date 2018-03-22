<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Starter Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('resume/css/index.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('layui/css/layui.css')}}">
</head>

<body style="background-color: #00c790">

<nav class="navbar navbar-default" style="background-color: #ffffff">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">LOGO</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">链接 <span class="sr-only">(current)</span></a></li>
                <li><a href="#">链接</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">下载 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">链接</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">下载 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


<div class="container">
我的简历
    @foreach($re_id as $k => $v)
    <button class="btn">简历{{$k+1}}</button>
        <input type="hidden" class="hidden_{{$k+1}}" value="{{myClass::encode($v->re_id)}}">
    @endforeach
    <br />
    <br />
<button class="btn add_btn">添加简历</button>


</div><!-- /.container -->





<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="{{asset('resume/js/index.js')}}"></script>
<script src="{{asset('layui/layui.js')}}"></script>

<script>
    $(function () {
        const data = {_token:'{{csrf_token()}}'}
        $('.add_btn').on('click',function () {
            $.ajax({
                url:'{{url('/add_res')}}',
                type:'post',
                data:data,
                success:function (data) {
                    location.href='{{url('/resume')}}'+'/'+data
                }
            })
        })
        
        $('.btn').on('click',function () {
            const id = $(this).html().substring(2)
            const data = $('.hidden_'+id).val()
            location.href='{{url('/resume')}}' + '/' +data
        })
    })
</script>
</body>
</html>
