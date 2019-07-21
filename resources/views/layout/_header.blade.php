<nav class="navbar navbar-expand-lg navbar-dadrk bg-dark">
  <div class="container">
    <a class="navbar-brand" href="{{route('home')}}">Weibo App</a>
    <ul class="navbar-nav justify-content-end">
      @if(Auth::check())
        <li class="nav-item">
          <a href="#" class="nav-link">用户列表</a>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a href="{{route('users.show',Auth::user())}}" class="dropdown-item">个人中心</a>
            <a href="#" class="dropdown-item">编辑资料</a>
            <div class="dropdown-divider"></div>
            <a href="#" id="logout" class="dropdown-item">
              <form action="{{route('logout')}}" method="POST">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
              </form>
            </a>
          </div>
        </li>
      @endif
      <li class="nav-item"><a class="nav-link" href="{{route('help')}}">帮助</a></li>
      <li class="nav-item"><a class="nav-link" href="#">登录</a></li>
    </ul>
  </div>
</nav>
