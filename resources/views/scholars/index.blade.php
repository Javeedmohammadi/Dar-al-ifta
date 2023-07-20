<title>{{ __('msg.scholar_management') }}</title>

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
                <div class="col-md-10 my-1">
                    <button class="d-inline alert alert-secondary p-2">
                        <a class="list-group-item" href="{{ route('home', app()->getLocale()) }}" class="nav-link">
                            <i class="bi bi-tools">&nbsp;</i>
                            {{ __('msg.CMS') }}
                        </a>
                    </button>
                    <button class="p-2 alert alert-success mx-1">
                        <a class="list-group-item" href="{{ route('create.scholar', app()->getLocale()) }}">
                            <i class="bi bi-plus-square">&nbsp;</i>
                            {{ __('msg.add_scholar') }}
                        </a>
                    </button>
                </div>

                <div class="container col-md-10">
                    @foreach ($scholars as $scholar)
                        <div
                            {{-- style="background: linear-gradient(to left, #14a061, #1eaf6e)" --}}
                            class="p-2 alert alert-success rounded mt-1">
                            <h2 class="text-center p-2">
                                <i class="bi bi-quote"></i>
                                {{ $scholar->scholar_name }}
                                <i class="bi bi-quote"></i>
                            </h2>
                            <hr>
                            <p class="card-text p-3" style="text-align: justify;text-align-last: center;">
                                {{ $scholar->scholar_self_desc }}
                            </p>
                            <hr>
                            <form action="{{ route('remove.scholar', [app()->getLocale(), $scholar->id]) }}"
                                method="post" class="d-inline m-0">
                                @method('DELETE')
                                {{ csrf_field() }}
                                <button type="submit" class="alert alert-danger" style="padding: 10px;">
                                    {{ __('msg.edit_question_delete') }}
                                    &nbsp;
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                            <a
                            class="alert alert-primary" style="text-decoration: none; padding: 8px;"
                                href="{{ route('edit.scholar', [app()->getLocale(), $scholar->id]) }}">
                                {{ __('msg.edit_scholar') }}
                                &nbsp;
                                <i class="bi bi-pencil"></i>
                            </a>
                        </div>
                    @endforeach
                    <div class="m-2">
                        {{ $scholars->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
