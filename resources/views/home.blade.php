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
        <script src="https://unpkg.com/vue@3"></script>
        <script src="/vue/homeForm.js"></script>
        <script src="/modalClass.js"></script>
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                document.getElementById('more').addEventListener('click', (e) => {
                    e.preventDefault();
                    window.Modal = new Modal(`
                    <style>
                        .modal {
                            width: 30%;
                            background: white;
                            position: relative;
                            padding: 40px;
                            border-radius: 20px;
                        }
                        @media screen and (max-width: 768px) {
                            .modal {
                                width: 95%;
                                padding: 40px 5px;
                            }
                        }
                    </style>
                    <div class="modal-content">
                    <p>Межрегиональная ассоциация профессиональных образовательных организаций приглашает учеников 8-9 классов принять участие в летней профориентационной школе «Ориентир-2022». Профориентационная школа «Ориентир-2022» расширит профориентационные возможности для осознанного профессионального самоопределения и выбора профессии. Участники летней школы пройдут профессиональные пробы по различным сферам профессиональной деятельности, выполнят творческие командные профориентационные проекты, станут участниками интерактивных мастер-классов и профориентационных экскурсий.
<br>Школа пройдёт в период с 04 по 08 июля на площадках колледжей и техникумов Калининградской, Оренбургской областей и Республики Бурятия.
<br>Проект реализуется при поддержке Фонда президентских грантов, участие в проекте бесплатное.
<br>Для регистрации Вашего ребёнка заполните форму обратной связи.
<p></div>`);
                });
            });
        </script>
    </head>
    <body>
        <div class="main-container">
            <div class="logo">
                <img src="/images/logo.png" alt="">
            </div>
            <div class="title">
                Профориентационная школа «Ориентир-2022»

            </div>
            <a href="#" id="more">Подробнее</a>
            @error('succes')
            <div class="succes-block">
                <p>{{ $message }}</p>
            </div>
            @enderror
            <form method="post" action="/requests" class="form-container" id="home-form-send-request">
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
                    <input type="email" placeholder="EMAIL" required name="email">
                </div>

                <div class="input-block">
                    <select name="region_id">
                        @foreach(\App\Models\Region::all() as $region)
                            <option value="{{ $region->id }}">{{ $region->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-block">
                    <select name="camp_id" :disabled="!this.campsList">
                        <option v-for="item in this.campsList" :value="item.id">@{{ item.name }}</option>
                    </select>
                </div>

                <div class="input-block">
                    <button>Отправить</button>
                </div>
            </form>
        </div>
    </body>
</html>
