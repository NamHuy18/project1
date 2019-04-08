@extends ('admin.layouts.master')
@section ('content')
<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
            <h5>{{ trans('setting.image_manage') }}</h5>
            <h6>{{ $food->name }}</h6>
        </div>
        <div class="horControlB menu_action">
            <ul>
                <li>
                    <a href="{{ route('addImage', $food->id) }}">
                        <img src="{{ asset(config('setting.admin_image.icon')) }}/add.png"/>
                        <span>{{ trans('setting.add') }}</span>
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
            <div class="num f12">{{ trans('setting.count') }}: <b id="total">{{ count($foodImage) }}</b></div>
        </div>
        @if (count($foodImage) > 0)
            <table cellpadding="0" cellspacing="0" width='100%' class="sTable mTable myTable taskWidget" id="checkAll">
                <thead>
                    <tr>
                        <td><img src="{{ asset(config('setting.admin_image.icon')) }}/tableArrows.png" /></td>
                        <td>{{ trans('setting.name') }}</td>
                        <td>{{ trans('setting.image') }}</td>
                        <td>{{ trans('setting.action') }}</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($food->images as $fi)
                        <tr class='bn_{{ $fi->id }}'>
                        <td>{{ $fi->name }}</td>                     
                        <td>
                            <img id="avatar_admin" src="{{ asset(config('setting.avatar.foodImage')) }}/{{ $fi->image }}">
                        </td>
                        <td class="option">
                            <a href="{{ route('deleteImage', $fi->id) }} . html"  value="{{ $fi->id }}" title="Delete" class="tipS delete" >
                                <img src="{{ asset(config('setting.admin_image.icon')) }}/delete.png" />
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $foodImage -> links() !!}
        @else
            <h5>{{ trans('setting.zero') }}</h5>
        @endif
    </div>
</div>
<div class="clear mt30"></div>
@endsection
