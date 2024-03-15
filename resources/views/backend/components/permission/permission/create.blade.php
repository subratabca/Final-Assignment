<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Create New Permission</h6><br>

  <div class="form-layout">
    <form method="post" action="{{ route('store.permission') }}">
      @csrf
      <div class="row mg-b-25">
        <div class="col-md-4">
          <div class="form-group">
            <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="name" placeholder="Enter permission name">
            @error('name') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>


      <div class="col-md-3">
          <div class="md-3">
              <label for="example-text-input" class="form-label">Permission For </label>
              <select name="for" id="subcat_id" class="form-select form-control" aria-label="Default select example">
                  <option selected="" disabled>Select PermissionFor</option>
                   @foreach($permissionFors as $row)
                  <option value="{{ $row->id }}">{{ $row->for }}</option>
                  @endforeach
              </select>
          </div>
          @error('for') 
          <span class="text-danger">{{ $message }}</span>
          @enderror
      </div>
      </div>
      <br>

      <div class="form-layout-footer">
        <button class="btn btn-info mg-r-5">Submit</button>
        <a href="{{ route('permission') }}" class="btn btn-success">Back</a>
      </div>
    </form>
  </div>
</div>



