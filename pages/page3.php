<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id_patient'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Personnel - Menu</title>
 <link rel="stylesheet" href="page3.css">
</head>
<body>
    <div class="container">
        <!-- En-tête -->
        <header class="header">
            <h1><span class="welcome-icon">👤</span> BIENVENUE DANS VOTRE ESPACE PERSONNEL</h1>
        </header>

        <!-- Menu principal -->
        <nav class="menu-container">
            <ul class="menu">
                <li class="menu-item active">
                    <div class="menu-icon">📅</div>
                    <div class="menu-content">
                        <h2 class="menu-title">MES RENDEZ-VOUS</h2>
                        <p class="menu-description">
                            <a href="rendez-vous.php">Consultez et gérez vos rendez-vous</a>
                        </p>
                    </div>
                    <div class="menu-arrow">→</div>
                </li>
                
                <li class="menu-item">
                    <div class="menu-icon">💬</div>
                    <div class="menu-content">
                        <h2 class="menu-title">MES CONSULTATIONS</h2>
                        <p class="menu-description">
                            <a href="consultation.php">Accédez à vos consultations passées</a>
                        </p>
                    </div>
                    <div class="menu-arrow">→</div>
                </li>
                
                <li class="menu-item">
                    <div class="menu-icon">🧾</div>
                    <div class="menu-content">
                        <h2 class="menu-title">FACTURES</h2>
                        <p class="menu-description">
                            <a href="facture.php">Téléchargez et consultez vos factures</a>
                        </p>
                    </div>
                    <div class="menu-arrow">→</div>
                </li>
                
                <li class="menu-item">
                    <div class="menu-icon">ℹ️</div>
                    <div class="menu-content">
                        <h2 class="menu-title">MES INFORMATIONS</h2>
                        <p class="menu-description">
                            <a href="information.php">Modifiez vos informations personnelles</a>
                        </p>
                    </div>
                    <div class="menu-arrow">→</div>
                </li>
            </ul>
        </nav>

        <!-- Section de contenu -->
        <main class="content">
            <!-- Le contenu des pages liées s'affichera ici -->
        </main>

        <!-- Pied de page -->
        <footer class="footer">
            <p>© 2025 Espace Personnel - Tous droits réservés</p>
        </footer>
    </div>

    <script>
        // Script pour mettre en surbrillance l'élément du menu actif
        document.addEventListener('DOMContentLoaded', function() {
            const menuItems = document.querySelectorAll('.menu-item');
            
            menuItems.forEach(item => {
                const link = item.querySelector('a');
                if (link) {
                    // Ajouter un événement de clic sur le lien
                    link.addEventListener('click', function(e) {
                        // Retirer la classe active de tous les éléments
                        menuItems.forEach(i => i.classList.remove('active'));
                        
                        // Ajouter la classe active à l'élément parent
                        item.classList.add('active');
                    });
                    
                    // Ajouter aussi l'événement de clic sur l'élément entier
                    item.addEventListener('click', function(e) {
                        if (!e.target.closest('a')) {
                            const link = this.querySelector('a');
                            if (link) {
                                link.click();
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>