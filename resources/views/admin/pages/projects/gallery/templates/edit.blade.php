<form class="ajax-form" action="{{route('admin.projects.images.edit',['id' => $image->id])}}" method="post"
      enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="form-group img-block">
        <img src="{{asset('storage/app/projects/'.$image->image)}}"
             class="img-responsive btn-product-image" style="cursor: pointer;">
        <input type="file" name="image" style="display: none;">
        <div class="text-danger text-center">Please click on image to change it
        </div>
        <div class="text-danger text-center">Image size should be: 1200 * 767</div>
    </div>
    <div class="form-group">
        <label>Description [EN]: </label>
        <textarea class="form-control" name="description_en">{{$image->description_en}}</textarea>
        <div class="text-danger text-center">This input can be null </div>
    </div>
    
    <div class="form-group">
        <label>Description [AR]: </label>
        <textarea class="form-control" name="description_ar">{{$image->description_ar}}</textarea>
        <div class="text-danger text-center">This input can be null </div>
    </div>

    <div class="modal-footer text-center">
        <button class="icon-btn fa fa-edit green-bc" type="submit" title="Edit">
        </button>
        <button type="button" class="icon-btn fa fa-times" title="cancel" data-dismiss="modal">
        </button>
    </div>
</form>
