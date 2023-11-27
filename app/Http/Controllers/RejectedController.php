<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rejected;
use App\Models\TrackingLog;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RejectedController extends Controller
{  
   public function rejectedTransactions(){

      $transactions = Rejected::select(DB::raw('transactions.*,  users.name as u_name, transactions.id as t_id, rejected.reason '))
      ->join('users', 'users.id', '=', 'from_id')
      ->join('transactions', 'transactions.id','=','rejected.transaction_id')
      ->where('rejected.to_id', Auth::id())
      ->get();


      return view('Admin.Transaction.rejected', compact('transactions'));
  }

  public function rejectTransaction(Request $request){
   $transaction_id = $request->transaction_id;
   $from_id = $request->from_id;
   $rejection_reason = $request->reason;

   


   Rejected::insert(array(
       'transaction_id' => $transaction_id,
       'from_id' => Auth::id(),
       'to_id' => $request->creator_id,
       'reason' => $rejection_reason,
       'notif' => 0
   ));

   Transaction::where('id', $transaction_id)->update(array(
       'from_id' => $request->creator_id,
       'destination' => $request->creator_id,
       'notif' => 0
   ));

   $creator_user = User::select('name')->where('id', $request->creator_id)->first();
   $department = User::select('department')->where('id', $request->creator_id)->first();

   TrackingLog::insert(array(
       'transaction_id' => $transaction_id,
       'from_id' => $request->from_id,
       'to_id' => $request->creator_id,
       'title' => 'Rejection',
       'department' => $department->department,
       'short_description' => Auth::user()->name." has rejected this transaction and was sent back to ".$creator_user->name,
       'updated_at' => Carbon::now()
   ));
}

   public function rejectNotification(){
      dd(Rejected::where('notif', 0)->update(array(
         'notif' => 1,
         'updated_at' => now()
      )));
      
      return response() -> json([
         'status_code' => 1
      ]);
    
   } 

}

