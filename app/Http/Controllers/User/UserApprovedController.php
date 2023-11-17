<?php

namespace App\Http\Controllers\User;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\User_transaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class UserApprovedController extends Controller
{
     public function approved(){

        $userId = Auth::id();

        // Kuhaa ang mga transactions nga ang destination kay ang ID sa aktibong user
        $transactions = Transaction::select('*')->where('destination', $userId)->where('status', 'approved')->get();

        // I-display o gamita ang mga transactions
      
        return view('User.Transaction.approved', compact('transactions'));
         
    }

    
}


