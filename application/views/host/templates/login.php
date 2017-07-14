<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php if($heading!='')echo $heading;else echo $title;?></title>
		<base href="<?php echo base_url(); ?>" />
		<link rel="shortcut icon" href="<?php echo base_url().'images/logo/'.$favicon; ?>">

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
		<!-- Developer CSS -->
    <link href="css/developer.css" rel="stylesheet" type="text/css">
  </head>

  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?php
						$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'login_form', 'enctype' => 'multipart/form-data','novalidate'=>'');
						echo form_open_multipart(ADMIN_PATH.'/login/admin_login', $attributes)
						?>
              <h1>LOG IN</h1>
              <div>
                <input type="email" class="form-control" placeholder="Email" id="admin_email" name="admin_email" required="required" />
              </div>
              <div>
                <input type="password" class="form-control" id="admin_password" name="admin_password" placeholder="Password" required="required" />
              </div>
              <div>
                <input class="btn btn-default submit" type="submit" value="Log in" />
                <a class="reset_pass" href="<?php echo ADMIN_PATH; ?>/login/admin_forgot_password_form">Forgot your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div>
                  <h1><img src="<?php echo base_url().'images/logo/'.$logo; ?>" alt="<?php echo $title;?>" class="block-center img-rounded login-logo"></h1>
                  <p><?php echo $copyright_content; ?></p>
                </div>
              </div>
            </form>
          </section>
        </div>
				
		<!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="vendors/skycons/skycons.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.js"></script>
		
		
		<?php if($this->session->flashdata('sErrMSG') != '') { ?>
			<!-- PNotify -->
			<link href="vendors/pnotify/dist/pnotify.css" rel="stylesheet">
			<script src="vendors/pnotify/dist/pnotify.js"></script>
			<?php if($this->session->flashdata('sErrMSGType')=='message-red'){ $btype='error';}else{$btype='success';} ?>
			<script>
			new PNotify({
			  title: "<?php echo ucfirst($btype); ?>",
			  type: "<?php echo $btype; ?>",
			  text: "<?php echo $this->session->flashdata('sErrMSG'); ?>",
			  nonblock: {
				  nonblock: false
			  },
			  //addclass: 'dark',
			  styling: 'bootstrap3',
			  hide: true,
			});
			</script>
		<?php } ?>
		<!-- END Scripts-->
		
		<script src="js/<?php echo ADMIN_PATH; ?>/developers.js"></script>
				
      </div>
    </div>
  </body>
</html>