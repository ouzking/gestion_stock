<?php

$id_user = $_GET['id'];

// Connexion à la base de données
$servername = 'localhost';
$username = 'root';
$password = 'Root';
$dbname = 'gestion_stock';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die('Connexion échouée : ' . $conn->connect_error);
}


$sql = "DELETE FROM produit WHERE id_user= $id_user";

if (mysqli_query($con, $sql)) {
    header("Location: showUser.php");
} else {
    header("Location: showUser.php");
}