@section('title', 'Категории')
@extends('layouts.admin.default')
@section('content')
    <div class="category">
        <h3>Категории</h3>
        <ul class="cols list_category">
            @foreach($menu_category as $list)
                <li><a href="/category/sort/{{ $list->category_link }}">{{ $list->category }}</a></li>
            @endforeach
        </ul>
    </div>
@stop