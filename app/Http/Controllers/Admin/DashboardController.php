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
        // Revenue Calculation
        $ticketRevenue = TicketBuyer::where('status_acc', true)->sum('total_price');
        $merchRevenue = MerchandiseBuyer::where('merchandise_buyer.status_acc', true) // Specify table to avoid ambiguity if joined
            ->join('merchandise_product', 'merchandise_buyer.id_product', '=', 'merchandise_product.id')
            ->sum('merchandise_product.price');

        $totalRevenue = $ticketRevenue + $merchRevenue;

        // Top 5 Schools by User Registration
        $topSchoolsRegister = User::select('asal_sekolah', \Illuminate\Support\Facades\DB::raw('count(*) as total'))
            ->whereNotNull('asal_sekolah')
            ->where('asal_sekolah', '!=', '')
            ->groupBy('asal_sekolah')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        // Top 5 Schools by Ticket Purchase (Approved)
        $topSchoolsBuy = TicketBuyer::where('ticket_buyer.status_acc', true)
            ->join('users', 'ticket_buyer.id_user', '=', 'users.id')
            ->select('users.asal_sekolah', \Illuminate\Support\Facades\DB::raw('count(*) as total'))
            ->whereNotNull('users.asal_sekolah')
            ->where('users.asal_sekolah', '!=', '')
            ->groupBy('users.asal_sekolah')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $stats = [
            'total_users' => User::count(),
            'total_ticket_buyers' => TicketBuyer::count(),
            'total_merchandise_buyers' => MerchandiseBuyer::count(),
            'pending_tickets' => TicketBuyer::where('status_acc', false)->count(),
            'pending_merchandise' => MerchandiseBuyer::where('status_acc', false)->count(),
            'total_revenue' => $totalRevenue,
            'top_schools_register' => $topSchoolsRegister,
            'top_schools_buy' => $topSchoolsBuy,
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
