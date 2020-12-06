<?php
session_start();
$con=mysqli_connect('localhost','root','','Abhyuday');
$user_name = $_SESSION['user_name'];
$_SESSION['user_name']=$user_name;

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

    <title>Profile student</title>
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
      background-image:url("photo.jpg");
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
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="personal.php" aria-expanded="false"><i class="ti-user m-r-5 m"></i><span class="hide-menu">Personal info</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="education.php" aria-expanded="false"><i class="mdi mdi-laptop"></i><span class="hide-menu">Education info</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Allcourses.php?courses_page=<?php echo $user_name;?>" aria-expanded="false"><i class="mdi mdi-laptop"></i><span class="hide-menu">Courses</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Allscholar.php?scholar_page=<?php echo $user_name;?>" aria-expanded="false"><i class="mdi mdi-laptop"></i><span class="hide-menu"> Scholarships</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="Alljobs.php?job_page=<?php echo $user_name;?>" aria-expanded="false"><i class="mdi mdi-laptop"></i><span class="hide-menu"> Jobs</span></a></li>


                    </ul>
                </nav>
            </div>
        </aside>

        <div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                  <div class="col-1 d-flex no-block align-items-center"></div>
                    <div class="col-11 d-flex no-block align-items-center">

                      <h2 class="page-title">Exam - Time </h2>

                </div>
            </div>
            <div class="container-fluid">
              <br>


<div id="demo" class="scp-quizzes-main">
  <div class="scp-quizzes-data">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10" style="">
     <br>
     <div class="col-md-12" style="background-color: Azure; color: Black;">
    <br>
      <h3 id="que">Q1.National Income estimates in India are prepared by </h3>
      <br>
    </div>
    <div class="col-md-12" style="background-color: white; font-size:1rem; color: #082287;">
    <br>
    <h3><input id="r1" type="radio"  name="op" onClick="ResetSmileStatus('opt1');"></b>
      <label for="Fastlearning" id="opt1" >A) Planning Commission</label></h3><br/>
   <h3><b><input id="r2" type="radio"  name="op" onClick="ResetSmileStatus('opt2');"></b>
      <label id="opt2">B) Reserve Bank of India</label></h3><br/>
   <h3><b><input id="r3" type="radio"  name="op"  onClick="ResetSmileStatus('opt3');"></b>
      <label id="opt3">C) Central statistical organisation</label></h3> <br/>
   <h3><b><input id="r4" type="radio"  name="op"  onClick="ResetSmileStatus('opt4');"></b>
    <label id="opt4">D) Indian statistical Institute</label></h3>
     <br>
   </div>
    <div class="col-md-12">
      <br>
       <h3 id="ans1" style="color: black;"></h3>
      <br>
    </div>
      <br>
      <div class="col-md-12" style="">
      <button type="button" class=" btn btn-primary btn-lg float-left"  onclick="prevfun()">Previous</button>
      <button type="button" class="btn btn-primary btn-lg float-right"  onclick="nextfun()">Next</button>
      <center><button id='btnGiveCommand' class="btn btn-primary btn-lg ">Give Command!</button>
      <button id='bt' class="btn btn-primary btn-lg" onclick="readfun()">Narrate</button> </center>
      <center><div id="message"></div></center>
      <br>
      <br>
      <center><button type="button" class="btn btn-success btn-lg"  onclick="subfun()">Submit Test</button></center>
      </div>
     </div>
    <div class="col-md-1 "></div>
   <br>
   <br>
   <br>
</div>
</div>
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10" >
    <div id= "marks_show"></div>
  </div>
<div class="col-md-1"></div>
</div>

<br>
<br>
<br>
<br>
</div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
  var message = document.querySelector('#message');
  var i=0;
  var ansuser=[5];
  var qu=["Q1.National Income estimates in India are prepared by ","Q2.The staple food of the Vedic Aryan was","Q3.The tropic of cancer does not pass through which of these Indian states ?","Q4.The purest form of iron is ","Q5.Fathometer is used to measure"];
  var op1=["A) Planning Commission" , "A) Barley and rice" ,"A) Madhya Pradesh" ,"A) wrought iron" ,"A) Earthquakes"];
  var op2=["B) Reserve Bank of India" ,"B) Milk and its products","B) West Bengal","B) steel","B) Rainfall"];
  var op3=["C) Central statistical organisation","C) Rice and pulses","C) Rajasthan","C) pig iron","C) Ocean depth"];
  var op4=["D) Indian statistical Institute","D) Vegetables and fruits"  ,"D) Odisha","D) nickel steel","D) Sound intensity"];
  var ans=["opt1","opt2","opt3","opt4","opt4"];

 $(document).ready(function() {
    $('label').click(function() {
        $('label').removeClass('worngans');
        $(this).addClass('worngans');
    });
});

 function nextfun() {
 if(i==4)
    return
    i++;
    if (speechSynthesis.speaking) {
          speechSynthesis.cancel();}
        document.getElementById('r1').checked = false;
        document.getElementById('r2').checked = false;
        document.getElementById('r3').checked = false;
        document.getElementById('r4').checked = false;
        message.textContent="";
        document.getElementById("ans1").innerHTML = "";
        document.getElementById("que").innerHTML = qu[i];
        document.getElementById("opt1").innerHTML = op1[i];
        document.getElementById("opt2").innerHTML =  op2[i];
        document.getElementById("opt3").innerHTML =  op3[i];
        document.getElementById("opt4").innerHTML =  op4[i];
      }

function prevfun() {
  if(i==0)
    {return}
    i--;
    if (speechSynthesis.speaking) {
          speechSynthesis.cancel();}
        document.getElementById('r1').checked = false;
        document.getElementById('r2').checked = false;
        document.getElementById('r3').checked = false;
        document.getElementById('r4').checked = false;
        message.textContent="";
        document.getElementById("ans1").innerHTML = "";
        document.getElementById("que").innerHTML = qu[i];
        document.getElementById("opt1").innerHTML = op1[i];
        document.getElementById("opt2").innerHTML =  op2[i];
        document.getElementById("opt3").innerHTML =  op3[i];
        document.getElementById("opt4").innerHTML =  op4[i];
}
function readfun() {
      readOutLoud(qu[i]);
      readOutLoud(op1[i]);
      readOutLoud(op2[i]);
      readOutLoud(op3[i]);
      readOutLoud(op4[i]);
}

function againreadfun() {
    readOutLoud("Repeat Again");
}

function ResetSmileStatus(opt){
console.log(opt);
if ( ans[i]  == opt)
      {
            ansuser[i]=opt;
            document.getElementById("ans1").innerHTML = "Answer Noted";
            readOutLoud("Answer Noted");
      }
else{
      ansuser[i]=opt;
      document.getElementById("ans1").innerHTML = "Answer Noted";
      readOutLoud("Answer Noted");
    }
}
var k=0;
function subfun(){
    for(var i=0;i<5;i++)
    {
        if(ansuser[i]==ans[i])
        {
            k++;
        }
    }
 document.getElementById("marks_show").innerHTML = " <h3> Your Score is " + (k * 2) + " out of 10 <h3>";
 readOutLoud("Your Score is " + (k * 2) + " out of 10 ");
 console.log(k);
}

  function readOutLoud(message) {
  var speech = new SpeechSynthesisUtterance();
  speech.text = message;
  speech.volume = 1;
  speech.rate = 1;
  speech.pitch = 1;
  speech.lang='en-IN';
  window.speechSynthesis.speak(speech);
}
        var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
        var SpeechGrammarList = SpeechGrammarList || webkitSpeechGrammarList;
        var grammar = '#JSGF V1.0;'
        var recognition = new SpeechRecognition();
        var speechRecognitionList = new SpeechGrammarList();
        speechRecognitionList.addFromString(grammar, 1);
        recognition.grammars = speechRecognitionList;
        recognition.lang = 'en-IN';
        recognition.interimResults = false;
        recognition.onresult = function(event) {
            var last = event.results.length - 1;
            var command = event.results[last][0].transcript;
            var confidence = event.results[last][0].confidence;
            console.log(confidence);
             message.textContent = 'Voice Input: ' + command + '.';
               console.log(command .toLowerCase());
            if(confidence < 0.5)
            { console.log("jjr");
                againreadfun();
            }
            else if(command .toLowerCase()=== "first" || command .toLowerCase()=== "second" || command .toLowerCase()=== "third" || command .toLowerCase()=== "fourth"){


                if(command .toLowerCase()=== "first"){
               document.getElementById('r1').checked = true;
               ResetSmileStatus('opt1');


            }
            else if (command.toLowerCase() === "second"){
                 document.getElementById('r2').checked = true;
                 ResetSmileStatus('opt2')
            }
            else if (command.toLowerCase() === "third"){
                document.getElementById('r3').checked = true;
                ResetSmileStatus('opt3')
            }
            else if (command.toLowerCase() === "fourth"){
                 document.getElementById('r4').checked = true;
                 ResetSmileStatus('opt4')
            }
            }
           else{
            console.log("jj");
                 againreadfun();
        }
        };
        recognition.onspeechend = function() {
            recognition.stop();
        };
        recognition.onerror = function(event) {
            message.textContent = 'Error occurred in recognition: ' + event.error;
        }
        document.querySelector('#btnGiveCommand').addEventListener('click', function(){
            recognition.start();
});

       document.onkeyup = function(e) {
      if (e.which == 32) {
        readfun();
      } else if (e.which == 37) {
        if (speechSynthesis.speaking) {
        speechSynthesis.cancel(); }
        prevfun();
        readfun();
      } else if (e.which == 39) {
        if (speechSynthesis.speaking) {
        speechSynthesis.cancel(); }
        nextfun();
        readfun();
      } else if (e.which == 13) {
        if (speechSynthesis.speaking) {
        speechSynthesis.cancel();}
        subfun();
      }
      else if (e.which == 16) {
        if (speechSynthesis.speaking) {
        speechSynthesis.cancel();
      }
      }
      else if (e.which == 17 ) {
        if (speechSynthesis.speaking) {
        speechSynthesis.cancel();
          }
      recognition.start();
    }};


    </script>
    <!-- keyboard operation ended-->
    </html>
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
