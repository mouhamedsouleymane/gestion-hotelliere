<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture #{{ $reservation->id }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            line-height: 1.4;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #333;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .invoice-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .invoice-details {
            text-align: right;
        }

        .client-info {
            margin-bottom: 30px;
        }

        .client-info h3 {
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }

        .text-right {
            text-align: right;
        }

        .total-row {
            font-weight: bold;
            background-color: #f9f9f9;
        }

        .footer {
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            text-align: center;
            font-size: 10px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>FACTURE</h1>
        <p>{{ config('app.name') }} - Hôtel de Gestion</p>
    </div>

    <div class="invoice-info">
        <div class="company-info">
            <strong>{{ config('app.name') }}</strong><br>
            Hôtel de Gestion<br>
            Adresse: [Votre Adresse]<br>
            Téléphone: [Votre Téléphone]<br>
            Email: [Votre Email]
        </div>
        <div class="invoice-details">
            <strong>Facture #{{ $reservation->id }}</strong><br>
            Date: {{ now()->format('d/m/Y') }}<br>
            Statut: {{ ucfirst($reservation->status) }}
        </div>
    </div>

    <div class="client-info">
        <h3>Facturé à:</h3>
        <strong>{{ $reservation->client->name }}</strong><br>
        @if ($reservation->client->email)
            Email: {{ $reservation->client->email }}<br>
        @endif
        @if ($reservation->client->phone)
            Téléphone: {{ $reservation->client->phone }}<br>
        @endif
        @if ($reservation->client->address)
            Adresse: {{ $reservation->client->address }}
        @endif
    </div>

    <table>
        <thead>
            <tr>
                <th>Description</th>
                <th>Chambre</th>
                <th>Arrivée</th>
                <th>Départ</th>
                <th>Nuits</th>
                <th>Prix/Nuit</th>
                <th class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Réservation Chambre</td>
                <td>{{ $reservation->room->number }} - {{ $reservation->room->type }}</td>
                <td>{{ $reservation->check_in->format('d/m/Y') }}</td>
                <td>{{ $reservation->check_out->format('d/m/Y') }}</td>
                <td>{{ $reservation->check_in->diffInDays($reservation->check_out) }}</td>
                <td>{{ number_format($reservation->room->price, 0, ',', ' ') }} FCFA</td>
                <td class="text-right">{{ number_format($reservation->total_price, 0, ',', ' ') }} FCFA</td>
            </tr>
        </tbody>
        <tfoot>
            <tr class="total-row">
                <td colspan="6" class="text-right"><strong>TOTAL:</strong></td>
                <td class="text-right"><strong>{{ number_format($reservation->total_price, 0, ',', ' ') }}
                        FCFA</strong></td>
            </tr>
        </tfoot>
    </table>

    @if ($reservation->notes)
        <div style="margin-bottom: 30px;">
            <strong>Notes:</strong><br>
            {{ $reservation->notes }}
        </div>
    @endif

    <div class="footer">
        <p>Merci pour votre séjour. À bientôt !</p>
        <p>Facture générée le {{ now()->format('d/m/Y à H:i') }}</p>
    </div>
</body>

</html>
