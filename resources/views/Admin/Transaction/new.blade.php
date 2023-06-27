 @extends('layouts.default')

@section('content')
<div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0"><img src="../asset/img/dashboard-icon.jpg" width="40" style="border-radius: 100px;">Transaction</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Dashboar</li>
               </ol>
            </div>
         </div>
      </div>
      <div class="row card p-5">
             <div class="col-md-8">
               <div class="card-header">
                  <span class="fa fa-file"> Category Information</span>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" class="form-control" placeholder="Category Name">
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label>Description</label>
                       <textarea class="form-control" placeholder="Description"></textarea>
                     </div>
                  </div>
               </div>
               <div class="col-md-12">
                  <button type="submit" class="btn btn-primary">Save</button>
               </div>
            </div>
      </div>  
</div>
      
@endsection

            