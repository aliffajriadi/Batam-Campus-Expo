<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\TicketBuyer;
use App\Models\MerchandiseBuyer;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'total_ticket_buyers' => TicketBuyer::count(),
            'total_merchandise_buyers' => MerchandiseBuyer::count(),
            'pending_tickets' => TicketBuyer::where('status_acc', false)->count(),
            'pending_merchandise' => MerchandiseBuyer::where('status_acc', false)->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
