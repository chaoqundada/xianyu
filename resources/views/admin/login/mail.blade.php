<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{Config::get('app.title')}}</title>
</head>
<body>
  <div>
    <a href="{{url('/admin/login/reupwd')}}?id={{$id}}&token={{$token}}">点击此处修改密码</a>
  </div>
</body>
</html>