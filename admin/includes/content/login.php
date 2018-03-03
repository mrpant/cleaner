
 <?php
		if(isset($_REQUEST['status']) && $_REQUEST['status'] == 'error')
		{
		?>
		<div style="color:red;padding-bottom:5px;text-align:center">
			<?= $purifier->purify($_REQUEST['msg']) ?>
		</div>
		<?php
		}
?>

	<div  style="height: 85vh;background:#222D32;">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><img src="<?= $_PATH['websiteRoot'] ?>/<?= $_SESSION[$_SESSION_ID]['configuration']->logo ?>" id="logoimg" alt=" Logo" style="width:100px;padding-left:0px;"/></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg"><b><?= $_SESSION[$_SESSION_ID]['configuration']->websiteName ?></b></p>
        <form action="<?= $_PATH['formHandler'] ?>" method="post">
			<input type="hidden" name="action" value="login" />
          	<input type="hidden" name="guestAccessToken" value="<?= $_SESSION[$_SESSION_ID]['guestAccessToken'] ?>" />
			
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="mailId" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
             
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

        

        

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
	</div>
  