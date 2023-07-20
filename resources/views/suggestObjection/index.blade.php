
<title>{{ __('msg.suggestion_page') }}</title>

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

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10 rounded text-white">
                <div>
                    <button class="d-inline alert alert-secondary p-2">
                        <a class="list-group-item" href="{{ route('home', app()->getLocale()) }}" class="nav-link">
                            <i class="bi bi-tools">&nbsp;</i>
                            {{ __('msg.CMS') }}
                        </a>
                    </button>
                </div>
                @foreach ($suggest_Objection as $sug_obj)
                    <div
                        {{-- style="background: linear-gradient(to left, #14a061, #1eaf6e)" --}}
                        class="alert alert-success">
                        <h2 class="text-center">
                            <i class="bi bi-quote"></i>
                            {{ $sug_obj -> suggest_name }}
                            <i class="bi bi-quote"></i>
                        </h2>
                        <h4>{{ $sug_obj -> suggest_phone }}</h4>
                        <h4>{{ $sug_obj -> suggest_email }}</h4>
                        <hr>
                        <p class="p-2">{{ $sug_obj -> suggest_desc }}</p>
                        <hr>
                        <div>
                            <form
                                action="{{ route('remove.suggest',[app()->getLocale(), $sug_obj->id]) }}"
                                method="post"
                                class="d-inline m-0"
                                >
                                @method('DELETE')
                                {{ csrf_field() }}
                                <button type="submit" id="ds" class="alert alert-danger p-2">
                                    {{ __('msg.sugg_remove') }}
                                    &nbsp;
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="container mt-4 px-4 col-md-10">
                {{ $suggest_Objection -> links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>

</body>
</html>

@endsection
