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

        <div class="container col-md-8 mt-4" dir="rtl">
            <div class="alert alert-success">
                <h3 class="text-center">
                    <i class="bi bi-quote"></i>
                    {{ __('msg.add_scholar') }}
                    <i class="bi bi-quote"></i>
                </h3>
                <hr>
                <form
                    action="{{ route('store.scholar', app()->getLocale()) }}"
                    method="post"
                    enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <div class="col-md-12">
                        <label for="scholar_name" class="form-label">{{ __('msg.full_name') }}</label>
                        <div>
                            <input id="scholar_name" type="text"
                                class="form-control @error('scholar_name') is-invalid @enderror" name="scholar_name"
                                value="{{ old('scholar_name') }}" autocomplete="scholar_name" autofocus
                                placeholder="{{ __('msg.full_name') }}">
                            @error('scholar_name')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <h6>* {{ $message }}</h6>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="scholar_self_desc" class="form-label">{{ __('msg.scholar_desc') }}</label>
                        <div>
                            <textarea id="scholar_self_desc" style="height: 40vh" type="text"
                                class="form-control @error('scholar_self_desc') is-invalid @enderror" name="scholar_self_desc"
                                autocomplete="scholar_self_desc" placeholder="{{ __('msg.scholar_desc') }}">{{ old('scholar_self_desc') }}</textarea>
                            @error('scholar_self_desc')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>* {{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-2">
                        <div class="col-md-8 offset-md-0">
                            <button type="submit" class="p-2 alert alert-primary">
                                <i class="bi bi-plus-square">&nbsp;</i>
                                {{ __('msg.edited_done') }}
                            </button>
                            <button class="p-2 alert alert-secondary mx-1">
                                <a class="nav-link" href="{{ route('scholar.index', app()->getLocale()) }}">
                                    <i class="bi bi-chevron-right">&nbsp;</i>
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
