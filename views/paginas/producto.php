<?php if ($alerta != 0) { ?>
        <div id="contenedorAlerta">
        </div>
    <?php } ?>
    <form class="formularioProducto" method="POST">
        <fieldset class="formularioProducto--fieldset">
            <input type="text" hidden name="IDSESSION" value="<?php echo session_id(); ?>">
            <input type="text" hidden name="IDPRENDA" value="<?php echo $prenda->ID; ?>">

            <h1><?php echo $prenda->Nombre; ?></h1>
            <img src="/imagenes/<?php echo $prenda->Imagen; ?>" alt="">

            <hr>
            <label for="caracteristicas">Caracteristicas</label>
            <input class="formularioProducto--fieldset--carac" type="text" disabled value="<?php echo $prenda->Descripcion; ?>">

            <div>
                <div class="talla">
                    <label for="talla">Talla</label>

                    <select name="Talla" id="talla">

                        <option value="S" <?php if ($prenda->S === '0') { ?> disabled hidden<?php } ?>>S</option>
                        <option value="M" <?php if ($prenda->M === '0') { ?> disabled hidden<?php } ?>>M</option>
                        <option value="L" <?php if ($prenda->L === '0') { ?> disabled hidden<?php } ?>>L</option>
                        <option value="XL" <?php if ($prenda->XL === '0') { ?> disabled hidden<?php } ?>>XL</option>
                    </select>

                    <label for="cantidad">Cantidad</label>
                    <input type="number" min="1" max="9" name="Cantidad" value="1" required>
                </div>

                <h1>$<?php echo $prenda->Precio; ?></h1>
            </div>

            <hr>

            <input type="submit" id="addCar" value="Agregar al Carrito">
            <div class="formularioProducto--fieldset--camion">
                <img src="/media/camion.png" alt="">
                <p>¡ENVÍO GRATUITO!</p>
            </div>

        </fieldset>
    </form>