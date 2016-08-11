@section('title', 'Редактировать компанию — ' .  '«' . $company->company . '»' )

@extends('layouts.admin.default')
@section('content')
    <div class="company">
        <h3>Редактировать компанию</h3>
        <form action="/company/{{ $company->id }}/edit" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <ul class="cols company">
                <li>
                    <ul class="cols">
                        <li><input type="text" value="{{ $company->company }}" name="company"></li>
                        <li class="blank"></li>
                        <li><input type="text" value="{{ $company->company_link }}" name="company_link"><br></li>
                    </ul>
                </li>
                <li>
                    <ul class="cols">
                        <li>
                            <textarea name="info" id="" cols="30" rows="10" placeholder="Информация">{{ $company->info }}</textarea><br>
                        </li>
                        <li>
                            <input type="submit" value="Сохранить категорию" class="add">
                        </li>
                    </ul>
                </li>
            </ul>
        </form>
    </div>
@stop