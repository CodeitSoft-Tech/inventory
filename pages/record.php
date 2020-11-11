<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

  include('newDB.php');

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Records | <?php include('../dist/includes/title.php');?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <style>
      
    </style>
 </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-<?php echo $_SESSION['skin'];?> layout-top-nav">
    <div class="wrapper">
      <?php include('../dist/includes/header.php');?>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
  
      <section class="content">
      <h1><a class="btn btn-lg btn-warning" href="home.php">Back</a></h1>
      <div class="row" style="margin: 20px;">
      <div class="col-lg-4 col-xs-6">
        <div class="panel panel-default">
         <div class="panel-heading"><strong><center>Total Users</center></strong></div>
           <div class="panel-body" align="center">
           <h1><?php echo ShowUsers(); ?></h1>
            </div>
           </div>
          </div>
        
          <div class="col-lg-4 col-xs-6">
            <div class="panel panel-default">
             <div class="panel-heading"><strong><center>Total Brands</center></strong></div>
               <div class="panel-body" align="center">
               <h1><?php echo ShowBrands(); ?></h1>
                </div>
               </div>
              </div>
          
      <div class="col-lg-4 col-xs-6">
        <div class="panel panel-default">
          <div class="panel-heading"><strong><center>Total Categories</center></strong></div>
            <div class="panel-body" align="center">
               <h1><?php echo ShowCat(); ?></h1>
                </div>
               </div>
              </div>
               
          <div class="col-lg-4 col-xs-6">
            <div class="panel panel-default">
             <div class="panel-heading"><strong><center>Total Products</center></strong></div>
               <div class="panel-body" align="center">
               <h1><?php echo ShowProd(); ?></h1>
                </div>
               </div>
              </div>

        <div class="col-lg-4 col-xs-6">
      <div class="panel panel-default">
        <div class="panel-heading"><strong><center>Total Creditors</center></strong></div>
          <div class="panel-body" align="center">
            <h1><?php echo ShowCred(); ?></h1>
              </div>
                </div>
                  </div>

    <div class="col-lg-4 col-xs-6">
      <div class="panel panel-default">
        <div class="panel-heading"><strong><center>Total Suppliers</center></strong></div>
          <div class="panel-body" align="center">
            <h1><?php echo ShowSupplier(); ?></h1>
              </div>
                </div>
                  </div>

    <div class="col-lg-4 col-xs-6">
      <div class="panel panel-default">
        <div class="panel-heading"><strong><center>Total Customers</center></strong></div>
          <div class="panel-body" align="center">
            <h1><?php echo ShowCust(); ?></h1>
              </div>
                </div>
                  </div>
                  
                  
      <div class="col-lg-4 col-xs-6">
      <div class="panel panel-default">
        <div class="panel-heading"><strong><center>Total Discounts</center></strong></div>
          <div class="panel-body" align="center">
            <h1><?php echo ShowDiscount(); ?></h1>
              </div>
                </div>
                  </div>

      <div class="col-lg-4 col-xs-6">
      <div class="panel panel-default">
        <div class="panel-heading"><strong><center>Total Sales</center></strong></div>
          <div class="panel-body" align="center">
            <h1><?php echo ShowSales(); ?></h1>
              </div>
                </div>
                  </div>

    <div class="col-lg-4 col-xs-6">
      <div class="panel panel-default">
        <div class="panel-heading"><strong><center>Total Amount On Credit</center></strong></div>
          <div class="panel-body" align="center">
            <h1><?php echo ShowCreditorAmt(); ?></h1>
              </div>
                </div>
                  </div>

    <div class="col-lg-4 col-xs-6">
      <div class="panel panel-default">
        <div class="panel-heading"><strong><center>Total Credit Amount Paid</center></strong></div>
          <div class="panel-body" align="center">
            <h1><?php echo ShowCreditorAmtPaid(); ?></h1>
              </div>
                </div>
                  </div>

      <div class="col-lg-4 col-xs-6">
      <div class="panel panel-default">
        <div class="panel-heading"><strong><center>Total Credit Amount Left</center></strong></div>
          <div class="panel-body" align="center">
            <h1><?php echo ShowCreditorAmtleft(); ?></h1>
              </div>
                </div>
                  </div>
                    </div>           
              </section>




  

      </div>
    </div>
    <?php include('../dist/includes/footer.php');?>
  </div>


 
              <!-- Add New Brand Modal -->





     









          
 <!--end of modal--> 
    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>
