<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;



class PendingController extends Controller
{
	 public function edittransaction(Request $request){
	 	$transactions=Transaction::where('id',$request->id)->first();

        return view('Admin.Transaction.update',[
              'transaction'=>$transactions
        ]);
    }
    public function pendingtransaction(){
        $transactions=Transaction::orderby('created_at','desc')->paginate(10);

        
        return view('Admin.Transaction.pending',[
              'transactions'=>$transactions
        ]);
    }
    public function updatetransaction(Request $request){

        $Updatesave=Transaction::where('id',$request->id)->first();
        $Updatesave->fullname = $request->fullname;
        $Updatesave->contact_number = $request->contact_number;
        $Updatesave->email_address= $request->email_address;
        $Updatesave->address = $request->address;
        $Updatesave->name_of_document = $request->name_of_document;
        $Updatesave->short_description = $request->short_description;
        $Updatesave->purpose = $request->purpose;

        if($Updatesave->update()) { 
            return redirect()->back()->withErrors('Updated!');
        }
    }
     public function deletetransaction(Request $request){

        $Deletesave=Transaction::where('id',$request->id)->first();
        $Deletesave->fullname = $request->fullname;
        $Deletesave->contact_number = $request->contact_number;
        $Deletesave->email_address= $request->email_address;
        $Deletesave->address = $request->address;
        $Deletesave->name_of_document = $request->name_of_document;
        $Deletesave->short_description = $request->short_description;
        $Deletesave->purpose = $request->purpose;

        if($Deletesave->delete()) { 
            return redirect()->back()->withErrors('Deleted!');
        }
    }
}

