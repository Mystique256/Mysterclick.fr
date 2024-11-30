<?php
// Informations d'identification
define('DB_SERVER', 'localhost:3306');
define('DB_USERNAME', 'AtlasU');
define('DB_PASSWORD', 'AtlasU');
define('DB_NAME', 'Atlas');
 
// Connexion à la base de données MySQL 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Vérifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>