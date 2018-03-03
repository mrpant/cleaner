  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->


      <ul class="sidebar-menu">

        <li class="active treeview">
          <a href="<?= $_PATH['root'] ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
          </a>

        </li>
        <?php if(isset($_SESSION[$_SESSION_ID]['admin'])) { ?> 
        <li class="treeview">
          <a href="#">
            <i class="fa fa-truck"></i>
            <span>Control Panel </span> <i class="fa fa-angle-left pull-right"></i>

          </a>
          <ul class="treeview-menu">
           
            <li><a href="./?url=configuration&tab=View"><i class="fa fa-circle-o"></i>Configuration</a></li>
            
            
            <li><a href="./?url=admin&tab=View"><i class="fa fa-circle-o"></i>User</a></li>

            <li><a href="./?url=property&tab=View"><i class="fa fa-circle-o"></i>Property</a></li>

            <li><a href="./?url=rooms&tab=View"><i class="fa fa-circle-o"></i>Rooms</a></li>

             <li><a href="./?url=amount&tab=View"><i class="fa fa-circle-o"></i>Discount</a></li>
             <li><a href="./?url=time&tab=View"><i class="fa fa-circle-o"></i>Time Slot</a></li>
          </ul>
        </li>
        <?php } ?>
       
         
       



      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
