@extends('admin.layouts.master')
@section('content')
<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
            <h5>{{ trans('setting.product') }}</h5>
        </div>
        <div class="horControlB menu_action">
            <ul>
                <li>
                    <a href="{{ route('addFood') }}">
                        <img src="{{ asset(config('setting.admin_image.icon')) }}/add.png"/>
                        <span>{{ trans('setting.add') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('listFood') }}">
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
    {!! Form::open(['method' => 'POST', 'route' => ['addFood'], 'files' => 'true']) !!}
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
                    {!! Form::label('description', trans('setting.description'), ['class' => 'formLeft']) !!}
                    <div class="formRight">                      
                        <span class="oneTwo">{!! Form::text('description') !!}</span>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">                  
                    {!! Form::label('content', trans('setting.content'), ['class' => 'formLeft']) !!}
                    <div class="formRight">                      
                        <span class="oneTwo">{!! Form::textarea('content', null, ['class' => 'form-control ckeditor', 'id' => 'demo']) !!}</span>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">                  
                    {!! Form::label('price', trans('setting.price'), ['class' => 'formLeft']) !!}
                    <div class="formRight">                      
                        <span class="oneTwo">{!! Form::text('price') !!}</span>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">                  
                    {!! Form::label('top', trans('setting.top'), ['class' => 'formLeft']) !!}
                    <div class="formRight">                      
                        <span class="oneTwo">{{ trans('setting.yes') }} {!! Form::radio('top', '1') !!}</span>
                        <span class="oneTwo">{{ trans('setting.no') }} {!! Form::radio('top', '0') !!}</span>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">                  
                        {!! Form::label('new', trans('setting.new'), ['class' => 'formLeft']) !!}
                        <div class="formRight">                      
                            <span class="oneTwo">{{ trans('setting.yes') }} {!! Form::radio('new', '1') !!}</span>
                            <span class="oneTwo">{{ trans('setting.no') }} {!! Form::radio('new', '0') !!}</span>
                        </div>
                        <div class="clear"></div>
                    </div>
                <div class="formRow">
                    {!! Form::checkbox('check', null, false, ['id' => 'check']) !!}                  
                    {!! Form::label('promotion', trans('setting.sale'), ['class' => 'formLeft']) !!}
                    <div class="formRight">         
                        {!! Form::select('promotion' , $promotion->pluck('discount', 'id'), null, ['id' => 'promotion', 'disabled' => 'disabled']) !!} &nbsp; (%)           
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">                  
                    {!! Form::label('categories', trans('setting.category'), ['class' => 'formLeft']) !!}
                    <div class="formRight">                                    
                        @foreach ($category as $ca)
                            {!! Form::checkbox('categories[]', $ca->id ) !!} &nbsp {{ $ca->name }}<br>
                        @endforeach 
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
@section('script')
<script src="{{ asset('bower_components/source/backend/js/jquery/custom.js') }}"></script>
@endsection
