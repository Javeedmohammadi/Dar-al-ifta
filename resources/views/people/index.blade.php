<title>{{ __('msg.edit_question') }}</title>

@extends('layouts.app')
@section('content')
    <!DOCTYPE html>
    <html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

    </head>

    <body>

        <div class="container mt-4 mb-4">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <button class="alert alert-secondary p-0" style="width: fit-content">
                        <a href="{{ route('home', app()->getLocale()) }}" class="list-group-item p-2">
                            <i class="bi bi-tools">&nbsp;&nbsp;</i>
                            {{ __('msg.CMS') }}
                        </a>
                    </button>

                    @foreach ($person as $p)
                        <div class="p-2 alert alert-success rounded mt-1" {{-- style="background: linear-gradient(to left, #14a061, #1eaf6e)" --}}>
                            <h2 class="p-2 text-center">
                                <i class="bi bi-quote"></i>
                                {{ $p->person_full_name }}
                                <i class="bi bi-quote"></i>
                            </h2>
                            <hr>
                            <p class="p-3" style="text-align-last: center">
                                {!! $p->person_question !!}
                            </p>
                            <hr>
                            <form action="{{ route('remove.person', [app()->getLocale(), $p->id]) }}" method="post"
                                class="d-inline ">
                                @method('DELETE')
                                {{ csrf_field() }}
                                <button type="submit" class="alert alert-danger" style="padding: 10px;">
                                    {{ __('msg.edit_question_delete') }}
                                    &nbsp;
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                            <a class="alert alert-primary" style="text-decoration: none; padding: 8px;"
                                href="{{ route('person.add_detail', [app()->getLocale(), $p->id]) }}">
                                {{ __('msg.edit_question_edit') }}
                                &nbsp;
                                <i class="bi bi-pencil"></i>
                            </a>
                            <div class="mx-1">
                                @php
                                    $checkIfAnswered = $p->persondetail->answer ?? '';
                                @endphp
                                @if ($checkIfAnswered == null)
                                    {{ __('msg.fitwat_not_yet_1') }}&nbsp;
                                    <i class="bi bi-x-square-fill" style="color: red;"></i>
                                @else
                                    {{ __('msg.question_answered') }}&nbsp;
                                    <i class="bi bi-check-square-fill" style="color: forestgreen;"></i>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="container mt-4 px-4 col-md-8">
                {{ $person->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
        </div>

    </body>

    </html>
@endsection
