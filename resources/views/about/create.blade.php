@section('title', 'Создать страницу о нас')
@extends('layouts.content.default')
@section('content')
    <div class="about">
        <h3>Создать страницу о нас</h3>
        <form action="{{ '/about/create' }}" enctype="multipart/form-data" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <ul class="cols">
                <li>
                    <label for="about"></label>
                    <textarea name="about" id="editor1" cols="30" rows="10"
                              placeholder="Описание товара">{{ old('about') }}</textarea>
                </li>
                <li>
                    <input type="submit" value="Создать страницу">
                </li>
            </ul>
        </form>
    </div>
@stop