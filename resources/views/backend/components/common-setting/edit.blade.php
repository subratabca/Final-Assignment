<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Edit Setting Information</h6><br>

  <div class="form-layout">
    <form method="post" action="{{ route('update.setting', ['id' => $editData->id]) }}" enctype="multipart/form-data" >
      @csrf
      <div class="row mg-b-25">
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Company Name: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="name" value="{{ $editData->name }}">
            @error('name') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Title: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="title" value="{{ $editData->title }}">
            @error('title') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
            <input type="email" class="form-control" name="email" value="{{ $editData->email }}">
            @error('email') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Phone Number One: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="phone1" value="{{ $editData->phone1 }}">
            @error('phone1') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Phone Number Two: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="phone2" value="{{ $editData->phone2 }}">
            @error('phone2') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Company Address: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="address" value="{{ $editData->address }}">
            @error('address') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        
        <div class="col-lg-5">
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Old Logo:</label>
                <img src="{{ asset('upload/common-setting/logo/small/'.$editData->logo) }}" style="width: 150px; height: 80px;"> 
              </div>
            </div>

            <div class="col-lg-8">
              <label class="form-control-label">Upload New Logo: <span class="tx-danger">*</span></label><br>
              <label class="custom-file">
                <input type="file" id="file" class="custom-file-input" name="logo" onChange="mainLogoUrl(this)" >
                <span class="custom-file-control"></span>
                <input type="hidden" name="old_logo" value="{{ $editData->logo }}">
              </label>
              <img src="" id="mainLogo" class="mt-1">
            </div>

          </div> 
        </div>

        <div class="col-lg-5">
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Old Cover Photo:</label>
                <img src="{{ asset('upload/common-setting/cover_photo/small/'.$editData->cover_photo) }}" style="width: 150px; height: 80px;"> 
              </div>
            </div>

            <div class="col-lg-8">
              <label class="form-control-label">Upload New Cover Photo: <span class="tx-danger">*</span></label><br>
              <label class="custom-file">
                <input type="file" id="file2" class="custom-file-input" name="cover_photo" onChange="mainCoverPhotoUrl(this)" >
                <span class="custom-file-control custom-file-control-primary"></span>
                <input type="hidden" name="old_cover_photo" value="{{ $editData->cover_photo }}">
              </label>
              <img src="" id="mainCoverPhoto" class="mt-1">
            </div>

          </div> 
        </div>

        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Description: <span class="tx-danger">*</span></label>
            <textarea class="form-control" id="summernote"  name="description" value="{{ old('description') }}"> 
              {{ old('description', $editData->description) }}
            </textarea>
            @error('description') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
      </div>
      <div class="form-layout-footer">
        <button class="btn btn-info mg-r-5">Update</button>
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