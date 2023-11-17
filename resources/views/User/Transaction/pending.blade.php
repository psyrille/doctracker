@extends('layouts.user.default')

@section('content')

<div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
      <div class="col-sm-6">
         <h1 class="m-0"><img src="{{ asset('/asset/img/form-icon.jpg') }}" width="40" style="border-radius: 100px;"> Pending Transaction</h1>
         </div>
            <div class="col-sm-6">
              <!--  <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#" style="color: white;">Home</a></li>
                  <li class="breadcrumb-item active" style="color: white;">Dashboard</li>
               </ol> -->
            </div>
         </div>
      </div>
   @include('layouts.partials.messages')
      <div class="row card p-5" style="background-color: white;">
      <div class="row card p-7">
            <div class="col-md-12">
               <div class="card-header">
                     <section class="content">
            <div class="container-fluid">
               <div class="card card-info">
                  <ol class="breadcrumb float-sm-right">
                     <div class="col-sm-12 col-md-10">
                        <div class="dataTables_length" id="example1_length">
                           <label>Show entries
                            <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm">
                              <option value="10">10</option>
                              <option value="25">25</option>
                              <option value="50">50</option>
                              <option value="100">100</option>
                           </select> 
                        </label>
                        </div>
                     </div>
                  <div id="example1_filter" class="dataTables_filter">
                     <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1">
                     </label>
                  </div>
               </ol>
                  <br>
                  <div class="col-md-12">
                     <div class="table-responsive">
                        
                     <table id="example1" class="table table-hover" style="text-align: center">
                        <thead>
                           <tr>
                              <th>Transaction Code</th>
                              <th>Full Name</th>
                              <th>Contact Number</th>
                              <th>Email Address</th>
                              <th>Address</th>
                              <th>Title</th>
                              <th>Purpose</th>
                              <th>Short Description</th>
                              <th colspan="3">Action</th>
                              <th><button class="btn btn-sm btn-success" id="btn-approve">Approve</button></th>
                           </tr>

                        </thead>
                        <tbody>
                          @foreach($transactions as $transaction)
                          <tr class="table-row">
                              <td>{{$transaction->transaction_code}}</td>
                              <td>{{$transaction->fullname}}</td>
                              <td>{{$transaction->contact_number}}</td>
                              <td>{{$transaction->email_address}}</td>
                              <td>{{$transaction->address}}</td>
                              <td>{{$transaction->title}}</td>
                              <td>{{$transaction->purpose}}</td>
                              <td>{{$transaction->short_description}}</td>
                              <td class="text-center">
                                 <a class="btn btn-sm btn-success" href="{{ url('/pending/edit/update/').'/'.$transaction->id }}">Update</a>      

                              </td>
                              <td><a class="btn btn-sm btn-success" href="{{ url('/pending/view/').'/'.$transaction->id }}">View</a></td>
                              <td>
                                 <a class="btn btn-sm btn-danger" href="{{ url('/pending/delete/').'/'.$transaction->id }}">Delete</a>
                              </td>
                              <td style="text-align: center"><input type="checkbox" name="" class="form-check-input approve-checbox" sid='{{ $transaction->id }}'></td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  
                     </div>
                  </div>
               </div>
            </div>
            
         </section>
               </center>
            </div>
      </div>  

</div>
<script src="{{ asset('asset/jquery/jquery.min.js') }}"></script>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    
   $('#btn-approve').click(function (e) { 
      e.preventDefault();

      $('input[type=checkbox]').each(function () {
         let sid = $(this).attr('sid');
         let el = this;

         

         $.ajax({
         type: "POST",
         url: "/user/approveTransaction",
         data: {
            'id': sid,
            '_token': "{{ csrf_token() }}"
         },
         success: function (response) {
            if(response.status_code == 1){
               $(el).closest('.table-row').fadeOut(300,function(){
                  $(this).remove()
               })
            }
         }
         });
      });
      
      
      
      
   });
</script>
      
@endsection

