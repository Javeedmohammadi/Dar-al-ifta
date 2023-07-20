

@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div 
            class="col-md-6 rounded"
            style="background: linear-gradient(to left, #14a061, #1eaf6e)"
        >
            <div class="text-white">
                <h2 class="text-center mt-4">{{ __('Reset Password') }}</h2>

                <div class="p-4">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email', app()->getLocale()) }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="email" class="form-label" dir="rtl">{{ __('msg.log_user_name') }}</label>
                            <div>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="{{ __('msg.log_user_name') }}">
                                @error('email')
                                    <span class="invalid-feedback text-white" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">
                                    {{ __('msg.pass_reset_link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
