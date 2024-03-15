<div class="card pd-20 pd-sm-40 mg-t-20">
  <div class="row mg-t-10">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header card-header-default bg-primary justify-content-between">
          <h6 class="mg-b-0 tx-14 tx-white tx-normal">Contact Details Information</h6>
        </div>

        <div class="card-body bg-gray-200">
          <p class="mg-b-0">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <th>Name:</th>
                  <td>{{ $contact->name }}</td>
                </tr>
                <tr>
                  <th>Email:</th>
                  <td>{{ $contact->email }}</td>
                </tr>
                <tr>
                  <th>Phone:</th>
                  <td>{{ $contact->phone }}</td>
                </tr>

                <tr>
                  <th>Message:</th>
                  <td>{!! htmlspecialchars_decode($contact->message) !!}</td>
                </tr>
            </table>
          </p>
        </div>

        <div class="card-footer tx-center bg-gray-300">
          <a href="{{ route('view.contact.info')}}" class="btn btn-danger">Back To Contact List</a>
        </div>
      </div>
    </div>

  </div>

</div>