@extends('layouts.app', ['pageSlug' => 'ads'])
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Add department</h5>
                </div>
                <form method="post" action="/add-department" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        @include('alerts.success')

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ __('Department Name') }}</label>
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="" placeholder="Name of Department" required>
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                            
                        
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
          <table class="table tablesorter " id="">
              <thead class=" text-primary">
                <tr>
                    <th>
                        #
                    </th>
                  <th>
                    Name of Department
                  </th>
                  <th>
                    Date created
                  </th>
                
                  <th>
                      Action
                  </th>
                </tr>
              </thead>
              <tbody>
                 @if ($departments->count() < 1)
                 <tr><td colspan="8" class="text-center">No record found.</td></tr>
                 @else
                 @php $count = method_exists($departments, 'links') ? 1 : 0; @endphp
                 @foreach ($departments as $department)
                 @php $count = method_exists($departments, 'links') ? ($departments->currentpage()-1) * $departments->perpage() + $loop->index + 1 : $count + 1; @endphp
                 <tr>
                     <td>{{$count}}</td>
                     <td>{{$department->name}}</td>
                     <td>{{$department->created_at}}</td>
                     <td>
                      <div class="dropdown dropdown">
                          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                              <i class="fa fa-ellipsis-v"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              {{-- <a class="dropdown-item" data-toggle="modal" data-target="#adIdPayment{{$advert->id}}" href="#">Approve Payment</a> --}}
                             <a class="dropdown-item" href="#">Delete</a>
                             {{-- <a class="dropdown-item" data-toggle="modal" data-target="#adId{{$advert->id}}" href="#">Delete</a> --}}
                             
                          </div>
                      </div>
                     </td>
                     
                  {{-- Delete advert --}}
                     {{-- <div class="modal fade" id="adId{{$advert->id}}" tabindex="-1" role="dialog" aria-labelledby="newUserModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="newUserModalLabel">Delete Advert</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                  <form action="/delete-advert" method="post" id="submitAd">
                                      @csrf
                                    
                                          <i style="font-style: normal;">Are you sure about this decision?</i>
                                      <input type="hidden" name="id" value="{{$advert->id}}">
                                      <hr/>
                                      <button type="button" class="btn btn-light m-1 px-5 radius-30 btn-sm" data-dismiss="modal">No</button>
                                      <button type="submit" form="submitAd" class="btn btn-primary m-1 px-5 radius-30 btn-sm">delete</button>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div> --}}
                 </tr>
                 @endforeach
                     
                 @endif
              </tbody>
            </table>
            {{-- <div class="irs_pagination">
                {{ $adverts->links() }}
        </div> --}}
        </div>
      </div>
    
@endsection