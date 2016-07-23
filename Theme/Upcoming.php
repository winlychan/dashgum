<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>DASHGUM - Bootstrap Admin Template</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.php" class="logo"><b>Run Plus</b></a>
            <!--logo end-->
           
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.html
                    ">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
 <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.php"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">Marcel Newman</h5>
              	  	
                  <li class="mt">
                      <a class="active" href="index.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Profile</span>
                      </a>
                      <ul class="sub">
                  <li><a  href="Profile.php">Profile Details</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>Bookings</a>
                      <ul class="sub">
                          <li><a  href="Total Bookings.php">Total Bookings</a></li>
                          <li><a  href="Upcoming.php">Upcoming</a></li>
                          <li><a  href="Departed.php">Departed</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>Records</a>
                          
                           <ul class="sub">
                          <li><a  href="Run.php">Run</a></li>
                          <li><a  href="Bike.php">Bike</a></li>
                          <li><a  href="Tri Marathon.php">Tri Marathon</a></li>
                      </ul>
                      
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>Change Password</span>
                      </a>
                      
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>My Points</span>
                      </a>
                      <ul class="sub"> 
                          <li><a  href="Summary.php">Summary</a></li>
                          <li><a  href="Redemption.php">Redemption</a></li>
                        
                      </ul>
                  </li>
                </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Upcoming</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
   
<table border="1" align="center" class="table table-condensed">     
     		          

  <tbody>
    <tr>
      <td rowspan="6"> 
      <a class="image_container" ><img src="assets/img/rungarmin.jpg"  alt = "" />
	  </a>
      </td>
      <td>Name</td>
      <td>Standard</td>
  	 </tr>
    <tr>
      <td>Booking Number</td>
      <td>12345</td>
    </tr>
    <tr>
      <td>Booking Date</td>
      <td>13 May 2016</td>
    </tr>
    <tr>
      <td>Event Date</td>
      <td>16 June 2016</td>
    </tr>
    <tr>
      <td>Run Type</td>
      <td>21 KM</td>
    </tr>
    <tr>
      <td>Price</td>
      <td>2,000 Baht</td>
    </tr>
    </tbody>
</table>
    
 	 </div>
  </div>
			
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
             Run Plus
              <a href="blank.php#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
