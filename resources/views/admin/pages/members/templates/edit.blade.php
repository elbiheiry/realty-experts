<form class="ajax-form" action="{{route('admin.members.edit',['id' => $member->id])}}" method="post"
      enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="col-sm-12">
        <div class="form-group img-block">
            <img src="{{asset('storage/app/members/'.$member->image)}}"
                 class="img-responsive btn-product-image" style="cursor: pointer;">
            <input type="file" name="image" style="display: none;">
            <div class="text-danger text-center">Please click on image to change it
            </div>
            <div class="text-danger text-center">Image size should be: 200 * 200</div>
        </div>
    </div>
    <div class="col-sm-6 form-group">
        <label>Name [En] : </label>
        <input class="form-control" type="text" name="name_en" value="{{$member->translate('en')->name}}">
    </div>
    <div class="col-sm-6 form-group">
        <label>Name [Ar] : </label>
        <input class="form-control" type="text" name="name_ar" value="{{$member->translate('ar')->position}}">
    </div>
    <div class="col-sm-6 form-group">
        <label>Position [En] : </label>
        <input class="form-control" type="text" name="position_en" value="{{$member->translate('en')->position}}">
    </div>
    <div class="col-sm-6 form-group">
        <label>Position [Ar] : </label>
        <input class="form-control" type="text" name="position_ar" value="{{$member->translate('ar')->position}}">
    </div>

    <div class="modal-footer text-center">
        <button class="icon-btn fa fa-edit green-bc" type="submit" title="Edit">
        </button>
        <button type="button" class="icon-btn fa fa-times" title="cancel" data-dismiss="modal">
        </button>
    </div>
</form>
