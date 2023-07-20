<title>{{ $person->person_question }}</title>

@extends('layouts.app')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{asset('/css/app.css')}}">


    </head>

    <body>
        <div dir="rtl" class="table-responsive container mt-4 mb-4 col-md-10 rounded text-white"
            style="background: linear-gradient(to left, #14a061, #1eaf6e)">
            <div class="container">
                <h1 class="pt-4 text-center">
                    <i class="bi bi-quote"></i>
                    {{ $person->person_full_name }}
                    <i class="bi bi-quote"></i>
                </h1>
                <hr>
                <h4>{{ __('msg.fitwa_question') }}:-</h4>
                <p class="p-3" style="text-align-last: center">
                    {!! $person->person_question !!}
                </p>
                <hr>
                <div class="alert alert-secondary">
                    {{-- @if (app() -> getLocale() == 'ps' ) --}}
                    <h4 class="text-center p-2">
                        <i class="bi bi-quote"></i>
                        {!! __('msg.answer_in_ps') !!}
                        <i class="bi bi-quote"></i>
                    </h4>
                    <p style="text-align: justify; text-align-last: center;">
                        {!! $person->persondetail->answer ?? __('msg.fitwat_not_yet_1') !!}
                    </p>

                    {{-- @else --}}
                    <h4 class="text-center p-2">
                        <i class="bi bi-quote"></i>
                        {{ __('msg.answer_in_dr') }}
                        <i class="bi bi-quote"></i>
                    </h4>

                    <p style="text-align: justify; text-align-last: center;">
                        {!! $person->persondetail->answerBy ?? __('msg.fitwat_not_yet_2') !!}
                    </p>
                    {{-- @endif --}}
                </div>
            </div>
            <div class="accordion my-2" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            {{ __('msg.more_about_fitwa') }}
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <table class="table" {{-- style="background: linear-gradient(to left, #14a061, #1eaf6e)"                     --}}>
                                <tr>
                                    <th>{{ __('msg.all_views') }}</th>
                                    <td>{{ $person->views_counter }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('msg.questioned_at') }}</th>
                                    <td>{{ $person->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('msg.answered_at') }}</th>
                                    <td>{{ $person->persondetail->created_at ?? __('') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button class="alert alert-primary p-2">
                    <a href="{{ route('person.get.all', app()->getLocale()) }}" class="nav-link">
                        <i class="bi bi-chevron-right"></i>
                        {{ __('msg.all_fitwas_page') }}
                    </a>
                </button>
                <button class="alert alert-info p-2">
                    <a href="{{ route('home.go', app()->getLocale()) }}" class="nav-link">
                        <i class="bi bi-search">&nbsp;</i>
                        {{ __('msg.search_ft') }}
                    </a>
                </button>
            </div>

    </body>

    </html>
@endsection
