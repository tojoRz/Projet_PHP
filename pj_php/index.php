<?php
    session_start();

    if(!$_SESSION['email']){
        header("Location:login.php");
    }

    require("config/commandes.php");

    $Produits=afficher();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../pj_php/templates/css/bootstrap.min.css">
    <link rel="stylesheet" href="../pj_php/templates/css/bootstrap.css">
    <link rel="stylesheet" href="../pj_php/templates/font/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../pj_php/templates/style.css">
    <link rel="stylesheet" href="../pj_php/templates/css/style.css">
    <script src="../pj_php/templates/js/bootstrap.js"></script>

    <title>ForeverCinema</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <header>
            <div class="container-fluid">
                <nav class="navbar navbar-light bg-light fixed-top">
                    <div class="container">
                      <a class="navbar-brand" href="#" style="color: #990000;">Forever cinema</a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                          <h5 class="offcanvas-title" id="offcanvasNavbarLabel" style="color: #990000;">Forever cinema</h5>
                          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body menu">
                          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="index.php"><i class="fa fa-home" aria-hidden="true"></i>
                                Home</a>
                            </li>
                               
                                    <li class="nav-item">
                                        <a class="nav-link "  href="registration/registration.php"><i class="fa fa-sign-in" aria-hidden="true"></i>
                                            Sign up</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"  href="login.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                            Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link "  href="admin/deconexion.php"><i class="fa fa-sign-in" aria-hidden="true"></i>
                                            Déconnexion</a>
                                    </li>
                               
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-question-circle-o" aria-hidden="true"></i>
                                    About us</a>
                            </li>
                            
                          <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </nav>    
        </div>
        <div class="container col-xxl-8 px-4 py-5">
                        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                        <div class="col-10 col-sm-8 col-lg-6">
                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                    <img src="../pj_php/templates/images/header1.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                    <img src="../pj_php/templates/images/header4.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                    <img src="../pj_php/templates/images/header3.jpg" class="d-block w-100" alt="...">
                                    </div>
                                </div>                
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h1 class="display-5 fw-bold lh-1 mb-3">Bienvenue !</h1>
                            <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                            <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
                            <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
                            </div>
                        </div>
                </div>
                </div>
    </header>
    <main>
        </div>
        <div class="album py-5 bg-light">
            <div class="container"> 
            <h4 class="text-center">
                
                <span class="text-primary">Tous nos films</span>

            
            </h4>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    
                <?php foreach($Produits as $produit): ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="uploads/<?= $produit->image ?>" style="height: 60vh;">
                            <h4 style="color: aqua;"><?= $produit->titre ?></h4>
                            <div class="card-body">
                                <p class="card-text"><?= substr($produit->description, 0, 200)  ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                    <a href="../pj_php/model/contact.php?recupid=<?= $produit->id;?>" class="btn btn-sm btn-outline-secondary">Acheter</a>
                                    </div>
                                    <small class="text-muted"><?= $produit->prix ?> Ar</small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            </div>
        </div>
    </main>
        

</body>
</html>