<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OTA Admin</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>

    <div class="container" id="app">

        @component('components.jumbotron')
            @slot('title')
                OTA Admin
            @endslot
            @slot('description')
               OTA cloud 平台.
            @endslot
        @endcomponent

        <ul class="nav nav-tabs">
            <router-link to="/" tag="li" exact>
                <a href="">主页</a>
            </router-link>
            <router-link to="/about" tag="li">
                <a href="">关于</a>
            </router-link>
            <router-link to="/contact" tag="li">
                <a href="">联系</a>
            </router-link>
            <router-link to="/notes" tag="li">
                <a href="#">留言</a>
            </router-link>
            <router-link to="/login" tag="li">
                <a href="#">登录</a>
            </router-link>
        </ul>
        <router-view></router-view>

    </div>

    <footer>
        <hr>
        <div class="text-center">
            <p>&copy; {{ \Carbon\Carbon::now()->year }} All Rights Reserved. Created By: Hashem Mo</p>
        </div>
    </footer>

    <script src="{{ mix('js/app.js') }}"></script>
<script src="https://unpkg.com/vue/dist/vue.js"></script>
<script src="https://unpkg.com/vue-i18n/dist/vue-i18n.js"></script>
</body>
</html>
