<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Create New Job Category</h6><br>

  <div class="form-layout">
    <form method="post" action="{{ route('store.category') }}" enctype="multipart/form-data" >
      @csrf
      <div class="row mg-b-25">

        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Category Name: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Name">
            @error('name') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-4">
          <label class="form-control-label">Upload Icon Image: <span class="tx-danger">*</span></label><br>
          <label class="custom-file">
            <input type="file" id="file2" class="custom-file-input" name="icon" onChange="mainImgUrl(this)" >
            <span class="custom-file-control custom-file-control-primary"></span>
          </label>
          <div>
            @error('icon') 
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
        $('#mainImg').attr('src',e.target.result).width(80).height(80);
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