<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run()
    {
        $rooms = [
            [
                'number' => '101',
                'type' => 'Standard',
                'price' => 100.00,
                'status' => 'available',
                'description' => 'Chambre standard avec lit double',
            ],
            [
                'number' => '102',
                'type' => 'Suite',
                'price' => 200.00,
                'status' => 'available',
                'description' => 'Suite luxueuse avec vue',
            ],
            [
                'number' => '103',
                'type' => 'Familiale',
                'price' => 150.00,
                'status' => 'available',
                'description' => 'Chambre familiale avec 2 lits doubles',
            ]
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}
