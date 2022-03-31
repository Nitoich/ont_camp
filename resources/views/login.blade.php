<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
        <link rel="stylesheet" href="app.css">
    </head>
    <body>
        <div class="main-container">
            <form method="get" action="/admin/login" class="form-container">
                <div class="input-block">
                    <input type="text" placeholder="Логин" name="login" required>
                    @error('login')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="input-block">
                    <input type="password" placeholder="Пароль" name="password" required>
                    @error('password')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="input-block">
                    <button>Отправить</button>
                </div>
            </form>
        </div>
    </body>
</html>
