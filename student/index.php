<?php
require('dbconn.php');
?>

<?php 
if ($_SESSION['RollNo']) {
    ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LMS</title>
        <link
          rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous"
        />

        <link rel="stylesheet" type="text/css" href="../css/nav2.css" />
        <link
          rel="stylesheet"
          type="text/css"
          href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"
          rel="stylesheet"
        />
    </head>
    <body>
        <?php
            $rollno = $_SESSION['RollNo'];
            $sql="select * from LMS.user where RollNo='$rollno'";
            $result=$conn->query($sql);
            $row=$result->fetch_assoc();

            $name=$row['Name'];
            $category=$row['Category'];
            $email=$row['EmailId'];
            $mobno=$row['MobNo'];

            $result=$conn->query("select COUNT(*) AS count from LMS.message where RollNo='$rollno'"); 
            $row=$result->fetch_assoc(); 
            $messagecount=$row['count'];

            $result=$conn->query("select count(*) as count from LMS.book"); 
            $row=$result->fetch_assoc(); 
            $bookcount=$row['count'];

            $result=$conn->query("select count(*) as count from LMS.record,LMS.book where RollNo = '$rollno' and Date_of_Issue is NOT NULL and Date_of_Return is NOT NULL and book.Bookid = record.BookId"); 
            $row=$result->fetch_assoc(); 
            $borrowcount=$row['count'];

            $result=$conn->query("select count(*) as count from LMS.record,LMS.book where RollNo = '$rollno' and Date_of_Issue is NOT NULL and Date_of_Return is NULL and book.Bookid = record.BookId"); 
            $row=$result->fetch_assoc(); 
            $currentcount=$row['count'];
        ?>                    

        <?php include 'nav.php';?>

        <?php include 'header.php';?>

        <main class="main-content">
          <div class="grid-container container">
            <div class="card profile border-blue">
              <div class="profile-container">
                <div class="profile-img profile-content">
                  <img src="images/user.png" alt="" />
                  <h1><?php echo $name ?></h1>
                </div>
                <div class="profile-details profile-content">
                  <p>
                    <strong>Email ID: </strong><span><?php echo $email ?></span>
                  </p>
                  <p><strong>Roll No: </strong><span><?php echo $rollno ?></span></p>
                  <p><strong>Category: </strong><span><?php echo $category ?></span></p>
                  <p><strong>Mobile number: </strong><span><?php echo $mobno ?></span></p>
                </div>
                <div class="profile-edit profile-content">
                  <a href="edit_student_details.php" class="btn btn-primary"
                    >Edit Details</a
                  >
                </div>
              </div>
            </div>
            <a href="message.php"><div class="card message border-blue">
              <div class="grid-container card-grid">
                <div class="inner-card">
                  <i class="fa fa-comment-o card-logo"></i>
                </div>
                <div class="inner-card">
                  <span><?php echo $messagecount ?></span>
                  <p class="card-heading">Messages</p>
                </div>
              </div>
            </div></a>
            
            <a href="book.php"><div class="card all-books border-blue">
              <div class="grid-container card-grid">
                <div class="inner-card">
                  <i class="fa fa-book card-logo"></i>
                </div>
                <div class="inner-card">
                  <span><?php echo $bookcount ?></span>
                  <p class="card-heading">All Books</p>
                </div>
              </div>
            </div></a>
            
            <a href="history.php"><div class="card renew-request border-blue">
              <div class="grid-container card-grid">
                <div class="inner-card">
                  <i class="fa fa-list card-logo"></i>
                </div>
                <div class="inner-card">
                  <span><?php echo $borrowcount ?></span>
                  <p class="card-heading">Borrowed History</p>
                </div>
              </div>
            </div></a>
            
            
            <a href="current.php"><div class="card issued border-blue">
              <div class="grid-container card-grid">
                <div class="inner-card">
                  <i class="fa fa-check card-logo"></i>
                </div>
                <div class="inner-card">
                  <span><?php echo $currentcount ?></span>
                  <p class="card-heading">Currently Issued Books</p>
                </div>
              </div>
            </div></a>
            
            <a href="recommendations.php"><div class="card recommend border-blue">
              <div class="grid-container card-grid">
                <div class="inner-card">
                  <i class="fa fa-list card-logo"></i>
                </div>
                <div class="inner-card">
                  <p class="card-heading">Recommend Books</p>
                </div>
              </div>
            </div></a>

            <a href="logout.php"><div class="card logout border-blue">
              <div class="grid-container card-grid">
                <div class="inner-card">
                  <i class="fa fa-sign-out card-logo"></i>
                </div>
                <div class="inner-card">
                  <p class="card-heading">Logout</p>
                </div>
              </div>
            </div>
          </div></a>
            
      </main>

    <?php include 'footer.php';?>

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

</html>

<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!');location.href = '../index.php';</script>";
} ?>