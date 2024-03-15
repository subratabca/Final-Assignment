<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Update Job Category Info</h6><br>

  <div class="form-layout">
    <form method="post" action="{{ route('update.category', ['id' => $editData->id]) }}" enctype="multipart/form-data" >
      @csrf
      <div class="row mg-b-25">

        <div class="col-lg-3">
          <div class="form-group">
            <label class="form-control-label">Category Name: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="name" value="{{ $editData->name }}">
            @error('name') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-4">
          <div class="row">
            <div class="col-lg-3">
              <div class="form-group">
                <label class="form-control-label">Old Icon Image:</label><br>
                <img src="{{ asset('upload/category/icon/medium/'.$editData->icon) }}" > 
              </div>
            </div>

            <div class="col-lg-9">
              <label class="form-control-label">Upload New Icon Image: <span class="tx-danger">*</span></label><br>
              <label class="custom-file">
                <input type="file" id="file2" class="custom-file-input" name="icon" onChange="mainImgUrl(this)" >
                <span class="custom-file-control custom-file-control-primary"></span>
              </label>
              <img src="" id="mainImg" class="mt-1">
            </div>

          </div> 
        </div>

        <div class="col-lg-5">
          <div class="row">
            <div class="col-lg-5">
              <div class="form-group">
                <label class="form-control-label">Old Banner Image:</label>
                <img src="{{ asset('upload/category/banner/medium/'.$editData->banner_image) }}" style="width: 200px; height: 80px;"> 
              </div>
            </div>

            <div class="col-lg-7">
              <label class="form-control-label">Upload New Banner Image: <span class="tx-danger">*</span></label><br>
              <label class="custom-file">
                <input type="file" id="file2" class="custom-file-input" name="banner_image" onChange="mainBannerImgUrl(this)" >
                <span class="custom-file-control custom-file-control-primary"></span>
              </label>
              <img src="" id="mainBannerImg" class="mt-1">
            </div>

          </div> 
        </div>

      </div>
      <div class="form-layout-footer">
        <button class="btn btn-info mg-r-5">Update</button>
        <a href="{{ route('categories') }}" class="btn btn-success">Back</a>
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