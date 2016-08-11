@section('title', 'Создать компанию')

@extends('layouts.admin.default')
@section('content')
    <div class="company">
        <h3>Создать компанию</h3>
        <form action="{{ '/company/store' }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <ul class="cols company">
                <li>
                    <ul class="cols">
                        <li>
                            <input type="text" name="company" placeholder="Добавить компанию">
                        </li>
                        <li class="blank"></li>
                        <li>
                            <input type="text" name="company_link" placeholder="Добавить ссылку">
                        </li>
                    </ul>
                </li>
                <li>
                    <ul class="cols">
                        <li><textarea name="info" id="" cols="30" rows="10" placeholder="Информация"></textarea></li>
                        <li><input type="submit" value="Добавить компанию" class="add"></li>
                    </ul>
                </li>
            </ul>
        </form>
    </div>
    @if($company)
        <ul class="cols admin_info_all">
            @foreach($company as $brand)
                <li>
                    <ul class="cols">
                        <li>{{ $brand->company }}</li>
                        <li class="blank"></li>
                        <li>{{ '/company/' . $brand->company_link }}</li>
                        <li class="blank"></li>
                        <li><a href="/company/{{$brand->id}}/edit"><input type="submit" value="Редактировать"></a></li>
                        <li class="blank"></li>
                        <li>
                            <form action="/company/{{ $brand->id }}" method="post" enctype="multipart/form-data">
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