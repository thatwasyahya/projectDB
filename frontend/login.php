<?php
session_start();
if(isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projectdb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_POST['email'];
    $id_client = $_POST['id_client'];
    $type = $_GET['type']; // Récupérer le type de connexion depuis la query string

    // Vérifier le type de connexion
    if($type === 'client') {
        $sql = "SELECT * FROM client WHERE email='$email' AND id_client='$id_client'";
    } elseif($type === 'concierge') {
        $sql = "SELECT * FROM concierge WHERE email='$email' AND id_concierge='$id_client'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Utilisateur trouvé
        $_SESSION['user'] = $email;
        header("Location: client_dashboard.php"); // Rediriger vers le tableau de bord du client
        exit();
    } else {
        // Utilisateur non trouvé
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }

    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="container">
        <div class="box">
            <img src="icon.png" alt="Icon" class="icon">
            <h2>Connexion</h2>
            <form method="post" action="">
                <label for="email">Email :</label><br>
                <input type="text" id="email" name="email" required><br>
                <label for="password">Mot de passe :</label><br>
                <input type="password" id="id_client" name="id_client" required><br><br>
                <input type="submit" value="Se connecter">
            </form>
        </div>
    </div>
</body>
</html>


