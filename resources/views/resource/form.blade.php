<form class="form-horizontal" method="post" action="#" name="basic_validate" id="iFormResource"
      novalidate="novalidate">
    <div class="span5">
        <div class="control-group">
            <label class="control-label">Resource Name</label>
            <div class="controls">
                <input type="text" id="iInputName" placeholder="Resource Name" value="{{$resource->name or ''}}">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Resource Category</label>
            <div class="controls">
                <input type="text" id="iInputCategory" placeholder="Resource Category"
                       value="{{$resource->id_category or ''}}">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Location</label>
            <div class="controls">
                <input type="text" id="iInputLocation" placeholder="Location" value="{{$resource->location or ''}}">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Resource Description</label>
            <div class="controls">
                <input type="text" id="iInputDescription" placeholder="Resource Description"
                       value="{{$resource->description or ''}}">
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