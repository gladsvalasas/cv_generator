@extends('layouts.app')

@section('content')
    <div class="columns">
        @include("layouts.grid")
        <div class="column is-10 main-column">
            <div class="card margin-top-15">
                <div class="content margin-left-20 margin-right-20 ">
                    <div class="columns">
                        <div class="column">
                            <h4>{{ __("Languages") }}</h4>
                            @foreach($userLanguages as $userLanguage)
                                <div class="card margin-top-5 margin-bottom-5 padding-20 has-background-white-ter" id="language-panel-{{ $userLanguage->id }}">
                                    <div class="content">
                                        <strong>{{ $userLanguage->name }}</strong>
                                        {{ $userLanguage->CEFR }} ({{ $userLanguage->cambridge }})
                                        <span class="right">
                                            <button class="delete "></button>
                                            <button class="delete "></button>
                                        </span>

                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
