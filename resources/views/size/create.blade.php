@section('title', 'Создать размер')
@extends('layouts.admin.default')
@section('content')
    <div class="size">
        <h3>Создать размер</h3>
        <form action="{{ '/size/store' }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <ul class="cols">
                <li><input type="text" name="size" placeholder="Добавить размер"></li>
                <li><input type="submit" value="Добавить размер" class="add"></li>
            </ul>
        </form>
    </div>
    @if($size)
        <ul class="cols admin_info_all">
            @foreach($size as $size_prod)
                <li>
                    <ul class="cols">
                        <li>
                            {{ $size_prod->size }}
                        </li>
                        <li class="blank"></li>
                        <li>
                            <a href="/size/{{$size_prod->id}}/edit"><input type="submit" value="Редактировать"></a>
                        </li>
                        <li class="blank"></li>
                        <li>
                            <form action="/size/{{ $size_prod->id }}" method="post" enctype="multipart/form-data">
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