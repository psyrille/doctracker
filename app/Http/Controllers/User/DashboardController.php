<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Approved;
use App\Models\TrackingLog;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   public function index()
    {
        $pending = Transaction::select('id')->where('status','pending')->where('created_id',Auth::id())->count();
        $rejected = Transaction::select('id')->where('status','rejected')->where('destination',Auth::id())->count();
        $approved = Approved::select('id')->where('from_id', Auth::id())->count();
        $notif_transactions = Transaction::select('transactions.*','tl.short_description')
        ->join('tracking_logs as tl','tl.transaction_id','=', 'transactions.id')
        ->where('tl.from_id', '!=', Auth::id())
        ->orwhere('destination', Auth::id())
        ->orwhere('created_id', Auth::id())
        ->get();
        
        $notif = Transaction::select('notif')->where('notif', 1)->where('created_id', Auth::id())->where('destination', Auth::id())->get();
        return view('User.Dashboard.index', compact('pending', 'approved','rejected','notif_transactions','notif'));    
    }

    public function notification(Request $request){
        
        Transaction::where('notif', 1)->where('created_id',Auth::id())->where('destination', Auth::id())->update(array(
            'notif' => 0
        ));

        return response()->json([
            'status_code' => 1
        ]);
    }

   

    public function userViewNewTransaction(){
        $users = User::select('*')->where('id', '!=', Auth::id())->get();
        return view('User.Transaction.new', compact('users'));   
    }

    public function userNewTransaction(Request $request){
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
        $Transactionsave->from_id = Auth::id();
        $Transactionsave->short_description = $request->short_description;
        $Transactionsave->status = "pending";
        $Transactionsave->created_id = Auth::id();
        $Transactionsave->notif = 0;
        

        $Transactionsave->save();
        
        

        if($Transactionsave->save()) {
            $id = Transaction::select('id')->where('transaction_code', $temptrans)->first();
            $to = User::select('name','department')->where('id', $request->destination)->first();
            TrackingLog::insert(array(
                'transaction_id' => $id->id,
                'from_id' => Auth::id(),
                'to_id' => $request->destination,
                'title' => 'New Transaction',
                'short_description' => Str::title(Auth::user()->name). ' created a transaction and was sent to '. Str::title($to->name),
                'department' => $to->department,
                'updated_at' => Carbon::now()
            ));
            return redirect()->back()->withErrors('Successfully Saved!');
        }
    }
}
