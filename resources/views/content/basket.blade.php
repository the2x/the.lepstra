@section('title', 'Корзина товаров')
@extends('layouts.admin.default')
@section('content')
    @if(!empty(Session::get('order')))
        <table cellpadding="0" cellspacing="0" border="1">
            <tr>
                <td>Номер</td>
                <td>Название</td>
                <td>Размер</td>
                <td>Цвет</td>
                <td>Количество</td>
                <td>Цена</td>
                <td>Действие</td>
            </tr>
            <h4>Общая стоймость: {{ $cost }}</h4>
            @foreach(Session::get('order') as $remove_item => $value)
                <tr>
                    <td>{{ $value['order_id'] }}</td>
                    <td>{{ $value['order_title'] }}</td>
                    <td>{{ $value['order_size'] }}</td>
                    <td>{{ $value['order_color'] }}</td>
                    <td>{{ $value['order_count'] }}</td>
                    <td>{{ $value['order_price'] * $value['order_count'] }}</td>
                    <td>
                        <form action="{{  '/basket/'.$remove_item.'/remove' }}" method="post"
                              enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" value="Удалить" class="remove">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <br>
        <h4>Адрес доставки</h4>
        <form action="{{ '/basket/finish'  }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <ul class="cols order finish">
                <li>
                    <ul class="cols">
                        <li>
                            <label for="firstname">Имя</label>
                            <input type="text" name="firstname" value="{{ old('firstname') }}">
                        </li>
                        <li>
                            <label for="lastname">Фамилия</label>
                            <input type="text" name="lastname" value="{{ old('lastname') }}">
                        </li>
                        <li>
                            <label for="patronymic">Отчество</label>
                            <input type="text" name="patronymic" value="{{ old('patronymic') }}">
                        </li>
                        <li>
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}">
                        </li>
                    </ul>
                </li>
                <li class="blank"></li>
                <li>
                    <ul class="cols">
                        <li>
                            <label for="country">Страна</label>
                            <input type="text" name="country" value="{{ old('country') }}">
                        </li>
                        <li>
                            <label for="city">Город</label>
                            <input type="text" name="city" value="{{ old('city') }}">
                        </li>
                        <li>
                            <ul class="cols">
                                <li>
                                    <label for="house">Дом</label>
                                    <input type="text" name="house" value="{{ old('house') }}">
                                </li>
                                <li class="blank"></li>
                                <li>
                                    <label for="shell">Корпус</label>
                                    <input type="text" name="shell" value="{{ old('shell') }}">
                                </li>
                                <li class="blank"></li>
                                <li>
                                    <label for="apartment">Квартира</label>
                                    <input type="text" name="apartment" value="{{ old('apartment') }}">
                                </li>
                                <li class="blank"></li>
                                <li>
                                    <label for="zip">Индекс</label>
                                    <input type="text" name="zip" value="{{ old('zip') }}">
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="order_button">
                                <input type="submit" value="Оформить заказ" class="add">
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </form>

    @else
        <a href="{{ '/' }}">Ваша корзина пуста</a>
    @endif
@stop