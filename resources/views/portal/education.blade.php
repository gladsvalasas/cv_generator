@extends('layouts.app')

@section('content')
    <div class="columns">
        @include("layouts.grid")
        <div class="column is-10 main-column">
            <div class="card margin-top-15">
                <div class="content margin-left-20 margin-right-20">
                    <div class="columns">
                        <div class="column">
                            <h4>{{ __("Educations") }}</h4>
                            <div id="universityList">

                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="columns">
                        <div class="column">
                            <div class="columns">
                                <div class="column"></div>
                                <div class="column"></div>
                            </div>
                            <button class="button is-dark {{--js-modal-trigger--}}" data-target="modal-add-lang" id="addUniversity">{{ __("Add") }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include("portal.templates.baseCard")
@endsection
