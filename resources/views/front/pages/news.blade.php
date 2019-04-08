@extends('front.layouts.master')
@section('content')
<div class="breadcrumb_container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">     
                <nav>
                    <ul>
                        <li><a href="{{ route('home') }}">{{ trans('setting.home') }}</a> ></li>
                        <li>{{ trans('setting.news') }}</li>
                    </ul>
                </nav>
            </div>
        </div> 
    </div>        
</div>
<div class="blog_list_area">
    <div class="container">
        <div class="row">
            @foreach ($news as $ns)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="single_blog_list">
                        <div class="blog__thumb">
                            <a href="{{ route('newsDetail', $ns->id) }}"><img src="{{ asset(config('setting.avatar.news')) }}/{{ $ns->image }}" alt="">
                        </div>
                        <div class="post__content">
                            <h3><a href="{{ route('newsDetail', $ns->id) }}">{{ $ns->title }}</a></h3>
                            <ul>
                                <li><a href="{{ route('newsDetail', $ns->id) }}">Read More</a></li>
                                <li class="post_date">{{ $ns->created_at }}</li>
                            </ul>    
                        </div>
                    </div>    
                </div> 
            @endforeach                    
        </div>    
        {!! $news -> links() !!}   
    </div>   
</div>
<style>
    .pagination {
        margin-left: 400PX; 
    }
    .pagination .page-link{  
    color:#78a206;
    }   
    .page-item.active .page-link{
        background-color: #78a206;
        border: #FFFFFF;
        
    }
</style>
@endsection