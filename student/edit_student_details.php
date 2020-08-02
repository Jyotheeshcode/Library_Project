<?php
    ob_start();
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
            $pswd=$row['Password'];
        ?>    

        <?php include 'nav.php';?>

        <?php include 'header.php';?>

        <main class="main-content">
            <div class="container massage-container">
                <form class="p-5" action="edit_student_details.php?id=<?php echo $rollno ?>" method="POST">
                    <h3 class="text-center">Update Details</h3>
                    
                    <div class="form-group row">
                        <label for="Name" class="col-sm-2 col-form-label" >Name: </label>
                        <div class="col-sm-10">
                            <input
                                type="text"
                                id="Name"
                                class="form-control"
                                name="Name"
                                value= "<?php echo $name?>"
                                required
                            />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="EmailId" class="col-sm-2 col-form-label" >Category: </label>
                        <div class="col-sm-10">
                            <input
                                type="email"
                                class="form-control"
                                id="EmailId"
                                name="EmailId"
                                value= "<?php echo $category?>"
                                required
                            />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="EmailId" class="col-sm-2 col-form-label" >Email Id: </label>
                        <div class="col-sm-10">
                            <input
                                type="number"
                                class="form-control"
                                id="MobNo"
                                name="MobNo"
                                value= "<?php echo $email?>"
                                required
                            />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="EmailId" class="col-sm-2 col-form-label" >Mobile Number: </label>
                        <div class="col-sm-10">
                            <input
                                type="number"
                                class="form-control"
                                id="MobNo"
                                name="MobNo"
                                value= "<?php echo $mobno?>"
                                required
                            />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="EmailId" class="col-sm-2 col-form-label" >New Password: </label>
                        <div class="col-sm-10">
                            <input
                                type="password"
                                class="form-control"
                                id="Password"
                                name="Password"
                                value= "<?php echo $pswd?>"
                                required
                            />
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-primary">
                            Update Details
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
            if(isset($_POST['submit'])) {
                $rollno = $_GET['id'];
                $name=$_POST['Name'];
                $category=$_POST['Category'];
                $email=$_POST['EmailId'];
                $mobno=$_POST['MobNo'];
                $pswd=$_POST['Password'];

                $sql1="update LMS.user set Name='$name', Category='$category', EmailId='$email', MobNo='$mobno', Password='$pswd' where RollNo='$rollno'";
                if($conn->query($sql1) === TRUE) {
                    echo "<script type='text/javascript'>alert('Success')</script>";
                    header( "Refresh:0.01; url=index.php", true, 303);
                }
                else {
                    echo "<script type='text/javascript'>alert('Error')</script>";
                }
            }
        ?>
    </body>
</html>


<?php 
    }
    else {
        echo "<script type='text/javascript'>alert('Access Denied!!!');location.href = '../index.php';</script>";
    } 
?>