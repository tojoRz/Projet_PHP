
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

    <title>Se connecter</title>
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
                                <a class="nav-link active " aria-current="page" href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>
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
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="../templates/images/11067-registration-animation.gif"
            class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form method="post" action="../controller/registrationController.php" >
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
                <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-center" >
                    <p class="lead fw-normal mb-0 me-3  " style="font-size: x-large;">S'inscrire</p>
                </div>
                
                <div class="form-outline mb-4">
                    <label class="form-label" for="name">Nom </label>
                    <input type="text" name="name" class="form-control" placeholder="Entrer votre nom"/>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="uername">Psuedo </label>
                    <input type="text" name="username" class="form-control" placeholder="Entrer votre pseudo"/>
                </div>
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="email">Email </label>
                    <input type="email" name="email" class="form-control" placeholder="Entrer votre adresse email"/>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-3">
                    <label class="form-label" for="password">Mot de passe</label>
                    <input type="password" name="password" placeholder="Entrer votre mot de passe" class="form-control"/>
                </div>
                <!-- Password input -->
                <div class="form-outline mb-3">
                    <label class="form-label" for="confirmpassword">Confirmer mot de passe</label>
                    <input type="password" name="confirmpassword" placeholder="Confirmer votre mot de passe" class="form-control"/>
                </div>
                <div class="text-center text-lg-start mt-4 pt-2 pb-5">
                    <button type="submit" class="btn btn-success" name="envoyer" value="Se connecter" style="padding-left: 2.5rem; padding-right: 2.5rem;">S'inscrire</button>
                    <p class="small fw-normal mt-2 pt-1 mb-0">Vous avez déjà un compte? <a href="../login.php"
                        class="link-danger">Se connecter</a></p>
                </div>
            </form>
        </div>
        </div>
    </div>
    </section>
</body>
</html>