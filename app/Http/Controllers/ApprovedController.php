<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApprovedController extends Controller
{
    public function approvedtransaction(){
        return view('Admin.Transaction.approved');
    }
}
