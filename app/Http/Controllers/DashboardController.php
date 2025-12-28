<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Client;
use App\Models\Reservation;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = Cache::remember('dashboard_stats', 300, function () {
            $rooms_total = Room::count();
            $rooms_occupied = Room::where('status', 'occupied')->count();
            $occupation_rate = $rooms_total > 0 ? ($rooms_occupied / $rooms_total) * 100 : 0;

            return [
                'rooms_total' => $rooms_total,
                'rooms_available' => Room::where('status', 'available')->count(),
                'rooms_occupied' => $rooms_occupied,
                'clients_total' => Client::count(),
                'reservations_month' => Reservation::whereMonth('created_at', now()->month)->count(),
                'revenue_month' => Reservation::whereMonth('created_at', now()->month)->sum('total_price'),
                'occupation_rate' => $occupation_rate,
                'recent_reservations' => Reservation::with(['client:id,name', 'room:id,number'])
                    ->latest()
                    ->take(5)
                    ->get(['id', 'client_id', 'room_id', 'check_in', 'status'])
            ];
        });

        return view('dashboard', compact('stats'));
    }
}
