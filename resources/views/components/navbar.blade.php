<div class="navbar">
    <a href="{{route('guest.index')}}" class="">
        <img src="/assets/img/logo.png" alt="tech logo" class="nav-logo">
    </a>
    <form action="{{route('guest.search')}}" method="get">
        <input type="text" placeholder="Search" class="search" name="q">
    </form>
    <ul class="nav-container">
        @if ($login)
        <li class="nav-item"><a href="{{route('newPost')}}" class="nav-link active">New Post</a></li>
        <li class="nav-item"><a href="{{route('myPosts')}}" class="nav-link">my Posts</a></li>
        <li class="nav-item"><a href="{{route('savedPosts')}}" class="nav-link ">Saved Posts</a></li>
        <li class="nav-item"><a href="{{route('logout')}}" class="nav-link ">Logout</a></li>
        @else
            <li class="nav-item"><a href="{{route('login')}}" class="nav-link">Login</a></li>
            <li class="nav-item"><a href="{{route('register')}}" class="nav-link active">Sign Up</a></li>
        @endif
    </ul>
</div>
