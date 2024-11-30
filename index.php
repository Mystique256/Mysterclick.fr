<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }
?>
<!DOCTYPE html>
<html>
  <head>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="sucess">
    <h1>Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
    <p>C'est votre espace utilisateur.</p>
    <a href="ticket.php" class="btn">Déclarer un Ticket</a>
    <a href="view_tickets.php" class="btn">Voir les Tickets Déclarés</a> <!-- Nouveau bouton pour voir les tickets -->
    <a href="logout.php" class="btn">Déconnexion</a>
    </div>
  </body>
</html>