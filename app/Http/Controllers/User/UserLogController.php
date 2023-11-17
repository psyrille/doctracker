<?php

namespace App\Http\Controllers\User;

use App\Models\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserLogController extends Controller
{

     public function userdocumentlog(){
        
        $logs=Log::where('id',  $request->id)->first();
        return view('User.Log.document',[
            'log'=>$log
        ]);
    }
}
