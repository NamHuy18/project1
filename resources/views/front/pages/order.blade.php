@extends('front.layouts.master')
@section('content')
<div class="breadcrumb_container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">     
                <nav>
                    <ul>
                        <li><a href="{{ route('home') }}">{{ trans('setting.home') }}</a> ></li>
                        <li>{{ trans('setting.order') }}</li>
                    </ul>
                </nav>
            </div>
        </div> 
    </div>        
</div>
<div class="Checkout_page_section">
    <div class="container">
        <div class="row">
           <div class="col-12">
                <div class="customer-login mb-40">
                    <h3> 
                        <i aria-hidden="true"></i>                                                   
                    </h3>   
                </div>   
           </div>
        </div>
        <div class="checkout-form">
            {!! Form::open(['method' => 'POST', 'route' => ['order']]) !!}
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="order-wrapper">
                            <h3>Your order</h3>
                            <div class="order-table table-responsive mb-30">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    @foreach ($orderCart as $oc)
                                        <tbody>
                                            <tr>
                                                <td class="product-name">{{ $oc->name }}<strong> × {{ $oc->qty }}</strong></td>
                                                <td class="amount">{{ $oc->price * $oc->qty }} VND</td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                    <tfoot>
                                        <tr>
                                            <th>{{ trans('setting.cartpage.ship') }}</th>
                                            <td>{{ trans('setting.cartpage.free') }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('setting.cartpage.total') }}</th>
                                            <td><strong>{{ Cart::total() }} VND</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>    
                            </div>
                            <div class="payment-method">
                            <div class="panel-default">
                                    
                                    <label  class="righ_10" data-toggle="collapse" data-target="#collapsethree" aria-controls="collapseOne"><input type="checkbox" value="ATM" name="payment">ATM</label>

                                    <div id="collapsethree" class="collapse"  data-parent="#accordion">
                                        <div class="card-body2">
                                        <p>{{ trans('setting.orderpage.atm') }}</p>
                                        </div>
                                    </div>
                                </div> 
                                <div class="panel-default">
                                    <label class="righ_10" data-toggle="collapse" data-target="#collapsefour" aria-controls="collapseOne"><input type="checkbox" value="Cash" name="payment">Tiền Mặt</label>

                                    <div id="collapsefour" class="collapse" data-parent="#accordion">
                                        <div class="card-body2">
                                        <p>{{ trans('setting.orderpage.cash') }}</p>
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-12">
                                    <div class="order-notes">
                                            <label for="order_note">Order Notes</label>
                                        <textarea name="note" id="order_note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>    
                                </div>  
                                <div class="order-button">
                                    <button type="submit">{{ trans('setting.orderpage.checkout') }}</button> 
                                </div>    
                            </div>   
                            
                        </div>  
                    </div>
                </div>
            {!! Form::close() !!}
        </div>     
    </div>    
</div>
@endsection

