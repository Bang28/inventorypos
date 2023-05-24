<?php 
    include_once'connectdb.php';
    session_start();

    if($_SESSION['useremail']==""){
        header('location:index.php');
      }

      if($_SESSION['role']=="Admin"){
        include_once'header.php';
      }else{
        include_once'headeruser.php';
      }




  if(isset($_POST['btnupdate'])){
    $oldpassword_txt=$_POST['btnoldpass'];
    $newpassword_txt=$_POST['btnnewpass'];
    $confpassword_txt=$_POST['btnconfpass'];

    //echo $oldpassword_txt."-".$newpassword_txt."-".$confpassword_txt;

    $email=$_SESSION['useremail'];

    $select=$pdp->prepare("select * from tbl_user where useremail='$email'");
    $select->execute();
    $row=$select->fetch(PDO::FETCH_ASSOC);

    echo $row['useremail'];
    echo $row['username'];
  }

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Change Password
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Change Password Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="post">
              <div class="box-body">

                <div class="form-group">
                  <label for="exampleInputPassword1">Old Password</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password" name="txtoldpass">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">New Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="txtnewpass">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Confirm Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="txtconfpass">
                </div>

                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="btnupdate">Update</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php 
  
  include_once'footer.php';
  
  ?>
 