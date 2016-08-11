@section('title', 'Создать категорию')

@extends('layouts.admin.default')
@section('content')
    <div class="category">
        <h3>Добавить категорию</h3>
        <form action="{{ '/category/store' }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <ul class="cols">
                <li>
                    <input type="text" name="category" placeholder="Добавить категорию">
                </li>
                <li class="blank"></li>
                <li>
                    <input type="text" name="category_link" placeholder="Добавить ссылку">
                </li>
            </ul>
            <input type="submit" value="Добавить категорию" class="add">
        </form>
    </div>

    @if($cat)
        <ul class="cols admin_info_all">
            @foreach($cat as $category)
                <li>
                    <ul class="cols">
                        <li>
                            {{ $category->category }}<br>
                        </li>
                        <li class="blank"></li>
                        <li>
                            /category/{{ $category->category_link }}<br>
                        </li>
                        <li class="blank"></li>
                        <li>
                            <a href="/category/{{$category->id}}/edit"><input type="submit"
                                                                              value="Редактировать"></a>
                        </li>
                        <li class="blank"></li>
                        <li>
                            <form action="/category/{{ $category->id }}" method="post"
                                  enctype="multipart/form-data">
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
        </div>
@stop
