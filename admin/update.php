<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <title>Liste des Utilisateurs</title>
</head>
<body>
<?php
require('../config.php');
session_start();

// Vérifier si l'utilisateur est connecté et s'il est administrateur
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
}

// Traitement de la demande de suppression
if (isset($_POST['delete'])) {
    $id_to_delete = intval($_POST['id']);
    $delete_query = "DELETE FROM users WHERE id = $id_to_delete";
    mysqli_query($conn, $delete_query) or die(mysqli_error($conn));
    header("Location: " . $_SERVER['PHP_SELF']); // Redirige vers la même page pour rafraîchir la liste
    exit();
}

// Récupérer tous les utilisateurs
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
?>

<h1 class="atlas-link">Liste des Utilisateurs</h1>

<!-- Bouton pour ajouter un utilisateur -->
<a href="add_user.php" class="btn">Ajouter un Utilisateur</a>
<a href="home.php">Retour au tableau de bord</a>

<table>
    <tr>
        <th>ID</th>
        <th>Nom d'utilisateur</th>
        <th>Type</th>
        <th>Actions</th>
    </tr>
    <?php while ($user = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $user['id']; ?></td>
        <td><?php echo htmlspecialchars($user['username']); ?></td>
        <td><?php echo htmlspecialchars($user['type']); ?></td>
        <td>
            <a class="btn" href="edit_user.php?id=<?php echo $user['id']; ?>">Modifier</a>
            <form method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                <input type="submit" class="btn" name="delete" value="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
            </form>
        </td>
    </tr>
    <?php } ?>
</table>



</body>
</html>