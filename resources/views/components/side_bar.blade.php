
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body>

    <div>
        <ul>
            <hr>
            <h5><a href="{{ route('home.go', app() -> getLocale()) }}" class="nav-link"><span class="bi bi-search">&nbsp;&nbsp;</span>{{ __('msg.search_fitwa') }}</a></h5><hr>
            <h5><a href="{{ route('people.create', app() -> getLocale()) }}" class="nav-link"><span class="bi bi-question-square">&nbsp;&nbsp;</span>{{ __('msg.question_page') }}</a></h5><hr>
            <h5><a href="{{ route('person.get.all', app() -> getLocale()) }}" class="list-group-item"><span class="bi bi-table">&nbsp;&nbsp;</span>{{ __('msg.all_fitwas_page') }}</a></h5><hr>
            <h5><a href="{{ route('show.scholar', app() -> getLocale()) }}" class="list-group-item"><span class="bi bi-people">&nbsp;&nbsp;</span>{{ __('msg.scholar_page') }}</a></h5><hr>
            <h5><a href="{{ route('show.articals', app() -> getLocale()) }}" class="list-group-item"><span class="bi bi-newspaper">&nbsp;&nbsp;</span>{{ __('msg.article_page') }}</a></h5><hr>
            <h5><a href="{{ route('show.suggest.objection', app() -> getLocale()) }}" class="list-group-item"><span class="bi bi-journals">&nbsp;&nbsp;</span>{{ __('msg.suggestion_page') }}</a></h5><hr>
            <h5><a href="{{ route('show.information', app() -> getLocale()) }}" class="list-group-item"><span class="bi bi-info-square">&nbsp;&nbsp;</span>{{ __('msg.information_page') }}</a></h5><hr>
        </ul>
    </div>

</body>
</html>
