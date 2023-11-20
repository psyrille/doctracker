<?php

namespace App\Http\Controllers\User;

use App\Models\Approved;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   public function index()
    {
        $pending = Transaction::select('id')->where('status','pending')->where('destination',Auth::id())->count();
        $approved = Approved::select('id')->where('from_id', Auth::id())->count();
        return view('User.Dashboard.index', compact('pending', 'approved'));    
    }
}
