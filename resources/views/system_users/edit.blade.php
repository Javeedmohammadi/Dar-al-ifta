<title>{{ __('msg.scholar_page') }}</title>

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

        <div {{-- style="background: linear-gradient(to left, #14a061, #1eaf6e)" --}} class="container col-md-6 alert alert-success mt-4" dir="rtl">

            <h1 class="text-center pt-2">{{ $user->name }}</h1>
            <h4 class="text-center">
                @if ($user->role == 1)
                    {{ __('msg.user_admin') }}
                @else
                    {{ __('msg.user_normal') }}
                @endif
                </h2>

                <form action="{{ route('user.edit.store', [app()->getLocale(), $user->id]) }}" method="post"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('put')
                    <div class="row mb-3">
                        <label for="system_username" class="col-form-label text-md-end">{{ __('msg.user_name') }}</label>
                        <div>
                            <input id="system_username" type="text"
                                class="form-control @error('system_username') is-invalid @enderror" name="system_username"
                                value="{{ $user->name }}" autocomplete="system_username" autofocus
                                placeholder="{{ __('msg.user_name') }}">
                            @error('system_username')
                                <span class="invalid-feedback text-white" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="system_useremail"
                            class="col-form-label text-md-end">{{ __('msg.email_address') }}</label>
                        <div>
                            <input id="system_useremail" type="text"
                                class="form-control @error('system_useremail') is-invalid @enderror" name="system_useremail"
                                value="{{ $user->email }}" autocomplete="system_useremail" autofocus
                                placeholder="{{ __('msg.email_address') }}">
                            @error('system_useremail')
                                <span class="invalid-feedback text-white" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="row mb-3">
                        <label for="system_userpassword"
                            class="col-form-label text-md-end">{{ __('msg.log_user_pass') }}</label>
                        <div>
                            <input id="system_userpassword" type="text"
                                class="form-control @error('system_userpassword') is-invalid @enderror"
                                name="system_userpassword" value="{{ $user->password }}"
                                autocomplete="system_userpassword" autofocus placeholder="{{ __('msg.log_user_pass') }}">
                            @error('system_userpassword')
                                <span class="invalid-feedback text-white" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}

                    @if (Auth::user()->role == '1')
                        @if ($user->email == 'romannajib20@gmail.com')
                        {{-- @if ($user->role == '1') --}}
                        @else
                            <div class="mt-2">
                                <label for="floatingInput" class="form-label">{{ __('msg.user_role') }}</label>
                                <select name="system_user_role" class="form-control">
                                    <option value="0">{{ __('msg.user_role') }}</option>
                                    <option value="1">{{ __('msg.user_admin') }}</option>
                                    <option value="0">{{ __('msg.user_normal') }}</option>
                                </select>
                            </div>
                        @endif
                    @endif

                    <div class="row mb-0 mt-2">
                        <div class="col-md-8 offset-md-0 mt-1">
                            <button type="submit" class="alert alert-success p-2">
                                <i class="bi bi-plus-square">&nbsp;</i>
                                {{ __('msg.edited_done') }}
                            </button>
                            <button class="alert alert-secondary mx-1 p-2">
                                <a class="nav-link" href="{{ route('show.system.users', app()->getLocale()) }}">
                                    <i class="bi bi-chevron-right"></i>
                                    {{ __('msg.edited_back') }}
                                </a>
                            </button>
                        </div>
                    </div>
                </form>
        </div>
    </body>

    </html>
@endsection
