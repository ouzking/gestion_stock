<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "Root";
$dbname = "gestion_stock";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Récupération des données du formulaire
$nom = $_POST['nom'];
$designation = $_POST['designation'];
$quantite = $_POST['quantite'];


// Insertion des données dans la base de données
$sql = "INSERT INTO produit (nom, designation, quantite) VALUES ('$nom', '$designation', '$quantite')";

if ($conn->query($sql) === TRUE) {
    echo "Le client a été ajouté avec succès.";
    header('Location:afficher.php');
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
    header('Location:index.php');
}

$conn->close();