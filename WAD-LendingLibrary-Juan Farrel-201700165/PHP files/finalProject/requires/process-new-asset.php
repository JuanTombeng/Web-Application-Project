<?php
$errors = array();

// check for a id Number
$itemID = trim($_POST['itemID']);
if(empty($itemID)) {
    $errors[] = "The Item ID field is empty";
}

//check for Owner
$owner = trim($_POST['owner']);
if(empty($owner)) {
    $errors[] = "The Owner field is empty";
}

// check for a item
$item = trim($_POST['item']);
if(empty($item)) {
    $errors[] = "The Item Name field is empty";
}

// check for a manufacturer
$manufacturer= trim($_POST['manufacturer']);
if(empty($manufacturer)) {
    $errors[] = "The Manufacturer field is empty";
}

// check for a model
$model= trim($_POST['model']);
if(empty($model)) {
    $errors[] = "The Model field is empty";
}

//check for Acquired Date
$acquired_date = trim($_POST['acquired_date']);
if(empty($acquired_date)) {
    $errors[] = "The Acquired Date field is empty";
}

//check for Purchase Price
$purchase_price = trim($_POST['purchase_price']);
if(empty($purchase_price)) {
    $errors[] = "The Purchase Price field is empty";
}

//check for Current Value
$current_value = trim($_POST['current_value']);
if(empty($current_value)) {
    $errors[] = "The Current Value field is empty";
}

//check for Description
$description = trim($_POST['description']);
if(empty($description)) {
    $errors[] = "The Description field is empty";
}


//check for Location
$location = trim($_POST['location']);
if(empty($location)) {
    $errors[] = "The Location field is empty";
}

//check for Condition
$condition = trim($_POST['condition']);
if(empty($condition)) {
    $errors[] = "The Condition field is empty";
}

//check for New Comment
$new_comment = trim($_POST['new_comment']);
if(empty($new_comment)) {
    $errors[] = "The New Comment field is empty";
}

$status = "Available";


if(empty($errors)) {

    try {
        require('includes/db.inc.final.project.php');
        $query = "INSERT INTO lendingLibrary.Assets (itemID, Contacts_ID, item, manufacturer, model, acquiredDate, purchasePrice, currentValue, itemCondition, location, description, comments, status)      ";
        $query .= "VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $q = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($q, $query);
        mysqli_stmt_bind_param($q, "sssssssssssss", $itemID, $owner, $item, $manufacturer, $model, $acquired_date, $purchase_price, $current_value, $condition, $location, $description, $new_comment, $status);
        //execute the query
        mysqli_stmt_execute($q);
        if (mysqli_stmt_affected_rows($q) == 1) {
            echo '<div class="container mb-5 justify-content-center">
                  <h2 class="text-center">New Asset Record Added!</h2>  
                  </div>' ;
            exit();
        } else {
            $errorstring = "<p class ='text-center col-sm-8' style='color:red'>";
            $errorstring .= "System Error<br/>you could not be registered due ";
            $errorstring .= "to a system error. we apologize for any inconvenience.</p>";
            echo " <p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
            echo '<p>'. mysqli_error($conn) . '<br><br>Query:' . $query . '</p>';
            mysqli_close($conn);
            exit();
        }
    }

    catch (Exception $e) {
        echo "The System is quite busy right now";
    }
    catch (Error $e) {
        echo "error";
    }

} else {
    $errorstring = "Error! <br> /> The following error(s) occurred:<br>";
    foreach ($errors as $msg) {
        $errorstring .= " - $msg<br>\n";
    }
    $errorstring .= "Please try again.<br>";
    echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
}// End of if (empty($errors)) IF.
?>