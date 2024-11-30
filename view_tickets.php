<?php
session_start(); // Assurez-vous que la session est démarrée

// Inclure le fichier de configuration
include 'config.php';

// Récupérer les tickets de la base de données
$sql = "SELECT * FROM tickets ORDER BY created_at DESC"; // Assurez-vous d'avoir une colonne 'created_at' pour trier les tickets
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> <!-- Lien vers le CSS -->
    <title>Voir les Tickets</title>
</head>
<body>
    <div class="container">
        <h1>Tickets Déclarés</h1>

        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Priorité</th>
                        <th>Utilisateur</th>
                        <th>Date de Création</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['title']); ?></td>
                            <td><?php echo htmlspecialchars($row['description']); ?></td>
                            <td><?php echo htmlspecialchars($row['priority']); ?></td>
                            <td><?php echo htmlspecialchars($row['username']); ?></td>
                            <td><?php echo htmlspecialchars($row['created_at']); ?></td> <!-- Assurez-vous d'avoir cette colonne -->
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Aucun ticket déclaré.</p>
        <?php endif; ?>

        <a href="javascript:history.back()" class="btn">Retourner à la Page Précédente</a> <!-- Bouton pour retourner à la page précédente -->
        <a href="ticket.php" class="btn">Retourner au Formulaire</a> <!-- Lien vers le formulaire -->
    </div>
</body>
</html>

<?php
$conn->close(); // Fermer la connexion
?>