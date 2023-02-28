<?php if( empty($_SESSION["nom"]) ) { header("Location:login.php");  } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="https://img.icons8.com/color-glass/48/null/package.png"/>
    <title>Gestion des Produits</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./profile.css">
</head>

<body>
    <div class="container-fluid col-md-10 mt-4 ">
        <?php include('nav.php');?>
        
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-12 col-md-7 ">
                <div class="card mb-4">
                    <div class="card-header d-flex">
                        <h2><b>
                            <?php if(date('H:m:s/24') < '20:00:00'){
                                echo "Bonjour"; 
                            
                            }else{
                                echo "Bonsoir";
                            }
                            ?>
                            <?php echo $_SESSION["nom"] . " " . $_SESSION["prenom"];
                            ?> 
                        </b></h2> 

                        <form method="POST" class="form-inline position-absolute " style="right:10px;">
                            <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search by libelle ..." >
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </div>
                <H2> Liste des Produits </H2>
                <br>
                <div>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Reference</th>
                                <th scope="col">Libelle</th>
                                <th scope="col">Prix unitaire</th>
                                <th scope="col">Date Achat</th>
                                <th scope="col"> Photo Produit </th>
                                <th scope="col"> Categorie </th>
                                <th scope="col"> ACTION </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                include('../Controllers/produitDao.php');
                                $produitDAO = new produitDAO();
                                $table = $produitDAO->getAllProducts();
                                $longeur=count($table);
                                if (!isset($_POST['search'])){
                                    if ($longeur == 0 ){
                                        print('La liste des produits est vide');
                                        }else{
                                            foreach ($table as $produit){
                                                print('
                                                    <tr>
                                                        <th scope="row">'.$produit['reference'].'</th>
                                                        <td>'.$produit['libelle'].'</td>
                                                        <td>'.$produit['prixUnitaire'].'</td>
                                                        <td>'.$produit['dateAchat'].'</td>
                                                        <td><img width="100" heigh="100" src="../assets/img/'.$produit['photoProduit'].'"</td>
                                                        ');
                                    ?>
        
                                                    <?php
                                                        $dd = $conn->prepare("SELECT * FROM Categorie WHERE id=:zal");
                                                        $dd->execute(array(":zal" =>$produit['idCategorie']));
                                                        $lista = $dd->fetchAll();
                                                        foreach($lista as $valeura){
                                                            $nom_cat = $valeura['denomination'];
                                                        }
                                                    ?>
        
                                                    <?php print('<td>'.$nom_cat.'</td>') ?>
                                                            
                                                    <?php print('
                                                        <td>  
                                                            <a href="modify-product.php?id='.$produit['reference'].'"> <img class="modify" src="https://img.icons8.com/ios-filled/20/null/pencil--v1.png"/></a>
                                                                &nbsp; &nbsp; | &nbsp; &nbsp; 
                                                            <a href="../delete.php?a='.$produit['reference'].'"> <img class="delete" src="https://img.icons8.com/ios-filled/20/null/trash.png"/> </a>
                                                        </td>
                                                    </tr>  
                                                ');
                                            }
                                        }
                                    }else{
                                        $produitDAO = new produitDAO();
                                        $liste2 = $produitDAO->chercherParLibelle($_POST['search']);
                                        foreach ($liste2 as $produit){
                                            print('
                                                <tr>
                                                    <th scope="row">'.$produit['reference'].'</th>
                                                    <td>'.$produit['libelle'].'</td>
                                                    <td>'.$produit['prixUnitaire'].'</td>
                                                    <td>'.$produit['dateAchat'].'</td>
                                                    <td><img width="100" heigh="100" src="../assets/img/'.$produit['photoProduit'].'"</td>
                                                    ');
                                    ?>
    
                                                <?php
                                                    $dd = $conn->prepare("SELECT * FROM Categorie WHERE id=:zal");
                                                    $dd->execute(array(":zal" =>$produit['idCategorie']));
                                                    $lista = $dd->fetchAll();
                                                    foreach($lista as $valeura){
                                                        $nom_cat = $valeura['denomination'];
                                                    }
                                                ?>
    
                                                <?php print('<td>'.$nom_cat.'</td>') ?>
                                                        
                                                <?php print('
                                                    <td>  
                                                        <a href="modify-product.php?id='.$produit['reference'].'"> <img class="modify" src="https://img.icons8.com/ios-filled/20/null/pencil--v1.png"/></a>
                                                            &nbsp; &nbsp; | &nbsp; &nbsp; 
                                                        <a href="../delete.php?a='.$produit['reference'].'"> <img class="delete" src="https://img.icons8.com/ios-filled/20/null/trash.png"/> </a>
                                                    </td>
                                                </tr>  
                                            ');
                                        }

                                    }
                            ?>                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>