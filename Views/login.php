<?php session_start(); ?>

<?php include('../Controllers/list-users.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="https://img.icons8.com/color-glass/48/null/package.png"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="stylesheet" href="./assets/style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
    <title>Document</title>
</head>
<body>
    <!-- Section: Design Block -->
    <section class="hh text-center text-lg-start">
    <style>
        .rounded-t-5 {
        border-top-left-radius: 0.5rem;
        border-top-right-radius: 0.5rem;
        }

        @media (min-width: 992px) {
        .rounded-tr-lg-0 {
            border-top-right-radius: 0;
        }

        .rounded-bl-lg-5 {
            border-bottom-left-radius: 0.5rem;
        }
        }
    </style>
    <div class="card mb-3">
        <div class="row g-0 d-flex align-items-center">
            <div class="col-lg-4 d-none d-lg-flex">
                <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" alt="Trendy Pants and Shoes"
                class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
            </div>
            <div class="col-lg-8">
                <div class="card-body py-5 px-md-5">

                    <form method="GET" action="">
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example1">user name</label>
                        <input type="text" required name="usermail" id="form2Example1" class="form-control" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example2">Password</label>
                        <input type="password" required name="password" id="form2Example2" class="form-control" />
                        </div>

                        <!-- 2 column grid layout for inline styling -->
                        <div class="row mb-4">
                        

                        <div class="col">
                            <!-- Simple link -->
                            <a href="#!">Forgot password?</a>
                        </div>
                        </div>
                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
                    </form>

                    <?php
                        if ($_GET["usermail"] && $_GET["password"] ){
                            $a = $_GET["usermail"];
                            $b = $_GET["password"];
                            $d=0;
                            if ($longeur != 0)
                            {
                                foreach ($table as $user)
                                {
                                    if (($user['username'] == $a) && ($user['password'] == $b)){
                                        $d=1;
                                        $_SESSION['username'] = $a;
                                        $_SESSION['nom'] = $user['nom'];
                                        $_SESSION['prenom'] = $user['prenom'];
                                    }
                                }
                                
                                if($d==1){
                                    echo "Connexion avec succes"; 
                                    header("Location:index.php"); 
                                }else{
                                    echo "Ce compte n'hexiste pas !!!";
                                }
                            }
                        }    
                    ?>
                </div>
            </div>
        </div>
    </div>
    </section>
    
    
</body>
</html>