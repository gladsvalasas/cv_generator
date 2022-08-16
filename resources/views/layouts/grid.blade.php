<div class="column is-2 has-background-dark has-text-primary-light left-menu {{ $class ?? "" }}">
    <div class="menu-items ">
        <ul>
            <li class="menu-item">
                <a href="{{ route("home") }}" class="">
                    <i class="fas fa-home"></i>
                    <span>{{ __("Home") }}</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route("landing.settings") }}" class="">
                    <i class="fas fa-id-card"></i>
                    <span>{{ __("Landing Settings") }}</span>
                </a>
            </li>
        </ul>
    </div>

</div>
