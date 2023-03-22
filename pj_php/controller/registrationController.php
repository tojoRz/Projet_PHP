<?php
session_start();

require '../config/config.php';


if (isset($_POST["envoyer"])){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];

    
  $req = "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email' ";
  $prepar = $conn->prepare($req);
  $prepar->execute();
  if($prepar->rowCount() > 0){
    $data = $prepar->fetchAll(PDO::FETCH_OBJ);

    return $data;
    echo
    " <script> alert('Veuillez choisir une autre Username ou Email');</script>";
  }
  else{
    if($password == $confirmpassword){

      $req = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
      $prepar = $conn->prepare($req);
      $prepar->execute();

      echo
      $message="Inscription  effectuer";
      header("Location:../login.php?&success=$message");
    }
    else{
      echo
    " <script> alert('Mot de passe n'est pas identique');</script>";
    }
  }
}




?>
