<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>C.E.M.A.N.A 1.0 </title>

    <style>
        .search-results {
            width: 150px;
            background-color: bisque;
            border-style: solid;
        }
    </style>
</head>


<body>

    <?php include '../includes/nav.php'; ?> <!-- Include the navigation bar -->
    <h4 class=" m-0 p-1 text-center text-light" style="background-color: #21516f;">Buscar cliente</h4>
    <section class="card p-2 text-center" style="width: 350px; margin:auto; margin-top:40px;">

        <div class="mt-3 text-center pb-3">
            <img src="../assets/images/searchID1.png" alt="User login" width="80px" height="80px">
        </div>
        <form action="search_client.php" method="post">
            <div class="mb-2">
                <select name="searchType" class="form-control" required>
                    <option>Seleccionar una opción ... </option>
                    <option value="id">Código</option>
                    <option value="name">Nombre</option>
                </select>
                <input type="text" name="searchValue" class="form-control" required placeholder=" Ingresar nombre o código a buscar...">
            </div>

            <button type="submit" class="btn btn-success form-control">Buscar cliente</button>
        </form>



    </section>

    <section class="card p-2 " style="width: 350px; margin:auto; margin-top:10px; font-size:small">

        <?php if (empty($searchResults))
            echo '
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    Resultados
                                    <button 
                                        type="button" 
                                        class="btn-close" 
                                        data-bs-dismiss="alert" 
                                        aria-label="Close">
                                    </button>
                                    </div>';
                                    
        ?>
        <?php
    include '../includes/database.php';


    $searchResults = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $searchType = $_POST['searchType'];
        $searchValue = $_POST['searchValue'];

        if ($searchType == "id") {
            $sql = "SELECT * FROM tbl_client_profile WHERE clientID = ?";
        } else {
            $sql = "SELECT * FROM tbl_client_profile WHERE first_name LIKE ? OR last_name LIKE ?";
        }

        if ($stmt = mysqli_prepare($link, $sql)) {
            if ($searchType == "id") {
                mysqli_stmt_bind_param($stmt, "i", $searchValue);
            } else {
                $searchValue = "%$searchValue%";
                mysqli_stmt_bind_param($stmt, "ss", $searchValue, $searchValue);
            }

            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
                while ($row = mysqli_fetch_assoc($result)) {
                    $searchResults[] = $row;
                }
            } else {
                echo "<div class='alert alert-danger'>Error searching for client. Please try again later.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Database statement preparation failed.</div>";
        }
        mysqli_stmt_close($stmt);
    }

    if (isset($_GET['deleteID'])) {
        $clientID = $_GET['deleteID'];

        $sql = "DELETE FROM tbl_client_profile WHERE clientID = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $clientID);

            if (mysqli_stmt_execute($stmt)) {
                echo '
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                ¡Cliente Eliminado correctamente !
                <button 
                    type="button" 
                    class="btn-close" 
                    data-bs-dismiss="alert" 
                    aria-label="Close">
                </button>
                </div>';
                header("Refresh: 2; URL=../pages/menu_customers.php");
            } else {
                echo "<div class='alert alert-danger'>Error deleting client. Please try again later.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Database statement preparation failed.</div>";
        }
        mysqli_stmt_close($stmt);
    }

    mysqli_close($link);
?>
        <?php if (!empty($searchResults)) : ?>

            <?php foreach ($searchResults as $client) : ?>
                <table>
                    <tr>
                        <td><strong>ID:</strong></td>
                        <td><?php echo htmlspecialchars($client['clientID']); ?></td>
                    </tr>

                    <tr>
                        <td><strong>Nombre:</strong></td>
                        <td><?php echo htmlspecialchars($client['first_name']); ?></td>
                    </tr>

                    <tr>
                        <td><strong>Apellido:</strong></td>
                        <td><?php echo htmlspecialchars($client['last_name']); ?></td>
                    </tr>

                    <tr>
                        <td><strong>Dirección:</strong></td>
                        <td><?php echo htmlspecialchars($client['address1']); ?></td>
                    </tr>

                    <tr>
                        <td><strong>Número telefónico:</strong></td>
                        <td><?php echo htmlspecialchars($client['mobile_phone']); ?></td>
                    </tr>

                    <tr>
                        <td><strong>Email:</strong></td>
                        <td><?php echo htmlspecialchars($client['email']); ?></td>
                    </tr>

                    <tr>
                        <td><strong>Condiciones de pago:</strong></td>
                        <td><?php echo htmlspecialchars($client['payment_termID']); ?></td>
                    </tr>
                </table>
            <?php endforeach; ?>
            <div style="text-align: center; margin-top:5px;">
                <a href="edit_client.php?clientID=<?php echo $client['clientID']; ?>" class="btn btn-warning form-control mb-1 mt-2 btn-sm">Modificar cliente</a>
                <a href="search_client.php?deleteID=<?php echo $client['clientID']; ?>" class="btn btn-danger form-control btn-sm" onclick="return confirm('Eliminar Cliente?');">Eliminar cliente</a>
            </div>


        <?php endif; ?>

    </section>