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
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
		<!-- Developer CSS -->
    <link href="css/developer.css" rel="stylesheet" type="text/css">
		<script>
		function hideErrDiv(arg) {
		$("#"+arg).hide();
		}
		</script>
  </head>

  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?php
						$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'forgot_pass_form', 'enctype' => 'multipart/form-data','novalidate'=>'');
						echo form_open_multipart(ADMIN_PATH.'/login/admin_forgot_password', $attributes)
						?>
              <h1>PASSWORD RESET</h1>
							<div id="wrappers">
							<?php if($this->session->flashdata('sErrMSG') != '') { ?>
							<div class="errorContainer" id="<?php echo $this->session->flashdata('sErrMSGType'); ?>">
								<script>
									setTimeout("hideErrDiv('<?php echo $this->session->flashdata('sErrMSGType'); ?>')", 5000);
								</script>
								<p><span> <?php echo $this->session->flashdata('sErrMSG');  ?> </span></p>
							</div>
							<?php } ?>
							</div>
              <div>
                <input type="email" class="form-control" placeholder="Email" id="email" name="email" required="required" />
              </div>
              <div>
                <input class="btn btn-default submit" type="submit" value="Reset" />
                <a class="reset_pass" href="<?php echo ADMIN_PATH; ?>/login">Back to Login</a>
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
				<script>
				function hideErrDiv(arg) {
					$("#"+arg).hide();
				}
				</script>
				
      </div>
    </div>
  </body>
</html>