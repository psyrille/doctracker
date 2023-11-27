<?php

namespace App\Http\Controllers;

use App\Models\Approved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApprovedController extends Controller
{
    public function index()
    {
        $approved_transactions = Approved::all();

        return view('Admin.Transaction.approved', compact('approved_transactions'));
    }

    public function statuss(Approved $approved)
    {
        $approved->update(['status' => 'approved']);

        // You can add further logic here (e.g., send notifications)

        return redirect()->route('approved.status   ')->with('success', 'Post approved successfully.');
    }

    public function viewApproved(){
      
        $userId = Auth::id();

        // Kuhaa ang mga transactions nga ang destination kay ang ID sa aktibong user
        $transactions = Approved::select('t.*','users.name as u_name')
        ->join('transactions as t','t.id', '=', 'approved.transaction_id')
        ->join('users', 'users.id', '=', 'approved.to_id')
        ->where('approved.from_id', Auth::id())->get();
        ;


        // I-display o gamita ang mga transactions
      
        return view('Admin.Transaction.approved', compact('transactions'));
       
    }

    public function approvedNotification(){

        Approved::where('notif', 0)->update(array(
            'notif' => 1
        ));

        return response() -> json([
            'status_code' =>1
        ]);
    }

    
}