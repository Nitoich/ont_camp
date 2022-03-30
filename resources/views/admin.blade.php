<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN</title>
        <link rel="stylesheet" href="/adm.css">
    </head>
    <body>
        <div class="wrapper">
            <div class="Requests">
                <h1 class="title"><a href="#requests">Заявки</a><a href="#camps">Лагеря</a></h1>
                <ul class="requests__list" id="requests">
                    @foreach(\App\Models\Requests::all() as $req)
                        <li class="requests__item">
                            <div class="name">ФИО: {{ $req->full_name }}</div>
                            <div class="old">Возраст: {{ $req->old }}</div>
                            <div class="camp">Лагерь: {{ $req->camp->name }}</div>
                            <div class="camp">Телефон: {{ $req->phone }}</div>
                            <div class="camp">Дата: {{ explode(' ', $req->created_at)[0]}}</div>
                        </li>
                    @endforeach
                </ul>

                <ul class="camps__list" id="camps">
                    @foreach(\App\Models\Camp::all() as $camp)
                        <li class="camps__item">
                            <div class="name">{{ $camp->name }}</div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </body>
</html>
