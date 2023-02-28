<?php

    // include ('Controllers/produitDao.php');

    // $produitDAO = new ProduitDao();
    // if (isset($_GET['a'])){
    //     $produitDAO->deleteProduct($_GET['a']);
include('../connexion.php');
    $l = $conn->prepare("DELETE FROM produit WHERE reference = :valo");
    $l->execute(array(':valo' => $_GET['a']));
    

    header('location: Views/index.php');

?>