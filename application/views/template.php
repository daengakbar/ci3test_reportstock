<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>Test | CI-Report</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="<?php echo base_url()?>scale/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url()?>scale/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url()?>scale/css/font-awesome.min.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url()?>scale/css/icon.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url()?>scale/css/font.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url()?>scale/css/app.css"  type="text/css" />  
	<link rel="stylesheet" href="<?php echo base_url()?>scale/datatables/css/jquery.dataTables.min.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo base_url()?>scale/js/datepicker/datepicker.css" type="text/css" />
  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body class="">
  <section class="vbox">
    <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
      <div class="navbar-header aside-md dk">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav">
          <i class="fa fa-bars"></i>
        </a>
        <a href="<?php echo base_url()?>home" class="navbar-brand">
          <img src="<?php echo base_url()?>scale/images/logo.png" class="m-r-sm" alt="scale">
          <span class="hidden-nav-xs">Scale</span>
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
          <i class="fa fa-cog"></i>
        </a>
      </div>
      <ul class="nav navbar-nav hidden-xs">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="i i-grid"></i>
          </a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="thumb-sm avatar pull-left">
              <img src="<?php echo base_url()?>scale/images/a0.png" alt="...">
            </span>
            Akbar.Z <b class="caret"></b>
          </a>
        </li>
      </ul>      
    </header>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-black aside-md hidden-print" id="nav">          
          <section class="vbox">
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                <div class="clearfix wrapper dk nav-user hidden-xs">
                  <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <span class="thumb avatar pull-left m-r">                        
                        <img src="<?php echo base_url()?>scale/images/a0.png" class="dker" alt="...">
                        <i class="on md b-black"></i>
                      </span>
                      <span class="hidden-nav-xs clear">
                        <span class="block m-t-xs">
                          <strong class="font-bold text-lt">Akbar.Z</strong> 
                          <b class="caret"></b>
                        </span>
                        <span class="text-muted text-xs block">IT Programmer</span>
                      </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">                      
                      <li>
                        <span class="arrow top hidden-nav-xs"></span>
                        <a href="#">Settings</a>
                      </li>
                      <li>
                        <a href="profile.html">Profile</a>
                      </li>
                      <li>
                        <a href="#">
                          <span class="badge bg-danger pull-right">3</span>
                          Notifications
                        </a>
                      </li>
                      <li>
                        <a href="docs.html">Help</a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="modal.lockme.html" data-toggle="ajaxModal" >Logout</a>
                      </li>
                    </ul>
                  </div>
                </div>                
                <!-- nav -->                 
                <nav class="nav-primary hidden-xs">
                  <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">Start</div>
                  <ul class="nav nav-main" data-ride="collapse">
                    <li  class="active">
                      <a href="<?php echo base_url();?>rep-intorder" class="auto">
                        <i class="i i-statistics icon"></i>
                        <span class="font-bold">Report Stock</span>
                      </a>
                    </li>
		          </ul>
                  </ul>
                </nav>
                <!-- / nav -->
              </div>
            </section>
            <footer class="footer hidden-xs no-padder text-center-nav-xs">
              <a href="<?php echo base_url()?>" data-toggle="ajaxModal" class="btn btn-icon icon-muted btn-inactive pull-right m-l-xs m-r-xs hidden-nav-xs">
                <i class="i i-logout"></i>
              </a>
              <a href="#nav" data-toggle="class:nav-xs" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs">
                <i class="i i-circleleft text"></i>
                <i class="i i-circleright text-active"></i>
              </a>
            </footer>
          </section>
        </aside>
        <!-- /.aside -->
        <section id="content">
          <section class="hbox stretch">
            <section>
              <section class="vbox">
                <section class="scrollable padder">              
					<?php echo $contents;?>
				</section>
			  </section>
            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
      </section>
    </section>
  </section>
  <script src="<?php echo base_url()?>scale/js/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo base_url()?>scale/js/bootstrap.js"></script>
	<!-- App -->
	<script src="<?php echo base_url()?>scale/js/jquery.dataTables.min.js"></script>	
	<script src="<?php echo base_url()?>scale/js/app.js"></script>
	
	<script src="<?php echo base_url()?>scale/js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url()?>scale/js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
	<script src="<?php echo base_url()?>scale/js/charts/sparkline/jquery.sparkline.min.js"></script>
	<script src="<?php echo base_url()?>scale/js/datepicker/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url()?>scale/js/sortable/jquery.sortable.js"></script>
	<script src="<?php echo base_url()?>scale/js/app.plugin.js"></script>
</body>
</html>
