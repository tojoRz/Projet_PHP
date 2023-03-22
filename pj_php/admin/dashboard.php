<?php
    session_start();

    if(!$_SESSION['email']){
        header("Location:../login.php");
    }

    require("../config/commandes.php");

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <link rel="apple-touch-icon" href="../../assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="../../assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="../../assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="../../assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="../../assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="../../assets/img/favicons/favicon.ico">
    <link rel="stylesheet" href="../templates/font/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../templates/css/bootstrap.min.css">
    <link rel="stylesheet" href="../templates/css/bootstrap.css">
    <link rel="stylesheet" href="../templates/font/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../templates/style.css">
    <link rel="stylesheet" href="../templates/css/style.css">
    <script src="../pj_php/templates/js/bootstrap.js"></script>

    <title>Administrateur</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
 <link href="../templates/bootstrap-5.0.2-examples/assets/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../templates/bootstrap-5.0.2-examples/dashboard/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Forever cinema</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <input class="form-control form-control-dark w-100 bg-dark" type="text" disabled  aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="../login.php">Déconnexion</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
                <i class="fa fa-home fa-2x" aria-hidden="true"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <span data-feather="file"></span>
              Nouveau un produit
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="supprimer.php">
              <span data-feather="shopping-cart"></span>
              Supprimer un produit
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="afficheProduit.php">
              <span data-feather="users"></span>
              Liste des produits
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="afficheClient.php">
              <span data-feather="layers"></span>
              Liste users
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Commande</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="affichePanier.php">
              <span data-feather="file-text"></span>
              Commande en attente
              <span class="badge bg-danger">
                <?php
                  try{
                    if(require("../config/config.php"))
                    {
                        $req=$conn->prepare( 'SELECT COUNT(*) AS nb FROM tb_panier');
                        $req->execute();

                        $data = $req->fetch();

                        $nb = $data['nb'];

                        echo $nb;
                      }
                  }catch(PDOException $e){
                        echo 'Erreur PDO :'.$e->getMessage();
                  }
                ?>
              </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="comandeConfirmer.php">
              <span data-feather="file-text"></span>
              Commande confirmer
              <span class="badge bg-danger">
                <?php
                  try{
                    if(require("../config/config.php"))
                    {
                        $req=$conn->prepare( 'SELECT COUNT(*) AS nb FROM tb_commande');
                        $req->execute();

                        $data = $req->fetch();

                        $nb = $data['nb'];

                        echo $nb;
                      }
                  }catch(PDOException $e){
                        echo 'Erreur PDO :'.$e->getMessage();
                  }
                ?>
              </span>
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Forever Cinema</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>

      

      
    </main>
  </div>
</div>


    <script src="../templates/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="../templates/bootstrap-5.0.2-examples/dashboard/dashboard.js"></script>
  </body>
</html>
