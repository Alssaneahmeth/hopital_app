<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture - Structure Sanitaire</title>
    <link rel="stylesheet" href="facture.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  
</head>
<body>
    <img src="../image/facture.jpg" alt="logo" >
<div class="facture-container">
    <h1>Facture</h1>
    <div class="info">
        <div class="row"><span>Date : </span><span>09/11/2025</span></div>
        <div class="row"><span>Facture N° : </span><span>2025-001</span></div>
        <div class="row"><span>Patient : </span><span>M. Mamadou Ndiaye</span></div>
        <div class="row"><span>Adresse : </span><span>123 Rue de la Santé, Dakar</span></div>
    </div>
    <table>
        <thead>
        <tr>
            <th>Désignation</th>
            <th>Quantité</th>
            <th>Prix Unitaire</th>
            <th>Montant</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Consultation médicale</td>
            <td>1</td>
            <td>10 000 FCFA</td>
            <td>10 000 FCFA</td>
        </tr>
        <tr>
            <td>Analyse laboratoire</td>
            <td>2</td>
            <td>5 500 FCFA</td>
            <td>11 000 FCFA</td>
        </tr>
        <tr>
            <td>Radiographie</td>
            <td>1</td>
            <td>17 000 FCFA</td>
            <td>17 000 FCFA</td>
        </tr>
        </tbody>
    </table>
    <div class="total-section">
        <span class="total-label">Total à payer :</span>
        <span class="total-amount">38 000 FCFA</span>
    </div>
    <div class="signature">
        <div>Signature :</div>
        <div>_</div>
    </div>
</div>
</body>
</html>