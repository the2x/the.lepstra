@section('title', 'Редактировать страницу о нас')
@extends('layouts.content.default')
@section('content')
    <div class="about">
        @if($about)
            <h3>Редактировать страницу о нас</h3>
            <form action="{{ '/about/edit' }}" enctype="multipart/form-data" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="put"/>

                <ul class="cols">
                    <li>
                        <label for="about"></label>
                        <textarea name="about" id="editor1" cols="30" rows="10"
                                  placeholder="Описание товара">{{ $about->about }}</textarea>
                    </li>
                    <li>
                        <input type="submit" value="Редактировать страницу">
                    </li>
                </ul>
            </form>
        @else
            <h3>Страница не существует</h3>
        @endif
    </div>
@stop