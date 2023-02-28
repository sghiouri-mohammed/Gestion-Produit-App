<?php
    include('../connexion.php');
    $ls=$conn->prepare("SELECT * FROM Produit ");
    $ls->execute();
    $table=$ls->fetchAll();
    $longeur=count($table);
?>