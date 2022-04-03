<div class="column is-2 has-background-dark has-text-primary-light left-menu {{ $class ?? "" }}">
    <div class="menu-items ">
        <ul>
            <li class="menu-item">
                <a href="{{ route("home") }}" class="">
                    <i class="fas fa-home"></i>
                    <span>{{ __("Home") }}</span>
                </a>
            </li>
            <li class="menu-item divider">
                CV
            </li>
            <li class="menu-item">
                <a href="{{ route("employment") }}" class="">
                    <i class="fas fa-briefcase"></i>
                    <span>{{ __("Employment") }}</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route("education") }}" class="">
                    <i class="fas fa-book"></i>
                    <span>{{ __("Education") }}</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route("links") }}" class="">
                    <i class="fas fa-globe"></i>
                    <span>{{ __("Social Links") }}</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route("skills") }}" class="">
                    <i class="fas fa-brain"></i>
                    <span>{{ __("Skills") }}</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route("languages") }}" class="">
                    <i class="fas fa-language"></i>
                    <span>{{ __("Languages") }}</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route("cv") }}" class="">
                    <i class="fas fa-id-card"></i>
                    <span>{{ __("CV") }}</span>
                </a>
            </li>
            @if (Auth::user()->permission_id == \App\Classes\Constants::ADMIN_PRIVILEGE)
                <li class="menu-item divider">
                    Admin
                </li>
                <li class="menu-item">
                    <a href="" class="">
                        <i class="fas fa-id-badge"></i>
                        <span>{{ __("Invite Codes") }}</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>

</div>
