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
                                <!-- This Appends User skills -->
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
                                            <input class="input" id="addSkillName" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="filed">
                                        <label class="label-one">{{ __("Skill level") }}</label>
                                        <div class="control">
                                            <input class="slider has-output-tooltip is-fullwidth" step="1" min="1" max="5" value="1" type="range" id="addSkillLevel">

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

    <template id="blockTemplate">
        <div class="" id="skill-element-ID">
            <div class="columns">
                <div class="column">
                    <div class="filed">
{{--                        <label class="label-one">{{ __("Skill name") }}</label>--}}
                        <div class="control">
                            <input class="input" id="skillName-ID" type="text" disabled value="#VALUE">
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
{{--                        <label class="label-one">{{ __("Skill level") }}</label>--}}
                    </div>
                    <div class="control">
                        <progress class="progress " value="#LEVEL" max="5" id="skillLevelDisplay-ID"></progress>
                        <input class="slider is-fullwidth" step="1" min="1" max="5" value="#LEVEL" type="range" id="skillLevel-ID" disabled style="display: none">
                    </div>
                </div>
                <div class="column is-1 left">
                    <button class="delete deleteSkill" data-id="#ID"></button>
                    <div>
                        <span class="icon editSkill editButton" id="editSkill-ID" data-edit="false" data-id="#ID">
                            <i class="fas fa-edit"></i>
                        </span>
                    </div>
                </div>
            </div>
            <button class="button margin-bottom-20 is-dark updateSkill" disabled id="updateSkill-ID" data-id="#ID" style="display: none">{{ __("Save") }}</button>
        </div>
    </template>
@endsection
