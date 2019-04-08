@extends('front.layouts.master')
@section('content')
<div class="breadcrumb_container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">     
                <nav>
                    <ul>
                        <li><a href="{{ route('home') }}">{{ trans('setting.home') }}</a> ></li>
                        <li>{{ $categoryFood->name }}</li>
                    </ul>
                </nav>
            </div>
        </div> 
    </div>        
</div>
<div class="shop_wrapper ptb-90">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="categories_banner">
                    <div class="categories_banner_inner">
                        <img src="{{ asset(config('setting.front_image.banner')) }}/shop.jpg" alt="">
                    </div>
                    <h3>{{ trans('setting.product') }}</h3>
                </div>
                <div class="tav_menu_wrapper">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-7 col-sm-6">
                            <div class="tab_menu shop_menu">
                                <div class="tab_menu_inner">
                                    <ul class="nav" role="tablist">
                                        <li><a  class="active" data-toggle="tab" href="#shop_active" role="tab" aria-controls="shop_active" aria-selected="true"><i class="fa fa-th" aria-hidden="true"></i></a></li>

                                        <li><a data-toggle="tab" href="#featured_active" role="tab" aria-controls="featured_active" aria-selected="false"><i class="fa fa-list" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div> 
                <div class="tab_product_wrapper">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="shop_active" >
                            <div class="row">
                                @foreach ($categoryFood->foods as $fo)
                                    @if ($fo->pivot->category_id == $id)
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">                                             
                                            <div class="single__product">
                                                <div class="single_product__inner">
                                                    @if ($fo->new == 1)
                                                        <span class="new_badge">{{ trans('setting.new') }}</span>
                                                    @endif
                                                    <div class="product_img">
                                                        <a href="{{ route('food', $fo->id) }}">
                                                            <img src="{{ asset(config('setting.avatar.food')) }}/{{ $fo->image }}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product__content text-center">
                                                        <div class="produc_desc_info">
                                                            <div class="product_title">
                                                                <h4><a href="{{ route('food', $fo->id) }}">{{ $fo->name }}</a></h4>
                                                            </div>
                                                        @if ($fo->promotion_id != null)
                                                            <span class="discount_price">-{{ $fo->promotion->discount }}%</span>
                                                            <div class="product_price">
                                                                <p class="regular_price">{{ number_format(($fo->price) - (($fo->price * $fo->promotion->discount) / 100)) }} VND</p>
                                                                <p class="old_price">{{ number_format($fo->price) }} VND</p>
                                                            </div>
                                                        @else
                                                            <div class="product_price">
                                                                <p>{{ number_format($fo->price) }} VND</p>
                                                            </div>
                                                        @endif
                                                        </div>
                                                        <div class="product__hover">
                                                            {!! Form::open(['method' => 'POST', 'route' => ['addCart', $fo->id]]) !!}                                   
                                                                    {{ Form::submit(trans('setting.foodpage.add'), ['class' => 'ion-android-cart']) }}                                   
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                                                                                                                
                                        </div> 
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="featured_active" role="tabpanel">
                            <div class="tab_product_bottom_wrapper">    
                                <div class="row">
                                    @foreach ($categoryFood->foods as $fo)
                                        @if ($fo->pivot->category_id == $id)
                                            <div class="col-lg-4 col-md-5 col-sm-5">
                                                <div class="single_product__inner inner_shop">
                                                    @if ($fo->new == 1)
                                                        <span class="new_badge">{{ trans('setting.new') }}</span>
                                                    @endif
                                                    @if ($fo->promotion_id != null)
                                                        <span class="discount_price">-{{ $fo->promotion->discount }}%</span>
                                                    @endif
                                                    <div class="product_img">
                                                        <a href="{{ route('food', $fo->id) }}">
                                                            <img src="{{ asset(config('setting.avatar.food')) }}/{{ $fo->image }}" alt="">
                                                        </a>
                                                    </div>
                                                </div> 
                                            </div> 
                                            <div class="col-lg-8 col-md-7 col-sm-7">
                                                <div class="product__content text-left">
                                                    <div class="produc_desc_info">
                                                        <div class="product_title title_shop">
                                                            <h4><a href="{{ route('food', $fo->id) }}">{{ $fo->name }}</a></h4>
                                                        </div>
                                                        @if ($fo->promotion_id != null)                                                               
                                                            <div class="product_price price_shop">
                                                                <p class="regular_price">{{ number_format($fo->price) }} VND</p>
                                                                <p>{{ number_format(($fo->price) - (($fo->price * $fo->promotion->discount) / 100)) }} VND</p>
                                                            </div>
                                                        @else 
                                                            <div class="product_price price_shop">
                                                                <p>{{ number_format($fo->price) }} VND</p>
                                                            </div>
                                                        @endif
                                                        <div class="product_content_shop">
                                                            <p>{{ $fo->description }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="product__hover hover_shop">
                                                    <div class="product_addto_cart">
                                                        {!! Form::open(['method' => 'POST', 'route' => ['addCart', $fo->id]]) !!}                                   
                                                            {{ Form::submit(trans('setting.foodpage.add')) }}                                    
                                                        {!! Form::close() !!}
                                                    </div>
                                                    &nbsp;
                                                    <div class="product_cart_icone">
                                                            <ul>
                                                                
                                                                <li><a class="cart-fore" href="#" data-toggle="modal" data-target="#my_modal"  title="Quick View" ><i class="ion-android-open"></i></a></li>

                                                                <li><a href="{{ route('food', $fo->id) }}"><i class="ion-clipboard"></i></a></li>
                                                            </ul>
                                                        </div>    
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>                        
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection

