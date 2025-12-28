<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Client;
use App\Models\Room;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['client', 'room'])->latest()->paginate(15);
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $clients = Client::all();
        $rooms = Room::where('status', 'available')->get();
        return view('reservations.create', compact('clients', 'rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'total_price' => 'required|numeric'
        ]);

        Reservation::create($request->all());

        // Mettre à jour le statut de la chambre
        Room::find($request->room_id)->update(['status' => 'occupied']);

        return redirect()->route('reservations.index')->with('success', 'Réservation créée avec succès');
    }

    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        $clients = Client::all();
        $rooms = Room::all();
        return view('reservations.edit', compact('reservation', 'clients', 'rooms'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'total_price' => 'required|numeric',
            'status' => 'required|in:pending,confirmed,cancelled,completed'
        ]);

        $reservation->update($request->all());
        return redirect()->route('reservations.index')->with('success', 'Réservation mise à jour');
    }

    public function destroy(Reservation $reservation)
    {
        // Libérer la chambre si nécessaire
        if ($reservation->status !== 'completed') {
            $reservation->room->update(['status' => 'available']);
        }

        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Réservation supprimée');
    }
}