<?php

namespace App\Http\Controllers;

use App\Models\Approved;
use App\Models\TrackingLog;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class PendingController extends Controller
{
	 public function edittransaction(Request $request){
	 	$transactions=Transaction::where('id',$request->id)->first();

        return view('Admin.Transaction.update',[
              'transaction'=>$transactions
        ]);
    }
    public function pendingtransaction(){
        $transactions=Transaction::orderby('created_at','desc')->with('destinations')->paginate(10);


     
        return view('Admin.Transaction.pending',[
              'transactions'=>$transactions
        ]);
    }
    public function updatetransaction(Request $request){
       

        $Updatesave=Transaction::where('id',$request->id)->first();
        $Updatesave->transaction_code = $request->transaction_code;
        $Updatesave->fullname = $request->fullname;
        $Updatesave->contact_number = $request->contact_number;
        $Updatesave->email_address= $request->email_address;
        $Updatesave->address = $request->address;
        $Updatesave->title = $request->title;
        $Updatesave->destination = $request->destination;
        $Updatesave->purpose = $request->purpose;
        $Updatesave->short_description = $request->short_description;

        if($Updatesave->update()) { 
            return redirect()->back()->withErrors('Updated!');
        }
    }
     public function deletetransaction(Request $request){
        

        $Deletesave=Transaction::where('id',$request->id)->first();
        $Deletesave->transaction_code = $request->transaction_code;
        $Deletesave->fullname = $request->fullname;
        $Deletesave->contact_number = $request->contact_number;
        $Deletesave->email_address= $request->email_address;
        $Deletesave->address = $request->address;
        $Deletesave->title = $request->title;
        $Deletesave->destination = $request->destination;
        $Deletesave->purpose = $request->purpose;
        $Deletesave->short_description = $request->short_description;

        if($Deletesave->delete()) { 
            return redirect()->back()->withErrors('Deleted!');
        }
    }


    public function viewPending(){
        // Kuhaa ang mga transactions nga ang destination kay ang ID sa aktibong user
        $transactions = Transaction::select('*','users.department','transactions.id as t_id')
        ->where('destination', Auth::id())
        ->where('status', 'pending')
        ->join('users', 'users.id', '=', 'transactions.from_id')
        ->get();

        $users = User::select('*')->where('id', '!=', 1)->where('id', '!=', Auth::id())->get();

        // I-display o gamita ang mga transactions
   
      
        return view('Admin.Transaction.pending', compact('transactions', 'users'));
    }
    

    public function approveTransaction(Request $request){
        $id = $request->id;
        $receiver = $request->receiver;

      
        Transaction::where('id',$id)->update(array(
          'destination' => $request->to_destination,
          'from_id' => Auth::id(),
          'updated_at' => now()
        ));

        Approved::insert(array(
          'transaction_id' => $id,  
          'from_id' => Auth::id(),
          'to_id' => $request->to_destination,
          'notif' => 0,
          'updated_at' => now()
        ));

        if($receiver == null){
          TrackingLog::insert(array(
            'transaction_id' => $id,
            'from_id' => Auth::id(),
            'to_id' => $request->to_destination,
            'title' => 'Approval',
            'short_description' => Str::title(Auth::user()->name). ' approved and was sent to '. Str::title($request->to_name),
            'department' => $request->to_department,
            'updated_at' => Carbon::now()
          ));
        }else{
          TrackingLog::insert(array(
            'transaction_id' => $id,
            'from_id' => Auth::id(),
            'to_id' => $request->to_destination,
            'title' => 'Approval',
            'short_description' => Str::title(Auth::user()->name). '('.$receiver.') approved and was sent to '. Str::title($request->to_name),
            'department' => $request->to_department,
            'updated_at' => Carbon::now()
          ));
        }
        

        

        return response()->json([
          'status_code' => 1
        ]);
    
    }

}

