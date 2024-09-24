<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<h1>Centro de manejo de la tienda</h1>

<div class="container-fluid">
<section class="row">
<article class="col-2">
<h5 id="menu">Menú</h5>
  <ul class="list-group">
  <li class="list-group-item"><a href="#publicidad">Admins</a></li>
    <li class="list-group-item"><a href="#usuarios">Usuarios</a></li>
    <li class="list-group-item"><a href="#empresas">Empresas</a></li>
    <li class="list-group-item"><a href="#productos">Productos</a></li>
  </ul>
</article>
<article class="col-10">
<h3 id="admins">Admins</h3><a href="#menu">Menú</a>                 
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Email</th>
      <th scope="col">Permiso de editar/borrar</th>
      <th scope="col" colspan="3">Contraseña</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    include '../../config/database.php';
    $sql=$conexion->query("select * from admins");
    while ($datos = $sql->fetch_object()) { ?>
        <tr>
            <td><?php echo $datos->idAdmin; ?></td>
            <td><?php echo $datos->Nombre; ?></td>
            <td><?php echo $datos->Email; ?></td>
            <td><?php echo $datos->permisoEditarBorrar; ?></td>
            <td><?php echo $datos->Contraseña; ?></td>
            
            <td><button class="btn btn-info"><box-icon name='edit-alt' type='solid' color='#ffffff'></box-icon></button></td>
            <td><button class="btn btn-danger"><box-icon name='trash' type='solid' color='#ffffff'></box-icon></button></td>
        </tr>
    <?php } ?>

  </tbody>
</table>

  <h3 id="usuarios">Usuarios</h3><a href="#menu">Menú</a>                 
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nickname</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Email</th>
      <th scope="col">Contraseña</th>
      <th scope="col">Telefono</th>
      <th scope="col" colspan="3">Cédula</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    include '../../config/database.php';
    $sql=$conexion->query("select * from usuario");
    while ($datos = $sql->fetch_object()) { ?>
        <tr>
            <td><?php echo $datos->nicknameUsuario; ?></td>
            <td><?php echo $datos->nombreUsuario; ?></td>
            <td><?php echo $datos->apellidoUsuario; ?></td>
            <td><?php echo $datos->emailUsuario; ?></td>
            <td><?php echo $datos->contraseñaUsuario; ?></td>
            <td><?php echo $datos->telefonoUsuario; ?></td>
            <td><?php echo $datos->cedulaUsuario; ?></td>
            <td><button class="btn btn-info"><box-icon name='edit-alt' type='solid' color='#ffffff'></box-icon></button></td>
            <td><button class="btn btn-danger"><box-icon name='trash' type='solid' color='#ffffff'></box-icon></button></td>
        </tr>
    <?php } ?>

  </tbody>
</table>
  <h3 id="empresas">Empresas</h3><a href="#menu">Menú</a>            
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Email</th>
      <th scope="col">Contraseña</th>
      <th scope="col">Telefono</th>
      <th scope="col">Dirección</th>
      <th scope="col" colspan="3">Cédula</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    include '../../config/database.php';
    $sql=$conexion->query("select * from empresa");
    while ($datos = $sql->fetch_object()) { ?>
        <tr>
            <td><?php echo $datos->idEmpresa; ?></td>
            <td><?php echo $datos->nombreEmpresa; ?></td>
            <td><?php echo $datos->contactoEmpresa; ?></td>
            <td><?php echo $datos->contraseñaEmpresa; ?></td>
            <td><?php echo $datos->telefonoEmpresa; ?></td>
            <td><?php echo $datos->direccionEmpresa; ?></td>
            <td><?php echo $datos->cedulaEmpresa; ?></td>
            <td><button class="btn btn-info"><box-icon name='edit-alt' type='solid' color='#ffffff'></box-icon></button></td>
            <td><button class="btn btn-danger"><box-icon name='trash' type='solid' color='#ffffff'></box-icon></button></td>
        </tr>
    <?php } ?>

  </tbody>
</table>
  <h3 id="productos">Productos</h3><a href="#menu">Menú</a>                 
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripción</th>
      <th scope="col">Precio</th>
      <th scope="col">Stock</th>
      <th scope="col">Categoria</th>
      <th scope="col" colspan="2">Fotos</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    include '../../config/database.php';
    $sql=$conexion->query("select * from producto");
    while ($datos = $sql->fetch_object()) { ?>
        <tr>
            <td><?php echo $datos->idProducto; ?></td>
            <td><?php echo $datos->nombreProducto; ?></td>
            <td><?php echo $datos->descripcionProducto; ?></td>
            <td><?php echo $datos->precioProducto; ?></td>
            <td><?php echo $datos->stockProducto; ?></td>
            <td><?php echo $datos->categoria; ?></td>
            <td><button class="btn btn-info"><box-icon name='edit-alt' type='solid' color='#ffffff'></box-icon></button></td>
            <td><button class="btn btn-danger"><box-icon name='trash' type='solid' color='#ffffff'></box-icon></button></td>
        </tr>
    <?php } ?>

  </tbody>
</table>
</article>
</section>
</div>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>
