@extends('layouts.app', ['pageSlug' => 'course'])
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Add course</h5>
                </div>
                <form method="post" action="/add-course" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        @include('alerts.success')
                        <div class="form-group{{ $errors->has('department_id') ? ' has-danger' : '' }}">
                            <label>{{ __('Department')}}</label>
                            <select name="department_id" class="form-control{{ $errors->has('department_id') ? ' is-invalid' : '' }}" required>
                                <option disabled selected>Choose</option>
                                @foreach ($departments as $department)
                                <option value="{{$department->id}}">{{$department->name}}</option>
                            
                                @endforeach
                                
                               
                            </select>
                            @include('alerts.feedback', ['field' => 'department_id'])
                        </div>
                        <div class="form-group{{ $errors->has('course_code') ? ' has-danger' : '' }}">
                            <label>{{ __('Course Code') }}</label>
                            <input type="text" name="course_code" class="form-control{{ $errors->has('course_code') ? ' is-invalid' : '' }}" value="" placeholder="Course Code" required>
                            @include('alerts.feedback', ['field' => 'course_code'])
                        </div>
                        <div class="form-group{{ $errors->has('course_title') ? ' has-danger' : '' }}">
                            <label>{{ __('Course Title') }}</label>
                            <input type="text" name="course_title" class="form-control{{ $errors->has('course_title') ? ' is-invalid' : '' }}" value="" placeholder="Course Title" required>
                            @include('alerts.feedback', ['field' => 'course_title'])
                        </div>
                            <div class="form-group{{ $errors->has('course_name') ? ' has-danger' : '' }}">
                                <label>{{ __('Course Name') }}</label>
                                <input type="text" name="course_name" class="form-control{{ $errors->has('course_name') ? ' is-invalid' : '' }}" placeholder="Course Name" value="" required>
                            @include('alerts.feedback', ['field' => 'course_name'])
                               
                            </div>
                            <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
                                <label>{{ __('Type')}}</label>
                                <select name="type" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" required>
                                    <option disabled selected>Choose</option>
                                    <option value="core">Core Course</option>
                                    <option value="elective">Elective Course</option>
                                    
                                   
                                </select>
                                @include('alerts.feedback', ['field' => 'type'])
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
                    Course Code
                  </th>
                  <th>
                    Course Title
                  </th>
                  <th>
                    Course Name
                  </th>
                  <th>
                    Course Type
                  </th>
                  <th>
                    Department
                  </th>
                  <th>
                      Action
                  </th>
                </tr>
              </thead>
              <tbody>
                 @if ($courses->count() < 1)
                 <tr><td colspan="8" class="text-center">No record found.</td></tr>
                 @else
                 @php $count = method_exists($courses, 'links') ? 1 : 0; @endphp
                 @foreach ($courses as $course)
                 @php $count = method_exists($courses, 'links') ? ($courses->currentpage()-1) * $courses->perpage() + $loop->index + 1 : $count + 1; @endphp
                 <tr>
                     <td>{{$count}}</td>
                     <td>{{$course->course_code}}</td>
                     <td>{{$course->course_title}}</td>
                     <td>{{$course->course_name}}</td>
                     <td>{{$course->type}}</td>
                     <td>{{$course->department_id}}</td>
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