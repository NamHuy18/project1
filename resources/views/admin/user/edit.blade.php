@extends('admin.layouts.master')
@section('content')
<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
            <h5>{{ trans('setting.user') }}</h5>
        </div>
        <div class="horControlB menu_action">
            <ul>
                <li>
                    <a href="{{ route('addUser') }}">
                        <img src="{{ asset(config('setting.admin_image.icon')) }}/add.png"/>
                        <span>{{ trans('setting.add') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('listUser') }}">
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
<div class="line"></div>
<div class="wrapper">
    {!! Form::open(['method' => 'POST', 'route' => ['editUser', $user->id], 'files' => 'true']) !!}
        <fieldset>
            <div class="widget">
                <div class="title">
                    <img src="{{ asset(config('setting.admin_image.icon')) }}/add.png" class="titleIcon"/>
                    <h6>{{ trans('setting.add') }}</h6>
                </div>
                <div class="formRow">                  
                    {!! Form::label('param_name', trans('setting.name'), ['class' => 'formLeft']) !!}
                    <div class="formRight">                      
                        <span class="oneTwo">{!! Form::text('name', $user->name) !!}</span>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">                  
                    {!! Form::label('email', trans('setting.email'), ['class' => 'formLeft']) !!}
                    <div class="formRight">                      
                        <span class="oneTwo">{!! Form::text('email', $user->email, ['readonly' => 'readyonly']) !!}</span>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">        
                    {!! Form::checkbox('check', null, false, ['id' => 'changePassword']) !!}           
                    {!! Form::label('password', trans('setting.password'), ['class' => 'formLeft']) !!}
                    <div class="formRight">                      
                        <span class="oneTwo">{!! Form::password('password', ['id' => 'password', 'disabled' => 'disabled']) !!}</span>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">                  
                    {!! Form::label('phone_number', trans('setting.phone_number'), ['class' => 'formLeft']) !!}
                    <div class="formRight">                      
                        <span class="oneTwo">{!! Form::text('phone_number', $user->phone_number) !!}</span>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">                  
                    {!! Form::label('address', trans('setting.address'), ['class' => 'formLeft']) !!}
                    <div class="formRight">                      
                        <span class="oneTwo">{!! Form::text('address', $user->address) !!}</span>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">                  
                    {!! Form::label('level', trans('setting.level'), ['class' => 'formLeft']) !!}
                    <div class="formRight">                  
                        <span class="oneTwo">{{ trans('setting.us') }} {!! Form::radio('level', '1', $user->level == 1 ? true : false) !!}</span>                                                          
                        <span class="oneTwo">{{ trans('setting.admin') }} {!! Form::radio('level', '0', $user->level == 0 ? true : false) !!}</span>
                    </div>
                    <div class="clear"></div>
                </div>
                 <div class="formRow">                  
                    {!! Form::label('avatar', trans('setting.avatar'), ['class' => 'formLeft']) !!}
                    <div class="formRight">                      
                        {!! Form::file('avatar', ['id' => 'avatar']) !!}
                        <p><img id="avatar_admin" src="{{ asset(config('setting.avatar.user')) }}/{{ $user->avatar }}"></p>
                    </div>
                    <div class="clear"></div> 
                </div>
                <div class="formSubmit">                
                    {!! Form::submit(trans('setting.edit'), ['class' => 'redB']) !!}
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
