@extends('layouts.auth-master')

@section('content')
<section class="content">
            <div class="container-fluid">
               <div class="card card-info">
                  <form>
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="card-header">
                                 <span class="fa fa-building"> Office Settings Information</span>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Office Code</label>
                                       <input type="text" class="form-control" placeholder="Office Code">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Office Name</label>
                                       <input type="text" class="form-control" placeholder="Office Name">
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label>Head of Office</label>
                                       <input type="text" class="form-control" placeholder="Head of Office">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Contact</label>
                                       <input type="text" class="form-control" placeholder="ex. 09874244243">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Email</label>
                                       <input type="text" class="form-control" placeholder="ex. office@gmail.com">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <button type="submit" class="btn btn-primary">Save</button>
                              </div>
                  </form>
               </div>
            </div>
      </div>

   </div>
   </div>
   </div>
   </section>
   @end section