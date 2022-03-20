@extends('layouts.app')

@section('content')
    <div class="columns">
        @include("layouts.grid")
        <div class="column is-10 main-column">
            <div class="card margin-top-15">
                <div class="content margin-left-20 margin-right-20 ">
                    <div class="columns">
                        <div class="column">
                            <h4>{{ __("Skills") }}</h4>
                            <div id="skillsList">
                                @foreach($skillsList as $skill)
                                    <div class="columns">
                                        <div class="column">
                                            <div class="filed">
                                                <label class="label-one">{{ __("Skill name") }}</label>
                                                <div class="control">
                                                    <input class="input" type="text" disabled value="{{ $skill["name"] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column">
                                            <div class="field">
                                                <label class="label-one">{{ __("Skill level") }}</label>
                                            </div>
                                            <div class="control">
                                                <progress class="progress {{ $skill["className"] }}" value="{{ $skill["level"] }}" max="5"></progress>
                                                <input class="slider is-fullwidth" step="1" min="1" max="5" value="{{ $skill["level"] }}" type="range" disabled style="display: none">
                                            </div>
                                        </div>
                                        <div class="column is-1 left">
                                            <button class="delete"></button>
                                            <div>
                                                <span class="icon">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                                <span class="icon has-text-success" style="display: none">
                                                    <i class="fas fa-check-square"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="columns">
                        <div class="column">
                            <div class="columns">
                                <div class="column">
                                    <div class="filed">
                                        <label class="label-one">{{ __("Skill name") }}</label>
                                        <div class="control">
                                            <input class="input" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="filed">
                                        <label class="label-one">{{ __("Skill level") }}</label>
                                        <div class="control">
                                            <input class="slider has-output-tooltip is-fullwidth" step="1" min="1" max="5" value="1" type="range" id="skillLevel">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="button is-dark {{--js-modal-trigger--}}" data-target="modal-add-lang" id="addSkill">{{ __("Add") }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
