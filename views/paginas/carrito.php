<main class="contenedorCarrito">
    <h1 class="car_title">CARRITO</h1>

    <?php if (empty($prendas)) { ?>
        <p class="car_alerta">Aún no tienes productos en el carrito</p>
        <?php } else {
        if (!$logged) { ?>
            <p class="car_alerta alertaLoggin"> Debes iniciar sesión</p>
        <?php } ?>

        <table class="car_table">
            <thead>
                <tr>
                    <td></td>
                    <td class="data data--title">Nombre</td>
                    <td class="data data--title">Talla</td>
                    <td class="data data--title">Cantidad</td>
                    <td class="data data--title">Precio Unitario</td>
                    <td></td>
                </tr>
            </thead>
            <tbody class="car_body">
                <?php foreach ($prendas as $prenda) { ?>
                    <tr>
                        <td class="data--img">
                            <img class="data--img" src="../../imagenes/<?php echo $prenda->Imagen ?>" alt="">
                        </td>

                        <td class="data"><?php echo $prenda->Nombre ?></td>

                        <td class="data"><?php echo $prenda->Talla ?>
                        </td>

                        <td class="data"><?php echo $prenda->Cantidad ?></td>
                        <td class="data"><?php echo $prenda->Precio ?></td>

                        <td class="data">
                            <a href="/eliminar?ID=<?php echo $prenda->IDPRENDA ?>">
                                <img src="/media/trash.png" alt="Icono de basura">
                            </a>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>

        <?php
        $acum = 0;
        $cantidad = 0;
        $total = 0;
        foreach ($prendas as $prenda) {
            $acum = $prenda->Precio;
            $cantidad = $prenda->Cantidad;
            $total += $acum * $cantidad;
        ?>
        <?php }
        $total = $total;
        ?>

        <div class="infoCompra">
            <?php if (!isset($codigo)) { ?>
                <h1 class="car_title">Total de tu compra: $<?php echo $total; ?></h1>
            <?php } else {

                $porc = (int) $codigo->Porcentaje;
                $desc = ($total * $porc) / 100;
                $total = $total - $desc;
            ?>
                <h1 class="car_title">Total de tu compra: $<?php echo $total; ?></h1>
            <?php } ?>

            <form class="infoCompra--form" method="POST">
                <label for="codigo">Código de Descuento</label>
                <input type="text" name="Codigo" id="codigo" value="<?php echo isset($codigo) ? $codigo->Codigo : ''; ?>" required>
                <input type="submit" value="Agregar Código">
            </form>

            <form action="" class="infoCompra--form" method="POST">
                <input type="text" name="Codigo" id="codigo" value="<?php echo isset($codigo) ? $codigo->Codigo : ''; ?>" hidden>
                <input type="text" name="ValorFinal" id="total" value="<?php echo $total; ?>" hidden>

                <label for="direccion">Dirección de Entrega</label>
                <input type="text" name="Direccion" id="direccion" value="<?php echo $compra->Direccion ?>" required>

                <label for="telefono">Teléfono</label>
                <input class="tel" type="number" name="Telefono" id="telefono" value="<?php echo $compra->Telefono ?>" required>

                <input type="submit" value="Finalizar Compra" id="botonFinalizar">
            </form>
        </div>


        <?php
        if ($aplicado) {
        ?>
            <p class="alerta codigo"><?php echo $codigo->Codigo; ?> Aplicado</p>
        <?php }
        if (!$valido) { ?>
            <p class="alerta invalido"> El Código no es valido o ya caducó </p>
    <?php }
    }
    ?>
</main>