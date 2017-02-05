@extends('home')

@section('content')
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-content nopadding">
                    <div id="iDivResourceForm" >
                        @include('resource.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="widget-box">
        <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
            <h5>Resources</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Location</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody id="iTbodyResources"></tbody>
            </table>
        </div>
    </div>
@endsection

@section('js-extra')
    <script src="/js/resource.js"></script>
@endsection