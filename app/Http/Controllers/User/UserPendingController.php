<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_transaction;
use Auth;


class UserPendingController extends Controller
{
     public function userpendingtransaction(Request $request){
        $user_transactions=User_transaction::orderby('created_at','desc')
                                            ->with('destinations')
                                            ->where('destination',Auth::user()->id)
                                            ->paginate(10);

        

        return view('User.Transaction.pending',[
              'transactions'=>$user_transactions
        ]);
    }
}
