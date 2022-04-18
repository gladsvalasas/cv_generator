<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $settings["title"] ?? "" }}</title>

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
        {{ $settings["mainText"] ?? \App\Classes\Constants::LANDING_BASE_CONFIG["mainText"] }}
    </div>
    <div class="about-block__main-text padding-top-3">
        {{ $settings["subText"] ?? \App\Classes\Constants::LANDING_BASE_CONFIG["subText"] }}
    </div>

    <div class="stack-logotypes__wrapper">
        <div class="glitch-header-text h1glitched" data-css-content="MY STACK OF TECHNOLOGY:">MY STACK OF TECHNOLOGY:.</div>
        <div class="stack-logotypes animate__animated">
            @foreach($techStack as $stack)
                <div class="stack-logo">
                    <a @if($stack->tech_link) href="{{ $stack->tech_link }}" @endif target="_blank">
                        <img src="{{ asset("storage/stack/".$stack->logotype_path) }}" alt="">
                    </a>
                </div>
            @endforeach
        </div>
    </div>

</div>
<div class="projects-block scrollable-panel">
    <div class="projects-block__wrapper">
        <div class="glitch-header-text h1glitched projects-block__text" data-css-content="PROJECTS:">PROJECTS:.</div>
        <div class="projects-block__list">
                <div class="project-element" style="background-image: url('https://info-comp.ru/wp-content/uploads/images/stories/kartinki/Make_Screenshot_in_Linux_7.jpg')">
                    <div class="project-element__text head-text">
                        HUI 12345
                    </div>
                    {{--<div class="project-element__text description-text">
                        Lorem Inpsum dolore huere idi nahui glek ebuchi pidoras pidorasische
                    </div>--}}
                </div>
        </div>
    </div>

</div>
<div class="links-block scrollable-panel" style="background-color: #dbdbdb">
    <div class="links-block__head-text">
        Contact:.

        <a href="" class="button glitched-button">
            PENISIS
        </a>
    </div>
</div>
<script src="{{ asset("landing/js/app.js") }}"></script>
</body>
</html>
