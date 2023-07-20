<title>{{ __('msg.all_fitwas_page') }}</title>

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
                <div class="table-responsive">
                    <table class="table text-white" dir="rtl">
                        <thead>
                            <tr style="font-size: 1.5rem;">
                                <th style=" padding: 10px;">{{ __('msg.all_fitwas_page') }}</th>
                                <th style=" padding: 10px;">{{ __('msg.all_views') }}</th>
                                <th style=" padding: 10px;">{{ __('msg.fitwa_date') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($people as $person)
                                <tr>
                                    <td>
                                        <a href="{{ route('person.get_detail', [app()->getLocale(), $person->id]) }}"
                                            class="nav-link">
                                            @php
                                                $query = $person->person_father_name;
                                                $short_query = substr($query,0, 85);
                                            @endphp
                                            {{ $short_query }} ...
                                            {{-- {{ $person->person_father_name }} --}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('person.get_detail', [app()->getLocale(), $person->id]) }}"
                                            class="nav-link">
                                            {{ $person->views_counter }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('person.get_detail', [app()->getLocale(), $person->id]) }}"
                                            class="nav-link">
                                            {{ $person->persondetail->created_at ?? '' }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="item-2" id="pc-side-bar">
                <x-side_bar />
            </div>
        </div>
        <div class="container mt-4 px-4 col-md-8">
            {{ $people->onEachSide(3)->links('vendor.pagination.bootstrap-5') }}
        </div>

    </body>

    </html>
@endsection
