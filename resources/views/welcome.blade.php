

<style>
    #search-box {
        padding: 5px;
        background: #d1e7dd;
        outline: none;
        border: 0;
        border-radius: 5px;
        margin-top: 5px;
    }
</style>

<title>{{ __('msg.main_page_text') }}</title>
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

        <div id="welcome-contianer" class="mb-4">
            <div class="item-1">
                <div class="contianer">
                    <div class="p-2" dir="rtl">
                        <div class="row justify-content-center">
                            {{-- <div class="input-group"> --}}
                            <input class="col-md-6" autofocus type="text" id="search-box"
                                placeholder="{{ __('msg.search_bar_text') }}" />
                            {{-- </div> --}}
                        </div>
                    </div>
                    <div id="search-result-table" class="p-3 pt-0">
                        <div id="ajax-data"></div>
                    </div>
                </div>
            </div>
            <div class="item-2" id="pc-side-bar">
                <x-side_bar />
            </div>
        </div>

        <script src="{{ asset('/jquery/jquery-3.1.1.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('.answer_col').css({
                    'white-space': 'nowrap',
                    'width': '20vh',
                    'overflow': 'hidden',
                    'text-overflow': 'ellipsis',
                })

                if ($('#search-box').val() == '') {
                    $('#search-result-table').hide()
                }

                $('#search-box').on({

                    keyup: () => {
                        const VAL = $('#search-box').val()
                        if (VAL) {
                            $('#whole-data-table, #footer').slideUp(300)
                            $('#search-result-table').slideDown(300)
                        } else {
                            $('#whole-data-table, #footer').slideDown(300)
                            $('#search-result-table').slideUp(300)
                        }
                        $.ajax({
                            type: 'get',
                            url: '{{ URL::to('ps/search') }}',
                            data: {
                                'search': VAL
                            },

                            success: function(data) {
                                $('#ajax-data').html(data)
                            }
                        })
                    }
                })
            })
        </script>


    </body>

    </html>
@endsection


{{-- Template ... --}}
{{-- <div id="welcome-contianer">
        <div class="item-1"></div>
        <div class="item-2" id="pc-side-bar">
            <x-side_bar />
        </div>
    </div> --}}
