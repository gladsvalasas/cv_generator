@extends('layouts.app')

@section('content')
    <div class="columns">
        @include("layouts.grid")
        <div class="column is-10 main-column">
            <div class="card margin-top-15">
                <div class="content margin-left-20 margin-right-20 ">
                    <div class="columns">
                        <div class="column">
                            <h4>{{ __("Landing Page Settings") }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
