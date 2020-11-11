<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
if(empty($_SESSION['branch'])):
header('Location:../index.php');
endif;

  include("profitCal.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Income Report | <?php include('../dist/includes/title.php');?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
      <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <script type="text/javascript" src="../dist/js/jquery.min.js"></script>
<script type="text/javascript" src="../dist/js/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.css" />
 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="../plugins/daterangepicker/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="../plugins/daterangepicker/daterangepicker.css" />
    <style type="text/css">
      h5,h6{
        text-align:center;
      }
    

      @media print {
          .btn-print {
            display:none !important;
      }
      .main-footer  {
      display:none !important;
      }
      .box.box-primary {
        border-top:none !important;
      }
      .angel{
        display:none !important;
      }
          
      }
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
          <div style="padding-top: 20px;">
            <a class = "btn btn-primary btn-print" href = "home.php"><i class ="glyphicon glyphicon-arrow-left"></i> Back to Homepage</a>  
            </div> 
            

          <!-- Main content -->
           <section class="content">
            <div class="row">
       <!-- <div class="col-md-8"> -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Profit Calculator</h3>
                   </div><!-- /.box-header -->
                    <div class="box-body">
                    <div class="row" style="padding: 20px; margin: 15px;">
                    <form method="POST" action="income.php">
                      <div class="form-group">
                      <div class="col-lg-4 col-xs-6">
                        <label>Net Sales </label>
                          <input type="text" class="form-control" name="net_sales" placeholder="Net Sales(₵)" value="<?php echo isset($_POST['net_sales']) ? $_POST['net_sales'] : '' ?>" required> 
                          </div>  
                        </div>


                      <div class="form-group">
                      <div class="col-lg-4 col-xs-6">
                        <label>Total Discount </label>
                          <input type="text" class="form-control" name="total_discount" placeholder="Total Discount(₵)" value="<?php echo isset($_POST['total_discount']) ? $_POST['total_discount'] : '' ?>" required> 
                          </div>
                        </div>

                      <div class="form-group">
                      <div class="col-lg-4 col-xs-6">
                        <label>Cost of Product from Supplier </label>
                          <input type="text" class="form-control" name="supplier_amt" placeholder="Total Supplier Amount(₵)" value="<?php echo isset($_POST['supplier_amt']) ? $_POST['supplier_amt'] : '' ?>" required> 
                          </div>   
                        </div>

                        <div class="form-group">
                        <div class="col-lg-4 col-xs-6"  style="padding-top: 50px; padding-bottom: 50px;">
                        <label> Interest Income </label>
                          <input type="text" class="form-control" name="interest_income" placeholder="Interest Income(₵)" value="<?php echo isset($_POST['interest_income']) ? $_POST['interest_income'] : '' ?>" required> 
                          </div>   
                        </div>

                         <div class="form-group">
                        <div class="col-lg-4 col-xs-6" style="padding-top: 50px; padding-bottom: 50px;">
                        <label>Sale Expenses </label>
                          <input type="text" class="form-control" name="sale_expense" placeholder="Sale Expenses(₵)" value="<?php echo isset($_POST['sale_expense']) ? $_POST['sale_expense'] : '' ?>" required> 
                          </div>   
                        </div>

                         <div class="form-group">
                        <div class="col-lg-4 col-xs-6" style="padding-top: 50px; padding-bottom: 50px;">
                        <label>Other Income </label>
                          <input type="text" class="form-control" name="other_income" placeholder="Other Income(₵)" value="<?php echo isset($_POST['other_income']) ? $_POST['other_income'] : '' ?>" required> 
                          </div>   
                        </div>

                        <div class="form-group">
                      
                        <textarea  style="width: 65%; height: 150px; box-sizing: border-box;
                          border: 2px solid #ccc; border-radius: 4px; background-color: #f8f8f8;
                          resize: none; margin-left: 150px;" class="form-control" name="result">

                          <?php 
                          //$total = "";
                          echo $total; ?>
                         </textarea>
                   
                       </div>

                        
                        <div class="form-group">
                          <div class="col-lg-4 col-xs-6" style="padding-top: 50px; margin-left: 150px; margin-bottom: 35px;">
                          <input type="submit"  name="btn_calculate" class="btn btn-primary btn-block" value="Calculate Profit" required>
                        </div>
                        </div>

                        <div class="form-group">
                          <div class="col-lg-4 col-xs-6" style="padding-top: 50px; margin-bottom: 35px;">
                          <input type="submit" name="btn_income" class="btn btn-success btn-block" value="Save Profit" required>
                        </div>
                        </div>

                        <div class="form-group">
                        <div class="col-lg-4 col-xs-6" style="margin-left: 150px; margin-bottom: 35px;">
                          <a href="view.php">
                        <input type="submit" class="btn btn-info btn-block" value="View Profit">
                      </a>
                        </div>
                        </div>

                        <div class="form-group">
                        <div class="col-lg-4 col-xs-6" style="margin-bottom: 35px;">
                        <input type="reset" name="clear_income" class="btn btn-default btn-block" value="Clear">
                        </div>
                        </div>

                      </form>
                      </div>
                      </div><!-- ./col -->
                     </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <?php include('../dist/includes/footer.php');?>
    </div><!-- ./wrapper -->






    <script src="../plugins/jQuery/jQuery-2.2.0.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <!-- Select2 -->
  <script src="../plugins/select2/select2.full.min.js"></script>
  <!-- InputMask -->
  <script src="../plugins/input-mask/jquery.inputmask.js"></script>
  <script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <!-- date-range-picker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script src="../plugins/daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap datepicker -->
  <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
  <!-- bootstrap color picker -->
  <script src="../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
  <!-- bootstrap time picker -->
  <script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
  <!-- SlimScroll 1.3.0 -->
  <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- iCheck 1.0.1 -->
  <script src="../plugins/iCheck/icheck.min.js"></script>
  <!-- FastClick -->
  <script src="../plugins/fastclick/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/app.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>
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
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

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
