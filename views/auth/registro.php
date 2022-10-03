<form class="formularioRegistro" method="POST">
    <fieldset class="formularioRegistro--fieldset">
        <div>
            <h1>Sé Parte De NW</h1>

            <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

            <label for="nombre">Nombre</label>
            <input type="text" name="Nombre" id="nombre" placeholder="Ingresa Tú Nombre" value="<?php echo s($usuario->Nombre); ?>">

            <label for="apellido">Apellido</label>
            <input type="text" name="Apellido" id="apellido" value="<?php echo s($usuario->Apellido); ?>" placeholder="Ingresa Tú Apellido">

            <label for="genero">Género</label>
            <select class="generoSelect" name="Genero" id="genero">
                <option selected disabled>Selecciona Tú Género</option>
                <option value="M" <?php echo $usuario->Genero == 'M' ? 'selected' : '' ?>>Masculino</option>
                <option value="F" <?php echo $usuario->Genero == 'F' ? 'selected' : '' ?>>Femenino</option>
                <option value="NC" <?php echo $usuario->Genero == 'NC' ? 'selected' : '' ?>>No Contestar</option>
            </select>

            <label for="fecha">Fecha Nacimiento</label>
            <input type="date" name="FechaN" id="fecha" value="<?php echo $usuario->FechaN; ?>">

            <label for="correo">Correo</label>
            <input type="email" name="Correo" id="correo" placeholder="Ingresa Tú Correo" value="<?php echo $usuario->Correo; ?>">

            <label for="contraseña">Contraseña</label>
            <input type="password" name="Contraseña" id="contraseña" placeholder="Ingresa Tú Contraseña">

            <label for="terminos">
                <a href="">Términos y Condiciones</a>
                <input type="checkbox" name="Acuerdos" id="terminos" value="1">
            </label>
            <input type="submit" value="Registrar">
        </div>
        <img src="/media/form.jpg" alt="">
    </fieldset>
</form>