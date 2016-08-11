@section('title', 'Создать цвет')

@extends('layouts.admin.default')
@section('content')
    <h3>Создать цвет</h3>
    <form action="{{ '/color/store' }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <ul class="cols color">
            <li>
                <input type="text" name="color" placeholder="Добавить цвет">
            </li>
            <li class="blank"></li>
            <li>
                <input type="submit" value="Добавить цвет" class="add">
            </li>
        </ul>
    </form>

    @if($color)
        <ul class="cols admin_info_all">
            @foreach($color as $colors)
                <li>
                    <ul class="cols">
                        <li>{{ $colors->color }}</li>
                        <li class="blank"></li>
                        <li>
                            <a href="/color/{{$colors->id}}/edit"><input type="submit" value="Редактировать"></a>
                        </li>
                        <li class="blank"></li>
                        <li>
                            <form action="/color/{{ $colors->id }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" value="Удалить" class="remove">
                            </form>
                        </li>
                    </ul>
                </li>
            @endforeach
        </ul>
    @endif
@stop