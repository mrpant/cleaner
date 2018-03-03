 <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo" style="font-weight: 700;">
          <!-- mini logo for sidebar mini 50x50 pixels -->
         <!--  <span class="logo-mini"><b><b></span> -->
         
        CLEAN
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation" >
          <!-- Sidebar toggle button-->
        <!--   <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a> -->
          <strong class="heading"></strong>
          <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?=$_SESSION[$_SESSION_ID]['admin']->mailId?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                <!--   <li class="user-header">
                    <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      Welcome
                      <small><?=$_SESSION[$_SESSION_ID]['admin']->username?></small>
                    </p>
                  </li> -->
                  <!-- Menu Body -->
                  <li class="user-body">
                 <!--   <p><center><b><?=date('l jS \of F Y h:i:s A')?></b></center></p> -->
                   <a href="<?= $_PATH['formHandler'] ?>?action=logout" class="btn btn-default btn-flat">Sign out</a>
                  </li>
                  <!-- Menu Footer-->
                  <!-- <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?= $_PATH['formHandler'] ?>?action=logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li> -->
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
             
            </ul>
          </div>
        </nav>
      </header>