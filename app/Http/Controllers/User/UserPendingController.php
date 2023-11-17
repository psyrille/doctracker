<?php

namespace App\Http\Controllers\User;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\User_transaction;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Auth;


class UserPendingController extends Controller
{
     public function userpendingtransaction(Request $request){

        $userId = Auth::id();

        // Kuhaa ang mga transactions nga ang destination kay ang ID sa aktibong user
        $transactions = Transaction::select('*')->where('destination', $userId)->where('status', 'pending')
        ->get();

        // I-display o gamita ang mga transactions
   
      
        return view('User.Transaction.pending',[
              'transactions'=>$transactions
            ]);
         
    }

    public function approveTransaction(Request $request){
      $id = $request->id;

      try{
        Transaction::where('id',$id)->update(array(
          'status' => 'approved'
        ));

        return response()->json([
          'status_code' => 1
        ]);
      }
      catch(Exception $e){
        return response()->json([
          'status_code' => 0
        ]);
      }
    }
}


