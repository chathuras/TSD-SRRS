@foreach( $resources as $resource)
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Resource</h4>
            </div>
            <div class="modal-body">
                <div class="row-fluid">
                    <form class="form-horizontal" method="post" action="#" name="basic_validate" id="iFormResource"
                          novalidate="novalidate">
                        <div class="span5">
                                <label class="control-label">Resource Name</label>
                                <div class="controls">
                                    <input type="text" id="iInputName" placeholder="Resource Name" value="{{$resource->name }}" disabled>
                                </div>
                                <label class="control-label">Resource Category</label>
                                <div class="controls">
                                    <input type="text" id="iInputLocation" placeholder="Location" value="{{$resource->category->id }}" disabled>
                                </div>
                                <label class="control-label">Location</label>
                                <div class="controls">
                                    <input type="text" id="iInputLocation" placeholder="Location" value="{{$resource->location}}" disabled>
                                </div>
                                <label class="control-label">Resource Description</label>
                                <div class="controls">
                                    <input type="text" id="iInputDescription" placeholder="Resource Description"
                                           value="{{$resource->description}}" disabled>
                                </div>
                        </div>
                        <div class="span5">
                            <div class="control-group">
                                <label class="control-label">Resource Image: </label>
                                <div class="controls">
                                    <img id="imgIcon" src="@if(!empty($resource->icon)) {{'/storage/category/' . $resource->icon }} @else {{'/img/question.png' }} @endif">
                                    <input type="file" class="cHidden" name="iconFile" id="iInputIconFile" accept="image/*">
                                    <input type="text" class="cHidden" name="icon" id="iInputIcon" value="{{$resource->icon or ''}}"
                                           required>
                                    <!-- input type="text" name="iconFileName" id="iInputIconFileName" required readonly -->
                                    <!-- button type="button" class="btn btn-success" id="iBtnUpload">Upload</button -->
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="span12">
                                <input data-id="{{$resource->id }}" type="button" value="Reserve" class="btnReserveResourceDialog btn btn-success">
                                <input type="button" value="Cancel" class="btn btn-warning btnCancelResourceDialog">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endforeach
