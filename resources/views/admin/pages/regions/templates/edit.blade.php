<form class="ajax-form" action="{{route('admin.regions.edit',['id' => $region->id])}}" method="post"
      enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="col-sm-6 form-group">
        <label>Name [En] : </label>
        <input class="form-control" type="text" name="name_en" value="{{$region->translate('en')->name}}">
    </div>
    <div class="col-sm-6 form-group">
        <label>Name [Ar] : </label>
        <input class="form-control" type="text" name="name_ar" value="{{$region->translate('ar')->name}}">
    </div>

    <div class="modal-footer text-center">
        <button class="icon-btn fa fa-edit green-bc" type="submit" title="Edit">
        </button>
        <button type="button" class="icon-btn fa fa-times" title="cancel" data-dismiss="modal">
        </button>
    </div>
</form>
