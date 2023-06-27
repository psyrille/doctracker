 @extends('layouts.default')

@section('content')
<div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
      <div class="col-sm-6">
         <h1 class="m-0"><img src="../asset/img/trans.jpg" width="40" style="border-radius: 100px;">New Transaction</h1>
         </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
               </ol>
            </div>
         </div>
      </div>
      <div class="row card p-5" style="background-color: green;">
            <div class="col-md-12">
               <div class="card-header">
              
                     </div>
                        <div class="row">
                           <div class="col-md-5">
                              <div class="form-group">
                                 <label style="color: white;">Full Name</label>
                                 <input type="text" class="form-control" placeholder="Category Name">
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label style="color: white;">Contact Number</label>
                                 <input type="text" class="form-control" placeholder="+63">
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label style="color: white;">Email Address</label>
                                 <input type="text" class="form-control" placeholder="@example.com">
                              </div>
                           </div>

                           <div class="col-md-12">
                              <div class="form-group">
                                <label style="color: white;"> Address </label>
                                <textarea class="form-control" placeholder=""></textarea>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                <label style="color: white;"> Tittle </label>
                                <textarea class="form-control" placeholder=""></textarea>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                <label style="color: white;"> Type of Document </label>
                                <textarea class="form-control" placeholder=""></textarea>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                <label style="color: white;">Short Description</label>
                                <textarea class="form-control" placeholder=""></textarea>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                <label style="color: white;">Purpose</label>
                                <textarea class="form-control" placeholder=""></textarea>
                              </div>
                           </div>
                        </div>
                        <center>
               <div class="col-md-5">
                  <button type="submit" class="btn btn-primary" style="background-color: black;">Save</button>
               </div>
               </center>
            </div>
      </div>  
</div>
      
@endsection

            