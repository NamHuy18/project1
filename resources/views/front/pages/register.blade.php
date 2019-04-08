@extends('front.layouts.master')
@section('content')
<div class="breadcrumb_container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">     
                <nav>
                    <ul>
                        <li><a href="{{ route('home') }}">{{ trans('setting.home') }}</a> ></li>
                        <li>{{ trans('setting.register') }}</li>
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
            <div class="col-lg-8 offset-lg-2">
                <div class="register_page_form">
                    {!! Form::open(['method' => 'POST', 'route' => ['signup'], 'files' => 'true']) !!}
                        <div class="row">                           
                            <div class="col-12">
                                <div class="input_text">
                                    {!! Form::label('name', trans('setting.registerpage.name'), ['for' => 'R_N3']) !!}
                                    {!! Form::text('name', null, ['id' => 'R_N3']) !!} 
                                </div> 
                            </div> 
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <div class="input_text">
                                    {!! Form::label('email', trans('setting.registerpage.email'), ['for' => 'R_N4']) !!}
                                    {!! Form::text('email', null, ['id' => 'R_N4']) !!} 
                                </div>   
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <div class="input_text">
                                    {!! Form::label('phone_number', trans('setting.registerpage.phone'), ['for' => 'R_N5']) !!}
                                    {!! Form::text('phone_number', null, ['id' => 'R_N5']) !!} 
                                </div>  
                            </div>
                            <div class="col-12">
                                <div class="input_text">
                                    {!! Form::label('address', trans('setting.registerpage.address'), ['for' => 'R_N7']) !!}
                                    {!! Form::text('address', null, ['id' => 'R_N7']) !!}   
                                </div>
                            </div> 
                            <div class="col-12">
                                <div class="input_text">
                                    {!! Form::label('password', trans('setting.registerpage.password'), ['for' => 'R_N11']) !!}
                                    {!! Form::password('password', null, ['id' => 'R_N11']) !!}  
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input_text">
                                    {!! Form::label('passwordAgain', trans('setting.registerpage.comfirm'), ['for' => 'R_N12']) !!}
                                    {!! Form::password('passwordAgain', null, ['id' => 'R_N11']) !!}  
                                </div>
                            </div>
                            <div class="col-12">                  
                                {!! Form::label('avatar', trans('setting.avatar'), ['class' => 'formLeft']) !!}
                                <div class="formRight">                      
                                    {!! Form::file('avatar', ['id' => 'avatar']) !!}
                                </div>
                                <div class="clear"></div> 
                            </div>
                            <div class="col-12">
                                <div class="login_submit">
                                    {!! Form::submit(trans('setting.register'), ['class' => 'inline']) !!}
                                </div>
                            </div>    
                        </div>
                    {!! Form::close() !!}
                </div>    
            </div>    
        </div>    
    </div>  
</div>
@endsection

