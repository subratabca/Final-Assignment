<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Edit About Info</h6><br>

  <div class="form-layout">
    <form method="post" action="{{ route('update.about', ['id' => $editData->id]) }}" enctype="multipart/form-data" >
      @csrf
      <div class="row mg-b-25">

        <div class="col-lg-8">
          <div class="form-group">
            <label class="form-control-label">Title: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="title">
            @error('title') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">History: <span class="tx-danger">*</span></label>
            <textarea class="form-control" id="summernote"  name="history"> 
              {{ $editData->history }}
            </textarea>
            @error('history') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Vision: <span class="tx-danger">*</span></label>
            <textarea class="form-control" id="summernote1"  name="vision"> 
              {{ $editData->vision }}
            </textarea>
            @error('vision') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-5">
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Old Image:</label>
                <img src="{{ asset($editData->image) }}" style="width: 150px; height: 100px;"> 
              </div>
            </div>

            <div class="col-lg-8">
              <label class="form-control-label">Upload New Image: <span class="tx-danger">*</span></label><br>
              <label class="custom-file">
                <input type="file" id="file" class="custom-file-input" name="image" onChange="mainImgUrl(this)" >
                <span class="custom-file-control"></span>
                <input type="hidden" name="old_image" value="{{ $editData->image }}">
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
                <img src="{{ asset($editData->banner_image) }}" style="width: 200px; height: 80px;"> 
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
        <a href="{{ route('about') }}" class="btn btn-success">Back</a>
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