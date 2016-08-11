@section('title', 'Войти в систему' )
@extends('layouts.admin.default')
@section('content')
    <div class="login">
        <h3>Войти в систему</h3>
        <form action="{{ '/enter' }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <ul class="cols">
                <li>
                    <ul class="cols">
                        <li><input type="email" name="email"></li>
                        <li class="blank"></li>
                        <li><input type="password" name="password"></li>
                    </ul>
                <li>
                    <input type="submit" value="Войти">
                </li>
            </ul>
        </form>
    </div>
@stop