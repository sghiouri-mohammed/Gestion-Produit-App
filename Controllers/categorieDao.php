<?php

require_once '../Models/Categorie.php';

    class categorieDao
    {

        function getCategorie($id)
        {
            include('../connexion.php');
            $result = $conn->query("SELECT * FROM Categorie WHERE id='$id'");
            $liste = $result->fetchAll();
            return $liste;
        }

        function getAllCategories(){
            include('../connexion.php');
            $result = $conn->query("SELECT * FROM Categorie");
            $liste = $result->fetchAll();
            return $liste;
        }

               
    }
