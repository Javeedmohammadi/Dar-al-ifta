<title>{{ __('msg.auth_home_title') }}</title>

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
        {{--  --}}
        @php
            $null_counter = 0;
        @endphp
        @foreach ($people as $person)
            @php
                $checkIfAnswered = $person->persondetail->answer ?? '';
            @endphp
            @if ($checkIfAnswered == null)
                @php
                    $null_counter++;
                @endphp
            @endif
        @endforeach
        {{--  --}}

        <div class="container mt-4">
            <div class="row justify-content-center m-1">
                <div class="p-4 alert alert-success rounded col-md-6" {{-- style="background: linear-gradient(to left, #14a061, #1eaf6e)" --}}>
                    <h3 class="text-center"><a href="{{ route('main_page.go', app()->getLocale()) }}"
                            class="list-group-item"><span
                                class="bi bi-app-indicator">&nbsp;&nbsp;</span>{{ __('msg.main_page_text') }}</a>
                        <hr>
                    </h3>
                    <h3>
                        <a href="{{ route('people', app()->getLocale()) }}" class="list-group-item">
                            <i class="bi bi-question-square">&nbsp;</i>
                            {{ __('msg.edit_question') }}
                            &nbsp;
                            <span class="badge rounded text-bg-warning">
                                @php
                                    print $null_counter;
                                @endphp
                            </span>
                        </a>
                    </h3>
                    <h3><a href="{{ route('scholar.index', app()->getLocale()) }}" class="list-group-item"><span
                                class="bi bi-people">&nbsp;&nbsp;</span>{{ __('msg.scholar_management') }}</a></h3>
                    <h3><a href="{{ route('artical.index', app()->getLocale()) }}" class="list-group-item"><span
                                class="bi bi-book">&nbsp;&nbsp;</span>{{ __('msg.article_management') }}</a></h3>
                    <h3><a href="{{ route('show.suggest.index', app()->getLocale()) }}" class="list-group-item"><span
                                class="bi bi-tag">&nbsp;&nbsp;</span>{{ __('msg.sugg_management') }}</a></h3>
                    <h3><a href="{{ route('index.info', app()->getLocale()) }}" class="list-group-item"><span
                                class="bi bi-info-square">&nbsp;&nbsp;</span>{{ __('msg.info_management') }}</a></h3>
                    <hr>
                    @if ($user->role == 1)
                        <div class="mt-4">
                            <h3 class="text-center rounded">
                                <a href="{{ route('show.system.users', app()->getLocale()) }}" class="list-group-item">
                                    <span class="bi bi-tools">&nbsp;&nbsp;</span>
                                    {{ __('msg.user_management') }}
                                </a>
                            </h3>
                        </div>
                    @else
                        <div class="mt-4">
                            <h1 class="text-center">{{ $user->name }}</h1>
                            <h4 class="text-center rounded">
                                {{ __('msg.user_normal_detail') }}
                            </h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
