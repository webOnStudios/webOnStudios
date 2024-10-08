<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/CSS/TIENDA/style.css">
    <link rel="icon" href="/imagenes/icono-blanco.ico" type="image/x-icon">
    <title>SIGTO</title>
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
        <main class="container-fluid" id="barra-abajo">
            <section class="row justify-content-between align-items-center">
                <article class="col-md-2 mt-2 mt-md-0 col-3 d-flex justify-content-end">
                    <a href="../../vista/TIENDA/index.html" class="segunda-linea">Inicio</a>
                </article>
                <article class="col-md-2 mt-2 mt-md-0 col-3 d-flex justify-content-center">
                    <div class="menu">
                        <a href="#categorias"><button>Categorias <span class="caret"></span></button></a>
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
                <article class="col-md-2 mt-2 mt-md-0 col-3 d-flex justify-content-center">
                    <a href="../../vista/EMPRESAS/empresas-inicio.html" class="segunda-linea">Empresas</a>
                </article>
                <article class="col-md-2 mt-2 mt-md-0 col-3 d-flex justify-content-start">
                    <a href="#Como-comprar" class="segunda-linea">Cómo comprar</a>
                </article>
                <article class="col-md-1 d-flex justify-content-start">
                    
                </article>
                <article class="col-md-3 mt-2 mt-md-0 col-12 d-flex justify-content-start">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" placeholder="Buscar..." name="search">
                        <div class="input-group-btn">
                            <a href="../..vista/TIENDA/busqueda.html" class="btn btn-default btn-sm" type="submit">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAs1JREFUSEudVluSmlAQPQ26juAGfHxHSvyNWpkdBFcisxLNCpKU+i1T+D/oBmQfg3boywUuiE4qfIhX+nn69EHC/1wEgP/FkSCmUJ8sB5bbE+dHD7VvFUzHzG/lwaxp5L041zT9QQSPAY+YExCHzFZidTo/4/B38rQHXct9BwD648WKiIO2AIIMgRNma3M+bl9r3WsHDYhCIk+g2xCI+u78AJAnT5kRWKC3+LgNh96Lg+vVuzF/yZwC7Rmeot20hocOWkBtJABG7sK/gdcAJ8S0jI+70BhRORtJxtcPKcSRIs7H3evj6egIw4k4pRd1ZEwluA60AuCBKZGqye4sBf/heO4x4dAspgkrFZn74/kqOwQAb07RfimGfXe+UnA0LrI7PUnSd2drAvnMFFTzqBuXQx6MZ2sG+ZaCZrspzIbuwocwKGey6qaApeqCwnO0nbathpHg24VhOZaq7k9SUsAY2vBrAQtwivY08r47tzS9gDg5RfterfZyt/QMBuPZhUFOxvFefDA53rKABsczGFXhp2inCWMunUHTgbs4MNiz1ID3YbXOJj+MyEwYufOCdfnczMfGTqivbUOuNqQ93cCdrTN2+SBNDHPDigRFfTkl00u+fTSV5brHtCrLnAfZ3V4c/tLSUd+IkqbiKoxhvWjCpne9aHrRy7kPyh1QPwXnaPf6SJdqmyxGqm1YvnJl3hBZb7DtvJs0dRiYZFgHlUJyQnZ3WolfnRR5B43hiNhl6xwUHGawKVp5biAgYh9MjtDUsrvTd6WwDYgetSZyzderx7hNlFSoy0qYORTtkZPY3NKPA4gcJRm1TnL+30HUKKD9ZWFUZQpfLUmBSguzmsqTv+nMSTcszCQELONop6Wm0UGVrEV8H+mxTiyyIZDGUaVjCqQ7v5ZtvCv+k2RVx20JdDTT6I4ILepR2dT/ANSG/OytVEjxJ7ErzuuMfwGtUpQtBKPTQQAAAABJRU5ErkJggg=="/>
                            </a>
                        </div>
                    </div>
                </article>
                <article class="col-md-1 mt-2 d-flex justify-content-start">
                    
                </article>
            </section>
        </main>

    <div class="container col-12">
        <section class="row justify-content-between align-items-center">
            <article class="col-md-12">
                <div id="productCarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#productCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#productCarousel" data-slide-to="1"></li>
                        <li data-target="#productCarousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="../../assets/Imagenes/publicidad1.jpg" alt="Primera imagen">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="../../assets/Imagenes/publicidad2.jpg" alt="Segunda imagen">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="../../assets/Imagenes/publicidad3.jpg" alt="Tercera imagen">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </article>
        </section>
    </div>

    <div class="container col-l-7 col-12">
        <section class="row justify-content-between align-items-center">
            <article class="col-md-12 mt-md-2  d-flex justify-content-center">
                    <img src="../../assets/Imagenes/bannerr.png" width="100%">
            </article>
        </section>
    </div>
    <main class="container col-l-8 col-12 mt-4" id="help-var">
        <section class="row justify-content-between align-items-center">
            <article class="col-2 col-md-3 mt-4">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAgVJREFUSEuFVst1wkAMlJxGwhHDY5MOSAGGlBAqo4QEU0AoAfPA5OhK2DzJWq/2Y+NT4pUsaTQzCyIAWIgfBAQLlg/zEZThjyVGx6tXyefDFzp5LFQ3pGMQcKrJ5fvn+vGwewD76tImJ7bQFcXL7nr+Pun40QnmpvpFwHXYk4NUupZDVbi7N/Wsh51iJp5ytbEUcW9qHN2H+nIQrwrLtlLk51wAoW0O2UZieEuz4ca5oWcF6NwltE3NBYb/LzWRbPxc4h3TUhQZOwtz7shPEBdcmI2lTsMGwon70TNUold9Af+BqX1xfAKpo2km0xeQjsb1NmS7JbuJuHedt3wj3j/2gDDwPqrdFVjsrucf5rmH7IgeUj1xRFPN+6RhAqsHtGsv9YwspDRVAGG8o0QHSUBkMeVqa0lmGgI9YVoggkgH+An8X6UZKxCy7t4cRJhBAYSFqSzxriWeDxgjcMKULpxOMsIMFJoISxJ8gXACjpeGPE1DWo8UOCJbWuTUsZJjIvQ0jYSmLw3NivwORHhsFek98ZRFLH21g1h/tGTi+028KD1X1iKdK6sQ4XABgUi7FAIQBJRwU2amLxZnFW5nrAMNhYOoFwjvL/940WXPWScKwSFoYbZ7C/Yre0FMOZ3zS/4BYU9/zfEjex8k9pAxOP0qR4TBnIMLRzx7Ehbv61nv9bmhv/wDBT1ZMY3ufc0AAAAASUVORK5CYII="> <p>Tiendas WebOn</p>
            </article>
            <article class="col-3 col-md-3 mt-4">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAbJJREFUSEuVVktSwzAMlcNFYNkM03CEsIfCFTgJR+EKTDhAewQC07DtRYoZyz+pkpwhq0a29CT7vZc6KI8DAF9fwy8aEssOHPiUYW90Sp7AQVQLX4nT/QygudfqZCUellN3ypgpVFd4NashWrNMcHv3PHr/++YBrvlF0De7JK6EK3RwunLdy/fn+yH3jhU2w8O+g25k14wJStFYKD5pD154jZ+WebphAP2w8+KQaCE6iAVM9izz5EIXpb9+ePKUPqJv0bUyQQqF3CMC1EHFsTfJ0dQHQfEZwEoQLKLJTQ4x+f5DvQqjhQqpwjNHxATcBnRLUKYx1I5t9dtdZKhgiCUuW/ehIXHJhaYKx3VzUgRIcgtN87ZA03oUlpZT15Y+hA4ITSlARK8elYHDlLaN5JXYRK6RBQ9UyQWAUxq4GNvTLF9T6IsqOVlFGn+d5Rd0LGYX4/ySHcBm+7h34EZmXnQCyyqER4UD8oef+eOeWUWw67M/vyIIe5SjaFOZ2zWmU0tYPxtmA+zWUzEqTM3tkT5Nyq6Y3WXT5YNe8/hICGbYQJ7A1nXhu/1pppqoqlb+tigof4bO7h1QeNiOAAAAAElFTkSuQmCC"/><p>Paga con crédito o débito</p>
            </article>
            <article class="col-3 mt-4">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAx1JREFUSEuNVsl14kAQrWqcx8inAdmDmAgs7mPAERhFgogEMjBLAMgRGHnR4BNKRF1D9aYWyPPcB17Tqq7l168vIfBCACD1o/62ru/YtFzEC7ffcWRsEOh/KanM2dQsE+oswO3gIZayuiOkGEHECFQSYQZApRDi+T1fZa5634XntRWR3mASAFULdvoVdMofQSmFGH7uV2UDYC9YMwAChL/GM0RKzYUSCZbI2e5XWXcwCQRWMVT4AxCmABAAYAlEy+J1M28CYiHyovX6o9kJuNQcpUXuXVKYWtwReoNxgCQfT05T5ZggdUGsT7/JKjuSR7YVKIacMe/1Oc0AQMFF3Ae8Sj73TwqW28EkliR3QFAK0Une90+ZZqYmqKEpQDe63wnAGACXRb5O+Gk3qoN6prwtJYrhIV+V7OimP5qdmJ4yXEW+vvapo/bh4M8USCz4YpFvnEHYH8+A+0GUdcTVnNOqZDVDxLiGBKGr4GJSYKyqV+zyKgh/aewZT8bdQhdGIwUZM+Xwsi45gIaEdhJkdnjdDu0whKZ/KvDbZl4H4Aqi8eLE7SkISoqX7bJ9PvSpw9xVq5t/Y3pBQNnffDu0kKo6wv7oiABBheL6sF+VdW+as66cS7kDRECi9MOjpiHDkYdQw4xspmWIAzCnpQqgoThfPsv8LB1LtB+lah/5BmupQIBe/37nGrRfZW3S52AkXBav6+RctsLB/RQIF46FhqAaonp60yLfztuELIz87HwJ0+k0mmygc2J33ri6gub0tiuotu5FGgVESj72miguAONreXzqxbLIN4nOsQ4VRmNiRyca1ypsHlv4XG+cpHudZAVFKY/KJ1JSmCysCUPE+5PeoC/Rt9FDLKnaNSTmUioMjq5RZ+J1wSldmxVH87ge0ja55rOfvyeBqOjRl2sAzEDIZ0kdJX5XTGdJd4g0JYKAIyGBmQmff403mp+i0RZZLRDNC4fBscj7eyt6PJwt3G6oadtgcbYEVUAk7gAoZhuWayTMOkI8vxlRO+OD43DNBvsyaZuwFvyb/DJU/rKCCwf+Ba9b9tPGP/oiuKX4P1eg2TDKKpCnAAAAAElFTkSuQmCC"/><p>Ayuda y seguimiento</p>
            </article>
            <article class="col-3 mt-4">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAlZJREFUSEuFVdF1ozAQ3BWN2H95vLyQ68ApwLmkA7sS40qSdGCTAkwJJsnh3Fco5Kw9VkiwQsLmC6RFszs7O0IQDwIATS2YTRlh3+06Avnb9hzeBpBBFwFsqPg5ltA4DXmkf4K/YzIxmQbrflZDDMdHH1m+TDcg8SKUI8cE3d4/Lc503iDgIvoXp+3S6d5f66pYu9gBWlaJgG4jzR5/EGDWlW9X7aHxvBHqaj/BwJBi3+T07rHTyNShQQURAF9YRnV9Bmn2m0YivcKvpcIAI2eWa6Xevo+7ZixE880A1xUSEZkDYG0R5PVHsQ0BEIAp8pmzBcVYtoeeqj3yKwuESB+Y3raK+d/jrnG9nKQoaGykN3VVdCSTYeAFgFbjKgSAbbKsTzY2Mr0GwD43908zRfoArERU85PthQdwxSUG+UowS5fsHwGVp+r9wRu0NJM9uDqgowB/bnjTVTdRwUiCvfv4XiTnxiCKPv2x9HlN9k0qZmphpl0pIXAEwLOK17rar1vpblqV5EFv+uajHzeIoqk/ijlX1FvFbfa80HRmFYBGNeeJtMpgjxIkuXcEQjRq4biE9A/PASGVCSbbr2pXDgA2RTY8IJi1uLlW+KY0cQWrVt9eRjfZ8oCgFs4eFOkNAMdBU1fFPGoVXEx6t+TA3Lflzmfqz2Lr7sT013IFGjeD+3ZUIKqHr+OuvHij9RPZq6Lj2TXTEcT2oEm/mIoRmwRx/Wlo8Y/3nMZsIYDpB/ybaUhK7sVUD+RFPx0j7pdgvBziuMXBesRlxd0QHdvA7ILLxP9tKv4/3K9GLuP+2QgAAAAASUVORK5CYII="/> <p>Envios a todo el país</p>
            </article>

        </section>
    </main>
    <br>
    <div class="container col-10" id="publicidad4">
        <section class="row">
            <article class="col-md-6 article-with-image">
                <div class="content">
                    <p>Electrónica</p>
                    <h4>Disfruta del los mejores descuentos en estos productos</h4>
                    <button class="btn btn-primary">Ver más</button>
                </div>
                <div class="image">
                    <img src="../../assets/Imagenes/Electronica.jpeg">
                </div>
            </article>
            <article class="col-md-6 article-with-image">
                <div class="content">
                    <p>Moda y ropa</p>
                    <h4>Encontrá tu outifit prefierido para este invierno</h4>
                    <button class="btn btn-primary">Ver más</button>
                </div>
                <div class="image">
                    <img src="../../assets/Imagenes/Ropa.jpeg" alt="Moda y ropa">
                </div>
            </article>
        </section>
    </div>
    <div class="container mt-4" id="categorias">
        <h2>Categorías</h2>
        <section class="row">
            <article class="col-md-4">
                <div class="category-card">
                    <span>Hogar y cocina</span>
                    <img src="../../assets/Imagenes/cat-hogar.jpeg" alt="Hogar y cocina">
                </div>
            </article>
            <article class="col-md-4">
                <div class="category-card">
                    <span>Moda y ropa</span>
                    <img src="../../assets/Imagenes/cat-ropa.jpeg" alt="Moda y ropa">
                </div>
            </article>
            <article class="col-md-4">
                <div class="category-card">
                    <span>Juguetes y Juegos</span>
                    <img src="../../assets/Imagenes/cat-juguete.jpeg" alt="Juguetes y Juegos">
                </div>
            </article>
            <article class="col-md-4">
                <div class="category-card">
                    <span>Deportes</span>
                    <img src="../../assets/Imagenes/cat-deportes.jpeg" alt="Deportes">
                </div>
            </article>
            <article class="col-md-4">
                <div class="category-card">
                    <span>Salud y Belleza</span>
                    <img src="../../assets/Imagenes/cat-salud.jpeg" alt="Salud y Belleza">
                </div>
            </article>
            <article class="col-md-4">
                <div class="category-card">
                    <span>Libros y medios</span>
                    <img src="../../assets/Imagenes/cat-libros.jpeg" alt="Libros y medios">
                </div>
            </article>
            <article class="col-md-4">
                <div class="category-card">
                    <span>Automóviles</span>
                    <img src="../../assets/Imagenes/cat-autos.jpeg" alt="Automóviles">
                </div>
            </article>
            <article class="col-md-4">
                <div class="category-card">
                    <span>Mascotas</span>
                    <img src="../../assets/Imagenes/cat-mascotas.jpeg" alt="Mascotas">
                </div>
            </article>
            <article class="col-md-4">
                <div class="category-card">
                    <span>Alimentos y bebidas</span>
                    <img src="../../assets/Imagenes/cat-alimentos.jpeg" alt="Alimentos y bebidas">
                </div>
            </article>
            <article class="col-md-4">
                <div class="category-card">
                    <span>Electrocnica</span>
                    <img src="../../assets/Imagenes/cat-electronica.jpeg" alt="electronica">
                </div>
            </article>
            <article class="col-md-4">
                <div class="category-card">
                    <span>Otros</span>
                    <img src="../../assets/Imagenes/otros.jpeg" alt="Otros">
                </div>
            </article>
        </section>
    </div>
    <div class="container mt-4" id="Como-comprar">
        <h2 class="text-center">Cómo Comprar</h2>
        <div class="row justify-content-center">
            <div class="col-md-3 step">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAetJREFUSEuNVu256yAIfpnkJpu0o2SSpJt0k95NzCYcFVRUkrY/zpOjBHg/oCWYDwHg/EcP9YDA9cjG52cbP13Kdf+ZCjhv/XxEWuC2C728LXydQBD4OT4MPGqz91T8B7ABOPv4gmAmc4/5DpHiC2dNuFTgneKzZqZpq2h5DgAv+k/q6lm6c4DsMe7Q+xzXavoI8gsEnGqmVGgD4Z3a8h1FpSFFUYjqClQyAkBL9Oqh7JRiFYWcd1gmFK1EbzkbuMoVBQIvLCK+W/ikTYgoFzBtMf5d9OvmgIDAQKIkcfrSZCI44QQ3LUa3ALxHZAc4O6lpZgTZI7/JOSlAu69pQuxetKgoXG8HMC0E3mKjGa2ZA/oQ+BGh2e5LBaXuy15otk5z8RTLNqydE1qq/PS1wBB/grCmBWY1kCQ+10XAI9qnaONtpEJlZYGGyppIuZZLx1lzbgJ2pddoOMxBTFeTEfBUwU1X9JoGrXU4dT+I7DrmX2TxIHCa6vVmL1l613lV9I5rq0IiZarbXHgLNhCQhjHHjSN490K6E06vHdo0UufYJWxEtkuVdu16UNOp0o6SA1/jQpQC/sr/gPAoXu6+pucFL4PlDbe1qXXIzzNrMWq3Yx5PA12k5heGN1bj2QWDFfDVz5Nf0Ng1bvP8ASDZ6SEgbKYHAAAAAElFTkSuQmCC"/>
                <h5>1. Selecciona tu producto</h5>
                <p>Busca y selecciona los productos que deseas comprar.</p>
            </div>
            <div class="col-md-3 step">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAcxJREFUSEuNltF5wjAMhH9tApuUTZpXGAIYAl5hk2aTZhMXO3Ys2TI0D3wQ2ZZOujsjtI8AIX3kiCCE/Et/38JpabethEeBFLd5as6uKrtUh+MR26PPc85IGSsafeh4pygEpScLyPPVp2tJ8haIE6yvYkG1/tBUdwgwj8FbjPpQPZQVQW54SiB8E+QBYQYObv/04JzutOF2mDsCv/ngA8jcTddhWq26QeazKCH47gedh5w3dQOvaBZgX4jo8X0HoaBQbP0Pi1KWBWFf9OEzEn6AL5AJwnOoJMvzB4GI/PLi9HWltSuoVEVc+AA2uCPeKCIUye8RlsiYd0LbgR72R8rmgpKGptLXT0o+Z7ixRZP1nDzROtjcUiaB5+ZkH+yhoDCsqDZofDG/jtIqK1YFbDoYWMJamXAhyHXA94qUhKB6sa8ZzffIpMQonw/aBVblz22hY3LUNp9fV8RFIe+cNR5srKUk7ryoq9O5THz5u3ryzM5r8w04AneBk7nwIMUE7kE4WZTNkEeSVjNr7CXtKBdmvo96O3Etv6HvDeFIkDuEUzPwBoHdaYRmbaUx6U4w46vsPYss7d50bRTSCm+8qBKoh1m1WRvk/50xGuIP9sveHwAx0LYAAAAASUVORK5CYII="/>
                <h5>2. Agrega al carrito</h5>
                <p>Añade los productos seleccionados a tu carrito de compras.</p>
            </div>
            <div class="col-md-3 step">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAXxJREFUSEuNVclhwzAMgzZpN0lHySQZpaPUo2QTtzoJiqDdPOxYlnmAAFRQfwXA2S7tsS4UnONJ/OetYf8IN9fD3pHCbmKHr6XVJZZGoSuSD8RN3RexGjcQaCnUvCAakQWCG6QixILO3j0AfAP48Nuz+lPo3gV4nsAxxzsB/AHwcGCKefDwmRQbNm8Any0B1TEptM3X42QJPFvCpPtrkSCjoFiXE7UyQ4JsUlMaosj5CWtl0wHj0dpnREyFnuhcSqBY1MR15VPonIxpn4luJG44TavgAeqsob1EpgydbTkZIm0VuV8JypYmWIKQaOqHlvmSpfOGONhQ6/U01R9IJ9EG5xFMdGCkVMxxYtQmMrppt3pZQ3YnQl+PdDwv7GEfeO+AE2hGSXxvRDzPLN9BYnZ5AqGxyfkDBV825A5mtetXc9SIjTyymBTUUnXS51+co58rUip+fNmJkFmAY2Nmkro6Yd032WMHPsbFgZ4Z0oXZ2dBEFja7f1TdXbngFwA0yiUvOg4qAAAAAElFTkSuQmCC"/>
                <h5>3. Realiza tu pago</h5>
                <p>Procede con tu tarjeta de debito/credito y completa tu compra realizando el pago.</p>
            </div>
        </div>
    </div>

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

<script src="../../assets/JS/jquery-3.7.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>