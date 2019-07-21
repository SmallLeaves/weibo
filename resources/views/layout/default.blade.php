<!DOCTYPE html>
<html>
<head>
  <title>@yield('title','Weibo App') - 小叶子的微博</title>
  <link rel="stylesheet" type="text/css" href="{{mix('css/app.css')}}">
</head>
<body>
  @include('layout._header')
  <div class="container">
    <div class="offset-md-1 col-md-10">
      @include('shared._messages')
      @yield('content')
      @include('layout._footer')
    </div>
  </div>
  <script src="{{mix('js/app.js')}}"></script>
</body>
</html>
