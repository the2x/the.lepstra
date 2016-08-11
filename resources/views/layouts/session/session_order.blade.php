@if(Session::has('order') && !empty(Session::get('order')))
    <div class="order">
        <ul class="cols">
            <li>Товаров в корзине: <a href="/basket">{{ count(Session::get('order')) }}</a></li>
            <li>
                <form action="{{ '/product/flush' }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" value="Очистить корзину">
                </form>
            </li>
        </ul>
    </div>
@endif