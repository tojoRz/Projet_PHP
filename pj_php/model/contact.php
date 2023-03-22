<?php
    session_start();

    if(!$_SESSION['email']){
        header("Location:../login.php");
    }
    require("../config/config.php");

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../templates/css/bootstrap.min.css">
    <link rel="stylesheet" href="../templates/css/bootstrap.css">
    <link rel="stylesheet" href="../templates/font/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../templates/style.css">
    <link rel="stylesheet" href="../templates/css/style.css">
    <script src="../templates/js/bootstrap.js"></script>

    <title>Acheter un produit</title>
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
                              <a class="nav-link "  href="../index.php"><i class="fa fa-home" aria-hidden="true"></i>
                                Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>
                                    Sign up</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link "  href="../login.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                    Login</a>
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
    </header>

    <section class="vh-100" style="padding-top: 10vh;">
    <div class="container-fluid h-custom">
    
    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-center" >
                </div>
                <?php 
                    if (isset($_SESSION['email'])){
                        $recid=$_GET['recupid'];
                        $req=$conn->prepare("SELECT * FROM `tb_product` WHERE id=$recid");
                    
                        $req->execute();
            
                        $data = $req->fetchAll(PDO::FETCH_OBJ);
                ?>
                
                <?php foreach($data as $produit): ?>
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
        <div class="form-outline mb-3 d-flex justify-content-center">
                        <img src="../uploads/<?= $produit->image?>" class="img-fluid" style="height: 70vh; width: 50vh;" alt="Sample image">   
                    </div>
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form method="post">
              <?php 
                  if(isset($_GET["error"])){ 
              ?>
                  <div class="alert alert-danger" role="alert">
                      <?php echo htmlspecialchars($_GET["error"])?>
                  </div>
              <?php } ?>
              <?php 
                  if(isset($_GET["success"])){ 
              ?>
                  <div class="alert alert-success" role="alert">
                      <?php echo htmlspecialchars($_GET["success"])?>
                  </div>
              <?php } ?>
                
                <div class="form-outline mb-2">
                    <label class="form-label" for="id">Id </label>
                    <input type="text" name="id" class="form-control"  value="<?= $_SESSION['id'] ?>" placeholder="Entrer votre adresse email"/>
                </div>
                <div class="form-outline mb-2">
                    <label class="form-label" for="email">Email </label>
                    <input type="email" name="email" class="form-control"  value="<?= $_SESSION['email'] ?>" placeholder="Entrer votre adresse email"/>
                </div>

                    <div class="form-outline mb-2">
                        <label class="form-label" for="titre">Titre Film </label>
                        <input type="text" name="titre"  class="form-control" value="<?= $produit->titre ?>"/>
                    </div>
                    
                    <div class="form-outline mb-2">
                        <label class="form-label" for="prix">Prix </label>
                        <input type="text" name="prix" class="form-control"  value="<?= $produit->prix ?> Ar"/>
                    </div>

                <?php endforeach; }?>
                
                <div class="form-outline mb-2">
                    <label class="form-label" for="qte">Quantité </label>
                    <input type="number" name="qte" class="form-control"/>
                </div>
                <div class="form-outline mb-2">
                    <label class="form-label" for="dateCom">Date  </label>
                    <input type="date" name="dateCom" class="form-control" value="<?= date('Y-m-d') ?>"/>
                </div>
                <div class="text-center text-lg-start mt-4 pt-2 pb-2">
                    <button type="submit" class="btn btn-success" name="envoyer" style="padding-left: 2.5rem; padding-right: 2.5rem;">Ajouter dans le panier</button>
                    
                </div>
            </form>
        </div>
        </div>
    </div>
    </section>
</body>
</html>
<?php
    if(isset($_POST['envoyer']))
    {
        $id=$_POST['id'];
        $titre=$_POST['titre'];
        $prix=$_POST['prix'];
        $qte=$_POST['qte'];
        $dateComande=$_POST['dateCom'];

        $req ="INSERT INTO `tb_panier`(`id`, `titre`, `prix`, `qte`, `dateCommande`) VALUES (?,?,?,?,?)";
                $prepare = $conn->prepare($req);
                $prepare -> execute([$id, $titre, $prix, $qte, $dateComande]); 
                
                $message="ajout effectuer";
    }else{
        $message="ajout ne peut pas effectuer";
    }

    

?>