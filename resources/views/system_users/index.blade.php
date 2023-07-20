<title>Document</title>
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
            <div class="row justify-content-center mx-1">
                <div class="col-md-8 p-0">
                    <button class="alert alert-secondary p-2">
                        <a href="{{ route('home', app()->getLocale()) }}" class="nav-link">
                            <i class="bi bi-tools">&nbsp;&nbsp;</i>
                            {{ __('msg.CMS') }}
                        </a>
                    </button>
                </div>
                @foreach ($system_users as $system_user)
                    <div class="col-md-8 alert alert-success" {{-- style="background: linear-gradient(to left, #14a061, #1eaf6e)" --}}>
                        <h1 class="text-center pt-2">
                            <i class="bi bi-quote"></i>
                            {{ $system_user->name }}
                            <i class="bi bi-quote"></i>
                        </h1>
                        <div class="table-responsive">
                            <table class="table " dir="rtl">
                                <tr>
                                    <th>{{ __('msg.user_id') }}</th>
                                    <td>{{ $system_user->id }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('msg.user_role') }}</th>
                                    <td>
                                        @if ($system_user->role == 1)
                                            <i class="bi bi-person-fill-gear"></i>
                                            {{ __('msg.user_admin') }}
                                        @else
                                            <i class="bi bi-person-fill"></i>
                                            {{ __('msg.user_normal') }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{ __('msg.email_address') }}</th>
                                    <td>{{ $system_user->email }}</td>
                                </tr>
                                {{-- <tr>
                                    <th>{{ __('msg.log_user_pass') }}</th>
                                    <td>
                                        @php
                                            $name = $system_user->password;
                                            $new = substr($name, 1, 6);
                                        @endphp
                                        ...{{ $new }}
                                    </td>
                                </tr> --}}
                            </table>
                        </div>
                        <div class="m-2">
                            <form action="{{ route('remove.system.user', [app()->getLocale(), $system_user->id]) }}"
                                method="post" class="d-inline">
                                @method('DELETE')
                                {{ csrf_field() }}
                                <button type="submit" id="ds" class="alert alert-danger p-2">
                                    {{ __('msg.delete_user') }}
                                    &nbsp;
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                            <button class="alert alert-success p-2 mx-1">
                                <a class="nav-link"
                                    href="{{ route('edit.system.users', [app()->getLocale(), $system_user->id]) }}">
                                    <i class="bi bi-pencil">&nbsp;</i>
                                    {{ __('msg.manage_system_user') }}
                                </a>
                            </button>
                        </div>
                    </div>
                @endforeach
                <div class="container col-md-6 m-4">
                    {{ $system_users->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>

    </body>

    </html>
@endsection
