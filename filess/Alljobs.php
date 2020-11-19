<?php
session_start();
$con=mysqli_connect('localhost','root','','Abhyuday');
$query=$con->prepare("SELECT * FROM `jobs`");
$query->execute();
  $run= $query->get_result();
  $row=$run->num_rows;
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.jpg">
    <title>Jobs</title>
    <!-- Custom CSS -->
    <link href="../assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    
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
            <nav class="navbar top-navbar navbar-expand-md navbar-dark sticky shadow">
                <div class="navbar-header" data-logobg="dark">
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>

                    <a class="navbar-brand" href="">
                        <b class="logo-icon p-l-10">

                             <img src="../assets/images/favicon.jpg" alt="user" class="rounded-circle" width="31"></b>

                        <span class="logo-text">

                             <h2>Shiksha</h2>

                    </a>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>

                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

                    <ul class="navbar-nav float-left mr-auto">
                      <li class="nav-item dropdown">
                          
                        <!--  <div class="dropdown-menu dropdown-menu-right user-dd animated">
                              <a class="dropdown-item" href=""><i class="fa fa-deaf" aria-hidden="true" width="60"></i>Deaf</a>
                              <a class="dropdown-item" href=""><i class="fa fa-blind" aria-hidden="true" width="60"></i>Blind</a>
                              <a class="dropdown-item" href=""><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-mic-mute-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M12.734 9.613A4.995 4.995 0 0 0 13 8V7a.5.5 0 0 0-1 0v1c0 .274-.027.54-.08.799l.814.814zm-2.522 1.72A4 4 0 0 1 4 8V7a.5.5 0 0 0-1 0v1a5 5 0 0 0 4.5 4.975V15h-3a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-3v-2.025a4.973 4.973 0 0 0 2.43-.923l-.718-.719zM11 7.88V3a3 3 0 0 0-5.842-.963L11 7.879zM5 6.12l4.486 4.486A3 3 0 0 1 5 8V6.121zm8.646 7.234l-12-12 .708-.708 12 12-.708.707z"/>
            </svg>Dumb</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href=""><img src="../assets/images/users/handicapped.jpg" alt="user"  width="31">Physically disabled</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href=""><img src="../assets/images/users/intellectual_disable.jpeg" alt="user"  width="31"></i>Intellectual disability</a>
                              <div class="dropdown-divider"></div>

                          </div>-->
                      </li>

                      <li class="nav-item dropdown">
                        
                        
                        <!--  <div class="dropdown-menu dropdown-menu-right user-dd animated">
                              <a class="dropdown-item" href=""><i class="fa fa-deaf" aria-hidden="true" width="60"></i>Deaf</a>
                              <a class="dropdown-item" href=""><i class="fa fa-blind" aria-hidden="true" width="60"></i>Blind</a>
                              <a class="dropdown-item" href=""><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-mic-mute-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M12.734 9.613A4.995 4.995 0 0 0 13 8V7a.5.5 0 0 0-1 0v1c0 .274-.027.54-.08.799l.814.814zm-2.522 1.72A4 4 0 0 1 4 8V7a.5.5 0 0 0-1 0v1a5 5 0 0 0 4.5 4.975V15h-3a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-3v-2.025a4.973 4.973 0 0 0 2.43-.923l-.718-.719zM11 7.88V3a3 3 0 0 0-5.842-.963L11 7.879zM5 6.12l4.486 4.486A3 3 0 0 1 5 8V6.121zm8.646 7.234l-12-12 .708-.708 12 12-.708.707z"/>
            </svg>Dumb</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href=""><img src="../assets/images/users/handicapped.jpg" alt="user"  width="31">Physically disabled</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href=""><img src="../assets/images/users/intellectual_disable.jpeg" alt="user"  width="31"></i>Intellectual disability</a>
                              <div class="dropdown-divider"></div>

                          </div>-->
                      </li>
                    </ul>


                    <ul class="navbar-nav float-right">
                        
                        
                        
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
              </nav>
            </header>
            <aside class="left-sidebar" data-sidebarbg="skin5">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav" class="p-t-30">
                          <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">Home</span></a></li>
                          <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Allcourses.php" aria-expanded="false"><i class="mdi  mdi-book-open"></i><span class="hide-menu">Courses</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="all_quiz.html" aria-expanded="false"><i class="mdi  mdi-pen"></i><span class="hide-menu">Quiz</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Allscholar.php" aria-expanded="false"><i class="mdi mdi-book"></i><span class="hide-menu">Scholarship</span></a></li>
    
                        </ul>
                    </nav>
                    <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->
            </aside>
        </div>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h2 class="page-title">Jobs</h2>
                    </div>
                </div>
                <br>
            </div>
            <hr>
            <div class="container-fluid">


            <div class="row">
                <!-- Column -->
                <div class="col-md-1 col-lg-1 col-xlg-1"></div>
                <div class="col-md-5 col-lg-5 col-xlg-5">
            <div class="form-group">
            <label for="inputState">Select</label>
            <select id="inputState" class="form-control" onchange="selected()">
              <option selected>--</option>
              <option value="All" >All</option>
              <option value="Blind" >Blind</option>
          <option value="Deaf" >Deaf</option>
          <option value="Dumb" >Dumb</option>
          
            </select>
          </div>
          </div>
          <div class="col-md-6 col-lg-6 col-xlg-6"></div>
</div>
<div id="type"></div>


            </div>
            <footer class="page-footer font-small cyan darken-3" style="background-color:black;">
            
                <br>
                <!-- Copyright -->
                <div class="footer-copyright text-center py-3" style="color: #d1c5cd">© 2020 Copyright: 1086_Abhyuday
                </div>
                <br>
                <br>
              </footer>
            </div>

            <script>
                <?php
                $query=$con->prepare("SELECT * FROM `jobs`");
                $query->execute();
                  $run= $query->get_result();
                  $row=$run->num_rows;
                 
                ?>
                var data = null;
                
                var State = null;
function show(data) { 
    let tab = ``;
    <?php
    while($res=$run->fetch_assoc())
    {
         ?>
         data = "<?php echo $res['Can_Apply']; ?>";
         var com = data.localeCompare(State);
         if(com==0)
         {
            console.log(com);
            tab += `<div class="row">
                <!-- Column -->
                <div class="col-md-1 col-lg-1 col-xlg-1"></div>
                <div class="col-md-10 col-lg-10 col-xlg-10">
            <div class="card card-hover">
                <div class="box bg-cyan "style="height: 13rem;">

                    <h3 class="text-white"><?php echo $res['Job_Name'] ?></h3>
                    <hr style="background-color : white;">
                    
                    <div class="footer">
                        <p class="text-white" style = "font-size:1rem">
                        <div class="row text-white">
                        <div class="col-md-4 col-lg-4 col-xlg-4">
                        
                        <b><?php echo $res['Company_Name'] ?></b><br>
                        Income : <b><?php echo $res['Stipend'] ?></b><br>
                        <b><?php echo $res['Location'] ?></b><br>
                        Contact : <b><?php echo $res['Contact'] ?></b><br>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xlg-4">
                        Apply Date : <b><?php echo $res['Apply_date'] ?></b><br>
                        About : <b><?php echo $res['About'] ?></b><br>
                        Skills : <b><?php echo $res['Skills'] ?></b><br>
                        Who Can Apply : <b><?php echo $res['Can_Apply'] ?></b><br>
                    </div>
                    <div class="col-md-4 col-lg-4 col-xlg-4">
                        <br>
                        
                    <center><a type="button" class="btn btn-info btn" href ="Mycourses.html">Apply</a></center>
                    </div>
                    </div>
                    </p>
                         


                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-1 col-lg-1 col-xlg-1"></div>
        </div>
       `;

             document.getElementById("type").innerHTML = tab; 
            
         }
         else if(State==null)
         {
             console.log(State);
             tab += `<div class="row">
                <!-- Column -->
                <div class="col-md-1 col-lg-1 col-xlg-1"></div>
                <div class="col-md-10 col-lg-10 col-xlg-10">
            <div class="card card-hover">
                <div class="box"style="height: 13rem; background-color:#4e5178;">

                    <h3 class="text-white"><?php echo $res['Job_Name'] ?></h3>
                    <hr style="background-color : white;">
                    
                    <div class="footer">
                    <p class="text-white" style = "font-size:1rem">
                        <div class="row text-white">
                        <div class="col-md-4 col-lg-4 col-xlg-4">
                        
                        <b><?php echo $res['Company_Name'] ?></b><br>
                        Income : <b><?php echo $res['Stipend'] ?></b><br>
                        <b><?php echo $res['Location'] ?></b><br>
                        Contact : <b><?php echo $res['Contact'] ?></b><br>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xlg-4">
                        Apply Date : <b><?php echo $res['Apply_date'] ?></b><br>
                        About : <b><?php echo $res['About'] ?></b><br>
                        Skills : <b><?php echo $res['Skills'] ?></b><br>
                        Who Can Apply : <b><?php echo $res['Can_Apply'] ?></b><br>
                    </div>
                    <div class="col-md-4 col-lg-4 col-xlg-4">
                        <br>
                        
                        <center><a type="button" class="btn btn-info btn" href ="Mycourses.html">Apply</a></center>
                    </div>
                    </div>
                    </p>


                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-1 col-lg-1 col-xlg-1"></div>
        </div>
       `;

             document.getElementById("type").innerHTML = tab; 
         }
    <?php } ?>
    

}

                function selected()
{
  State = document.getElementById("inputState").value;
 if(State=="All")
    State = null;
  else
    console.log(State);
  show(data); 
}
            </script>
                      <!-- Copyright -->
              
              
                  <!-- ============================================================== -->
                  <!-- End Wrapper -->
                  <!-- ============================================================== -->
                  <!-- ============================================================== -->
                  <!-- All Jquery -->
                  <!-- ============================================================== -->
                  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
                  <!-- Bootstrap tether Core JavaScript -->
                  <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
                  <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
                  <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
                  <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
                  <!--Wave Effects -->
                  <script src="../dist/js/waves.js"></script>
                  <!--Menu sidebar -->
                  <script src="../dist/js/sidebarmenu.js"></script>
                  <!--Custom JavaScript -->
                  <script src="../dist/js/custom.min.js"></script>
                  <!--This page JavaScript -->
                  <!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
                  <!-- Charts js Files -->
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