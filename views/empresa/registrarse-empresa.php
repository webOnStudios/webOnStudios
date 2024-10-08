<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/CSS/EMPRESAS/register.css">
    <link rel="icon" href="/imagenes/icono-blanco.ico" type="image/x-icon">
    <title>Registrarse</title>
</head>
  
 <body>
    <header class="container-fluid">
        <section class="row justify-content-between align-items-center">
            <article class="col-md-1 mt-2 mt-md-0 col-1 d-flex justify-content-start">
                <h1></h1>
            </article>
            <article class="col-md-1 mt-2 mt-md-0 col-3 d-flex justify-content-start">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAfFJREFUSEuVVUt2wjAMlGhXCb0DvQSfruBkPE7Sq2QHOQW9Q3FWBfdJ8UeynNBmkziWJc2MJCOkBwHAA+gX74Zf5tucDT+UfV4gIHgKkV1KS3mY/89uqrRLDGl9Xi73L94fPcCeI5NPesI3AnT3BZ5237cuoykQTyVDB/q2vQL4VfasAzBWD916GA4ZfS2AgT8aXdqWGds4F3MfLUNWfduE/QFHWKViKjUrcgywdQ4j5RIx7dPaJFDIyGHO7dv+1T+OD+I7PpJ3SbL8ZhsqDioScuW7H1ycPm6jLgl63zZXAFxFAf/s28pCTrv14A6x6tlk5BNhMzjSS3HNAlb6o1Y5yU/QTSDQgpr+MOWm+yCuykQxb4QABoEsO9mMWpQYv2+KRGUAw3ulubLbikriV6wsg2CqWFQLzxvxbiVAELlsquCsD00XfafaD9zETjYaxAPkgBBuWQM9+OjwhbjFzEG1ucbxorpfUcQBGMH0gK7MUDUgUqK1Ms0BdOWYe2JmQhoEkiIWp1KmMsU6tkApAvSNbNhxfIROnpiciq7n5ZMQJC1zgCsArP5bjso+18DXxrl3IjqJTLfXwvvPGCQMSRYjn5vtvMhkd0c87dytU8Pu6dX+ZBZl8ooZZUSTjVOZoNMFXA8hrkLpTQ81U/uzUbT1L3TzKyv5/09dAAAAAElFTkSuQmCC" alt="">
            </article>
            <article class="col-md-3 mt-2 mt-md-3 col-3 d-flex justify-content-start">
                <h5><b>VENDE CON WEBON</b></h5>
            </article>
            <article class="col-md-6 mt-2 mt-md-0 col-4 d-flex justify-content-end">
                <h6 id="contacto">Contacto <br> +598 99 123 456</h6>
            </article>
            <article class="col-md-1 mt-2 mt-md-0 col-1 d-flex justify-content-start">
                <h1></h1>
            </article>
        </section>
    </header>   
    <main class="container-fluid" id="barra-abajo">
        <section class="row justify-content-between align-items-center">
            <article class="col-md-1 mt-2 mt-md-0 col-1 d-flex justify-content-start">
                <h1></h1>
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
            <article class="col-md-7 mt-2 mt-md-0 col-12 d-flex justify-content-start">
                <h1></h1>
            </article>
        </section>
    </main> 
<div class="container-fluid" id="register">
    <form method="POST" action="/WebOnStudios/index.php?action=crearEmpresa">
    <section class="row justify-content-between">
        <article class="col-md-12 col-12 d-flex justify-content-center">
            <h2 class="titulo-registro">REGISTRARSE</h2>
            
        </article>
        <article class="col-md-12 mt-2 mt-md-0 col-12 d-flex justify-content-center">
            <input id="nombre" type="text" placeholder="Nombre de la empresa" name="nombreEmpresa">
            
        </article>
        <article class="col-md-12 col-12 d-flex justify-content-center">
        <p id="mensajeerrorN" class="error"></p>
        </article>
        <article class="col-md-10 mt-2 mt-md-0 col-10 d-flex justify-content-center">
            <input id="contrasena" type="password" placeholder="Contraseña" name="contraseñaEmpresa">
        </article>
        <article class="col-md-2 mt-2 mt-md-0 col-2 d-flex justify-content-center">
            <button class="contra" id="mostrartexto"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAmVJREFUSEuFVYtx6jAQ3HMlUEmgkjwqwakEqARSCa5EG1Z3ss9EztOMx7Y+99nbWxn+OwwAgXj92v7nstVjncNra/mv/73l3U3PDgp5NuBmNkw16k64BnZX+kCkDFh4fm0aAcj40Z34WOLrRNqBKO/3DIQyuQNwB7GDyQmOZjY7cS/Z2vq7n9lbDQq5MzkB5Kw6AXAg8GHEAVbnNR7xvul7G1LAcmBLJrwDFsZUiznRFdR1xZdHArehZqyoW51aBglrZQHgosgDPBA2GvEt6MKd9nzEntjXYF0TJIVmKCyCqBkP/OXQJhAPWDglJhhOiriQcnAhoLO/arfKnaSKLKw19pWPFjVJeETCJzO7Np4Vlqc5Qa5mdsoMDBaV88uaaNqGoj6Gs2DXqh57/TnuiYVOkNl5pukz2DMC/BdFbkySjTtQ4WrErumZiSdOWVK9xJGwaTDbe8Gjk1jKM4wqPdEw6EoxQ3SVkcSuOjHZYBVKGSpqVuOomvn8ZidX/kfU2FGGak9UiFozan18ZfAl82QRNEIhzb9pEckG04PCMYqcGRK1vkfTBYR1NtjHx2DDsSlZj6YN6zf8VbyAy700uLRPzwF0yLpalAolQ37YM1A99Kj4mmhRf9YG9NrU+VaPxMS1BmTZIHmJnmj6s5zrq0eltQ0hkEkLI/isIYtEk0WU/XQKV8shhHy82PUd8n5J88fBhsmFt6NFTZGXcNeO39OXS2fQzC6XC2US9M1n4ruj+61hNm66oGmT+pMNdl0cbF+pfbMbF1so8SFrVF/oV5reuTK3b86MbKpB515dQl8v9m/O7T0/SV1IM2xkZVsAAAAASUVORK5CYII=" alt=""></button>
        </article>
        <article class="col-md-12 col-12 d-flex justify-content-center">
        <p id="mensajeerrorP" class="error"></p>
        </article>
        <article class="col-md-12 mt-2 mt-md-0 col-12 d-flex justify-content-start">
            <input id="nickname" type="number" placeholder="Teléfono" name="telefonoEmpresa">
            
        </article>
        <article class="col-md-12 col-12 d-flex justify-content-center">
        <p id="mensajeerrorT" class="error"></p>
        </article>
        <article class="col-md-12 mt-2 mt-md-0 col-12 d-flex justify-content-start">
            <input id="email" type="email" placeholder="Email empresarial" name="contactoEmpresa">
        </article>
        <article class="col-md-12 col-12 d-flex justify-content-center">
        <p id="mensajeerrorE" class="error"></p>
        </article>
        <article class="col-md-12 mt-2 mt-md-0 col-12 d-flex justify-content-start">
            <input id="CI" type="number" placeholder="Cédula de la empresa" oninput="limitarCaracteres(event)" name="cedulaEmpresa"> 
        </article>
        <article class="col-md-12 col-12 d-flex justify-content-center">
        <p id="mensajeerrorC" class="error"></p>
        </article>
    </section>
    <section class="row justify-content-between">
        <article class="col-md-2 mt-2 mt-md-0 col-2 d-flex justify-content-end">
            <input type="checkbox" id="terminos">     
        </article>
        <article class="col-md-10 mt-2 mt-md-0 col-10 d-flex justify-content-start">
            <h6 class="acepto"> He leido y acepto los <a href="../../vista/TIENDA/terminos.html" class="terminos">terminos y condiciones</a> y las <a href="/var/www/HTML/TIENDA/privacidad.html" class="terminos">politicas de privacidad</a></h6>
        </article>
        <article class="col-md-10 mt-2 mt-md-0 col-10 d-flex justify-content-center">
            <p id="mensajeerrorCheck" class="error"></p>
        </article>
    </section>
    <section>
        <article class="col-md-12 mt-2 mt-md-0 col-12 d-flex justify-content-start">
            <button type="submit" id="registerbuton"> Registrarse </button>
        </article>
    </section>
    <section>
        <article class="col-md-12 mt-2 mt-md-2 col-12 d-flex justify-content-start">
            <h5>¿Ya tienes una empresa registrada con nosotros? <a href="../../vista/EMPRESAS/login-empresas.html">Inicia sesión</a></h5>
        </article>
    </section>  
</form>
</div> 

<script src="../../assets/JS/jquery-3.7.1.min.js"></script>
<script src="../../assets/JS/EMPRESAS/register-empresas.js"></script>
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