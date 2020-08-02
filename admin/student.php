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
            <div class="container">
                <form action="student.php" method="post">
                <div class="input-group md-form form-sm search-bar">
                    <input
                    class="form-control my-0 py-1 amber-border"
                    type="text"
                    name="title"
                    placeholder="Search"
                    aria-label="Search"
                    />
                    <div class="input-group-append">
                    <button
                        type="submit"
                        name="submit"
                        class="input-group-text btn-primary lighten-3 amber-border bg-blue"
                        id="basic-text1"
                    >
                        <i class="fa fa-search text-grey" aria-hidden="true"></i>
                    </button>
                    </div>
                </div>
                </form>

                <?php
                    if(isset($_POST['submit']))
                        {$s=$_POST['title'];
                            $sql="select * from LMS.user where (RollNo='$s' or Name like '%$s%') and RollNo<>'ADMIN'";
                        }
                    else
                        $sql="select * from LMS.user where RollNo<>'ADMIN'";

                    $result=$conn->query($sql);
                    $rowcount=mysqli_num_rows($result);

                    if(!($rowcount))
                        echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                    else
                    {

                    
                ?>

                <table class="table table-striped">
                    <thead class="bg-blue">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Roll No.</th>
                            <th scope="col">Email id</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            //$result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {

                                $email=$row['EmailId'];
                                $name=$row['Name'];
                                $rollno=$row['RollNo'];
                        ?>
                            <tr>
                                <td><?php echo $name ?></td>
                                <td><?php echo $rollno ?></td>
                                <td><?php echo $email ?></td>                                      
                                    <td>
                                        <a href="studentdetails.php?id=<?php echo $rollno; ?>" class="btn btn-success">Details</a>
                                        <!--a href="remove_student.php?id=<?php echo $rollno; ?>" class="btn btn-danger">Remove</a-->
                                    </td>
                            </tr>
                        <?php }} ?>
                    </tbody>
                </table>
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