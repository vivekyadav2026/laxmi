<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class AdminPaymentController extends Controller
{
    public function index()
    {
        $payments     = Payment::latest()->paginate(20);
        $totalPaid    = Payment::where('status', 'paid')->count();
        $totalPending = Payment::where('status', 'pending')->count();
        $totalFailed  = Payment::where('status', 'failed')->count();
        $totalRevenue = Payment::where('status', 'paid')->sum('amount');

        return view('admin.payments', compact('payments', 'totalPaid', 'totalPending', 'totalFailed', 'totalRevenue'));
    }
}
