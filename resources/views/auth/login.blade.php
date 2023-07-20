<title>{{ __('msg.login') }}</title>

@extends('layouts.app')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

    </head>

    <body>

        <div class="container mt-5" id="login-form">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="p-4 rounded text-white" style="background: linear-gradient(to left, #14a061, #1eaf6e)"
                        dir="rtl">
                        <h2 class="text-center">{{ __('msg.login') }}</h2>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login', app()->getLocale()) }}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="email" class="col-form-label">{{ __('msg.log_user_name') }}</label>
                                    <div>
                                        <input id="email" type="text" placeholder="{{ __('msg.log_user_name') }}"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" autocomplete="off" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback text-white" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('msg.log_user_pass') }}</label>
                                    <div class="">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            autocomplete="current-password" placeholder="{{ __('msg.log_user_pass') }}">
                                        @error('password')
                                            <span class="invalid-feedback text-white" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-check-label" for="remember">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                {{ __('msg.log_user_rem') }}
                                        </label>
                                    </div>
                                </div>
                        </div>

                        <div class="row mb-0 text-center">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-person-up">&nbsp;</i>
                                    {{ __('msg.login') }}
                                </button>
                            </div>
                            <div class="">
                                @if (Route::has('password.request'))
                                    <a class="nav-link d-inline mx-2"
                                        href="{{ route('password.request', app()->getLocale()) }}">
                                        {{ __('msg.log_user_forget') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </body>

    </html>
@endsection
