<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $info["title"] ?? "" }}</title>

    <link rel="stylesheet" href="{{ asset("landing/css/app.css") }}">
</head>
<body>
<div class="first-block scrollable-panel">
    <div class="first-block__text-wrapper">
        <div class="first-block__text ">
            <div class="text-shadow animate__animated animate__fadeInTopRight">SAKHAROV</div>
            <div class="text-main animate__animated animate__fadeInRight">SAKHAROV</div>
        </div>
    </div>

    <div class="first-block__image-wrapper ">
        <div class="first-block__image animate__animated animate__bounceInLeft">
            <img src="{{ asset("images/face/SPRITE1.png") }}"  class="image-main" alt="">
        </div>
        <div class="first-block__image glitch5 animate__animated animate__bounceInLeft">
            <img src="{{ asset("images/face/SPRITE2.png") }}"  class="image-main" alt="">
        </div>
        <div class="first-block__image glitch">
            <img src="{{ asset("images/face/SPRITE2-RED.png") }}"  class="image-main with-opacity" alt="">
        </div>
        <div class="first-block__image glitch2">
            <img src="{{ asset("images/face/SPRITE2-BLUE.png") }}"  class="image-main with-opacity" alt="">
        </div>
        <div class="first-block__image glitch3">
            <img src="{{ asset("images/face/SPRITE2-YELLOW.png") }}"  class="image-main with-opacity" alt="">
        </div>
        <div class="first-block__image glitch4">
            <img src="{{ asset("images/face/SPRITE2-GREEN.png") }}"  class="image-main with-opacity" alt="">
        </div>
    </div>
</div>
<div class="about-block scrollable-panel">
    <div class="about-block__hello-text padding-top-3">
        Hello. My name Kirill Sakharov, and I'm a PHP Back-End Developer. And this is my portfolio. Welcome!
    </div>
    <div class="about-block__main-text padding-top-3">
        I am 21 years old, I was born in January 2001. Graduated from college in 2020. My experience in web development is more than 6 years.
        My main technology stack is PHP (Laravel, Comet PHP), HTML + CSS (SCSS), JavaScript (Vue.js).
        Plans to study Front-End frameworks (React.js + Redux, Angular) and become a Full-Stack developer.
    </div>
</div>

<script src="{{ asset("landing/js/app.js") }}"></script>
</body>
</html>
