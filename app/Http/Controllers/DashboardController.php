<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {

        $today = Carbon::now();
        $today_pending_count = User::where(['role' => 1, 'registration_status' => 'Pending'])->whereDate('created_at', today())->count();
        $previous_pending_count = 0;
        $completed_count = User::where(['role' => 1, 'registration_status' => 'Approved'])->count();
        $canceled_count = User::where(['role' => 1, 'registration_status' => 'Cancel'])->count();
        // dd($previous_pending_count);
        return view('dashboard', compact('today_pending_count', 'previous_pending_count', 'completed_count', 'canceled_count'));
    }
}
