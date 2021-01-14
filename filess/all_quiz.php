<?php
session_start();
$con=mysqli_connect('localhost','root','','Abhyuday');
$user_name = $_SESSION['user_name'];
$_SESSION['user_name']=$user_name;

$query_i=$con->prepare("SELECT * FROM `documents` WHERE `user_name`= '$user_name'");
$query_i->execute();
$runn_i= $query_i->get_result();
$run_i=$runn_i->fetch_assoc();

$query_s=$con->prepare("SELECT * FROM `user_info` WHERE `user_name`= '$user_name'");
$query_s->execute();
$runn_s= $query_s->get_result();
$run_s=$runn_s->fetch_assoc();
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

    <title>Quiz_List</title>
    <link rel="stylesheet" type="text/css" href="../assets/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/libs/jquery-minicolors/jquery.minicolors.css">
    <link rel="stylesheet" type="text/css" href="../assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/libs/quill/dist/quill.snow.css">
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <style>
    #user_image{
      float:left;
      height:120px;
      width:120px;
      border-radius:50%;
      background-image:url("<?php echo "uploads/".$run_i['profile']?>");
      background-size: 100% 100%;
      margin-left:50px;
      margin-top:10px;
      opacity:75%;
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
    <div id="main-wrapper">
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
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
            </div>
            <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                <ul class="navbar-nav float-left mr-auto">
                  <li class="nav-item dropdown">
                    <center><h4 style =" color: white">Choose the language</h4>
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
                      <h4><a class="nav-link  waves-effect waves-dark"><i class="ti-user m-r-5 m"></i>
                       <?php echo $user_name ?></a></h4>
                  </li>
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
                      <div id="user_image"></div>
                      <br>
                      <br>
                      <br>
                      <br>
                      <br>
                      <br>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"  aria-expanded="false"><span class="hide-menu"></span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"  aria-expanded="false"><span class="hide-menu"></span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false"><i class="ti-user m-r-5 m"></i><span class="hide-menu"><?php echo $run_s['fname']." ".$run_s['lname']?></span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Allcourses.php?courses_page=<?php echo $user_name;?>" aria-expanded="false"><i class="mdi mdi-library"></i><span class="hide-menu">Courses</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Allscholar.php?scholar_page=<?php echo $user_name;?>" aria-expanded="false"><i class="mdi mdi-school"></i><span class="hide-menu"> Scholarships</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Alljobs.php?job_page=<?php echo $user_name;?>" aria-expanded="false"><i class="mdi mdi-laptop"></i><span class="hide-menu"> Jobs</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false"><i class="mdi mdi-pen"></i><span class="hide-menu"> Quiz</span></a></li>

                    </ul>
                </nav>
            </div>
        </aside>

        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 d-flex no-block align-items-center">
                        <h2 class="page-title">List of  Quizes</h2>
                    </div>
                    <div class="col-5 d-flex no-block align-items-center">
                        <h2 class="page-title">Instructions</h2>
                    </div>
                </div>
                <br>
            </div>

            <div class="container-fluid">
            <div class="row">

                <div class="col-md-7 col-lg-7 col-xlg-7">
                  <div class="card card-hover">
                      <div class="box  "style=" background-color:  #21d4ec;height: 4rem;">
                          <span class="text-white" ><b style="font-size: 1.4rem ; color:white;">Animation</b></span><a href="quiz.php" ><button class="btn btn-default btn-lg float-right" type="submit"> Start </button></a>
                          <hr style="background-color : white;">
                      </div>
                  </div>
                  <div class="card card-hover">
                      <div class="box bg-cyan "style="height: 4rem;">
                          <span class="text-white" style="font-size: 1.4rem"><b style="font-size: 1.4rem ; color: white;">Indian Sign Language </b></span><a href="quiz.html" ><button class="btn btn-default btn-lg float-right" type="submit"> Start </button></a>
                          <hr style="background-color : white;">
                      </div>
                  </div>
                  <div class="card card-hover">
                      <div class="box  "style=" background-color:  #21d4ec;height: 4rem;">
                          <span class="text-white" ><b style="font-size: 1.4rem ; color:white;">Charcter Recognition</b></span><a href="quiz.html" ><button class="btn btn-default btn-lg float-right" type="submit"> Start </button></a>
                          <hr style="background-color : white;">
                      </div>
                  </div>
                  <div class="card card-hover">
                      <div class="box bg-cyan "style="height: 4rem;">
                          <span class="text-white" style="font-size: 1.4rem"><b style="font-size: 1.4rem ; color: white;">Information Technology</b></span><a href="quiz.html" ><button class="btn btn-default btn-lg float-right" type="submit"> Start </button></a>
                          <hr style="background-color : white;">
                      </div>
                  </div>
                  <div class="card card-hover">
                      <div class="box  "style=" background-color:  #21d4ec;height: 4rem;">
                          <span class="text-white" ><b style="font-size: 1.4rem ; color:white;">Accounting </b></span><a href="quiz.html" ><button class="btn btn-default btn-lg float-right" type="submit"> Start </button></a>
                          <hr style="background-color : white;">
                      </div>
                  </div>

            </div>

            <div class="col-md-5 col-lg-5 col-xlg-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title m-b-0">Instructions for Keyboard operation</h4>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title m-b-0">To narrate press spacebar</h4>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title m-b-0">To give answer press control</h4>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title m-b-0">To goto previous question press Left arrow</h4>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title m-b-0">To goto next question press Right arrow</h4>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title m-b-0">To pause narration press shift</h4>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title m-b-0">To submit Quiz Press Enter</h4>
                    </div>
                </div>
              </div>
            <div class="col-md-1 col-lg-1 col-xlg-1"></div>
             </div>
            </div>
            </div>
          </div>
    <script type="text/javascript">
    //Speech
   function readOutLoud(message) {
  var speech = new SpeechSynthesisUtterance();
  speech.text = message;
  speech.volume = 1;
  speech.rate = 1;
  speech.pitch = 1;
  speech.lang='en-IN';
  window.speechSynthesis.speak(speech);
  }
      document.onkeyup = function(e) {
      if (e.which == 32) {
      readOutLoud("You Are Now on Quiz Page ");
      readOutLoud("These are general Instructions  before attaining Quizz");
      readOutLoud("To narrate  question press spacebar ");
      readOutLoud("To goto previous question press Left arrow");
      readOutLoud("To goto next question press Right arrow");
      readOutLoud("To pause narration press shift ");
      readOutLoud("To give answer press control button ");
      readOutLoud("To submit Quiz Press Enters");
      }
      else if(e.which == 16) {
        if (speechSynthesis.speaking) {
        speechSynthesis.cancel(); }
      }};
      </script>

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
