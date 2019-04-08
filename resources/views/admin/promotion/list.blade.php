@extends('admin.layouts.master')
@section('content')
<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
            <h5>{{ trans('setting.sale_manage') }}</h5>
        </div>
        <div class="horControlB menu_action">
            <ul>
                <li>
                    <a href="{{ route('addSale') }}">
                        <img src="{{ asset(config('setting.admin_image.icon')) }}/add.png"/>
                        <span>{{ trans('setting.add') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('listSale') }}">
                        <img src="{{ asset(config('setting.admin_image.icon')) }}/list.png" />
                        <span>{{ trans('setting.list') }}</span>
                    </a>
                </li>
            </ul>
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
            <div class="num f12">{{ trans('setting.count') }}: <b id="total">{{ count($promotion) }}</b></div>
        </div>
        @if (count($promotion) > 0)
            <table width="100%" class="sTable mTable myTable taskWidget" id="checkAll">
                <thead>
                    <tr>
                        <td>{{ trans('setting.sale') }}</td>
                        <td>{{ trans('setting.start_date') }}</td>
                        <td>{{ trans('setting.end_date') }}</td>
                        <td>{{ trans('setting.action') }}</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($promotion as $pr)
                        <tr class='pr_{{$pr->id}}'>
                        <td>{{ $pr->discount }}%</td>
                        <td>{{ $pr->start_date }}</td>
                        <td>{{ $pr->end_date }}</td>
                        <td class="option">
                            <a href="{{ route('editSale', $pr->id ) }}.html" title="Edit" class="tipS">
                                <img src="{{ asset(config('setting.admin_image.icon')) }}/edit.png"/>
                            </a>
                            <a href="delete/{{ $pr->id }}.html" value="{{ $pr->id }}" title="Delete" class="tipS delete">
                                <img src="{{ asset(config('setting.admin_image.icon')) }}/delete.png"/>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $promotion -> links() !!}
        @else
            <h5>{{ trans('setting.zero') }}</h5>
        @endif
    </div>
</div>
<div class="clear mt30"></div>
@endsection
