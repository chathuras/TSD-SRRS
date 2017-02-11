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
    <div class="form-actions">
        <div class="span12">
            <input type="submit" value="Save" class="btn btn-success">
            <input type="reset" value="Reset" class="btn btn-warning">
        </div>
    </div>
</form>