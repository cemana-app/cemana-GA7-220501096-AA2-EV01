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
    <h4 class=" m-0 p-1 text-center text-light" style="background-color: #21516f;">Modificar cliente</h4>

    <section class="card p-2" style="width: 350px; margin:auto; margin-top:20px; font-size:small;">
    <?php
        include '../includes/database.php';


        if (isset($_GET['clientID'])) {
            $clientID = $_GET['clientID'];

            // Fetch the client's current data
            $sql = "SELECT * FROM tbl_client_profile WHERE clientID = ?";
            if ($stmt = mysqli_prepare($link, $sql)) {
                mysqli_stmt_bind_param($stmt, "i", $clientID);

                if (mysqli_stmt_execute($stmt)) {
                    $result = mysqli_stmt_get_result($stmt);
                    if ($row = mysqli_fetch_assoc($result)) {
                        // Pre-fill form with client's current data
                        $first_name = $row['first_name'];
                        $last_name = $row['last_name'];
                        $address1 = $row['address1'];
                        $mobile_phone = $row['mobile_phone'];
                        $email = $row['email'];
                        $payment_termID = $row['payment_termID'];
                    } else {
                        echo "<div class='alert alert-warning'>Client not found.</div>";
                        exit;
                    }
                } else {
                    echo "<div class='alert alert-danger'>Error retrieving client data.</div>";
                    exit;
                }
            } else {
                echo "<div class='alert alert-danger'>Database statement preparation failed.</div>";
                exit;
            }
            mysqli_stmt_close($stmt);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $clientID = $_POST['clientID'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $address1 = $_POST['address1'];
            $mobile_phone = $_POST['mobile_phone'];
            $email = $_POST['email'];
            $payment_termID = $_POST['payment_termID'];

            $sql = "UPDATE tbl_client_profile SET first_name = ?, last_name = ?, address1 = ?, mobile_phone = ?, email = ?, payment_termID = ? WHERE clientID = ?";
            if ($stmt = mysqli_prepare($link, $sql)) {
                mysqli_stmt_bind_param($stmt, "ssssssi", $first_name, $last_name, $address1, $mobile_phone, $email, $payment_termID, $clientID);

                if (mysqli_stmt_execute($stmt)) {

                    echo '
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    ¡Cambios realizados correctamente!
                    <button 
                        type="button" 
                        class="btn-close" 
                        data-bs-dismiss="alert" 
                        aria-span="Close">
                    </button>
                    </div>';

                    header("Refresh: 2; URL=../pages/menu_customers.php");
                exit();
                } else {
                    echo "<div class='alert alert-danger'>Error updating client. Please try again later.</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Database statement preparation failed.</div>";
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($link);
    ?>
        <div class="mt-2 text-center pb-2">
            <img src="../assets/images/edit.png" alt="User login" width="60px" height="60px">
        </div>
        <form action="edit_client.php" method="post">
            <input type="hidden" name="clientID" value="<?php echo htmlspecialchars($clientID); ?>">
            <div class="mb-1">
                <span>Nombre</span> 
                <span><input type="text" name="first_name" class="form-control" value="<?php echo htmlspecialchars($first_name); ?>" required></span>
               
            </div>
            <div class="mb-1">
                <span class="form-span">Apellido</span>
                <input type="text" name="last_name" class="form-control" value="<?php echo htmlspecialchars($last_name); ?>" required>
            </div>
            <div class="mb-1">
                <span class="form-span">Dirección</span>
                <input type="text" name="address1" class="form-control" value="<?php echo htmlspecialchars($address1); ?>" required>
            </div>
            <div class="mb-1">
                <span class="form-span">Número telefónico</span>
                <input type="text" name="mobile_phone" class="form-control" value="<?php echo htmlspecialchars($mobile_phone); ?>" required>
            </div>
            <div class="mb-1">
                <span class="form-span">Correo electrónico</span>
                <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" required>
            </div>
            <div class="mb-1">
                <span class="form-span">Condiciones de pago</span>
                <select name="payment_termID" class="form-control" required>
                    <option value="1" <?php if ($payment_termID == 1) echo 'selected'; ?>>1</option>
                    <option value="2" <?php if ($payment_termID == 2) echo 'selected'; ?>>2</option>
                    <option value="3" <?php if ($payment_termID == 3) echo 'selected'; ?>>3</option>
                    <option value="4" <?php if ($payment_termID == 4) echo 'selected'; ?>>4</option>
                    <option value="5" <?php if ($payment_termID == 5) echo 'selected'; ?>>5</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary form-control">Guardar cambios</button>
        </form>

    </section>