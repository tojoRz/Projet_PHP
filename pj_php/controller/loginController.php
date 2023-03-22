<?php
    session_start();

    require '../config/config.php';

    if(isset($_POST["email"]) && isset($_POST["password"])){
        $email = ($_POST["email"]);
        $_pass  = ($_POST["password"]);

        $data = "&email=".$email;

        if(empty($email)){
            $error = "Veuillez insérer votre identifiant ";
            header("Location:../login.php?error=$error&data=$data");
            exit;
        }
        elseif(empty($_pass)){
            $error = "Votre mot de passe s'il vous plait !!";
            header("Location:../login.php?error=$error&data=$data");
            exit;
    }else{
        $req = "SELECT * FROM tb_user WHERE `email`= ? AND `password`= ?";
        $prepar = $conn->prepare($req);
        $prepar->execute([$email,$_pass]);

            if ($prepar->rowCount() === 1) {
                $utilisateur = $prepar->fetch();
                    
                    $_SESSION['email'] = $utilisateur['email'];
                        
                    if($utilisateur['email']==='admin@admin.com'){
                        $_SESSION['email'] = $utilisateur['email'];
                        $_SESSION['id'] = $utilisateur['id'];

                        header("Location:../admin/dashboard.php");
                        exit;
                        
                    }else{
                        $_SESSION['email'] = $utilisateur['email'];
                        $_SESSION['id'] = $utilisateur['id'];
                        header("Location:../index.php");
                        exit;
                    }
            }else{
                $error = "Votre email ou mot de passe n'est pas authentifié, veuillez vérifier !!";
                header("Location:../login.php?error=$error&data=$data");
                exit;
            }
        }
    }
?>