@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-block">
            <div class="card">
                <div class="card-content">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <div class="field">
                    <label class="company">{{ __("Company") }}</label>
                    <div class="control">
                        <div class="select">
                            <select name="company" id="company">
                                {{--<option value="0">{{ __("No company") }}</option>--}}
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->fullname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error('company')
                    <span class="help is-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="field">
                    <label class="invite">{{ __('Invite code') }}</label>
                    <div class="control">
                        <input id="invite" type="text" class="input @error('invite') is-danger @enderror" name="invite"
                               value="{{ old('invite') ?? $invite }}" required autocomplete="invite" autofocus>
                    </div>
                    <span class="help is-danger" role="alert" id="company_message">
                        <strong></strong>
                    </span>
                    @error('invite')
                    <span class="help is-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="field">
                    <label class="name">{{ __('Name') }}</label>
                    <div class="control">
                        <input id="name" type="text" class="input @error('name') is-danger @enderror" name="name"
                               value="{{ old('name') }}" required autocomplete="name" autofocus>
                    </div>
                    @error('name')
                    <span class="help is-danger" role="alert">
                   <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                <div class="field">
                    <label class="surname">{{ __('Surname') }}</label>
                    <div class="control">
                        <input id="surname" type="text" class="input @error('surname') is-danger @enderror" name="surname"
                               value="{{ old('surname') }}" required autocomplete="surname" autofocus>
                    </div>
                    @error('surname')
                    <span class="help is-danger" role="alert">
                   <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                <div class="field">
                    <label class="position">{{ __('Position') }}</label>
                    <div class="control">
                        <input id="position" type="text" class="input @error('position') is-danger @enderror" name="position"
                               value="{{ old('position') }}" required autocomplete="position" autofocus>
                    </div>
                    @error('position')
                    <span class="help is-danger" role="alert">
                   <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                <div class="field">
                    <label class="dateBirth">{{ __('Date of birthday') }}</label>
                    <div class="control">
                        <input id="dateBirth" type="date" class="input @error('dateBirth') is-danger @enderror" name="dateBirth"
                               value="{{ old('dateBirth') }}" required autocomplete="dateBirth" autofocus>
                    </div>
                    @error('dateBirth')
                    <span class="help is-danger" role="alert">
                   <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                <div class="field">
                    <label class="email">{{ __('Email Address') }}</label>
                    <div class="control">
                        <input id="email" type="email" class="input @error('email') is-danger @enderror" name="email"
                               value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                    @error('email')
                    <span class="help is-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="field">
                    <label class="password">{{ __('Password') }}</label>
                    <div class="control">
                        <input id="password" type="password" class="input @error('password') is-danger @enderror"
                               name="password"
                               required autocomplete="new-password" autofocus>
                    </div>
                    @error('password')
                    <span class="help is-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="field">
                    <label class="password-confirm">{{ __('Confirm password') }}</label>
                    <div class="control">
                        <input id="password-confirm" type="password"
                               class="input @error('password-confirm') is-danger @enderror"
                               name="password_confirmation"
                               required autocomplete="new-password" autofocus>
                    </div>
                    @error('password-confirm')
                    <span class="help is-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="field">
                    <label >{{ __("Avatar") }}</label>
                    <div class="control">
                        <div id="avatar-upload" class="file has-name">
                            <label class="file-label">
                                <input class="file-input" type="file" accept="image/*" id="photo_path" name="photo_path" required>
                                <span class="file-cta">
                          <span class="file-icon">
                            <i class="fas fa-upload"></i>
                          </span>
                          <span class="file-label">
                            {{ __("Choose an avatar") }}
                          </span>
                        </span>
                                <span class="file-name">
                          No file uploaded
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


                <button id="registerButton" disabled type="submit" class="button is-dark">
                    {{ __('Register') }}
                </button>

            </form>
                </div>
            </div>
        </div>
    </div>
@endsection
