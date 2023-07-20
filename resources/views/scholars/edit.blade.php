
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
    
    <div class="container col-md-8" dir="rtl">                
        <form 
            action="{{ route('store.edit.scholar', [app()->getLocale(), $scholar -> id]) }}"
            method="post"
            enctype="multipart/form-data"
        >
        {{ csrf_field() }}
        @method('put')
            <div class="mt-4">
                <div class="col-md-12">
                    <label for="scholar_name" class="form-label">{{ __('msg.full_name') }}</label>
                    <div>
                        <input id="scholar_name" type="text" class="form-control @error('scholar_name') is-invalid @enderror" name="scholar_name" value="{{ $scholar -> scholar_name }}" autocomplete="scholar_name" autofocus placeholder="{{ __('msg.full_name') }}">
                        @error('scholar_name')
                        <span class="invalid-feedback text-danger" role="alert">
                            <h6>* {{ $message }}</h6>
                        </span>
                        @enderror
                    </div>
                </div>
            <div class="col-md-12">
                <label for="scholar_self_desc" class="form-label">{{ __('msg.scholar_desc') }}</label>
                <div>
                    <textarea id="scholar_self_desc" style="height: 40vh" type="text" class="form-control @error('scholar_self_desc') is-invalid @enderror" name="scholar_self_desc" autocomplete="scholar_self_desc" placeholder="{{ __('msg.scholar_desc') }}">{{ $scholar -> scholar_self_desc }}</textarea>
                    @error('scholar_self_desc')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            {{--  --}}
            {{-- <div class="mt-5">
                <label for="floatingInput" class="form-label">{{ __('msg.scholar_name') }}</label>
                <input 
                    type = "text" 
                    class = "form-control"
                    name = "scholar_name" 
                    id = "floatingInput"
                    placeholder = "Full Name"
                    autocomplete = "off"
                    autofocus = 'autofocus'
                    required                 
                    value="{{ $scholar -> scholar_name }}"
                />
            </div> --}}
            {{-- <div class="my-2">                
                <label for="floatingInput" class="form-label">{{ __('msg.scholar_desc') }}</label>
                <textarea 
                    type = "text" 
                    class = "form-control"
                    name = "scholar_self_desc" 
                    style="height: 40vh;"
                    id = "floatingInput"
                    placeholder = "Scholar Desc"
                    autocomplete = "off"
                    required               
                >{{ $scholar -> scholar_self_desc }}</textarea>
            </div> --}}
            <div class="row mb-0">
                <div class="col-md-8 offset-md-0 mt-2">
                    <button type="submit" class="btn btn-success">
                        <span
                            class="px-1"
                            style="display:inline-block;transform: scale(1.8); color: white;">
                            &plus;
                        </span>
                        {{ __('msg.edited_done') }}
                    </button>
                    <a 
                        class="btn btn-secondary mx-1" 
                        href="{{ route('scholar.index', app()->getLocale()) }}">
                        <span
                            class="px-1"
                            style="display:inline-block;transform: scale(1.8); color: white;">
                            &#10150;
                        </span>
                        {{ __('msg.edited_back') }}
                    </a>
                </div>
            </div>                                    
        </form>
    </div>
</body>
</html>

@endsection
