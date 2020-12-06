<?php
session_start();
$con=mysqli_connect('localhost','root','','Abhyuday');


// for login`
if(isset($_POST['confirm_student']))
{
  $user_name= $_POST['user_name'];
	$password= $_POST['password'];

  $_SESSION['user_name']=$user_name;
  $pass=md5($password.$user_name);
  $query=$con->prepare("SELECT * FROM `user_info` WHERE `user_name` = ?");
  $query->bind_param("s",$user_name);
  $query->execute();
  $run= $query->get_result();
  $row=$run->num_rows;
	if($row==1){
    $res=$run->fetch_assoc();
    if($res['password']==$pass){
	     header('location:profile_student.php');
     }
     else{
      echo '<script>alert("you entered Wrong password")</script>';
     }
  }
  else {
    echo '<script>alert("you have not yet Registered")</script>';
  }
}

if(isset($_POST['confirm_instructor']))
{

  $user_name= $_POST['user_name'];
	$password= $_POST['password'];

  $_SESSION['user_name']=$user_name;
  $pass=md5($password.$user_name);
  $query=$con->prepare("SELECT * FROM `instructor_info` WHERE `user_name` = ?");
  $query->bind_param("s",$user_name);
  $query->execute();
  $run= $query->get_result();
  $row=$run->num_rows;
	if($row==1){
    $res=$run->fetch_assoc();
    if($res['password']==$pass){
 	     header('location:profile_instructor.php');
      }
     else{
      echo '<script>alert("you entered Wrong password")</script>';
     }
  }
  else {
    echo '<script>alert("you have not yet Registered")</script>';
  }
}

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
    <title>Shiksha</title>
    <link href="../assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <link href="../dist/css/style.min.css" rel="stylesheet">
<style>
.boxx{
box-shadow: 10px 10px grey;
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
                          <a class="nav-link waves-effect waves-dark pro-pic" href="Allcourses.php" aria-haspopup="true" aria-expanded="false"><p><h4>Courses</h4></p></a>
                      </li>

                      <li class="nav-item dropdown">
                        <a class="nav-link waves-effect waves-dark pro-pic" href="Alljobs.php" aria-haspopup="true" aria-expanded="false"><p><h4>Jobs</h4></p> </a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link waves-effect waves-dark pro-pic" href="Allscholar.php" aria-haspopup="true" aria-expanded="false"><p><h4>Scholarship</h4></p> </a>
                      </li>
                      </li>
                    </ul>
                    <ul class="navbar-nav float-right">
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
                        <li class="nav-item dropdown">
                            <a class="nav-link  waves-effect waves-dark" href="#" ><i class="mdi mdi-home font-24"></i> Home
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link  waves-effect waves-dark" href="#about_us" ><i class="font-24" ><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                              </svg></i> About Us
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link  waves-effect waves-dark" href="#contact_us" ><i class="mdi mdi-phone font-24"></i> Contact Us
                            </a>
                        </li>
                    </ul>
                </div>
              </nav>
            </header>
          </div>


        <main>
          <br>
          <div class="row">
            <div class="col-1"></div>
               <div class="col-10">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="../assets/images/navigation_bar/2.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                      <br>
                      <br>
                      <div class ="row">
                        <div class ="col-8"></div>
                        <div class="col-4">
                      <div class="card boxx" style="width: 30rem; background: FloralWhite">
                         <div class="card-body">
                         <br>
                          <h3 style=" color: black">Get Certified and Get Hired!!</h3>
                           <br><br>
                           <button type="button"  class="btn btn-info btn-lg" data-target="#mymodel" data-toggle="modal">Login</button>
                              <button type="button"  class="btn btn-success btn-lg" data-target="#myreg" data-toggle="modal">Register</button>
                              <br>
                              <br>
                          </div>
                       </div>
                     </div>
                     <div class ="col-0"></div>
                  </div>
              </div>
              <div class="col-1"></div>
          </div>
        </div>
        <br>
      </div>
    </div>
      <br>
      <br>
      <br>
      <br>
      <div class="row">
      <div class="col-1">
      </div>
      <div class="col-5">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="../assets/images/navigation_bar/tab1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="../assets/images/navigation_bar/tab2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="../assets/images/navigation_bar/tab3.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>

      <div class="col-5">
        <section id="about_us">
          <div class="card-body">
              <h2 class="card-title">Know About Us</h2>
              <h5>
                <br>
                Education is the process of facilitating learning, or the acquisition of knowledge, skills, values, beliefs, and habits. Educational methods include teaching, training, storytelling, discussion and directed research. Education frequently takes place under the guidance of educators, however learners can also educate themselves. Education can take place in formal or informal settings and any experience that has a formative effect on the way one thinks, feels, or acts may be considered educational. The methodology of teaching is called pedagogy.
                Formal education is commonly divided formally into such stages as preschool or kindergarten, primary school, secondary school and then college, university, or apprenticeship.
               <br>
             </h5>
        </div>
      </section>
      </div>
      <div class="col-1">
      </div>
    </div>
    <br>

    <div class="row">
              <div class="col-1">
              </div>
              <div class="col-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title m-b-0">Updates</h4>
                    </div>
                    <ul class="list-style-none">
                        <li class="d-flex no-block card-body">
                            <i class="fa fa-check-circle w-30px m-t-5"></i>
                            <div>
                                <a href="#" class="m-b-0 font-medium p-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                                <span class="text-muted">Added new course</span>
                            </div>
                            <div class="ml-auto">
                                <div class="tetx-right">
                                    <h5 class="text-muted m-b-0">20</h5>
                                    <span class="text-muted font-16">Jan</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex no-block card-body border-top">
                            <i class="fa fa-gift w-30px m-t-5"></i>
                            <div>
                                <a href="#" class="m-b-0 font-medium p-0">1200 students placed!</a>
                                <span class="text-muted">Congratualations!</span>
                            </div>
                            <div class="ml-auto">
                                <div class="tetx-right">
                                    <h5 class="text-muted m-b-0">11</h5>
                                    <span class="text-muted font-16">Jan</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex no-block card-body border-top">
                            <i class="fa fa-plus w-30px m-t-5"></i>
                            <div>
                                <a href="#" class="m-b-0 font-medium p-0">Maruti is a Responsive Admin theme</a>
                                <span class="text-muted">But already everything was solved. It will ...</span>
                            </div>
                            <div class="ml-auto">
                                <div class="tetx-right">
                                    <h5 class="text-muted m-b-0">19</h5>
                                    <span class="text-muted font-16">Jan</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex no-block card-body border-top">
                            <i class="fa fa-leaf w-30px m-t-5"></i>
                            <div>
                                <a href="#" class="m-b-0 font-medium p-0">Envato approved Maruti Admin template</a>
                                <span class="text-muted">i am very happy to approved by TF</span>
                            </div>
                            <div class="ml-auto">
                                <div class="tetx-right">
                                    <h5 class="text-muted m-b-0">20</h5>
                                    <span class="text-muted font-16">Jan</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex no-block card-body border-top">
                            <i class="fa fa-question-circle w-30px m-t-5"></i>
                            <div>
                                <a href="#" class="m-b-0 font-medium p-0"> I am alwayse here if you have any question</a>
                                <span class="text-muted">we glad that you choose our template</span>
                            </div>
                            <div class="ml-auto">
                                <div class="tetx-right">
                                    <h5 class="text-muted m-b-0">15</h5>
                                    <span class="text-muted font-16">Jan</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

              </div>
              <div class="col-1">
              </div>
              <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">What our users are saying?</h4>
                        <div class="chat-box scrollable" style="height:475px;">
                            <!--chat Row -->
                            <ul class="chat-list">
                                <!--chat Row -->
                                <li class="chat-item">
                                    <div class="chat-img"><img src="../assets/images/users/1.jpg" alt="user"></div>
                                    <div class="chat-content">
                                        <h6 class="font-medium">Katha Patel</h6>
                                        <div class="box bg-light-info">Lorem Ipsum is simply dummy text of the printing &amp; type setting industry.</div>
                                    </div>
                                    <div class="chat-time">10:56am 15 Jan 2020</div>
                                </li>
                                <!--chat Row -->
                                <li class="chat-item">
                                  <div class="chat-img"><img src="../assets/images/users/1.jpg" alt="user"></div>
                                  <div class="chat-content">
                                        <h6 class="font-medium">Swarali Purandare</h6>
                                        <div class="box bg-light-info">It’s Great opportunity to work.</div>
                                    </div>
                                    <div class="chat-time">10:57 am  15 Jan 2020</div>
                                </li>

                                <!--chat Row -->

                                <!--chat Row -->
                                <li class="chat-item">
                                  <div class="chat-img"><img src="../assets/images/users/1.jpg" alt="user"></div>
                                  <div class="chat-content">
                                        <h6 class="font-medium">Shrushti</h6>
                                        <div class="box bg-light-info">Well we have good budget for the project</div>
                                    </div>
                                    <div class="chat-time">11:00 am  15 Jan 2020</div>
                                </li>
                                <!--chat Row -->
                            </ul>
                        </div>
                    </div>

                </div>
              </div>
              <div class="col-1">
              </div>
            </div>
</main>
<footer class="page-footer font-small cyan darken-3" style="background-color:black;">
  <div class="container">
    <section id="contact_us">
    <center>
      <br>
      <br>
      <h2 style= "color:  #d1c5cd">Contact Us</h2>
      <br>
      <br>
        <div class="mb-5 flex-center">
          <a class="fb-ic">
            <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x" style="font-size:36px;color: #3b5998;"> </i>
          </a>
          <a class="tw-ic">
            <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x" style="font-size:36px;color: #00aced;"> </i>
          </a>
          <a class="gplus-ic">
            <i class="fab fa-google-plus-g fa-lg white-text mr-md-5 mr-3 fa-2x" style="font-size:36px;color:green"> </i>
          </a>
          <a class="li-ic">
            <i class="fab fa-linkedin-in fa-lg white-text mr-md-5 mr-3 fa-2x" style="font-size:36px; color: #0e76a8"> </i>
          </a>
          <a class="ins-ic">
            <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x" style="font-size:36px;  color: #ff69B4;"> </i>
          </a>
        </div>
        <div class="row">
            <div class="col-sm-4 col-md-4 col-xs-4 col-lg-4"></div>
            <div class="col-sm-2 col-md-2 col-xs-2 col-lg-2">
          <a class="phone">
            <i class="fa fa-phone" aria-hidden="true" style="font-size:36px;color: #d1c5cd"> </i>
            <br>
            <h5 style="font-size:15px;color: #d1c5cd">7083472839</h5>
          </a>
          <br>
        </div>
          <div class="col-sm-2 col-md-2 col-xs-2 col-lg-2">
          <a class="email">
            <i class="fa fa-envelope" aria-hidden="true" style="font-size:36px;color: #d1c5cd"> </i>
            <br>
              <h6 style="font-size:15px;color: #d1c5cd">abc@gmail.com</h6>
          </a>
        </div>
        <div class="col-sm-4 col-md-4 col-xs-4 col-lg-4"></div>
        </div>
      </center>

    </section>
  </div>
  <div class="footer-copyright text-center py-3" style="color: #d1c5cd">© 2020 Copyright: KSsquare.com
  </div>
</footer>
<div class=" my_reg modal" id="myreg">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background: AliceBlue">
      <div class="modal-header">
        <h3><center>Register as Organisation or Student</center><h3>

        <button type="button" class="close" data-dismiss="modal">&times</button>
      </div>
     <div class="modal-body">
        <form action="" method="post" name="login" class="needs-validation" novalidate>
          <center><a href="register_student.php" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Student</a>
            <a href="register_instructor.php" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Organization</a>

</center>
<br>
<br>
<br>


       </div>
     </form>
 </div>
</div>
</div>
</div>

<div class="container">

  <div class="modal" id="mymodel">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style=" background: AliceBlue">
        <div class="modal-header">
          <h2 class="text-dark" style= "padding:10px;color:black;">Login</h2>
          <button type="button" class="close" data-dismiss="modal">&times</button>
        </div>
       <div class="modal-body">
          <form action="#" method="post" name="login" class="needs-validation" novalidate>
            <div class="input-group mb-5">
            <div class="input-group">
            <div style="border: 0.5px solid gray;color:black;" class="input-group-prepend">
           <span class="input-group-text" id="inputGroupPrepend"><h4>Username</h4></span>
           </div>
          <input type="text" name="user_name" style="border: 0.5px solid gray;color:black;" class="form-control" placeholder="" aria-describedby="inputGroupPrepend"required>
         <div class="invalid-feedback">
           Please choose a username.
          </div>
        </div>
        </div>
        <div class="input-group mb-5">
        <div class="input-group">
        <div style="border: 0.5px solid gray;color:black;" class="input-group-prepend">
       <span class="input-group-text" id="inputGroupPrepend"><h4  >Password</h4></span>
       </div>
        <input type="password" name="password" style="border: 0.5px solid gray;color:black;" class="form-control" placeholder="" id="pwd" required>
     <div class="invalid-feedback">
       Please fill out this field.
      </div>
    </div>
  </div>
    <div class="modal-footer  justify-content-center">
    <button type="submit" name="confirm_student"style="border: 1px solid black;color:black;" class="btn btn-danger" ><h4>Student</h4></button>
    <button type="submit" name="confirm_instructor" style="border: 1px solid black;color:black;" class="btn btn-success"><h4>Organization</h4></button>

       </form>
   </div>
 </div>
</div>
</div>
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
