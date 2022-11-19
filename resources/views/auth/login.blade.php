@extends('layouts.app')

@section('title', 'Login')
@section('content')
<div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
            <div class="card mb-3">
              <div class="card-body">                

                <form class="row g-3 mt-2 needs-validation" novalidate action="{{ route('login') }}" method="POST">
                    @csrf
                  <div class="col-12">
                    <div class="input-group has-validation">
                      <input type="text" name="email" class="form-control" id="email" placeholder="Enter e-mail" required>
                      <div class="invalid-feedback">Please enter your email</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <input type="password" name="password" class="form-control" id="yourPassword" placeholder="Enter password" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>

                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Login</button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>

    </section>

  </div>
@endsection