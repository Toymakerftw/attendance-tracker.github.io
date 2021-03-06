<?php

if(isset($_POST['login']))
{
	//start of try block

	try{

		//checking empty fields
		if(empty($_POST['username'])){
			throw new Exception("Username is required!");
			
		}
		if(empty($_POST['password'])){
			throw new Exception("Password is required!");
			
		}
		//establishing connection with db and things
		include ('connect.php');
		
		//checking login info into database
		$row=0;
		$result=mysqli_query($con,"select * from admininfo where username='$_POST[username]' and password='$_POST[password]' and type='$_POST[type]'");

		$row=mysqli_num_rows($result);

		if($row>0 && $_POST["type"] == 'teacher'){
			session_start();
			$_SESSION['name']="oasis";
			header('location: teacher/index.php');
		}

		else if($row>0 &&  $_POST["type"] == 'student'){
			session_start();
			$_SESSION['name']="oasis";
			header('location: student/index.php');
		}

		else if($row>0 && $_POST["type"] == 'admin'){
			session_start();
			$_SESSION['name']="oasis";
			header('location: admin/index.php');
		}

		else{
			throw new Exception("Username,Password or Role is wrong, try again!");
			
			header('location: login.php');
		}
	}

	//end of try block
	catch(Exception $e){
		$error_msg=$e->getMessage();
	}
	//end of try-catch
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ʙᴜɴᴋ~ᴇʀ</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" type="image/png" href="assets/img/fav.png">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">
      <h1><a href="index.html">Bunk~Er</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->
		<h2><span> Attendence Tracking Tool from Katlabs</span> </h2>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link active" href="#header">Home</a></li>
          <li><a class="nav-link" href="#about">About</a></li>
          <li><a class="nav-link" href="#services">LogIn</a></li>
          <li><a class="nav-link" href="#signup">SignUp</a></li>
          <li><a class="nav-link" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="social-links">
	      <a href="https://github.com/toymakerftw" class="github"><i class="bi bi-github"></i></a>
		    <a href="https://instagram.com/toymakerftw/" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="https://twitter.com/anandhramancv" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="https://www.facebook.com/anandu.ramancv/" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://t.me/thetoymaker" class="telegram"><i class="bi bi-telegram"></i></a>
      </div>

    </div>
  </header><!-- End Header -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about">

    <!-- ======= About Me ======= -->
    <div class="about-me container">

      <div class="section-title">
        <h2>About</h2>
        <p>WANT TO KNOW ABOUT Bunk~Er</p>
      </div>

      <div class="row">
        <div class="col-lg-4" data-aos="fade-right">
          <img src="assets/img/me.jpg" class="img-fluid" alt="">
        </div>
          <h4>Bunk~Er is a tool made for peeps like me, Who has difficulty keeping track of the their Attendence.</h4>

          <div class="row">
            <div class="col-lg-6">
              <ul>
                <li><i class="bi bi-chevron-right"></i> Attendence Tracking</li>
                <li><i class="bi bi-chevron-right"></i> Message Alerts</li>
                <li><i class="bi bi-chevron-right"></i> Exporting Attendence sheet</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </div><!-- End About Me -->

  </section><!-- End About Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container">

      <div class="section-title">
        <h2>Bunk~Er</h2>
        <p>Login</p>
      </div>      

      <div class="row mt-2">

      <form method="post" class="form-horizontal col-md-6 col-md-offset-3">

<div class="form-group">
    <label for="input1" class="col-sm-3 control-label"></label>
    <div class="col-sm-7">
      <input type="text" name="uname"  class="form-control" id="input1" placeholder="Username" />
    </div>
</div>

<div class="form-group">
    <label for="input1" class="col-sm-3 control-label"></label>
    <div class="col-sm-7">
      <input type="password" name="password"  class="form-control" id="input1" placeholder="Password" />
    </div>
</div>

<br>

<input type="submit" class="btn btn-primary col-md-2 col-md-offset-8" value="Signup" name="signup">
</form>
<div class="form-group">
<br>
</div>

<div class="form-group" class="radio">
			<label for="input1" class="col-sm-3 control-label"></label>
			<div class="col-sm-7">
			  <label>
			    <input type="radio" name="type" id="optionsRadios1" value="student" checked> Student
			  </label>
			  	  <label>
			    <input type="radio" name="type" id="optionsRadios1" value="teacher"> Teacher
			  </label>
			  <label>
			    <input type="radio" name="type" id="optionsRadios1" value="admin"> Admin
			  </label>
			</div>
      <br>
			</div>

<p><strong>Have forgot your password? <a href="reset.php">Reset here.</a></strong></p>
<p><strong>If you don't have any account, <a href="signup.php">Signup</a> here</strong></p>



      <?php
      //printing error message
      if(isset($error_msg))
      {
        echo $error_msg;
      }
      ?>
    </div>

    </div>
  </section><!-- End Services Section -->

  <!-- ======= Sign-Up Section ======= -->
  <section id="signup" class="signup">
    <div class="container">

      <div class="section-title">
        <h2>Bunk~Er</h2>
        <p>Signup</p>
      </div>      

      <div class="row mt-2">

      <div class="content">

<div class="row">
  <?php
  if(isset($success_msg)) echo $success_msg;
  if(isset($error_msg)) echo $error_msg;
   ?>

  <form method="post" class="form-horizontal col-md-6 col-md-offset-3">

    <div class="form-group">
        <label for="input1" class="col-sm-3 control-label"></label>
        <div class="col-sm-7">
          <input type="text" name="email"  class="form-control" id="input1" placeholder="Email" />
        </div>
    </div>

    <div class="form-group">
        <label for="input1" class="col-sm-3 control-label"></label>
        <div class="col-sm-7">
          <input type="text" name="uname"  class="form-control" id="input1" placeholder="Choose Username" />
        </div>
    </div>

    <div class="form-group">
        <label for="input1" class="col-sm-3 control-label"></label>
        <div class="col-sm-7">
          <input type="password" name="password"  class="form-control" id="input1" placeholder="choose a strong password" />
        </div>
    </div>

    <div class="form-group">
        <label for="input1" class="col-sm-3 control-label"></label>
        <div class="col-sm-7">
          <input type="text" name="fname"  class="form-control" id="input1" placeholder="Your Full Name" />
        </div>
    </div>

    <div class="form-group">
        <label for="input1" class="col-sm-3 control-label"></label>
        <div class="col-sm-7">
          <input type="text" name="phone"  class="form-control" id="input1" placeholder="Your Phone Number" />
        </div>
    </div>


    <div class="form-group" class="radio">
    <label for="input1" class="col-sm-3 control-label"></label>
    <div class="col-sm-7">
      <label>
        <input type="radio" name="type" id="optionsRadios1" value="student" checked> Student
      </label>
          <label>
        <input type="radio" name="type" id="optionsRadios1" value="teacher"> Teacher
      </label>
      <label>
        <input type="radio" name="type" id="optionsRadios1" value="admin"> Admin
      </label>
    </div>
    </div>
    <br>
    <input type="submit" class="btn btn-primary col-md-2 col-md-offset-8" value="Signup" name="signup">
    <!--<div class="text-left"><button type="submit">Login</button></div>  -->
  </form>
</div>
  <br>
  <p><strong>Already have an account? <a href="index.php">Login</a> here.</strong></p>

</div>
  </div>

    </div>
  </section><!-- End Signup Section -->


  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <h2>Contact</h2>
        <p>Contact Us</p>
      </div>

      <div class="row mt-2">

        <div class="col-md-6 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-map"></i>
            <h3>Find Us At</h3>
            <p>S5 CSE SNGCE</p>
          </div>
        </div>

        <div class="col-md-6 mt-4 mt-md-0 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-share-alt"></i>
            <h3>Social Profiles</h3>
            <div class="social-links">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>

        <div class="col-md-6 mt-4 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-envelope"></i>
            <h3>Email Us</h3>
            <p>katlabs@gmail.com</p>
          </div>
        </div>
        <div class="col-md-6 mt-4 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-phone-call"></i>
            <h3>Call Us</h3>
            <p>+91 0000 0000 00</p>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Contact Section -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
