<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::withCount('reservations')->paginate(15);
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        $rooms = Room::where('status', 'available')->get();
        return view('clients.create', compact('rooms'));
    }

    public function show(Client $client)
    {
        $client->load(['reservations.room']);
        return view('clients.show', compact('client'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients',
            'phone' => 'required',
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in'
        ]);

        DB::transaction(function () use ($request) {
            // Créer le client
            $client = Client::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address
            ]);

            // Calculer le prix total
            $room = Room::find($request->room_id);
            $checkIn = \Carbon\Carbon::parse($request->check_in);
            $checkOut = \Carbon\Carbon::parse($request->check_out);
            $nights = $checkIn->diffInDays($checkOut);
            $totalPrice = $nights * $room->price;

            // Créer la réservation
            Reservation::create([
                'client_id' => $client->id,
                'room_id' => $request->room_id,
                'check_in' => $request->check_in,
                'check_out' => $request->check_out,
                'total_price' => $totalPrice,
                'status' => 'confirmed'
            ]);

            // Mettre à jour le statut de la chambre
            $room->update(['status' => 'occupied']);
        });

        return redirect()->route('clients.index')->with('success', 'Client et réservation créés avec succès');
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'phone' => 'required'
        ]);

        $client->update($request->all());
        return redirect()->route('clients.index')->with('success', 'Client mis à jour');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client supprimé');
    }
}
