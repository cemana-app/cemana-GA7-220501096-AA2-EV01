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

    <nav class="navbar navbar-expand-lg navbar-dark px-4 " style="background-color: #153448;">
        <a class="navbar-brand" href="#"><img src="../assets/images/logo.png" alt="Company Logo" width="50" height="50"></a>
    </nav>
    <h4 class=" m-0 p-1 text-center text-light" style="background-color: #21516f;">Iniciar sesión</h4>

    <section class="card p-4 text-center" style="width: 350px; margin:auto; margin-top:100px;">

        <?php
        session_start();
        include '../includes/database.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_name = $_POST['user_name'];
            $password = $_POST['password'];

            $sql = "SELECT id, first_name, last_name, user_name, role, password FROM tbl_users WHERE user_name = ?";

            if ($stmt = mysqli_prepare($link, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $user_name);

                if (mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_store_result($stmt);

                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        mysqli_stmt_bind_result($stmt, $id, $first_name, $last_name, $user_name, $role, $hashed_password);
                        if (mysqli_stmt_fetch($stmt)) {
                            // Debugging statements
                            //echo "Password entered: " . htmlspecialchars($password) . "<br>";
                            //echo "Password hash from DB: " . htmlspecialchars($hashed_password) . "<br>";

                            // Verify the password
                            if (password_verify($password, $hashed_password)) {
                                session_start();

                                $_SESSION['id'] = $id;
                                $_SESSION['first_name'] = $first_name;
                                $_SESSION['last_name'] = $last_name;
                                $_SESSION['user_name'] = $user_name;
                                $_SESSION['role'] = $role;

                                header("location: welcome.php");
                            } else {

                                echo '
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    ¡Contraseña no valida!
                                    <button 
                                        type="button" 
                                        class="btn-close" 
                                        data-bs-dismiss="alert" 
                                        aria-label="Close">
                                    </button>
                                    </div>';
                            }
                        }
                    } else {

                        echo '
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    ¡No se encontró ningun cuenta con ese nombre de usuario!
                    <button 
                        type="button" 
                        class="btn-close" 
                        data-bs-dismiss="alert" 
                        aria-label="Close">
                    </button>
                    </div>';
                    }
                } else {

                    echo '
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                ¡¡Ups! Algo salió mal. Por favor, inténtelo de nuevo más tarde!
                <button 
                    type="button" 
                    class="btn-close" 
                    data-bs-dismiss="alert" 
                    aria-label="Close">
                </button>
                </div>';
                }
            } else {
                echo '
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                ¡Error al preparar la declaración de la base de datos.!
                <button 
                    type="button" 
                    class="btn-close" 
                    data-bs-dismiss="alert" 
                    aria-label="Close">
                </button>
                </div>';
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($link);
        ?>

        <div class="mt-3 text-center pb-3">
            <img src="../assets/images/user_login.png" alt="User login" width="80px" height="80px">
        </div>


        <form action="login.php" method="post">
            <div class="mb-3">
                <input type="text" name="user_name" class="form-control" required placeholder="Nombre de usuario...">
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" required placeholder="Contraseña...">
            </div>
            <button type="submit" class="btn btn-primary form-control">Iniciar sesión</button>
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>