
<title>{{ __('msg.question_page') }}</title>



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

        <div class="mb-4" id="welcome-contianer">
            <div class="item-1">
                <h3 class="p-2 mt-4 mb-2 text-white rounded"
                    style="text-align-last: center;background: linear-gradient(to left, #14a061, #1eaf6e); text-align: justify;">
                    {{ __('msg.example_question') }}
                </h3>

                <div class="p-2">
                    <form action="{{ route('store.person', app()->getLocale()) }}" method="post"
                        enctype="multipart/form-data" class="row g-3 needs-validation text-white" style="direction: rtl">
                        {{ csrf_field() }}
                        <div class="col-md-4">
                            <label for="fullname" class="form-label">{{ __('msg.full_name') }}</label>
                            <div>
                                <input id="fullname" type="text"
                                    class="form-control @error('fullname') is-invalid @enderror" name="fullname"
                                    value="{{ old('fullname') }}" autocomplete="fullname" autofocus
                                    placeholder="{{ __('msg.full_name') }}">
                                @error('fullname')
                                    <span class="invalid-feedback text-white" role="alert">
                                        <h6>* {{ $message }}</h6>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="phone" class="form-label">{{ __('msg.phone_number') }}</label>
                            <div>
                                <input id="phone" type="text"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ old('phone') }}" autocomplete="phone" autofocus
                                    placeholder="{{ __('msg.phone_number') }}">
                                @error('phone')
                                    <span class="invalid-feedback text-white" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="email" class="form-label">{{ __('msg.email_address') }}</label>
                            <div>
                                <input id="email" type="text"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" autocomplete="email" autofocus
                                    placeholder="{{ __('msg.email_address') }}">
                                @error('email')
                                    <span class="invalid-feedback text-white" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="question" class="form-label">{{ __('msg.question_') }}</label>
                            <div>
                                <textarea id="task-area" style="height: 40vh; color:#000000" type="text" 
                                    class="form-control @error('question') is-invalid @enderror" name="question" autocomplete="email"
                                    placeholder="{{ __('msg.question_') }}">{{ old('question') }}</textarea>
                                @error('question')
                                    <span class="invalid-feedback text-white" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="fathername" class="form-label">{{ __('msg.short_query') }}</label>
                            <div>
                                <input id="fathername" type="text"
                                    class="form-control @error('fathername') is-invalid @enderror" name="fathername"
                                    value="{{ old('fathername') }}" autocomplete="fathername" autofocus
                                    placeholder="{{ __('msg.short_query_desc') }}">
                                @error('fathername')
                                    <span class="invalid-feedback text-white" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="offset-md-0 mt-3">
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-plus-square">&nbsp;</i>
                                    {{ __('msg.submit_question') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="item-2" id="pc-side-bar">
                <x-side_bar />
            </div>
        </div>

    </body>

    </html>
@endsection
@section('script3')
<script>
    ClassicEditor
        .create( document.querySelector( '#task-area' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
