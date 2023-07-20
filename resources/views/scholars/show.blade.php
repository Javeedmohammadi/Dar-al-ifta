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
        <div id="welcome-contianer">
            <div class="item-1">
                @foreach ($scholars as $scholar)
                    <div class="text-white" dir="rtl">
                        <h1 class="text-center mt-3">
                            <i class="bi bi-quote"></i>
                            {{ $scholar->scholar_name }}
                            <i class="bi bi-quote"></i>
                        </h1>
                        <hr>
                        <div class="px-4 pb-3" style="text-align: justify; text-align-last: center;">
                            {{ $scholar->scholar_self_desc }}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="item-2" id="pc-side-bar">
                <x-side_bar />
            </div>
        </div>

        <div class="containert col-md-10">


            <div class="mt-3">
                {{ $scholars->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>


    </body>

    </html>
@endsection
