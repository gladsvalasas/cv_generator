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
         @foreach($projects as $project)

            <a href="{{ $project->link }}" target="_blank" class="project-element" style="background-image: url('{{ asset("storage/portfolio"). "/" .$project->preview_path }}')">
                <div class="project-element__text head-text">
                    {{ $project->name }}
                </div>
                {{--<div class="project-element__text description-text">
                    Lorem Inpsum dolore huere idi nahui glek ebuchi pidoras pidorasische
                </div>--}}
            </a>
        @endforeach
        </div>
    </div>

</div>
<div class="links-block scrollable-panel">
    <div class="links-block__wrapper">
        <div class="glitch-header-text h1glitched projects-block__text" style="color: #0a0a0a" data-css-content="CONTACT:">CONTACT:.</div>

        <div class="block-buttons">
            <a href="https://www.linkedin.com/in/kirill-sakharov-862072227/" target="_blank" class="button glitched-button">
                <i class="fa-brands fa-linkedin"></i> LINKEDIN
            </a>
            <a href="https://github.com/m1n64" target="_blank" class="button glitched-button">
                <i class="fa-brands fa-github"></i> GITHUB
            </a>
            <a href="mailto:mrcaxapov@gmail.com" target="_blank" class="button glitched-button">
                <i class="fa-solid fa-envelope"></i> EMAIL
            </a>
            <a href="https://t.me/m1n64" target="_blank" class="button glitched-button">
                <i class="fa-brands fa-telegram"></i> TELEGRAM
            </a>
        </div>

    </div>
</div>
<script src="{{ asset("landing/js/app.js") }}"></script>
</body>
</html>
