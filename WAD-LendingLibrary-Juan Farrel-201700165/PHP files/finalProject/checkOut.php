<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
    <link href="assets/css/flexslider.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/color/default.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,600,400italic|Open+Sans:400,600,700" rel="stylesheet">
    <style>
        .btn btn-primary btn-lg btn-block {
            padding: 13px;
            background-color: #5d9cec;
            color: white;
            cursor: pointer;
            border-radius: 4px;
            width: 100%;
            border: #5791da 1px solid;
            font-size: 1.1em;
        }

        .demo-input-box {
            padding: 13px;
            border: #CCC 1px solid;
            border-radius: 4px;
            width: 100%;
        }

        i {
            border: solid black;
            border-width: 0 3px 3px 0;
            display: inline-block;
            padding: 3px;
        }
        .up {
            transform: rotate(-135deg);
            -webkit-transform: rotate(-135deg);
        }

        form label1{
            font-weight: bold;
        }
    </style>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>

<body>
<nav class="navbar navbar-light bg-light static-top">
    <div class="container">

        <?php include('includes/nav-bar-finalProject.php'); ?>

    </div>


</nav>


<br>
<h2 class="text-center">Check Out</h2>
<br>

<div class="container mb-5 justify-content-center">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require('requires/check-out-process.php');
    }
    ?>

        <form action="checkOut.php" id="regform" method="POST" name="regform"  enctype="multipart/form-data" onsubmit="return checked();">

            <div class="form-group row">
                <label1 for="itemID" class="text-center col-sm-4 col-form-label bold">ITEM ID:</label1>
                <div class="col-5 sm-5 ">
                    <select class="form-control " id="id" name="id">
                        <option value="">Please Select Item</option>
                        <?php

                        $servername = "10.0.6.243";
                        $username = "finaluser";
                        $password = "P@ssword";
                        $dbname = "lendingLibrary";
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT itemID,item FROM Assets WHERE Status = 'Available'";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="'. $row['itemID'] .'">'.$row['itemID'].$row['item'].'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="text">Checked Out Condition: </label>
                    <select id="check_out_condition" name="check_out_condition" class="form-control">
                        <option value="Great">Great</option>
                        <option value="Good">Good</option>
                        <option value="Satisfactory">Satisfactory</option>
                        <option value="Bad">Bad</option>
                        <option value="Poor">Poor</option>
                    </select>
                    <?php
                    if(!isset($_POST['check_out_condition']))
                    {
                        $errorMessage .= "<li>You forgot to select your Check Out Condition!</li>";
                    }
                    ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="check_out_to">Check Out To: </label>

                        <select class="form-control " id="check_out_to" name="check_out_to">
                            <option value="">Please Select Item</option>
                            <?php

                            $servername = "10.0.6.243";
                            $username = "finaluser";
                            $password = "P@ssword";
                            $dbname = "lendingLibrary";
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            $sql = "SELECT ID,company FROM Contacts";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="'. $row['ID'] .'">'.$row['ID'].$row['company'].'</option>';
                            }
                            ?>
                        </select>
                </div>
            </div>
            <br>
            <div class="form-row">

                    <label for="check_out_note" class="col-sm-1 col-form-label">Check Out Notes:</label>
                    <div class="col-5 sm-5">
                        <textarea class="form-control" id="check_out_note" rows="3" name="check_out_note" value="<?php if (isset($_POST['check_out_note']))  echo $_POST['check_out_note'];  ?>"></textarea>
                    </div>


                <div class="form-group col-md-6">
                    <label for="due_date">Due Date: </label>
                    <input type="date" class="demo-input-box" name="due_date" id="due_date" placeholder="Check Out Date"
                           value="<?php if(isset($_POST['due_date'])) echo $_POST['due_date']; ?>" width="276" required>
                </div>
            </div>
            <br>
            <button type="submit" name="submit" value="submit" class="btn btn-primary btn-lg btn-block">Check Out</button>
        </form>
</div>

<nav class="static-top">
    <div class="container">
        <?php include('includes/footer-finalProject.php'); ?>
    </div>
</nav>

</body>

</html>