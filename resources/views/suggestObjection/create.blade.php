<title>{{ __('msg.suggestion_page') }}</title>

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

        <div class="mb-4" id="welcome-contianer">
            <div class="item-1">
                <h4 class="p-4 pb-1 pt-1 mt-4 text-white rounded"
                    style="text-align-last: center;background: linear-gradient(to left, #14a061, #1eaf6e); text-align: justify;">
                    {{ __('msg.suggession_text') }}
                    <hr>
                </h4>
                <div class="p-2">
                    <form action="{{ route('store.sug_obj', app()->getLocale()) }}" method="post"
                        enctype="multipart/form-data" class="row g-3 needs-validation text-white" style="direction: rtl">
                        {{ csrf_field() }}
                        <div class="col-md-4">
                            <label for="suggest_name" class="form-label">{{ __('msg.full_name') }}</label>
                            <div>
                                <input id="suggest_name" type="text"
                                    class="form-control @error('suggest_name') is-invalid @enderror" name="suggest_name"
                                    value="{{ old('suggest_name') }}" autocomplete="fullname" autofocus
                                    placeholder="{{ __('msg.full_name') }}">
                                @error('suggest_name')
                                    <span class="invalid-feedback text-white" role="alert">
                                        <h6>* {{ $message }}</h6>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="suggest_phone" class="form-label">{{ __('msg.phone_number') }}</label>
                            <div>
                                <input id="suggest_phone" type="text"
                                    class="form-control @error('suggest_phone') is-invalid @enderror" name="suggest_phone"
                                    value="{{ old('suggest_phone') }}" autocomplete="suggest_phone"
                                    placeholder="{{ __('msg.phone_number') }}">
                                @error('suggest_phone')
                                    <span class="invalid-feedback text-white" role="alert">
                                        <h6>* {{ $message }}</h6>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="suggest_email" class="form-label">{{ __('msg.email_address') }}</label>
                            <div>
                                <input id="suggest_email" type="text"
                                    class="form-control @error('suggest_email') is-invalid @enderror" name="suggest_email"
                                    value="{{ old('suggest_email') }}" autocomplete="suggest_email"
                                    placeholder="{{ __('msg.email_address') }}">
                                @error('suggest_email')
                                    <span class="invalid-feedback text-white" role="alert">
                                        <h6>* {{ $message }}</h6>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="suggest_desc" class="form-label">{{ __('msg.suggession') }}</label>
                            <div>
                                <textarea id="suggest_desc" style="height: 40vh" type="text"
                                    class="form-control @error('suggest_desc') is-invalid @enderror" name="suggest_desc" autocomplete="suggest_desc"
                                    placeholder="{{ __('msg.suggession') }}">{{ old('suggest_desc') }}</textarea>
                                @error('suggest_desc')
                                    <span class="invalid-feedback text-white" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-1 mt-2">
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-plus-square">&nbsp;</i>
                                {{ __('msg.submit_sugg') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="item-2" id="pc-side-bar">
                <x-side_bar />
            </div>
        </div>

    </body>

    </html>
@endsection
