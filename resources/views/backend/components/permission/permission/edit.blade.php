<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Update Permission</h6><br>

  <div class="form-layout">
    <form method="post" action="{{ route('update.permission',$permission->id) }}">
      @csrf
      <div class="row mg-b-25">
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
            <input type="text" class="form-control" name="name" value="{{ $permission->name }}">
            @error('name') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>


        <div class="col-md-3">
            <div class="md-3">
                <label for="example-text-input" class="form-label">Permission For </label>
                <select name="for" id="subcat_id" class="form-select form-control" aria-label="Default select example">
                    @foreach($permissionFors as $permissionFor)
                    <option value="{{ $permissionFor->id }}"
                        <?php if ($permissionFor->id == $permission->for ) {
                            echo "selected"; } ?> >{{ $permissionFor->for }}  
                        </option> 
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
        <button class="btn btn-info mg-r-5">Update</button>
        <a href="{{ route('permission') }}" class="btn btn-success">Back</a>
      </div>
    </form>
  </div>
</div>



