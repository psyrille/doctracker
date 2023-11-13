<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class LogController extends Controller
{
   public function documentlog(Request $request){
         $logs=Log::where('id',  $request->id)->first();
        
        return view('Admin.Log.document',[
              'logs'=>$logs
        ]);
    }
    
     
    
}
