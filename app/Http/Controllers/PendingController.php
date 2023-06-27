<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendingController extends Controller
{
    public function pendingtransaction(){
        return view('Admin.Transaction.pending');
    }
}
