@section('title', 'Обратная связь')
@extends('layouts.admin.default')
@section('content')
    <div class="about">
        @if(Auth::check())
            <a href="{{ '/about/edit'  }}">Редактировать страницу</a>
        @endif
        @if($about)
            {!!  Markdown::convertToHtml( $about->about ) !!}
        @endif
    </div>
@stop