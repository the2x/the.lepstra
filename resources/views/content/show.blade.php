@section('title', $product->title)
@extends('layouts.content.default')
@section('content')
    @if(Auth::user())
        <a href="/product/{{ $product->id }}/edit" class="edit">Редактировать</a>
    @endif
    <div class="item">
        <ul class="cols">
            <li>
                <ul id="out-of-the-box-demo">
                    @foreach(explode(',', $product->photo) as $photo)
                        <li><img src="/_content/_product/{{ $photo }}" alt=""></li>
                    @endforeach
                </ul>
            </li>
            <li class="blank"></li>
            <li>
                <h3>{{ $product->title }}</h3>
                <span>Коллекция: {{ $product->year }}</span><br>
                <span>Бренд: <a
                            href="/company/sort/{{ $company_link_item->company_link }}">{{ $company_link_item->brand }}</a></span><br>
                <span>Страна: <a
                            href="/country/sort/{{ $country_link_item->country_link }}">{{ $country_link_item->country }}</a></span><br>
                <span>Категория: <a
                            href="/category/sort/{{ $category_link_item->category_link }}">{{ $category_link_item->categories }}</a></span><br>
                <span>Цвета в наличии:</span>
                <form action="/product/{{ $product->id }}/order" method="post" name="name"
                      enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div id="user_color">
                        @foreach(explode(',', $product->color) as $color)
                            @if($color == 'Черный')
                                <label>
                                    <input type='radio' name="color" value="{{ $color }}" checked>
                                    <span class="checkbox_black"></span>
                                </label>
                            @endif

                            @if($color == 'Серый')
                                <label>
                                    <input type='radio' name="color" value="{{ $color }}" checked>
                                    <span class="checkbox_grey"></span>
                                </label>
                            @endif

                            @if($color == 'Красный')
                                <label>
                                    <input type='radio' name="color" value="{{ $color }}" checked>
                                    <span class="checkbox_red"></span>
                                </label>
                            @endif

                            @if($color == 'Зеленый')
                                <label>
                                    <input type='radio' name="color" value="{{ $color }}" checked>
                                    <span class="checkbox_green"></span>
                                </label>
                            @endif


                            @if($color == 'Синий')
                                <label>
                                    <input type='radio' name="color" value="{{ $color }}" checked>
                                    <span class="checkbox_blue"></span>
                                </label>
                            @endif


                            @if($color == 'Желтый')
                                <label>
                                    <input type='radio' name="color" value="{{ $color }}" checked>
                                    <span class="checkbox_yellow"></span>
                                </label>
                            @endif

                            @if($color == 'Белый')
                                <label>
                                    <input type='radio' name="color" value="{{ $color }}" checked>
                                    <span class="checkbox_white"></span>
                                </label>
                            @endif
                        @endforeach
                    </div>
                    <span>Размеры в наличии:</span><br>
                    <div id="user_size">
                        @foreach(explode(',', $product->size) as $size)
                            <input id="{{ $size }}" type="radio" name="size" value="{{ $size }}" checked>
                            <label for="{{ $size }}"> {{ $size }}</label>
                        @endforeach
                    </div>
                    <ul class="cols user_price">
                        <li>
                            <b class="price">{{ $product->price }} BYN</b>
                        </li>
                        <li class="blank"></li>
                        <li>
                            <select name="user_order_count" id="user_order_count">
                                @for($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </li>
                    </ul>
                    <div class="old_price_belarus">
                        <b class="price_old">{{ $product->price }} = {{ $product->price * 100000 }} BYR</b>
                    </div>

                    <i class="product_info">{!!  Markdown::convertToHtml($product->description) !!}</i>

                    <input type="submit" value="Добавить в корзину" class="add">
                </form>
            </li>
        </ul>
        <br>
        <div class="about_company">
            <b>О бренде:</b> {!!  Markdown::convertToHtml($brand->info) !!}
        </div>
        <br>
    </div>
    <h4>Возможно вам понравится</h4>
    <div class="sort similar">
        <table>
            <tr>
                @foreach($similar_product as $count => $product)
                    <span style="display:none;">{{ ++$i }}</span>
                    <td>
                        <ul class="cols">
                            <li>
                                <a href="/product/{{$product->id}}"><img
                                            src="/{{ $product->cover }}" alt=""></a>
                            </li>
                            <li>
                                <a class="tag"
                                   href="/company/sort/{{ $company_link[$count]->company_link }}">{{ $company_link[$count]->company }}</a>
                                <a class="tag"
                                   href="/category/sort/{{ $category_link[$count]->category_link }}">{{ $category_link[$count]->category }}</a>
                                <a class="tag"
                                   href="/country/sort/{{ $country_link[$count]->country_link }}">{{ $country_link[$count]->country }}</a>
                            </li>
                            <li>
                                <a href="/product/{{$product->id}}">{{ str_limit($product->title, 35, '...')}}</a>
                            </li>
                            <li>
                                <span><b>{{ $product->price }} BYN</b></span>
                            </li>
                        </ul>
                    </td>
                @endforeach
            </tr>
        </table>
    </div>
@stop