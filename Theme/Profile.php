<?php
session_start();
if($_SESSION!=null){
  $data['firstname'] = $_SESSION["firstname"];
  $data['lastname'] = $_SESSION["lastname"];
  $data['email'] = $_SESSION["email"];
  $data['country'] = $_SESSION["country"];
  $data['address'] = $_SESSION["address"];
  $data['city'] = $_SESSION["city"];
  $data['postcode'] = $_SESSION["postcode"];
  $data['telephone'] = $_SESSION["telephone"];
  $data['member_id'] = $_SESSION["member_id"];
  $data['image'] = $_SESSION["image"];
}else{
  header('Location: ../theme/login.html');
}
//*******************Upload Image function*****************

//echo substr('abcdef', -6); // f
if(isset($_GET['confirm'])){
  ?>
  <script>alert("Password Not Match");</script>
  <?php
}

   if(isset($_FILES['image'])){
     include_once '../controller/db_functions.php';
      $db = new DB_Functions();
      $errors= array();
      $date = new DateTime();
      $file_name = $data['member_id'].$date->getTimestamp().substr($_FILES['image']['name'],-5);
      //$file_name = $_FILES['image']['name'];
      //$file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp  = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

      $expensions= array("jpeg","jpg","png");

      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }

      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }

      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"../Theme/assets/img/".$file_name);
         $db->updateAvatar("../Theme/assets/img/".$file_name,$data['member_id']);
         $data['image'] = $db->selectAvatar($data['member_id']);
         //echo "Success";


      }else{
         print_r($errors);
      }
   }

//*******************************************************-
?>

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
                    <li><a class="logout" href="login.html">Logout</a></li>
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
                          <li><a  href="Summary.html">Summary</a></li>
                          <li><a  href="Redemption.html">Redemption</a></li>


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
          	<h3><i class="fa fa-angle-right"></i> Profile</h3>

        <div class="container" style="padding-top: 60px;">
  <h1 class="page-header">Edit Profile</h1>
  <div class="row">
    <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">

        <img src="<?php print $data['image']; ?>" class="avatar img-circle img-thumbnail" alt="avatar" width="100" height="100">
        <h6><?php if(isset($_FILES['image'])){ print "Avatar Uploaded"; }else{ print "Photo Upload"; }?></h6>
      <form action"" id="form1" method="POST" enctype="multipart/form-data" >
        <input type="file" name="image" class="text-center center-block well well-sm"/>
        <input type="submit" value="Upload"/>
      </form>
      </div>
    </div>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">

      <h3>Personal info</h3>
      <form class="form-horizontal" role="form" id="form2" action="../engine/updateprofile.php" method="POST">
        <div class="form-group">
          <label class="col-lg-3 control-label">First name:</label>
          <div class="col-lg-8">
            <input class="form-control" value="<?php print $data['firstname'];?>" name="firstname" type="text" tabindex="1" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Last name:</label>
          <div class="col-lg-8">
            <input class="form-control" value="<?php print $data['lastname'];?>" name="lastname" type="text" tabindex="2" required>
          </div>
        </div>

<div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input class="form-control" value="<?php print $data['email'];?>" name="email" type="email" tabindex="3" required>
          </div>
</div>

        <div class="form-group">
          <label class="col-lg-3 control-label">Country:</label>
          <div class="col-lg-8">
              <select name="country" class="form-control" tabindex="4" required>
   <option value="AF">AFGHANISTAN</option>
    <option value="AL">ALBANIA</option>
    <option value="DZ">ALGERIA</option>
    <option value="AS">AMERICAN SAMOA</option>
    <option value="AD">ANDORRA</option>
    <option value="AO">ANGOLA</option>
    <option value="AI">ANGUILLA</option>
    <option value="AQ">ANTARCTICA</option>
    <option value="AG">ANTIGUA AND BARBUDA</option>
    <option value="AR">ARGENTINA</option>
    <option value="AM">ARMENIA</option>
    <option value="AW">ARUBA</option>
    <option value="AU">AUSTRALIA</option>
    <option value="AT">AUSTRIA</option>
    <option value="AZ">AZERBAIJAN</option>
    <option value="BS">BAHAMAS</option>
    <option value="BH">BAHRAIN</option>
    <option value="BD">BANGLADESH</option>
    <option value="BB">BARBADOS</option>
    <option value="BY">BELARUS</option>
    <option value="BE">BELGIUM</option>
    <option value="BZ">BELIZE</option>
    <option value="BJ">BENIN</option>
    <option value="BM">BERMUDA</option>
    <option value="BT">BHUTAN</option>
    <option value="BO">BOLIVIA</option>
    <option value="BA">BOSNIA AND HERZEGOVINA</option>
    <option value="BW">BOTSWANA</option>
    <option value="BV">BOUVET ISLAND</option>
    <option value="BR">BRAZIL</option>
    <option value="IO">BRITISH INDIAN OCEAN TERRITORY</option>
    <option value="BN">BRUNEI DARUSSALAM</option>
    <option value="BG">BULGARIA</option>
    <option value="BF">BURKINA FASO</option>
    <option value="BI">BURUNDI</option>
    <option value="KH">CAMBODIA</option>
    <option value="CM">CAMEROON</option>
    <option value="CA">CANADA</option>
    <option value="CV">CAPE VERDE</option>
    <option value="KY">CAYMAN ISLANDS</option>
    <option value="CF">CENTRAL AFRICAN REPUBLIC</option>
    <option value="TD">CHAD</option>
    <option value="CL">CHILE</option>
    <option value="CN">CHINA</option>
    <option value="CX">CHRISTMAS ISLAND</option>
    <option value="CC">COCOS (KEELING) ISLANDS</option>
    <option value="CO">COLOMBIA</option>
    <option value="KM">COMOROS</option>
    <option value="CG">CONGO</option>
    <option value="CD">CONGO, THE DEMOCRATIC REPUBLIC OF THE</option>
    <option value="CK">COOK ISLANDS</option>
    <option value="CR">COSTA RICA</option>
    <option value="CI">COTE D'IVOIRE</option>
    <option value="HR">CROATIA</option>
    <option value="CU">CUBA</option>
    <option value="CY">CYPRUS</option>
    <option value="CZ">CZECH REPUBLIC</option>
    <option value="DK">DENMARK</option>
    <option value="DJ">DJIBOUTI</option>
    <option value="DM">DOMINICA</option>
    <option value="DO">DOMINICAN REPUBLIC</option>
    <option value="EC">ECUADOR</option>
    <option value="EG">EGYPT</option>
    <option value="SV">EL SALVADOR</option>
    <option value="GQ">EQUATORIAL GUINEA</option>
    <option value="ER">ERITREA</option>
    <option value="EE">ESTONIA</option>
    <option value="ET">ETHIOPIA</option>
    <option value="FK">FALKLAND ISLANDS (MALVINAS)</option>
    <option value="FO">FAROE ISLANDS</option>
    <option value="FJ">FIJI</option>
    <option value="FI">FINLAND</option>
    <option value="FR">FRANCE</option>
    <option value="GF">FRENCH GUIANA</option>
    <option value="PF">FRENCH POLYNESIA</option>
    <option value="TF">FRENCH SOUTHERN TERRITORIES</option>
    <option value="GA">GABON</option>
    <option value="GM">GAMBIA</option>
    <option value="GE">GEORGIA</option>
    <option value="DE">GERMANY</option>
    <option value="GH">GHANA</option>
    <option value="GI">GIBRALTAR</option>
    <option value="GR">GREECE</option>
    <option value="GL">GREENLAND</option>
    <option value="GD">GRENADA </option>
    <option value="GP">GUADELOUPE</option>
    <option value="GU">GUAM</option>
    <option value="GT">GUATEMALA</option>
    <option value="GG">GUERNSEY</option>
    <option value="GN">GUINEA</option>
    <option value="GW">GUINEA-BISSAU</option>
    <option value="GY">GUYANA</option>
    <option value="HT">HAITI</option>
    <option value="HM">HEARD ISLAND AND MCDONALD ISLANDS</option>
    <option value="VA">HOLY SEE (VATICAN CITY STATE)</option>
    <option value="HN">HONDURAS</option>
    <option value="HK">HONG KONG</option>
    <option value="HU">HUNGARY</option>
    <option value="IS">ICELAND</option>
    <option value="IN">INDIA</option>
    <option value="ID">INDONESIA</option>
    <option value="IR">IRAN, ISLAMIC REPUBLIC OF</option>
    <option value="IQ">IRAQ</option>
    <option value="IE">IRELAND</option>
    <option value="IM">ISLE OF MAN</option>
    <option value="IL">ISRAEL</option>
    <option value="IT">ITALY</option>
    <option value="JM">JAMAICA</option>
    <option value="JP">JAPAN</option>
    <option value="JE">JERSEY</option>
    <option value="JO">JORDAN</option>
    <option value="KZ">KAZAKHSTAN</option>
    <option value="KE">KENYA</option>
    <option value="KI">KIRIBATI</option>
    <option value="KP">KOREA (NORTH), DEMOCRATIC PEOPLE'S REPUBLIC OF KOREA</option>
    <option value="KR">KOREA (SOUTH), REPUBLIC OF KOREA</option>
    <option value="KW">KUWAIT</option>
    <option value="KG">KYRGYZSTAN</option>
    <option value="LA">LAO PEOPLE'S DEMOCRATIC REPUBLIC</option>
    <option value="LV">LATVIA</option>
    <option value="LB">LEBANON</option>
    <option value="LS">LESOTHO</option>
    <option value="LR">LIBERIA</option>
    <option value="LY">LIBYAN ARAB JAMAHIRIYA</option>
    <option value="LI">LIECHTENSTEIN</option>
    <option value="LT">LITHUANIA</option>
    <option value="LU">LUXEMBOURG</option>
    <option value="MO">MACAO</option>
    <option value="MK">MACEDONIA, THE FORMER YUGOSLAV REPUBLIC</option>
    <option value="MG">MADAGASCAR</option>
    <option value="MW">MALAWI</option>
    <option value="MY">MALAYSIA</option>
    <option value="MV">MALDIVES</option>
    <option value="ML">MALI</option>
    <option value="MT">MALTA</option>
    <option value="MH">MARSHALL ISLANDS</option>
    <option value="MQ">MARTINIQUE</option>
    <option value="MR">MAURITANIA</option>
    <option value="MU">MAURITIUS</option>
    <option value="YT">MAYOTTE</option>
    <option value="MX">MEXICO</option>
    <option value="FM">MICRONESIA, FEDERATED STATES OF</option>
    <option value="MD">MOLDOVA, REPUBLIC OF</option>
    <option value="MC">MONACO</option>
    <option value="MN">MONGOLIA</option>
    <option value="ME">MONTENEGRO</option>
    <option value="MS">MONTSERRAT</option>
    <option value="MA">MOROCCO</option>
    <option value="MZ">MOZAMBIQUE</option>
    <option value="MM">MYANMAR</option>
    <option value="NA">NAMIBIA</option>
    <option value="NR">NAURU</option>
    <option value="NP">NEPAL</option>
    <option value="NL">NETHERLANDS</option>
    <option value="AN">NETHERLANDS ANTILLES</option>
    <option value="NC">NEW CALEDONIA</option>
    <option value="NZ">NEW ZEALAND</option>
    <option value="NI">NICARAGUA</option>
    <option value="NE">NIGER</option>
    <option value="NG">NIGERIA</option>
    <option value="NU">NIUE</option>
    <option value="NF">NORFOLK ISLAND</option>
    <option value="MP">NORTHERN MARIANA ISLANDS</option>
    <option value="NO">NORWAY</option>
    <option value="OM">OMAN</option>
    <option value="PK">PAKISTAN</option>
    <option value="PW">PALAU</option>
    <option value="PS">PALESTINIAN TERRITORY, OCCUPIED</option>
    <option value="PA">PANAMA</option>
    <option value="PG">PAPUA NEW GUINEA</option>
    <option value="PY">PARAGUAY</option>
    <option value="PE">PERU</option>
    <option value="PH">PHILIPPINES</option>
    <option value="PN">PITCAIRN</option>
    <option value="PL">POLAND</option>
    <option value="PT">PORTUGAL</option>
    <option value="PR">PUERTO RICO</option>
    <option value="QA">QATAR</option>
    <option value="RE">REUNION</option>
    <option value="RO">ROMANIA</option>
    <option value="RU">RUSSIAN FEDERATION</option>
    <option value="RW">RWANDA</option>
    <option value="SH">SAINT HELENA</option>
    <option value="KN">SAINT KITTS AND NEVIS</option>
    <option value="LC">SAINT LUCIA</option>
    <option value="PM">SAINT PIERRE AND MIQUELON</option>
    <option value="VC">SAINT VINCENT AND THE GRENADINES</option>
    <option value="WS">SAMOA</option>
    <option value="SM">SAN MARINO</option>
    <option value="ST">SAO TOME AND PRINCIPE</option>
    <option value="SA">SAUDI ARABIA</option>
    <option value="SN">SENEGAL</option>
    <option value="RS">SERBIA</option>
    <option value="SC">SEYCHELLES</option>
    <option value="SL">SIERRA LEONE</option>
    <option value="SG">SINGAPORE</option>
    <option value="SK">SLOVAKIA</option>
    <option value="SI">SLOVENIA</option>
    <option value="SB">SOLOMON ISLANDS</option>
    <option value="SO">SOMALIA</option>
    <option value="ZA">SOUTH AFRICA</option>
    <option value="GS">SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS</option>
    <option value="SS">SOUTH SUDAN</option>
    <option value="ES">SPAIN</option>
    <option value="LK">SRI LANKA</option>
    <option value="SD">SUDAN</option>
    <option value="SR">SURINAME</option>
    <option value="SJ">SVALBARD AND JAN MAYEN</option>
    <option value="SZ">SWAZILAND</option>
    <option value="SE">SWEDEN</option>
    <option value="CH">SWITZERLAND</option>
    <option value="SY">SYRIAN ARAB REPUBLIC</option>
    <option value="TW">TAIWAN</option>
    <option value="TJ">TAJIKISTAN</option>
    <option value="TZ">TANZANIA, UNITED REPUBLIC OF</option>
    <option value="TH" selected>THAILAND</option>
    <option value="TL">TIMOR-LESTE</option>
    <option value="TG">TOGO</option>
    <option value="TK">TOKELAU</option>
    <option value="TO">TONGA</option>
    <option value="TT">TRINIDAD AND TOBAGO</option>
    <option value="TN">TUNISIA</option>
    <option value="TR">TURKEY</option>
    <option value="TM">TURKMENISTAN</option>
    <option value="TC">TURKS AND CAICOS ISLANDS</option>
    <option value="TV">TUVALU</option>
    <option value="UG">UGANDA</option>
    <option value="UA">UKRAINE</option>
    <option value="AE">UNITED ARAB EMIRATES</option>
    <option value="GB">UNITED KINGDOM</option>
    <option value="US">UNITED STATES</option>
    <option value="UM">UNITED STATES MINOR OUTLYING ISLANDS</option>
    <option value="UY">URUGUAY</option>
    <option value="UZ">UZBEKISTAN</option>
    <option value="VU">VANUATU</option>
    <option value="VE">VENEZUELA</option>
    <option value="VN">VIET NAM</option>
    <option value="VG">VIRGIN ISLANDS, BRITISH</option>
    <option value="VI">VIRGIN ISLANDS, U. S.</option>
    <option value="WF">WALLIS AND FUTUNA</option>
    <option value="EH">WESTERN SAHARA</option>
    <option value="YE">YEMEN</option>
    <option value="YU">YUGOSLAVIA</option>
    <option value="ZM">ZAMBIA</option>
    <option value="ZW">ZIMBABWE</option>
<!--/datalist>-->
</select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-3 control-label">Address:</label>
          <div class="col-lg-8">
            <input class="form-control" value="<?php print $data['address'];?>" name="address" type="text" tabindex="5" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">City:</label>
          <div class="col-lg-8">
            <input class="form-control" value="<?php print $data['city'];?>" name="city" type="text" tabindex="6" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Postcode:</label>
          <div class="col-lg-8">
            <input class="form-control" value="<?php print $data['postcode'];?>" name="postcode" type="text" tabindex="7" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Phone Number</label>
          <div class="col-lg-8">
            <input class="form-control" value="<?php print $data['telephone'];?>" name="telephone" type="text" tabindex="8" required>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-3 control-label">Password:</label>
          <div class="col-md-8">
            <input class="form-control" value="" type="password" name="password" tabindex="10">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Confirm password:</label>
          <div class="col-md-8">
            <input class="form-control" value="" type="password" name="confirm_password" tabindex="11">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" value="Save Changes" type="submit">
            <span></span>
            <input class="btn btn-default" value="Cancel" type="reset">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


		</section>
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              Page Name
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
