<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
if(empty($_SESSION['branch'])):
header('Location:../index.php');
endif;


include('adminlogin.php');
include('brandModal.php');
include('recordModal.php');
include('adminCat.php');
include('adminPay.php');
include('adminSup.php');
include('inventLogin.php');
include('SaleLogin.php');
include('RecLogin.php');
include('IncomeLogin.php');

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home | <?php include('../dist/includes/title.php');?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <style>
      .col-lg-3{
        margin:50px 0px;
      }
      
    </style>
 </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-<?php echo $_SESSION['skin'];?> layout-top-nav" onload="myFunction()">
    <div class="wrapper">
      <?php include('../dist/includes/header.php');?>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
         

          <!-- Main content -->
          <section class="content">
            <div class="row">
	     <!-- <div class="col-md-8"> -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Transactions</h3>
                   </div><!-- /.box-header -->
                    <div class="box-body">
                      <div class="row">
                       <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                          <div class="inner">
                            <h3>Purchase</h3>
                            <p>Cash</p>
                          </div>
                          <div class="icon" style="margin-top:10px">
                            <i class="glyphicon glyphicon-euro"></i>
                          </div>
                          <a href="cust_new.php" class="small-box-footer">
                            Go <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div><!-- ./col -->


                      <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                          <div class="inner">
                            <h3>Stocking</h3>
                            <p>Products</p>
                          </div>
                          <div class="icon" style="margin-top:10px">
                            <i class="glyphicon glyphicon-share-alt"></i>
                          </div>
                          <a href="stockin.php" class="small-box-footer">
                            Go <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div><!-- ./col -->
                      
                      <!-- Payment section -->
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-yellow">
                          <div class="inner">
                            <h3>Payment</h3>
                            <p>Customer</p>
                          </div>
                          <div class="icon" style="margin-top:10px">
                            <i class="glyphicon glyphicon-usd"></i>
                          </div>
                          <a href="customer.php" class="small-box-footer">
                            Go <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div>
                      <!-- Payment section -->

                      <!-- 
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-yellow">
                          <div class="inner">
                            <h3>Payment</h3>
                            <p>Customer</p>
                          </div>
                          <div class="icon" style="margin-top:10px">
                            <i class="glyphicon glyphicon-usd"></i>
                          </div>
                          <a href="#adminpaymentLogin" class="small-box-footer" data-target="#adminpaymentLogin" data-toggle="modal">
                            Go <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div> --><!-- ./col -->

                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-red">
                          <div class="inner">
                            <h3>Creditors</h3>
                            <p>Apply</p>
                          </div>
                          <div class="icon" style="margin-top:10px">
                            <i class="glyphicon glyphicon-user"></i>
                          </div>
                          <a href="creditor.php" class="small-box-footer">
                            Go <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div><!-- ./col -->


                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-orange">
                          <div class="inner">
                            <h3>Products</h3>
                            <p>View/Add</p>
                          </div>
                          <div class="icon" style="margin-top:10px">
                            <i class="glyphicon glyphicon-shopping-cart"></i>
                          </div>
                          <a href="#adminLogin" class="small-box-footer" data-target="#adminLogin" data-toggle="modal">
                            Go <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div><!-- ./col -->

                       <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-purple">
                          <div class="inner">
                            <h3>Brands</h3>
                            <p>View/Add</p>
                          </div>
                          <div class="icon" style="margin-top:10px">
                            <i class="glyphicon glyphicon-btc"></i>
                          </div>
                          <a href="adminBrandLogin" class="small-box-footer" data-target="#adminBrandLogin" data-toggle="modal">
                            Go <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div><!-- ./col -->
                        <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-purple">
                          <div class="inner">
                            <h3>Records</h3>
                            <p>View</p>
                          </div>
                          <div class="icon" style="margin-top:10px">
                            <i class="glyphicon glyphicon-th"></i>
                          </div>
                          <a href="#adminrecordLogin" class="small-box-footer" data-target="#adminrecordLogin" data-toggle="modal">
                            Go <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div>

                       <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-blue">
                          <div class="inner">
                            <h3>Categories</h3>
                            <p>View/Add</p>
                          </div>
                          <div class="icon" style="margin-top:10px">
                            <i class="glyphicon glyphicon-gift"></i>
                          </div>
                          <a href="#admincatLogin" class="small-box-footer" data-target="#admincatLogin" data-toggle="modal">
                            Go <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div><!-- ./col -->

                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box bg-green">
                          <div class="inner">
                            <h3>Suppliers</h3>
                            <p>View/Add</p>
                          </div>
                          <div class="icon" style="margin-top:10px">
                            <i class="glyphicon glyphicon-user"></i>
                          </div>
                          <a href="#adminsupLogin" class="small-box-footer" data-target="#adminsupLogin" data-toggle="modal">
                            Go <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div><!-- ./col -->

                      <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-orange">
                          <div class="inner">
                            <h3>Installment</h3>
                            <p>Apply</p>
                          </div>
                          <div class="icon" style="margin-top:10px">
                            <i class="glyphicon glyphicon-user"></i>
                          </div>
                          <a href="install.php" class="small-box-footer">
                            Go <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div><!-- ./col -->
                  </div><!--row-->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (right) -->	
          </div><!-- /.row -->
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->


      <!-- Admin product login modal -->
<div id="adminLogin" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Administrator Only</h4>
              </div>
              <div class="modal-body">

          <div class="messages">
          <?php 
          if($errors)
          {
            foreach ($errors as $key => $value) {
              echo '<div class="alert alert-warning  role="alert">
              <i class="glyphicon glyphicon-exclamation-sign"></i>
              '.$value.'
              </div>';
            }
          }

          ?>
        </div>
        <form class="form-horizontal" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <div class="form-group">
          <label class="control-label col-sm-3">Admin Username</label>
          <div class="col-sm-9"> 
            <input type="text" class="form-control" name="admin_username">  
          </div>
        </div> 
      
        
        <div class="form-group">
          <label class="control-label col-sm-3">Admin Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" name="admin_pass">  
          </div>
        </div>

              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="admin_login" class="btn btn-primary">Login</button>            
              </div>
        </form>
            </div>
      
        </div><!--end of modal-dialog-->
 </div>


  <!-- Admin brand login modal -->
<div id="adminBrandLogin" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Administrator Only</h4>
              </div>
              <div class="modal-body">
          
          <div class="messages">
          <?php 
          if($error)
          {
            foreach ($error as $key => $value) {
              echo '<div class="alert alert-warning  role="alert">
              <i class="glyphicon glyphicon-exclamation-sign"></i>
              '.$value.'
              </div>';
            }
          }

          ?>
        </div>
        <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                
        <div class="form-group">
          <label class="control-label col-sm-3">Admin Username</label>
          <div class="col-sm-9"> 
            <input type="text" class="form-control" name="admin_name">  
          </div>
        </div> 
      
        
        <div class="form-group">
          <label class="control-label col-sm-3">Admin Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" name="admin_password">  
          </div>
        </div>

              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="log_brand_admin" class="btn btn-primary">Login</button>            
              </div>
        </form>
            </div>
      
        </div><!--end of modal-dialog-->
 </div>





  <!-- Admin record login modal -->
<div id="adminrecordLogin" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Administrator Only</h4>
              </div>
              <div class="modal-body">
          
          <div class="messages">
          <?php 
          if($bug)
          {
            foreach ($bug as $key => $value) {
              echo '<div class="alert alert-warning  role="alert">
              <i class="glyphicon glyphicon-exclamation-sign"></i>
              '.$value.'
              </div>';
            }
          }

          ?>
        </div>
        <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                
        <div class="form-group">
          <label class="control-label col-sm-3">Admin Username</label>
          <div class="col-sm-9"> 
            <input type="text" class="form-control" name="ad_name">  
          </div>
        </div> 
      
        
        <div class="form-group">
          <label class="control-label col-sm-3">Admin Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" name="ad_password">  
          </div>
        </div>
              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="log_record_admin" class="btn btn-primary">Login</button>            
                </div>
              </form>
            </div>
          </div><!--end of modal-dialog-->
      </div>


      <!-- Admin payment login modal -->
<div id="adminpaymentLogin" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Administrator Only</h4>
              </div>
              <div class="modal-body">
          
          <div class="messages">
          <?php 
          if($miss)
          {
            foreach ($miss as $key => $value) {
              echo '<div class="alert alert-warning  role="alert">
              <i class="glyphicon glyphicon-exclamation-sign"></i>
              '.$value.'
              </div>';
            }
          }

          ?>
        </div>
        <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                
        <div class="form-group">
          <label class="control-label col-sm-3">Admin Username</label>
          <div class="col-sm-9"> 
            <input type="text" class="form-control" name="admin_pay_name">  
          </div>
        </div> 
      
        
        <div class="form-group">
          <label class="control-label col-sm-3">Admin Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" name="admin_pay_password">  
          </div>
        </div>
              </div>
              <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="log_pay_admin" class="btn btn-primary">Login</button>            
                </div>
              </form>
            </div>
          </div><!--end of modal-dialog-->
      </div>


      <!-- Admin category login modal -->
<div id="admincatLogin" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Administrator Only</h4>
              </div>
              <div class="modal-body">
          
          <div class="messages">
          <?php 
          if($wrong)
          {
            foreach ($wrong as $key => $value) {
              echo '<div class="alert alert-warning  role="alert">
              <i class="glyphicon glyphicon-exclamation-sign"></i>
              '.$value.'
              </div>';
            }
          }

          ?>
        </div>
        <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                
        <div class="form-group">
          <label class="control-label col-sm-3">Admin Username</label>
          <div class="col-sm-9"> 
            <input type="text" class="form-control" name="admin_cat_name">  
          </div>
        </div> 
      
        
        <div class="form-group">
          <label class="control-label col-sm-3">Admin Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" name="admin_cat_password">  
          </div>
        </div>
              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="log_cat_admin" class="btn btn-primary">Login</button>            
                </div>
              </form>
            </div>
          </div><!--end of modal-dialog-->
      </div>


       <!-- Admin supplier login modal -->
<div id="adminsupLogin" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Administrator Only</h4>
              </div>
              <div class="modal-body">
          
          <div class="messages">
          <?php 
          if($handle_errors)
          {
            foreach ($handle_errors as $key => $value) {
              echo '<div class="alert alert-warning  role="alert">
              <i class="glyphicon glyphicon-exclamation-sign"></i>
              '.$value.'
              </div>';
            }
          }

          ?>
        </div>
        <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                
        <div class="form-group">
          <label class="control-label col-sm-3">Admin Username</label>
          <div class="col-sm-9"> 
            <input type="text" class="form-control" name="admin_sup_name">  
          </div>
        </div> 
      
        
        <div class="form-group">
          <label class="control-label col-sm-3">Admin Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" name="admin_sup_password">  
          </div>
          </div>
              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="log_sup_admin" class="btn btn-primary">Login</button>            
                </div>
              </form>
            </div>
          </div><!--end of modal-dialog-->
      </div>



      <!-- Inventory login modal -->
<div id="InventoryLogin" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Administrator Only</h4>
              </div>
              <div class="modal-body">
          
          <div class="messages">
          <?php 
          if($invent_error)
          {
            foreach ($invent_error as $key => $value) {
              echo '<div class="alert alert-warning  role="alert">
              <i class="glyphicon glyphicon-exclamation-sign"></i>
              '.$value.'
              </div>';
            }
          }

          ?>
        </div>
        <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                
        <div class="form-group">
          <label class="control-label col-sm-3">Admin Username</label>
          <div class="col-sm-9"> 
            <input type="text" class="form-control" name="invent_name">  
          </div>
        </div> 
      
        
        <div class="form-group">
          <label class="control-label col-sm-3">Admin Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" name="invent_password">  
          </div>
        </div>

              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="invent_admin" class="btn btn-primary">Login</button>            
              </div>
        </form>
            </div>
      
        </div><!--end of modal-dialog-->
 </div>



      <!-- Sales login modal -->
<div id="SalesLogin" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Administrator Only</h4>
              </div>
              <div class="modal-body">
          
          <div class="messages">
          <?php 
          if($sales_error)
          {
            foreach ($sales_error as $key => $value) {
              echo '<div class="alert alert-warning  role="alert">
              <i class="glyphicon glyphicon-exclamation-sign"></i>
              '.$value.'
              </div>';
            }
          }

          ?>
        </div>
        <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                
        <div class="form-group">
          <label class="control-label col-sm-3">Admin Username</label>
          <div class="col-sm-9"> 
            <input type="text" class="form-control" name="sale_name">  
          </div>
        </div> 
      
        
        <div class="form-group">
          <label class="control-label col-sm-3">Admin Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" name="sale_password">  
          </div>
        </div>

              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="sale_admin" class="btn btn-primary">Login</button>            
              </div>
            </form>
            </div>
      
        </div><!--end of modal-dialog-->
 </div>



      <!-- Amount Receivables login modal -->
<div id="RecLogin" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Administrator Only</h4>
              </div>
              <div class="modal-body">
          
          <div class="messages">
          <?php 
          if($rec_error)
          {
            foreach ($rec_error as $key => $value) {
              echo '<div class="alert alert-warning  role="alert">
              <i class="glyphicon glyphicon-exclamation-sign"></i>
              '.$value.'
              </div>';
            }
          }

          ?>
        </div>
        <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                
        <div class="form-group">
          <label class="control-label col-sm-3">Admin Username</label>
          <div class="col-sm-9"> 
            <input type="text" class="form-control" name="rec_name">  
          </div>
        </div> 
      
        
        <div class="form-group">
          <label class="control-label col-sm-3">Admin Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" name="rec_password">  
          </div>
        </div>

              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="rec_admin" class="btn btn-primary">Login</button>            
              </div>
            </form>
            </div>
      
        </div><!--end of modal-dialog-->
 </div>


      <!-- Income login modal -->
<div id="IncomeLogin" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Administrator Only</h4>
              </div>
              <div class="modal-body">
          
          <div class="messages">
          <?php 
          if($income_error)
          {
            foreach ($income_error as $key => $value) {
              echo '<div class="alert alert-warning  role="alert">
              <i class="glyphicon glyphicon-exclamation-sign"></i>
              '.$value.'
              </div>';
            }
          }

          ?>
        </div>
        <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                
        <div class="form-group">
          <label class="control-label col-sm-3">Admin Username</label>
          <div class="col-sm-9"> 
            <input type="text" class="form-control" name="income_name">  
          </div>
        </div> 
      
        
        <div class="form-group">
          <label class="control-label col-sm-3">Admin Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" name="income_password">  
          </div>
        </div>

              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="income_admin" class="btn btn-primary">Login</button>           
              </div>
            </form>
            </div>
      
        </div><!--end of modal-dialog-->
 </div>





  <?php include('../dist/includes/footer.php');?>
  </div><!-- ./wrapper -->
	<script>
    $(function() {
      $(".btn_delete").click(function(){
      var element = $(this);
      var id = element.attr("id");
      var dataString = 'id=' + id;
      if(confirm("Sure you want to delete this item?"))
      {
	$.ajax({
	type: "GET",
	url: "temp_trans_del.php",
	data: dataString,
	success: function(){
		
	      }
	  });
	  
	  $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
	  .animate({ opacity: "hide" }, "slow");
      }
      return false;
      });

      });
    </script>
	
	<script type="text/javascript" src="autosum.js"></script>
  
    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script src="../dist/js/jquery.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/select2/select2.full.min.js"></script>
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
     <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
  </body>
</html>

