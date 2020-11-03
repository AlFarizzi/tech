@extends('index')

@section('content')
<i class="fas fa-hamburger show-icon" id="show-icon"></i>
<div class="auth-box">
        <div class="registration-content">
            <div class="overlay">
            </div>
        </div>
        <div class="registration-panel">
            <h4 class="registration-title">Join Tech</h4>
            <p>Already have an account ? <a href="{{route('login')}}" style="color:grey;">Login</a></p>
            <form action="{{route('register')}}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" name="nama" class="form-auth-register  @error('nama') error-border @enderror" placeholder="Donald Trump">
                    @error('nama') <p class="error-message">{{$message}}</p> @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="username" class="form-auth-register @error('username') error-border @enderror" placeholder="d0n4ld">
                    @error('username') <p class="error-message">{{$message}}</p>@enderror
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-auth-register @error('email') error-border @enderror" placeholder="email@example.com">
                    @error('email') <p class="error-message">{{$message}}</p>@enderror
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-auth-register @error('password') error-border @enderror" placeholder="*****">
                    @error('password') <p class="error-message">{{$message}}</p>@enderror
                </div>
                <div class="form-group">
                    <input type="password" style="width: 800px" name="password_confirmation" class="form-auth-register @error('password_confirmation') error-border @enderror" placeholder="*****">
                    @error('password_confirmation') <p class="error-message">{{$message}}</p>@enderror
                </div>
                <button type="submit" class="btn btn-primary btn-auth">Register</button>
            </form>
        </div>
    </div>
@endsection
