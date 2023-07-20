<title>{{ __('msg.edit_question_edit') }}</title>

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

        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-10 alert alert-success">
                    <div dir="rtl">
                        <h2 class="p-3 m-0 text-center">
                            <i class="bi bi-quote"></i>
                            {!! $person->person_full_name !!}
                            <i class="bi bi-quote"></i>
                        </h2>
                        <div>
                            <div class="accordion accordion mb-2" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne" aria-expanded="false"
                                            aria-controls="flush-collapseOne">
                                            <h4>{{ __('msg.edited_question') }}</h4>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body" style="text-align: justify; text-align-last: center;">
                                            {!! $person->person_question !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form method="post"
                                action="{{ route('person.update.detail', [app()->getLocale(), $person_id]) }}"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div>
                                    <label for="answer" class="form-label">{{ __('msg.edited_answer_ps') }}</label>
                                    <div>
                                        <textarea style="height: 30vh;" id="answer" type="text" class="task-area form-control @error('answer') is-invalid @enderror"
                                            name="answer" autocomplete="answer" autofocus placeholder="{{ __('msg.edited_answer_ps') }}">{{$person->persondetail->answer ?? '' }}</textarea>
                                        @error('answer')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <h6>
                                                    * {{ $message }}
                                                </h6>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mt-2">
                                    <label for="answerby" class="form-label">{{ __('msg.edited_answer_dr') }}</label>
                                    <div>
                                        <textarea style="height: 30vh;" value="{{ $person->persondetail->answerBy ?? '' }}" id="description" 
                                            type="text" class="form-control @error('answerby') is-invalid @enderror"
                                            name="answerby" autocomplete="answerby"
                                            placeholder="{{ __('msg.edited_answer_dr') }}"></textarea>
                                        @error('answerby')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <h6>
                                                    * {{ $message }}
                                                </h6>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-0 mt-3">
                                        <button type="submit" class="alert alert-primary" style="padding: 10px;">
                                            <i class="bi bi-check2-circle">&nbsp;</i>
                                            {{ __('msg.edited_done') }}
                                        </button>
                                        <a href="{{ route('people', app()->getLocale()) }}" class="alert alert-secondary"
                                            style="text-decoration: none; padding: 8px;">
                                            <i class="bi bi-chevron-right"></i>
                                            {{ __('msg.edited_back') }}
                                        </a>
                                        <button class="btn btn-light mx-1">
                                            @php
                                                print "<a href='mailto:$person->person_email' class='nav-link' target='_blank'>";
                                            @endphp
                                            <i class="bi bi-whatsapp" class="alert alert-primary"
                                                style="text-decoration: none; padding: 8px;"></i>
                                            {{ __('msg.edited_wl') }}
                                            @php
                                                print '</a>';
                                            @endphp
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>

    </html>
@endsection
@section('script1')
<script>
    ClassicEditor
        .create( document.querySelector( '.task-area' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
@section('script2')
<script>
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
