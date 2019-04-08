@extends('front.layouts.master')
@section('content')
<div class="slider_area">
    <div class="slider_list  owl-carousel">
        @foreach ($banner1 as $bn1)
            <div class="single_slide" style="background-image: url({{ asset(config('setting.avatar.banner')) }}/{{ $bn1->image }});">               
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider__content">
                                <p>Exclusive Offer -10% Off This Week</p>
                                <h2>Live <strong>healthy</strong> with a glass</h2>
                                <h3>of <strong>fruit juice</strong> every day</h3>  
                                <h6>Starting at<span>$42.99</span></h6>
                                <div class="slider_btn">
                                    <a href="shop.html">{{ trans('setting.homepage.shopping') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="banner_area home1_banner mt-30">
    <div class="container-fluid">
        <div class="row">
            @foreach ($banner2 as $bn2)
                <div class="col-lg-4 col-md-6">
                    <div class="single_banner">
                        <a><img src="{{ asset(config('setting.avatar.banner')) }}/{{ $bn2->image }}"></a>                           
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="shipping_area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="shipping_list d-flex justify-content-between flex-xs-column">
                    <div class="single_shipping_box d-flex">
                        <div class="shipping_icon">
                            <img src="{{ asset(config('setting.front_image.ship')) }}/1.png" alt="shipping icon">
                        </div>
                        <div class="shipping_content">
                            <h6>{{ trans('setting.homepage.ship1') }}</h6>
                            <p>{{ trans('setting.homepage.ship2') }}</p>
                        </div>
                    </div>
                    <div class="single_shipping_box one d-flex">
                        <div class="shipping_icon">
                            <img src="{{ asset(config('setting.front_image.ship')) }}/2.png" alt="shipping icon">
                        </div>
                        <div class="shipping_content">
                            <h6>{{ trans('setting.homepage.money_return1') }}</h6>
                            <p>{{ trans('setting.homepage.money_return2') }}</p>
                        </div>
                    </div>
                    <div class="single_shipping_box two d-flex">
                        <div class="shipping_icon">
                            <img src="{{ asset(config('setting.front_image.ship')) }}/3.png" alt="shipping icon">
                        </div>
                        <div class="shipping_content">
                            <h6>{{ trans('setting.homepage.member1') }}</h6>
                            <p>{{ trans('setting.homepage.member2') }}</p>
                        </div>
                    </div>
                    <div class="single_shipping_box three d-flex">
                        <div class="shipping_icon">
                            <img src="{{ asset(config('setting.front_image.ship')) }}/4.png" alt="shipping icon">
                        </div>
                        <div class="shipping_content">
                            <h6>{{ trans('setting.homepage.support') }}</h6>
                            <p>{{ trans('setting.homepage.ship2') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="features_product home_3 pt-90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title text-center">
                    <h3>{{ trans('setting.homepage.top_food') }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="features_product_three_active owl-carousel">
                @foreach ($foodTop as $fot)                            
                <div class="col-lg-2">
                    <div class="single__product">
                        <div class="single_product__inner">
                            @if ($fot->new == 1)
                                <span class="new_badge">{{ trans('setting.new') }}</span>
                            @endif                          
                            <div class="product_img">
                            <a href="{{ route('food', $fot->id) }}">
                                <img src="{{ asset(config('setting.avatar.food')) }}/{{ $fot->image }}" alt="">
                            </a>
                            </div>
                            <div class="product__content text-center">
                                <div class="produc_desc_info">
                                    <div class="product_title">
                                        <h4><a href="{{ route('food', $fot->id) }}">{{ $fot->name }}</a></h4>
                                    </div>
                                    @if ($fot->promotion_id != null)
                                        <span class="discount_price">-{{ $fot->promotion->discount }}%</span>
                                        <div class="product_price">
                                            <p class="regular_price">{{ number_format(($fot->price) - (($fot->price * $fot->promotion->discount) / 100)) }} VND</p>
                                            <p class="old_price">{{ number_format($fot->price) }} VND</p>
                                        </div>
                                    @else
                                        <div class="product_price">
                                            <p>{{ number_format($fot->price) }} VND</p>
                                        </div>
                                    @endif                                         
                                </div>
                                <div class="product__hover">
                                    {!! Form::open(['method' => 'POST', 'route' => ['addCart', $fot->id]]) !!}                                   
                                            {!! Form::submit(trans('setting.foodpage.add'), ['class' => 'ion-android-cart']) !!}                                    
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="recommended_product">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="shop_product_head d-flex justify-content-between mb-30">
                    <div class="section_title space_2 text-left">
                        <h3>{{ trans('setting.homepage.categories') }}</h3>
                    </div>
                    <div class="home_shop_product text-right">
                        <ul class="product-tab-list nav d-flex flex-wrap justify-content-end" role="tablist">
                            <li><a class="active" href="#fresh_fruit" data-toggle="tab" role="tab" aria-selected="true" aria-controls="fresh_fruit">{{ trans('setting.homepage.category1') }}</a></li>                                                                                        
                            <li><a href="#cucumber " data-toggle="tab" role="tab" aria-selected="false" aria-controls="cucumber">{{ trans('setting.homepage.category2') }}</a></li>
                            <li><a href="#tomato" data-toggle="tab" role="tab" aria-selected="false" aria-controls="tomato">{{ trans('setting.homepage.category3') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>        
        <div class="tab-content">
            <div class="tab-pane active show fade" id="fresh_fruit" role="tabpanel">
                <div class="row">
                    <div class="features_product_active owl-carousel">
                        @foreach($category as $ca)
                            @foreach ($ca->foods as $fo)
                                @if ($fo->pivot->category_id == 6)  
                                    <div class="col-lg-2">
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
                                                                    {!! Form::submit(trans('setting.foodpage.add'), ['class' => 'ion-android-cart']) !!}                                    
                                                            {!! Form::close() !!}
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>            
            <div class="tab-pane fade" id="cucumber" role="tabpanel">
                <div class="row">
                    <div class="features_product_active owl-carousel">
                        @foreach($category as $ca)
                            @foreach ($ca->foods as $fo)
                                @if ($fo->pivot->category_id == 7)
                                    <div class="col-lg-2">
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
                                                                    {!! Form::submit(trans('setting.foodpage.add'), ['class' => 'ion-android-cart']) !!}                                    
                                                            {!! Form::close() !!}
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach                      
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tomato" role="tabpanel">
                <div class="row">
                    <div class="features_product_active owl-carousel">
                        @foreach($category as $ca)
                            @foreach ($ca->foods as $fo)
                                @if ($fo->pivot->category_id == 8)  
                                    <div class="col-lg-2">
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
                                                                    {!! Form::submit(trans('setting.foodpage.add'), ['class' => 'ion-android-cart']) !!}                                    
                                                            {!! Form::close() !!}
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>       
    </div>
</div>
<div class="banner_area home1_banner2 pb-90">
    <div class="container-fluid">
        <div class="row">
            @foreach ($banner3 as $bn3)
                <div class="col-lg-6">
                    <div class="single_banner">
                        <a><img src="{{ asset(config('setting.avatar.banner')) }}/{{ $bn3->image }}"></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="new_product new_product_three">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title space_2 text-left">
                    <h3>{{ trans('setting.homepage.new_food') }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="features_product_active_three owl-carousel">
                @foreach ($foodNew as $fon)
                <div class="col-lg-2">
                    <div class="single__product">
                        <div class="single_product__inner">
                            <span class="new_badge">{{ trans('setting.new') }}</span>
                            <div class="product_img">
                            <a href="{{ route('food', $fon->id) }}">
                                <img src="{{ asset(config('setting.avatar.food')) }}/{{ $fon->image }}" alt="">
                            </a>
                            </div>
                            <div class="product__content text-center">
                                <div class="produc_desc_info">
                                    <div class="product_title">
                                        <h4><a href="{{ route('food', $fon->id) }}">{{ $fon->name }}</a></h4>
                                    </div>
                                    @if ($fon->promotion_id != null)
                                        <span class="discount_price">-{{ $fon->promotion->discount }}%</span>
                                        <div class="product_price">
                                            <p class="regular_price">{{ number_format(($fon->price) - (($fon->price * $fon->promotion->discount) / 100)) }} VND</p>
                                            <p class="old_price">{{ number_format($fon->price) }} VND</p>
                                        </div>
                                    @else
                                        <div class="product_price">
                                            <p>{{ number_format($fon->price) }} VND</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="product__hover">
                                        {!! Form::open(['method' => 'POST', 'route' => ['addCart', $fon->id]]) !!}                                   
                                                {!! Form::submit(trans('setting.foodpage.add'), ['class' => 'ion-android-cart']) !!}                                    
                                        {!! Form::close() !!}
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="banner_area banner_area-2 pb-90">
    <div class="container-fluid">
        <div class="row">
            @foreach ($banner4 as $bn4)
                <div class="col-lg-4 col-md-4">
                    <div class="single_banner">
                        <a><img src="{{ asset(config('setting.avatar.banner')) }}/{{ $bn4->image }}"></a> 
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="new_product new_product_three three_bottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title space_2 text-left">
                    <h3>{{ trans('setting.homepage.sale_food') }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="features_product_active_three owl-carousel">
                @foreach ($foodSale as $fos)
                <div class="col-lg-2">
                    <div class="single__product">
                        <div class="single_product__inner">
                            @if ($fos->new == 1)
                                <span class="new_badge">new</span>
                            @endif
                            <span class="discount_price">-{{ $fos->promotion->discount }}%</span>                           
                            <div class="product_img">
                            <a href="{{ route('food', $fos->id) }}">
                                <img src="{{ asset(config('setting.avatar.food')) }}/{{ $fos->image }}" alt="">
                            </a>
                            </div>
                            <div class="product__content text-center">
                                <div class="produc_desc_info">
                                    <div class="product_title">
                                        <h4><a href="{{ route('food', $fos->id) }}">{{ $fos->name }}</a></h4>
                                    </div>
                                    <div class="product_price">
                                        <p class="regular_price">{{ number_format(($fos->price) - (($fos->price * $fos->promotion->discount) / 100)) }} VND</p>
                                        <p class="old_price">{{ number_format($fos->price) }} VND</p>
                                    </div>
                                </div>
                                <div class="product__hover">
                                        {!! Form::open(['method' => 'POST', 'route' => ['addCart', $fos->id]]) !!}                                   
                                                {!! Form::submit(trans('setting.foodpage.add'), ['class' => 'ion-android-cart']) !!}                                    
                                        {!! Form::close() !!}
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="best_seller_product two best_seller_three">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-8">
                <div class="section_title space_2 text-left">
                    <h3>{{ trans('setting.homepage.category4') }}</h3>
                </div>            
                <div class="best_selling_product_three owl-carousel">
                    @foreach($category as $ca)
                        @foreach ($ca->foods as $fo)
                            @if ($fo->pivot->category_id == 3)  
                                <div class="best_selling_product">                          
                                    <div class="single_small_product small_three">
                                        <div class="product_thumb">
                                            <a href="{{ route('food', $fo->id) }}">
                                                <img src="{{ asset(config('setting.avatar.food')) }}/{{ $fo->image }}" alt="">
                                            </a>
                                        </div>
                                        <div class="product_content">
                                            <h4><a href="{{ route('food', $fo->id) }}">{{ $fo->name }}</a></h4>
                                            <div class="product_ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            @if ($fo->promotion != null)
                                                <div class="product_price">
                                                    <span class="regular_price">{{ number_format(($fo->price) - (($fo->price * $fo->promotion->discount) / 100)) }} VND</span>
                                                    <span class="old_price">{{ number_format($fo->price) }} VND</span>
                                                </div>
                                            @else 
                                                <span class="old_price">{{ number_format( $fo->price) }} VND</span>
                                            @endif
                                        </div>
                                    </div>                                       
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>                
            </div>
            <div class="col-lg-4 col-md-8">
                <div class="section_title space_2 text-left">
                    <h3>{{ trans('setting.homepage.category5') }}</h3>
                </div>            
                <div class="best_selling_product_three owl-carousel">
                    @foreach($category as $ca)
                        @foreach ($ca->foods as $fo)
                            @if ($fo->pivot->category_id == 4)  
                                <div class="best_selling_product">                          
                                    <div class="single_small_product small_three">
                                        <div class="product_thumb">
                                            <a href="{{ route('food', $fo->id) }}">
                                                <img src="{{ asset(config('setting.avatar.food')) }}/{{ $fo->image }}" alt="">
                                            </a>
                                        </div>
                                        <div class="product_content">
                                            <h4><a href="{{ route('food', $fo->id) }}">{{ $fo->name }}</a></h4>
                                            <div class="product_ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            @if ($fo->promotion != null)
                                                <div class="product_price">
                                                    <span class="regular_price">{{ number_format(($fo->price) - (($fo->price * $fo->promotion->discount) / 100)) }} VND</span>
                                                    <span class="old_price">{{ number_format($fo->price) }} VND</span>
                                                </div>
                                            @else 
                                                <span class="old_price">{{ number_format($fo->price) }} VND</span>
                                            @endif
                                        </div>
                                    </div>                                       
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>                
            </div>
            <div class="col-lg-4 col-md-8">
                <div class="section_title space_2 text-left">
                    <h3>{{ trans('setting.homepage.category6') }}</h3>
                </div>            
                <div class="best_selling_product_three owl-carousel">
                    @foreach($category as $ca)
                        @foreach ($ca->foods as $fo)
                            @if ($fo->pivot->category_id == 5)  
                                <div class="best_selling_product">                          
                                    <div class="single_small_product small_three">
                                        <div class="product_thumb">
                                            <a href="{{ route('food', $fo->id) }}">
                                                <img src="{{ asset(config('setting.avatar.food')) }}/{{ $fo->image }}" alt="">
                                            </a>
                                        </div>
                                        <div class="product_content">
                                            <h4><a href="{{ route('food', $fo->id) }}">{{ $fo->name }}</a></h4>
                                            <div class="product_ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            @if ($fo->promotion != null)
                                                <div class="product_price">
                                                    <span class="regular_price">{{ number_format(($fo->price) - (($fo->price * $fo->promotion->discount) / 100)) }} VND</span>
                                                    <span class="old_price">{{ number_format($fo->price) }} VND</span>
                                                </div>
                                            @else 
                                                <span class="old_price">{{ number_format($fo->price) }} VND</span>
                                            @endif
                                        </div>
                                    </div>                                       
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection
