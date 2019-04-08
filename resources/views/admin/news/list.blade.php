@extends ('admin.layouts.master')
@section ('content')
<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
            <h5>{{ trans('setting.news') }}</h5>
        </div>
        <div class="horControlB menu_action">
            <ul>
                <li>
                    <a href="{{ route('addNews') }}">
                        <img src="{{ asset(config('setting.admin_image.icon')) }}/add.png"/>
                        <span>{{ trans('setting.add') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('listNews') }}">
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
            <div class="num f12">{{ trans('setting.count') }}: <b id="total">{{ count($news) }}</b></div>
        </div>
        @if (count($news) > 0)
            <table cellpadding="0" cellspacing="0" width='100%' class="sTable mTable myTable taskWidget" id="checkAll">
                <thead>
                    <tr>
                        <td>{{ trans('setting.admin_news.title') }}</td>
                        <td>{{ trans('setting.admin_news.image') }}</td>
                        <td>{{ trans('setting.admin_news.description') }}</td>
                        <td>{{ trans('setting.admin_news.content') }}</td>
                        <td>{{ trans('setting.admin_news.user') }}</td>
                        <td>{{ trans('setting.comment') }}</td>
                        <td>{{ trans('setting.action') }}</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $ns)
                        <tr class='us_{{$ns->id}}'>
                        <td>{{ $ns->title }}</td>
                        <td>
                            <img id="avatar_admin" src="{{ asset(config('setting.avatar.news')) }}/{{ $ns->image }}">
                        </td>
                        <td>{{ $ns->description }}</td>
                        <td>{!! $ns->content !!}</td>
                        <td>{{ $ns->user->name }}</td>
                        <td class="option"><a href="{{ route('listCommentNews', $ns->id) }}">{{ trans('setting.comment') }} {{ count($ns->comments) }}</a></td>
                        <td class="option">
                            <a href="{{ route('editNews', $ns->id) }} . html" title="Edit" class="tipS ">
                                <img src="{{ asset(config('setting.admin_image.icon')) }}/edit.png" />
                            </a>
                            <a href="{{ route('deleteNews', $ns->id) }} . html" value="{{ $ns->id }}" title="Delete" class="tipS delete" >
                                <img src="{{ asset(config('setting.admin_image.icon')) }}/delete.png" />
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $news -> links() !!}
        @else
            <h5>{{ trans('setting.zero') }}</h5>
        @endif
    </div>
</div>
<div class="clear mt30"></div>
@endsection
