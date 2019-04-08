<header class="header sticky-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="header_wrapper_inner">                    
                    <div class="logo col-xs-12">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset(config('setting.front_image.logo')) }}/logo.png">
                        </a>
                    </div>                   
                    <div class="main_menu_inner">                      
                        <div class="menu">
                            <nav>
                                <ul>
                                    <li><a href="{{ route('home') }}">{{ trans('setting.home') }}</a></li>
                                    <li><a href="about.html">{{ trans('setting.about') }}</a></li>
                                    <li><a href="{{ route('news') }}">{{ trans('setting.news') }}</a></li>                               
                                    <li class="mega_parent"><a href="#">{{ trans('setting.category') }} <i class="fa fa-angle-down"></i></a>                                                                                                          
                                        <ul class="mega_menu">
                                            @foreach ($category as $ca)
                                                <li class="mega_item">                                          
                                                    <ul>
                                                        <li><a href="{{ route('category', $ca->id) }}">{{ $ca->name }}</a></li>
                                                    </ul> 
                                                </li> 
                                            @endforeach  
                                        </ul>                                     
                                    </li>
                                </ul>
                            </nav>
                        </div>                                             
                    </div>
                    <div class="header_right_info d-flex">
                        <div class="search_box">
                            <div class="search_inner">
                                {!! Form::open(['method' => 'GET', 'route' => 'search']) !!}
                                    <input type="text" name="result" placeholder="{{ trans('setting.search') }}">
                                    <button type="submit"><i class="ion-ios-search"></i></button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <div class="mini__cart">
                            <div class="mini_cart_inner">
                                <div class="cart_icon">
                                    <a href="#">
                                        <span class="cart_icon_inner">
                                            <i class="ion-android-cart"></i>
                                            <span class="cart_count">{{ Cart::count() }}</span>
                                        </span>
                                        <span class="item_total">{{ Cart::total() }} VND</span>
                                    </a>
                                </div> 
                                <div class="mini_cart_box cart_box_one">                             
                                    <div class="price_content">
                                        <div class="cart_subtotals">
                                            <div class="price_inline">
                                                <span class="label">{{ trans('setting.cartpage.ship') }}</span>
                                                <span class="value">{{ trans('setting.cartpage.free') }}</span>
                                            </div>
                                        </div>
                                            <div class="cart-total-price">
                                                <span class="label">{{ trans('setting.cartpage.total') }}</span>
                                                <span class="value">{{ Cart::total() }} VND</span>
                                            </div>
                                    </div>
                                    <div class="min_cart_checkout">
                                        <a href="{{ route('listCart') }}">{{ trans('setting.cart') }}</a>
                                    </div>
                                </div>                              
                            </div>
                        </div>
                        <div class="header_top_right">
                            @if (Auth::check())
                                <ul class="header_top_right_inner">
                                    <li class="language_wrapper_two">
                                        <a href="#">
                                            <span>{{ Auth::user()->name }}<i class="fa fa-angle-down"></i> </span>
                                        </a>
                                        <ul class="account__name">
                                            <li><a href="{{ route('user') }}">{{ trans('setting.user') }}</a></li>
                                            <li><a href="{{ route('logout') }}">{{ trans('setting.logout') }}</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            @else
                                <ul class="header_top_right_inner">
                                    <li class="language_wrapper_two">
                                        <a href="#">
                                            <span>{{ trans('setting.user') }}<i class="fa fa-angle-down"></i> </span>
                                        </a>
                                        <ul class="account__name">
                                            <li><a href="{{ route('signup') }}">{{ trans('setting.register') }}</a></li>
                                            <li><a href="{{ route('login') }}">{{ trans('setting.login') }}</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

