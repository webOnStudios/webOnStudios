-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-09-2024 a las 04:09:32
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
-- Base de datos: `webontiendas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `idCarrito` int(11) NOT NULL,
  `cedulaUsuario` int(11) NOT NULL,
  `estadoCarrito` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compran`
--

CREATE TABLE `compran` (
  `idProducto` int(11) NOT NULL,
  `cedulaUsuario` int(11) NOT NULL,
  `fecha_hora_compra` datetime NOT NULL,
  `direccion_envio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contiene`
--

CREATE TABLE `contiene` (
  `idCarrito` int(11) NOT NULL,
  `cedulaUsuario` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantProducto` int(11) NOT NULL CHECK (`cantProducto` > 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `cedulaEmpresa` int(11) NOT NULL CHECK (`cedulaEmpresa` > 0),
  `nombreEmpresa` varchar(255) NOT NULL,
  `contactoEmpresa` varchar(255) DEFAULT NULL,
  `telefonoEmpresa` int(9) DEFAULT NULL,
  `direccionEmpresa` varchar(255) DEFAULT NULL,
  `contraseñaEmpresa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genera`
--

CREATE TABLE `genera` (
  `idCarrito` int(11) NOT NULL,
  `NroCompra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `nombreProducto` varchar(255) NOT NULL,
  `descripcionProducto` varchar(255) DEFAULT NULL,
  `precioProducto` float NOT NULL CHECK (`precioProducto` > 0),
  `stockProducto` int(11) NOT NULL CHECK (`stockProducto` >= 0),
  `categoria` varchar(50) NOT NULL CHECK (`categoria` in ('Electronica','Hogar y cocina','Moda y ropa','Juguetes y Juegos','Deportes','Salud y Belleza','Libros y medios','Automóviles','Mascotas','Alimentos y bebidas','otros')),
  `fotosProducto` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjeta`
--

CREATE TABLE `tarjeta` (
  `NroTarjeta` int(11) NOT NULL CHECK (`NroTarjeta` > 0),
  `fechaVencimiento` date NOT NULL,
  `CVV` int(3) NOT NULL,
  `tipoTarjeta` varchar(50) DEFAULT NULL,
  `nombrePropietario` varchar(255) NOT NULL,
  `cedulaUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `NroCompra` int(15) NOT NULL,
  `fechaHoraCompra` datetime NOT NULL,
  `direccionEnvio` varchar(255) NOT NULL,
  `root` int(11) NOT NULL CHECK (`root` > 0),
  `medioPago` varchar(50) DEFAULT NULL,
  `EstadoTicket` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cedulaUsuario` int(11) NOT NULL CHECK (`cedulaUsuario` > 0),
  `nicknameUsuario` varchar(255) NOT NULL,
  `emailUsuario` varchar(255) NOT NULL,
  `nombreUsuario` varchar(255) NOT NULL,
  `apellidoUsuario` varchar(255) NOT NULL,
  `telefonoUsuario` int(9) DEFAULT NULL,
  `contraseñaUsuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venden`
--

CREATE TABLE `venden` (
  `idEmpresa` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`idCarrito`),
  ADD KEY `cedulaUsuario` (`cedulaUsuario`);

--
-- Indices de la tabla `compran`
--
ALTER TABLE `compran`
  ADD PRIMARY KEY (`idProducto`,`cedulaUsuario`),
  ADD KEY `cedulaUsuario` (`cedulaUsuario`);

--
-- Indices de la tabla `contiene`
--
ALTER TABLE `contiene`
  ADD PRIMARY KEY (`idCarrito`,`idProducto`),
  ADD KEY `cedulaUsuario` (`cedulaUsuario`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`),
  ADD UNIQUE KEY `cedulaEmpresa` (`cedulaEmpresa`);

--
-- Indices de la tabla `genera`
--
ALTER TABLE `genera`
  ADD PRIMARY KEY (`idCarrito`,`NroCompra`),
  ADD KEY `NroCompra` (`NroCompra`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  ADD PRIMARY KEY (`NroTarjeta`),
  ADD KEY `cedulaUsuario` (`cedulaUsuario`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`NroCompra`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cedulaUsuario`),
  ADD UNIQUE KEY `nicknameUsuario` (`nicknameUsuario`),
  ADD UNIQUE KEY `emailUsuario` (`emailUsuario`);

--
-- Indices de la tabla `venden`
--
ALTER TABLE `venden`
  ADD PRIMARY KEY (`idEmpresa`,`idProducto`),
  ADD KEY `idProducto` (`idProducto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `idCarrito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `NroCompra` int(15) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`cedulaUsuario`) REFERENCES `usuario` (`cedulaUsuario`);

--
-- Filtros para la tabla `compran`
--
ALTER TABLE `compran`
  ADD CONSTRAINT `compran_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`),
  ADD CONSTRAINT `compran_ibfk_2` FOREIGN KEY (`cedulaUsuario`) REFERENCES `usuario` (`cedulaUsuario`);

--
-- Filtros para la tabla `contiene`
--
ALTER TABLE `contiene`
  ADD CONSTRAINT `contiene_ibfk_1` FOREIGN KEY (`idCarrito`) REFERENCES `carrito` (`idCarrito`),
  ADD CONSTRAINT `contiene_ibfk_2` FOREIGN KEY (`cedulaUsuario`) REFERENCES `carrito` (`cedulaUsuario`),
  ADD CONSTRAINT `contiene_ibfk_3` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`);

--
-- Filtros para la tabla `genera`
--
ALTER TABLE `genera`
  ADD CONSTRAINT `genera_ibfk_1` FOREIGN KEY (`idCarrito`) REFERENCES `carrito` (`idCarrito`),
  ADD CONSTRAINT `genera_ibfk_2` FOREIGN KEY (`NroCompra`) REFERENCES `ticket` (`NroCompra`);

--
-- Filtros para la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  ADD CONSTRAINT `tarjeta_ibfk_1` FOREIGN KEY (`cedulaUsuario`) REFERENCES `usuario` (`cedulaUsuario`);

--
-- Filtros para la tabla `venden`
--
ALTER TABLE `venden`
  ADD CONSTRAINT `venden_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`idEmpresa`),
  ADD CONSTRAINT `venden_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
