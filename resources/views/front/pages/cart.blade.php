@extends('front.layouts.master')
@section('content')
<div class="breadcrumb_container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">     
                <nav>
                    <ul>
                        <li><a href="{{ route('home') }}">{{ trans('setting.home') }}</a> ></li>
                        <li>{{ trans('setting.cart') }}</li>
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
                        @if(count($cartFood))
                            <table>
                                <thead>
                                    <tr>
                                        <th class="img-thumbnail">{{ trans('setting.image') }}</th>
                                        <th class="product-name">{{ trans('setting.product') }}</th>
                                        <th class="product-price">{{ trans('setting.price') }}</th>
                                        <th class="product-quantity">{{ trans('setting.foodpage.quanity') }}</th>
                                        <th class="product-subtotal">{{ trans('setting.cartpage.total') }}</th>
                                        <th class="product-remove">{{ trans('setting.delete') }}</th>
                                    </tr>
                                </thead>
                                @foreach($cartFood as $ca)
                                    <tbody>
                                        <tr>
                                            <td class="product-thumbnail"><img id="avatar_admin" src="{{ asset(config('setting.avatar.food')) }}/{{ $ca->options->image }}"></td>
                                            <td class="product-name"><a href="#">{{ $ca->name }}</a></td>
                                            <td class="product-price"><span class="amount">{{ number_format($ca->price) }} VND</span></td>
                                            <td class="product-quantity">
                                                <div class="quickview_plus_minus quick_cart">
                                                    <div class="quickview_plus_minus_inner">
                                                        <div class="cart-plus-minus cart_page">
                                                            <input type="text" value="{{ $ca->qty }}" name="qtybutton" class="cart-plus-minus-box" onchange ="updateCart(this.value, '{{ $ca->rowId }}')">
                                                        </div>
                                                    </div>    
                                                </div> 
                                            </td>
                                            <td class="product-subtotal">{{ number_format($ca->price * $ca->qty) }} VND</td>
                                            <td class="product-remove"><a href="{{ route('deleteCart', $ca->rowId) }}">X</a></td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        @else
                            <p>{{ trans('setting.cartpage.noproduct') }}</p>
                        @endif
                    </div>
                    <div class="row table-responsive_bottom">
                        <div class="col-lg-7 col-sm-7 col-md-7">
                           <div class="buttons-carts">
                                <a href="{{ route('home') }}">{{ trans('setting.cartpage.continue') }}</a>
                                <a href="{{ asset('cart/delete/all') }}">{{ trans('setting.cartpage.remove') }}</a>  
                            </div> 
                        </div> 
                        <div class="col-lg-5 col-sm-5 col-md-5">
                             <div class="cart_totals  text-right">
                                <h2>{{ trans('setting.cartpage.carttotal') }}</h2>
                                <div class="order-total">
                                    <span><strong>{{ trans('setting.cartpage.total') }}</strong> </span>          
                                    <span><strong>{{ Cart::total() }} VND</strong> </span>
                                </div>
                                @if (Auth::check())
                                    <div class="wc-proceed-to-checkout">
                                        <a href="{{ route('order') }}">{{ trans('setting.cartpage.checkout') }}</a>
                                    </div>
                                @else
                                    <div class="wc-proceed-to-checkout">
                                        <a href="{{ route('login') }}">{{ trans('setting.cartpage.login') }}</a>
                                    </div>
                                @endif
                             </div>    
                        </div>    
                    </div>
                </form>         
            </div>    
        </div>    
    </div>   
</div>
<script type="text/javascript">
    function updateCart(qty, rowId)
    {
        $.get(
            '{{ asset('cart/update') }}',
            {qty:qty, rowId:rowId},
            function()
            {
                location.reload();
            }
        );
    }
</script>
@endsection

