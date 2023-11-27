<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Approved;
use App\Models\Rejected;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // $transactions = Transaction::select('users.name', 'transactions.status','transactions.transaction_code','transactions.id')
        // ->join('users', 'users.id', '=', 'transactions.from_id')
        // ->where('status', '=', 'rejected')
        // ->where('notif', 0)
        // ->get();

        

        $transactions = Transaction::select('transactions.*', 'users.department as u_department')
        ->join('users', 'users.id','=','transactions.created_id')
        ->get();
        ;

        $rejected_transactions = Rejected::select('rejected.*')
        ->join('transactions', 'transactions.id', '=', 'rejected.transaction_id')
        ->get();
        
        $notif_transactions = Transaction::select('transactions.*','tl.short_description')
        ->join('tracking_logs as tl','tl.transaction_id','=', 'transactions.id')
        ->where('tl.from_id', '!=', Auth::id())
        ->where('created_id', Auth::id())
        ->get();

        $approved = Approved::select('users.name', 'transactions.transaction_code','transactions.id')
        ->join('transactions', 'transactions.id', '=', 'approved.transaction_id')
        ->join('users', 'users.id', '=', 'approved.from_id')
        ->where('approved.notif', 0)->get();

        $count_approved = Approved::select(DB::raw('COUNT(DISTINCT(transaction_id)) as count'))->first();

        $notif = Transaction::select('notif')->where('created_id',Auth::id())->where('notif', 1)->get();

        $notif_approved = Approved::select('*')->where('notif', 0)->get();
        $count_reject = Rejected::select(DB::raw('COUNT(*) as count'))->where('to_id', Auth::id())->first();

        return view('.Admin.Dashboard.index', compact( 'notif', 'approved', 'notif_approved','count_reject','count_approved','transactions','notif_transactions'));
    }

    public function notification(Request $request){
        Transaction::where('notif', 1)->where('created_id',Auth::id())->update(array(
            'notif' => 0
        ));

        return response()->json([
            'status_code' => 1
        ]);
    }
}
