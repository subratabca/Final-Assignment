<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Update Blog Category Info</h6><br>

  <div class="form-layout">
    <form method="post" action="{{ route('update.blog', $editData->id) }}" enctype="multipart/form-data" >
      @csrf
      <div class="row mg-b-25">

        <div class="col-lg-9">
          <div class="form-group">
            <label class="form-control-label">Title: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="title" value="{{ $editData->title }}">
            @error('title') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <div class="form-group mg-b-10-force">
            <label class="form-control-label">Select Category: <span class="tx-danger">*</span></label>
            <select class="form-control select2" name="blog_category_id">
              <option value="" selected="" disabled="" >Choose one</option>
              @foreach($categories as $category)
              <option value="{{ $category->id }}" {{ $category->id == $editData->blog_category_id ? 'selected' : '' }} >
              {{ $category->name }}</option>
              @endforeach
            </select>
            @error('blog_category_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Description: <span class="tx-danger">*</span></label>
            <textarea class="form-control" id="summernote"  name="description">{{ old('description', $editData->description) }}</textarea>
            @error('description') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-5">
          <div class="row">
            <div class="col-lg-5">
              <div class="form-group">
                <label class="form-control-label">Old Banner Image:</label>
                <img src="{{ !empty($editData->banner_image) ? asset('upload/blog/banner/small/'.$editData->banner_image) : url('upload/no_image.jpg') }}"  style="width: 200px; height: 80px;"> 
              </div>
            </div>

            <div class="col-lg-7">
              <label class="form-control-label">Upload New Banner Image: <span class="tx-danger">*</span></label><br>
              <label class="custom-file">
                <input type="file" id="file2" class="custom-file-input" name="banner_image" onChange="mainBannerImgUrl(this)" >
                <span class="custom-file-control custom-file-control-primary"></span>
                <input type="hidden" name="old_banner_image" value="{{ $editData->banner_image }}">
              </label>
              <img src="" id="mainBannerImg" class="mt-1">
            </div>

          </div> 
        </div>

      </div>
      <div class="form-layout-footer">
        <button class="btn btn-info mg-r-5">Update</button>
        <a href="{{ route('blogs') }}" class="btn btn-success">Back</a>
      </div>
    </form>
  </div>
</div>


<script type="text/javascript">
  function mainImgUrl(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e){
        $('#mainImg').attr('src',e.target.result).width(150).height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  } 
</script>

<script type="text/javascript">
  function mainBannerImgUrl(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e){
        $('#mainBannerImg').attr('src',e.target.result).width(150).height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  } 
</script>