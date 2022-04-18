<?php
    $USER = \Illuminate\Support\Facades\Auth::user();
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>ADMIN</title>
        <link rel="stylesheet" href="/adm.css">
        <script src="https://unpkg.com/vue@3"></script>
        <script src="/vue/camps.js"></script>
    </head>
    <body>
    @csrf
        <div class="wrapper">
            <div class="Requests">
                <h1 class="title"><a href="#requests">Заявки</a><?php if($USER->getAccess() == 3) {?><a href="#camps">Лагеря</a><?php } ?></h1>
                <ul class="requests__list" id="requests">
                    @foreach(\App\Models\Requests::all() as $req)
                        <li class="requests__item">
                            <div class="name">ФИО: {{ $req->full_name }}</div>
                            <div class="old">Возраст: {{ $req->old }}</div>
                            <div class="camp">Лагерь: {{ $req->camp->name }}</div>
                            <div class="camp">EMAIL: {{ $req->email }}</div>
                            <div class="camp">Телефон: {{ $req->phone }}</div>
                            <div class="camp">Дата: {{ explode(' ', $req->created_at)[0]}}</div>
                        </li>
                    @endforeach
                </ul>

                <div id="camps">


                    {{-- REGIONS ---------------------------------------------------------------------------------------------------------------------------------------}}
                    <div class="regions">
                        <h1>Регионы</h1>
                        <div class="regions__add">
                            <input type="text" placeholder="Название" v-model="this.inputs.addRegion">
                            <button @click="this.addRegion()">Добавить</button>
                        </div>
{{--                        <div class="regions__search">--}}
{{--                            <input type="text" placeholder="Поиск">--}}
{{--                        </div>--}}
                        <ul class="regions__list">
                            <li class="regions__item" v-for="item in this.lists.regionsList" :data-id="item.id" @click="this.selectRegion($event)">
                                @{{ item.name }}
                                <div class="del-button" @click="this.delRegion($event)" :data-id="item.id">X</div>
                            </li>
                        </ul>
                    </div>


                    {{-- CAMPS ----------------------------------------------------------------------------------------------------------------------------------------}}
                    <div class="camps">
                        <h1>Лагеря</h1>
                        <div class="camps__add">
                            <input type="text" placeholder="Название" v-model="this.inputs.addCamp">
                            <button @click="this.addCamp()">Добавить</button>
                        </div>
{{--                        <div class="camps__search">--}}
{{--                            <input type="text" placeholder="Поиск">--}}
{{--                        </div>--}}
                        <ul class="camps__list">
                            <li class="camp__item" v-for="item in this.lists.campsList" :data-id="item.id">
                                @{{ item.name }}
                                <div class="del-button" :data-id="item.id" @click="this.delCamp($event)">X</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
