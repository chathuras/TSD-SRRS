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
                                    <input type="text" id="iInputName" placeholder="Resource Name" value="{{$resource->name }}">
                                </div>
                                <label class="control-label">Resource Category</label>
                                <div class="controls">
                                    <input type="text" id="iInputLocation" placeholder="Location" value="{{$resource->category->id }}">
                                </div>
                                <label class="control-label">Location</label>
                                <div class="controls">
                                    <input type="text" id="iInputLocation" placeholder="Location" value="{{$resource->location}}">
                                </div>
                                <label class="control-label">Resource Description</label>
                                <div class="controls">
                                    <input type="text" id="iInputDescription" placeholder="Resource Description"
                                           value="{{$resource->description}}">
                                </div>
                        </div>
                        <div class="form-actions">
                            <div class="span12">
                                <input id="btnReserveResourceDialog" data-id="{{$resource->id }}" type="button" value="Reserve" class="btn btn-success">
                                <input id="btnCancelResourceDialog" type="button" value="Cancel" class="btn btn-warning">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endforeach
