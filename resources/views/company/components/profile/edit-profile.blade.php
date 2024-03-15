<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Edit Company</h6><br>

  <div class="form-layout">
    <form method="post" action="{{ route('update.company.profile') }}" enctype="multipart/form-data" >
      @csrf
      <div class="row mg-b-25">
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="name" value="{{ $editData->name }}">
            @error('name') 
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
            <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="phone" value="{{ $editData->phone }}">
            @error('phone') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Address: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="address" value="{{ $editData->address }}">
            @error('address') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <label class="form-control-label">Upload Logo: <span class="tx-danger">*</span></label><br>
          <label class="custom-file">
            <input type="file" id="file" class="custom-file-input" name="logo" onChange="adminProfileUrl(this)" >
            <span class="custom-file-control"></span>
          </label>
          <img src="" id="newProfile" class="mt-1">
        </div>
        @if(!empty($editData->logo))
        <div class="col-lg-2">
          <div class="form-group">
            <label class="form-control-label">Old Logo:</label><br>
            <img src="{{ (!empty($editData->logo)) ? asset('upload/company/logo/small/'.$editData->logo) : asset('upload/no_image.jpg') }}" style="width: 120px; height: 60px;">
          </div>
        </div>
        @endif
      </div>
      <div class="form-layout-footer">
        <button class="btn btn-info mg-r-5">Update</button>
        <a href="{{ route('view.company.profile') }}" class="btn btn-success">Back</a>
      </div>
    </form>
  </div>
</div>


<script type="text/javascript">
  function adminProfileUrl(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e){
        $('#newProfile').attr('src',e.target.result).width(120).height(60);
      };
      reader.readAsDataURL(input.files[0]);
    }
  } 
</script>

