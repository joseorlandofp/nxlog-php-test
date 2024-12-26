@extends('main')
@section('title')
    Sign Up | NXLog PHP Test
@endsection

@section('body')
    <div class="container">
        <div class="d-flex align-items-center justify-content-center vh-100 flex-column">
            <div class="col-lg-6 login-section p-5">
                <div class="w-100 text-center">
                    <img class="logo mb-3" src="{{ URL::asset('assets/img/logo.png') }}" alt="NXLog Logo">
                </div>

                <div class="w-100 text-center">
                    <h5 class="text-muted">
                        Please fill out the form down below to create an account
                    </h5>
                </div>

                <form method="POST" action="/register">
                    @csrf

                    <div class="w-100">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" id="name" class="form-control" name="name"
                                        value="{{ old('name') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input type="email" id="email" class="form-control" name="email"
                                        value="{{ old('email') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" id="password" class="form-control" minlength="8" name="password" required>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="password-confirmation" class="form-label">Password confirmation</label>
                                    <input type="password" id="password-confirmation" minlength="8" class="form-control"
                                        name="password_confirmation" required>
                                </div>
                            </div>
                        </div>



                        <div class="row justify-content-center mt-3 mb-3">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                            </div>
                        </div>
                </form>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                        <small>
                            <a class="btn btn-link" href="/">Already an account? Login</a>
                        </small>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
