<!DOCTYPE html>
<html lang="es">


<body>
    <?php include '../includes/nav.php' ?>
    <h4 class=" m-0 p-1 text-center text-light" style="background-color: #21516f;">Gestión de clientes</h4>
    <main>

        <section style="width: 350px; margin:auto; margin-top:100px;">
            <div class="card">
                <div class="card-header">
                    <div class="mt-3 text-center">
                        <img src="../assets/images/choice.png" alt="Choice" width="80px" height="80px">
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">


                        <form action="search_client.php">
                            <div class="row mb-1">
                                <button type="submit" class="btn btn-success">
                                    <div class="py-1">
                                        <img src="../assets/images/search.png" alt="Logo agregar" width="50px" height="50px">
                                    </div>
                                    Buscar cliente
                                </button>
                            </div>
                        </form>




                        <form action="create_client.php">
                            <div class="row mb-1">
                                <button type="submit" class="btn btn-success">
                                    <div class="py-1">
                                        <img src="../assets/images/add.png" alt="Logo agregar" width="50px" height="50px">
                                    </div>
                                    Crear cliente
                                </button>
                            </div>
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