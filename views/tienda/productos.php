<?php
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos - <?php echo $categoria; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/CSS/TIENDA/style.css">
</head>
<body>
<header class="container-fluid">
    
    <section class="row row justify-content-between align-items-center">
        <article class="col-md-1 mt-2 mt-md-0 col-3d-flex justify-content-start">
            
        </article>
        <article class="col-md-3 mt-2 mt-md-0 col-3 d-flex justify-content-start">
            <a href="../../vista/TIENDA/index.html"><img src="../../assets/Imagenes/image.png" width="60"></a>
        </article>
        <article class="col-md-3 mt-2 mt-md-0 col-3 d-flex justify-content-center">
            <a href="../../vista/TIENDA/index.html" class="nombre"><b>TIENDAS WEBON</b></a>
        </article>
        <article class="col-md-2 mt-2 mt-md-0 col-3 d-flex justify-content-end">
            <div class="menu">
                <button><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAh9JREFUSEuFVltuIkEMLOdxD3KAhfkPIw3fmWj3CMlJICchR4gU+Gakyf5DLpC5R3bxbj+Ysbs90BKi5e62XbargGAuAsD6JDMRCJzeGt7E++6rX9KH4W+I6Q+NJKKn1I+BQYRnoKh+TfjP9xJETwB3ABq6vn3ZN29un60hgEOZriR8cV9XR8IuXAxFCXvuiOl5/7Fp0lrK0p3eecj+QCePWfnwBdBEOXHtIXfx2B3a7Z3dx2D110I7ddOcfVY+PjF4LR1439Hg9leMhUMh25Luw4s0dQDTeb0kolU2UTEhZ2fG6vNj8zJWaoUgdVTM64qJdkPdReoRRuzDq53EgNYso5+ev987Bk2or7vkBxs90FOS8yCZ8YACO3McY/1jjQ0WJE32MDO2EYrqp0OyBLjyF5g6url5tnmgCSgQjFPf5mwyzyN8UgEGBJIThoBkvrVhVCrSaf3hxxTVf2lwn4zJTjIY1H22Z8bUal4xf6yOdFxTyuBRykbZ+L1ptLySZHJ4XZR1xdBTM7A3gk/pfOIEsNi32+asFk0t7TEzt1ofeDHagyANWOlZDRzNZTfa46H/Ym8L0iH63uc3Kx/WgNN86TRKdBbFHl6AmkP7vjgNhUrMlSc0VoM8p0UBnkxCy0cQu+hvWtZ+2yOQ8IWCnrLzOLMAwKHdhJ+yKAx9iRIZ0q29fHhJi+S5ZOYYk3PNUf9DYkKiRAbdszgXnBoY/gHqjRktFhYaAgAAAABJRU5ErkJggg=="> <span class="caret"></span></button>
                <section class="menu-content">
                    <a href="../../vista/TIENDA/login.html">Iniciar sesión ></a>
                    <a href="../../vista/TIENDA/Register.html">Registrarse ></a>
                </section>
            </div>
        </article>
        <article class="col-md-2 mt-2 mt-md-0 col-3 d-flex justify-content-center">
            <a href="../../vista/TIENDA/carrito.html" class="carrito"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAixJREFUSEuVVktS40AMlcIcJFwgTtbjgLMlpoq5AWzhEMMcArbkCFSRzDYpzH5iLkDuMcGC/qvd6lD0ImV3uvWkJ+nJiABAcGjxEwgIBGS3wj+xFb6vnv36+oI9mgDEDkYuJRHkQuJGhTM5OyaCmAXNmd76LrrAtAcoynNKsqGSg2bXcamf9Y/Oht/Xtv152r02q2Pnu75dlDVxQ/wCz5I2mhyMnQCgXRsBMJ5GZf0bEW4FGz0urdEkSlVpcLVtnhbK8ygH6qWoLob0vn/jdAawLyrAOto2T7460zI1dK0BoHIgMnUWLElQt2ibv1fubgTgmBqX55cd0IPEdciNAKBIPPpxvN087kQAV5rj019Dev8f0WQqhBsVqgho0TYr4701JkagjI2m9RotTXLCYw1Q1TUAmG2b5Yb3lvOppxcIk3JedQBr3wc5lNATm9dmOet3bRqBhZpUF8Nuv39TAAOC2b8X5dkhUVMxGG4MeWalUsHiK8r5AyBefp6+bV+WfwRVFDQl1p1sBMrYuKwrQlAlm1+WurZZirYyAEE6Rz9NZ2cREoCURsZWVkYFxeXDh2t576gsy7G/45P5HXV4jQO63z6vblyu9T7hNSLdt8+rm1TegwrLDFj0Yjo3ZYEAmmvrcDGt/bQNOchSJM4dbXVycnbX8Qhspel9HkHUYWZiRY2WDLaEP6EPhKmX9sHBOuSNE39VxGLh5mGacM+N4Iw0mH3VhU+YfnOFTv4A3TkQLskFcsoAAAAASUVORK5CYII=">Carrito</a>
        </article>
        <article class="col-md-1 mt-2 mt-md-0 col-3 d-flex justify-content-start">
            
        </article>
    </section>
</header>
    <div class="container mt-4">
        <h2>Productos en la categoría: <?php echo htmlspecialchars($categoria); ?></h2>
        <div class="row" id="productos-lista">
            <!-- Aquí se mostrarán los productos -->
        </div>
    </div>

    <script src="../../assets/js/TIENDA/mostrar-producto.js"></script>
    <script src="../../assets/js/jquery-3.7.1.min.js"></script>
</body>
</html>