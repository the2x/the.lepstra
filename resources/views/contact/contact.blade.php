@section('title', 'Обратная связь')
@extends('layouts.admin.default')
@section('content')
    <div class="contact">
        <form action="{{ '/contact' }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <ul class="cols">
                <li>
                    <ul class="cols">
                        <li>
                            <label for="name">Имя</label>
                            <input type="text" name="name" value="{{ old('name') }}">
                        </li>
                        <li class="blank"></li>
                        <li>
                            <label for="email">Email</label>
                            <input type="text" name="email" value="{{ old('email') }}">
                        </li>
                    </ul>
                </li>
                <li>
                    <label for="description">Описание</label>
                    <textarea name="description" id="" cols="30" rows="10">{{ old('description') }}</textarea>
                </li>
                <li>
                    <input type="submit" value="Отправить письмо">
                </li>
            </ul>
        </form>
    </div>
@stop