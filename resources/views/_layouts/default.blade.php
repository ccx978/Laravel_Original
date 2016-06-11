<!DOCTYPE html>
<html lang="zh-EN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Learn Laravel 5</title>

  <link href="{{ URL('css/app.css') }}" rel="stylesheet">

</head>
<body>

  <div class="container" style="margin-top: 20px;">
    @yield('content')
    <div id="footer" style="text-align: center; border-top: dashed 3px #eeeeee; margin: 50px 0; padding: 20px;">
@2015 Linghang Laravel Tutorial
<a href="{{ URL('admin/')}}">Admin Panel</a>
    </div>
  </div>


</body>
</html>
