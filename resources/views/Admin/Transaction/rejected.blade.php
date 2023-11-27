@extends('layouts.default')

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><img src="{{ asset('/asset/img/form-icon.jpg') }}" width="40"
                            style="border-radius: 100px;"> Rejected Transaction</h1>
                </div>
                <div class="col-sm-6">
                    <!--  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#" style="color: white;">Home</a></li>
                      <li class="breadcrumb-item active"= style="color: white;">Dashboard</li>
                   </ol> -->
                </div>
            </div>
        </div>
        @include('layouts.partials.messages')
        <div class="row card p-5 mt-5" style="background-color: white;">

            <div class="col-md-12">
                <div class="card-header">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="card card-info">
                                <br>
                                <div class="">
                                    <div class="table-responsive">

                                        <table class="table table-hover mb-2" id="example1" style="text-align: center; ">
                                            <thead>
                                                <tr>
                                                   <th>Transaction Code</th>
                                                   <th>Full Name</th>
                                                   <th>From</th>
                                                   <th>Contact Number</th>
                                                   <th>Email Address</th>
                                                   <th>Address</th>
                                                   <th>Title</th>
                                                   <th>Purpose</th>
                                                   <th>Reason of Rejection</th>
                                                   <th>Action</th>
                                                   
                                                </tr>

                                            </thead>
                                            <tbody>
                                             @foreach ($transactions as $reject)
                                                <tr>
                                                   <td>{{ $reject->transaction_code }}</td>
                                                   <td>{{ $reject->fullname }}</td>
                                                   <td>{{ $reject->u_name }}</td>
                                                   <td>{{ $reject->contact_number }}</td>
                                                   <td>{{ $reject->email_address }}</td>
                                                   <td>{{ $reject->address }}</td>
                                                   <td>{{ $reject->title }}</td>
                                                   <td>{{ $reject->purpose }}</td>
                                                   <td>{{ $reject->reason }}</td>
                                                   <td class="text-center">
                                                      <a class="btn btn-sm btn-success"
                                                            href="{{ url('admin/transactionLogs/') . '/' . $reject->t_id }}">View</a>
                                                   </td>
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

            <script src="{{ asset('asset/jquery/jquery.min.js') }}"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
            </script>
           
        @endsection
