<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-6 text-center">
                <h1>Приветствуем в Pastebin!</h1>
                <p>Сервис для хранения и обмена текстовыми данными.</p>
                <br>
                @guest
                <div class="btn-group">
                    <a href="{{ route('login') }}" class="btn btn-primary">Войти</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-primary">Зарегистрироваться</a>
                    <a href="{{ route('pastes.index') }}" class="btn btn-secondary">Продолжить как гость</a>
                </div>
                @else
                    <a href="{{ route('pastes.index') }}" class="btn btn-primary">Продолжить</a>
                @endguest
            </div>
        </div>
    </div>
</body>
</html>
