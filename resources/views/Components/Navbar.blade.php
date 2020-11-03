<div class="navigation" id="navigation">
    <span class="close" id="close" ><i class="fas fa-times"></i></span>
    <div class="brand">
      <a href="{{route('root')}}" ><img src="/assets/img/logo.png" alt=""></a>
    </div>
    <nav class="navbar">
        <ul class="nav-container">
            @guest
            <li class="nav-item"><a href="{{route('login')}}" class="nav-link {{request()->is('login') ? 'active' : ''}}">Login</a></li>
        <li class="nav-item"><a href="{{route('register')}}" class="nav-link {{request()->is('register') ? 'active' : ''}}">Register</a></li>
            @endguest
            @auth
            <li class="nav-item "><a href="{{route('login')}}" class="nav-link {{request()->is('user')  || request()->is('user/public/questions/solved') || request()->is('user/public/questions/unsolved') ? 'active' : ''}}">Home</a></li>
            <li class="nav-item"><a href="{{route('myQuestion.get')}}" class="nav-link {{request()->is('user/myQuestions') ? 'active' : ''}}">myQuestion's</a></li>
            <li class="nav-item"><a href="{{route('login')}}" class="nav-link">Profile</a></li>
            <li class="nav-item"><a href="{{route('logout')}}" class="nav-link">Logout</a></li>
            @endauth
        </ul>
    </nav>
    @auth

        <div class="search">
            {{-- <form action=""> --}}
                {{-- <input type="text" name="" class="search-navbar"> --}}
                <button type="submit" id="modalBtn" class="btn-navbar" style="color:#2C4964"><i class="fas fa-plus"></i></button>
                <button type="submit" id="searchBtn" class="btn-navbar" style="color:#2C4964"><i class="fas fa-search"></i></button>
            {{-- </form> --}}
        </div>
    @endauth
</div>
