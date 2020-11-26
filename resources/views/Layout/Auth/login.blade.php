@extends('index')

@section('content')
    @push('style')
        <link rel="stylesheet" href="/assets/css/auth.css">
    @endpush
    <div class="row">
        <div class="col center-panel">
            <div class="card">
                <img src="/assets/img/logo.png" alt="logo tech" class="login-logo">
                <div class="login-panel">
                    <form action="{{route('login')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="" class="form-label">Username</label>
                            <input type="text" name="username"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Password</label>
                            <input type="password" name="password"  class="form-control">
                        </div>
                        <button type="submit" class="btn-login">Continue</button>
                    </form>
                </div>
                <div class="forgot-panel">
                    <a href="" class="forgot">i forgot my password &#x1F641;</a>
                </div>
            </div>
        </div>
    </div>
@endsection
