<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prise de Rendez-vous</title>
  <link rel="stylesheet" href="rendez-vous.css">
</head>
<body>
  <header>
    <h1>Page de Rendez-vous</h1>
  </header>

  <section class="rdv">
  <h2>Prendre un rendez-vous</h2>
  <form id="rdvForm" novalidate>
    <div class="grid">
      <div class="field">
        <label for="patientName">Nom du patient</label>
        <input type="text" id="patientName" name="patientName" placeholder="Ex : Aïcha Diop" required>
        <small class="error"></small>
      </div>

      <div class="field">
        <label for="patientEmail">Email du patient</label>
        <input type="email" id="patientEmail" name="patientEmail" placeholder="Ex : aicha@mail.com" required>
        <small class="error"></small>
      </div>

      <div class="field">
        <label for="doctor">Médecin</label>
        <select id="doctor" name="doctor" required>
          <option value="">— Choisir un médecin —</option>
          <option value="sow">Dr. Sow (Médecine générale)</option>
          <option value="ndiaye">Dr. Ndiaye (Pédiatrie)</option>
          <option value="ba">Dr. Ba (Cardiologie)</option>
        </select>
        <small class="error"></small>
      </div>

      <div class="field">
        <label for="date">Date</label>
        <input type="date" id="date" name="date" required>
        <small class="error"></small>
      </div>

      <div class="field">
        <label for="time">Heure</label>
        <select id="time" name="time" required>
          <option value="">— Choisir une heure —</option>
          <!-- Options dynamiques après sélection du médecin -->
        </select>
        <small class="error"></small>
      </div>

      <div class="field field-rows">
        <label for="reason">Motif</label>
        <textarea id="reason" name="reason" rows="3" placeholder="Ex : Consultation, fièvre, suivi..." required></textarea>
        <small class="error"></small>
      </div>
    </div>

    <button type="submit" class="btn-primary">Enregistrer</button>

    <div id="toast" class="toast" aria-live="polite" aria-atomic="true"></div>
  </form>
</section>

<section class="list">
  <h2>Liste des rendez-vous</h2>

  <div class="filters">
    <input type="text" id="search" placeholder="Rechercher (patient, médecin, motif)…">
    <select id="filterDoctor">
      <option value="">Tous les médecins</option>
      <option value="sow">Dr. Sow</option>
      <option value="ndiaye">Dr. Ndiaye</option>
      <option value="ba">Dr. Ba</option>
    </select>
    <input type="date" id="filterDate">
    <button id="exportCsv" class="btn-secondary">Exporter CSV</button>
  </div>

  <div class="table-wrap">
    <table id="appointments">
      <thead>
        <tr>
          <th>ID</th>
          <th>Patient</th>
          <th>Médecin</th>
          <th>Date</th>
          <th>Heure</th>
          <th>Motif</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Lignes rendues dynamiquement -->
      </tbody>
    </table>
  </div>
</section>
</body>
</html>
