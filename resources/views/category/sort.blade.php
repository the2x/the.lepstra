@section('title', 'Поиск по категории' )
@extends('layouts.admin.default')
@section('content')
    <h3>{{ $category->category }}</h3>
    <span style="display:none;">{{ $i = 0 }}</span>
    <div class="sort">
        <ul class="cols">
            <li>
                @include('layouts.sidebar.sidebar')
            </li>
            <li class="blank"></li>
            <li>
                <table>
                    <tr>
                        @foreach($search_product as $count => $product)
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

                            @if($i % 3 == 0)
                                </tr><tr>
                            @endif

                        @endforeach
                    </tr>
                </table>
            </li>
        </ul>
    </div>
@stop







