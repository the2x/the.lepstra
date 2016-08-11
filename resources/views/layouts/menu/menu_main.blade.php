<div id="main">
    <ul>
        <li><a href="{{ '/' }}">Главная</a></li>
        <li><a href="{{ '/category' }}">Категории</a>
            <ul>
                @foreach($menu_category as $category)
                    <li><a href="/category/sort/{{ $category->category_link }}">{{ $category->category }}</a></li>
                @endforeach
            </ul>
        </li>
        @if(Auth::user())
            <li><a href="{{ '/admin' }}">Админ</a>

                <ul>
                    @foreach($menu_product as $menu)
                        <li><a href="{{ $menu->menu_product_link }}">{{ $menu->menu_product_title }}</a></li>
                    @endforeach
                </ul>
            </li>
        @endif
        <li><a href="{{ '/about' }}">О компании</a></li>
        <li><a href="{{ '/contact' }}">Контакты</a></li>
        @if(Auth::user())
            <li><a href="{{ '/logout' }}">Выйти</a></li>
        @else
            <li><a href="{{ '/enter' }}">Войти</a></li>
        @endif
    </ul>
</div>