<?php
session_start();
$con=mysqli_connect('localhost','root','','Abhyuday');
$query=$con->prepare("SELECT * FROM `jobs` WHERE `Flag`=0");
$query->execute();
  $run= $query->get_result();
  $row=$run->num_rows;
  if(isset($_GET['approve']))
  {
      $id = $_GET['approve'];
    $query1=$con->prepare("UPDATE `jobs` SET `Flag`=1 WHERE `id`=?");
    $query1->bind_param("s",$id);
    $query1->execute();
    $run1= $query->get_result();
    header("refresh:0.1; url=admin_jobs.php");
  }
  if(isset($_GET['reject']))
  {
      $id = $_GET['reject'];
      $query1=$con->prepare("UPDATE `jobs` SET `Flag`=-1 WHERE `id`=?");
      $query1->bind_param("s",$id);
      $query1->execute();
      $run1= $query->get_result();
      header("refresh:0.1; url=admin_jobs.php");
  }
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.jpg">

    <meta name="author" content="">

    <title>admin jobs request</title>
    <link rel="stylesheet" type="text/css" href="../../assets/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/libs/jquery-minicolors/jquery.minicolors.css">
    <link rel="stylesheet" type="text/css" href="../../assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/libs/quill/dist/quill.snow.css">
    <link href="../../dist/css/style.min.css" rel="stylesheet">

</head>
<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper">
        <header class="topbar" data-navbarbg="skin5">
          <nav class="navbar top-navbar navbar-expand-md navbar-dark">
              <div class="navbar-header" data-logobg="dark">
                  <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                  <a class="navbar-brand" href="">
                      <b class="logo-icon p-l-10">
                           <img src="../../assets/images/favicon.jpg" alt="user" class="rounded-circle" width="31"></b>
                            <span class="logo-text">
                            <h2>Shiksha</h2>
                    </a>
                  <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
              </div>
              <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                  <ul class="navbar-nav float-left mr-auto">

                    <li class="nav-item dropdown">
                      <a class="nav-link waves-effect waves-dark pro-pic" aria-haspopup="true" aria-expanded="false"><p><h4></h4></p> </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link waves-effect waves-dark pro-pic" aria-haspopup="true" aria-expanded="false"><p><h3>Admin Page</h3></p> </a>
                    </li>
                  </ul>
                  <ul class="navbar-nav float-right">

                    <li class="nav-item dropdown">
                      <h4><a class="nav-link  waves-effect waves-dark" >
                      </a></h4>
                    </li>
                      <li class="nav-item dropdown">
                        <h4><a class="nav-link  waves-effect waves-dark" href="#" ><i class="mdi mdi-home font-24"></i> Log out
                        </a></h4>
                      </li>
                  </ul>
              </div>
            </nav>
      </header>
      <aside class="left-sidebar" data-sidebarbg="skin5">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false"><span class="hide-menu"><h4>See Upload Request of:</h4></span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="admin_course.php" aria-expanded="false"><i class="mdi mdi-library"></i><span class="hide-menu">Uploaded Courses</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="admin_scholar.php" aria-expanded="false"><i class="mdi mdi-school"></i><span class="hide-menu">Uploaded Scholarships</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false"><i class="mdi mdi-laptop"></i><span class="hide-menu">Uploaded Jobs</span></a></li>
                      </ul>
                </nav>
            </div>
        </aside>
        </div>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class ="row">
                <div class="col-sm-4 col-md-4 col-xs-4 col-lg-4"></div>
                <div class="col-sm-4 col-md-4 col-xs-4 col-lg-4">
                <div class ="card">
                <div class="card-body" style =" background-color: white">
                    <center>  <h4 >Jobs Request </h4></center>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-md-4 col-xs-4 col-lg-4"></div>
              </div>

              </div>

<div class="container-fluid">
<?php
 while($res=$run->fetch_assoc())
 { ?>
    <div class="row">
      <div class="col-sm-1 col-md-1 col-xs-1 col-lg-1"></div>
       <div class="col-sm-10 col-md-10 col-xs-10 col-lg-10">

         <div class="card">
           <div class="card-body">
             <div class="row">
               <div class="col-sm-5 col-md-5 col-xs-5 col-lg-5">
                 <h3 class="card-title"><?php echo $res['name_of_company']; ?></h3>
                 <b><h4><?php echo "Applicable for  " .$res['applicable_for']; ?></h4>
                 <p class="card-text">Designation : <b><?php echo $res['designation']; ?></b><br></p>
                 <p class="card-text">Jobs Description : <b><?php echo $res['job_description']; ?></b><br></p>
                 Skills Required : <b><?php echo $res['skills_required']; ?></b><br>
                 Location : <b><?php echo $res['location']; ?></b><br>
                 Stipend : <b><?php echo $res['Stipend']; ?></b><br>
                 Apply By : <b><?php echo $res['last_date']; ?></b><br>
                 Link for more details : <b><?php echo "<a href= " .$res['link'].">" .$res['link']." </a>" ;?></b></b><br>
               </div>
               <div class="col-sm-1 col-md-1 col-xs-1 col-lg-1"></div>
               <div class="col-sm-3 col-md-3 col-xs-3 col-lg-3">
              <p class="card-text">
              <b><?php
              $user_name = $res['user_name'];
              $query_instructor="SELECT * FROM `instructor_info` WHERE `user_name`= '$user_name' ";
              $run_instructor=mysqli_query($con, $query_instructor);
              $res_instructor=mysqli_fetch_assoc($run_instructor);
              echo "<h5> Provided by: " .$res_instructor['name_of_organization']. "</h5>";
              echo "<h5>" ."Name of instructor :" .$res_instructor['fname']. "  " .$res_instructor['lname']. "</h5>";
              echo "<h5> Contact Details: </h5>";
              echo "<h5> Email: " .$res_instructor['email']. "</h5>";
              echo "<h5> Phone: " .$res_instructor['mobno']. "</h5>";
              ?>
            </b></p>
          </div>
          <div class="col-sm-3 col-md-3 col-xs-3 col-lg-3">
          <br>
        <form action="#" method="get" name="login">
          <a href="admin_jobs.php?approve=<?php echo $res['id']; ?>" class="btn btn-success btn-lg">Approve</a>
          <a href="admin_jobs.php?reject=<?php echo $res['id']; ?>" class="btn btn-danger btn-lg">Reject</a>
      </form>
    </div>
  </div>
</div>
</div>
<br>
<br>
</div>
<div class="col-sm-1 col-md-1 col-xs-1 col-lg-1">
</div>
</div>
<?php
} ?>
</div>

<script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="../../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="../../assets/extra-libs/sparkline/sparkline.js"></script>
<script src="../../dist/js/waves.js"></script>
<script src="../../dist/js/sidebarmenu.js"></script>
<script src="../../dist/js/custom.min.js"></script>
<script src="../../assets/libs/flot/excanvas.js"></script>
<script src="../../assets/libs/flot/jquery.flot.js"></script>
<script src="../../assets/libs/flot/jquery.flot.pie.js"></script>
<script src="../../assets/libs/flot/jquery.flot.time.js"></script>
<script src="../../assets/libs/flot/jquery.flot.stack.js"></script>
<script src="../../assets/libs/flot/jquery.flot.crosshair.js"></script>
<script src="../../assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
<script src="../../dist/js/pages/chart/chart-page-init.js"></script>
</body>
</html>
