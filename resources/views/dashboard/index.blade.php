@extends('main')
@section('title')
    Dashboard | NXLog PHP Test
@endsection

@section('body')
    <div class="container">
        <div class="d-flex align-items-center justify-content-center flex-column">
            <div class="col-lg-12 login-section p-5">
                <div class="w-100 d-flex align-items-center justify-content-between">
                    <div>
                        <img class="logo mb-3" src="{{ URL::asset('assets/img/logo.png') }}" alt="NXLog Logo">
                    </div>
                    <div>
                        <small>
                            <a class="btn btn-link" href="/logout">Logout</a>
                        </small>

                    </div>
                </div>

                <div class="w-100 text-center">
                    @if ($linkedinApiResponse)
                        <img class="avatar" src="{{ $linkedinApiResponse->getAvatar() }}"
                            alt="Profile picture for {{ $user->name }}">
                    @endif
                    <h5 class="text-muted">
                        Hello, {{ $user->name }}
                    </h5>

                    @if (!$linkedinApiResponse)
                        <small class="text-muted">
                            Your account was created locally. To view the api response, please logout and authenticate using your linkedin account.
                        </small>
                    @endif
                </div>

                <div class="w-100 mt-3">
                    @if ($linkedinApiResponse)
                        <small class="text-muted">
                            this is the response from linkedin authentication api
                        </small>
                        <div>
                            <pre>
                                {{ json_encode($linkedinApiResponse, JSON_PRETTY_PRINT) }}
                            </pre>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
