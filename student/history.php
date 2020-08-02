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
                <form action="history.php" method="post">
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
                    $rollno = $_SESSION['RollNo'];
                    if(isset($_POST['submit']))
                        {$s=$_POST['title'];
                            $sql="select * from LMS.record,LMS.book where RollNo = '$rollno' and Date_of_Issue is NOT NULL and Date_of_Return is NOT NULL and book.Bookid = record.BookId and (record.BookId='$s' or Title like '%$s%')";

                        }
                    else
                        $sql="select * from LMS.record,LMS.book where RollNo = '$rollno' and Date_of_Issue is NOT NULL and Date_of_Return is NOT NULL and book.Bookid = record.BookId";

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
                            <th scope="col">Book id</th>
                            <th scope="col">Book name</th>
                            <th scope="col">Issue Date</th>
                            <th scope="col">Return Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row=$result->fetch_assoc())
                            {
                                $bookid=$row['BookId'];
                                $name=$row['Title'];
                                $issuedate=$row['Date_of_Issue'];
                                $returndate=$row['Date_of_Return'];
                        ?>
                            <tr>
                                <td><?php echo $bookid ?></td>
                                <td><?php echo $name ?></td>
                                <td><?php echo $issuedate ?></td>
                                <td><?php echo $returndate ?></td>
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