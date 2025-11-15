<?php
session_start();
try {
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=pfa;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}

if (isset($_POST['soumettre'])) {
    if (
        !empty($_POST['Nom']) && !empty($_POST['prenom']) && !empty($_POST['sexe']) &&
        !empty($_POST['date_de_naissance']) && !empty($_POST['region']) &&
        !empty($_POST['ville']) && !empty($_POST['email']) && !empty($_POST['password'])
    ) {

        // Récupération et sécurisation des données
        $Nom = htmlspecialchars($_POST['Nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $sexe = htmlspecialchars($_POST['sexe']);
        $date_de_naissance = $_POST['date_de_naissance'];
        $region = htmlspecialchars($_POST['region']);
        $ville = htmlspecialchars($_POST['ville']);
        $quartier = !empty($_POST['quartier']) ? htmlspecialchars($_POST['quartier']) : null;
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];
        $telephone1 = !empty($_POST['telephone1']) ? $_POST['telephone1'] : null;
        $telephone2 = !empty($_POST['telephone2']) ? $_POST['telephone2'] : null;

        // Vérifier la validité de l'email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>
                alert('Adresse email invalide.');
                window.location.href = 'inscription.php';
            </script>";
            exit();
        }

        // Vérifier si l'email existe déjà
        $checkUser = $bdd->prepare("SELECT id_patient FROM patient WHERE email = ?");
        $checkUser->execute([$email]);
        
        if ($checkUser->rowCount() > 0) {
            echo "<script>
                alert('Cet email est déjà utilisé. Veuillez vous connecter.');
                window.location.href = 'login.php';
            </script>";
            exit();
        }

        // Hashage sécurisé du mot de passe
        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Vérifier que le hash a bien été généré
        if ($hashedpassword === false) {
            echo "<script>
                alert('Erreur lors du hashage du mot de passe.');
                window.location.href = 'inscription.php';
            </script>";
            exit();
        }

        // Insérer l'utilisateur
        try {
            $insertUser = $bdd->prepare('INSERT INTO patient 
            (Nom, prenom, sexe, date_de_naissance, region, ville, quartier, email, password, telephone1, telephone2)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

            $result = $insertUser->execute([
                $Nom, $prenom, $sexe, $date_de_naissance, $region, 
                $ville, $quartier, $email, $hashedpassword, $telephone1, $telephone2
            ]);

            if ($result) {
                echo "<script>
                    alert('Inscription réussie ! Vous allez être redirigé vers la page de connexion.');
                    window.location.href = 'login.php';
                </script>";
                exit();
            } else {
                throw new Exception("Erreur lors de l'insertion dans la base de données");
            }
            
        } catch (PDOException $e) {
            echo "<script>
                alert('Erreur base de données : " . addslashes($e->getMessage()) . "');
                window.location.href = 'inscription.php';
            </script>";
            exit();
        }

    } else {
        echo "<script>
            alert('Veuillez remplir tous les champs obligatoires.');
            window.location.href = 'inscription.php';
        </script>";
        exit();
    }
}
?>
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>inscription</title>
    <link rel="stylesheet" href="inscription.css">
</head>

<body>
    <p>
  Formulaire d'inscription sur votre hopital "SANTE SENEGAL"
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
                     <input type="text" placeholder="*Nom" name="Nom" required>
                <input type="text" placeholder="*prenom" name="prenom" required>
            </div><br>
            Sexe:<br>
            <div class="nav2">
                <select name="sexe" id="sexe"required>
                    <option selected>choisissez*</option required>
                    <option value="homme">homme</option required>
                    <option value="femme">femme</option required>
                </select>
            </div><br>
            Date de Naissance:<br>
            <div class="nav2">
                <input type="date" placeholder="*JJ/MM/AA" name="date_de_naissance" required>
            </div><br>
            <div class="nav1">
                Address
                <div class="nav2">
                    <input type="text" placeholder="*Region" name="region" required>
                    <input type="text" placeholder="*Ville" name="ville" required>
                    <input type="text" placeholder="*quartier" name="quartier" required>
                </div>
            </div><br>
            <div class="nav1">
                Email
                <div class="nav2">
                    <input type="text" placeholder="*email" name="email" required>
                </div>
            </div><br>
            <div class="nav1">
                Mots de passe
                <div class="nav2">
                    <input type="password" placeholder="*password" name="password" required>
                </div>
            </div><br>
            <div class="nav1">
                Numero de telephone
                <div class="nav2">
                    <input type="tel" placeholder="*(+221)000000000" name="telephone1" required>
                </div>
            </div><br>
            <div class="nav1">
                Numero de telephone d'un proche ou parents(optionnel)
                <div class="nav2">
                    <input type="tel" placeholder="(+221)000000000" name="telephone2">
                </div><br>
                <div class="nav3">
                    <input type="submit" name="soumettre" value="Soumettre">
                </div>
    </fieldset>
    </form>
    </div>
</body>
</html>