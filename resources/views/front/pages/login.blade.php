@extends('front.layouts.master')
@section('content')
<div class="breadcrumb_container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">     
                <nav>
                    <ul>
                        <li><a href="{{ route('home') }}">{{ trans('setting.home') }}</a> ></li>
                        <li>{{ trans('setting.login') }}</li>
                    </ul>
                </nav>
            </div>
        </div> 
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
<div class="page_login_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1">
                <div class="login_page_form">
                    {!! Form::open(['method' => 'POST', 'route' => ['login']]) !!}
                        <div class="row">
                            <div class="col-12">
                                <div class="input_text">
                                    {!! Form::label('email', trans('setting.email')) !!}
                                    {!! Form::text('email', null, ['id' => 'name']) !!}    
                                </div>
                            </div>
                             <div class="col-12">
                                <div class="input_text">
                                    {!! Form::label('password', trans('setting.password')) !!}
                                    {!! Form::password('password', null, ['id' => 'password']) !!}
                                </div>   
                            </div>
                            <div class="col-12">
                                <div class="login_submit">
                                    {!! Form::submit(trans('setting.login'), ['class' => 'inline']) !!}  
                                </div>                             
                            </div> 
                            &nbsp;
                            <div class="col-12">
                            <a href="{{ route('loginFB', ['social' => 'facebook']) }}" class="btn btn-primary">{{ trans('setting.loginFB') }}</a>  
                        </div> 
                        </div>
                    {!! Form::close() !!}    
                </div>    
            </div>    
        </div>    
    </div>  
</div>
@endsection

