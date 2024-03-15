<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Create New Permission For</h6><br>

  <div class="form-layout">
    <form method="post" action="{{ route('store.permissionfor') }}">
      @csrf
      <div class="row mg-b-25">
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="for" placeholder="Enter permission for name">
            @error('for') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
      </div>
      <br>

      <div class="form-layout-footer">
        <button class="btn btn-info mg-r-5">Submit</button>
        <a href="{{ route('permissionfor') }}" class="btn btn-success">Back</a>
      </div>
    </form>
  </div>
</div>



