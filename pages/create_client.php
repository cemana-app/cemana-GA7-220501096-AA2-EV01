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
    <?php include '../includes/nav.php'; ?> <!-- Include the navigation bar -->
    <h4 class=" m-0 p-1 text-center text-light" style="background-color: #21516f;">Agregar nuevo cliente</h4>

    <section class="card p-4 text-center" style="width: 350px; margin:auto; margin-top:50px;">
    <?php
        include '../includes/database.php';


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $address1 = $_POST['address1'];
            $mobile_phone = $_POST['mobile_phone'];
            $email = $_POST['email'];
            $payment_termID = $_POST['payment_termID'];

            $sql = "INSERT INTO tbl_client_profile (first_name, last_name, address1, mobile_phone, email, payment_termID) 
                    VALUES (?, ?, ?, ?, ?, ?)";

            if ($stmt = mysqli_prepare($link, $sql)) {
                mysqli_stmt_bind_param($stmt, "sssssi", $first_name, $last_name, $address1, $mobile_phone, $email, $payment_termID);

                if (mysqli_stmt_execute($stmt)) {

                    echo '
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    ¡Cliente creado correctamente!
                    <button 
                        type="button" 
                        class="btn-close" 
                        data-bs-dismiss="alert" 
                        aria-label="Close">
                    </button>
                    </div>';
                    header("Refresh: 2; URL=../pages/menu_customers.php");
                } else {
                    echo "<div class='alert alert-danger'>Error adding client. Please try again later.</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Database statement preparation failed.</div>";
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($link);
    ?>
        <div>
            <div class="mt-3 text-center">
                <img src="../assets/images/add-user.png" alt="New appointment" width="80px" height="80px">
            </div>
        </div>
        <form action="create_client.php" method="post">
            <div class="mb-1">
                <input type="text" name="first_name" class="form-control" required placeholder="Nombre...">
            </div>
            <div class="mb-1">
                <input type="text" name="last_name" class="form-control" required placeholder="Apellido...">
            </div>
            <div class="mb-1">
                <input type="text" name="address1" class="form-control" required placeholder="Dirección...">
            </div>
            <div class="mb-1">
                <input type="text" name="mobile_phone" class="form-control" required placeholder="Número telefónico..">
            </div>
            <div class="mb-1">

                <input type="email" name="email" class="form-control" required placeholder="Correo electrónico...">
            </div>
            <div class="mb-1">
                <label class="form-label">Condiciones de pago</label>
                <select name="payment_termID" class="form-control" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary form-control">Crear cliente</button>
        </form>

    </section>