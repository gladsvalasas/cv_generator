@extends('layouts.app')

@section('content')
    <div class="columns">
        @include("layouts.grid")
        <div class="column is-10 main-column">
            <div class="card margin-top-15">
                <div class="content">
                    <form action="{{ route("profile.edit") }}" method="POST" enctype="multipart/form-data" name="editProfile">
                        @csrf
                        <div class="columns">
                            <div class="column is-4">
                                <img class="user_photo lozad"
                                     data-src="{{ asset("storage/pictures/".$userInfo["id"]."/avatar/".$userInfo["photo_path"]) }}"
                                     alt="">
                                <div class="field margin-left-20">
                                    <label class="label">{{ __("Avatar") }}</label>
                                    <div class="control">
                                        <div id="avatar-upload" class="file has-name">
                                            <label class="file-label">
                                                <input class="file-input" disabled type="file" accept="image/*" id="photo_path"
                                                       name="photo_path">
                                                <span class="file-cta">
                                                  <span class="file-icon">
                                                    <i class="fas fa-upload"></i>
                                                  </span>
                                                  <span class="file-label">
                                                    {{ __("File") }}
                                                  </span>
                                                </span>
                                                <span class="file-name">
                                                  {{ __("No file uploaded") }}
                                                </span>
                                            </label>
                                            @error('photo_path')
                                            <span class="help is-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-8">
                                <div class="col-block">
                                    <div class="field">
                                        <label class="label">{{ __("Name") }}</label>
                                        <div class="control">
                                            <input class="input @error('name') is-danger @enderror" name="name" id="name" disabled type="text" value="{{ $userInfo["name"] }}"
                                                   placeholder="Text input" required>
                                        </div>
                                        @error('name')
                                        <span class="help is-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="field">
                                        <label class="label">{{ __("Surname") }}</label>
                                        <div class="control">
                                            <input class="input @error('surname') is-danger @enderror" name="surname" id="surname" disabled type="text" value="{{ $userInfo["surname"] }}"
                                                   placeholder="Text input" required>
                                        </div>
                                        @error('surname')
                                        <span class="help is-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="field">
                                        <label class="label">{{ __("Date of birthday") }}</label>
                                        <div class="control">
                                            <input class="input @error('birthday') is-danger @enderror" name="birthday" id="birthday" disabled type="date" value="{{ $userInfo["birthday"] }}"
                                                   placeholder="Text input" required>
                                        </div>
                                        @error('birthday')
                                        <span class="help is-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr> {{--интересно, сейчас кто-то так ещё делает?--}}
                        <div class="columns">
                            <div class="column margin-left-20 margin-right-20">
                                <div class="position_block">
                                    <div class="field">
                                        <label class="label">{{ __("Position") }}</label>
                                        <div class="control">
                                            <input class="input @error('position') is-danger @enderror" name="position" id="position" disabled type="text" value="{{ $userInfo["position"] }}"
                                                   placeholder="Text input" required>
                                        </div>
                                        @error('position')
                                        <span class="help is-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="columns margin-left-20 margin-right-20">
                            <div class="column">
                                <div class="field">
                                    <label class="label">{{ __('Email Address') }}</label>
                                    <div class="control">
                                        <input id="email" type="email" class="input @error('email') is-danger @enderror" name="email"
                                               value="{{ $userInfo["email"] }}" required disabled autocomplete="email" autofocus>
                                    </div>
                                    @error('email')
                                    <span class="help is-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label class="label">{{ __('Phone Number') }}</label>
                                    <div class="control">
                                        <input id="phone_number" type="tel" class="input @error('phone_number') is-danger @enderror" name="phone_number"
                                               value="{{ $userInfo["phone_number"] }}" required disabled autocomplete="phone_number" autofocus>
                                    </div>
                                    @error('phone_number')
                                    <span class="help is-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="columns margin-left-20 margin-right-20">
                            <div class="column">
                                <label class="label">{{ __("Country") }}</label>
                                <div class="control has-icons-left">
                                    <div class="select">
                                        <select id="country" name="country" disabled>
                                            @foreach($countries as $country)
                                                <option value="{{  $country["name"] }}" @if($country["userSelected"]) selected @endif>{{ $country["name"] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="icon is-left">
                                        <i class="fas fa-globe"></i>
                                     </span>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label class="label">{{ __('City') }}</label>
                                    <div class="control">
                                        <input id="city" type="text" class="input @error('city') is-danger @enderror" name="city"
                                               value="{{ $userInfo["city"] }}" disabled autocomplete="city" autofocus>
                                    </div>
                                    @error('city')
                                    <span class="help is-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="columns">
                            <div class="column margin-left-20 margin-right-20">
                                <h4>{{ __("About") }}</h4>
                                <div class="about-field">
                                    <textarea disabled class="textarea @error('about') is-danger @enderror" name="about" id="about" placeholder="">{{ $userInfo["about"] }}</textarea>
                                    @error('about')
                                    <span class="help is-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="columns">
                            <div class="column margin-left-20 margin-right-20">
                                <h4>{{ __("Hobbies") }}</h4>
                                <div class="about-field">
                                    <textarea disabled class="textarea @error('hobbies') is-danger @enderror" name="hobbies" id="hobbies" placeholder="">{{ $userInfo["hobbies"] }}</textarea>
                                    @error('hobbies')
                                    <span class="help is-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="columns">
                            <div class="column margin-left-20 margin-right-20">
                                <input type="submit" name="submitEdit" disabled class="button is-dark" value="{{ __("Save") }}"/>
                                <button type="button" id="openEdit" class="button is-light" data-active="false">{{ __("Edit") }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
