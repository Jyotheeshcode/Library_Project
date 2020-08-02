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

        $result=$conn->query("select count(*) as count from LMS.record,LMS.book where Date_of_Issue is NULL and record.BookId=book.BookId order by Time"); 
        $row=$result->fetch_assoc(); 
        $issuecount=$row['count'];

        $result=$conn->query("SELECT COUNT(*) AS count FROM LMS.return"); 
        $row=$result->fetch_assoc(); 
        $returncount=$row['count'];

        $result=$conn->query("SELECT COUNT(*) AS count FROM LMS.renew"); 
        $row=$result->fetch_assoc(); 
        $renewcount=$row['count'];
    ?>
        <?php include 'nav.php';?>

        <?php include 'header.php';?>

        <main class="main-content">
            <div class="grid-container container fit3-container">
                <a href="issue_requests.php">
                    <div class="card issue-request border-blue">
                        <div class="grid-container card-grid">
                            <div class="inner-card">
                                <i class="fa fa-play card-logo"></i>
                            </div>
                            <div class="inner-card">
                                <span><?php echo $issuecount ?></span>
                                <p class="card-heading">Issue Requests</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="return_requests.php"><div class="card return-request border-blue">
                <div class="grid-container card-grid">
                    <div class="inner-card">
                    <i class="fa fa-stop card-logo"></i>
                    </div>
                    <div class="inner-card">
                    <span><?php echo $returncount ?></span>
                    <p class="card-heading">Return Requests</p>
                    </div>
                </div>
                </div></a>
                <a href="renew_requests.php"><div class="card renew-request border-blue">
                <div class="grid-container card-grid">
                    <div class="inner-card">
                    <i class="fa fa-forward card-logo"></i>
                    </div>
                    <div class="inner-card">
                    <span><?php echo $renewcount ?></span>
                    <p class="card-heading">Renew Requests</p>
                    </div>
                </div>
                </div></a>
            </div>
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