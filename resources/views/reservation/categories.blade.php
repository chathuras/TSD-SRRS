@extends('home')

@section('content')
    <div class="container-fluid">
        <div class="span12">
            <div class="quick-actions_homepage">
                <ul class="quick-actions">
                    @foreach( $categories as $category)
                            {{--<td>{{ $category->name }}</td>--}}
                            {{--<td>{{ $category->description }}</td>--}}
                    <li class="bg_lb span3">
                        <div class="metro-nav-block nav-block-blue">
                            <a data-original-title="" href="/reservation/category/{{ $category->id }}">
                                <i class="icon-eye-open"></i>
                                <div class="info">+897</div>
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
    {{--<script src="js/jquery.dataTables.min.js"></script>--}}
    {{--<script src="js/matrix.tables.js"></script>--}}
@endsection