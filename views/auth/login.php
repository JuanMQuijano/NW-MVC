<form class="formularioLogin" method="POST">
    <fieldset class="formularioLogin--fieldset">
        <h1>Bienvenido, Inicia Sesión en NW</h1>

        <?php include_once __DIR__ . '/../templates/alertas.php' ?>

        <label for="Correo">Correo</label>
        <input type="email" name="Correo" id="Correo" placeholder="Ingresa Tú Correo" value="<?php echo $auth->Correo; ?>">

        <label for="Contraseña">Contraseña</label>
        <input type="password" name="Contraseña" id="Contraseña" placeholder="Ingresa Tú Contraseña">

        <input type="submit" value="Iniciar Sesión">
    </fieldset>
</form>