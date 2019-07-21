@extends('layout.default')
@section('content')
<div class="jumbotron">
  <h1>Hello Laravel</h1>
  <p class="lead">
    你现在看到的是 <a href="https://fathomless-mountain-54618.herokuapp.com">小叶子的微博</a>主页
  </p>
  <p>一切，将从这里开始</p>
  <p>
    <a class="btn btn-lg btn-success" href="{{route('signup')}}" role="button">现在注册</a>
  </p>
</div>
@stop
