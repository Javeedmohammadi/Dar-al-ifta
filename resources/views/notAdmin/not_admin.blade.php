
<title>{{ __('msg.not_admin') }}</title>
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
    
    <div class="container mt-5" id="login-form">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div 
                class="p-4 rounded text-white"
                style="background: linear-gradient(to left, #14a061, #1eaf6e)"
                dir="rtl"
            >
                <h2 class="text-center">{{ __('msg.not_admin') }}</h2>
                <div class="card-body">
                    {{-- <div class="text-center m-1">
                        <a class="btn btn-warning" href="{{ route('main_page.go', app() -> getLocale()) }}">
                            &nbsp;&nbsp;<h4>{{ __('msg.main_page_text') }}</h4>
                        </a>
                    </div> --}}
                    <div class="text-center">
                        <button class="btn btn-warning mt-4" onclick="window.history.back()">
                            <h3 class="mt-1">{{ __('msg.edited_back') }}</h3>
                        </button>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    </div>

</body>
</html>
@endsection
