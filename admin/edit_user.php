<?php
require('../config.php');
session_start();

// Vérifier si l'utilisateur est connecté et s'il est administrateur
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
}

// Vérifier si l'ID de l'utilisateur est passé dans l'URL
if (!isset($_GET['id'])) {
    header("Location: update.php");
    exit();
}

$id = intval($_GET['id']);

// Récupérer l'utilisateur à modifier
$query = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    header("Location: update.php");
    exit();
}

// Traitement du formulaire de modification
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $type = htmlspecialchars($_POST['type']);
    
    // Mettre à jour l'utilisateur dans la base de données
    $update_query = "UPDATE users SET username = '$username', type = '$type' WHERE id = $id";
    mysqli_query($conn, $update_query) or die(mysqli_error($conn));
    
    header("Location: update.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier l'utilisateur</title>
    <link rel="stylesheet" type="text/css" href="edit.css">
</head>
<body>
<h1>Modifier l'utilisateur</h1>
<form method="post">
    <label for="username">Nom d'utilisateur:</label>
    <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
    
    <label for="type">Type:</label>
    <input type="text" id="type" name="type" value="<?php echo htmlspecialchars($user['type']); ?>" required>
    
    <input type="submit" value="Modifier">
</form>

<a href="update.php">Retour à la liste des utilisateurs</a>
</body>
</html>