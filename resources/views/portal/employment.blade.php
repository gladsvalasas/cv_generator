@extends('layouts.app')

@section('content')
    <div class="columns">
        @include("layouts.grid")
        <div class="column is-10 main-column">
            <div class="card margin-top-15">
                <div class="content margin-left-20 margin-right-20">
                    <div class="columns">
                        <div class="column">
                            <h4>{{ __("Employments") }}</h4>
                            <div id="employmentsList">

                            </div>
                        </div>
                    </div>
                    <hr>
                    @include("portal.templates.baseAddForm", ["countries"=>$countries, "names"=>[
                        "main"=>"Job name",
                        "subMain"=>"Job position",
                        "dateStart"=>"Start date of job",
                        "dateEnd"=>"End date of job",
                        "country"=>"Country",
                        "city"=>"City"
                    ]])
                </div>
            </div>
        </div>
    </div>

    @include("portal.templates.baseCard")
@endsection
