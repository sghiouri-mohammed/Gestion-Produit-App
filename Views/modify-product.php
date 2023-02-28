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
    u{
        color: red;
        font-size: 50px;
    }
</style>
<body>
    
    <div class="container-xl px-4 mt-4">
        <?php include('nav.php');?>
        <?php
            if(!empty($_GET['id'])){
                $_SESSION['id'] = $_GET['id'];   
            }
            $p = $conn->prepare("SELECT * FROM produit WHERE reference=:kal");
            $p->execute(array(":kal" =>$_SESSION['id']));
            $list = $p->fetchAll();
            foreach($list as $valeur){
                $date_pro = $valeur['dateAchat'];
                $catg = $valeur['idCategorie'];
            }

            $pp = $conn->prepare("SELECT * FROM Categorie WHERE id=:bal");
            $pp->execute(array(":bal" =>$catg));
            $lista = $pp->fetchAll();
            foreach($lista as $valeura){
                $nom_cat = $valeura['denomination'];
                
            }
            
        ?>
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
                            ?>
                            <?php echo $_SESSION["nom"]. " " .$_SESSION["prenom"] ?> 
                        </b></h2>
                    </div>
                </div>
                <H2> Modifier Produit de Reference &nbsp; &nbsp; <u><?php echo $_SESSION['id'] ?></u>  </H2>
                <br>
                <div>
                    <form method="GET" >
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
                                <input type="text" disabled  class="form-control"  placeholder=<?php echo $date_pro ?>>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Categorie du produit</label>
                                <input type="text" disabled  class="form-control"  placeholder=<?php echo $nom_cat ?>>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-lg">Modifier</button>
                    </form>

                    <?php
                        if (isset($_GET['submit'])){

                            if ((empty($_GET['libelle']) == false  ) && (empty($_GET['prix']) == true)  ){
                                $re = $conn->prepare("UPDATE Produit SET libelle=:val1 WHERE reference=:l2");
                                $re->execute(array(":val1" => $_GET['libelle'], ":l2"=>$_SESSION['id']));

                                header('location:index.php');
                            }

                            if ((empty($_GET['libelle']) == true ) && (empty($_GET['prix']) == false) ){
                                $re = $conn->prepare("UPDATE Produit SET prixUnitaire=:val1 WHERE reference=:l2");
                                $re->execute(array(":val1" => $_GET['prix'] , ":l2"=>$_SESSION['id']));
                                header('location:index.php');
                            }

                            if ((empty($_GET['libelle']) == false ) && (empty($_GET['prix']) == false) ){
                                $re = $conn->prepare("UPDATE Produit SET libelle=:val1 , prixUnitaire=:val2 WHERE reference=:l2");
                                $re->execute(array(":val1" => $_GET['libelle'], ":val2" => $_GET['prix'] , ":l2"=>$_SESSION['id']));
                                header('location:index.php');
                            }

                            
                        }
                    ?>
                    
                    
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>