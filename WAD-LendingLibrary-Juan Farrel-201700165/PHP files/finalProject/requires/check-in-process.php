<?php
$errors = array();

//check for item ID
$ID = trim($_POST['id']);
if (empty($ID)){
    $errors[] = "You forgot to enter your item ID";
}

// check for check_in_condition
$check_in_condition = trim($_POST['check_in_condition']);
if(empty($check_in_condition)) {
    $errors[] = "The Check In Condition field is empty";
}

// check for a check in note
$check_in_note = trim($_POST['check_in_note']);
if(empty($check_in_note)) {
    $errors[] = "The Check In Note field is empty";
}

if (empty($errors)){
    try{
        require('includes/db.inc.final.project.php');
        $query = " UPDATE Transactions SET checkInCondition = '$check_in_condition',checkInNotes='$check_in_note',checkInDate = NOW()  WHERE Assets_itemID = '$ID' And checkInDate is null";
        $q = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($q,$query);
        mysqli_stmt_execute($q);
        if (mysqli_stmt_affected_rows($q) == 1) {
            echo '<div class="container mb-5 justify-content-center">
                  <h2 class="text-center">Check In Process Success!</h2>  
                  </div>' ;
            $stmt1 = $conn->prepare("update Assets set status='Available' where itemID = '$ID'");
            $stmt1->execute();
            $stmt1->close();
            exit();
        } else {
            $errorstring = "<p class ='text-center col-sm-8 mx-auto' style='color:red'>";
            $errorstring .= "System Error<br/>you could not be registered due ";
            $errorstring .= "to a system error. we apologize for any inconvenience.</p>";
            echo " <p class=' text-center col-sm-2 mx-auto' style='color:red'>$errorstring</p>";
            echo '<p>' . mysqli_error($conn) . '<br><br>Query:' . $query . '</p>';
            mysqli_close($conn);
            echo '<footer class="jumbotron text center col-sm-12 mx-auto" style="...">';
            include("footer.php");
            echo '</footer>';
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