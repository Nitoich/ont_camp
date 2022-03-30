<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Camp</title>
        <link rel="stylesheet" href="/app.css">
    </head>
    <body>
        <div class="main-container">
            <div class="logo">
                <img src="/images/logo.png" alt="">
            </div>
            <div class="title">
                <h1>TITLE</h1>
            </div>
            @error('succes')
            <div class="succes-block">
                <p>{{ $message }}</p>
            </div>
            @enderror
            <form method="post" action="/requests" class="form-container">
                @csrf
                <div class="input-block">
                    <input type="text" placeholder="ФИО" required name="full_name">
                </div>

                <div class="input-block">
                    <input type="text" placeholder="Возраст" required name="old">
                </div>

                <div class="input-block">
                    <input type="tel" placeholder="Телефон" required name="phone">
                </div>

                <div class="input-block">
                    <select name="camp_id" id="">
                        @foreach(\App\Models\Camp::all() as $camp)
                            <option value="{{ $camp->id }}">{{ $camp->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-block">
                    <button>Отправить</button>
                </div>
            </form>
        </div>
    </body>
</html>
