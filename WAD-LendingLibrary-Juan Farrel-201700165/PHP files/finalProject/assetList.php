<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template -->
    <link href="css/landing-page.min.css" rel="stylesheet">

    <style>
        .btnLogin {
            padding: 13px;
            background-color: #5d9cec;
            color: #f5f7fa;
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

    </style>

</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-light bg-light static-top">
    <div class="container">

        <?php include('includes/nav-bar-finalProject.php'); ?>

    </div>
</nav>

<br>
<h1 class="text-center">ASSET LIST</h1>
<br>
<hr>
<br>

<!--- view page --->



<div class="container-fluid">
    <?php

    $servername = "10.0.6.243";
    $username = "finaluser";
    $password = "P@ssword";
    $dbname = "lendingLibrary";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM Assets";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table class="table table-bordered">    
                    <tr class="table-primary">
                    <th scope="col">Item ID</th>
                    <th scope="col">Owner</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Manufacturer</th>
                    <th scope="col">Model</th>
                    <th scope="col">Acquired Date</th>
                    <th scope="col">Purchase Price</th>
                    <th scope="col">Current Value</th>
                    <th scope="col">Condition</th>
                    <th scope="col">Location</th>
                    <th scope="col">Description</th>
                    <th scope="col">Comments</th>
                    <th scope="col">Status</th>
                    </tr>';
        while ($row = $result->fetch_assoc()) {

            echo'<tr>
                    <td>' . $row['itemID'] . '</td>
                    <td>' . $row['Contacts_ID'] . '</td>
                    <td>' . $row['item'] . '</td>
                    <td>' . $row['manufacturer'] . '</td>
                    <td>' . $row['model'] . '</td>
                    <td>' . $row['acquiredDate'] . '</td>
                    <td>' . $row['purchasePrice'] . '</td>
                    <td>' . $row['currentValue'] . '</td>
                    <td>' . $row['itemCondition'] . '</td>
                    <td>' . $row['location'] . '</td>
                    <td>' . $row['description'] . '</td>
                    <td>' . $row['comments'] . '</td> 
                    <td>' . $row['status'] . '</td>
                    </tr>';}
        echo '</table>';
    }
    else {
        echo "0 results";
    }
    $conn->close();
    ?>
</div>




<!-- Footer -->
<nav class="static-top">
    <div class="container">
        <?php include('includes/footer-finalProject.php'); ?>
    </div>
</nav>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>


