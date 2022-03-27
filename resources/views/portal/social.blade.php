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
                                @foreach($links as $link)
                                    <div id="link-element-{{ $link["id"] }}">
                                        <div class="columns">
                                            <div class="column">
                                                <div class="filed">
                                                    <div class="control">
                                                        <input class="input" id="linkName-{{ $link["id"] }}" type="text" disabled value="{{ $link["name"] }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="column">
                                                <div class="filed">
                                                    <div class="control">
                                                        <input class="input" id="linkLink-{{ $link["id"] }}" type="text" disabled value="{{ $link["link"] }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="column is-1">
                                                <button class="delete deleteLink" data-id="{{ $link["id"] }}"></button>
                                                <div>
                                                    <span class="icon editLink editButton" id="editLink-{{ $link["id"] }}" data-edit="false" data-id="{{ $link["id"] }}">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="button margin-bottom-20 is-dark updateLink" disabled id="updateLink-{{ $link["id"] }}" data-id="{{ $link["id"] }}" style="display: none">{{ __("Save") }}</button>
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
@endsection
