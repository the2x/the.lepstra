@section('title', 'Редактировать категорию — ' .  '«' . $cat->category . '»' )
@extends('layouts.admin.default')
@section('content')
    <div class="category">
        <h3>Редактировать категорию</h3>
        <form action="/category/{{ $cat->id }}/edit" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <ul class="cols">
                <li>
                    <input type="text" value="{{ $cat->category }}" name="category">
                </li>
                <li class="blank"></li>
                <li>
                    <input type="text" value="{{ $cat->category_link }}" name="category_link">
                </li>
            </ul>
            <input type="submit" value="Сохранить категорию" class="add">
        </form>
    </div>
@stop