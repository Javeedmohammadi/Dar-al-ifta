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

        <div id="welcome-contianer">
            <div class="item-1">
                @foreach ($articals as $artical)
                    <div class="p-4 mt-2 text-white rounded" style="background: linear-gradient(to left, #14a061, #1eaf6e)">
                        <h1 class="text-center">
                            <i class="bi bi-quote"></i>
                            {{ $artical->artical_name }}
                            <i class="bi bi-quote"></i>
                        </h1>
                        <h4>
                            {{ __('msg.article_source') }}:-&nbsp;&nbsp;
                            {{ $artical->artical_source }}
                        </h4>
                        <hr>
                        <div style="text-align: justify;" class="p-4">
                            <h4>{{ __('msg.article_desc') }} ...</h4>
                            <p style="text-align-last: center">
                                {{ $artical->artical_desc }}
                            </p>
                        </div>
                        <hr>
                    </div>
                @endforeach
            </div>
            <div class="item-2" id="pc-side-bar">
                <x-side_bar />
            </div>
        </div>
        <div class="col-md-8 p-4">
            {{ $articals->links('vendor.pagination.bootstrap-5') }}
        </div>

    </body>

    </html>
@endsection
