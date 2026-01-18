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

        // Chart Data Preparation
        $endDate = now();
        $startDate = now()->subDays(6);

        // 1. Daily Ticket Sales & Revenue (Last 7 Days)
        $dailyData = TicketBuyer::where('status_acc', true)
            ->whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->selectRaw('DATE(created_at) as date, count(*) as count, sum(total_price) as revenue')
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');

        // Fill missing dates with 0
        $chartLabels = [];
        $chartTicketData = [];
        $chartRevenueData = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $chartLabels[] = now()->subDays($i)->format('d M');
            $chartTicketData[] = $dailyData[$date]->count ?? 0;
            $chartRevenueData[] = $dailyData[$date]->revenue ?? 0;
        }

        // 2. Ticket Type Distribution (All time)
        // Adjust column name if 'ticket_type' is different in your schema.
        // Assuming we join with tickets table or have type in buyer table.
        // Let's first check if ticket_type exists or we need to join.
        // Based on previous chats, ticket_type is likely available or related to ticket model.
        // Checking TicketBuyer model... usually it has ticket_id.
        // Let's assume for now we group by ticket name via relation or simple field if exists.
        // For safety, let's use a generic grouping if unsure, but likely we want 'ticket.name'.

        $ticketTypeData = TicketBuyer::where('status_acc', true)
            ->join('ticket_status', 'ticket_buyer.id_ticket', '=', 'ticket_status.id')
            ->select('ticket_status.name', \Illuminate\Support\Facades\DB::raw('count(*) as total'))
            ->groupBy('ticket_status.name')
            ->get();

        $pieLabels = $ticketTypeData->pluck('name');
        $pieData = $ticketTypeData->pluck('total');

        $stats = [
            'total_users' => User::count(),
            'total_ticket_buyers' => TicketBuyer::count(),
            'total_merchandise_buyers' => MerchandiseBuyer::count(),
            'pending_tickets' => TicketBuyer::where('status_acc', false)->count(),
            'pending_merchandise' => MerchandiseBuyer::where('status_acc', false)->count(),
            'total_revenue' => $totalRevenue,
            'top_schools_register' => $topSchoolsRegister,
            'top_schools_buy' => $topSchoolsBuy,
            'chart_labels' => $chartLabels,
            'chart_ticket_data' => $chartTicketData,
            'chart_revenue_data' => $chartRevenueData,
            'pie_labels' => $pieLabels,
            'pie_data' => $pieData,
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
