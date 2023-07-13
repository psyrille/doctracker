 @extends('layouts.default')

@section('content')
<div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
      <div class="col-sm-6">
         <h1 class="m-0"><img src="{{ asset('/asset/img/trans.jpg') }}" width="40" style="border-radius: 100px;"> Approved Transaction </h1>
         </div>
            <div class="col-sm-6">
             <!--   <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#" style="color: white;">Home</a></li>
                  <li class="breadcrumb-item active" style="color: white;">Dashboard</li>
               </ol> -->
            </div>
         </div>
      </div>
      <div class="row card p-5">
            <div class="col-md-12">
               <div class="card-header">
              
                     <section class="content">
            <div class="container-fluid">
               <div class="card card-info">
                  <br>
                  <div class="col-md-12">
                     <table id="example1" class="table table-hover">
                        <thead class="btn-cancel">
                           <tr>
                              <th>Category</th>
                              <th>SourceFile</th>
                              <th>File Name</th>
                              <th>FilePath</th>
                              <th>Remarks</th>
                              <th>Commit Time</th>
                              <th>Date Updated</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>Category-1</td>
                              <td class="text-info">files/samples.txt</td>
                              <td>FIlename1</td>
                              <td class="text-info">files/samples.txt</td>
                              <td>Remarks</td>
                              <td>02:35 PM</td>
                              <td>08-02-21</td>
                           </tr>
                           <tr>
                              <td>Category-2</td>
                              <td class="text-info">files/file-samples.txt</td>
                              <td>FIlename2</td>
                              <td class="text-info">files/file-samples.txt</td>
                              <td>Remarks</td>
                              <td>02:35 PM</td>
                              <td>08-02-21</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </section>
                        <center>
               <div class="col-md-5">
                  
               </div>
               </center>
            </div>
      </div>  
</div>
      
@endsection

            