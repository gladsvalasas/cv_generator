@extends('layouts.app')

@section('content')
    <div class="columns">
        @include("layouts.grid")
        <div class="column is-10 main-column">
            <div class="card margin-top-15 ">
                <div class="content margin-left-20 margin-right-20">
                    <div class="columns">
                        <div class="column">
                            <h4>{{ __("Social Links") }}</h4>
                            <div id="socialLinksList">

                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="columns">
                        <div class="column">
                            <div class="columns">
                                <div class="column">
                                    <div class="filed">
                                        <label class="label-one">{{ __("Link name") }}</label>
                                        <div class="control">
                                            <input class="input" id="addLinkName" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="filed">
                                        <label class="label-one">{{ __("Link") }}</label>
                                        <div class="control">
                                            <input class="input" id="addLinkLink" type="text" placeholder="https://">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="button is-dark {{--js-modal-trigger--}}" data-target="modal-add-lang" id="addLink">{{ __("Add") }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <template id="linkTemplate">
        <div id="link-element-ID">
            <hr>
            <div class="columns">
                <div class="column">
                    <div class="filed">
                        <div class="control">
                            <input class="input" id="linkName-ID" type="text" disabled value="NAME">
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="filed">
                        <div class="control">
                            <input class="input" id="linkLink-ID" type="text" disabled value="LINK">
                        </div>
                    </div>
                </div>
                <div class="column is-1">
                    <div class="right">
                        <button class="delete deleteLink" data-id="ID"></button>
                        <div>
                        <span class="icon editLink editButton" id="editLink-ID" data-edit="false" data-id="ID">
                            <i class="fas fa-edit"></i>
                        </span>
                        </div>
                    </div>

                </div>
            </div>
            <button class="button margin-bottom-20 is-dark updateLink" disabled id="updateLink-ID" data-id="ID" style="display: none">{{ __("Save") }}</button>
        </div>
    </template>
@endsection
