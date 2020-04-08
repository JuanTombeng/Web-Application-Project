<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- styles -->
    <!-- <link href="assets/css/bootstrap.css" rel="stylesheet">-->
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
    <link href="assets/css/flexslider.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/color/default.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,600,400italic|Open+Sans:400,600,700" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>

<body>

<header>
    <nav class="navbar navbar-light bg-light static-top">
        <div class="container">

            <?php include('includes/nav-bar-finalProject.php'); ?>

        </div>
    </nav>
</header>

<h1 class="text-center">INDEX</h1>

    <div class="container mb-5 justify-content-center">

        <div class="list-group">
            <li class="list-group-item text-center">ASSET MENU</li>
            <a href="newAsset.php" class="list-group-item list-group-item-primary text-center ">Create New Asset</a>
            <a href="assetList.php" class="list-group-item list-group-item-primary text-center">Show All Assets</a>
        </div>
        <br>
        <br>
        <div class="list-group">
            <li class="list-group-item text-center">CONTACT MENU</li>
            <a href="newContact.php" class="list-group-item list-group-item-primary text-center">Create New Contact</a>
            <a href="contactList.php" class="list-group-item list-group-item-primary text-center">Show All Contacts</a>
        </div>

    </div>



<nav class="static-top">
    <div class="container">
        <?php include('includes/footer-finalProject.php'); ?>
    </div>
</nav>

</body>

</html>