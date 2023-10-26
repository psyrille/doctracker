 @extends('layouts.default')

@section('content')
<div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
      <div class="col-sm-6">
         <h1 class="m-0"><img src="{{ asset('/asset/img/form-icon.jpg') }}" width="40" style="border-radius: 100px;">Update Employee</h1>
         </div>
            <div class="col-sm-6">
               <!-- <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#" style="color: white;">Home</a></li>
                  <li class="breadcrumb-item active" style="color: white;">Dashboard</li>
               </ol> -->
            </div>
         </div>
      </div>
         @include('layouts.partials.messages')
      <div class="row card p-5" style="background-color: white;">
         <form action="{{ route('list.edit.update') }}"  method="post">
            @csrf
            <div class="col-md-12">
               <div class="card-header"></div>
                        <div class="row">
                           <div class="col-md-5">
                              <div class="form-group">
                                 <label>Full Name </label>
                                 <input type="hidden" name="id" value="{{$employee->id}}">
                                 <input type="text" name="fullname" value="{{$employee->fullname}}" class="form-control" placeholder="Enter Full Name">
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label>Password</label>
                                 <input type="text" name="password"  class="form-control" placeholder="Enter Password">
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Device id</label>
                                 <input type="text" name="device_id" value="{{$employee->device_id}}" class="form-control" placeholder="Enter Device id">
                              </div>
                           </div>

                           <div class="col-md-12">
                              <div class="form-group">
                                <label> Position </label>
                                 <input type="text" name="position" value="{{$employee->position}}" class="form-control" placeholder="Enter Position">
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                <label> Department </label>
                                <textarea class="form-control" name="department"  placeholder="Enter department"> </textarea>
                                    @if($employees=App\Models\Employee::get())
                                    @foreach($employees as $employee)
                                      @if($employee->id == $employee->department)
                                      @endif
                                  <!--     <option></option>
                                          <option>SB Office</option>
                                          <option>Budget</option>
                                          <option>Accounting</option>
                                          <option>Treasurer</option>
                                          <option>MPDC</option>
                                          <option>Engineering</option>
                                          <option>MAGSO</option>
                                          <option>MSWDO</option>
                                          <option>Assessor Office</option>
                                          <option>Civil Registrar Office</option>
                                          <option>GSO Office</option>
                                          <option>Mayors Office</option> -->
                                    @endforeach
                                  @endif
                             
                              </div>
                           </div>             
                         </div>
                         <center>
                          <div class="col-md-0">
                            <button type="submit" class="btn btn-primary" style="background-color: black;">Save</button>
                          </div>
                        </center>
                      </form>
                    </div>  
                  </div>
      
@endsection

            