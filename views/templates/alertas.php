<?php
foreach ($alertas as $key => $mensajes) :
    foreach ($mensajes as $mensaje) :
?>
        <div class="Error <?php echo $key; ?>">
            <p class="Error__Mensaje"><?php echo $mensaje; ?></p>
        </div>
<?php
    endforeach;
endforeach;
?>