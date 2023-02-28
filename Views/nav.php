<?php session_start();?>

<?php include('../connexion.php');?>

<style>
    .nav a {
        color:black;
        font-weight: bolder;
    }

    .nav a:hover{
        color:blueviolet;
    }
</style>


<nav class="nav nav-borders">
    <a class="nav-link active  ms-0" href="index.php" >Acceuil</a>
    <a class="nav-link ms-0" href="add-produit.php" >Ajouter Produit</a>
        <a class="nav-link ms-0" href="logout.php" >Log out</a>
</nav>