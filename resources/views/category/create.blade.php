@extends('home')

@section('content')
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-content nopadding">
                    <div id="iDivCategoryForm" >
                        @include('category.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="widget-box">
        <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
            <h5>Resource Categories</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    {{--<th>Platform(s)</th>--}}
                    {{--<th>Engine version</th>--}}
                </tr>
                </thead>
                <tbody id="iTbodyCategories"></tbody>
            </table>
        </div>
    </div>
@endsection

@section('js-extra')
    <script src="/js/category.js"></script>
    {{--<script src="js/jquery.dataTables.min.js"></script>--}}
    {{--<script src="js/matrix.tables.js"></script>--}}
@endsection