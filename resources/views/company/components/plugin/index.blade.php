<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">Plugin List</h6>
  <div class="table-wrapper">
    <table id="datatable1" class="table display responsive nowrap">
      <thead>
        <tr>
          <th class="wd-5p">Sl</th>
          <th class="wd-10p">Company Name</th>
          <th class="wd-10p">Blog</th>
          <th class="wd-10p">Employee</th>
          <th class="wd-20p">Page</th>
        </tr>
      </thead>
      <tbody>
        @foreach($companies as $key=>$row)
        <tr>
          <td> {{ $key+1}} </td>
          <td> {{ $row->name}} </td>
           <td>{!! $row->blog ? '<span class="badge badge-pill badge-success">Active</span>' : '<span class="badge badge-pill badge-danger">Deactive</span>' !!}
           </td>

           <td>{!! $row->employee ? '<span class="badge badge-pill badge-success">Active</span>' : '<span class="badge badge-pill badge-danger">Deactive</span>' !!}
           </td>

           <td>{!! $row->page ? '<span class="badge badge-pill badge-success">Active</span>' : '<span class="badge badge-pill badge-danger">Deactive</span>' !!}
           </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
