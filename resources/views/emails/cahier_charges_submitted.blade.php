<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouveau Cahier des Charges Soumis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .container {
            width: 600px;
            margin: 20px auto;
        }
        .header,
        .footer {
            text-align: center;
            padding: 10px 0;
        }
        .content {
            padding: 20px;
            background: #f8f8f8;
            border: 1px solid #ddd;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background: #eee;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Nouveau Cahier des Charges Soumis</h2>
        </div>
        <div class="content">
            <p>Cher/Chère {{ $cahierCharges->user->name }},</p>
            <p>Vous avez soumis un nouveau cahier des charges avec les informations suivantes :</p>
            <table>
                <tr>
                    <th>Type de logement</th>
                    <td>{{ $cahierCharges->type_logement }}</td>
                </tr>
                <tr>
                    <th>Lieux de recherche</th>
                    <td>{{ $cahierCharges->lieux_recherche }}</td>
                </tr>
                <tr>
                    <th>Surface Minimale</th>
                    <td>{{ $cahierCharges->surface_min }} m²</td>
                </tr>
                <tr>
                    <th>Budget Maximal</th>
                    <td>{{ $cahierCharges->budget_max }} €</td>
                </tr>
                <!-- Ajoutez plus de lignes ici pour chaque information que vous souhaitez afficher -->
                <tr>
                    <th>Taille</th>
                    <td>{{ $cahierCharges->taille }}</td>
                </tr>
                <tr>
                    <th>Nombre de chambres</th>
                    <td>{{ $cahierCharges->nombre_chambres }}</td>
                </tr>
                <tr>
                    <th>Étage</th>
                    <td>{{ $cahierCharges->etage }}</td>
                </tr>
                <tr>
                    <th>Meublé</th>
                    <td>{{ $cahierCharges->meuble }}</td>
                </tr>
                <tr>
                    <th>Date Limite</th>
                    <td>{{ \Carbon\Carbon::parse($cahierCharges->deadline)->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <th>Style Préféré</th>
                    <td>{{ $cahierCharges->style_prefere }}</td>
                </tr>
                <tr>
                    <th>Autres Détails</th>
                    <td>{{ $cahierCharges->autre_details }}</td>
                </tr>
            </table>
            <p>Ce message est généré automatiquement. Veuillez ne pas répondre directement à cet email.</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} VotreCompagnie. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>
