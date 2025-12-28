<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['client', 'room'])
            ->where('status', 'confirmed')
            ->orWhere('status', 'completed')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('invoices.index', compact('reservations'));
    }

    public function show(Reservation $reservation)
    {
        return view('invoices.show', compact('reservation'));
    }

    public function download(Reservation $reservation)
    {
        $pdf = Pdf::loadView('invoices.pdf', compact('reservation'));

        return $pdf->download('facture-' . $reservation->id . '.pdf');
    }
}