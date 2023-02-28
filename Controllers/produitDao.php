<?php

require_once '../Models/Produit.php';

    class produitDao
    {

        function getAllProducts()
        {
            include('../connexion.php');
            $result = $conn->query("SELECT * FROM Produit");
            $liste_products = $result->fetchAll();

            return $liste_products;
        }
        function getProduct($id)
        {
            include('../connexion.php');
            $result = $conn->query("SELECT * FROM Produit WHERE reference='$id'");
            $product = $result->fetchAll();
            return $product;
        }

        function updateProduct($product)
        {
            include('../connexion.php');
            $result = $conn->query("UPDATE Produit SET libelle='$product->libelle', prixUnitaire='$product->prixUnitaire', photoProduit='$product->photoProduit'  WHERE id='$product->reference' ");
            $result->execute();
        }

        function addProduct($product)
        {
            include('../connexion.php');
            $result = $conn->query("INSERT INTO `Produit`  VALUES ('$product->reference','$product->libelle','$product->prixUnitaire','$product->dateAchat','$product->photoProduit','$product->idCategorie')");
            $result->execute();
            return $result; 
        }

        function deleteProduct($id)
        {
            include('../connexion.php');
            $result = $conn->query("DELETE FROM Produit WHERE reference='$id'");
            $result->execute();
             
        }

        function chercherParLibelle($char){
            include('../connexion.php');
            $result = $conn->query("SELECT * FROM Produit WHERE libelle LIKE '%$char%'");
            $liste2 = $result->fetchAll();
            return $liste2;
        }

               
    }
