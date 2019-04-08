<div id="left_content">
    <div id="leftSide">
        @if(Auth::check())
            <div class="sideProfile">
                <a href="#" title="" class="profileFace">
                    <img src="{{ asset(config('setting.admin_image.icon')) }}/user.png" />
                </a>
                <span>{{ trans('setting.welcome', ['name' => Auth::user()->name]) }}</span>
                <div class="clear"></div>
            </div>
        @endif
        <div class="sidebarSep"></div>
        <ul id="menu" class="nav">
            <li class="home">
                <a href="{{ route('dashboard') }}" class="active" id="current">
                    <span>{{ trans('setting.dashboard') }}</span>
                    <strong></strong>
                </a>
            </li>
            <li class="home">
                <a href="{{ route('listOrder') }}" class="active" id="current">
                    <span>{{ trans('setting.manage') }}</span>
                    <strong></strong>
                </a>
            </li>
            <li class="product">
                <a href="#" class=" exp" >
                    <span>{{ trans('setting.product') }}</span>
                </a>
                <ul class="sub">
                    <li >
                    <a href="{{ route('listCat') }}">{{ trans('setting.category') }}</a>
                    </li>
                    <li >
                        <a href="{{ route('listFood') }}">{{ trans('setting.product') }}</a>
                    </li>
                    <li >
                        <a href="{{ route('listSale') }}">{{ trans('setting.sale_manage') }}</a>
                        </li>
                    <li >
                        <a href="#">{{ trans('setting.feedback') }}</a>
                    </li>
                </ul>
            </li>
            <li class="home">
                <a href="{{ route('listNews') }}" class="exp" id="current">
                    <span>{{ trans('setting.post') }}</span>
                    <strong></strong>
                </a>
            </li>
            <li class="account">
                <a href="{{ route('listUser') }}" class=" exp" >
                    <span>{{ trans('setting.user') }}</span>
                    <strong></strong>
                </a>
            </li>
            <li class="content">
                <a href="#" class=" exp" >
                    <span>{{ trans('setting.content') }}</span>
                </a>
                <ul class="sub">
                    <li >
                        <a href="{{ route('listBanner') }}">{{ trans('setting.banner') }}</a>
                    </li>
                    <li >
                        <a href="#">{{ trans('setting.contact') }}</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
