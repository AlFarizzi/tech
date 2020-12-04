@extends('index')

@section('content')
    @push('style')
        <link rel="stylesheet" href="/assets/css/auth.css">
    @endpush
    <div class="row">
        <div class="col center-panel">
            <div class="card">
                <img src="/assets/img/logo.png" alt="logo tech" class="login-logo">
                <div class="register-panel">
                    <form action="{{route('register')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="" class="form-label">Nama</label>
                            <input type="text" name="nama"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Username</label>
                            <input type="text" name="username"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Email</label>
                            <input type="email" name="email"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Password</label>
                            <input type="password" name="password"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Password Confirmation</label>
                            <input type="password" name="password_confirmation"  class="form-control">
                        </div>
                        <button type="submit" class="btn-login">Continue</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
