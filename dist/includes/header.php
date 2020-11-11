<?php
//session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
date_default_timezone_set("Africa/Accra"); 
?>
<?php
include('../dist/includes/dbcon.php');
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


$branch=$_SESSION['branch'];
$query=mysqli_query($con,"select * from branch where branch_id='$branch'")or die(mysqli_error($con));
  $row=mysqli_fetch_array($query);
  $branch_name=$row['branch_name'];
?>

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header" style="padding-left:20px">
              <a href="home.php" class="navbar-brand"><b><i class="glyphicon glyphicon-home"></i> <?php echo $branch_name;?> </b></a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

            <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <!-- Messages: style can be found in dropdown.less-->
				            <li class="">
                
                    <a href="log.php" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-list-alt"></i>
                      History Log
                    </a>
                  </li>
                  <!-- Notifications Menu -->
                  <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="glyphicon glyphicon-refresh text-red"></i> Reorder
                      <span class="label label-danger">
                      <?php 
                      $query=mysqli_query($con,"select COUNT(*) as count from product where prod_qty<=reorder and branch_id='$branch'")or die(mysqli_error());
                			$row=mysqli_fetch_array($query);
                			echo $row['count'];
                			?>	
                      </span>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="header">You have <?php echo $row['count'];?> products that needs reorder</li>
                      <li>
                        <!-- Inner Menu: contains the notifications -->
                        <ul class="menu">
                        <?php
                        $queryprod=mysqli_query($con,"select prod_name from product where prod_qty<=reorder and branch_id='$branch'")or die(mysqli_error());
			                 
                        while($rowprod=mysqli_fetch_array($queryprod)){
			                   ?>
                          <li><!-- start notification -->
                            <a href="reorder.php">
                              <i class="glyphicon glyphicon-refresh text-red"></i> <?php echo $rowprod['prod_name'];?>
                            </a>
                          </li><!-- end notification -->
                          <?php }?>
                        </ul>
                      </li>
                      <li class="footer"><a href="inventory.php">View all</a></li>
                    </ul>
                  </li>
                  <!-- Tasks Menu -->
				            <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="glyphicon glyphicon-wrench"></i> Maintenance
                      
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <!-- Inner Menu: contains the notifications -->
                        <ul class="menu">
						            <li><!-- start notification -->
                            <a href="#admincatLogin" data-target="#admincatLogin" data-toggle="modal">
                              <i class="glyphicon glyphicon-user text-green"></i> Category
                            </a>
                          </li><!-- end notification -->
						              <li><!-- start notification -->
                            <a href="#adminpaymentLogin" data-target="#adminpaymentLogin" data-toggle="modal">
                              <i class="glyphicon glyphicon-user text-green"></i> Customer
                            </a>
                          </li><!-- end notification -->
                          <li><!-- start notification -->
                            <a href="creditor.php">
                            <i class="glyphicon glyphicon-user text-green"></i> Credit Applicants
                            </a>
                          </li><!-- end notification -->
						               <li><!-- start notification -->
                            <a href="#adminLogin" data-target="#adminLogin" data-toggle="modal">
                              <i class="glyphicon glyphicon-cutlery text-green"></i> Product
                            </a>
                          </li><!-- end notification -->
						 
						                <li><!-- start notification -->
                            <a href="#adminsupLogin" data-target="#adminsupLogin" data-toggle="modal">
                            <i class="glyphicon glyphicon-send text-green"></i> Supplier
                            </a>
                          </li><!-- end notification -->						 
                        </ul>
                      </li>
                     
                    </ul>
                  </li>
                  <!-- Tasks Menu -->
				   <!-- Tasks Menu -->
				            <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="stockin.php">
                      <i class="glyphicon glyphicon-list text-green"></i> Stock-In
                      
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                      </li>
                     
                    </ul>
                  </li>
                  <!-- Tasks Menu -->
				          <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="glyphicon glyphicon-stats text-blue"></i> Report
                     
                    </a>
                    <ul class="dropdown-menu">
                     <li>
                        <!-- Inner Menu: contains the notifications -->
                        <ul class="menu">
                        
                          <li><!-- start notification -->
                            <a href="#InventoryLogin" data-target="#InventoryLogin" data-toggle="modal">
                              <i class="glyphicon glyphicon-ok text-green"></i>Inventory
                            </a>
                          </li><!-- end notification -->
						            <li><!-- start notification -->
                         <a href="#SalesLogin" data-target="#SalesLogin" data-toggle="modal">
                              <i class="glyphicon glyphicon-usd text-blue"></i>Sales
                            </a>
                          </li><!-- end notification -->
					               <li><!-- start notification -->
                         <a href="#RecLogin" data-target="#RecLogin" data-toggle="modal">
                         <i class="glyphicon glyphicon-th-list text-redr"></i>Account Receivables
                            </a>
                          </li><!-- end notification -->
						              <li><!-- start notification -->
                         <a href="#IncomeLogin" data-target="#IncomeLogin" data-toggle="modal">
                         <i class="glyphicon glyphicon-th-list text-redr"></i>Branch Income
                            </a>
                          </li><!-- end notification -->
                          <li><!-- start notification -->
                         <a href="purchase_request.php">
                            <i class="glyphicon glyphicon-usd text-blue"></i>Purchase Request
                            </a>
                          </li><!-- end notification -->
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <!-- Tasks Menu -->
				            <li class="">
                    <!-- Menu Toggle Button -->
                    <a href="profile.php" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-cog text-orange"></i>
                      <?php echo $_SESSION['name'];?>
                    </a>
                  </li>
                  <li class="">
                    <!-- Menu Toggle Button -->
                    <a href="logout.php" class="dropdown-toggle">
                      <i class="glyphicon glyphicon-off text-red"></i> Logout  
                    </a>
                  </li>
                </ul>
              </div><!-- /.navbar-custom-menu -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>


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

