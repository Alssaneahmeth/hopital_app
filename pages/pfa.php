<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Hôpital SANTE SENEGAL</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .hospital-header {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
        }
        .form-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .btn-hospital {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            border: none;
        }
        .btn-hospital:hover {
            background: linear-gradient(135deg, #0056b3, #004085);
            color: white;
        }
    </style>
</head>
<body class="bg-light">
    <!-- Header -->
    <header class="hospital-header py-4 mb-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 text-center">
                    <h1 class="display-4 fw-bold">
                        <i class="bi bi-hospital me-3"></i>
                        Hôpital SANTE SENEGAL
                    </h1>
                    <p class="lead mb-0">Formulaire d'inscription patient</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Formulaire d'inscription -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="form-container p-4 p-md-5">
                    <div class="text-center mb-4">
                        <h2 class="text-primary fw-bold">
                            <i class="bi bi-person-plus-fill me-2"></i>
                            Créer votre compte
                        </h2>
                        <p class="text-muted">Remplissez soigneusement le formulaire d'inscription</p>
                    </div>

                    <form method="POST" name="inscription">
                        <!-- Informations personnelles -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary border-bottom pb-2">
                                    <i class="bi bi-person-vcard me-2"></i>
                                    Informations personnelles
                                </h5>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="Nom" class="form-label required-field">Nom</label>
                                <input type="text" class="form-control" id="Nom" name="Nom" placeholder="Votre nom" required 
                                       value="<?php echo isset($_POST['Nom']) ? htmlspecialchars($_POST['Nom']) : ''; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="prenom" class="form-label required-field">Prénom</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Votre prénom" required
                                       value="<?php echo isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : ''; ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="sexe" class="form-label required-field">Sexe</label>
                                <select class="form-select" id="sexe" name="sexe" required>
                                    <option value="">Sélectionnez votre sexe</option>
                                    <option value="Masculin" <?php echo (isset($_POST['sexe']) && $_POST['sexe'] == 'Masculin') ? 'selected' : ''; ?>>Masculin</option>
                                    <option value="Féminin" <?php echo (isset($_POST['sexe']) && $_POST['sexe'] == 'Féminin') ? 'selected' : ''; ?>>Féminin</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="date_de_naissance" class="form-label required-field">Date de Naissance</label>
                                <input type="date" class="form-control" id="date_de_naissance" name="date_de_naissance" required
                                       value="<?php echo isset($_POST['date_de_naissance']) ? $_POST['date_de_naissance'] : ''; ?>">
                            </div>
                        </div>

                        <!-- Adresse -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary border-bottom pb-2">
                                    <i class="bi bi-geo-alt me-2"></i>
                                    Adresse
                                </h5>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="region" class="form-label required-field">Région</label>
                                <input type="text" class="form-control" id="region" name="region" placeholder="Votre région" required
                                       value="<?php echo isset($_POST['region']) ? htmlspecialchars($_POST['region']) : ''; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="ville" class="form-label required-field">Ville</label>
                                <input type="text" class="form-control" id="ville" name="ville" placeholder="Votre ville" required
                                       value="<?php echo isset($_POST['ville']) ? htmlspecialchars($_POST['ville']) : ''; ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="quartier" class="form-label required-field">Quartier</label>
                                <input type="text" class="form-control" id="quartier" name="quartier" placeholder="Votre quartier" required
                                       value="<?php echo isset($_POST['quartier']) ? htmlspecialchars($_POST['quartier']) : ''; ?>">
                            </div>
                        </div>

                        <!-- Coordonnées -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary border-bottom pb-2">
                                    <i class="bi bi-telephone me-2"></i>
                                    Coordonnées
                                </h5>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="email" class="form-label required-field">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="votre@email.com" required
                                           value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="password" class="form-label required-field">Mot de passe</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe" required minlength="4">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="telephone1" class="form-label required-field">Téléphone principal</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-phone"></i></span>
                                    <input type="tel" class="form-control" id="telephone1" name="telephone1" placeholder="+221 XX XXX XX XX" required
                                           value="<?php echo isset($_POST['telephone1']) ? htmlspecialchars($_POST['telephone1']) : ''; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="telephone2" class="form-label">Téléphone secondaire</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-telephone-plus"></i></span>
                                    <input type="tel" class="form-control" id="telephone2" name="telephone2" placeholder="+221 XX XXX XX XX (optionnel)"
                                           value="<?php echo isset($_POST['telephone2']) ? htmlspecialchars($_POST['telephone2']) : ''; ?>">
                                </div>
                            </div>
                        </div>

                        <!-- Bouton de soumission -->
                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="submit" name="soumettre" class="btn btn-hospital btn-lg px-5 py-2">
                                    <i class="bi bi-person-check me-2"></i>
                                    S'inscrire
                                </button>
                            </div>
                        </div>

                        <!-- Lien vers connexion -->
                        <div class="row mt-4">
                            <div class="col-12 text-center">
                                <p class="mb-0">
                                    Déjà inscrit ? 
                                    <a href="login.php" class="text-decoration-none fw-bold">
                                        <i class="bi bi-box-arrow-in-right me-1"></i>
                                        Connectez-vous ici
                                    </a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white mt-5 py-4">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-0">&copy; 2024 Hôpital SANTE SENEGAL. Tous droits réservés.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!--la page login bootstrap>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion - Hôpital SANTE SENEGAL</title>
  <!-- Bootstrap CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
  <style>
    .hospital-header {
        background: linear-gradient(135deg, #007bff, #0056b3);
        color: white;
    }
    .login-container {
        max-width: 400px;
        margin: 0 auto;
    }
    .card-login {
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    .btn-hospital {
        background: linear-gradient(135deg, #007bff, #0056b3);
        color: white;
        border: none;
    }
    .btn-hospital:hover {
        background: linear-gradient(135deg, #0056b3, #004085);
        color: white;
    }
    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
  </style>
</head>
<body>
    <!-- Header -->
    <header class="hospital-header py-4 mb-4 fixed-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 text-center">
                    <h1 class="h3 fw-bold mb-0">
                        <i class="bi bi-hospital me-2"></i>
                        Hôpital SANTE SENEGAL
                    </h1>
                </div>
            </div>
        </div>
    </header>

    <!-- Formulaire de connexion -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card card-login">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <h3 class="card-title text-primary fw-bold">
                                <i class="bi bi-person-circle me-2"></i>
                                Connexion
                            </h3>
                            <p class="text-muted">Accédez à votre espace patient</p>
                        </div>

                        <?php if (!empty($error_message)): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            <?php echo htmlspecialchars($error_message); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        <?php endif; ?>

                        <form name="login" action="" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Adresse email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    <input type="email" class="form-control" id="email" name="email" 
                                           placeholder="votre@email.com" required 
                                           value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">Mot de passe</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    <input type="password" class="form-control" id="password" name="password" 
                                           placeholder="Votre mot de passe" required>
                                </div>
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" name="se_connecter" class="btn btn-hospital btn-lg">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>
                                    Se connecter
                                </button>
                            </div>

                            <div class="text-center">
                                <p class="mb-0">
                                    Pas encore de compte ?
                                    <a href="inscription.php" class="text-decoration-none fw-bold">
                                        <i class="bi bi-person-plus me-1"></i>
                                        Inscrivez-vous ici
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white mt-auto py-3">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-0 small">&copy; 2024 Hôpital SANTE SENEGAL. Tous droits réservés.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>