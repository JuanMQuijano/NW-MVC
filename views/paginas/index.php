<section class="card-container">
    <h1>It's All Up To You What's Now </h1>
    <div class="format">
        <?php foreach ($prendas as $prenda) {
        ?>
            <a class="card-container__card" href="/paginas/producto.php?id=<?php echo $prenda->ID; ?>">
                <img src="/../../imagenes/<?php echo $prenda->Imagen; ?>" alt="">
            </a>
        <?php } ?>
    </div>
</section>