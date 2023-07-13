 @extends('layouts.default')

@section('content')
<div class="content-header">
      <div class="container-fluid">
         <div class="row mb-12">
      <div class="col-sm-3">
        <h1 class="m-0"><img src="{{ asset('/asset/img/form-icon.jpg') }}" width="40" style="border-radius: 100px;">Document Logs</h1>
         </div>
            <div class="col-sm-8">
              <!--  <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#" style="color: white;">Home</a></li>
                  <li class="breadcrumb-item active" style="color: white;">Dashboard</li>
               </ol> -->
            </div>
         </div>
      </div>
<!--  -->
       
          <center>
            <div class="col-md-8">
               <div class="card-header">
                 
               </div>
                        <div class="row card p-2">
                           <div class="col-md-5">
                              <div class="form-group">
                                <ol class="breadcrumb float-sm-left">
                                 <label>Search: </label>
                                 <input type="text" name="Search" class="form-control" placeholder="Enter Transaction Code">

                               </ol>
                              </div>
                           </div>
        </center>
      </div>
    </div> 



      
@endsection

            