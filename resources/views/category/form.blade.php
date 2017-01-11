<form class="form-horizontal" method="post" action="#" name="basic_validate" id="iFormCategory"
      novalidate="novalidate">
    <div class="span5">
        <div class="control-group">
            <label class="control-label">Resource Category</label>
            <div class="controls">
                <input type="text" id="iInputName" placeholder="Category Name" value="{{$category->name or ''}}">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Description</label>
            <div class="controls">
                <textarea name="description" id="iTextDescription"
                          placeholder="Description">{{$category->description or ''}}</textarea>
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
            <label class="control-label">Background Colour</label>
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