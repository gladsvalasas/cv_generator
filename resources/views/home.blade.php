@extends('layouts.app')

@section('content')
    <div class="columns">
        @include("layouts.grid")
        <div class="column is-10">
            <div class="card margin-top-15">
                <div class="content">
                    <div class="columns">
                        <div class="column is-4">
                            <img class="user_photo" src="{{ asset("storage/pictures/".$userInfo["id"]."/avatar/".$userInfo["photo_path"]) }}" alt="">
                        </div>
                        <div class="column is-8">
                            <div class="col-block">
                                <div class="field">
                                    <label class="label">{{ __("Name") }}</label>
                                    <div class="control">
                                        <input class="input" disabled type="text" value="{{ $userInfo["name"] }}" placeholder="Text input">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">{{ __("Surname") }}</label>
                                    <div class="control">
                                        <input class="input" disabled type="text" value="{{ $userInfo["surname"] }}" placeholder="Text input">
                                    </div>
                                </div>
                                {{--TODO: add fileds with position, birthday, and more--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
