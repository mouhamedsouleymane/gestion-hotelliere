<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::paginate(12);
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|unique:rooms',
            'type' => 'required',
            'price' => 'required|numeric',
            'status' => 'required|in:available,occupied,maintenance'
        ]);

        Room::create($request->all());
        return redirect()->route('rooms.index')->with('success', 'Chambre créée avec succès');
    }

    public function show(Room $room)
    {
        $room->load('reservations.client');
        return view('rooms.show', compact('room'));
    }

    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'number' => 'required|unique:rooms,number,' . $room->id,
            'type' => 'required',
            'price' => 'required|numeric',
            'status' => 'required|in:available,occupied,maintenance'
        ]);

        $room->update($request->all());
        return redirect()->route('rooms.index')->with('success', 'Chambre mise à jour');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Chambre supprimée');
    }
}
