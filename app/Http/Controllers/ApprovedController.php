<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Approved;

class ApprovedController extends Controller
{
    public function status()
    {
        $approved = Approved::all();

        return view('Admin.Transaction.approved', compact('approved'));
    }

    public function status(Approved $approved)
    {
        $approved->update(['status' => 'approved']);

        // You can add further logic here (e.g., send notifications)

        return redirect()->route('approved.status')->with('success', 'Post approved successfully.');
    }
}
