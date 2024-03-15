<div class="card pd-20 pd-sm-40">
  <h6 class="card-body-title">View Contact Information</h6>
  <div class="table-wrapper">
    <table id="datatable1" class="table display responsive nowrap">
      <thead>
        <tr>
          <th class="wd-5p">Sl</th>
          <th class="wd-10p">Name</th>
          <th class="wd-10p">Email</th>
          <th class="wd-10p">Phone </th>
          <th class="wd-20p">Description</th>
          <th class="wd-20p">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($contacts as $key=>$row)
        <tr>
          <td> {{ $key+1}} </td>

          <td> {{ $row->name }} </td>
          <td> {{ $row->email }} </td>
          <td> {{ $row->phone }} </td>

          <td>{!! \Illuminate\Support\Str::limit(new \Illuminate\Support\HtmlString($row->message), 30, '...') !!}</td>

          <td>
            <a href="{{ route('contact.details.info', ['id' => $row->id]) }}" class="btn btn-sm btn-info" title="Detais"><i class="fa fa-eye"></i></a>
            

            @can('contacts.create', Auth::user())
            <a href="{{ route('delete.contact.info', ['id' => $row->id]) }}" class="btn btn-sm btn-danger" title="Delete" id="delete"> <i class="fa fa-trash"></i> </a>
            @endcan
          </td>   
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
