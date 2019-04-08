@extends('front.layouts.master')
@section('content')
<div class="breadcrumb_container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">     
                <nav>
                    <ul>
                        <li><a href="{{ route('home') }}">{{ trans('setting.home') }}</a> ></li>
                        <li>{{ $user->name }}</li>
                    </ul>
                </nav>
            </div>
        </div> 
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
<section class="main-content-area my-account ptb-100">
    <div class="container">
        <div class="account-dashboard">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <ul role="tablist" class="nav flex-column dashboard-list">
                        <li><a href="#account-details" data-toggle="tab" class="nav-link active">{{ trans('setting.userpage.detail') }}</a></li>
                        <li> <a href="#orders" data-toggle="tab" class="nav-link">{{ trans('setting.userpage.history') }}</a></li>
                        <li> <a href="#post" data-toggle="tab" class="nav-link">{{ trans('setting.userpage.post') }}</a></li>
                        <li> <a href="#history" data-toggle="tab" class="nav-link">{{ trans('setting.userpage.oldPost') }}</a></li>
                        <li><a href="{{ route('logout') }}" class="nav-link">{{ trans('setting.userpage.logout') }}</a></li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <div class="tab-content dashboard-content">
                        <div class="tab-pane fade show active" id="account-details">
                            <h3>{{ trans('setting.userpage.detail') }}</h3>
                            <div class="login">
                                <div class="login-form-container">
                                    <div class="account-login-form">
                                        {!! Form::open(['method' => 'POST', 'route'=>['user'], 'files' => 'true']) !!}
                                            {{ Form::label('name', trans('setting.userpage.name')) }}
                                            {{ Form::text('name', $user->name) }}
                                            {{ Form::label('email', trans('setting.userpage.email')) }}
                                            {{ Form::text('email', $user->email, ['disabled' => 'disabled']) }}
                                            {{ Form::label('phone_number', trans('setting.userpage.phone_number')) }}
                                            {{ Form::text('phone_number', $user->phone_number) }}
                                            {{ Form::label('address', trans('setting.userpage.address')) }}
                                            {{ Form::text('address', $user->address) }}
                                            {{ Form::label('password', trans('setting.userpage.password')) }}
                                            {{ Form::password('password') }}                     
                                            {!! Form::label('avatar', trans('setting.avatar')) !!}                     
                                            {!! Form::file('avatar', ['id' => 'avatar']) !!}
                                            <p><img height="200px" id="avatar_admin" src="{{ asset(config('setting.avatar.user')) }}/{{ $user->avatar }}"></p>
                                            <div><a>{{ Form::submit(trans('setting.userpage.save'), ['class' => 'btn btn-success', 'style' => 'width:100px']) }}</a></div>                                                                                     
                                        {!! Form::close() !!}
                                    </div>  
                                </div>
                            </div>
                        </div> 
                        <div class="tab-pane fade" id="orders">
                            <h3>{{ trans('setting.userpage.history') }}</h3>                           
                            <div class="organic-table-area table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>{{ trans('setting.orderpage.date') }}</th>
                                            <th>{{ trans('setting.orderpage.status') }}</th>
                                            <th>{{ trans('setting.orderpage.total') }}</th>
                                            <th>{{ trans('setting.orderpage.detail') }}</th>	 	 	 	
                                        </tr>
                                    </thead>
                                    @foreach ($user->orders as $order)
                                        <tbody>
                                            <tr>
                                                <td>{{ $order->date_order }}</td>
                                                <td><span class="success">
                                                    @if ($order->status == 0)
                                                        {{ trans('setting.orderpage.no') }}                           
                                                    @else
                                                        {{ trans('setting.orderpage.yes') }}
                                                    @endif
                                                </td>
                                                <td>{{ number_format($order->total) }} VND</td>
                                                <td><a href="{{ route('oldCart', $order->id) }}" class="view">{{ trans('setting.userpage.view') }}</a></td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>     
                        <div class="tab-pane fade" id="post">
                            <h3>{{ trans('setting.userpage.post') }}</h3>
                            <div class="login">
                                <div class="login-form-container">
                                    <div class="account-login-form">
                                        {!! Form::open(['method' => 'POST', 'route'=>['postNews'], 'files' => 'true']) !!}
                                            {{ Form::label('name', trans('setting.admin_news.title')) }}
                                            {{ Form::text('title') }}
                                            {{ Form::label('description', trans('setting.admin_news.description')) }}
                                            {{ Form::text('description') }}  
                                            {{ Form::label('content', trans('setting.admin_news.content')) }}
                                            {!! Form::textarea('content', null, ['class' => 'form-control ckeditor', 'id' => 'demo']) !!} 
                                            &nbsp;        
                                            {!! Form::label('image', trans('setting.image')) !!}                     
                                            {!! Form::file('image', ['id' => 'image']) !!}  
                                            &nbsp;         
                                            <div><a>{{ Form::submit(trans('setting.userpage.up'), ['class' => 'btn btn-success', 'style' => 'width:100px']) }}</a></div>                                                                                     
                                        {!! Form::close() !!}
                                    </div>  
                                </div>
                            </div>
                        </div>  
                        <div class="tab-pane fade" id="history">
                            <h3>{{ trans('setting.userpage.oldPost') }}</h3>
                            <div class="organic-table-area table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>{{ trans('setting.admin_news.title') }}</th>
                                            <th>{{ trans('setting.admin_news.description') }}</th>
                                            <th>{{ trans('setting.comment') }}</th>
                                            <th>{{ trans('setting.userpage.newsDetail') }}</th>	 	 	 	
                                        </tr>
                                    </thead>
                                    @foreach ($user->news as $post)
                                        <tbody>
                                            <tr>
                                                <td>{{ $post->title }}</td>
                                                <td>{{ $post->description }}</td>
                                                <td>{{ count($post->comments) }} Bình Luận</td>
                                                <td><a href="{{ route('newsDetail', $post->id) }}" class="view">{{ trans('setting.userpage.view') }}</a></td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>                   
                    </div>
                </div>
            </div>
        </div>
    </div>       	
</section>
@endsection
@section('script')
<script src="{{ asset('bower_components/source/backend/js/jquery/custom.js') }}"></script>
@endsection

