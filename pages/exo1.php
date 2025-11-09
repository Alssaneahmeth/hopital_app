<?php
// Connexion à la base avec PDO
try {
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=pfa;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Récupération des données du formulaire
$Nom = $_POST['Nom'] ?? null;
$prenom = $_POST['prenom'] ?? null;
$sexe = $_POST['sexe'] ?? null;
$date_de_naissance = $_POST['date_de_naissance'] ?? null;
$region = $_POST['region'] ?? null;
$ville = $_POST['ville'] ?? null;
$quartier = $_POST['quartier'] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$telephone1 = $_POST['telephone1'] ?? null;
$telephone2 = $_POST['telephone2'] ?? null;

// Préparer la requête SQL (avec les colonnes exactes)
$sql = "INSERT INTO patient 
        (Nom, prenom, sexe, date_de_naissance, region, ville, quartier, email, password, telephone1, telephone2) 
        VALUES 
        (:Nom, :prenom, :sexe, :date_de_naissance, :region, :ville, :quartier, :email, :password, :telephone1, :telephone2)";

$stmt = $pdo->prepare($sql);

// Exécution avec tableau associatif
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
$ex = $stmt->execute([
    ':Nom' => $Nom,
    ':prenom' => $prenom,
    ':sexe' => $sexe,
    ':date_de_naissance' => $date_de_naissance,
    ':region' => $region,
    ':ville' => $ville,
    ':quartier' => $quartier,
    ':email' => $email,
    ':password' => $hashedPassword,
    ':telephone1' => $telephone1,
    ':telephone2' => $telephone2,
]);

if ($ex) {
    echo " Inscription réussie";
} else {
    echo "Erreur lors de l'inscription";
}
var_dump($_POST);
exit;
{
    
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=pfa','root','');
if(isset($_POST['se_connecter'])){
    if(!empty($_POST['email']) AND !empty($_POST['password '])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        //verification si l'email existe 
        $recupUser = $bdd->prepare('SELECT * FROM patient WHERE email = ?');
        $recupUser->execute([$email]);

        if($recupUser->rowCount()>0){
$User = $recupUser->fetch();
//verification si le password existe 
if(password_verify($password, $User['password'])){
    $_SESSION['id'] = $User['id'];
    $_SESSION['email'] = $User['email'];
    header('Location:page3.php');
    exit;
}else{
    echo "votre mots de passe est incorrect.";
}
        }
        else{
    echo"Aucun compte n'a etait trouver avec cet email veuiller vous inscrire.";
}
    }else{
        echo "veuiller completer tous les champs.";
    }
}
    ?>
}