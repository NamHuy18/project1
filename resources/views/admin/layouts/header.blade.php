<div class="topNav">
    <div class="wrapper">
        <div class="welcome">
            <span>{{ trans('setting.welcome', ['name' => 'admin!']) }}</span>
        </div>
        <div class="userNav">
            <ul>
                <li>
                    <a href="{{ route('home') }}" target="_blank">
                        <img src="{{ asset(config('setting.admin_image.icon')) }}/home.png" />
                        <span>{{ trans('setting.home') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}">
                        <img src="{{ asset(config('setting.admin_image.icon')) }}/logout.png" />
                        <span>{{ trans('setting.logout') }}</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>
