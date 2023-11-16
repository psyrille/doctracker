<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_transaction;
use Auth;


class UserPendingController extends Controller
{
     public function userpendingtransaction(Request $request){

        $userId = Auth::id();

    // Kuhaa ang mga transactions nga ang destination kay ang ID sa aktibong user
    $transactions = User_transaction::where('destination', $userId)->get();

    // I-display o gamita ang mga transactions
   
      
        return view('User.Transaction.pending',[
              'transactions'=>$transactions
            ]);
         
    }
}


