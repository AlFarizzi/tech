@extends('index')

@section('content')
<i class="fas fa-hamburger show-icon" id="show-icon"></i>
        <div class="auth-box">
        <img src="/assets/img/logo.png" alt="">
        <form action="{{route('login')}}" method="post">
            @csrf
            <div class="form-group">
                <input type="email" name="email" class="form-auth @error('email') error-border @enderror">
                @error('email')
                <p class="error-message">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-auth @error('password') error-border @enderror">
                @error('password')
                    <p class="error-message">{{$message}}</p>
                @enderror

            <button type="submit" class="btn-auth btn-primary btn-auth">Login</button>
        </form>
    </div>
@endsection
