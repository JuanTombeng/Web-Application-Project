<?php
$errors = array();

//check for item ID
$ID = trim($_POST['id']);
if (empty($ID)){
    $errors[] = "You forgot to enter your item ID";
}
if (!empty($ID)) {
    require ('includes/db.inc.final.project.php');

    $stmt = mysqli_query($conn, "SELECT * FROM Assets WHERE itemID = '$ID' and Status ='Not Available'" ) or exit(mysqli_error($conn));
    if (mysqli_num_rows($stmt)>0){
        $errors[] = "Item is Unavailable";}
}

// check for a check_out_to
$check_out_to = trim($_POST['check_out_to']);
if(empty($check_out_to)) {
    $errors[] = "The Check Out To field is empty";
}

// check for check_out_condition
$check_out_condition = trim($_POST['check_out_condition']);
if(empty($check_out_condition)) {
    $errors[] = "The Check Out Condition field is empty";
}

// check for a due date
$due_date = trim($_POST['due_date']);
if(empty($due_date)) {
    $errors[] = "The Due Date field is empty";
}

// check for a outNotes
$check_out_note = trim($_POST['check_out_note']);
if(empty($check_out_note)) {
    $errors[] = "The Check Out Notes field is empty";
}

$cid = null;
$check_in_condition = "";
$check_in_note = "";


if(empty($errors)) {

    try {
        require('includes/db.inc.final.project.php');
        $query = "INSERT INTO lendingLibrary.Transactions (Assets_itemID, Contacts_ID, checkOutCondition, checkOutNotes, checkInDate, checkInCondition, checkInNotes, dueDate, checkOutDate)      ";
        $query .= "VALUES( ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
        $q = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($q, $query);
        mysqli_stmt_bind_param($q, "ssssssss", $ID, $check_out_to, $check_out_condition, $check_out_note, $cid, $check_in_condition, $check_in_note, $due_date);
        //execute the query
        mysqli_stmt_execute($q);
        if (mysqli_stmt_affected_rows($q) == 1) {
            echo '<div class="container mb-5 justify-content-center">
                  <h2 class="text-center">Check Out Process Success!</h2>  
                  </div>' ;
            $stmt1 = $conn->prepare("update lendingLibrary.Assets set status='Not Available' where itemID = '$ID'");
            $stmt1->execute();
            $stmt1->close();
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