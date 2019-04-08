@extends('front.layouts.master')
@section('content')
<div class="breadcrumb_container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">     
                <nav>
                    <ul>
                        <li><a href="{{ route('home') }}">{{ trans('setting.home') }}</a> ></li>
                        <li>{{ trans('setting.orderpage.detail') }}</li>
                    </ul>
                </nav>
            </div>
        </div> 
    </div>        
</div>
<div class="cart_main_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">  
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="img-thumbnail">{{ trans('setting.image') }}</th>
                                    <th class="product-name">{{ trans('setting.product') }}</th>
                                    <th class="product-price">{{ trans('setting.price') }}</th>
                                    <th class="product-quantity">{{ trans('setting.foodpage.quanity') }}</th>
                                    <th class="product-subtotal">{{ trans('setting.cartpage.total') }}</th>
                                </tr>
                            </thead>
                            @foreach($order->orderDetails as $od)
                                <tbody>
                                    <tr>
                                        <td class="product-thumbnail"><img id="avatar_admin" src="{{ asset(config('setting.avatar.food')) }}/{{ $od->food->image }}"></td>
                                        <td class="product-name"><a href="#">{{ $od->food->name }}</a></td>
                                        <td class="product-price"><span class="amount">{{ number_format($od->food->price) }} VND</span></td>
                                        <td class="product-quantity">
                                            <div class="quickview_plus_minus quick_cart">
                                                <div class="quickview_plus_minus_inner">
                                                    <div>
                                                        <input type="text" value="{{ $od->quanity }}" name="qtybutton" class="cart-plus-minus-box" readonly>
                                                    </div>
                                                </div>    
                                            </div> 
                                        </td>
                                        <td class="product-subtotal">{{ number_format($od->unit_price) }} VND</td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                    <div class="row table-responsive_bottom">
                        <div class="col-lg-5 col-sm-5 col-md-5">
                             <div class="cart_totals  text-right">
                                <h2>{{ trans('setting.cartpage.carttotal') }}</h2>
                                <div class="order-total">
                                    <span><strong>{{ trans('setting.cartpage.total') }}</strong></span>          
                                    <span><strong>{{ number_format($order->total) }} VND</strong> </span>
                                </div>
                             </div>    
                        </div>    
                    </div>
                </form>         
            </div>    
        </div>    
    </div>   
</div>
@endsection

