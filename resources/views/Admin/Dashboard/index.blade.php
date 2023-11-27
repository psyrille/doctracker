@extends('layouts.default')

@section('content')
<style>
   .popover{
      width: 30%; /* Max Width of the popover (depending on the container!) */
   }
</style>
<div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12 d-flex justify-content-between">
               <h1 class="m-0"><img src="{{ asset('/asset/img/dashboard-icon.jpg') }}" width="40" style="border-radius: 100px;" style="color: white;"> Dashboard</h1>
               <div class="d-flex justify-content-center align-items-center" style="cursor: pointer; border-radius: 50%; width: 50px; height: 50px; background-color: white">
                  <i class="fa-solid fa-bell" id="bell-notif" style="font-size: 30px;" data-toggle="popover" data-content=
                  '
                     <div class="table-responsive" style="height: 300px">
                        <table class="table">
                           <tr>
                              <th>Transaction Code</th>
                              <th>Status</th>
                           </tr>
                           @foreach($notif_transactions as $transaction)
                              <tr>
                                 <td>{{ $transaction->transaction_code }}</td>
                                 <td>{{ $transaction->short_description }}</td>
                              </tr>
                           @endforeach
                        </table>
                     </div>  
                  '></i>
               </div>
            </div>
            <div class="col-sm-6">
              <!--  <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#" >Home</a></li>
                  <li class="breadcrumb-item active" >Dashboard</li>
               </ol> -->
            </div>
         </div>
         <section class="content">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-12 col-sm-8 col-md-8 offset-sm-2 offset-md-2 offset-lg-2">
                     <div class="info-box d-flex align-items-center">
                        <span class="info-box-icon text-success"><img src="../asset/img/files-icon.jpg" width="50"></span>

                        <div class="info-box-content">
                           <span class="info-box-text">
                              <h5>Number of Transactions</h5>
                           </span>
                           <span class="info-box-number" >
                              @if($nOusers=App\Models\Transaction::count())
                                 <h2>{{$nOusers}}</h2>
                              @endif
                           </span>
                        </div>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">View</button>
                     </div>
                  </div>
                

               </div>
            </div>
         </section>
      </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Transactions</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <div class="table-responsive" style="height: 300px">
            <table class="table text-center">
               <tr>
                  <th>Transaction Code</th>
                  <th>Created By</th>
                  <th>Status</th>
                  <th>Create at</th>
               </tr>
              @foreach ($transactions as $transaction)
                 <tr>
                  <td>{{ $transaction->transaction_code }}</td>
                  <td>{{ $transaction->u_department }}</td>
                  <td
                  @if ($transaction->status == 'rejected')
                        style= 'color: tomato'
                  @elseif ($transaction->status == 'done')
                        style='color: green'
                  @elseif ($transaction->status == 'pending')
                  style='color: skyblue'
                  @endif
                  >{{ Str::title($transaction->status) }} </td>
                  <td>{{ Illuminate\Support\Carbon::parse($transaction->create_at)->format('F d, Y') }}</td>
                 </tr>
              @endforeach
            </table>
         </div>
       </div>
       <div class="modal-footer">
       </div>
     </div>
   </div>
 </div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
   
$(document).ready(function () {
   @if(!$notif->isEmpty())
      $('#bell-notif').css('color','tomato');
   @endif

   $('#bell-notif').click(function (e) { 
      $.ajax({
         type: "POST",
         url: "{{ route('admin.notification') }}",
         data: {
            '_token': "{{ csrf_token()  }}"
         },
         dataType: "json",
         success: function (response) {
            if(response.status_code == 1){
               $('#bell-notif').css('color','black');
            }
         }
      });
      
   });
});
  
</script>
@endsection
