<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function newtransaction(){
        return view('Admin.Transaction.new');
    }
    public function storetransaction(Request $request){
        $Transactionsave= new Transaction();
        $Transactionsave->fullname = $request->fullname;
        $Transactionsave->contact_number = $request->contact_number;
        $Transactionsave->email_address= $request->email_address;
        $Transactionsave->address = $request->address;
        $Transactionsave->name_of_document = $request->name_of_document;
        $Transactionsave->short_description = $request->short_description;
        $Transactionsave->purpose = $request->purpose;

        if($Transactionsave->save()) {
             return redirect()->back()->withErrors('Successfully Saved!');
        }
    }
}
