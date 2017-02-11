<div id="iDivSuccess" class="alert alert-success cHidden" role="alert"><h4 class="alert-heading">Success!</h4><strong>Operation successfully completed</strong></div>
<div id="iDivError" class="alert alert-danger cHidden" role="alert"><h4 class="alert-heading">Error!</h4>Failed to complete operation</div>
<form class="form-horizontal" method="post" action="#" name="basic_validate" id="iFormResource"
      novalidate="novalidate">
    <div class="span5">
            <label class="control-label">Resource Name</label>
            <div class="controls">
                <input type="text" id="iInputName" placeholder="Resource Name" value="{{$resource->name or ''}}" required>
            </div>
            <label class="control-label">Resource Category</label>
            <div class="controls">
                @include('resource.select-categories')
                <input type="hidden" id="iInputCategoryId" value="{{$resource->category->id or null}}" required>
            </div>
            <label class="control-label">Location</label>
            <div class="controls">
                <input type="text" id="iInputLocation" placeholder="Location" value="{{$resource->location or ''}}" required>
            </div>
            <label class="control-label">Resource Description</label>
            <div class="controls">
                <input type="text" id="iInputDescription" placeholder="Resource Description"
                       value="{{$resource->description or ''}}" required>
            </div>
    </div>
    <div class="span5">
        <div class="control-group">
            <label class="control-label">Resource Image * </label>
            <div class="controls">
                <img id="imgIcon" src="@if(!empty($resource->icon)) {{'/storage/category/' . $resource->icon }} @else {{'/img/question.png' }} @endif">
                <input type="file" class="cHidden" name="iconFile" id="iInputIconFile" accept="image/*">
                <input type="text" class="cHidden" name="icon" id="iInputIcon" value="{{$resource->icon or ''}}"
                       required>
                <input type="text" name="iconFileName" id="iInputIconFileName" required readonly>
                <button type="button" class="btn btn-success" id="iBtnUpload">Upload</button>
            </div>
        </div>
    </div>
    <div class="form-actions">
        <div class="span12">
            <input type="submit" value="Save" class="btn btn-success">
            <input type="reset" value="Reset" class="btn btn-warning">
        </div>
    </div>
</form>