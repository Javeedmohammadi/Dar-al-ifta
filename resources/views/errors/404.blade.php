
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('msg.not_admin') }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        @font-face {
            font-family: BAB;
            src: url('/new_fonts/Bahij Baraem-Regular.ttf');
        }
        @font-face {
            font-family: BNB;
            src: url('/fonts/nazanin/BahijNazanin-Bold.ttf');
        }

        body {
            font-family: bab;
        }
    </style>

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
                <h1 class="text-warning text-center">{{ __('msg.not_found') }}</h1>
                <hr>
                <div class="card-body">
                    <div class="text-center">
                        <h3><a class="list-group-item" href="{{ route('main_page.go', app() -> getLocale()) }}">{{ __('msg.main_page_text') }}</a></h3>
                        <h3><a class="list-group-item" href="" onclick="windo.location.reload()">&#8635;{{ __('msg.try_again') }}</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>
</html>
