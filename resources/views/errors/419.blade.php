<!DOCTYPE html>
<html lang="{{ Config::get('app.locale') }}">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="robots" content="noindex, nofollow" />

        <title>Página expirada - {{ config('app.name') }}</title>

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">

        <link rel="stylesheet" href="{{ mix('css/all.css') }}">

    </head>

    <body id="error-419" class="error-page">
        <main>
            <div class="container-fluid">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 text-center">
                    <img class="logo" src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}">
                    <br>
                    <p>A página <b>expirou</b><br>após ficar muito<br>tempo inativa.</p>
                    <small>Clique no botão abaixo para continuar sua navegação.</small>
                    <a href="{{ route('home.index') }}" class="btn btn-default">Voltar</a>
                </div>
            </div>

        </main>
    </body>
</html>
