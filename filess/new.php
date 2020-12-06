<?php
session_start();
$con=mysqli_connect('localhost','root','','Abhyuday');
$query=$con->prepare("SELECT * FROM `courses` WHERE `Flag`=1");
$query->execute();
$run= $query->get_result();
$row=$run->num_rows;
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.jpg">
    <title>Courses</title>
    <link href="../assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



</head>
<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" class="whole">
        <header class="topbar" data-navbarbg="skin5">
          <nav class="navbar top-navbar navbar-expand-md navbar-dark">
              <div class="navbar-header" data-logobg="dark">
                  <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                  <a class="navbar-brand" href="">
                      <b class="logo-icon p-l-10">
                          <img src="../assets/images/favicon.jpg" alt="user" class="rounded-circle" width="31"></b>
                          <span class="logo-text">
                          <h2>Shiksha</h2>
                    </a>
              </div>
              <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                <ul class="navbar-nav float-left mr-auto">
                  <li style ="padding-top: 10px;" class="nav-item dropdown">
                      <a class="nav-link waves-effect waves-dark pro-pic"  aria-haspopup="true" aria-expanded="false"><p><h4>Disability</h4></p></a>
                  </li>
                  <li style ="padding-top: 20px;" class="nav-item dropdown">
                    <form class="form-inline" action="#" method="post" name="login" class="needs-validation" novalidate>
                      <div class="form-group">
                        <label for="inputState"></label>
                        <select id="inputState" name ="applicable_for" style="width:150px; height: 35px;" class="form-control" onchange="selected()">
                          <option selected ><h1>Select<h1></option>
                            <option value="All" >All</option>
                            <option value="Blind" ><h1>Blind</h1></option>
                            <option value="Deaf" >Deaf</option>
                            <option value="Dumb" >Dumb</option>
                            <option value="Handicapped" >Handicapped</option>
                          </select>
                        </div>
                        <button type="submit" name= "filter" class="btn btn-in"><span class="glyphicon glyphicon-search"></span></button>
                      </form>
                    </li>
                  </ul>
                  <ul class="navbar-nav float-right">
                    <li class="nav-item dropdown">

                        <?php
                          if(isset($_GET['courses_page']))
                          {
                              $user_name = $_SESSION['user_name'];
                              $_SESSION['user_name']= $user_name;

                          }
                          if(!empty($_SESSION['user_name'])){
                            ?>
                            <h4><a class="nav-link  waves-effect waves-dark"><i class="ti-user m-r-5 m"></i>
                            <?php echo $_SESSION['user_name'];?>
                          </a></li>
                          <li class="nav-item dropdown">
                            <h4><a class="nav-link  waves-effect waves-dark" >
                            </a></h4>
                          </li>
                            <li class="nav-item dropdown">
                              <h4><a class="nav-link  waves-effect waves-dark" href="#" ><i class="mdi mdi-home font-24"></i> Log out</a></h4>
                            </li>

                            <?php
                          }

                        ?>


                    </ul>
                </div>
              </nav>
          </header>

      <aside class="left-sidebar" data-sidebarbg="skin5">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false"><i class="mdi mdi-laptop"></i><span class="hide-menu">Courses</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Allscholar.php" aria-expanded="false"><i class="mdi mdi-laptop"></i><span class="hide-menu"> Scholarships</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Alljobs.php" aria-expanded="false"><i class="mdi mdi-laptop"></i><span class="hide-menu"> Jobs</span></a></li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="page-wrapper">
            <div class="page-breadcrumb">
                  <h2 class="page-title">Courses</h2>
                  <br>
                  <br>
                  <?php
          while($res=$run->fetch_assoc())
          {
            if(isset($_POST['filter'])){
            $applicable_for = $_POST['applicable_for'];
            if($applicable_for == "All"){
            ?>
              <div class="row">
                <div class="col-sm-1 col-md-1 col-xs-1 col-lg-1"></div>
                 <div class="col-sm-10 col-md-10 col-xs-10 col-lg-10">
                   <div class="card">
                     <div class="card-body">
                       <div class="row">
                         <div class="col-sm-5 col-md-5 col-xs-5 col-lg-5">
                           <h3 class="card-title"><?php echo $res['course_name']; ?></h3>
                           <h4><?php echo "Applicable for  " .$res['applicable_for']; ?></h4>
                           <p class="card-text">Description : <b><?php echo $res['Course_Description']; ?></b><br></p>
                           <p class="card-text">Course Duration : <b><?php echo $res['course_duration']; ?></b><br></p>
                           <p class="card-text">Course Fees : <b><?php echo $res['course_fees']; ?></b><br></p>
                           Link for more details : <b><?php echo '<a href= ' .$res['course_link'].'>' .$res['course_link'].' </a>' ;?></b><br>

                         </div>
                         <div class="col-sm-1 col-md-1 col-xs-1 col-lg-1"></div>
                         <div class="col-sm-3 col-md-3 col-xs-3 col-lg-3">
                        <p class="card-text">
                        <?php
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
                      </p>
                    </div>
                    <div class="col-sm-3 col-md-3 col-xs-3 col-lg-3">
                    <br>
                    <div class="col-sm-3 col-md-3 col-xs-3 col-lg-3">
                    <br>
                  <a href="course_enroll.php?enrolled=<?php echo $res['id']; ?>" class="btn btn-primary">Enroll</a>

              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   <?php
  }
  if($applicable_for == $res['applicable_for']){
   ?>

     <div class="row">
       <div class="col-sm-1 col-md-1 col-xs-1 col-lg-1"></div>
        <div class="col-sm-10 col-md-10 col-xs-10 col-lg-10">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-5 col-md-5 col-xs-5 col-lg-5">
                  <h3 class="card-title"><?php echo $res['course_name']; ?></h3>
                  <h4><?php echo "Applicable for  " .$res['applicable_for']; ?></h4>
                  <p class="card-text">Description : <b><?php echo $res['Course_Description']; ?></b><br></p>
                  <p class="card-text">Course Duration : <b><?php echo $res['course_duration']; ?></b><br></p>
                  <p class="card-text">Course Fees : <b><?php echo $res['course_fees']; ?></b><br></p>
                     Link for more details : <b><?php echo '<a href= ' .$res['course_link'].'>' .$res['course_link'].' </a>' ;?></b><br>
                </div>
                <div class="col-sm-1 col-md-1 col-xs-1 col-lg-1"></div>
                <div class="col-sm-3 col-md-3 col-xs-3 col-lg-3">
               <p class="card-text">
               <?php
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
             </p>
           </div>
           <div class="col-sm-3 col-md-3 col-xs-3 col-lg-3">
           <br>
          <a href="course_enroll.php?enrolled=<?php echo $res['id']; ?>" class="btn btn-primary">Enroll</a>
     </div>
   </div>
 </div>
</div>
</div>
</div>
<?php
    }
  }
else{
  ?>
  <div class="row">
    <div class="col-sm-1 col-md-1 col-xs-1 col-lg-1"></div>
     <div class="col-sm-10 col-md-10 col-xs-10 col-lg-10">
       <div class="card">
         <div class="card-body">
           <div class="row">
             <div class="col-sm-5 col-md-5 col-xs-5 col-lg-5">
               <h3 class="card-title"><?php echo $res['course_name']; ?></h3>
               <h4><?php echo "Applicable for  " .$res['applicable_for']; ?></h4>
               <p class="card-text">Description : <b><?php echo $res['Course_Description']; ?></b><br></p>
               <p class="card-text">Course Duration : <b><?php echo $res['course_duration']; ?></b><br></p>
               <p class="card-text">Course Fees : <b><?php echo $res['course_fees']; ?></b><br></p>
                  Link for more details : <b><?php echo '<a href= ' .$res['course_link'].'>' .$res['course_link'].' </a>' ;?></b><br>
             </div>
             <div class="col-sm-1 col-md-1 col-xs-1 col-lg-1"></div>
             <div class="col-sm-3 col-md-3 col-xs-3 col-lg-3">
            <p class="card-text">
            <?php
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
          </p>
        </div>
        <div class="col-sm-3 col-md-3 col-xs-3 col-lg-3">
        <br>
        <a href="course_enroll.php?enrolled=<?php echo $res['id']; ?>" class="btn btn-primary">Enroll</a>

  </div>
</div>
</div>
</div>
</div>
</div>
 <?php
    }
  }
?>
<?php
/*if(isset($_GET['enrolled']))
{

  /*echo $_SESSION['uname'];
  $id = $_GET['enrolled'];
  $query1=$con->prepare("INSERT INTO `enrolled_courses`(`user_name`,`course_n`) VALUES (?,?)");
  $query1->bind_param("ss",,$id);
  $query1->execute();
  echo '<script>alert("Course Enrolled sucessfully")</script>';
  header("refresh:0.1");
}*/
 ?>
<hr>
</div>
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="../assets/extra-libs/sparkline/sparkline.js"></script>
<script src="../dist/js/waves.js"></script>
<script src="../dist/js/sidebarmenu.js"></script>
<script src="../dist/js/custom.min.js"></script>
<script src="../assets/libs/flot/excanvas.js"></script>
<script src="../assets/libs/flot/jquery.flot.js"></script>
<script src="../assets/libs/flot/jquery.flot.pie.js"></script>
<script src="../assets/libs/flot/jquery.flot.time.js"></script>
<script src="../assets/libs/flot/jquery.flot.stack.js"></script>
<script src="../assets/libs/flot/jquery.flot.crosshair.js"></script>
<script src="../assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
<script src="../dist/js/pages/chart/chart-page-init.js"></script>
</body>
</html>
