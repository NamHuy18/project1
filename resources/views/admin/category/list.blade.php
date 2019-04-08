@extends ('admin.layouts.master')
@section ('content')
<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
            <h5>{{ trans('setting.category') }}</h5>
        </div>
        <div class="horControlB menu_action">
            <ul>
                <li>
                    <a href="{{ route('addCat') }}">
                        <img src="{{ asset(config('setting.admin_image.icon')) }}/add.png"/>
                        <span>{{ trans('setting.add') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('listCat') }}">
                        <img src="{{ asset(config('setting.admin_image.icon')) }}/list.png"/>
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
            <div class="num f12">{{ trans('setting.count') }}: <b id="total">{{ count($category) }}</b></div>
        </div>
        @if (count($category) > 0)
            <table cellpadding="0" cellspacing="0" width='100%' class="sTable mTable myTable taskWidget" id="checkAll">
                <thead>
                    <tr>
                        <td>{{ trans('setting.name') }}</td>
                        <td>{{ trans('setting.slug') }}</td>
                        <td>{{ trans('setting.action') }}</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $cat)
                        <tr class='cat_{{$cat->id}}'>
                        <td>{{ $cat->name }}</td>
                        <td>{{ $cat->slug }}</td>
                        <td class="option">
                            <a href="edit/{{ $cat->id }}.html" title="Edit" class="tipS ">
                                <img src="{{ asset(config('setting.admin_image.icon')) }}/edit.png" />
                            </a>
                            <a href="delete/{{ $cat->id }}.html"  value="{{ $cat->id }}" title="Delete" class="tipS delete" >
                                <img src="{{ asset(config('setting.admin_image.icon')) }}/delete.png" />
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $category -> links() !!}
        @else
            <h5>{{ trans('setting.zero') }}</h5>
        @endif
    </div>
</div>
<div class="clear mt30"></div>
@endsection
