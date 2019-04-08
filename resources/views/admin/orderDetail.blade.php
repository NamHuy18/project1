@extends ('admin.layouts.master')
@section ('content')
<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
            <h5>{{ trans('setting.orderpage.detail') }}</h5>
        </div>
        <div class="clear"></div>
    </div>
</div>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $err)
            {{ $err }}<br>
        @endforeach
    </div>
@endif
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<div class="line"></div>
<div class="wrapper">
    <div class="widget" id='main_content'>
        <div class="title">
            <h6>{{ trans('setting.list') }}</h6>
        </div>
        @if (count($orderDetail) > 0)
            <table cellpadding="0" cellspacing="0" width='100%' class="sTable mTable myTable taskWidget" id="checkAll">
                <thead>
                    <tr>
                        <td>{{ trans('setting.orderpage.name') }}</td>
                        <td>{{ trans('setting.orderpage.img') }}</td>
                        <td>{{ trans('setting.orderpage.qty') }}</td>
                        <td>{{ trans('setting.orderpage.price') }}</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderDetails as $od)
                        <tr class='cat_{{$od->id}}'>
                        <td>{{ $od->food->name }}</td>
                        <td><img id="avatar_admin" src="{{ asset(config('setting.avatar.food')) }}/{{ $od->food->image }}"></td>
                        <td>{{ $od->quanity }}</td>
                        <td>{{ number_format($od->unit_price) }} VND</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h5>{{ trans('setting.zero') }}</h5>
        @endif
    </div>
</div>
<div class="clear mt30"></div>
@endsection

