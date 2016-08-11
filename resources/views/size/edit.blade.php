@section('title', 'Редактировать размер')
@extends('layouts.admin.default')
@section('content')
    <div class="size">
        <h3>Редактировать размер</h3>
        <form action="/size/{{ $size->id }}/edit" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <ul class="cols">
                <li><input type="text" value="{{ $size->size }}" name="edit_size"></li>
                <li><input type="submit" value="Сохранить размер" class="add"></li>
            </ul>
        </form>
    </div>
@stop