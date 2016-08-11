@section('title', 'Редактировать страну')
@extends('layouts.admin.default')
@section('content')
    <div class="country">
        <h3>Редактировать страну</h3>
        <form action="/country/{{ $country->id }}/edit" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <ul class="cols">
                <li><input type="text" value="{{ $country->country }}" name="country"></li>
                <li class="blank"></li>
                <li><input type="text" value="{{ $country->country_link }}" name="country_link"></li>
            </ul>
            <input type="submit" value="Сохранить страну" class="add">
        </form>
    </div>
@stop