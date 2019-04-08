@extends('front.layouts.master')
@section('content')
<div class="breadcrumb_container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">     
                <nav>
                    <ul>
                        <li><a href="{{ route('home') }}">{{ trans('setting.home') }}</a> ></li>
                        <li>{{ $food->name }}</li>
                    </ul>
                </nav>
            </div>
        </div> 
    </div>        
</div>
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<div class="table_primary_block pt-100">
    <div class="container">   
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="product-flags">  
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tabone" role="tabpanel" >
                            <div class="product_tab_img">
                                <a href="#"><img src="{{ asset(config('setting.avatar.food')) }}/{{ $food->image }}" alt=""></a>    
                            </div>
                        </div>
                    </div>
                    <div class="products_tab_button">    
                        <ul class="nav product_navactive" role="tablist">
                            @foreach ($food->images as $img)
                            <li  class="product_button_one">
                                <a class="nav-link active"  data-toggle="tab" href="#tabone" role="tab" aria-controls="imgeone" aria-selected="false"><img height="100px" src="{{ asset(config('setting.avatar.foodImage')) }}/{{ $img->image }}" alt=""></a>
                            </li> 
                            @endforeach
                        </ul>
                    </div>    
                </div>  
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12">
                <div class="product__details_content">
                    <div class="demo_product">
                        <h2>{{ $food->name }}</h2> 
                    </div>
                    <div class="product_comments_block">
                        <div class="comments_note clearfix">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </div> 
                        <div class="comments_advices">
                            <ul>
                                <li><a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i>
                                 Read reviews (<span>1</span>)</a></li>
                                <li><a href="#"><i class="fa fa-pencil"></i>Read reviews </a></li>
                            </ul>    
                        </div>   
                    </div>
                    <div class="current_price">
                        @if ($food->promotion_id != null)
                            <span class="regular_price">{{number_format(($food->price) - (($food->price * $food->promotion->discount) / 100)) }} VND</span> &nbsp;
                            <span class="old_price">{{number_format($food->price) }} VND</span>
                        @else
                        <span>{{number_format($food->price) }} VND</span> 
                        @endif
                    </div>
                    <div class="product_information">
                        <div id="product_description_short">
                            <p>{{ $food->description }}</p>    
                        </div>
                        <div class="product_variants">                          
                                <div class="quickview_plus_minus">
                                    <div class="quickview_plus_minus_inner">
                                        <div class="add_button">
                                            {!! Form::open(['method' => 'POST', 'route' => ['addCart', $food->id]]) !!}
                                                {!! Form::submit(trans('setting.foodpage.add')) !!} 
                                            {!! Form::close() !!}
                                        </div>
                                    </div>    
                                </div>                          
                            <div class="product-availability">
                                <span id="availability">
                                    <i class="zmdi zmdi-check"></i>
                                    {{ trans('setting.foodpage.stock') }}    
                                </span>    
                            </div> 
                            <div class="social-sharing">
                               <span>{{ trans('setting.foodpage.share') }}</span>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                </ul>    
                            </div> 
                            <div class="block-reassurance">
                                <ul>
                                    <li>
                                        <img src="{{ asset(config('setting.front_image.cart')) }}/cart1.png" alt="">
                                        <span>{{ trans('setting.foodpage.security') }}</span>
                                    </li>
                                    <li>
                                        <img src="{{ asset(config('setting.front_image.cart')) }}/cart2.png" alt="">
                                        <span>{{ trans('setting.foodpage.ship') }}</span>
                                    </li>
                                    <li>
                                        <img src="{{ asset(config('setting.front_image.cart')) }}/cart3.png" alt="">
                                        <span>{{ trans('setting.foodpage.return') }}</span>
                                    </li>
                                </ul>    
                            </div>
                        </div>
                    </div>   
                </div>
            </div>   
        </div>
    </div>       
</div>
<div class="product_page_tab ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_tab_button">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li>
                            <a class=" tav_past active" id="home-tab" data-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">{{ trans('setting.foodpage.detail') }}</a>
                        </li>
                       <li>
                            <a class=" tav_past"  id="contact-tab" data-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews" aria-selected="false">{{ trans('setting.comment') }}</a>
                       </li>
                    </ul>
                </div>    
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="Description" role="tabpanel" >
                        <div class="product-description">
                            <p>{!! $food->content !!}</p>  
                       </div>
                    </div>
                    <div class="tab-pane fade" id="Reviews" role="tabpanel">                        
                        <div class="product_comments_block_tab">                           
                            <div class="comment_clearfix">
                                <div class="comment_author">
                                    <span>{{ trans('setting.foodpage.grade') }}</span> 
                                    <div class="star_content clearfix">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>    
                                    </div>                                    
                                </div>
                                @foreach ($food->comments as $cm)
                                    <div class="comment_author_infos">
                                        <strong>{{ $cm->user->name }}</strong>
                                        <br>
                                        <em>{{ $cm->created_at }}</em>    
                                    </div>
                                    <div class="comment_details">
                                        <p>{{ $cm->content }}</p>   
                                    </div>
                                @endforeach
                            </div> 
                            <div class="blog_leave_area">                           
                            @if (Auth::check())
                                    {!! Form::open(['method' => 'POST', 'route' => ['commentFood', $food->id]]) !!}
                                        <div class="col-12">
                                            <div class="label_textarea">
                                                {!! Form::label('comment', trans('setting.foodpage.write')) !!}
                                                {!! Form::textarea('content', null, ['placeholder' => trans('setting.comment')]) !!}   
                                            </div>
                                        </div>                                   
                                        <div class="clear"></div> &nbsp;                                      
                                        <div class="col-12">
                                            <div class="blog_leave_btn">
                                                <button type="submit">{{ trans('setting.comment') }}</button>
                                            </div>    
                                        </div>                                 
                                    {!! Form::close() !!}
                            @else
                                <div class="review">
                                    <p><a href="{{ route('login') }}">{{ trans('setting.foodpage.write') }}</a></p>   
                                </div> 
                            @endif  
                        </div>                           
                        </div>  
                   </div>
                </div>
            </div>    
         </div>    
    </div>        
</div>
<div class="features_product">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title text-left">
                    <h3>{{ trans('setting.foodpage.same') }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="related_product_active owl-carousel">
                <div class="label_textarea">
                    <textarea placeholder="Comment*"></textarea>    
                </div>                 @foreach($category as $ca)
                    @foreach ($ca->foods as $fo)
                        @if ($fo->pivot->category_id == $dataFood)
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
                                                        <p class="regular_price">{{number_format(($fo->price) - (($fo->price * $fo->promotion->discount) / 100)) }} VND</p>
                                                        <p class="old_price">{{number_format($fo->price) }} VND</p>
                                                    </div>
                                                @else
                                                <div class="product_price">
                                                    <p>{{number_format($fo->price) }} VND</p>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="product__hover">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-cart"></i></a></li>
                                                    <li><a class="cart-fore" href="#" data-toggle="modal" data-target="#my_modal"  title="Quick View" ><i class="ion-android-open"></i></a></li>
                                                    <li><a href="{{ route('food', $fo->id) }}"><i class="ion-clipboard"></i></a></li>
                                                </ul>
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
@endsection

