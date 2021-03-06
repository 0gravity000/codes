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
            <router-link to="/vuejs/hellovue">Hello Vue</router-link><br>
            <router-link to="/vuejs/vshow-directive">v-show デイレクティブ</router-link><br>
            <router-link to="/vuejs/vbind-class-directive">v-bind:class デイレクティブ</router-link><br>
            <router-link to="/vuejs/vbind-style-directive">v-bind:style デイレクティブ</router-link><br>
            <router-link to="/vuejs/vfor-directive">v-for デイレクティブ</router-link><br>
            <router-link to="/vuejs/von-directive">v-on デイレクティブ</router-link><br>
            <router-link to="/vuejs/vmodel-directive">v-model デイレクティブ</router-link><br>
        </div>
        <div id="main" class="col-8">
            <router-view></router-view>
        </div>
    </div>
    </div>
</div>
<!-- Scripts -->
<script src="{{ mix('/js/app.js') }}" defer></script>
</body>
</html>