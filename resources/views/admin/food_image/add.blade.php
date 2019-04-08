@extends('admin.layouts.master')
@section('content')
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
                <li>
                    <a href="{{ route('listImage', $food->id) }}">
                        <img src="{{ asset(config('setting.admin_image.icon')) }}/list.png"/>
                        <span>{{ trans('setting.list') }}</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>
@if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $err)
            {{ $err }}<br>
        @endforeach
    </div>
@endif
@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
@if(session('warning'))
    <div class="alert alert-success">
        {{ session('warning') }}
    </div>
@endif
<div class="line"></div>
<div class="wrapper">
    {!! Form::open(['method' => 'POST', 'route' => ['addImage', $food->id], 'files' => 'true']) !!}
        <fieldset>
            <div class="widget">
                <div class="title">
                    <img src="{{ asset(config('setting.admin_image.icon')) }}/add.png" class="titleIcon"/>
                    <h6>{{ trans('setting.add') }}</h6>
                </div>
                <div class="formRow">                  
                    {!! Form::label('param_name', trans('setting.name'), ['class' => 'formLeft']) !!}
                    <div class="formRight">                      
                        <span class="oneTwo">{!! Form::text('name') !!}</span>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">                  
                    {!! Form::label('image', trans('setting.image'), ['class' => 'formLeft']) !!}
                    <div class="formRight">                      
                        {!! Form::file('image', ['id' => 'image']) !!}
                    </div>
                    <div class="clear"></div> 
                </div>
                <div class="formSubmit">                
                    {!! Form::submit(trans('setting.add'), ['class' => 'redB']) !!}
                    {!! Form::reset(trans('setting.reset'), ['class' => 'basic']) !!}                 
                </div>
                <div class="clear"></div>
            </div>
        </fieldset>
    {!! Form::close() !!}
</div>
<div class="clear mt30"></div>
@endsection
