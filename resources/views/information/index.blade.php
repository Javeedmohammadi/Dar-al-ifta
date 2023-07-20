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
                        <button class="alert alert-success p-2 mx-1">
                            <a href="{{ route('create.information', app()->getLocale()) }}" class="nav-link">
                                {{ __('msg.add_new_info') }}
                            </a>
                        </button>
                    </div>
                    @foreach ($information as $info)
                        <div {{-- style="background: linear-gradient(to left, #14a061, #1eaf6e)" --}} class="alert alert-success">
                            <h2 class="text-center">{{ __('msg.web_info') }}</h2>
                            <hr>
                            <p class="p-2">{{ $info->info_desc }}</p>
                            <hr>
                            <div>
                                <form action="{{ route('remove.info', [app()->getLocale(), $info->id]) }}" method="post"
                                    class="d-inline m-0">
                                    @method('DELETE')
                                    {{ csrf_field() }}
                                    <button type="submit" id="ds" class="alert alert-danger p-2">
                                        {{ __('msg.delete_scholar') }}
                                        &nbsp;
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </body>

    </html>
@endsection
