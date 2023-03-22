<?php
    include'dashboard.php';
    $Produits=afficher();
?>

    <div class="album py-5 bg-light" style="margin-left: 35vh;">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <form method="post">
                <div class="mb-3">
                    <h4 class="text-center"> <span class="text-primary">Supprimer un film</span></h4>
                    <label for="exampleInputPassword1" class="form-label">Identifiant du film</label>
                    <input type="number" class="form-control" name="idfilm"  required>

                </div>
                <button type="submit" class="btn btn-danger"  name="valider">Supprimer</button>
                
            </form>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach($Produits as $produit): ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="../uploads/<?= $produit->image ?>">
                            <h3><?= $produit->id ?></h3>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            </div>
        </div>
    </div>


<?php
     

    if(isset($_POST['valider']))
    {
        if(isset($_POST['idfilm']))
        {
            if(!empty($_POST['idfilm']) AND is_numeric($_POST['idfilm']) )
            {
                $idfilm = htmlspecialchars(strip_tags($_POST['idfilm']));

                try
                {
                    supprimer($idfilm);

                
                } catch (Exception $e)
                {
                    $e->getMessage();
                }

            }
        }
    }

?>