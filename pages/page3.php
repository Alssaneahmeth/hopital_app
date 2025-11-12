<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id_patient'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace client</title>
    <link rel="stylesheet" href="page3.css">
</head>

<body>
    <div class="nav">
    </div>
    <P>
        BIENVENUE DANS VOTRE ESPACE PERSONNEL
    </P>
    <div class="nav1">
        <a href="rendez-vous.php"><img src="../images/im5.jpg" alt="image rendez-vous"> </a>
    </div>
    <div class="nav2">
        <a href="page5.php"> <img src="../images/consultation.jpg" alt="image de consultation"></a>
    </div><br><br><br><br><br><br><br><br><br>
    <div class="nav3">
        <a href="page6.php"><img src="../images/facture.jpg" alt="image de facture"></a>
    </div>
    <div class="nav4">
        <a href="page7.php"><img src="../images/mes info.jpg" alt="image de mes imformation"></a>
    </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div class="nav5">

        @ HOPITAL "SANTE SENGAL"
    </div>
</body>

</html>