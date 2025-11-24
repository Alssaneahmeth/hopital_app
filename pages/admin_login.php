<?php
session_start();
try {
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=pfa;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur de connexion à la base de données');
}

$error_message = "";

if (isset($_POST['admin_login'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_message = "Email invalide";
        } else {
            // Vérifier dans la table admin
            $recupAdmin = $bdd->prepare('SELECT * FROM admin WHERE email = ?');
            $recupAdmin->execute(array($email));
            
            if ($recupAdmin->rowCount() > 0) {
                $admin = $recupAdmin->fetch();
                
               if (password_verify($password, $admin['password'])){
                    $_SESSION['admin_id'] = $admin['id'];
                    $_SESSION['admin_email'] = $admin['email'];
                    $_SESSION['admin_nom'] = $admin['nom'];
                    $_SESSION['admin_role'] = $admin['role'];
                    
                    header('Location: admin_dashboard.php');
                    exit;
               } else {
                    $error_message = "Mot de passe incorrect";
                }
            } else {
                $error_message = "Accès non autorisé";
            }
        }
    } else {
        $error_message = "Veuillez remplir tous les champs";
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
    </div>
  </div>
</body>
</html>