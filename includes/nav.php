<?php

    if (session_status() === PHP_SESSION_NONE) {
        session_start(); // Start the session if it's not already started
    }

    if (!isset($_SESSION['user_name'])) {    // Check if user is logged in
        header("Location: ./login.php");    // Redirect to login page if not logged in
        exit();                             // Make sure to exit after redirect
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>C.E.M.A.N.A 1.0 </title>
</head>


<nav class="navbar navbar-expand-lg navbar-dark px-4 " style="background-color: #153448;">
    <a 
        class="navbar-brand" 
        href="#"><img src="../assets/images/logo.png"
        alt="Company Logo" 
        width="50" 
        height="50">
    </a>
    <?php include '../includes/welcome_user.php';?> <!-- Include a message for the logged user --><!-- Include a message for the logged user -->
    <button 
        class="btn btn-success" 
        type="button" 
        data-bs-toggle="offcanvas" 
        data-bs-target="#offcanvasScrolling" 
        aria-controls="offcanvasScrolling">
        <img src="../assets/images/menu1.png">
    </button>


</nav>
<div 
    class="offcanvas offcanvas-end" 
    data-bs-scroll="true" 
    data-bs-backdrop="false" 
    tabindex="-1" id="offcanvasScrolling" 
    aria-labelledby="offcanvasScrollingLabel1"
    style="background-color: #3C5B6F; color:white;">

    <div class="offcanvas-header" style="background-color: #222F38; height:76px;">
        <h5 class="offcanvas-title" id="offcanvasScrollingLabel1">C E M A N A</h5>
        <button 
            type="button" 
            class="btn btn-warning btn-close" 
            data-bs-dismiss="offcanvas" 
            aria-label="Close"
            style="color: white;">
        </button>
    </div>
    <div class="offcanvas-body">
    <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="../pages/welcome.php">Menú principale</a></li>
            <li class="nav-item"><a class="nav-link" href="../pages/menu_employees.php">Empleados</a></li>
            <li class="nav-item"><a class="nav-link" href="../pages/menu_customers.php">Clientes</a></li>
            <li class="nav-item"><a class="nav-link" href="../pages/creativo/index.html">Citas</a></li>
            

            <li class="nav-item"><a class="nav-link" href="../pages/login.php">Login</a></li>
            <li class="nav-item"><a class="nav-link" href="../pages/logout.php">Logout</a></li>
        </ul>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
</body>

</html>