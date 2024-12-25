@extends('main')
@section('title')
    Reset your password | NXLog PHP Test
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
                        Reset your password
                    </h5>
                </div>

                <div class="w-100">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" id="email" class="form-control" name="email"
                                    value="{{ old('email') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-3 mb-3">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <button class="btn btn-primary w-100">Send e-mail</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                            <small>
                                <a class="btn btn-link" href="/">Back to login</a>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
