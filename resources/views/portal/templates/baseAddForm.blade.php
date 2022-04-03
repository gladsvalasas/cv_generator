<div class="columns">
    <div class="column">
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label">{{ $names["main"] }}</label>
                    <div class="control">
                        <input class="input baseField" id="baseMain" type="text">
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">{{ $names["subMain"] }}</label>
                    <div class="control">
                        <input class="input baseField" id="baseSubMain" type="text">
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label">{{ $names["dateStart"] }}</label>
                    <div class="control">
                        <input class="input baseField" id="baseStart" type="date">
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">{{ $names["dateEnd"] }}</label>
                    <div class="control">
                        <input class="input baseField" id="baseEnded" type="date">
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label">{{ $names["country"] }}</label>
                    <div class="control has-icons-left">
                        <div class="select">
                            <select class="baseField" id="baseCountry">
                                @foreach($countries as $country)
                                    <option value="{{  $country->name }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <span class="icon is-left">
                            <i class="fas fa-globe"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">{{ $names["city"] }}</label>
                    <div class="control">
                        <input class="input baseField" id="baseCity" type="text">
                    </div>
                </div>
            </div>
        </div>
        <button class="button is-dark {{--js-modal-trigger--}}" data-target="modal-add-lang" id="baseAdd">{{ __("Add") }}</button>
    </div>
</div>
