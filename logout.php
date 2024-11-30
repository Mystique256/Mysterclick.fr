<?php
session_start(); // Démarre la session

// Vérifie si l'utilisateur est connecté
if (isset($_SESSION['username'])) {
    // Détruire la session
    session_unset(); // Libère toutes les variables de session
    session_destroy(); // Détruit la session

    // Redirige vers la page d'accueil ou de connexion
    header("Location: login.php"); // Remplacez 'login.php' par le nom de votre page de connexion
    exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection
} else {
    // Si l'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
    header("Location: login.php");
    exit();
}
?>