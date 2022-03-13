@extends("layouts.app")

@section("content")
    <div class="columns">
        @include("layouts.grid")
        <div class="column is-10 main-column">
            <div class="card">
                <div class="card-image badge-preview">
                    <img class="lozad" data-src="{{ asset($badgeUrl) }}" alt="">
                </div>
                <div class="content badge-preview">
                    <a href="{{ asset($badgeUrl) }}" download class="button is-dark">
                        <strong>{{ __("Download (PNG)") }}</strong>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
