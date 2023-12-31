<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$correo_empleado = (isset($_POST['correo_empleado'])) ? $_POST['correo_empleado'] : "";
$clave_empleado = (isset($_POST['clave_empleado'])) ? $_POST['clave_empleado'] : "";



$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnIniciar':

            /* Consultamos el empleado  */
            $consultaEmpleado = $conn->prepare("SELECT * FROM empleados 
                WHERE correo_empleado = '$correo_empleado' 
                AND clave_empleado = '$clave_empleado'");
            $consultaEmpleado->execute();
            $resultadoEmpleado = $consultaEmpleado->get_result();
            //Al final de todas las consultas se cierra la conexion
            $conn->close();


            if ($resultadoEmpleado->num_rows > 0) {
                header('location: index.php');
            } else {
                header('location: login.php');
            }

        break;

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login SENA</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">E.P.S COMPUTO</h1>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp" name="correo_empleado"
                                                placeholder="Correo">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Contraseña" name="clave_empleado">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Recuerdame</label>
                                            </div>
                                        </div>
                                        <button value="btnIniciar" class="btn btn-primary btn-user btn-block" type="submit" name="accion">Iniciar</button>
                                        <!-- <a href="../paginas/index.php" class="btn btn-primary btn-user btn-block">
                                            Enviar
                                        </a> -->
                                        <hr>
                                        
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="../index.html">Quieres Volver al Inicio?</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>