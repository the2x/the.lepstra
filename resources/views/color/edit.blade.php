@section('title', 'Редактировать цвет' )

@extends('layouts.admin.default')
@section('content')
    <div class="color">
        <h3>Редактировать цвет</h3>
        <form action="/color/{{ $color->id }}/edit" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="put"/>

            <ul class="cols color">
                <li>
                    <input type="text" value="{{ $color->color }}" name="color">
                </li>
                <li>
                    <input type="submit" value="Сохранить цвет" class="add">
                </li>
            </ul>
        </form>
    </div>
@stop