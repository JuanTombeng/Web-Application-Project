<?php
$errors = array();
//check for company
$company = trim($_POST['company']);
if(empty($company)) {
    $errors[] = "The Company field is empty";
}

// check for a last name
$last_name = trim($_POST['last_name']);
if(empty($last_name)) {
    $errors[] = "The Last Name field is empty";
}

// check for a first name
$first_name = trim($_POST['first_name']);
if(empty($first_name)) {
    $errors[] = "The First Name field is empty";
}

// check for profile picture

// check for email
$email = trim($_POST['email']);
if (!empty($email)) {
    require ('includes/db.inc.final.project.php');
    $stmt = mysqli_query($conn, "SELECT * FROM Contacts WHERE email = '$email'" ) or exit(mysqli_error($conn));
    if (mysqli_num_rows($stmt)>0){
        $errors[] = "Email already exits";}
} elseif (empty($email)){
    $errors[]= "The Email field is empty";
}

//check for job title
$job_title = trim($_POST['job_title']);
if(empty($job_title)) {
    $errors[] = "The Job Title field is empty";
}

//check for business phone
$business_phone = trim($_POST['business_phone']);
if(empty($business_phone)) {
    $errors[] = "The Business Phone field is empty";
}


//check for home phone
$home_phone = trim($_POST['home_phone']);
if(empty($home_phone)) {
    $errors[] = "The Home Phone field is empty";
}

//check for mobile phone
$mobile_phone = trim($_POST['mobile_phone']);
if(empty($mobile_phone)) {
    $errors[] = "The Mobile Phone field is empty";
}

//check for fax number
$fax_number = trim($_POST['fax_number']);
if(empty($fax_number)) {
    $errors[] = "The Fax Number field is empty";
}

//check for street
$street = trim($_POST['street']);
if(empty($street)) {
    $errors[] = "The Street field is empty";
}

//check postal code
$postal_code = trim($_POST['postal_code']);
if(empty($postal_code)) {
    $errors[] = "The Postal Code field is empty";
}

//check for city
$city = trim($_POST['city']);
if(empty($city)) {
    $errors[] = "The City field is empty";
}

//check for province
$province = trim($_POST['province']);
if(empty($province)) {
    $errors[] = "The Province field is empty";
}

//check for country
$country = trim($_POST['country']);
if(empty($country)) {
    $errors[] = "The Country field is empty";
}

if(empty($errors)) {

    try {
        require('includes/db.inc.final.project.php');
        $query = "INSERT INTO lendingLibrary.Contacts (company, lastName, firstName, email, jobTitle, businessphone, homePhone, mobilePhone, faxNumber, street, postalCode, city, province, country)    ";
        $query .= "VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $q = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($q, $query);
        mysqli_stmt_bind_param($q, "ssssssssssssss", $company, $last_name, $first_name, $email, $job_title, $business_phone, $home_phone, $mobile_phone, $fax_number, $street, $postal_code, $city, $province, $country);
        //execute the query
        mysqli_stmt_execute($q);
        if (mysqli_stmt_affected_rows($q) == 1) {
            echo '<div class="container mb-5 justify-content-center">
                  <h2 class="text-center">New Contact Record Added!</h2>  
                  </div>' ;
            exit();
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