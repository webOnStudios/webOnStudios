<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/CSS/EMPRESAS/register.css">
    <link rel="icon" href="/imagenes/icono-blanco.ico" type="image/x-icon">
    <title>Inicio de sesion</title>
</head>
  
 <body>
    <header class="container-fluid">
        <section class="row row justify-content-between align-items-center">
            <article class="col-md-1 mt-2 mt-md-0 col-1 d-flex justify-content-start">

            </article>
            <article class="col-md-1 mt-2 mt-md-0 col-3 d-flex justify-content-start">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAfFJREFUSEuVVUt2wjAMlGhXCb0DvQSfruBkPE7Sq2QHOQW9Q3FWBfdJ8UeynNBmkziWJc2MJCOkBwHAA+gX74Zf5tucDT+UfV4gIHgKkV1KS3mY/89uqrRLDGl9Xi73L94fPcCeI5NPesI3AnT3BZ5237cuoykQTyVDB/q2vQL4VfasAzBWD916GA4ZfS2AgT8aXdqWGds4F3MfLUNWfduE/QFHWKViKjUrcgywdQ4j5RIx7dPaJFDIyGHO7dv+1T+OD+I7PpJ3SbL8ZhsqDioScuW7H1ycPm6jLgl63zZXAFxFAf/s28pCTrv14A6x6tlk5BNhMzjSS3HNAlb6o1Y5yU/QTSDQgpr+MOWm+yCuykQxb4QABoEsO9mMWpQYv2+KRGUAw3ulubLbikriV6wsg2CqWFQLzxvxbiVAELlsquCsD00XfafaD9zETjYaxAPkgBBuWQM9+OjwhbjFzEG1ucbxorpfUcQBGMH0gK7MUDUgUqK1Ms0BdOWYe2JmQhoEkiIWp1KmMsU6tkApAvSNbNhxfIROnpiciq7n5ZMQJC1zgCsArP5bjso+18DXxrl3IjqJTLfXwvvPGCQMSRYjn5vtvMhkd0c87dytU8Pu6dX+ZBZl8ooZZUSTjVOZoNMFXA8hrkLpTQ81U/uzUbT1L3TzKyv5/09dAAAAAElFTkSuQmCC" width="30">
            </article>
            <article class="col-md-3 mt-2 mt-md-3 col-3 d-flex justify-content-start">
                <p><b>VENDE CON WEBON</b></p>
            </article>
            <article class="col-md-6 mt-2 mt-md-0 col-4 d-flex justify-content-end">
                <p id="contacto">Contacto <br> +598 99 123 456</p>
            </article>
            <article class="col-md-1 mt-2 mt-md-0 col-1 d-flex justify-content-start">

            </article>
        </section>
    </header>   
    <main class="container-fluid" id="barra-abajo">
        <section class="row justify-content-between align-items-center">
            <article class="col-md-1 mt-2 mt-md-0 col-1 d-flex justify-content-start">
            </article>
            <article class="col-md-1 mt-2 mt-md-0 col-4 d-flex justify-content-center">
                <a href="../../vista/EMPRESAS/empresas-inicio.html" class="segunda-linea"><b>Inicio</b></a>
            </article>

            <article class="col-md-2 mt-2 mt-md-0 col-4 d-flex justify-content-center">
                <a href="../../vista/TIENDA/index.html" class="segunda-linea"><b>Cómo funciona</b></a>
            </article>
            <article class="col-md-1 mt-2 mt-md-0 col-3 d-flex justify-content-center">
                <a href="../../vista/TIENDA/index.html" class="segunda-linea"><b>Beneficios</b></a>
            </article>
            <article class="col-md-1 mt-2 mt-md-0 col-12 d-flex justify-content-start">

            </article>
            <article class="col-md-6 mt-2 mt-md-0 col-12 d-flex justify-content-start">

            </article>
        </section>
    </main> 
    <main class="container-fluid" id="register">

        <section class="row justify-content-between">
            <article class="col-md-12 col-12 d-flex justify-content-center">
                <h2 class="titulo-registro">INICIAR SESION</h2>
            </article>
            
            <article class="col-md-12 mt-2 mt-md-0 col-12 d-flex justify-content-start">
                <input id="email" type="text" placeholder="Email empresarial">
            </article>
            <article class="col-md-12 mt-2 mt-md-0 col-12 d-flex justify-content-center">
            <p id="mensajeerrorE"></p>
            </article>
            <article class="col-md-10 mt-2 mt-md-0 col-10 d-flex justify-content-start">
                <input id="contraseña" type="password" placeholder="Contraseña">
            </article>
            <article class="col-md-2 mt-2 mt-md-0 col-2 d-flex justify-content-start">
                <button class="contra" id="mostrartexto"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAl1JREFUSEuNVYF1qzAQk5iETNIwSX8maTpJ00lIJymToI/sMxgISf1eXhzHtu4k3Zn46yAAEYT8BejFwdjDZW9Z2R+u9ySAdPcxSsSSgvA89hLS+AHgm+SwA3566Rqs/jUDaJQvvwIYAHQGeRLkixwW+mqAFkAPoAU0COwagzwZR1kuNAKVBoCkCiRnAuAs4I3AOYOncY/vb8+PKS0aVFEWEAFtTi8b5tG8OmZqk3brhO26eeSENaoF9SXwXF16pfADpqw8nMmbs4uPg7AxsnbVnRXATNFXHJovi8N3QOeUizCAupDNIHlNXwANOgDqvJ4xGBqEWpJ6CGfQXueJmZsQfktXAriVi6TxNzK7NeSl1OHKptOiqSiEF5F9xwokRDmlGIOSpJ3QgzYKL2x4WwrN7KcI6E3Xiet/KZpERXKSaelBtFvBGyYjJjFHLbVEMgdQ9JBUUryEDU1XG8JmEKCv3WXO80VhkBcAH0GRBexkgRZq1nRlYI8ryU9PRsm2/g1TX9nwM1G0NKbUi0oWdwGXjcgbTdQKHCb7djYFwOI+F15X2sy22YVQyeePRD5a87prIihbV1f8mnl0L+rD11b3PhXdffrX1eoRIHqfuL9WZT6w4Wl+J6ruv8BVM8nF46gSFcFCbKitFBYDOEDo2BxW8oPXykU7ypZ9D0c5QIvpinVmP8xV7dbS5jlSF54Lbfs45OfwxWsVbaA8Wal/bRyXC3DV7B4yVV+1m9dSSmMNsq/kUnWrt3yXyNGjXxsEZ5LRozYPzlGIu5drx+vKiCsqVu36McCRHutsjqT7D2cARC0alApbAAAAAElFTkSuQmCC"/></button>
            </article>
            <article class="col-md-2 mt-2 mt-md-0 col-2 d-flex justify-content-center">
            <p id="mensajeerrorC" ></p>
            </article>
        </section>
        <section>
            <article class="col-md-12 mt-2 mt-md-0 col-12 d-flex justify-content-start">
                <h6>¿No tienes una empresa registrada? <a href="../../vista/EMPRESAS/registrarse-empresa.html">Registrate aqui</a></h6>
            </article>
        </section>
        <section>
            <article class="col-md-12 mt-2 mt-md-0 col-12 d-flex justify-content-start">
                <button id="registerbuton"> Inicia sesiòn </button>
            </article>
        </section>
        
    </main>
    <script src="../../assets/JS/jquery-3.7.1.min.js"></script>
    <script src="../../assets/JS/EMPRESAS/login-empresa.js"></script>
    <footer class="container-fluid">
        <section class="row justify-content-center">
            <article class="col-md-3">
                <h5>Información útil</h5>
                <ul class="list-unstyled">
                    <li><a href="#">¿Qué es VENDE CON WEBON?</a></li>
                    <li><a href="#">Vende con WEBON</a></li>
                    <li><a href="#">Programa de Empresas Afiliadas</a></li>
                    <li><a href="../../vista/EMPRESAS/ayuda-empresas.html">Centro de ayuda en línea</a></li>
                    <li><a href="#">Términos y Condiciones</a></li>
                </ul>
            </article>
            <article class="col-md-3">
                <h5>Todo en un solo lugar</h5>
                <ul class="list-unstyled">
                    <li>✔ Plataforma segura y confiable</li>
                    <li>✔ Gestión centralizada de inventario</li>
                    <li>✔ Análisis y reportes de ventas detallados</li>
                    <li>✔ Soporte dedicado 24/7</li>
                    <li>✔ Herramientas de marketing y promoción</li>
                </ul>
            </article>
            <article class="col-md-3">
                <h5>Crece con confianza</h5>
                <p>Con nuestra plataforma, tu negocio estará respaldado por tecnología de punta, diseñada para garantizar la seguridad de tus transacciones y la protección de tus datos.</p>
    
            </article>
            <article class="col-md-3">
                <h5>Contacto</h5>
                <p>Atención telefónica: <a href="tel:+598 99 123 456">+598 99 123 456</a></p>
                <p>De Lunes a Sábados de 09:00hs a 18:00hs y Domingos de 10:00hs a 16:00hs</p>
                <ul class="list-unstyled">
                    <li><a href="#">Preguntas Frecuentes / Contacto</a></li>
                    <li><a href="#">Trabaja con nosotros</a></li>
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
