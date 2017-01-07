@extends('home')

@section('content')
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="#" name="basic_validate" id="basic_validate" novalidate="novalidate">
                        <div class="span5">
                            <div class="control-group">
                                <label class="control-label">Resource Category</label>
                                <div class="controls">
                                    <input type="text" name="required" id="required">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                    <textarea name="description"></textarea>
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
                                    <select >
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
@endsection