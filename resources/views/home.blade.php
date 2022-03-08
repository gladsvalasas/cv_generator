@extends('layouts.app')

@section('content')
    <div class="columns">
        @include("layouts.grid")
        <div class="column is-10">
            {{ print_r($userInfo) }}
            <div class="card">
                <div class="content">
                    <div class="columns">
                        <div class="column">
                            <img class="user_photo" src="{{ asset("storage/pictures/".$userInfo["id"]."/avatar/".$userInfo["photo_path"]) }}" alt="">
                        </div>
                        <div class="column">
                            <div class="col-block">
                                <div class="light-text">
                                    {{ __("Name") }}
                                </div>
                                <div class="main-text">
                                    {{ $userInfo["name"] }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
