<div id="iDivSuccess" class="alert alert-success cHidden" role="alert">Successfully saved</div>
<div id="iDivError" class="alert alert-danger cHidden" role="alert">Error</div>
<form class="form-horizontal" method="post" action="#" name="basic_validate" id="iFormCategory"
      novalidate="novalidate">
    <div class="span5">
        <div class="control-group">
            <label class="control-label">Resource Category</label>
            <div class="controls">
                <input name="name" type="text" id="iInputName" placeholder="Category Name"
                       value="{{$category->name or ''}}"
                       required>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Description</label>
            <div class="controls">
                <textarea name="description" id="iTextDescription"
                          placeholder="Description" required>{{$category->description or ''}}</textarea>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Background Colour</label>
            <div class="controls">
                <input name="color" type="text" id="iInputColor" placeholder="Background Colour"
                       value="{{$category->color or ''}}"
                       required>
            </div>
        </div>
    </div>
    <div class="span5">
        <div class="control-group">
            <label class="control-label">Icon</label>
            <div class="controls">
                <img id="imgIcon" src="/storage/category/{{$category->icon or ''}}">
                <input type="file" class="cHidden" name="iconFile" id="iInputIconFile" accept="image/*">
                <input type="text" class="cHidden" name="icon" id="iInputIcon" value="{{$category->icon or ''}}"
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