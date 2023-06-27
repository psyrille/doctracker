 @extends('layouts.default')

@section('content')
<div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
      <div class="col-sm-6">
         <h1 class="m-0"><img src="../asset/img/trans.jpg" width="40" style="border-radius: 100px;"> Pending Transaction</h1>
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
              
                     <section class="content">
            <div class="container-fluid">
               <div class="card card-info">
                  <br>
                  <div class="col-md-12">
                     <table id="example1" class="table table-hover">
                        <thead>
                           <tr>
                              <th>File Type</th>
                              <th>File Name</th>
                              <th>Category</th>
                              <th>Description</th>
                              <th>File</th>
                              <th>Uploaded by</th>
                              <th>Date</th>
                              <th class="text-center">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td><img src="../asset/img/docx.png" width="35"></td>
                              <td>File-1</td>
                              <td>CATEGORY-1</td>
                              <td>Description</td>
                              <td class="text-info">file.txt</td>
                              <td>john doe</td>
                              <td>08-02-21</td>
                              <td class="text-center">
                                 <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#edit"><i
                                       class="fa fa-edit"></i> update</a>
                                 <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#delete"><i
                                       class="fa fa-trash-alt"></i> delete</a>
                              </td>
                           </tr>
                           <tr>
                              <td><img src="../asset/img/xlsx.png" width="35"></td>
                              <td>File-2</td>
                              <td>CATEGORY-2</td>
                              <td>Description</td>
                              <td class="text-info">file-sample.xlsx</td>
                              <td>jane doe</td>
                              <td>08-02-21</td>
                              <td class="text-center">
                                 <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#edit"><i
                                       class="fa fa-edit"></i> update</a>
                                 <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#delete"><i
                                       class="fa fa-trash-alt"></i> delete</a>
                              </td>
                           </tr>
                           <tr>
                              <td><img src="../asset/img/pptx.png" width="35"></td>
                              <td>File-3</td>
                              <td>CATEGORY-3</td>
                              <td>Description</td>
                              <td class="text-info">file-sample.pptx</td>
                              <td>james bond</td>
                              <td>08-02-21</td>
                              <td class="text-center">
                                 <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#edit"><i
                                       class="fa fa-edit"></i> update</a>
                                 <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#delete"><i
                                       class="fa fa-trash-alt"></i> delete</a>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </section>
               </center>
            </div>
      </div>  
</div>
      
@endsection

            