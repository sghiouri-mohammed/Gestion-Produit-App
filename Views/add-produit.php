<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="https://img.icons8.com/color-glass/48/null/package.png"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion des Produits</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./profile.css">
</head>
<style>
    
</style>
<body>
    <div class="container-xl px-4 mt-4">
        <?php include('nav.php');
        include('../Controllers/produitDao.php');?>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-12 col-md-7 ">
                <div class="card mb-4">
                    <div class="card-header">
                        <h2><b><?php if(date('H:m:s/24') < '20:00:00'){
                                echo "Bonjour"; 
                            
                            }else{
                                echo "Bonsoir";
                            }
                            ?> <?php echo $_SESSION["nom"]. " " .$_SESSION["prenom"] ?> </b></h2>
                    </div>
                </div>
                <H2> Ajouter Produits </H2>
                <br>
                <div>
                    <form method="GET" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Libelle</label>
                                <input type="text" name="libelle" class="form-control"  placeholder="Libelle">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">PrixUnitaire</label>
                                <input type="number" name="prix" class="form-control"  placeholder="Prix du produit">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Date Achat</label>
                                <input type="date" name="dateachat" class="form-control"  placeholder="date d'achat">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 ">
                                <label class="custom-file-label" for="customFile">Photo du Produit</label>
                                <input type="file" name="image" class="custom-file-input" id="customFile"> 
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Categorie du produit</label>
                                <select name="categ" class="custom-select">
                                    <option selected> Veuillez choisir la Catéfgorie </option>
                                    <?php

                                        include('../Controllers/categorieDao.php');
                                        $catgDao = new categorieDao();
                                        $lista = $catgDao->getAllCategories();
                                        foreach ($lista as $categorie){
                                        print('
                                            <option value='.$categorie["id"].' >'.$categorie['denomination'].' </option>
                                            ');
                                        }

                                    ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-lg">Ajouter</button>
                    </form>
                    <?php
                    
                        if ( isset($_GET['submit'])){
                            
                            $produitDAO = new ProduitDAO();
                            $produit = new Produit(6, $_GET['libelle'], $_GET['prix'], $_GET['dateachat'], $_GET['image'], $_GET['categ']);

                            $produitDAO->addProduct($produit);
                            
                            echo "Votre article est ajouté avec success";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>