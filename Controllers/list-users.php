<?php
    include('../connexion.php');
    $ls=$conn->prepare("SELECT * FROM admino ");
    $ls->execute();
    $table=$ls->fetchAll();
    $longeur=count($table);
?>