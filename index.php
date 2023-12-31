<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>CRUD-PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--Fontasome-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script>
        function validarform() {
            var x = document.forms["form"]["id"].value;
            if (x == "") {
                alert("El campo de id no puede ir vacio");
                return false;
            }
        }
    </script>
</head>
<br><br><br><br><br><br><br><br>
<body>
    <div class="container">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container">
                <a href="index.php" class="navbar-brand">CRUD-PHP 👩‍💻</a>
            </div>
        </nav>
        <div class="container p-4">
            <?php include("conexion.php");
                        if(isset($_SESSION['message'])){?>
            <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                <?=  $_SESSION['message']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php session_unset(); } ?>
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <div class="card card-body">
                        <form method="post" name="form" onsubmit="return validarform()" action="create.php">
                            <div class="form-group">
                                <input type="text" name="id" class="form-control" placeholder="📎Ingresa ID"
                                    autocomplete="on" autofocus>
                            </div>
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="🧑Ingresa nombre"
                                    autocomplete="on" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="address" class="form-control" placeholder="📍Ingresa direccion"
                                    autocomplete="on" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" placeholder="📱Ingresa telefono"
                                    autocomplete="on" required>
                            </div>
                            <input type="submit" class="btn btn-success btn-block" name="send" value="✔ Insertar">
                            <input type="reset" class="btn btn-danger btn-block" value="❌ Eliminar ">
                        </form>
                    </div>
                </div> <!--End col-md-4-->
                <div class="col-md-8 mx-auto">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Telefono</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                        $query = "SELECT * FROM datos";
                                        $result = mysqli_query($conn, $query);
                                        while($row = mysqli_fetch_array($result)){    
                            ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['nombre'] ?></td>
                                <td><?php echo $row['dirrecion'] ?></td>
                                <td><?php echo $row['telefono'] ?></td>
                                <td>
                                    <a href="update.php?id=<?php echo $row['id']?>" class="btn btn-success">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div> 
            </div> 
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
</body>

</html>