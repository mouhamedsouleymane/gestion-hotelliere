<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run()
    {
        $clients = [
            [
                'name' => 'Jean Dupont',
                'email' => 'jean.dupont@email.com',
                'phone' => '0123456789',
                'address' => '123 rue de Paris',
            ],
            [
                'name' => 'Marie Martin',
                'email' => 'marie.martin@email.com',
                'phone' => '0987654321',
                'address' => '456 avenue des Champs',
            ],
            [
                'name' => 'Pierre Bernard',
                'email' => 'pierre.bernard@email.com',
                'phone' => '0678912345',
                'address' => '789 boulevard Victor Hugo',
            ]
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}
