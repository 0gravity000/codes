<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Vue Laravel SPA') }}</title>

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <header-component></header-component>
    <div class="container">
    <div class="row">
        <div id="menu" class="col">
            <router-link to="/codejs/helloworld">Hello World</router-link><br>
            <router-link to="/codejs/digitalclock">Digital Clock</router-link><br>
            <router-link to="/codejs/analogclock">Analog Clock</router-link><br>
        </div>
        <div id="main" class="col-6">
            <router-view></router-view>
        </div>
    </div>
    </div>
</div>
<!-- Scripts -->
<script src="{{ mix('/js/app.js') }}" defer></script>
</body>
</html>