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
                    @include("portal.templates.baseAddForm", ["countries"=>$countries, "names"=>[
                        "main"=>"Name of University/College",
                        "subMain"=>"Speciality name",
                        "dateStart"=>"Start date of training",
                        "dateEnd"=>"End date of training",
                        "country"=>"Country",
                        "city"=>"City"
                    ]])
                </div>
            </div>
        </div>
    </div>
    @include("portal.templates.baseCard")
@endsection
