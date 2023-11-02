<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$id_producto = (isset($_POST['id_producto'])) ? $_POST['id_producto'] : "";
$nombre_producto = (isset($_POST['nombre_producto'])) ? $_POST['nombre_producto'] : "";
$descripcion_producto = (isset($_POST['descripcion_producto'])) ? $_POST['descripcion_producto'] : "";
$precio_producto = (isset($_POST['precio_producto'])) ? $_POST['precio_producto'] : "";
$cantidad_producto = (isset($_POST['cantidad_producto'])) ? $_POST['cantidad_producto'] : "";



$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':

                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */

                $insercionProductos = $conn->prepare(
                "INSERT INTO productos ( nombre_producto, descripcion_producto, precio_producto, cantidad_producto) 
                VALUES ('$nombre_producto','$descripcion_producto','$precio_producto', '$cantidad_producto')"
             );



        $insercionProductos->execute();
        $conn->close();

        header('location: index.php');



        break;


    case 'btnEliminar':
        

        $eliminarProducto = $conn->prepare(" DELETE FROM productos
        WHERE id_producto = '$id_producto' ");

        // $consultaFoto->execute();
        $eliminarProducto->execute();
        $conn->close();

        header('location: index.php');

        break;

    case 'btnCancelar':
        header('location: index.php');
        break;

    
}



/* Consultamos todos los productos  */
$consultaProductos = $conn->prepare("SELECT * FROM productos");
$consultaProductos->execute();
$listaProductos = $consultaProductos->get_result();

//Al final de todas las consultas se cierra la conexion
$conn->close();

