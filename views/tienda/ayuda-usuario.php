<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="../../assets/CSS/TIENDA/mi-cuenta.css">
    <link rel="icon" href="/imagenes/icono-blanco.ico" type="image/x-icon">
    <title>Ayuda</title>
</head>

<body>
    
    <header class="container-fluid">
    
            <section class="row row justify-content-between align-items-center">
                <article class="col-md-1 mt-2 mt-md-0 col-3d-flex justify-content-start">
                    
                </article>
                <article class="col-md-3 mt-2 mt-md-0 col-3 d-flex justify-content-start">
                    <a href="../../vista/TIENDA/index.html"><img src="/var/www/assets/Imagenes/image.png" width="60"></a>
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
        <main class="container-fluid" id="barra-abajo">
            <section class="row justify-content-between align-items-center">
                <article class="col-md-2 mt-2 mt-md-0 col-3 d-flex justify-content-end">
                    <a href="../../vista/TIENDA/index.html" class="segunda-linea">Inicio</a>
                </article>
                <article class="col-md-2 mt-2 mt-md-0 col-3 d-flex justify-content-center">
                    <div class="menu">
                        <button>Categorias <span class="caret"></span></button>
                        <section class="menu-content">    
                            <a href="#opcion1">Electrónica ></a>
                            <a href="#opcion2">Hogar y cocina ></a>
                            <a href="#opcion3">Moda y ropa ></a>
                            <a href="#opcion4">Juguetes y Juegos ></a>
                            <a href="#opcion5">Deportes ></a>
                            <a href="#opcion5">Salud y Belleza ></a>
                            <a href="#opcion7">Libros y medios ></a>
                            <a href="#opcion8">Automóviles ></a>
                            <a href="#opcion9">Mascotas ></a>
                            <a href="#opcion11">Alimentos y bebidas ></a>
                            <a href="#opcion12">Otros...</a>
                        </section>
                    </div>
                </article>
                <article class="col-md-1 mt-2 mt-md-0 col-3 d-flex justify-content-center">
                    <a href="../../vista/EMPRESAS/empresas-inicio.html" class="segunda-linea">Empresas</a>
                </article>
                <article class="col-md-2 mt-2 mt-md-0 col-3 d-flex justify-content-start">
                    <a href="../../vista/TIENDA/como-comprar.html" class="segunda-linea">Cómo comprar</a>
                </article>
                <article class="col-md-1 d-flex justify-content-start">
                    
                </article>
                <article class="col-md-3 mt-2 mt-md-0 col-12 d-flex justify-content-start">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" placeholder="Buscar..." name="search">
                        <div class="input-group-btn">
                            <a href="../../vista/TIENDA/busqueda.html" class="btn btn-default btn-sm" type="submit">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAs1JREFUSEudVluSmlAQPQ26juAGfHxHSvyNWpkdBFcisxLNCpKU+i1T+D/oBmQfg3boywUuiE4qfIhX+nn69EHC/1wEgP/FkSCmUJ8sB5bbE+dHD7VvFUzHzG/lwaxp5L041zT9QQSPAY+YExCHzFZidTo/4/B38rQHXct9BwD648WKiIO2AIIMgRNma3M+bl9r3WsHDYhCIk+g2xCI+u78AJAnT5kRWKC3+LgNh96Lg+vVuzF/yZwC7Rmeot20hocOWkBtJABG7sK/gdcAJ8S0jI+70BhRORtJxtcPKcSRIs7H3evj6egIw4k4pRd1ZEwluA60AuCBKZGqye4sBf/heO4x4dAspgkrFZn74/kqOwQAb07RfimGfXe+UnA0LrI7PUnSd2drAvnMFFTzqBuXQx6MZ2sG+ZaCZrspzIbuwocwKGey6qaApeqCwnO0nbathpHg24VhOZaq7k9SUsAY2vBrAQtwivY08r47tzS9gDg5RfterfZyt/QMBuPZhUFOxvFefDA53rKABsczGFXhp2inCWMunUHTgbs4MNiz1ID3YbXOJj+MyEwYufOCdfnczMfGTqivbUOuNqQ93cCdrTN2+SBNDHPDigRFfTkl00u+fTSV5brHtCrLnAfZ3V4c/tLSUd+IkqbiKoxhvWjCpne9aHrRy7kPyh1QPwXnaPf6SJdqmyxGqm1YvnJl3hBZb7DtvJs0dRiYZFgHlUJyQnZ3WolfnRR5B43hiNhl6xwUHGawKVp5biAgYh9MjtDUsrvTd6WwDYgetSZyzderx7hNlFSoy0qYORTtkZPY3NKPA4gcJRm1TnL+30HUKKD9ZWFUZQpfLUmBSguzmsqTv+nMSTcszCQELONop6Wm0UGVrEV8H+mxTiyyIZDGUaVjCqQ7v5ZtvCv+k2RVx20JdDTT6I4ILepR2dT/ANSG/OytVEjxJ7ErzuuMfwGtUpQtBKPTQQAAAABJRU5ErkJggg=="/>
                            </a>
                        </div>
                    </div>
                </article>
                <article class="col-md-1 mt-2 d-flex justify-content-start">
                    
                </article>
            </section>
        </main>
        <main class="container mt-4">
            <h2 class="text-center">Sección de Ayuda</h2>
            <section class="row justify-content-center">
                <article class="col-md-6">
                        <div>
                            <label for="name">Nombre:</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <p id="mensajeErrorN"></p>
                        <div>
                            <label for="email">Correo Electrónico:</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <p id="mensajeerrorE"></p>
                        <div>
                            <label for="issue">Descripción del Problema:</label>
                            <textarea class="form-control" id="issue" rows="5"></textarea>
                            
                        </div>
                        <p id="mensajeerrorI"></p>
                        <div>
                        <button id="guardar" type="submit" class="btn btn-primary">Enviar</button>
                        </div>  
                </article>
            </section>
            
        </main>
        <script src="../../assets/JS/jquery-3.7.1.min.js"></script>
        <script src="../../assets/JS/TIENDA/ayuda-usuario.js"></script>

        <footer class="container-fluid">
            <section class="row justify-content-center">
                <article class="col-md-3">
                    <h5>Información útil</h5>
                    <ul class="list-unstyled">
                        <li><a href="../../vista/TIENDA/acerca.html">¿Qué es TIENDAS WEBON?</a></li>
                        <li><a href="../../vista/TIENDA/index.html">Compra con WEBON</a></li>
                        <li><a href="../../vista/TIENDA/ayuda-usuario.html">Centro de ayuda en línea</a></li>
                        <li><a href="../../vista/TIENDA/terminos.html">Términos y Condiciones</a></li>
                    </ul>
                </article>
                <article class="col-md-3">
                    <h5>Todo en un solo lugar</h5>
                    <ul class="list-unstyled">
                        <li>✔ Plataforma segura y confiable</li>
                        <li>✔ Gestión fácil de compras</li>
                        <li>✔ Análisis y reportes de compras detallados</li>
                        <li>✔ Soporte dedicado 24/7</li>
                    </ul>
                </article>
                <article class="col-md-3">
                    <h5>Compra con confianza</h5>
                    <p>CEn nuestra plataforma, garantizamos una experiencia de compra segura y fiable. Cada transacción está respaldada por protocolos avanzados de seguridad, asegurando que tus datos y pagos estén siempre protegidos.</p>
        
                </article>
                <article class="col-md-3">
                    <h5>Contacto</h5>
                    <p>Atención telefónica: <a href="tel:+598 99 123 456">+598 99 123 456</a></p>
                    <p>De Lunes a Sábados de 09:00hs a 18:00hs y Domingos de 10:00hs a 16:00hs</p>
                    <ul class="list-unstyled">
                        <li><a href="#">Preguntas Frecuentes / Contacto</a></li>
                        <li><a href="../../vista/EMPRESAS/cuenta-empresa.html">Trabaja con nosotros</a></li>
                        <li><a href="#">Propiedad Intelectual</a></li>
                        <li><a href="#">Política de Calidad</a></li>
                    </ul>
                </article>
            </section>
            <hr>
            <section class="row">
                <article class="col-md-6 text-end">
                    <p>Desarrollado por:</p>
                    <img src="../../assets/Imagenes/logoWebOn.png" alt="WebOn Studios Logo" height="90">
                    <p>WebOn Studios</p>
                </article>
            </section>
    </footer>
</body>
</html>