<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Document-Tracking-System</title>
   <!-- Font Awesome -->
   <link rel="stylesheet" href="{{ asset('/asset/fontawesome/css/all.min.css') }}">
   <link rel="stylesheet" href="{{ asset('/asset/css/adminlte.min.css') }}">
   <link rel="stylesheet" href="{{ asset('/asset/css/style.css') }}">
   <link rel="stylesheet" href="{{ asset('/asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
     <link rel="stylesheet" href="{{ asset('/asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
   <style type="text/css">

      td a.btn{
         font-size: 0.7rem;
      }
      th{
         padding: 0.5rem !important;
      }
      table tr td {
         padding: 0.3rem !important;
      }
   </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">
      <nav class="main-header navbar navbar-expand navbar-light" style="background-color: #cc0066;">
         <!-- Left navbar links -->
         <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: white;"></i></a>
               </li>
         </ul>
         <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                  <a class="nav-link" href="#" role="button">
                     <img src="{{ asset('/asset/img/admin-icon.jpg') }}" class="img-circle" alt="User Image" width="40" style="margin-top: -8px;">
                  </a>
               </li>
            <li class="nav-item">
               <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt" style="color: white;"></i>
               </a>
            </li>
               <!-- <li class="nav-item">
                  <a class="nav-link" href="{{ route ('logout.perform')}}">
                     <i class="fas fa-sign-out-alt"style="color: white;"></i>
                  </a>
               </li>  -->      
         </nav>
      <aside class="main-sidebar sidebar-light-primary" style="background-color: black;">
            <!-- Brand Logo -->
         <a href="index.html" class="brand-link">
         <img src="{{ asset('/asset/img/logo-bontoc.png') }}" alt="DSMS Logo" width="200">
         </a>
         <div class="sidebar">
            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                     <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                           <img src="{{ asset('/asset/img/dashboard-icon.jpg') }}" width="30" style="border-radius: 100px;">
                           <p style="color: white;">
                              Dashboard
                           </p>
                        </a>
                     </li>
                 
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <img src="{{ asset('/asset/img/trans.jpg') }}" width="30" style="border-radius: 50px;">
                        <p style="color: white;">
                           Transactions
                        </p>
                        <i class="right fas fa-angle-left" style="color: white;"></i>
                     </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{ route('transaction.new') }}" class="nav-link">
                        <i class="nav-icon far fa-circle" style="color: white;"></i>
                        <p style="color: white;"> New </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ route('transaction.pending') }}" class="nav-link">
                        <i class="nav-icon far fa-circle" style="color: white;"></i>
                        <p style="color: white;">Pending </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ route('transaction.approved') }}" class="nav-link">
                        <i class="nav-icon far fa-circle" style="color: white;"></i>
                        <p style="color: white;">Approved</p>
                     </a>
                  </li>
               </ul>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <img src="{{ asset('/asset/img/user-icon.jpg') }}" width="30" style="border-radius: 50px;">
                        <p style="color: white;">
                          Employees
                        </p>
                        <i class="right fas fa-angle-left" style="color: white;"></i>
                     </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{ route('employee.new') }}" class="nav-link">
                        <i class="nav-icon far fa-circle" style="color: white;"></i>
                        <p style="color: white;"> New </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{ route('employee.list') }}" class="nav-link">
                        <i class="nav-icon far fa-circle" style="color: white;"></i>
                        <p style="color: white;"> List </p>
                     </a>
                  </li>
               </ul>
                <li class="nav-item">
                     <a href="#" class="nav-link">
                        <img src="{{ asset('/asset/img/user-icon.jpg') }}" width="30" style="border-radius: 50px;">
                        <p style="color: white;">
                          Logs
                        </p>
                        <i class="right fas fa-angle-left" style="color: white;"></i>
                     </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{ route('log.document') }}" class="nav-link">
                        <i class="nav-icon far fa-circle" style="color: white;"></i>
                        <p style="color: white;"> Document Logs</p>
                     </a>
                  </li>
               </ul>
                  </li>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <img src="{{ asset('/asset/img/admin-icon.jpg') }}" width="30" style="border-radius: 50px;">
                        <p style="color: white;">
                           Account
                        </p>
                        <i class="right fas fa-angle-left" style="color: white;"></i>
                     </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{ route ('logout.perform')}}" class="nav-link">
                        <i class="nav-icon far fa-circle" style="color: white;"></i>
                        <p style="color: white;"> Logout</p>
                     </a>
                  </li>
                       


              
                 <!--  <li class="nav-item">
                     <a href="files.html" class="nav-link">
                        <img src="../asset/img/file.png" width="30">
                        <p>
                           Files
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <img src="../asset/img/commit.png" width="30">
                        <p>
                           Commit
                        </p>
                        <i class="right fas fa-angle-left"></i>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="commit-file.html" class="nav-link">
                              <i class="nav-icon far fa-circle"></i>
                              <p>Commit Files</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="commit-details.html" class="nav-link">
                              <i class="nav-icon far fa-circle"></i>
                              <p>Commit Details</p>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <img src="../asset/img/logs.png" width="30">
                        <p>
                           Logs
                        </p>
                        <i class="right fas fa-angle-left"></i>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="document-logs.html" class="nav-link">
                              <i class="nav-icon far fa-circle"></i>
                              <p>Document Logs</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="user-logs.html" class="nav-link">
                              <i class="nav-icon far fa-circle"></i>
                              <p>User Logs</p>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a href="users.html" class="nav-link">
                        <img src="../asset/img/users.png" width="30">
                        <p>
                           Users
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="database.html" class="nav-link">
                        <img src="../asset/img/db.png" width="30">
                        <p>
                           Database
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="settings.html" class="nav-link">
                        <img src="../asset/img/settings.png" width="30">
                        <p>
                           Office Settings
                        </p>
                     </a>
                  </li>
               </ul>
            </nav>
         </div> -->
      </aside>
      <div class="content-wrapper" style="background-color:teal;">
         @yield('content')
      </div>
   </div>
   <!-- jQuery -->
   <script src="{{ asset('/asset/jquery/jquery.min.js') }}"></script>
   <script src="{{ asset('/asset/js/adminlte.js') }}"></script>
</body>

</html>