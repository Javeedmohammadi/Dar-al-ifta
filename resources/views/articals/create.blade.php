
<title>{{ __('msg.add_article') }}</title>

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

    <div class="container col-md-8 mt-4 alert alert-success" dir="rtl">
        <h3 class="text-center">{{ __('msg.add_article') }}</h3>
        <hr>
        <form
            action="{{ route('store.artical', app()->getLocale()) }}"
            method="post"
            enctype="multipart/form-data"
        >
        {{ csrf_field() }}
            <div class="col-md-12">
                <label for="artical_name" class="form-label">{{ __('msg.article_name') }}</label>
                <div>
                    <input id="artical_name" type="text" class="form-control @error('artical_name') is-invalid @enderror" name="artical_name" value="{{ old('artical_name') }}" autocomplete="artical_name" autofocus placeholder="{{ __('msg.article_name') }}">
                    @error('artical_name')
                    <span class="invalid-feedback text-danger" role="alert">
                        <h6>* {{ $message }}</h6>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12 my-2">
                <label for="artical_desc" class="form-label">{{ __('msg.article_desc') }}</label>
                <div>
                    <textarea id="artical_desc" style="height: 40vh" type="text" class="form-control @error('artical_desc') is-invalid @enderror" name="artical_desc" autocomplete="artical_desc" placeholder="{{ __('msg.article_desc') }}">{{ old('artical_desc') }}</textarea>
                    @error('artical_desc')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12 mb-2">
                <label for="artical_source" class="form-label">{{ __('msg.article_source') }}</label>
                <div>
                    <textarea id="artical_source" style="height: 10vh" type="text" class="form-control @error('artical_source') is-invalid @enderror" name="artical_source" autocomplete="artical_source" placeholder="{{ __('msg.article_source') }}">{{ old('artical_source') }}</textarea>
                    @error('artical_source')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-0">
                <div class="col-md-8 offset-md-0 mt-2">
                    <button type="submit" class="alert alert-primary p-2">
                        <i class="bi bi-check-square">&nbsp;</i>
                        {{ __('msg.edited_done') }}
                    </button>
                    <button class="alert alert-secondary mx-1 p-2">
                        <a
                            class="nav-link"
                            href="{{route('artical.index', app()->getLocale())}}">
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
