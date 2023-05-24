<?php 
    include_once('connectdb.php');
    session_start();

    if($_SESSION['useremail']=="" OR $_SESSION['role']=="User"){
      header('location:index.php');
    }

    include_once'header.php';

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product List
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

        <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Product List</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
              <div style="overflow-x:auto">
            <table id="producttable" class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Purchaseprice</th>
                    <th>Salesprice</th>
                    <th>Stock</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>


                <?php 
                $select = $pdo->prepare("select * from tbl_product order by pid desc");
                $select->execute();

                while ($row=$select->fetch(PDO::FETCH_OBJ)){
                  echo '
                  <tr>
                  <td>'.$row->pid.'</td>
                  <td>'.$row->pname.'</td>
                  <td>'.$row->pcategory.'</td>
                  <td>'.$row->purchaseprice.'</td>
                  <td>'.$row->saleprice.'</td>
                  <td>'.$row->pstock.'</td>
                  <td>'.$row->pdescription.'</td>
                  <td>
                  <img src="productimages/'.$row->pimage.'" class="img-rounded" width="40px" height="40px"/>
                  </td>
                  <td>
                  <a href="viewproduct.php?id='.$row->pid.'" class="btn btn-success" role="button">
                  <span class="glyphicon glyphicon-eye-open" style="color:ffffff" data-toggle="tooltip" title="view product"></span></a>
                  </td>
                  <td>
                  <a href="editproduct.php?id='.$row->pid.'" class="btn btn-info" role="button">
                  <span class="glyphicon glyphicon-edit" style="color:ffffff" data-toggle="tooltip" title="edit product"></span></a>
                  </td>
                  <td>
                  <button id='.$row->pid.' class="btn btn-danger btndelete">
                  <span class="glyphicon glyphicon-trash" style="color:ffffff" data-toggle="tooltip" title="delete product"></span></button>
                  </td>
                  </tr>';
                }


                  ?>
             
             </tbody>
              </table>
              </div>
            </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    <!-- Initialising DataTables -->
    <script>
        $(document).ready( function () {
            $('#producttable').DataTable({
                "Order":[[0,"desc"]]
            });
        } );
    </script>
        <script>
        $(document).ready( function () {
            $('[data-toggle="tooltip"]').tooltip();
        } );
    </script>

    <script>
            $(document).ready( function () {
            $('.btndelete').click(function(){
                var tdh = $(this);
                var id = $(this).attr("id");

                swal({
                title: "Are you sure, do you want to delete product?",
                text: "Once product is deleted, you will not be able to recover this product!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {

                  $.ajax({
                          url: "productdelete.php",
                          type: "post",
                          data: {
                            pidd: id
                          },
                          success: function(data) {
                            tdh.parents('tr').hide();
                          }
                });


                  swal("Your product has been deleted!", {
                    icon: "success",
                  });
                } else {
                  swal("Your product is safe!");
                }
              });

                        
            });
        } );
    </script>

  <?php 
  
  include_once'footer.php';
  
  ?>
 