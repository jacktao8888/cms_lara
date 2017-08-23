<!doctype html>

<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>欢迎页面</title>

    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body style="padding-top:40px">
    <form class="form-horizontal" style="margin: 0 auto;max-width:500px" method="post" action='login'>
        <h3>Welcome, {{ $name }}</h3>
        {{ csrf_field() }}
        <div class="form-group">
            <label for="username" class="col-sm-3 control-label">用户名</label>
            <div class="col-sm-5">
                <input name="username" id="username" type="text" class="form-control" placeholder="邮箱或用户名" value="{{old('username')}}"/>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">密码</label>
            <div class="col-sm-5">
                <input name="password" id="password" class="form-control" type="password" placeholder="" value="{{old('password')}}"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-3">
                <input id="register" class="btn btn-primary" type="submit" value="登陆" />
            </div>
        </div>
    </form>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $key => $error)
                    <li>{{ $key }} {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>