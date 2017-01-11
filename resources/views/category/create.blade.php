@extends('home')

@section('content')
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="#" name="basic_validate" id="iFormCategory"
                          novalidate="novalidate">
                        {{ csrf_field() }}
                        <div class="span5">
                            <div class="control-group">
                                <label class="control-label">Resource Category</label>
                                <div class="controls">
                                    <input type="text" name="required" id="iInputName">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                    <textarea name="description" id="iTextDescription"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="span5">
                            <div class="control-group">
                                <label class="control-label">Icon</label>
                                <div class="controls">
                                    <input type="text" name="icon" id="icon">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Backgroung Colour</label>
                                <div class="controls">
                                    <select>
                                        <option>First option</option>
                                        <option>Second option</option>
                                        <option>Third option</option>
                                        <option>Fourth option</option>
                                        <option>Fifth option</option>
                                        <option>Sixth option</option>
                                        <option>Seventh option</option>
                                        <option>Eighth option</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="span12">
                                <input type="submit" value="Save" class="btn btn-success">
                                <input type="reset" value="Reset" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="widget-box">
        <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
            <h5>Data table</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                </tr>
                </thead>
                <tbody id="iTbodyCategories">
                <tr class="gradeX">
                    <td>Trident</td>
                    <td>Internet
                        Explorer 4.0
                    </td>
                    <td>Win 95+</td>
                    <td class="center">4</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js-extra')
    <script src="/js/category.js"></script>
    {{--<script src="js/jquery.dataTables.min.js"></script>--}}
    {{--<script src="js/matrix.tables.js"></script>--}}
@endsection