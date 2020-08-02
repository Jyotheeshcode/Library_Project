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
        ?>
    
        <?php include 'nav.php';?>
    
        <?php include 'header.php';?>

        <main class="main-content">
            <div class="container massage-container">
                <form class="p-5" action="edit_book_details.php?id=<?php echo $bookid ?>" method="POST">
                    <h3 class="text-center">Update Book Details</h3>
                    <?php
                        $bookid = $_GET['id'];
                        $sql = "select * from LMS.book where Bookid='$bookid'";
                        $result=$conn->query($sql);
                        $row=$result->fetch_assoc();
                        $name=$row['Title'];
                        $publisher=$row['Publisher'];
                        $year=$row['Year'];
                        $avail=$row['Availability'];
                    ?>
                    <div class="form-group row">
                        <label for="booktitle" class="col-sm-2 col-form-label"
                        >Book Title
                        </label>
                        <div class="col-sm-10">
                        <input
                            type="text"
                            class="form-control"
                            id="booktitle"
                            name="title"
                            name="Title" value= "<?php echo $name?>"
                            required
                        />
                        </div>
                    </div>

                    <!-- <div class="form-group row">
                        <label for="bookauthor" class="col-sm-2 col-form-label"
                        >Author:
                        </label>
                        <div class="col-sm-10">
                        <input
                            type="text"
                            id="bookauthor1"
                            class="form-control"
                            name="author1"
                            placeholder="Author 1"
                            required
                        ></input>
                        <input
                            type="text"
                            id="bookauthor2"
                            class="form-control"
                            name="author2"
                            placeholder="Author 2"
                        ></input>
                        <input
                            type="text"
                            id="bookauthor3"
                            class="form-control"
                            name="author3"
                            placeholder="Author 3"
                        ></input>
                        </div>
                    </div> -->

                    <div class="form-group row">
                        <label for="bookPublisher" class="col-sm-2 col-form-label"
                        >Publisher
                        </label>
                        <div class="col-sm-10">
                        <input
                            type="text"
                            class="form-control"
                            id="bookPublisher"
                            name="publisher"
                            value= "<?php echo $publisher?>"
                            required
                        />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Year" class="col-sm-2 col-form-label"
                        >Published Year
                        </label>
                        <div class="col-sm-10">
                        <input
                            type="number"
                            class="form-control"
                            id="Year"
                            name="year"
                            value= "<?php echo $year?>"
                            required
                        />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="availability" class="col-sm-2 col-form-label"
                        >Number of Copies
                        </label>
                        <div class="col-sm-10">
                        <input
                            type="number"
                            class="form-control"
                            id="availability"
                            name="availability"
                            value= "<?php echo $avail?>"
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
        <?php
            if(isset($_POST['submit']))
            {
                $bookid = $_GET['id'];
                $name=$_POST['Title'];
                $publisher=$_POST['Publisher'];
                $year=$_POST['Year'];
                $avail=$_POST['Availability'];

                $sql1="update LMS.book set Title='$name', Publisher='$publisher', Year='$year', Availability='$avail' where BookId='$bookid'";
                if($conn->query($sql1) === TRUE){
                    echo "<script type='text/javascript'>alert('Success')</script>";
                    header( "Refresh:0.01; url=book.php", true, 303);
                }
                else{//echo $conn->error;
                    echo "<script type='text/javascript'>alert('Error')</script>";
                }
            }
        ?>
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