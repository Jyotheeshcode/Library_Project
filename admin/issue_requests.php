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
    ?>

    <?php include 'nav.php';?>

    <?php include 'header.php';?>

    <main class="main-content">
        <div class="container">
            <div class="grid-container container fit3-container request-btns">
                <a href="issue_requests.php">
                    <div class="card issue-request border-blue request-btn current">
                        <div><i class="fa fa-play "></i></div>
                        <p class="card-heading">Issue Requests</p>
                    </div>
                </a>
                <a href="return_requests.php">
                    <div class="card return-request border-blue request-btn">
                        <div><i class="fa fa-stop "></i></div>
                        <p class="card-heading">Return Requests</p>
                    </div>
                </a>
                <a href="renew_requests.php">
                    <div class="card renew-request border-blue request-btn">
                        <div><i class="fa fa-forward "></i></div>
                        <p class="card-heading">Renew Requests</p>
                    </div>
                </a>
            </div>
            <table class="table table-striped">
                <thead class="bg-blue">
                    <tr>
                        <th  scope="col">Roll Number</th>
                        <th  scope="col">Book Id</th>
                        <th  scope="col">Book Name</th>
                        <th  scope="col">Availabilty</th>
                        <th  scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql="select * from LMS.record,LMS.book where Date_of_Issue is NULL and record.BookId=book.BookId order by Time";
                        $result=$conn->query($sql);
                        while($row=$result->fetch_assoc())
                        {
                            $bookid=$row['BookId'];
                            $rollno=$row['RollNo'];
                            $name=$row['Title'];
                            $avail=$row['Availability'];
                    ?>
                        <tr>
                            <td><?php echo strtoupper($rollno) ?></td>
                            <td><?php echo $bookid ?></td>
                            <td><b><?php echo $name ?></b></td>
                            <td><?php echo $avail ?></td>
                            <td>
                                <?php
                                    if($avail > 0)
                                    {echo "<a href=\"accept.php?id1=".$bookid."&id2=".$rollno."\" class=\"btn btn-success\">Accept</a>";}
                                ?>
                                <a href="reject.php?id1=<?php echo $bookid ?>&id2=<?php echo $rollno ?>" class="btn btn-danger">Reject</a>
                            </td>
                        </tr>
                    <?php } ?>
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