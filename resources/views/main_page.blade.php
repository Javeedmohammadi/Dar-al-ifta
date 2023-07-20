<title>{{ __('msg.main_page') }}</title>
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

        <div style="background: linear-gradient(to left,#37b16a90, #53a374),url('/img/ryan.jpg');" dir="rtl"
            class="text-white rounded-bottom">
            <h1 class="text-white text-center p-4 mt-2" style="font-size: clamp(200%, 4vw, 5vw);">
                <i class="bi bi-quote"></i>
                {{ __('msg.main_page_title') }}
                <i class="bi bi-quote"></i>
            </h1>
            <hr>
            <h4 style="text-align-last: center" class="p-4 rounded text-white">
                {{ __('msg.answer_to_questions_more') }}
            </h4>
        </div>

        <div class="container">
            <div class="col-md-12" style="text-align-last: center">
                <h2 class="text-success pt-4">
                    {{ __('msg.example_question') }}
                </h2>
                <h4 class="p-4 rounded text-white" style="background: linear-gradient(to left,#14a061, #1eaf6e)">
                    {{ __('msg.answer_to_questions_more') }}
                </h4>
                <div style="background: linear-gradient(to left,#37b16a90, #53a374),url('/img/ryan.jpg');" dir="rtl"
                    class="bg-success text-white p-5 rounded">
                    <h1 class="p-2">مثال</h1>
                    <h2>{{ __('msg.question_detail') }}</h2>
                    <hr>
                    <h4>{{ __('msg.answer_detail') }}</h4>
                    <hr>
                    <h5 class="text-center m-0"><a href="{{ route('people.create', app()->getLocale()) }}"
                            class="btn btn-success m-0">
                            <i class="bi bi-question-square">&nbsp;</i>
                            {{ __('msg.question_page') }}
                        </a></h5>
                </div>
                <h2 class="text-success pt-4">
                    {{ __('msg.our_scholars') }}
                </h2>
                <div class="p-2 rounded text-white" style="background: linear-gradient(to left,#14a061, #1eaf6e)">
                    <h4 class="p-4">
                        {{ __('msg.our_scholar_desc') }}
                    </h4>
                    <h5 class="text-center p-2"><a href="{{ route('show.scholar', app()->getLocale()) }}"
                            class="btn btn-success">
                            <i class="bi bi-people">&nbsp;</i>
                            {{ __('msg.scholar_page') }}
                        </a></h5>
                </div>

                {{-- articles --}}
                <h2 class="text-success pt-4">
                    {{ __('msg.article_page') }}:
                </h2>
                <div class="p-2 rounded text-white" style="background: linear-gradient(to left,#14a061, #1eaf6e)">
                    <h4 class="p-4">
                        {{ __('msg.our_articles') }}
                    </h4>
                    <h5 class="text-center p-2"><a href="{{ route('show.articals', app()->getLocale()) }}"
                            class="btn btn-success">
                            <i class="bi bi-book">&nbsp;</i>
                            {{ __('msg.article_page') }}
                        </a></h5>
                </div>

                {{-- === --}}
                <div class="p-2 mt-3 rounded text-white" style="background: linear-gradient(to left,#14a061, #1eaf6e)">
                    <h2><span class="bi bi-quote">&nbsp;</span>{{ __('msg.your_suggs') }}<span
                            class="bi bi-quote">&nbsp;</span></h2>
                    <div class="carousel slide" data-bs-ride="carousel" id="carouselExampleControls">
                        {{-- <div class="carousel-indicators">
                        @php $icounter = 1; @endphp
                        @foreach ($sugg as $sg)
                            @if ($icounter == 1)
                                <button type="button" data-bs-target="carouselExampleControls" data-bs-slide-to="{{ $sg -> id }}" aria-current="true" class="active" aria-label="Slide 0"></button>
                                @php $icounter++ @endphp
                            @else
                                <button type="button" data-bs-target="carouselExampleControls" data-bs-slide-to="{{ $sg -> id }}" aria-label="{{ $sg -> id }}"></button>
                            @endif
                        @endforeach
                    </div>                                         --}}
                        <div class="carousel-inner">
                            <div class="contianer">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        @php $counter = 1; @endphp
                                        @foreach ($sugg as $sg)
                                            @if ($counter == 1)
                                                <div class="carousel-item active mt-2">
                                                    <h2 class="pt-2">{{ $sg->suggest_name }}</h2>
                                                    <p class="p-2">{{ $sg->suggest_desc }}</p>
                                                </div>
                                                @php $counter++ @endphp
                                            @else
                                                <div class="carousel-item mt-2">
                                                    <h2 class="pt-2">{{ $sg->suggest_name }}</h2>
                                                    <p class="p-2">{{ $sg->suggest_desc }}</p>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- === --}}
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    {{-- @foreach ($sugg as $sg)
                    <div class="bg-white rounded text-success" dir="rtl">
                        <h4 class="pt-2">{{ $sg->suggest_name }}</h4>
                        <p class="p-2">{{ $sg->suggest_desc }}</p>
                    </div>
                @endforeach --}}
                </div>
                <div class="container mt-4 px-4 col-md-10">
                    {{ $sugg->links('vendor.pagination.bootstrap-5') }}
                </div>
                {{-- === --}}

                {{-- more about site --}}
                <div class="mt-4">
                    <h4 class="text-center">{{ __('msg.find_more_content') }}</h4>
                </div>
            </div>

            <div class="col-md-12" dir="rtl">
                <footer class="row p-5 rounded-top bg-success text-white"
                    style="background: linear-gradient(to left,#14a06199, #1eaf6e),url('/img/ryan.jpg');">
                    <div class="col-md-4">
                        <h3 class="bg-white rounded text-success p-2">{{ __('msg.other_pages') }}</h3>
                        <div class="mt-2">
                            <h5><a href="{{ route('home.go', app()->getLocale()) }}" class="list-group-item"><span
                                        class="bi bi-search">&nbsp;&nbsp;</span>{{ __('msg.search_fitwa') }}</a></h5>
                            <h5><a href="{{ route('people.create', app()->getLocale()) }}" class="list-group-item"><span
                                        class="bi bi-question-square">&nbsp;&nbsp;</span>{{ __('msg.question_page') }}</a>
                            </h5>
                            <h5><a href="{{ route('person.get.all', app()->getLocale()) }}" class="list-group-item"><span
                                        class="bi bi-table">&nbsp;&nbsp;</span>{{ __('msg.all_fitwas_page') }}</a></h5>
                            <h5><a href="{{ route('show.scholar', app()->getLocale()) }}" class="list-group-item"><span
                                        class="bi bi-people">&nbsp;&nbsp;</span>{{ __('msg.scholar_page') }}</a></h5>
                            <h5><a href="{{ route('show.articals', app()->getLocale()) }}" class="list-group-item"><span
                                        class="bi bi-newspaper">&nbsp;&nbsp;</span>{{ __('msg.article_page') }}</a></h5>
                            <h5><a href="{{ route('show.suggest.objection', app()->getLocale()) }}"
                                    class="list-group-item"><span
                                        class="bi bi-journals">&nbsp;&nbsp;</span>{{ __('msg.suggestion_page') }}</a></h5>
                            <h5><a href="{{ route('show.information', app()->getLocale()) }}"
                                    class="list-group-item"><span
                                        class="bi bi-info-square">&nbsp;&nbsp;</span>{{ __('msg.information_page') }}</a>
                            </h5>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h3 class="bg-white rounded text-success p-2">{{ __('msg.contact_us') }}</h3>
                        <div class="mt-2">
                            <h5><a href="https://www.facebook.com" target="_blank" class="list-group-item"><span
                                        class="bi bi-facebook">&nbsp;&nbsp;</span>{{ __('msg.our_facebook') }}</a></h5>
                            <h5><a href="https://www.instagram.com" target="_blank" class="list-group-item"><span
                                        class="bi bi-instagram">&nbsp;&nbsp;</span>{{ __('msg.our_instagram') }}</a></h5>
                            <h5><a href="https://www.linkedin.com" target="_blank" class="list-group-item"><span
                                        class="bi bi-telegram">&nbsp;&nbsp;</span>{{ __('msg.our_telgram') }}</a></h5>
                            <h5><a href="https://www.whatsapp.com" target="_blank" class="list-group-item"><span
                                        class="bi bi-whatsapp">&nbsp;&nbsp;</span>{{ __('msg.our_whatsapp') }}</a></h5>

                            <h5><a href="mailto:romannajib20@gmail.com" target="_blank" class="list-group-item"><span
                                        class="bi bi-envelope-at">&nbsp;&nbsp;</span>{{ __('msg.mail_to') }}</a></h5>
                            <h5><a href="callto:+93779060700" target="_blank" class="list-group-item"><span
                                        class="bi bi-telephone-plus">&nbsp;&nbsp;</span>{{ __('msg.call_to') }}</a></h5>
                            <h5><a href="sms:0779060700:body:hello" target="_blank" class="list-group-item"><span
                                        class="bi bi-chat-left-text">&nbsp;&nbsp;</span>{{ __('msg.sms_to') }}</a></h5>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h3 class="bg-white rounded text-success p-2">{{ __('msg.other_islamic_sites') }}</h3>
                        <div class="mt-2">
                            <h5><a href="https://www.google.com" target="_blank" class="list-group-item"><span
                                        class="bi bi-book">&nbsp;&nbsp;</span>{{ __('msg.first_islamic_page') }}</a></h5>
                            <h5><a href="https://www.google.com" target="_blank" class="list-group-item"><span
                                        class="bi bi-book">&nbsp;&nbsp;</span>{{ __('msg.second_islamic_page') }}</a></h5>
                            <h5><a href="https://www.google.com" target="_blank" class="list-group-item"><span
                                        class="bi bi-book">&nbsp;&nbsp;</span>{{ __('msg.third_islamic_page') }}</a></h5>
                            <h5><a href="https://www.google.com" target="_blank" class="list-group-item"><span
                                        class="bi bi-book">&nbsp;&nbsp;</span>{{ __('msg.fourth_islamic_page') }}</a></h5>
                            <h5><a href="https://www.google.com" target="_blank" class="list-group-item"><span
                                        class="bi bi-book">&nbsp;&nbsp;</span>{{ __('msg.fifth_islamic_page') }}</a></h5>
                        </div>
                    </div>
                    <h4 class="text-center p-4">&copy;&nbsp;{{ __('msg.cpoy_right') }}&nbsp;۲۰۲۳</h4>
                </footer>
            </div>
        </div>


    </body>

    </html>
@endsection
