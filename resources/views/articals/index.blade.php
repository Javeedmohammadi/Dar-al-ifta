
<title>{{ __('msg.article_page') }}</title>

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

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div>
                    <button class="d-inline alert alert-secondary p-2">
                        <a class="list-group-item" href="{{ route('home', app()->getLocale()) }}" class="nav-link">
                            <i class="bi bi-tools">&nbsp;</i>
                            {{ __('msg.CMS') }}
                        </a>
                    </button>
                    <button class="alert alert-success mx-1 p-2">
                        <a
                            href="{{ route('create.artical', app()->getLocale()) }}"
                            class="nav-link">
                            <i class="bi bi-plus-square">&nbsp;</i>
                            {{ __('msg.add_article') }}
                        </a>
                    </button>
                </div>

                @foreach ($articals as $artical)
                    <div
                        {{-- style="background: linear-gradient(to left, #14a061, #1eaf6e)" --}}
                        class="alert alert-success"
                    >
                        <h2 class="text-center">
                            <i class="bi bi-quote"></i>
                            {{ $artical -> artical_name }}
                            <i class="bi bi-quote"></i>
                        </h4>
                        <h4>{{ $artical -> artical_source }}</h4>
                        <hr>
                        <p class="p-2" style="text-align-last: center">
                            {{ $artical -> artical_desc }}
                        </p>
                        <hr>
                        <form
                            action="{{ route('remove.artical', [app()->getLocale(), $artical -> id]) }}"
                            method="post"
                            class="d-inline m-0"
                            >
                            @method('DELETE')
                            {{ csrf_field() }}
                            <button type="submit" id="ds" class="alert alert-danger p-2">
                                {{ __('msg.remove_article') }}
                                <i class="bi bi-trash3"></i>
                            </button>
                        </form>
                    </div>
                @endforeach

                <div class="my-3">
                    {{ $articals -> links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

</body>
</html>

@endsection
