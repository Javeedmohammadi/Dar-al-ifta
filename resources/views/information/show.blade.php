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
        <div id="welcome-contianer" class="mb-4">
            <div class="item-1">
                <div class="p-2 rounded text-white"
                    style="background: linear-gradient(to left, #14a061, #1eaf6e); text-align: justify;">
                    <h1 class="text-center my-2">
                        <i class="bi bi-quote"></i>
                        {{ __('msg.web_info') }}
                        <i class="bi bi-quote"></i>
                        <hr>
                    </h1>
                    @foreach ($information as $info)
                        <p class="p-3" style="text-align-last: center">{{ $info->info_desc }}</p>
                    @endforeach
                </div>
            </div>
            <div class="item-2" id="pc-side-bar">
                <x-side_bar />
            </div>
        </div>

    </body>

    </html>
@endsection
