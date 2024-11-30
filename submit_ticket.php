<?php
session_start(); // Assurez-vous que la session est démarrée

// Inclure le fichier de configuration
include 'config.php';

// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $username = htmlspecialchars($_POST['username']); // Récupérer le nom d'utilisateur
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $priority = htmlspecialchars($_POST['priority']);

    // Préparer et lier
    $stmt = $conn->prepare("INSERT INTO tickets (title, description, priority, username) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $title, $description, $priority, $username); // Ajoutez le nom d'utilisateur

    // Exécuter la requête
    if ($stmt->execute()) {
        header("Location: ticket.php");
    } else {
        echo "Erreur: " . $stmt->error;
    }

    // Fermer la connexion
    $stmt->close();
    $conn->close();
} else {
    echo "Aucune donnée soumise.";
}
?>