<?php 
    include_once'connectdb.php';

    if($_SESSION['useremail']=="" OR $_SESSION['role']=="User"){
        header('location:index.php');
      }
    
    $id=$_POST['pidd'];

    $sql="delete from tbl_product where pid=$id";
    $delete=$pdo->prepare($sql);

    if($delete->execute()){
        
    }else{
        echo'error in deleting';
    }


?>