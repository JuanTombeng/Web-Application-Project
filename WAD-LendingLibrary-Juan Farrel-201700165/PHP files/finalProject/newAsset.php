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
        <h2 class="text-center">New Asset</h2>
        <br>

        <nav>
            <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-item-tab" data-toggle="tab" href="#nav-item" role="tab" aria-controls="nav-item" aria-selected="true">Item</a>
                <a class="nav-item nav-link" id="nav-asset-details-tab" data-toggle="tab" href="#nav-asset-details" role="tab" aria-controls="nav-asset-details " aria-selected="false">Asset Details</a>
                <a class="nav-item nav-link" id="nav-comments-tab" data-toggle="tab" href="#nav-comments" role="tab" aria-controls="nav-comments" aria-selected="false">Comments</a>
            </div>
        </nav>
        <br>

        <div class="container mb-5 justify-content-center">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                require('requires/process-new-asset.php');
            }
            ?>

            <form action="newAsset.php" id="regform" method="POST" name="regform"  enctype="multipart/form-data" onsubmit="return checked();">

                <div class="tab-content" id="nav-tabContent">

                    <div class="tab-pane fade show active" id="nav-item" role="tabpanel" aria-labelledby="nav-item">
                        <div class="form-group col-md-6">
                            <div class="form-group col-center-6">
                                <label for="itemID">ITEM ID: </label>
                                <input type="text" class="demo-input-box" name="itemID" id="itemID" placeholder="ITEM ID" required
                                       value="<?php if(isset($_POST['itemID'])) echo $_POST['itemID']; ?>" >
                            </div>
                            <div class="form-group col-center-6">
                                <label for="item">ITEM NAME: </label>
                                <input type="text" class="demo-input-box" name="item" id="item" placeholder="ITEM NAME" required
                                       value="<?php if(isset($_POST['item'])) echo $_POST['item']; ?>" >
                            </div>
                        </div>
                        <br>
                        <br>
                        <h6 class="text-center"><i class="up"></i> Please Continue or Check the next section <i class="up"></i></h6>
                        <hr>
                    </div>

                    <div class="tab-pane fade" id="nav-asset-details" role="tabpanel" aria-labelledby="nav-asset-details">

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="manufacturer">Manufacturer: </label>
                                <input type="text" class="demo-input-box" name="manufacturer" id="manufacturer" placeholder="Manufacturer" required
                                       value="<?php if(isset($_POST['manufacturer'])) echo $_POST['manufacturer']; ?>" >
                            </div>
                            <div class="form-group col-md-4">
                                <label for="model">Model: </label>
                                <input type="text" class="demo-input-box" name="model" id="model" placeholder="Model"
                                       value="<?php if(isset($_POST['model'])) echo $_POST['model']; ?>" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="acquired_date">Acquired Date: </label>
                                <input type="date" class="demo-input-box" name="acquired_date" id="acquired_date" placeholder="Acquired Date"
                                       value="<?php if(isset($_POST['acquired_date'])) echo $_POST['acquired_date']; ?>" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="purchase_price">Purchase Price: </label>
                                <input type="text" class="demo-input-box" name="purchase_price" id="purchase_price" placeholder="Purchase Price"
                                       value="<?php if(isset($_POST['purchase_price'])) echo $_POST['purchase_price']; ?>" width="276" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="current_value">Current Value: </label>
                                <input type="text" class="demo-input-box" name="current_value" id="current_value" placeholder="Current Value"
                                       value="<?php if(isset($_POST['current_value'])) echo $_POST['current_value']; ?>" width="276" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="description">Description: </label>
                                <input type="text" class="demo-input-box" name="description" id="description" placeholder="Description"
                                       value="<?php if(isset($_POST['description'])) echo $_POST['description']; ?>" width="276" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="text">Location: </label>
                                <select id="location" name="location" class="form-control">
                                    <option value="Location1">Location 1</option>
                                    <option value="Location2">Location 2</option>
                                    <option value="Location3">Location 3</option>
                                </select>
                                <?php
                                if(!isset($_POST['location']))
                                {
                                    $errorMessage .= "<li>You forgot to select your Location!</li>";
                                }
                                ?>
                            </div>
                            <div  class="form-group col-md-4">
                                <label for="owner">Owner: </label>
                                <div class="col-8 sm-5 ">
                                    <select class="form-control " id="owner" name="owner">
                                        <option value="">Please Select Owner</option>
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
                            <div class="form-group col-md-4">
                                <label for="text">Condition: </label>
                                <select id="condition" name="condition" class="custom-select">
                                    <option value="Great">Great</option>
                                    <option value="Good">Good</option>
                                    <option value="Satisfactory">Satisfactory</option>
                                    <option value="Bad">Bad</option>
                                    <option value="Poor">Poor</option>
                                </select>
                                <?php
                                if(!isset($_POST['condition']))
                                {
                                    $errorMessage .= "<li>You forgot to select your Condition!</li>";
                                }
                                ?>
                            </div>
                            </div>
                            <br>
                            <br>
                            <h6 class="text-center"><i class="up"></i> Please Continue or Check the next section <i class="up"></i></h6>
                            <hr>
                        </div>

                    <div class="tab-pane fade" id="nav-comments" role="tabpanel" aria-labelledby="nav-comments">

                            <div class="row form-group">
                                <div class="form-group col-md-3">
                                    <label for="new_comment">New Comment: </label>
                                </div>
                                <div class="form-group col-md-5">
                                    <textarea class="form-control rounded-0" name="new_comment" id="new_comment" rows="4"></textarea>
                                </div>
                            </div>
                        <button type="submit" name="submit" value="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                    </div>
                </div>


            </form>

        </div>

        <nav class="static-bottom">
            <div class="container">
                <?php include('includes/footer-finalProject.php'); ?>
            </div>
        </nav>
    </body>

</html>