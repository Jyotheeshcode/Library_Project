<?php
require('dbconn.php');
?>


<!DOCTYPE html>
<html>

<!-- Head -->
<head>

	<title>Library Member Login Form </title>

	<!-- Meta-Tags -->
		<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="keywords" content="Library Member Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //Meta-Tags -->
  <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />

    
    <link
      rel="stylesheet"
      type="text/css"
      href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" type="text/css" href="css/nav2.css" />
</head>
<!-- //Head -->

<!-- Body -->
<body class="login-body">

<header class="navbar navbar-dark primary-color">
      <a class="navbar-brand" href="#">
        <img src="images/book-open-solid.svg" height="30" alt="mdb logo" />
        <span class="logo">KSSEM</span>
      </a>
</header>

    <main class="main-content">
      <div class="container login-container">
        <!-- Default form login -->
        <form class="text-center p-5" action="index.php" method="post">
          <p class="h4 mb-4">Library Member Login</p>

          <!-- Email -->
          <input
            type="text"
            name="RollNo"
            id="defaultLoginFormEmail"
            class="form-control mb-4"
            placeholder="Roll No"
            required
          />

          <!-- Password -->
          <input
            type="password"
            name="Password"
            id="defaultLoginFormPassword"
            class="form-control mb-4"
            placeholder="Password"
            required
          />

          <div class="d-flex justify-content-around">
            <div>
              <!-- Forgot password -->
              <a href="">Forgot password?</a>
            </div>
          </div>

          <!-- Sign in button -->
          <button
            class="btn btn-primary btn-block my-4"
            type="submit"
            name="signin"
          >
            Log In
          </button>
        </form>
        <!-- Default form login -->
      </div>
    </main>

    <!-- Footer -->
    <footer class="">
      <!-- Copyright -->
      <div class="text-center">
        © 2018 Copyright:
        <a href="#"> KSSEM Library</a>
      </div>
      <!-- Copyright -->
    </footer>

<?php
if(isset($_POST['signin']))
{$u=$_POST['RollNo'];
 $p=$_POST['Password'];
 $c=$_POST['Category'];

 $sql="select * from LMS.user where RollNo='$u'";

 $result = $conn->query($sql);
$row = $result->fetch_assoc();
$x=$row['Password'];
$y=$row['Type'];
if(strcasecmp($x,$p)==0 && !empty($u) && !empty($p))
  {//echo "Login Successful";
   $_SESSION['RollNo']=$u;
   

  if($y=='Admin')
   header('location:admin/index.php');
  else
  	header('location:student/index.php');
        
  }
else 
 { echo "<script type='text/javascript'>alert('Failed to Login! Incorrect RollNo or Password')</script>";
}
   

}

if(isset($_POST['signup']))
{
	$name=$_POST['Name'];
	$email=$_POST['Email'];
	$password=$_POST['Password'];
	$mobno=$_POST['PhoneNumber'];
	$rollno=$_POST['RollNo'];
	$category=$_POST['Category'];
	$type='Student';

	$sql="insert into LMS.user (Name,Type,Category,RollNo,EmailId,MobNo,Password) values ('$name','$type','$category','$rollno','$email','$mobno','$password')";

	if ($conn->query($sql) === TRUE) {
echo "<script type='text/javascript'>alert('Registration Successful')</script>";
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
echo "<script type='text/javascript'>alert('User Exists')</script>";
}
}

?>
<script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
</body>
<!-- //Body -->

</html>
