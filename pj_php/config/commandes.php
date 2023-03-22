<?php
    function ajouter($titre, $new_img_name, $desc, $prix)
    {
        if(require("config.php"))
        {              
                $req ="INSERT INTO `tb_product`(`titre`, `image`, `description`, `prix`) VALUES (?,?,?,?)";
                $prepare = $conn->prepare($req);
                $prepare -> execute([$titre, $new_img_name, $desc, $prix]); 
                
                $message="ajout effectuer";
                header("Location:../admin/index.php?&success=$message");
        }else{
            $message="ajout ne peut pas effectuer";
            header("Location:../admin/index.php?&error=$message");
        }
    }

    function afficher()
    {
        if(require("config.php"))
        {
            $req=$conn->prepare("SELECT * FROM `tb_product` ORDER BY id DESC");
        
            $req->execute();

            $data = $req->fetchAll(PDO::FETCH_OBJ);

            return $data;

            $req->closeCursor(); 
        }
    }
    function afficherPanier()
    {
        if(require("config.php"))
        {
            $req=$conn->prepare("SELECT * FROM `tb_panier` ORDER BY id_panier DESC");
        
            $req->execute();

            $data = $req->fetchAll(PDO::FETCH_OBJ);

            return $data;

            $req->closeCursor(); 
        }
    }
    function afficherCommande()
    {
        if(require("config.php"))
        {
            $req=$conn->prepare("SELECT * FROM `tb_commande` ORDER BY `id_commande` DESC");
        
            $req->execute();

            $data = $req->fetchAll(PDO::FETCH_OBJ);

            return $data;

            $req->closeCursor(); 
        }
    }
    function afficherClient()
    {
        if(require("config.php"))
        {
            $req=$conn->prepare("SELECT * FROM `tb_user` ORDER BY id DESC");
        
            $req->execute();

            $data = $req->fetchAll(PDO::FETCH_OBJ);

            return $data;

            $req->closeCursor(); 
        }
    }
    function supprimer($id)
    {
        if(require("config.php"))
        {
            $req=$conn->prepare("DELETE FROM tb_product WHERE id=?");
            
            $req->execute(array($id));

            
        }
    }
    function getProduit($id)
    {
        if(require("config.php"))
        {
            $req=$conn->prepare("SELECT * FROM `tb_product` WHERE id=?");
        
            $req->execute([$id]);

            if($req-> rowCount() == 1){
                $data = $req->fetchAll(PDO::FETCH_OBJ);

                return $data;
            }else{
                return false;
            }

            $req->closeCursor(); 
        }
    }
    function modifier($titre, $new_img_name, $desc, $prix, $id)
    {
        if(require("config.php"))
        {                
                $req ="UPDATE `tb_product` SET `titre`=?, `image`=?, `description`=?, `prix`=? WHERE `id`=?";
                $prepare = $conn->prepare($req);
                $prepare -> execute([$titre, $new_img_name, $desc, $prix, $id]); 
                
                $message="Modification  effectuer";
                header("Location:admin/editer.php?&success=$message");
        }else{
            $message="Modification ne peut pas effectuer";
            header("Location:admin/editer.php?&error=$message");
        }
    }
    function voir($id_panier, $id, $titre, $prix, $qte, $dateComande, $dateConfirmer)
    {
        if(require("config.php"))
        {                
                $req ="INSERT INTO `tb_commande`(`id_panier`, `id`, `titre`, `prix`, `qte`, `dateComande`, `dateConfimer`)VALUES (?,?,?,?,?,?,?)";
                $prepare = $conn->prepare($req);
                $prepare -> execute([$id_panier, $id, $titre, $prix, $qte, $dateComande, $dateConfirmer]); 
                
               
        }
    }

?>