@extends('front.layouts.master')
@section('content')
<div class="breadcrumb_container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">     
                <nav>
                    <ul>
                        <li><a href="{{ route('home') }}">{{ trans('setting.home') }}</a> ></li>
                        <li>{{ trans('setting.post') }}</li>
                    </ul>
                </nav>
            </div>
        </div> 
    </div>        
</div>
<div class="blog_details_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-8">
                <div class="blog_details_left">
                    <div class="blog_left_sidebar mb-50">
                        <div class="blog_sidebar_img">
                            <img src="{{ asset(config('setting.avatar.user')) }}/{{ $news->user->avatar }}" alt="">
                        </div>
                        <div class="blog_sidebar_img_content">
                            <p>{{ $news->description }}</p>
                            <h4>{{ $news->user->name }}</h4> 
                            <div class="blog_sidebar_social">
                                <ul>
                                    <li><a href="#"><i class="icofont icofont-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="icofont icofont-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="icofont icofont-social-pinterest"></i></a></li>
                                    <li><a href="#"><i class="icofont icofont-social-flikr"></i></a></li>
                                </ul>    
                            </div>  
                        </div>    
                    </div>
                    <div class="blog_left_sidebar mb-50">
                        <h3>{{ trans('setting.admin_news.same') }}</h3>
                        @foreach ($user as $un)
                        <div class="recent_post mb-30">
                            <div class="recent_post_title">
                                <a href="#"><img src="{{ asset(config('setting.avatar.news')) }}/{{ $un->image }}" alt="">   
                            </div>
                            <div class="recent_post_content">
                                <h4><a href="#">{{ $un->title }}</a></h4>
                                <span class="post_date">{{ $un->created_at }}</span>   
                            </div>   
                        </div>
                        @endforeach
                    </div>   
                </div>    
            </div>
            <div class="col-lg-9 col-md-12">
                <div class="blog_details_info">
                    <div class="blog_meta">
                        <ul>
                            <li>{{ trans('setting.news') }}</li>
                            <li>{{ $news->created_at }}</li>
                        </ul>   
                    </div>
                    <h3>{{ $news->title }}</h3> 
                    <div class="blog_details_img">
                        <img src="{{ asset(config('setting.avatar.news')) }}/{{ $news->image }}" alt="">
                    </div>   
                    <div class="post_excerpt">
                        <p>{!! $news->content !!}</p>
                    </div>             
                    @if (Auth::check()) 
                    <div class="blog_leave_area">
                        <h3>{{ trans('setting.foodpage.write') }}</h3>
                        {!! Form::open(['method' => 'POST', 'route' => ['commentNews', $news->id]]) !!}
                            <div class="row">
                                <div class="col-12">
                                    <div class="label_textarea">
                                        {!! Form::label('comment', trans('setting.foodpage.write')) !!}
                                        {!! Form::textarea('content', null, ['placeholder' => trans('setting.comment')]) !!}   
                                    </div>
                                </div>                                   
                                <div class="clear"></div> &nbsp;                                      
                                <div class="col-12">
                                    <div class="blog_leave_btn">
                                        <button type="submit">{{ trans('setting.comment') }}</button>
                                    </div>    
                                </div>    
                            </div>
                        {!! Form::close() !!}   
                    </div>
                    @else
                        <div class="review">
                            <p><a href="{{ route('login') }}">{{ trans('setting.foodpage.write') }}</a></p>   
                        </div> 
                    @endif  
                    <div class="blog_replay_wrapper">
                        <h4>{{ count($news->comments) }} Bình Luận</h4>
                        @foreach ($news->comments as $cm)
                        <div class="single_blog_replay mb-50">
                            <div class="replay_img">
                                <a href="#"><img src="{{ asset(config('setting.avatar.user')) }}/{{ $cm->user->avatar }}" alt="">   
                            </div>
                            <div class="replay-info-wrapper">
                                <div class="replay-info">
                                    <div class="replay-name-date">
                                        <h4><a>{{ $cm->user->name }}</a></h4>
                                        <span>{{ $cm->created_at }}</span>    
                                    </div>    
                                </div>
                                <p>{{ $cm->content }}</p>    
                            </div>    
                        </div> 
                        @endforeach      
                    </div> 
                </div>                 
            </div>    
        </div>    
    </div>    
</div>
@endsection
