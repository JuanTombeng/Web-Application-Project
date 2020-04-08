<style>
    nav .navbar-nav li a{
        color: Black !important;
    }
    nav .navbar-nav li a:hover{
        color: dodgerblue !important;
    }




</style>

<div class="container">

    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="index.php">Lending Library</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="newContact.php">New Contact</a>
                        <a class="dropdown-item" href="contactList.php">Show Contact</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="newAsset.php">New Asset</a>
                        <a class="dropdown-item" href="assetList.php">Asset List</a>
                    </div>
                </li>
                </li><li class="nav-item">
                    <a class="nav-link " href="checkIn.php">Check In</a>
                </li>
                </li><li class="nav-item">
                    <a class="nav-link " href="checkOut.php">Check Out</a>
                </li>
                </li><li class="nav-item">
                    <a class="nav-link " href="lendingHistory.php">Lending History</a>
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" name="name" type="search" placeholder="Search">
                <button class="btn btn-outline-dark my-2 my-sm-0" name="submit" type="submit">Search</button>
            </form>
        </div>
    </nav>
</div>

