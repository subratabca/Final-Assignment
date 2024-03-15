<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Create New Company</h6><br>

  <div class="form-layout">
    <form method="post" action="{{ route('store.setting') }}" enctype="multipart/form-data" >
      @csrf
      <div class="row mg-b-25">
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Company Name: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Name">
            @error('name') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Title: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Enter Title">
            @error('title') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Email">
            @error('email') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Phone Number One: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="phone1" value="{{ old('phone1') }}" placeholder="Enter Phone Number">
            @error('phone1') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Phone Number Two: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="phone2" value="{{ old('phone2') }}" placeholder="Enter Phone Number">
            @error('phone2') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Company Address: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Enter Company Address">
            @error('address') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-4">
          <label class="form-control-label">Upload Logo: <span class="tx-danger">*</span></label><br>
          <label class="custom-file">
            <input type="file" id="file" class="custom-file-input" name="logo" onChange="mainLogoUrl(this)" >
            <span class="custom-file-control"></span>
          </label>
          <div>
            @error('logo') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <img src="" id="mainLogo" class="mt-1">
        </div>
        <div class="col-lg-4">
          <label class="form-control-label">Upload Cover Photo: <span class="tx-danger">*</span></label><br>
          <label class="custom-file">
            <input type="file" id="file2" class="custom-file-input" name="cover_photo" onChange="mainCoverPhotoUrl(this)" >
            <span class="custom-file-control custom-file-control-primary"></span>
          </label>
          <div>
            @error('logo') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <img src="" id="mainCoverPhoto" class="mt-1">
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Description: <span class="tx-danger">*</span></label>
            <textarea class="form-control" id="summernote"  name="description" value="{{ old('description') }}"> </textarea>
            @error('description') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
      </div>
      <div class="form-layout-footer">
        <button class="btn btn-info mg-r-5">Submit</button>
        <a href="{{ route('setting') }}" class="btn btn-success">Back</a>
      </div>
    </form>
  </div>
</div>


<script type="text/javascript">
  function mainLogoUrl(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e){
        $('#mainLogo').attr('src',e.target.result).width(150).height(80);
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
        $('#mainCoverPhoto').attr('src',e.target.result).width(150).height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  } 
</script>