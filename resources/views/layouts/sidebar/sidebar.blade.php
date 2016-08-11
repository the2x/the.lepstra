<div id="sidebar">
    <form action="/{{ 'filter' }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <ul class="cols">
            <li>
                <b>Категория</b>
                <ul class="cols">
                    @foreach($menu_category as $key => $category)
                        <li>
                            @if($key == 0)
                                <input class="radio-custom" type="radio" id="{{ $category->category }}" value="{{ $category->category }}"
                                       name="category" checked>
                            @else
                                <input class="radio-custom" type="radio" id="{{ $category->category }}" value="{{ $category->category }}"
                                       name="category">
                            @endif
                            <label class="radio-custom-label" for="{{ $category->category }}"> {{ $category->category }}</label>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="blank"></li>
            <li>
                <b>Страна</b>
                <ul class="cols">
                    @foreach($country_sidebar as $key => $country)
                        <li>
                            @if($key == 0)
                                <input type="radio" id="{{ $country->country }}" value="{{ $country->country }}"
                                       name="country" checked>
                            @else
                                <input type="radio" id="{{ $country->country }}" value="{{ $country->country }}"
                                       name="country">
                            @endif
                            <label for="{{ $country->country }}"> {{ $country->country }}</label>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="blank"></li>
            <li>
                <b>Компания</b>
                <ul class="cols">
                    @foreach($company_sidebar as $key => $company)
                        <li>
                            @if($key == 0)
                                <input type="radio" id="{{ $company->company }}" value="{{ $company->company }}"
                                       name="company" checked>
                            @else
                                <input type="radio" id="{{ $company->company }}" value="{{ $company->company }}"
                                       name="company">
                            @endif
                            <label for="{{ $company->company }}"> {{ $company->company }}</label>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li>
                <b>Размер</b>
                <ul class="cols">
                    @foreach($size_sidebar as $key => $size)
                        <li>
                            @if($key == 0)
                                <input type="radio" id="{{ $size->size }}" value="{{ $size->size }}" name="size" checked>
                            @else
                                <input type="radio" id="{{ $size->size }}" value="{{ $size->size }}" name="size">
                            @endif
                            <label for="{{ $size->size }}"> {{ $size->size }}</label>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li>
                <b>Цвет</b>
                <ul class="cols">
                    @foreach($color_sidebar as $key => $color)
                        <li>
                            @if($key == 0)
                                <input type="radio" id="{{ $color->color }}" value="{{ $color->color }}" name="color"
                                       checked>
                            @else
                                <input type="radio" id="{{ $color->color }}" value="{{ $color->color }}" name="color">
                            @endif
                            <label for="{{ $color->color }}"> {{ $color->color }}</label>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li>
                <input type="submit" value="Подобрать">
            </li>
        </ul>
    </form>
</div>