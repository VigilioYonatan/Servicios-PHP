-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2021 a las 04:35:32
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `outsourcing`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `id_alma` int(10) NOT NULL,
  `id_prove` int(10) NOT NULL,
  `id_prod` int(10) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `estado_alma` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `cargo_id` int(10) NOT NULL,
  `cargo_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Id_cliente` int(10) NOT NULL,
  `nom_cliente` varchar(50) NOT NULL,
  `ape_cliente` varchar(50) NOT NULL,
  `dni_cliente` int(7) NOT NULL,
  `Estado_cliente` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `id_incide` int(10) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `cod_emp` int(10) NOT NULL,
  `estado_incide` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logistica`
--

CREATE TABLE `logistica` (
  `Id_logi` int(10) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `Estado_logi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operaciones`
--

CREATE TABLE `operaciones` (
  `id_ope` int(10) NOT NULL,
  `id_cliente` int(10) NOT NULL,
  `orden_id` int(10) NOT NULL,
  `fecha_entrega` date NOT NULL,
  `Direccion_ope` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Id_prod` int(10) NOT NULL,
  `non_prod` varchar(50) NOT NULL,
  `cod_prod` varchar(10) NOT NULL,
  `estado_prod` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `Id_prove` int(10) NOT NULL,
  `nom_prove` varchar(50) NOT NULL,
  `Estado_prove` int(1) NOT NULL,
  `Direccion_prove` varchar(50) NOT NULL,
  `telefono_prove` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `rol_id` int(12) NOT NULL,
  `rol_nombre` varchar(25) NOT NULL,
  `rol_cod` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`rol_id`, `rol_nombre`, `rol_cod`) VALUES
(1, 'sistema', 'SIS'),
(2, 'usuario', 'USE'),
(5, 'admin', 'ADM'),
(7, 'venta', 'VNT'),
(8, 'almacen', 'ALM'),
(9, 'logistica', 'LGT'),
(10, 'cotizacion', 'COT'),
(11, 'incidencia', 'INC'),
(14, 'servicios', 'SER');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `servicio_id` int(10) NOT NULL,
  `servicio_cod` varchar(15) NOT NULL,
  `servicio_nombre` varchar(50) NOT NULL,
  `servicio_tipo` varchar(100) NOT NULL,
  `servicio_cat` varchar(50) NOT NULL,
  `servicio_det` varchar(150) NOT NULL,
  `servicio_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`servicio_id`, `servicio_cod`, `servicio_nombre`, `servicio_tipo`, `servicio_cat`, `servicio_det`, `servicio_time`) VALUES
(23, 'SER100001', 'Mantenimiento De CPU', 'Hardware', 'CPU', 'Mantenimiento de CPU para no tener complicaciones.', 1),
(31, 'SER100002', 'Cambio de Disco HDD a SSD', 'Hardware', 'CPU', 'Cambio de Disco HDD a SSD para mas velocidad', 1),
(32, 'SER100003', 'Formateo de PC', 'Software', 'Servidores', 'Formateo de PC y instalacion de windows.', 3),
(43, 'SER100004', 'Ampliar Ram', 'Hardware', 'CPU', 'Amplia tu ram para mas velocidad en tu pc', 1),
(47, 'SER100005', 'Instalacion de Programas', 'Software', 'CPU', 'Instalamos programas crackeados xD', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `user_id` int(11) NOT NULL,
  `user_cod_empleado` varchar(50) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_nombre` text NOT NULL,
  `user_apellido` varchar(50) NOT NULL,
  `user_estado` tinyint(1) NOT NULL,
  `user_dni` int(12) NOT NULL,
  `user_correo` varchar(100) NOT NULL,
  `user_contraseña` varchar(100) NOT NULL,
  `user_foto` varchar(100) NOT NULL,
  `user_direccion` text NOT NULL,
  `user_telefono` int(20) NOT NULL,
  `user_rol` varchar(20) NOT NULL DEFAULT 'guest',
  `cargo_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `user_cod_empleado`, `user_ip`, `user_nombre`, `user_apellido`, `user_estado`, `user_dni`, `user_correo`, `user_contraseña`, `user_foto`, `user_direccion`, `user_telefono`, `user_rol`, `cargo_id`) VALUES
(84, 'ADM34191', '::1', 'Yonatan', 'Vigilio Lavado', 1, 70602063, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'REAPER.jpg', 'MZ U3 LT 17 - PUENTE PIEDRA', 968662473, '5', 0),
(85, 'USE31735', '::1', 'Rome', 'In silver', 0, 9459448, 'rome@gmail.com', '60d99e58d66a5e0f4f89ec3ddd1d9a80', 'artworks-Hj7CPjY6pMuIj8t8-7NBKSA-t500x500.jpg', 'en su casa', 939337843, '2', 0),
(86, 'ADM12687', '::1', 'jESUS', 'Muñoz', 0, 8938832, 'jesus@gmail.com', '110d46fcd978c24f306cd7fa23464d73', 'avatars-000315108724-vg19ut-t500x500.jpg', 'en su casa', 484848423, '5', 0),
(88, 'SER19767', '::1', 'Jesús', 'Muñoz', 1, 3442342, 'hola@gmail.com', '4d186321c1a7f0f354b297e8914ab240', 'gatito-cesped_0.jpg', 'en su casa', 46526264, '14', 0),
(89, 'LGT47144', '::1', 'Lucas', 'Vigilio Lavado', 0, 70602063, 'lucas@gmail.com', 'dc53fc4f621c80bdc2fa0329a6123708', 'jrulzejt5j451.jpg', 'en su casa', 968662473, '9', 0),
(90, 'SER61251', '::1', 'Mateo', 'ps', 0, 93939334, 'mateo@gmail.com', '5b4c6f05e39f90fcebd51be99338c42e', 'descarga.png', 'en su casa', 8483832, '14', 0),
(91, 'INC12150', '::1', 'Elmer', 'Vigilio Lavado', 0, 94939843, 'Elmer@gmail.com', '2ed04acfdc51e5dc36b8e79c1ed44455', 'artworks-cYZUpWaeMzDRhrY7-sxFdxg-t500x500.jpg', 'en su casa', 93939345, '11', 0),
(92, 'USE33473', '::1', 'Ericka', 'Enriquez', 1, 8383839, 'ericka@gmail.com', '9199a71a523314906ddd3a7fb56ca122', 'Prog15.jpg', 'en su casa', 93938383, '2', 0),
(93, 'VNT44437', '::1', 'Laura', 'Bhrem', 0, 8383838, 'laura@gmail.com', '680e89809965ec41e64dc7e447f175ab', 'artworks-000087041952-9t30i4-t500x500.jpg', 'en su casa', 9292929, '7', 0),
(94, 'COT70553', '::1', 'Feint', 'feint', 1, 9393938, 'feint@gmail.com', '486fbd86757ef4d036bdf76d4942f99d', 'sHLi1Z7r_400x400.jpg', 'en su casa', 90939393, '10', 0),
(97, 'ALM52970', '::1', 'Grant', 'Bowtie', 1, 3854856, 'grant@gmail.com', '64fad28965d003cde964ea3016e257a3', 'artworks-000391130829-9dd4jx-t500x500.jpg', 'en su casa', 9349388, '8', 0),
(98, 'ADM99371', '::1', 'Falcon', 'Funk', 0, 9398838, 'falcon@gmail.com', 'fa0d1a60ef6616bb28038515c8ea4cb2', 'DqjbsSUWkAAxI2B.jpg', 'en su casa', 93983838, '5', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `ventas_id` int(10) NOT NULL,
  `ventas_cod_empleado` varchar(50) NOT NULL,
  `ventas_cod_cliente` varchar(50) NOT NULL,
  `venta_name_servicio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`cargo_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`servicio_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`ventas_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `cargo_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `rol_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `servicio_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `ventas_id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
