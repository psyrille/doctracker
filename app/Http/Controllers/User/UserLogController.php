<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserLogController extends Controller
{

     public function userdocumentlog(){
        
        $logs=Log::where('id',  $request->id)->first();
        return view('User.Log.document',[
            'log'=>$log
        ]);
    }
}
