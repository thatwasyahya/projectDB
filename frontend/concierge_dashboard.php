<?php
session_start();
if(!isset($_SESSION['user'])) {
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Concierge</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <h2>Bienvenue <?php echo $_SESSION['user']; ?> sur le tableau de bord administrateur</h2>
    <!-- Afficher la liste des clients et leurs informations -->
    <!-- Au clic sur un client, afficher ses infos et ses commandes -->
</body>
</html>
