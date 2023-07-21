<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\Transaction;

class LogController extends Controller
{
   public function documentlog(){
        $logs=Log::orderby('created_at','desc')->paginate(10);

        
        return view('Admin.Log.document',[
              'logs'=>$logs
        ]);
    }
     public function viewlog(Request $request){
        $transaction=Transaction::where('id',  $request->id)->first();
        return view('Admin.Log.view',[
            'transaction'=>$transaction
        ]);
    }
    
}
