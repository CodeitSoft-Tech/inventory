<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

 // include("creditor_del.php");
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Creditor | <?php include('../dist/includes/title.php');?></title>
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
        <div class="container-fluid">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              <a class="btn btn-lg btn-warning" href="home.php">Back</a>
              <a class="btn btn-lg btn-primary" href="#add" data-target="#add" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-blue"></i></a>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">creditor</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="row">
       
            
            <div class="col-xs-12">
              <div class="box box-primary">
    
                <div class="box-header">
                  <h3 class="box-title">Creditor List</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                            
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Due Amt</th>
                        <th>Down Payment</th>
                        <th>Amt Left</th>
                        <th>term</th>
                        <th>Payable For</th>                       
                        <th>payment Start</th>
                        <th>Payment End</th>
                        <th>Interest</th>
                        <th>Creditor Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
    

    $query=mysqli_query($con,"SELECT * FROM creditors ORDER BY creditor_id")or die(mysqli_error());

    if(mysqli_num_rows($query) > 0)
    {
      while($row=mysqli_fetch_array($query))      
      {

        $grand = $row['product_price']*$row['quantity'];
        $interest = $grand * 0.3;
        $left = $grand - $row['down_paymt'];
    
?>
                      <tr>                     
                        <td><?php echo $row['creditor_name'];?></td>
                        <td><?php echo $row['contact'];?></td>
                        <td><?php echo $row['product_name'];?></td>
                        <td><?php echo $row['product_price'];?></td>
                        <td><?php echo $row['quantity'];?></td>
                        <td><?php echo $grand;?></td>
                        <td><?php echo $row['down_paymt'];?></td>
                        <td><?php echo $left;?></td>      
                        <td><?php echo $row['term'];?></td>
                        <td><?php echo $row['payable_for'];?></td>
                        <td><?php echo $row['payment_start'];?></td>
                        <td><?php 

                        if($row['payable_for'] == '1')
                        {
                          $date = date('M d, Y',strtotime('+1 month'));
                          echo $date;
                        }

                         if($row['payable_for'] == '2')
                        {
                          $date = date('M d, Y',strtotime('+2 month'));
                          echo $date;
                        }

                         if($row['payable_for'] == '3')
                        {
                          $date = date('M d, Y',strtotime('+3 month'));
                          echo $date;
                        }

                         if($row['payable_for'] == '4')
                        {
                          $date = date('M d, Y',strtotime('+4 month'));
                          echo $date;
                        }

                         if($row['payable_for'] == '5')
                        {
                          $date = date('M d, Y',strtotime('+5 month'));
                          echo $date;
                        }

                         if($row['payable_for'] == '6')
                        {
                          $date = date('M d, Y',strtotime('+6 month'));
                          echo $date;
                        }





                         ?></td> 
                        <td><?php echo $interest;?></td>
              
                        <td><?php 

                         if ($row['creditor_status']=='Active') 
                        {
                            echo "<span class='badge bg-green'>Active</span>";
                         }
                         else
                         {
                            echo "<span class='badge bg-red'>Inactive</span>";
                          }

                        ?></td>
                        <td>
        <a href="#update<?php echo $row['creditor_id'];?>" data-target="#update<?php echo $row['creditor_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-edit text-blue"></i></a>

         <a href="#delete<?php echo $row['creditor_id'];?>" data-target="#delete<?php echo $row['creditor_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-trash text-red"></i></a>
      
            </td>
                      </tr>


                <!-- Update Creditor Modal -->      
      <div id="update<?php echo $row['creditor_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update Creditor Details</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="creditor_update.php" enctype='multipart/form-data'>
                
        <div class="form-group">
          <label class="control-label col-lg-3">Creditor Name</label>
          <div class="col-lg-9"><input type="hidden" class="form-control" name="creditor_id" value="<?php echo $row['creditor_id'];?>" required>  
            <input type="text" class="form-control" name="cred_name" value="<?php echo $row['creditor_name'];?>" required>  
          </div>
        </div> 
      
        <div class="form-group">
          <label class="control-label col-lg-3">Contact</label>
          <div class="col-lg-9"><input type="hidden" class="form-control" name="creditor_id" value="<?php echo $row['creditor_id'];?>" required>  
            <input type="number" class="form-control" name="contact" value="<?php echo $row['contact'];?>" required>  
          </div>
        </div> 

         <div class="form-group">
          <label class="control-label col-lg-3">Product Name</label>
          <div class="col-lg-9"><input type="hidden" class="form-control" name="creditor_id" value="<?php echo $row['creditor_id'];?>" required>  
            <input type="text" class="form-control" name="pro_name" value="<?php echo $row['product_name'];?>" required>  
          </div>
        </div> 


         <div class="form-group">
          <label class="control-label col-lg-3">Product price</label>
          <div class="col-lg-9"><input type="hidden" class="form-control" name="creditor_id" value="<?php echo $row['creditor_id'];?>" required>  
            <input type="text" class="form-control" name="price" value="<?php echo $row['product_price'];?>" required>  
          </div>
        </div> 

         <div class="form-group">
          <label class="control-label col-lg-3">Quantity</label>
          <div class="col-lg-9"><input type="hidden" class="form-control" name="creditor_id" value="<?php echo $row['creditor_id'];?>" required>  
            <input type="number" class="form-control" name="qty" value="<?php echo $row['quantity'];?>" required>  
          </div>
        </div> 

         <div class="form-group">
              <label class="control-label col-lg-3">Terms</label>
               <div class="col-lg-9">
                 <input type="hidden" class="form-control" name="creditor_id" value="<?php echo $row['creditor_id'];?>" required>  
                <input type="text" class="form-control" name="terms" value="<?php echo $row['term'];?>" required>  
                
                 </div>
              </div><!-- /.form group -->

              <div class="form-group">
              <label class="control-label col-lg-3">Payable For</label>
               <div class="col-lg-9">
               <input type="hidden" class="form-control" name="creditor_id" value="<?php echo $row['creditor_id'];?>" required>  
                <input type="number" class="form-control" name="payable_for" value="<?php echo $row['payable_for'];?>" required> 
              </div>
            </div><!-- /.form group -->


         <div class="form-group">
          <label class="control-label col-lg-3">Due Amount</label>
          <div class="col-lg-9"><input type="hidden" class="form-control" name="creditor_id" value="<?php echo $row['creditor_id'];?>" required>  
            <input type="text" class="form-control" name="due" value="<?php echo $row['quantity']*$row['product_price'];?>" required>  
          </div>
        </div> 

        <div class="form-group">
          <label class="control-label col-lg-3">Down Payment</label>
          <div class="col-lg-9"><input type="hidden" class="form-control" name="creditor_id" value="<?php echo $row['creditor_id'];?>" required>  
          <input type="text" class="form-control" name="down" value="<?php echo $row['down_paymt'];?>" required>  
          </div>
        </div> 

              <div class="form-group">
              <label class="control-label col-lg-3" for="price">Creditor Status</label>
              <div class="col-lg-9">
                <select class="form-control" name="creditor_status" id="price" style="width: 100%;" required>
                 <option value="Active">Active</option>
                 <option value="Inactive">Inactive</option>
              </select>
              </div>
            </div>

              </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
            </div>
      
        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal-->                    

 <!-- Delete Creditor Modal -->
 <div id="delete<?php echo $row['creditor_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Delete Creditor</h4>
              </div>
              <div class="modal-body">
              <form class="form-horizontal" method="post" action="creditor_del.php">
             
                  <input type="hidden" class="form-control" name="creditor_id" value="<?php echo $row['creditor_id'];?>" required> 
                      
                      <p>Are you sure you want to remove Creditor?</p>
              
                    </div><br>
                    <div class="modal-footer">
                      <button type="submit" name="delete" class="btn btn-danger" >
                      <a href="delete<?php echo $row['creditor_id'];?>" style="color: #ffffff;">
                          Delete </a></button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
              </form>
            </div>
      
        </div><!--end of modal-dialog-->
 </div>


 <!--end of modal-->  

<?php } }?>           
                    </tbody>
                    <tfoot>
                      <tr>                     
                       <th>Name</th>                       
                        <th>Contact</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Due Amt</th>
                        <th>Down Payment</th>
                        <th>Amt Left</th>
                        <th>term</th>
                        <th>Payable For</th>                       
                        <th>payment Start</th>
                        <th>Payment End</th>
                        <th>Interest</th>
                        <th>Creditor Status</th>
                        <th>Action</th>
                      </tr>           
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
 
            </div><!-- /.col -->
          </div><!-- /.row -->
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <?php include('../dist/includes/footer.php');?>
    </div><!-- ./wrapper -->



<!-- Add Creditor Modal -->
<div id="add" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Add New Creditor</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="creditor_add.php" enctype='multipart/form-data'>
                
        <div class="form-group">
          <label class="control-label col-lg-3">Creditor Name</label>
          <div class="col-lg-9"><input type="hidden" class="form-control" id="id" name="id" required>  
            <input type="text" class="form-control" name="cred_name" placeholder="Full Name" required> 
          </div>
        </div> 
    
       

         <div class="form-group">
          <label class="control-label col-lg-3">Contact</label>
          <div class="col-lg-9">
            <input type="number" class="form-control" name="contact" placeholder="Phone Number" required>  
          </div>
        </div>

           <div class="form-group">
          <label class="control-label col-lg-3">Product Name</label>
          <div class="col-lg-9">
            <input type="text" class="form-control" name="pro_name" placeholder="Product Name" required>  
          </div>
        </div>

         <div class="form-group">
          <label class="control-label col-lg-3">Price</label>
          <div class="col-lg-9">
            <input type="number" class="form-control" name="price" placeholder="Product Price" required>  
          </div>
        </div>

         <div class="form-group">
          <label class="control-label col-lg-3">Quantity</label>
          <div class="col-lg-9">
            <input type="number" class="form-control" name="qty" placeholder="Quantity" required>
          </div>
        </div>

          <div class="form-group">
          <label class="control-label col-lg-3">Down Payment </label>
          <div class="col-lg-9">
            <input type="number" class="form-control" name="down" placeholder="Down Payment" required>
          </div>
        </div>

         

              <div class="form-group">
              <label class="control-label col-lg-3">Terms</label>
               <div class="col-lg-9">
                <select class="form-control select2" name="terms" tabindex="1" required>  
                    <option value="--Select--"></option>
                    <option>Monthly</option>
                    <option>Weekly</option>
                    <option>Daily</option>
                </select>
                 </div>
              </div><!-- /.form group -->

              <div class="form-group">
              <label class="control-label col-lg-3">Payable For</label>
               <div class="col-lg-9">
                <select class="form-control select2" name="payable_for" tabindex="1" required>  
                    <option value="--Select--"></option>
                     <option value="1">1 month</option>
                    <option value="2">2 months</option>
                    <option value="3">3 months</option>
                    <option value="4">4 months</option>
                    <option value="5">5 months</option>
                    <option value="6">6 months</option>
                </select>
                 </div>
              </div><!-- /.form group -->

              <div class="form-group">
              <label class="control-label col-lg-3" for="price">Status</label>
              <div class="col-lg-9">
                <select class="form-control" name="creditor_status" id="price" style="width: 100%;" required>
                 <option value="Active">Active</option>
                 <option value="Inactive">Inactive</option>
              </select>
              </div>
            </div>

             </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
             </form>
        </div><!--end of modal-dialog-->
 </div>
</div>
</div>

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
