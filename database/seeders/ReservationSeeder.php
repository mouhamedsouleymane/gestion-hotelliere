<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    public function run()
    {
        $reservations = [
            [
                'client_id' => 1,
                'room_id' => 1,
                'check_in' => now(),
                'check_out' => now()->addDays(3),
                'status' => 'confirmed',
                'total_price' => 300.00,
                'notes' => 'Réservation standard',
            ],
            [
                'client_id' => 2,
                'room_id' => 2,
                'check_in' => now()->addDays(5),
                'check_out' => now()->addDays(7),
                'status' => 'pending',
                'total_price' => 400.00,
                'notes' => 'Demande spéciale petit-déjeuner',
            ],
            [
                'client_id' => 3,
                'room_id' => 3,
                'check_in' => now()->addDays(2),
                'check_out' => now()->addDays(4),
                'status' => 'confirmed',
                'total_price' => 450.00,
                'notes' => 'Famille avec enfants',
            ]
        ];

        foreach ($reservations as $reservation) {
            Reservation::create($reservation);
        }
    }
}