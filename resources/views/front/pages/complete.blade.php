@extends('front.layouts.master')
@section('content')
<div class="breadcrumb_container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">     
                <nav>
                    <ul>
                        <li><a href="{{ route('home') }}">{{ trans('setting.home') }}</a> ></li>
                        <li>{{ trans('setting.complete') }}</li>
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
                <p>Quý Khách đã đặt hàng thành công!</p>     
                <p>* Hóa đơn mua hàng của quý khách đã được chuyển đến dịa chỉ Email có trong phần thông tin khách hàng của chúng tôi.</p>
                <p>* Sản phẩm của quý khách sẽ được chuyển đến địa chỉ có trong phần thông tin khách hàng của chúng tôi sau 30 phút tính từ thời điểm này.</p>
                <p>* Nhân viên giao hàng sẽ liên hệ với quý khách qua số điện thoại có trong phần thông tin khách hàng của chúng tôi.</p> 
                <p>Cảm ơn quý khách đã sử dụng sản phẩm của chúng tôi</p>
            </div>
            <div class="buttons-carts">
                <a href="{{ route('home') }}">{{ trans('setting.home') }}</a>
            </div>    
        </div>    
    </div>   
</div>
@endsection

