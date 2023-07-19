<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function newtransaction(){
        return view('Admin.Transaction.new');
    }
    public function storetransaction(Request $request){
        $Transactionsave= new Transaction();

        $count = Transaction::orderby('created_at', 'desc')
                            ->whereYear('created_at',Carbon::now()->format('Y'))
                            ->first();

        if($count){
             $lastdigit = substr( $count->transaction_code, -4);
        }else{
            $lastdigit = Transaction::whereYear('created_at',Carbon::now()->format('Y'))
                            ->count();
        }

        $temptrans= "BLGU-".Carbon::now()->format('Y').str_pad($lastdigit +1, 4, '0', STR_PAD_LEFT); 

        $Transactionsave->transaction_code = $temptrans;
        $Transactionsave->fullname = $request->fullname;
        $Transactionsave->contact_number = $request->contact_number;
        $Transactionsave->email_address= $request->email_address;
        $Transactionsave->address = $request->address;
        $Transactionsave->title = $request->title;
        $Transactionsave->destination = $request->destination;
        $Transactionsave->purpose = $request->purpose;
        $Transactionsave->short_description = $request->short_description;

        if($Transactionsave->save()) {
             return redirect()->back()->withErrors('Successfully Saved!');
        }
    }
}
