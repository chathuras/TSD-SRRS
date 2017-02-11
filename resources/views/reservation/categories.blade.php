@extends('home')

@section('content')
    <div class="container-fluid">
        <div class="span12">
            <div class="quick-actions_homepage">
                <ul class="quick-actions">
                    @foreach( $categories as $category)
                    <li class="bg_lb span3" style="background-color: {{ $category->color }};">
                        <div class="metro-nav-block nav-block-blue">
                            <a data-original-title="" href="/reservation/category/{{ $category->id }}">
                                <image src="/storage/category/{{ $category->icon }}">
                                {{--<i class="icon-eye-open"></i>--}}
                                <div class="info">+{{$category->resources->count()}}</div>
                                <div class="status">{{ $category->name }}</div>
                            </a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('js-extra')
    <script src="/js/reservation.js"></script>
@endsection