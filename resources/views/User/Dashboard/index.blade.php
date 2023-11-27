@extends('layouts.user.default')

@section('content')
<style>
    .popover{
       width: 500px !important; /* Max Width of the popover (depending on the container!) */
    }
 </style>
    <div class="content-header">
        <div class="container-fluid">
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
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-sm-8 col-md-8 offset-sm-2 offset-md-2 offset-lg-2">
                        </div>
                        <div class="col-12 col-sm-8 col-md-8 offset-sm-2 offset-md-2 offset-lg-2">
                            <div class="info-box">
                                <span class="info-box-icon text-info"><img src="../asset/img/files-icon.jpg"
                                        width="50"></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">
                                        <h5>Number of Transactions</h5>
                                    </span>
                                    <span class="info-box-number">
                                        <h2>{{ $pending }}</h2>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
   
        @if(!$notif->isEmpty())
            $('#bell-notif').css('color','tomato');
        @endif

        $('#bell-notif').click(function (e) { 
            $.ajax({
                type: "POST",
                url: "{{ route('user.notification') }}",
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
          
    </script>
@endsection
