<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Approved;

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
      
        $approved = Approved::select('*')
        ->join('transactions', 'transactions.id', '=', 'approved.transaction_id')
        ->get();

        return view('Admin.Dashboard.view-approved', compact('approved'));
       
    }
}
