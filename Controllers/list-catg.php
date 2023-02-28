<?php
    include('../connexion.php');
    $ls=$conn->prepare("SELECT * FROM Categorie ");
    $ls->execute();
    $categories=$ls->fetchAll();
    $longeur=count($categories);

    // $ls2 = $conn->prepare("SELECT denomination FROM Categorie where id 
?>