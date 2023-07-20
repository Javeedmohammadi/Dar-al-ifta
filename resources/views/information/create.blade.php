<title>{{ __('msg.information_page') }}</title>

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

        <div class="col-md-8 container mt-4" dir="rtl">
            <div class="alert alert-success">
                <h2 class="text-center mb-3">
                    <i class="bi bi-quote"></i>
                    {{ __('msg.add_new_info') }}
                    <i class="bi bi-quote"></i>
                </h2>
                <form action="{{ route('store.informatino', app()->getLocale()) }}" method="post"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="col-md-12">
                        {{-- <label for="info_desc" class="form-label">{{ __('msg.add_new_info') }}</label> --}}
                        <div>
                            <textarea style="height: 40vh;" id="info_desc" type="text"
                                class="form-control @error('info_desc') is-invalid @enderror" name="info_desc" value="{{ old('info_desc') }}"
                                autocomplete="info_desc" autofocus placeholder="{{ __('msg.add_new_info') }} ..."></textarea>
                            @error('info_desc')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <h6>* {{ $message }}</h6>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="mt-3">
                            <button type="submit" class="alert alert-primary p-2">
                                <i class="bi bi-check-square">&nbsp;</i>
                                {{ __('msg.edited_done') }}
                            </button>
                            <button class="alert alert-secondary p-2 mx-1">
                                <a class="nav-link" href="{{ route('index.info', app()->getLocale()) }}">
                                    <i class="bi bi-chevron-right"></i>
                                    {{ __('msg.edited_back') }}
                                </a>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </body>

    </html>
@endsection
