<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Create About Info</h6><br>

  <div class="form-layout">
    <form method="post" action="{{ route('store.about') }}" enctype="multipart/form-data" >
      @csrf
      <div class="row mg-b-25">

        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Title: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Enter title">
            @error('title') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">History: <span class="tx-danger">*</span></label>
            <textarea class="form-control" id="summernote"  name="history" value="{{ old('history') }}"> </textarea>
            @error('history') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Vision: <span class="tx-danger">*</span></label>
            <textarea class="form-control" id="summernote1"  name="vision" value="{{ old('vision') }}"> </textarea>
            @error('vision') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-4">
          <label class="form-control-label">Upload Image: <span class="tx-danger">*</span></label><br>
          <label class="custom-file">
            <input type="file" id="file" class="custom-file-input" name="image" onChange="mainImgUrl(this)" >
            <span class="custom-file-control"></span>
          </label>
          <div>
            @error('image') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <img src="" id="mainImg" class="mt-1">
        </div>

        <div class="col-lg-4">
          <label class="form-control-label">Upload Banner Photo: <span class="tx-danger">*</span></label><br>
          <label class="custom-file">
            <input type="file" id="file2" class="custom-file-input" name="banner_image" onChange="mainCoverPhotoUrl(this)" >
            <span class="custom-file-control custom-file-control-primary"></span>
          </label>
          <div>
            @error('banner_image') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <img src="" id="mainCoverPhoto" class="mt-1">
        </div>

      </div>
      <div class="form-layout-footer">
        <button class="btn btn-info mg-r-5">Submit</button>
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
        $('#mainImg').attr('src',e.target.result).width(150).height(100);
      };
      reader.readAsDataURL(input.files[0]);
    }
  } 
</script>

<script type="text/javascript">
  function mainCoverPhotoUrl(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e){
        $('#mainCoverPhoto').attr('src',e.target.result).width(200).height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  } 
</script>