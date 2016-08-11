@section('title', 'Редактировать продукт' )
@extends('layouts.content.default')
@section('content')
    <div class="create_content">
        <form action="/product/{{ $product->id }}/edit" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="put"/>

            <div class="form_ui">
                Обложка:<br/>
                <input type="file" name="cover">
            </div>

            <div class="form_ui">
                Название товара:<br/>
                <input type="text" name="title" value="{{ $product->title }}">
            </div>

            <div class="form_ui">
                <ul class="cols product-create">
                    <li>
                        Компания:<br/>
                        <select name="brand" id="company">
                            @if($company)
                                @foreach($company as $brand)
                                    @if($brand->company == $product->brand)
                                        <option value="{{ $product->brand }}" selected>{{ $product->brand }}</option>
                                    @else
                                        <option value="{{ $brand->company }}">{{ $brand->company }}</option>
                                    @endif
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
                                    @if($category->category == $product->categories)
                                        <option value="{{ $product->categories }}"
                                                selected>{{ $product->categories }}</option>
                                    @else
                                        <option value="{{ $category->category }}">{{ $category->category }}</option>
                                    @endif
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
                                    @if($state->country == $product->country)
                                        <option value="{{ $product->country }}"
                                                selected>{{ $product->country }}</option>
                                    @else
                                        <option value="{{ $state->country }}">{{ $state->country }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </li>
                    <li class="blank"></li>
                    <li>
                        Сезон:<br/>
                        <select name="year" id="categories">
                            @for($year = 2010; $year <= date("Y"); $year++)
                                @if($year == $product->year)
                                    <option value="{{ $product->year }}" selected>{{ $product->year }}</option>
                                @else
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endif
                            @endfor
                        </select>
                    </li>
                </ul>
            </div>

            <div class="form_ui">
                Описание продукта:<br>
                <textarea name="description" id="editor1" cols="30" rows="10"
                          placeholder="Описание товара">{{ $product->description }}</textarea>
            </div>

            <div class="form_ui">
                Галерея фото:<br>
                <input type="file" name="photo[]" multiple placeholder="dsds">
            </div>

            <div class="form_ui">
                Размер:<br>
                @foreach($size as $the_size)
                    @if(in_array($the_size->size, explode(',', $product->size)))
                        <input type="checkbox" name="size[]" value="{{ $the_size->size }}"
                               checked> {{ $the_size->size }}
                        <br>
                    @else
                        <input type="checkbox" name="size[]" value="{{ $the_size->size }}"> {{ $the_size->size }}<br>
                    @endif
                @endforeach
            </div>

            <div class="form_ui">
                Цвет:<br>
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
                <input type="text" name="price" placeholder="Цена товара" value="{{ $product->price }}">
            </div>

            <div class="form_ui">
                <input type="submit" value="Редактировать товар" class="add">
            </div>
        </form>

        <div class="form_ui">
            <form action="/product/{{ $product->id  }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" value="Удалить" class="remove">
            </form>
        </div>
    </div>
@stop