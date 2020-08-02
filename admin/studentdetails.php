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
            $sql = "select * from LMS.user where RollNo='$rollno'";

            $result=$conn->query($sql); 
            $row=$result->fetch_assoc(); 

            $name=$row['Name'];
            $category=$row['Category']; 
            $email=$row['EmailId']; 
            $mobno=$row['MobNo'];
        ?>
        <?php include 'nav.php';?>

        <?php include 'header.php';?> 
            
        <main class="">
            <div class="container details-container">
                <div class="details-container-head">
                    <h3>Student Details</h3>
                </div>
                <div class="details-container-body">
                    <?php
                        $rno=$_GET['id'];
                        $sql="select * from LMS.user where RollNo='$rno'";
                        $result=$conn->query($sql);
                        $row=$result->fetch_assoc();    
                        
                        $name=$row['Name'];
                        $category=$row['Category'];
                        $email=$row['EmailId'];
                        $mobno=$row['MobNo'];
                    ?>
                    <ul>
                        <li>Name: <span><?php echo"$name"; ?></span></li>
                        <li>Category: <span><?php echo"$category"; ?></span></li>
                        <li>Roll No: <span><?php echo"$rno"; ?></span></li>
                        <li>Email Id: <span><?php echo"$email"; ?></span></li>
                        <li>Mobile No: <span><?php echo"$mobno"; ?></span></li>
                    </ul>
                    
                    <a href="student.php" class="btn btn-primary">Go Back</a>                             
                </div>
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