@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h3>Sign Up</h3>
                </div>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <input id="name" name="name" type="text" class="form-control" required autocomplete="name" autofocus>
                        <label for="name">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input id="email" name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required autocomplete="email">
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input id="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required autocomplete="new-password">
                        <label for="password">Password</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        <label for="password-confirm">Confirm Password</label>
                    </div>
                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.footer')