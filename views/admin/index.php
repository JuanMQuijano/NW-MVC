<main style="min-height: 63.8rem; max-width: 90%;">
    <h1 class="admin_title">Bienvenido ADMIN</h1>

    <a href="../admin/crearPublicacion.php" class="actions actions__crear">Crear Nueva Publicación</a>

    <table class="admin_table" style="max-width: 90%;">
        <thead>
            <tr>
                <th class="title">ID</th>
                <th class="title">Nombre</th>
                <th class="title">Descripción</th>
                <th class="title">Imagen</th>
                <th class="title">Precio</th>
                <th class="title">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prendas as $prenda) { ?>
                <tr>
                    <td class="data"><?php echo $prenda->ID; ?></td>
                    <td class="data"><?php echo $prenda->Nombre; ?></td>
                    <td class="data"><?php echo $prenda->Descripcion; ?></td>
                    <td class="data">
                        <img class="data--img" style="width: 150px; height: 150px;" src="/imagenes/<?php echo $prenda->Imagen; ?>" alt="">
                    </td>
                    <td class="data"><?php echo $prenda->Precio; ?></td>
                    <td class="actions">
                        <a href="../admin/actualizarPublicacion.php?id=<?php echo $prenda->ID; ?>" class="actions__actualizar">Actualizar</a>
                        <form method="POST">
                            <input type="hidden" name="id" value="<?php echo $prenda->ID ?>">
                            <input type="submit" class="actions__eliminar" value="Eliminar" style="border:none; cursor:pointer;">
                        </form>
                    </td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>


</main>