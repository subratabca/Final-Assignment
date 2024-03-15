<div class="row row-sm">

  <div class="col-sm-6 col-xl-4">
    <div class="card pd-20 bg-primary">
      <div class="d-flex justify-content-between align-items-center mg-b-10">
        <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Active Companies</h6>
        <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
      </div>
      <div class="d-flex align-items-center justify-content-between">
        <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ $activeCompanies }}</h3>
      </div>
      <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-xl-4 mg-t-20 mg-xl-t-0">
    <div class="card pd-20 bg-purple">
      <div class="d-flex justify-content-between align-items-center mg-b-10">
        <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Pending Companies</h6>
        <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
      </div>
      <div class="d-flex align-items-center justify-content-between">
        <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ $pendingCompanies }}</h3>
      </div>
      <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-xl-4 mg-t-20 mg-xl-t-0">
    <div class="card pd-20 bg-sl-primary">
      <div class="d-flex justify-content-between align-items-center mg-b-10">
        <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Jobs Posted</h6>
        <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
      </div><!-- card-header -->
      <div class="d-flex align-items-center justify-content-between">
        <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ $jobs->count() }}</h3>
      </div><!-- card-body -->
      <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
      </div>
    </div>
  </div>


</div>





