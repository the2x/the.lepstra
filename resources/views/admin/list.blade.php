@section('title', 'Администрирование')
@extends('layouts.admin.default')
@section('content')
    <div class="category">
        <h3>Администрирование</h3>
        <ul class="cols list_category">
            @foreach($menu_product as $list)
                <li><a href="{{ $list->menu_product_link }}">{{ $list->menu_product_title }}</a></li>
            @endforeach
        </ul>
    </div>
@stop