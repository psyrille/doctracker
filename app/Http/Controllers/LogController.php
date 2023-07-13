<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class LogController extends Controller
{
   public function documentlog(){
        $logs=Log::orderby('created_at','desc')->paginate(10);

        
        return view('Admin.Log.document',[
              'logs'=>$logs
        ]);
    }
    
    // public function storetransaction(Request $request){
    //     $Transactionsave= new Transaction();
    //     $Transactionsave->fullname = $request->fullname;
    //     $Transactionsave->contact_number = $request->contact_number;
    //     $Transactionsave->email_address= $request->email_address;
    //     $Transactionsave->address = $request->address;
    //     $Transactionsave->name_of_document = $request->name_of_document;
    //     $Transactionsave->short_description = $request->short_description;
    //     $Transactionsave->purpose = $request->purpose;

    //     if($Transactionsave->save()) {
    //          return redirect()->back()->withErrors('Successfully Saved!');
    //     }
    // }
}
