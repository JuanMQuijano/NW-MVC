<form class="formularioRegistro" method="POST" enctype="multipart/form-data">
    <fieldset class="formularioRegistro--fieldset">
        <div>
            <h1>Actualizar Publicación</h1>

            <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

            <label for="nombre">Nombre</label>
            <input type="text" name="Nombre" id="nombre" value="<?php echo $prenda->Nombre; ?>" placeholder="Ingresa Un Nombre">

            <label for="descripcion">Descripción</label>
            <textarea name="Descripcion" id="DESCRIPCION" placeholder="Ingresa Una Descripción" cols="30" rows="5"><?php echo $prenda->Descripcion; ?></textarea>

            <label for="tipo">Tipo</label>
            <select class="generoSelect" name="Tipo" id="tipo">
                <option selected disabled>Selecciona Tipo</option>
                <option value="Hoodie" <?php echo $prenda->Tipo === 'Hoodie' ? 'selected' : ''; ?>>Hoodie</option>
                <option value="Camisa" <?php echo $prenda->Tipo === 'Camisa' ? 'selected' : ''; ?>>Camisa</option>
                <option value="Mug" <?php echo $prenda->Tipo === 'Mug' ? 'selected' : ''; ?>>Mug</option>
            </select>

            <label for="imagen">Nueva Imagen</label>
            <input type="file" name="Imagen" id="imagen" accept="image/jpeg, image/png">

            <label for="precio">Precio</label>
            <input type="number" name="Precio" id="precio" value="<?php echo $prenda->Precio; ?>">

            <label for="S">S</label>
            <input type="number" name="S" id="S" value="<?php echo $prenda->S; ?>">

            <label for="M">M</label>
            <input type="number" name="M" id="M" value="<?php echo $prenda->M; ?>">

            <label for="L">L</label>
            <input type="number" name="L" id="L" value="<?php echo $prenda->L; ?>">

            <label for="XL">XL</label>
            <input type="number" name="XL" id="XL" value="<?php echo $prenda->XL; ?>">

            <input type="submit" value="Actualizar">
        </div>
    </fieldset>
</form>