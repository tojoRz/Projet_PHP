<?php
    include'dashboard.php';
    
    if(isset($_GET['idPanier'])){
        if(empty($_GET['idPanier']) AND is_numeric($_GET['idPanier'])){
            header("Location: affichePanier.php");
        }
    }
    $id_panier= $_GET['idPanier'];

    require("../config/config.php");

    $Produits=afficherPanier();
    
    foreach($Produits as $produit):
     
        $id_panier=$produit->id_panier ;
        $id=$produit->id ;
        $titre=$produit->titre ;
        $prix=$produit->prix ;
        $qte=$produit->qte ;
        $datecommande=$produit->dateCommande ;
    endforeach; 

?>
    <div class="album py-5 bg-light " style="margin-left: 30vh;">
        <div class="container">
            
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <h4 class="text-center"> <span class="text-primary">Confirmer un commande</span></h4>
            
            
                <form method="post" enctype="multipart/form-data">
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
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Id</label>
                        <div class="input-group mb-3">
                            <div class="input-group">
                                <input name="id_panier"  type="text" value="<?= $id_panier ?>" class="form-control"   aria-label="Upload">
                            </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Id</label>
                        <div class="input-group mb-3">
                            <div class="input-group">
                                <input name="id"  type="text" value="<?= $id ?>" class="form-control"  >
                            </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Titre</label>
                        <div class="input-group mb-3">
                            <div class="input-group">
                                <input name="titre" type="text" value="<?= $titre ?>" class="form-control"  >
                            </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Prix</label>
                        <input type="text" class="form-control" name="prix" value="<?= $prix ?>"  required>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Quantité</label>
                        <input type="text" class="form-control" name="qte" value="<?= $qte ?>"  required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Date de commande</label>
                        <input type="Date" class="form-control" name="dateCommande" value="<?= $datecommande ?>"  required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Date de confirmation</label>
                        <input type="Date" class="form-control" name="dateConfirmer" value="<?= date('Y-m-d')?>"  required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="valider">Confirmer</button>
                </form>
            </div>
        </div>
    </div>
<!-- </body>
</html> -->

<?php

    if(isset($_POST['valider']))
    {
    
                $id_panier = ($_POST['id_panier']);
                $id = ($_POST['id']);
                $titre = ($_POST['titre']);
                $prix = ($_POST['prix']);
                $qte = ($_POST['qte']);
                $dateComande = ($_POST['dateCommande']);
                $dateConfirmer = ($_POST['dateConfirmer']);

    
                voir($id_panier, $id, $titre, $prix, $qte, $dateComande, $dateConfirmer);

                $idPan = $_POST['id_panier'];
                $req=$conn->prepare("DELETE FROM `tb_panier` WHERE id_panier=?");
            
                $req->execute(array($idPan));
    }

    


?>