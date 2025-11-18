<?php
session_start();
try {
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=pfa;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}

$error_message = "";

if (isset($_POST['se_connecter'])) {
    if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['poste'])) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];
        $poste = htmlspecialchars($_POST['poste']);
      
        // Vérifier la validité de l'email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_message = "Adresse email invalide.";
        } else {
            $recupUser = $bdd->prepare('SELECT * FROM personnelle WHERE email = ? AND poste = ?');
            $recupUser->execute(array($email, $poste));
            
            if ($recupUser->rowCount() > 0) {
                $user = $recupUser->fetch();
                
                // Vérifier si le mot de passe est défini
                if (empty($user['password']) || $user['password'] === NULL) {
                    $error_message = "Erreur: Aucun mot de passe défini pour cet utilisateur.";
                } else {
                    // Vérification du mot de passe
                    if (password_verify($password, $user['password'])){
                        $_SESSION['id_personnelle'] = $user['id_personnelle'];
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['nom'] = $user['Nom'];
                        $_SESSION['prenom'] = $user['prenom'];
                        $_SESSION['poste'] = $user['poste'];
                        
                        // Redirection vers l'espace personnel (à créer)
                        header('Location: espace_personnel.php');
                        exit;
                    } else {
                        $error_message = "Mot de passe incorrect.";
                    }
                }
            } else {
                $error_message = "Aucun compte trouvé avec ces identifiants.";
            }
        }
    } else {
        $error_message = "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <div class="container">
    <fieldset>
      <p>LOGIN</p>
      <form name="login" action="" method="post">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="texte" name="poste" placeholder="Poste" required><br>
        <button type="submit" name="se_connecter">Se connecter</button>
      </form>
    </fieldset>
    <div class="nav2">
      <p>Je suis nouveau ?</p>
      <a href="inscription.php"><em>Demandr un compte</em></a>
    </div>
  </div>
</body>
</html>