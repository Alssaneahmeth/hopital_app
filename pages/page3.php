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
                        <a href="rendez-vous.php"><p class="menu-description">Consultez et gérez vos rendez-vous</p></a>
                        
                    </div>
                    <div class="menu-arrow">→</div>
                </li>
                
                <li class="menu-item">
                    <div class="menu-icon">💬</div>
                    <div class="menu-content">
                         <h2 class="menu-title">MES CONSULTATIONS</h2>
                       <a href="consultation.php"><p class="menu-description">Accédez à vos consultations passées</p></a>
                        
                    </div>
                    <div class="menu-arrow">→</div>
                </li>
                
                <li class="menu-item">
                    <div class="menu-icon">🧾</div>
                    <div class="menu-content">
                        <h2 class="menu-title">FACTURES</h2>
                        <a href="facture.php"><p class="menu-description">Téléchargez et consultez vos factures</p></a>
                        
                    </div>
                    <div class="menu-arrow">→</div>
                </li>
                
                <li class="menu-item">
                    <div class="menu-icon">ℹ️</div>
                    <div class="menu-content">
                        <h2 class="menu-title">MES INFORMATIONS</h2>
                       <a href="information.php">  <p class="menu-description">Modifiez vos informations personnelles</p></a>
                       
</div>
                </li>
            </ul>
        </nav>

        <!-- Section de contenu -->
        <main class="content">
        </main>

        <!-- Pied de page -->
        <footer class="footer">
            <p>© 2025 Espace Personnel - Tous droits réservés</p>
        </footer>
    </div>

    <script>
        // Script pour la navigation dans le menu
        /*document.addEventListener('DOMContentLoaded', function() {
            const menuItems = document.querySelectorAll('.menu-item');
            const contentTitle = document.getElementById('content-title');
            const contentSubtitle = document.getElementById('content-subtitle');
            
            menuItems.forEach(item => {
                item.addEventListener('click', function() {
                    // Retirer la classe active de tous les éléments
                    menuItems.forEach(i => i.classList.remove('active'));
                    
                    // Ajouter la classe active à l'élément cliqué
                    this.classList.add('active');
                    
                    // Récupérer le titre et la description de l'élément cliqué
                    const title = this.querySelector('.menu-title').textContent;
                    const description = this.querySelector('.menu-description').textContent;
                    
                    // Mettre à jour le contenu
                    contentTitle.textContent = title;
                    contentSubtitle.textContent = description;
                });
            });
        });*/
    </script>
</body>
</html>