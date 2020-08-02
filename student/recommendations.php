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

        <main class="main-content">
            <div class="container massage-container">
                <form class="p-5" action="recommendations.php" method="post">
                <h3 class="text-center">Reccomend a Book</h3>
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label"
                    >Book Title
                    </label>
                    <div class="col-sm-10">
                    <input
                        type="text"
                        class="form-control"
                        id="title"
                        name="title"
                        placeholder="Book Title"
                        required
                    />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Description" class="col-sm-2 col-form-label"
                    >Description
                    </label>
                    <div class="col-sm-10">
                    <input
                        type="text"
                        id="Description"
                        class="form-control"
                        name="Message"
                        placeholder="Description"
                        required
                    ></input>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary">
                    Submit Recommendation
                    </button>
                </div>
                </form>
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

<?php
if(isset($_POST['submit']))
{
    $title=$_POST['title'];
    $Description=$_POST['Description'];
    $rollno=$_SESSION['RollNo'];

$sql1="insert into LMS.recommendations (Book_Name,Description,RollNo) values ('$title','$Description','$rollno')"; 



if($conn->query($sql1) === TRUE){


echo "<script type='text/javascript'>alert('Success')</script>";
}
else
{//echo $conn->error;
echo "<script type='text/javascript'>alert('Error')</script>";
}
    
}
?> 

    </body>

</html>

<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!');location.href = '../index.php';</script>";
} ?>