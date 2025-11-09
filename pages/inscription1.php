<?php
$bdd=new PDO('mysql:host=127.0.0.1;dbname=pfa','root','');
if (isset($_POST['soumettre'])) {

    // Vérifier que tous les champs obligatoires sont remplis
    if (
        !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['sexe']) &&
       !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['poste']) && !empty($_POST['telephone'])
    ) {
        // Récupération des données
        $nom = $_POST['nom'] ?? null;
        $prenom = $_POST['prenom'] ?? null;
        $sexe = $_POST['sexe'] ?? null;
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;
        $poste = $_POST['poste'] ?? null;
        $telephone = $_POST['telephone'] ?? null;
        // Hashage du mot de passe
        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
        // Vérifier que le hash a bien été généré
        if ($hashedpassword === false) {
            echo "<script>
                alert('Erreur lors du hashage du mot de passe.');
                window.location.href = 'inscription.php';
            </script>";
            exit();
        }
        // Vérifier si l'email existe déjà
        $checkUser = $bdd->prepare("SELECT * FROM personnelle WHERE email = ?");
        $checkUser->execute([$email]);
        if ($checkUser->rowCount() > 0) {
            echo "<script>
                alert('Cet email est déjà utilisé. Veuillez vous connecter.');
                window.location.href = 'login1.php';
            </script>";    
            exit();
        }
        // Insérer l'utilisateur
        $sql = "INSERT INTO personnelle (nom, prenom, sexe, email, password, poste, telephone) VALUES ('$nom','$prenom','$sexe','$email','$hashedpassword ','$poste',$telephone)";
if($bdd->query($sql) === TRUE){
    echo "vos donnes ont etait envoyer";
}else{
    echo "echec";
}
        echo "<script>
            alert('Inscription réussie ! Vous allez être redirigé vers la page de connexion.');
            window.location.href = 'login1.php';
        </script>";
        exit();

    } else {
        echo "<script>alert('Veuillez remplir tous les champs obligatoires.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>inscription</title>
    <link rel="stylesheet" href="inscription1.css">
</head>
<body>
    <p>
  Formulaire d'inscription   sur votre hopital "SANTE SENEGAL"
    </p>
    <hr alig="center" size="5px" width="880px" />
    <div class="intro">Remplissez soigneusement le formulaire d'inscription</div>
    <div class="nav0">
        <form  method="POST" name="inscription">
    </div><br>
    <fieldset>
        <div class="nav1">
            Nom complet
            <div class="nav2">
                     <input type="text" placeholder="*Nom" name="nom" required><br><br>
                <input type="text" placeholder="*prenom" name="prenom" required>
            </div><br>
              Sexe:<br>
            <div class="nav2">
                <input type="text" placeholder="*sexe" name="sexe" required> 
            </div><br>
            Email:<br>
            <div class="nav2">
                <input type="text" placeholder="*email" name="email" required>
            </div><br>
              <div class="nav1">
                Mots de passe
                <div class="nav2">
                    <input type="password" placeholder="password" name="password" required>
                </div>
            </div><br>
            Poste dans l'hopital:<br>
            <div class="nav2">
                <input type="text" placeholder="poste" name="poste" required>
            </div><br>
          
            <div class="nav1">
                Numero de telephone
                <div class="nav2">
                    <input type="tel" placeholder="*(+221)000000000" name="telephone" required>
                </div>
            </div><br><br>
                <div class="nav3">
                    <input type="submit" name="soumettre" value="Soumettre">
                </div>
    </fieldset>
    </form>
    </div>
</body>
</html>