@extends ('admin.layouts.master')
@section ('content')
<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
            <h5>{{ trans('setting.order') }}</h5>
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
            <div class="num f12">{{ trans('setting.count') }}: <b id="total">{{ count($order) }}</b></div>
        </div>
        @if (count($order) > 0)
            <table cellpadding="0" cellspacing="0" width='100%' class="sTable mTable myTable taskWidget" id="checkAll">
                <thead>
                    <tr>
                        <td>{{ trans('setting.orderpage.date') }}</td>
                        <td>{{ trans('setting.orderpage.total') }}</td>
                        <td>{{ trans('setting.orderpage.payment') }}</td>
                        <td>{{ trans('setting.orderpage.note') }}</td>
                        <td>{{ trans('setting.orderpage.user') }}</td>
                        <td>{{ trans('setting.orderpage.status') }}</td>
                        <td>{{ trans('setting.orderpage.detail') }}</td>
                        <td>{{ trans('setting.action') }}</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $or)
                        <tr class='cat_{{$or->id}}'>
                        <td>{{ $or->date_order }}</td>
                        <td>{{ number_format($or->total) }} VND</td>
                        <td>{{ $or->payment }}</td>
                        <td>{{ $or->note }}</td>
                        <td>{{ $or->user->name }}</td>
                        <td>
                            @if ($or->status == 0)
                                {{ trans('setting.orderpage.no') }}                           
                            @else
                                {{ trans('setting.orderpage.yes') }}
                            @endif
                        </td>
                        <td class="option"><a href="{{ route('listDetail', $or->id) }}"><img src="{{ asset('bower_components/source/backend/admin/images/icons/view.png') }}" /></a></td>
                        @if ($or->status == 0)
                        <td class="option">
                            <a href="{{ route('editOrder', $or->id) }} . html" title="Edit" class="tipS">
                                <img src="{{ asset(config('setting.admin_image.icon')) }}/edit.png"/>
                            </a>
                        </td>
                        @else
                        <td class="option">
                        <a href="delete/{{ $or->id }}.html"  value="{{ $or->id }}" title="Delete" class="tipS delete" >
                            <img src="{{ asset(config('setting.admin_image.icon')) }}/delete.png" />
                        </a>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $order -> links() !!}
        @else
            <h5>{{ trans('setting.zero') }}</h5>
        @endif
    </div>
</div>
<div class="clear mt30"></div>
@endsection

