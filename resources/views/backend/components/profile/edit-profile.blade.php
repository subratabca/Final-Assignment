<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Edit Company</h6><br>

  <div class="form-layout">
    <form method="post" action="{{ route('update.admin.profile') }}" enctype="multipart/form-data" >
      @csrf
      <div class="row mg-b-25">
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="name" value="@if (old('name')){{ old('name') }}@else{{ $editData->name }} @endif">
            @error('name') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
            <input type="email" class="form-control" name="email" value="@if (old('email')){{ old('email') }}@else{{ $editData->email }} @endif">
            @error('email') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="phone" value="@if (old('phone')){{ old('phone') }}@else{{ $editData->phone }} @endif">
            @error('phone') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-lg-3">
          <label class="form-control-label">Upload Profile Image: <span class="tx-danger">*</span></label><br>
          <label class="custom-file">
            <input type="file" id="file" class="custom-file-input" name="profile_image" onChange="adminProfileUrl(this)" >
            <span class="custom-file-control"></span>
          </label>
          <img src="" id="newProfile" class="mt-1">
        </div>
        @if(!empty($editData->profile_image))
        <div class="col-lg-2">
          <div class="form-group">
            <label class="form-control-label">Old Profile Image:</label><br>
            <img src="{{ (!empty($editData->profile_image)) ? asset('upload/admin-profile/listing/'.$editData->profile_image) : asset('upload/no_image.jpg') }}" style="width: 80px; height: 80px;">
          </div>
        </div>
        @endif
      </div>
      <div class="form-layout-footer">
        <button class="btn btn-info mg-r-5">Update</button>
        <a href="{{ route('view.admin.profile') }}" class="btn btn-success">Back</a>
      </div>
    </form>
  </div>
</div>


<script type="text/javascript">
  function adminProfileUrl(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e){
        $('#newProfile').attr('src',e.target.result).width(80).height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  } 
</script>

