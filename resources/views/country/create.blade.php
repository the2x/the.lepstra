@section('title', 'Создать страну')
@extends('layouts.admin.default')
@section('content')
    <div class="country">
        <h3>Добавить страну</h3>
        <form action="{{ '/country/store' }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <ul class="cols">
                <li>
                    <input type="text" name="country" placeholder="Добавить страну">
                </li>
                <li class="blank"></li>
                <li>
                    <input type="text" name="country_link" placeholder="Добавить страну">
                </li>
            </ul>
            <input type="submit" value="Добавить страну" class="add">
        </form>
    </div>
    @if($country)
        <ul class="cols admin_info_all">
            @foreach($country as $country_prod)
                <li>
                    <ul class="cols">
                        <li>{{ $country_prod->country }}</li>
                        <li class="blank"></li>
                        <li>{{ '/country/'.$country_prod->country_link }}</li>
                        <li class="blank"></li>
                        <li>
                            <a href="/country/{{$country_prod->id}}/edit"><input type="submit"
                                                                                 value="Редактировать"></a>
                        </li>
                        <li class="blank"></li>
                        <li>
                            <form action="/country/{{ $country_prod->id }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" value="Удалить" class="remove">
                            </form>
                        </li>
                        <li class="blank"></li>
                    </ul>
                </li>
            @endforeach
        </ul>
    @endif
@stop