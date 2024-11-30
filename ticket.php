<?php
session_start(); // Assurez-vous que la session est démarrée
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="style.css">-->
    <link rel="stylesheet" href="ticket.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="atlas-link">Déclarer un Ticket</h1>
        <form action="submit_ticket.php" method="POST">
            <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>"> <!-- Champ caché pour le nom d'utilisateur -->
            <label for="title">Titre du Ticket :</label>
            <input type="text" id="title" name="title" required>

            <label for="description">Description :</label>
            <textarea id="description" name="description" required></textarea>

            <label for="priority">Priorité :</label>
            <select id="priority" name="priority">
                <option value="low">Basse</option>
                <option value="medium">Moyenne</option>
                <option value="high">Haute</option>
            </select>

            <button type="submit" class="btn">Soumettre le Ticket</button>
            <a href="javascript:history.back()" class="btn">Retourner à la Page Précédente</a>
        </form>
    </div>
</body>
</html>