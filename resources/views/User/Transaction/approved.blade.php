@extends('layouts.user.default')

@section('content')
<style>
   .custom-select{
       width: 100px !important;
   }
   .dataTable > thead > tr > th[class*="sort"]:before,
   .dataTable > thead > tr > th[class*="sort"]:after {
       content: "" !important;
   }
</style>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><img src="{{ asset('/asset/img/form-icon.jpg') }}" width="40"
                            style="border-radius: 100px;"> Approved Transaction</h1>
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
            <form action="{{ route('pending.user') }}" method="post">
                @csrf
                <div class="row card p-7">
                    <div class="col-md-12">
                        <div class="card-header">
                            <section class="content">
                                <div class="container-fluid">
                                    <div class="card card-info">
                                        <br>
                                        <div class="col-md-12">
                                          <table class="table table-hover mb-2" id="example1" style="text-align: center; ">
                                             <thead>
                                                 <tr>
                                                     <th>Transaction Code</th>
                                                     <th>Full Name</th>
                                                     <th>Contact Number</th>
                                                     <th>Email Address</th>
                                                     <th>Address</th>
                                                     <th>Title</th>
                                                     <th>Purpose</th>
                                                     <th>Destination</th>
                                                     <th>Short Description</th>
                                                     <th>Action</th>
                                                    
                                                 </tr>
 
                                             </thead>
                                             <tbody>
                                                 @foreach ($transactions as $transaction)
                                                     <tr class="table-row">
                                                         <td>{{ $transaction->transaction_code }}</td>                                                        <td>{{ $transaction->fullname }}</td>
                                                         <td>{{ $transaction->contact_number }}</td>
                                                         <td>{{ $transaction->email_address }}</td>
                                                         <td>{{ $transaction->address }}</td>
                                                         <td>{{ $transaction->title }}</td>
                                                         <td>{{ $transaction->purpose }}</td>
                                                         <td>{{ $transaction->u_name }}</td>
                                                         <td>{{ $transaction->short_description }}</td>
                                                         <td class="">
                                                             <a class="btn btn-sm btn-success" href="{{ url('user/transactionLogs/').'/'.$transaction->id }}">View</a>            
                                                             <a class="btn btn-sm btn-danger" href="{{ url('/pending/delete/').'/'.$transaction->id }}">Delete</a>
                                                             {{-- TODO wapa m gana ang delete sa tanang transactions sa admin--}}
                                                         </td>
                                                         
                                                     </tr>
                                                 @endforeach
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
