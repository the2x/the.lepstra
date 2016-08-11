@section('title', 'Создать продукт' )

@extends('layouts.content.default')
@section('content')
    <div class="create_content">
        <form action="{{ '/product/create' }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form_ui">
                Обложка:<br>
                <input type="file" name="cover">
            </div>
            <div class="form_ui">
                Название товара:<br>
                <input type="text" name="title" value="{{ old('title') }}">
            </div>
            <div class="form_ui">
                <ul class="cols product-create">
                    <li>
                        Компания:<br/>
                        <select name="brand" id="company">
                            @if($company)
                                @foreach($company as $brand)
                                    <option value="{{ $brand->company }}">{{ $brand->company }}</option>
                                @endforeach
                            @endif
                        </select>
                    </li>
                    <li class="blank"></li>
                    <li>
                        Категория:<br/>
                        <select name="categories" id="categories">
                            @if($categories)
                                @foreach($categories as $category)
                                    <option value="{{ $category->category }}">{{ $category->category }}</option>
                                @endforeach
                            @endif
                        </select>
                    </li>
                    <li class="blank"></li>
                    <li>
                        Страна:<br/>
                        <select name="country" id="country">
                            @if($country)
                                @foreach($country as $state)
                                    <option value="{{ $state->country }}">{{ $state->country }}</option>
                                @endforeach
                            @endif
                        </select>
                    </li>
                    <li class="blank"></li>
                    <li>
                        Сезон:<br/>
                        <select name="year" id="categories">
                            @for($year = 2010; $year <= date("Y"); $year++)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                    </li>
                </ul>
            </div>
            <div class="form_ui">
                Описание продукта:<br>
                <textarea name="description" id="editor1" cols="30" rows="10"
                          placeholder="Описание товара">{{ old('description') }}</textarea>
            </div>

            <div class="form_ui">
                Галерея фото:<br>
                <input type="file" name="photo[]" multiple>
            </div>

            <div class="form_ui">
                Размер:<br>
                @foreach($size as $the_size)
                    <input type="checkbox" name="size[]" value="{{ $the_size->size }}"> {{ $the_size->size }}<br>
                @endforeach
            </div>

            <div class="form_ui">
                Цвет:
                <div class="checkbox_color">
                    @if($color)

                        @foreach($color as $colors)
                            @if($colors->color == 'Черный')
                                <label>
                                    <input type='checkbox' name="color[]" value="{{ $colors->color }}">
                                    <span class="checkbox_black"></span>
                                </label>
                            @endif

                            @if($colors->color == 'Серый')
                                <label>
                                    <input type='checkbox' name="color[]" value="{{ $colors->color }}">
                                    <span class="checkbox_grey"></span>
                                </label>
                            @endif

                            @if($colors->color == 'Красный')
                                <label>
                                    <input type='checkbox' name="color[]" value="{{ $colors->color }}">
                                    <span class="checkbox_red"></span>
                                </label>
                            @endif

                            @if($colors->color == 'Зеленый')
                                <label>
                                    <input type='checkbox' name="color[]" value="{{ $colors->color }}">
                                    <span class="checkbox_green"></span>
                                </label>
                            @endif


                            @if($colors->color == 'Синий')
                                <label>
                                    <input type='checkbox' name="color[]" value="{{ $colors->color }}">
                                    <span class="checkbox_blue"></span>
                                </label>
                            @endif


                            @if($colors->color == 'Желтый')
                                <label>
                                    <input type='checkbox' name="color[]" value="{{ $colors->color }}">
                                    <span class="checkbox_yellow"></span>
                                </label>
                            @endif

                            @if($colors->color == 'Белый')
                                <label>
                                    <input type='checkbox' name="color[]" value="{{ $colors->color }}">
                                    <span class="checkbox_white"></span>
                                </label>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="form_ui">
                Стоймость:<br>
                <input type="text" name="price" value="{{ old('price') }}">
            </div>

            <div class="form_ui">
                <input type="submit" value="Добавить товар" class="add">
            </div>
        </form>
    </div>
@stop
