<?php include 'codeProductos.php'; ?>

<?php include("../paginas/head.php") ?>

<div class="container">
    <div class="row">




        <form action="" method="post">



            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- cabecera del modal -->
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Producto</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">

                                <div class="form-group col-md-12">
                                    <label for="nombre_producto">Nombre</label>
                                    <input type="text" class="form-control" require name="nombre_producto" id="nombre_producto" placeholder="Nombre del producto">
                                    <br>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="descripcion_producto">Descripción</label>
                                    <input type="text" class="form-control" require name="descripcion_producto" id="descripcion_producto" placeholder="Descripción del producto">
                                    <br>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="precio_producto">Precio</label>
                                    <input type="number" class="form-control" require name="precio_producto" id="precio_producto" placeholder="Precio del producto">
                                    <br>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="cantidad_producto">Cantidad</label>
                                    <input type="number" class="form-control" require name="cantidad_producto" id="cantidad_producto" placeholder="Cantidad del producto">
                                    <br>
                                </div>

                            </div>
                        </div>

                        <!-- Pie/Footer del modal -->
                        <div class="modal-footer btn-group">
                            <div class="btn-group col-md-12">
                                <button value="btnAgregar" class="btn btn-success col-md-6 " type="submit" name="accion">Agregar</button>
                                <button value="btnCancelar" class="btn btn-primary col-md-6 " type="submit" name="accion">Cancelar</button>
                            </div>
                        </div>



                    </div>
                </div>
            </div>

            <!-- Boton del modal -->
            <button type="button" class="btn btn-primary col-md-12" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Agregar Producto
            </button>





        </form>
        <!-- Final del Formulario -->


        <div class="row">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>

                        <th scope="col">Numero de Producto</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>


                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaClientes tiene algun contenido */
                    if ($listaProductos->num_rows > 0) {

                        foreach ($listaProductos as $producto) {

                    ?>

                            <tr>



                                <td> <?php echo $producto['id_producto']  ?> </td>
                                <td> <?php echo $producto['nombre_producto']       ?> </td>
                                <td> <?php echo $producto['descripcion_producto'] ?> </td>
                                <td> <?php echo $producto['precio_producto']  ?> </td>
                                <td> <?php echo $producto['cantidad_producto']     ?> </td>


                                <!-- Este Formulario se utiliza para editar los registros -->
                                <form action="" method="post">

                                    <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto'];  ?>">
                                    <input type="hidden" name="nombre_producto" value="<?php echo $producto['nombre_producto'];  ?>">
                                    <input type="hidden" name="descripcion_producto" value="<?php echo $producto['descripcion_producto'];  ?>">
                                    <input type="hidden" name="precio_producto" value="<?php echo $producto['precio_producto'];  ?>">
                                    <input type="hidden" name="cantidad_producto" value="<?php echo $producto['cantidad_producto'];  ?>">




                                    <td><button value="btnEliminar" class="btn btn-danger" type="submit" name="accion">Eliminar</button></td>

                                </form>


                            </tr>


                    <?php

                        }
                    } else {

                        echo "<h2> No tenemos resultados </h2>";
                    }

                    ?>


                </tbody>
            </table>

        </div>


    </div>
</div>

<?php include("../paginas/footer.php") ?>