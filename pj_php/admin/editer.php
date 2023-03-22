<?php
    include'dashboard.php';
    
    if(isset($_GET['pdt'])){
        if(empty($_GET['pdt']) AND is_numeric($_GET['pdt'])){
            header("Location: afficheProduit.php");
        }
    }
    $id= $_GET['pdt'];
    
    require("../config/config.php");
    $Produits=getProduit($id);
    
    foreach($Produits as $produit):{
        $titre = $produit->titre;
        $image = $produit->image;
        $description = $produit->description;
        $id = $produit->id;
        $prix = $produit->prix;
    }
    endforeach;

?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>Administrateur</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body> -->
    <div class="album py-5 bg-light " style="margin-left: 15vh;">
        <div class="container">
            
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <h4 class="text-center"> <span class="text-primary">Modifier un film</span></h4>
            
            
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
                                <input name="id" disabled type="txt" value="<?= $id ?>" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                            </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Image</label>
                        <div class="input-group mb-3">
                            <div class="input-group">
                                <input name="image" type="file" value="<?= $image ?>" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                            </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Titre du film</label>
                        <input type="text" class="form-control" value="<?= $titre ?>" name="titre" required>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Desrciption</label>
                        <textarea type="text" class="form-control"  name="desc"  required ><?= $description ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Prix</label>
                        <input type="number" class="form-control" name="prix" value="<?= $prix ?>"  required>

                    </div>
                    <button type="submit" class="btn btn-primary" name="valider">Modifier</button>
                </form>
            </div>
        </div>
    </div>
<!-- </body>
</html> -->

<?php

    if(isset($_POST['valider']))
    {
        if( isset($_POST['titre']) AND isset($_POST['desc']) AND isset($_POST['prix']))
        {
            if(!empty($_POST['titre']) AND !empty($_POST['desc']) AND !empty($_POST['prix']) )
            {
                $titre = htmlspecialchars(strip_tags($_POST['titre']));
                $desc = htmlspecialchars(strip_tags($_POST['desc']));
                $prix = htmlspecialchars(strip_tags($_POST['prix']));

                if(isset($_FILES['image'])){
                    #get data and store them in var
                    $img_name = $_FILES['image'] ['name'];
                    $tmp_name = $_FILES['image'] ['tmp_name'];
                    $error = $_FILES['image'] ['error'];
                
                    #if there is not error occurred while uploading
                      if($error === 0){
                      #get image extension store it in var
                      $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                      
                      #convert the image extension into lower case
                      #and store it in var   
                      $img_ex_lc = strtolower($img_ex);
                
                      #creating array that stores allwed 
                      #to upload image extension
                      $allowed_exs = array("jpg", "jpeg", "png");
                
                      #check if the image extension 
                      #is present in $allowed_exs array
                        if(in_array($img_ex_lc,$allowed_exs)){
                
                                #Remaining the image with user's username
                                #like: username.$img_ex_lc
                                $new_img_name = $titre.'.'.$img_ex_lc;
                
                                #creating upload path on root directory
                                $img_upload_path = '../uploads/'.$new_img_name;
                                
                                #move the uploaded image to ./uploaded folder
                                $uploads = move_uploaded_file($tmp_name,$img_upload_path);
                              
                
                        }else{
                              $message="You can't upload files of this type of file";
                              header("Location:../admin/index.php?&success=$message");
                              exit;
                
                        }
                      }
                }else{
                    $message="erreur d'ajout d'image";
                    header("Location:../admin/index.php?error=$message");
                }
                    modifier($titre, $new_img_name, $desc, $prix, $id);
        }
    }
}

?>