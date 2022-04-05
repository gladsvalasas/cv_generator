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
<div class="first-block">
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

<script src="{{ asset("landing/js/app.js") }}"></script>
</body>
</html>
