-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2024 a las 22:23:44
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sigto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `idUsuario` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `Estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `NroCompra` int(11) NOT NULL,
  `FechaHora` datetime DEFAULT NULL,
  `DireccionEnvio` varchar(255) DEFAULT NULL,
  `PagoFinal` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Root_CI` int(11) DEFAULT NULL,
  `Contraseña` varchar(255) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `Logo` varchar(255) DEFAULT NULL,
  `Nombre` varchar(100) NOT NULL,
  `suspendido` enum('si','no') DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `Email`, `Root_CI`, `Contraseña`, `Direccion`, `Logo`, `Nombre`, `suspendido`) VALUES
(5, 'maugematteo@gmail.com', 5436453, '$2y$10$Pec6/HfjkaI10V9VVHpMAOVnsrGLT1wh.wxRP6wHOWib7AX/3.gAq', 'Casavalle 4409', NULL, 'Aida', 'no'),
(8, 'hola@gmail.com', 3213232, '$2y$10$z5jXtopr4F1p6kp0oLhwT.o8FZIo4rT2MsMo3TGacv9paLIV9GxwO', 'Casavalle 4409', 'logo_3213232.png', 'Hola', 'no'),
(9, 'lal@gmail.com', 11111111, '$2y$10$g11dg15cyIK3WivCh9VYIetM7gIgvbtOh.GvBW9gWDX.lseTOIrGu', 'Casavalle 4409', 'logo_11111111.jpg', 'Aida', 'no'),
(10, 'maria@gmail.com', 55920178, '$2y$10$P6XT8M5FmDi5mVSb.9Vb6u4SQpRnElsmJu7Iu0Xlo3KqrBEu92P92', 'Casavalle 4409', 'logo_55920178.jpg', 'Eugenia', 'no'),
(11, 'lallll@gmail.com', 73482749, '$2y$10$Mms6ZiN7jOOLWPuwgOYlBuFcv28NQltqD6lrmCe9mG2gSgQ73Oeeu', 'lal', 'logo_73482749.jpg', 'Aida', 'no'),
(12, 'teta@gmail.com', 55555, '$2y$10$sQIqswHHtFa1tIHQAJX7ge/Hg4kkpV0oAua0gshr7hmzuyzHEJFhu', 'Casavalle 4409', 'logo_55555.jpg', 'teta', 'no'),
(13, 'LALSAS@gmail.com', 44444, '$2y$10$SeI.QnqCA7XA2wgzbMola.mLXGAPOZ60SFSfB5TgSC4ymMOjMG13K', 'Casavalle 4409', 'logo_44444.jpg', 'LAL', 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotosproducto`
--

CREATE TABLE `fotosproducto` (
  `idProducto` int(11) NOT NULL,
  `fotoPath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fotosproducto`
--

INSERT INTO `fotosproducto` (`idProducto`, `fotoPath`) VALUES
(10, '101.png'),
(10, '102.png'),
(11, '111.png'),
(11, '112.jpg'),
(12, '121.jpg'),
(12, '122.png'),
(13, '131.png'),
(14, '141.jpeg'),
(14, '142.jpg'),
(15, '151.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `idProducto` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `megusta`
--

CREATE TABLE `megusta` (
  `idProducto` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `Precio` float DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Categoria` enum('Electronica','Hogar y cocina','Moda y ropa','Juguetes y Juegos','Deportes','Salud y Belleza','Libros y medios','Automóviles','Mascotas','Alimentos y bebidas','otros') NOT NULL,
  `suspendido` enum('si','no') DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `Precio`, `Nombre`, `Descripcion`, `Cantidad`, `Categoria`, `suspendido`) VALUES
(10, 444, 'Aida', 'fdgdfg', 333, 'Hogar y cocina', 'no'),
(11, 543534, '34432', 'rfef', 4455, 'Hogar y cocina', 'no'),
(12, 3424, 'Hola SAS', 'safdsad', 3244, 'Juguetes y Juegos', 'no'),
(13, 6575, 'fhjhg', 'hgjjhg', 6757, 'Moda y ropa', 'no'),
(14, 3434, 'Camiseta', 'Lala', 78, 'Moda y ropa', 'no'),
(15, 3, 'Holanda Bandera', 'Bandera holandesa muy elastica y con mucha resistencia muy bonita adorable y perfecta para cualquier holandes', 6, 'Hogar y cocina', 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `CI` varchar(20) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Apellido` varchar(100) DEFAULT NULL,
  `Contraseña` varchar(255) DEFAULT NULL,
  `suspendido` enum('si','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `Email`, `CI`, `Nombre`, `Apellido`, `Contraseña`, `suspendido`) VALUES
(20, 'maugeo@gmail.com', '5436', 'Aida', 'Martinez', '$2y$10$gL7LhoaSQgWofsqvIUCQYu7vTwIO6BGVA.qf5Wbm8jMQYOIeoHbDC', 'no'),
(21, 'matteo@gmail.com', '654645', 'Aida', 'Martinez', '$2y$10$ylufZJWZB9yqYaPBsV8xn.e1T7r8138LnxhzbleafqbknFJ80oBI2', 'no'),
(23, 'maugematteo@gmail.com', '11111111', 'Aida', 'Martinez', '$2y$10$kJd8ra06mW06tNrRdSkIluxuZiZfPfSJFBbuqHZICpRGSdhEQLbwu', 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vende`
--

CREATE TABLE `vende` (
  `idEmpresa` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vende`
--

INSERT INTO `vende` (`idEmpresa`, `idProducto`) VALUES
(8, 12),
(8, 13),
(10, 14),
(11, 15);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`idUsuario`,`idProducto`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`NroCompra`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`),
  ADD UNIQUE KEY `email` (`Email`),
  ADD UNIQUE KEY `CI_Root` (`Root_CI`);

--
-- Indices de la tabla `fotosproducto`
--
ALTER TABLE `fotosproducto`
  ADD PRIMARY KEY (`idProducto`,`fotoPath`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`idProducto`,`idUsuario`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `megusta`
--
ALTER TABLE `megusta`
  ADD PRIMARY KEY (`idProducto`,`idUsuario`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD UNIQUE KEY `email` (`Email`),
  ADD UNIQUE KEY `cedula` (`CI`);

--
-- Indices de la tabla `vende`
--
ALTER TABLE `vende`
  ADD PRIMARY KEY (`idEmpresa`,`idProducto`),
  ADD KEY `idProducto` (`idProducto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `NroCompra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`IdUsuario`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`);

--
-- Filtros para la tabla `fotosproducto`
--
ALTER TABLE `fotosproducto`
  ADD CONSTRAINT `fotosproducto_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE;

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`),
  ADD CONSTRAINT `historial_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`IdUsuario`);

--
-- Filtros para la tabla `megusta`
--
ALTER TABLE `megusta`
  ADD CONSTRAINT `megusta_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`),
  ADD CONSTRAINT `megusta_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`IdUsuario`);

--
-- Filtros para la tabla `vende`
--
ALTER TABLE `vende`
  ADD CONSTRAINT `vende_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`idEmpresa`),
  ADD CONSTRAINT `vende_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
