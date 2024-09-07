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


<body>
<?php include '../includes/nav.php';?> <!-- Include the navigation bar -->
    <h4 class=" m-0 p-1 text-center bg-primary text-light">Menú principal de gestión</h4>

    <main>
        <section>
            <div class="card" style="width: 380px; margin:auto; margin-top:100px;">
                

                    <div class="mt-3 text-center">
                        <img src="../assets/images/selection.png" alt="User login" width="80px" height="80px">
                    </div>
                
                <div class="card-body">
                    <form action="../pages/creativo/index.html">
                        <button type="submit" class="btn btn-success form-control mb-1">
                            <div class="">
                                <img src="../assets/images/appo.png" alt="" alt="Employee" width="50px" height="50px">
                            </div>
                            Citas
                        </button>
                    </form>
                    <form action="../pages/menu_customers.php">
                        <button type="submit" class="btn btn-success form-control mb-1">
                            <div class="">
                                <img src="../assets/images/customers.png" alt="Customers" alt="Employee" width="50px" height="50px">
                            </div>
                            Clientes
                        </button>
                    </form>
                    <form action="../pages/menu_employees.php">
                        <button type="submit" class="btn btn-success form-control mb-1">
                            <div class="">
                                <img src="../assets/images/employee.png" alt="Employee" width="50px" height="50px">
                            </div>
                            Empleados
                        </button>
                    </form>
                </div>
            </div>
            </div>
        </section>
    </main>
    <!-- Include the footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>