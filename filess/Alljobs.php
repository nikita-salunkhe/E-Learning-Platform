<?php
session_start();
$con=mysqli_connect('localhost','root','','Abhyuday');
$query=$con->prepare("SELECT * FROM `jobs` WHERE `Flag`=1");
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
    <title>Jobs</title>
    <link href="../assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <style>
        body{
          background-color: white;
        }
        .boxx{
        box-shadow: 0 16px 30px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        }
    </style>
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
                        <h2>Jobs</h2>
                  </a>
            </div>
            <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
              <ul class="navbar-nav float-left mr-auto">
                <li style ="padding-top: 10px;" class="nav-item dropdown">
                    <a class="nav-link waves-effect waves-dark pro-pic"  aria-haspopup="true" aria-expanded="false"><p><h4>Sort by:</h4></p></a>
                </li>
                <li style ="padding-top: 10px;" class="nav-item dropdown">
                  <form class="form-inline" action="#" method="post" name="login" class="needs-validation" novalidate>
                    <div class="form-group">
                      <label for="inputState"></label>
                      <select id="city" name ="applicable_for" style="width:150px; height: 35px;" class="form-control" onchange="selected()">
                        <option selected ><h1>Select<h1></option>
                          <option value="All" >All</option>
                          <option value="Blind" ><h1>Blind</h1></option>
                          <option value="Deaf" >Deaf</option>
                          <option value="Dumb" >Dumb</option>
                          <option value="Handicapped" >Handicapped</option>
                        </select>
                      </div>
                    </form>
                  </li>

                  <li style ="padding: 10px; height: 35px;" class="nav-item dropdown">

                    <div id="google_translate_element"></div>
                    <script type="text/javascript">
                    function googleTranslateElementInit() {
                      new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                    }
                    </script>
                    <script type="text/javascript" src="language_translation.js"></script>
                  </center>
                  </li>
                </ul>
                <ul class="navbar-nav float-right">
                  <li class="nav-item dropdown">
                      <h4><a class="nav-link  waves-effect waves-dark" href="home.php" ><i class="mdi mdi-home font-24"></i> Home
                      </a></h4>
                  </li>
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
                            <h4><a class="nav-link  waves-effect waves-dark" href="home.php?logout=logout" ><i class="mdi mdi-home font-24"></i> Log out</a></h4>
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

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Allcourses.php" aria-expanded="false"><i class="mdi mdi-library"></i><span class="hide-menu">Courses</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Allscholar.php" aria-expanded="false"><i class="mdi mdi-school"></i><span class="hide-menu"> Scholarships</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false"><i class="mdi mdi-laptop"></i><span class="hide-menu"> Jobs</span></a></li>
                    </ul>
                </nav>
            </div>
        </aside>
      <div class="page-wrapper"  style="background-color: white;">
            <div class="page-breadcrumb">

<br>
<br>
<br>
<div class ="row">
<div class="col-sm-1 col-md-1 col-xs-1 col-lg-1"></div>
<div class="col-sm-10 col-md-10 col-xs-10 col-lg-10">
  <div class="card">
    <div class ="row">
    <div class="col-sm-4 col-md-4 col-xs-4 col-lg-4"></div>
    <div class="col-sm-4 col-md-4 col-xs-4 col-lg-4">
    <center><div class="card-body" style="background-color:Lavender";>
          <h4 class="card-title m-b-0">Apply for Jobs</h4>

    </div>
  </div>
      <div class="col-sm-4 col-md-4 col-xs-4 col-lg-4"></div>

    </center>
  </div>
</div>

<div id="type"></div>
</div>
<div class="col-sm-1 col-md-1 col-xs-1 col-lg-1"></div>
</div>

</div>
</div>
<script>
<?php

$con=mysqli_connect('localhost','root','','Abhyuday');
$query=$con->prepare("SELECT * FROM `jobs` WHERE `Flag`=1");
$query->execute();
$run= $query->get_result();
$row=$run->num_rows;

?>

   var data = null;
   var d = null;
   var City = "All";
   show(data);
function show(data) {
let tab = ``;
console.log(City);

<?php
while($res=$run->fetch_assoc())
{
?>
data = "<?php echo $res['applicable_for']; ?>";
var com = data.localeCompare(City);
console.log("com="+com);
if(City==="All")
{

tab += ` <div class="card boxx" style=" background-color:  Azure">
     <div class="card-body">
       <div class="row">
         <div class="col-sm-5 col-md-5 col-xs-5 col-lg-5">
           <h3 class="card-title"><?php echo $res['name_of_company']; ?></h3>
           <h4><b><?php echo "Applicable for  " .$res['applicable_for']; ?></b></h4>
           <b><p class="card-text">Description : <b><?php echo $res['job_description']; ?></b><br></p>
           <p class="card-text">Skills required : <b><?php echo $res['skills_required']; ?></b><br></p>
           <p class="card-text">Designation : <b><?php echo $res['designation']; ?></b><br></p>
          <p class="card-text">Stipend : <b><?php echo $res['Stipend']; ?></b><br></p>
          <p class="card-text">Location : <b><?php echo $res['location']; ?></b><br></p>
             Link for more details : <b><?php echo '<a href= ' .$res['link'].'>' .$res['link'].' </a>' ;?></b></b><br>
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
    <div class="col-sm-3 col-md-3 col-xs-3 col-lg-3">
    <br>
      <a href="<?php echo $res['link']; ?>" class="btn btn-primary btn-lg">Apply</a>
</div>
</div>
</div>
</div>
</div><br><br>`;

document.getElementById("type").innerHTML = tab;

}
else if(com==0)
{

tab += `                  <div class="card boxx" style=" background-color:  Azure">
     <div class="card-body">
       <div class="row">
         <div class="col-sm-5 col-md-5 col-xs-5 col-lg-5">
           <h3 class="card-title"><?php echo $res['name_of_company']; ?></h3>
           <h4><b><?php echo "Applicable for  " .$res['applicable_for']; ?></b></h4>
           <b><p class="card-text">Description : <b><?php echo $res['job_description']; ?></b><br></p>
           <p class="card-text">Skills required : <b><?php echo $res['skills_required']; ?></b><br></p>
           <p class="card-text">Designation : <b><?php echo $res['designation']; ?></b><br></p>
          <p class="card-text">Stipend : <b><?php echo $res['Stipend']; ?></b><br></p>
          <p class="card-text">Location : <b><?php echo $res['location']; ?></b><br></p>
             Link for more details : <b><?php echo '<a href= ' .$res['link'].'>' .$res['link'].' </a>' ;?></b></b><br>
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
    <div class="col-sm-3 col-md-3 col-xs-3 col-lg-3">
    <br>
      <a href="<?php echo $res['link']; ?>" class="btn btn-primary btn-lg">Apply</a>
</div>
</div>
</div>
</div>
</div><br><br>`;

document.getElementById("type").innerHTML = tab;

}
else{
document.getElementById("type").innerHTML = tab;
}


<?php } ?>

}

   function selected()
  {
       City = document.getElementById("city").value;
        show(data);
  }
</script>
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
