<header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="<?php echo base_url('Admin') ?>" class="logo"><b>Tabulator</b></a>
      <!--logo end-->
      
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" data-toggle="modal" href="#myModal">Logout</a></li>
        </ul>
      </div>
    </header>


    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <h5 class="centered">
            <span class="fa fa-user">&nbsp;</span>
            <a href="#" style="color: white;">
                <?php
                if ( $username ) 
                {
                  echo $username;
                }
              ?>
            </a>
          </h5>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-bar-chart-o"></i>
              <span>Standings</span>
              </a>
            <ul class="sub">
              <li><a href="<?php echo base_url('Admin/overall') ?>">Over All</a></li>
              <li><a href="<?php echo base_url('Admin/creativity') ?>">Creativity</a></li>
              <li><a href="<?php echo base_url('Admin/music') ?>">Music</a></li>
              <li><a href="<?php echo base_url('Admin/originality') ?>">Originality</a></li>
            </ul>
          </li>
          <?php if( $permission == "admin" || $permission == "super_admin" ): ?>
            <li>
              <a href="<?php echo base_url('Admin/tabulate') ?>">
                <i class="fa fa-calculator"></i>
                <span>Tabulate </span>
                </a>
            </li>
            <li>
              <a href="<?php echo base_url('Admin/participants') ?>">
                <i class="fa fa-users"></i>
                <span>Participants   </span>
                </a>
            </li>
            <li>
              <a href="<?php echo base_url('Admin/active_user'); ?>">
                <i class="fa fa-book"></i>
                <span>Active Users </span>
                </a>
            </li>
          <?php endif; ?>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>

    <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Log out</h4>
              </div>
              <div class="modal-body">
                <h3>
                  <center>
                    Are sure you want to leave the page?
                  </center>
                </h3>
              </div>
              <div class="modal-footer centered">
                <button data-dismiss="modal" class="btn btn-theme04" type="button">Cancel</button>
                <button class="btn btn-theme03" type="button" id="BtnLogout">Log out</button>
              </div>
            </div>
          </div>
        </div>
        <!-- modal -->