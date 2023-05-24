<?php 
    include_once'connectdb.php';

    if($_SESSION['useremail']=="" OR $_SESSION['role']=="User"){
        header('location:index.php');
      }
    
    $id=$_POST['pidd'];

    // detele t1, t2 from t1 inner join t2 on t1.key = t2.key where condition t1.key=id;
    $sql="delete tbl_invoice, tbl_invoice_details from tbl_invoice INNER JOIN tbl_invoice_details ON tbl_invoice.invoice_id = tbl_invoice_details.invoice_id
    where tbl_invoice.invoice_id = $id";

    $delete=$pdo->prepare($sql);

    if($delete->execute()){
        
    }else{
        echo'error in deleting';
    }


?>