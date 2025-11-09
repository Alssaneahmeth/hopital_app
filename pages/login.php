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
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];
        
        // Vérifier la validité de l'email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_message = "Adresse email invalide.";
        } else {
            $recupUser = $bdd->prepare('SELECT * FROM patient WHERE email = ?');
            $recupUser->execute(array($email));
            
            if ($recupUser->rowCount() > 0) {
                $user = $recupUser->fetch();
                
                // Vérifier si le mot de passe est défini
                if (empty($user['password']) || $user['password'] === NULL) {
                    $error_message = "Erreur: Aucun mot de passe défini pour cet utilisateur.";
                } else {
                    // Vérification du mot de passe
                    if (password_verify($password, $user['password'])){
                        $_SESSION['id_patient'] = $user['id_patient'];
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['nom'] = $user['Nom'];
                        $_SESSION['prenom'] = $user['prenom'];
                        
                        // Redirection vers l'espace patient
                        header('Location: page3.php');
                        exit;
                    } else {
                        $error_message = "Mot de passe incorrect.";
                    }
                }
            } else {
                $error_message = "Aucun compte trouvé avec cet email.";
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
        <button type="submit" name="se_connecter">Se connecter</button>
      </form>
    </fieldset>
    <div class="nav2">
      <p>Je n’ai pas de compte ?</p>
      <a href="inscription.php"><em>S’inscrire</em></a>
    </div>
  </div>
</body>
</html>