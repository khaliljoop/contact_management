<?php

// Database connection info 
  $host='localhost';
  $username='root';
  $password='';
  $dbname = "test";
  $conn=mysqli_connect($host,$username,$password,"$dbname");


if ($_POST['mode'] === 'add') {
     
     $prenom = $_POST['prenom'];
     $nom = $_POST['nom'];
     $telephone = $_POST['telephone'];
     $cat =$_POST['id_categorie'];

     if($_POST['id']===''){

          mysqli_query($conn, "INSERT INTO contact(prenom,nom,telephone,id_categorie)
          VALUES ('$prenom','$nom','$telephone',$cat)");
          echo json_encode(true);
     }
     else{
          mysqli_query($conn,"UPDATE contact set  prenom='" . $_POST['prenom'] . "',nom='" . $_POST['nom'] . "', telephone='" . $_POST['telephone'] ."', id_categorie='" . $_POST['id_categorie'] . "' WHERE id='" . $_POST['id'] . "'");
          echo json_encode(true);
     }
}  

if ($_POST['mode'] === 'edit') {
    
    $result = mysqli_query($conn,"SELECT * FROM contact WHERE id='" . $_POST['id'] . "'");
    $row= mysqli_fetch_array($result);

     echo json_encode($row);
}  

if ($_POST['mode'] === 'delete') {
     
     mysqli_query($conn, "DELETE FROM contact WHERE id='" . $_POST["id"] . "'");
     echo json_encode(true);
}  

?>