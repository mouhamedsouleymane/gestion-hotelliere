<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Reservation;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        $stats = [
            'rooms' => [
                'total' => Room::count(),
                'available' => Room::where('status', 'available')->count(),
                'occupied' => Room::where('status', 'occupied')->count(),
                'maintenance' => Room::where('status', 'maintenance')->count(),
            ],
            'reservations' => [
                'total' => Reservation::count(),
                'confirmed' => Reservation::where('status', 'confirmed')->count(),
                'pending' => Reservation::where('status', 'pending')->count(),
                'completed' => Reservation::where('status', 'completed')->count(),
                'monthly' => Reservation::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                    ->whereYear('created_at', date('Y'))
                    ->groupBy('month')
                    ->pluck('count', 'month'),
                'revenue_monthly' => Reservation::selectRaw('MONTH(created_at) as month, SUM(total_price) as revenue')
                    ->whereYear('created_at', date('Y'))
                    ->groupBy('month')
                    ->pluck('revenue', 'month')
            ],
            'clients' => Client::count(),
            'employees' => [
                'total' => Employee::count(),
                'by_department' => Employee::selectRaw('department, COUNT(*) as count')
                    ->groupBy('department')
                    ->pluck('count', 'department')
            ]
        ];

        return view('statistics.index', compact('stats'));
    }
}