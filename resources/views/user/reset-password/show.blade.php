@extends('main')
@section('title')
    Create your new password | NXLog PHP Test
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
                        Hello again, {{ $user->name }}.<br> Please, create your new password
                    </h5>
                </div>

                <form method="POST" action="/reset-password/reset">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="w-100">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" id="email" class="form-control" name="password" required>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="password-confirmation" class="form-label">Password confirmation</label>
                                    <input type="password" id="password-confirmation" class="form-control"
                                        name="password_confirmation" required>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3 mb-3">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <button class="btn btn-primary w-100">Reset password</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
