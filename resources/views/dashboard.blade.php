@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
@include('alerts.success', ['key' => 'proof_status'])
        @if (Auth::user()->name == 'Admin Admin')
        <h4>School Admin Dashboard</h4>
        <div class="row">
          <div class="font-icon-list col-lg-3 col-md-3 col-sm-3 col-xs-3 col-xs-3">
              <div class="font-icon-detail">
                <i class="tim-icons icon-single-02"></i>
                <h4>{{count($departments)}}</h4>
                <a href="/department">Department</a>
              </div>
            </div>
            <div class="font-icon-list col-lg-3 col-md-3 col-sm-3 col-xs-3 col-xs-3">
              <div class="font-icon-detail">
                <i class="tim-icons icon-refresh-02"></i>
                <h4>{{count($courses)}}</h4>
                <a href="/course">Courses</a>
              </div>
            </div>
            <div class="font-icon-list col-lg-3 col-md-3 col-sm-3 col-xs-3 col-xs-3">
              <div class="font-icon-detail">
                <i class="tim-icons icon-bullet-list-67"></i>
                <h4>{{count($students)}}</h4>
                <a href="/campaign">Students</a>
              </div>
            </div>
            <div class="font-icon-list col-lg-3 col-md-3 col-sm-3 col-xs-3 col-xs-3">
              <div class="font-icon-detail">
                <i class="tim-icons icon-money-coins"></i>
                <h4>N {{count($payment)}}</h4>
                <a href="#">Payment</a>
              </div>
            </div>
      </div>
        @else
        <h4>Student Dashboard</h4>
        <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                      @if (auth()->user()->status == null)
                          <div class="alert alert-warning alert-lg">
                              <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                              <i class="tim-icons icon-simple-remove"></i>
                              </button>
                              <span>
                              <b> Warning - </b>Opps!  your account is yet to be updated. Click <a href="/profile">Here</a> to update your account</span>
                          </div>
                      @else
                      <div class="row">
                          <div class="font-icon-list col-lg-3 col-md-3 col-sm-3 col-xs-3 col-xs-3">
                              <div class="font-icon-detail">
                                <i class="tim-icons icon-wallet-43"></i>
                                <h3>{{count($stu_courses)}}</h3>
                                <a href="/courses">My Courses</a>
                              </div>
                            </div>
                            <div class="font-icon-list col-lg-3 col-md-3 col-sm-3 col-xs-3 col-xs-3">
                                <div class="font-icon-detail">
                                  <i class="tim-icons icon-single-02"></i>
                                  <h3>Profile</h3>
                                  <a href="/profile">Profile setting</a>
                                </div>
                              </div>
                            <div class="font-icon-list col-lg-3 col-md-3 col-sm-3 col-xs-3 col-xs-3">
                              <div class="font-icon-detail">
                                <i class="tim-icons icon-atom"></i>
                                <h3>3</h3>
                              <a href="#">Reciept</a>
                              </div>
                            </div>
                            <div class="font-icon-list col-lg-3 col-md-3 col-sm-3 col-xs-3 col-xs-3">
                              <div class="font-icon-detail">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <h3>3</h3>
                                <a href="#">Updates</a>
                            
                              </div>
                            </div>
                            
                      </div>   
                      @endif
        @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script> --}}
{{-- <script src="https://isotope.metafizzy.co/js/jquery-1.7.1.min.js"></script> --}}
    <script src="{{ asset('white') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
 
@endpush
