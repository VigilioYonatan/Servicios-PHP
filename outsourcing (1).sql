-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2021 a las 12:09:30
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
  `cod_cliente` varchar(20) NOT NULL,
  `ruc_cliente` int(50) NOT NULL,
  `razon_cliente` varchar(50) NOT NULL,
  `direccion_cliente` text NOT NULL,
  `contacto_cliente` varchar(100) NOT NULL,
  `celular1_cliente` int(9) NOT NULL,
  `celular2_cliente` int(9) NOT NULL,
  `email1_cliente` varchar(50) NOT NULL,
  `email2_cliente` varchar(50) NOT NULL,
  `web_cliente` text NOT NULL,
  `area_cliente` varchar(50) NOT NULL,
  `estado_cliente` varchar(50) NOT NULL,
  `asignado_cliente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Id_cliente`, `cod_cliente`, `ruc_cliente`, `razon_cliente`, `direccion_cliente`, `contacto_cliente`, `celular1_cliente`, `celular2_cliente`, `email1_cliente`, `email2_cliente`, `web_cliente`, `area_cliente`, `estado_cliente`, `asignado_cliente`) VALUES
(6, 'CLI-101', 2012154556, 'empresa', 'Jr. Plaza 343. Puente Piedra', 'contacto', 967575844, 968650700, 'email1@gmail.com', 'email2@gmail.com', 'www.empresa.com', 'area', 'activo', 'Yonatan'),
(14, 'CLI-102', 2010007845, 'GlobalTec SAC', ' Jr, Niquel 240, Los Olivos 15311', 'Vallejo Gillermo Fiordo', 995645784, 2147483647, 'Globaltec@gmail.com', 'Globaltec@gmail.com', 'globaltec.com.pe', 'transporte', 'potencial', 'jESUS'),
(15, 'CLI-103', 2147483647, 'Cliente3', 'Mz u3 lt 17', 'Juan', 964533677, 978346577, 'cliente3@gmail.com', 'cliente3_2@gmail.com', 'cliente3.com', 'Logística', 'Neutro', 'Yonatan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_area`
--

CREATE TABLE `cliente_area` (
  `area_id` int(11) NOT NULL,
  `area_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente_area`
--

INSERT INTO `cliente_area` (`area_id`, `area_nombre`) VALUES
(1, 'Gerencia'),
(2, 'Logística'),
(3, 'Almacén'),
(4, 'Sistemas'),
(5, 'Ventas'),
(6, 'Operaciones'),
(7, 'Planeamiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_estado`
--

CREATE TABLE `cliente_estado` (
  `id_estado` int(11) NOT NULL,
  `nombre_estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente_estado`
--

INSERT INTO `cliente_estado` (`id_estado`, `nombre_estado`) VALUES
(1, 'activo'),
(2, 'potencial'),
(3, 'Neutro'),
(4, 'Descartado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE `cotizacion` (
  `cot_id` int(11) NOT NULL,
  `cot_codigo` varchar(20) NOT NULL,
  `cot_cliente` varchar(50) NOT NULL,
  `cot_asignado` varchar(50) NOT NULL,
  `cot_estado` varchar(50) NOT NULL,
  `cot_pago` varchar(20) NOT NULL,
  `cot_moneda` varchar(20) NOT NULL,
  `cot_entrega` varchar(20) NOT NULL,
  `cot_expira` varchar(20) NOT NULL,
  `cot_direccion` varchar(100) NOT NULL,
  `cot_condicion` text NOT NULL,
  `cot_pie` varchar(50) NOT NULL,
  `cot_fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cotizacion`
--

INSERT INTO `cotizacion` (`cot_id`, `cot_codigo`, `cot_cliente`, `cot_asignado`, `cot_estado`, `cot_pago`, `cot_moneda`, `cot_entrega`, `cot_expira`, `cot_direccion`, `cot_condicion`, `cot_pie`, `cot_fecha`) VALUES
(22, 'COT-101', ' Jorge clliente ', 'Yonatan ', ' Abierto', 'efectivo', 'Dolares', '10 dias', '10 dias', 'su casa ', 'Cuenta corriente en Dolares         Bco. Scotiabank: 000-34533433\r\nCCI DOLARES: 009-021-0000463603-77\r\nCuenta corriente en soles Bco.\r\n Scotiabank: 2824507\r\nCCI Soles: 009-021-0000026452345-74', 'Telef: 01-05440920 Celulares: 958529197\r\n        9', '2021-10-16 00:00:00'),
(23, 'COT-102', ' Jorge cliente  ', 'Yonatan  ', 'Aprobado', 'efectivo', 'Soles', '10 dias', '15 dias', 'en su casa', 'Cuenta corriente en Dolares         Bco. Scotiabank: 000-34533433\r\nCCI DOLARES: 009-021-0000463603-77\r\nCuenta corriente en soles Bco.\r\n Scotiabank: 2824507\r\nCCI Soles: 009-021-0000026452345-74', 'Telef: 01-05440920 Celulares: 958529197\r\n        9', '2021-10-16 00:00:00'),
(24, 'COT-103', ' Jorge cliente ', 'Yonatan ', ' Abierto', '10 dias', 'Soles', '15 dias', '10 dias', 'en su casa', 'Cuenta corriente en Dolares         Bco. Scotiabank: 000-34533433\r\nCCI DOLARES: 009-021-0000463603-77\r\nCuenta corriente en soles Bco.\r\n Scotiabank: 2824507\r\nCCI Soles: 009-021-0000026452345-74', 'Telef: 01-05440920 Celulares: 958529197\r\n        9', '2021-10-16 07:59:41'),
(25, 'COT-104', ' Jorge cliente ', 'Laura ', ' Abierto', '10 dias', 'Soles', '15 dias', '15 dias', 'en su casa', 'Cuenta corriente en Dolares         Bco. Scotiabank: 000-34533433\r\nCCI DOLARES: 009-021-0000463603-77\r\nCuenta corriente en soles Bco.\r\n Scotiabank: 2824507\r\nCCI Soles: 009-021-0000026452345-74', 'Telef: 01-05440920 Celulares: 958529197\r\n        9', '2021-10-17 11:16:42'),
(26, 'COT-105', '   Jesús   ', 'Yonatan   ', 'Aprobado', '15 dias', 'Dolares', '15 dias', '15 dias', 'en su casa', 'Cuenta corriente en Dolares         Bco. Scotiabank: 000-34533433\r\nCCI DOLARES: 009-021-0000463603-77\r\nCuenta corriente en soles Bco.\r\n Scotiabank: 2824507\r\nCCI Soles: 009-021-0000026452345-74', 'Telef: 01-05440920 Celulares: 958529197\r\n        9', '2021-10-19 18:24:26'),
(27, 'COT-106', 'empresa ', 'Yonatan ', 'Aprobado', '15 dias', 'Dolares', '10 dias', '15 dias', 'Jr. Plaza 343. Puente Piedra', 'Cuenta corriente en Dolares         \r\nBco. Scotiabank: 000-34533433\r\nCCI DOLARES: 009-021-0000463603-77\r\nCuenta corriente en soles Bco.\r\nScotiabank: 2824507\r\nCCI Soles: 009-021-0000026452345-74', 'Telef: 01-05440920 \r\nCelulares: 958529197\r\n9580703', '2021-10-29 01:08:36'),
(28, 'COT-107', 'empresa', 'Yonatan', 'Aprobado', 'efectivo', 'Soles', '10 dias', '20 dias', 'Jr. Plaza 343. Puente Piedra', 'Cuenta corriente en Dolares         \r\nBco. Scotiabank: 000-34533433\r\nCCI DOLARES: 009-021-0000463603-77\r\nCuenta corriente en soles Bco.\r\nScotiabank: 2824507\r\nCCI Soles: 009-021-0000026452345-74', 'Telef: 01-05440920 \r\nCelulares: 958529197\r\n9580703', '2021-10-29 20:11:57'),
(29, 'COT-108', '    empresa         ', 'Yonatan         ', 'Aprobado', '10 dias', 'Soles', '15 dias', '15 dias', 'Jr. Plaza 343. Puente Piedra', 'Cuenta corriente en Dolares         \r\nBco. Scotiabank: 000-34533433\r\nCCI DOLARES: 009-021-0000463603-77\r\nCuenta corriente en soles Bco.\r\nScotiabank: 2824507\r\nCCI Soles: 009-021-0000026452345-74', 'Telef: 01-05440920 \r\nCelulares: 958529197\r\n9580703', '2021-10-29 21:08:50'),
(30, 'COT-109', 'empresa', 'Yonatan', 'Aprobado', '15 dias', 'Soles', '15 dias', '15 dias', 'Jr. Plaza 343. Puente Piedra', 'Cuenta corriente en Dolares         \r\nBco. Scotiabank: 000-34533433\r\nCCI DOLARES: 009-021-0000463603-77\r\nCuenta corriente en soles Bco.\r\nScotiabank: 2824507\r\nCCI Soles: 009-021-0000026452345-74', 'Telef: 01-05440920 \r\nCelulares: 958529197\r\n9580703', '2021-10-29 21:14:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion_servicio`
--

CREATE TABLE `cotizacion_servicio` (
  `id_cotser` int(11) NOT NULL,
  `cod_cot` varchar(20) NOT NULL,
  `nombre_cot` varchar(50) NOT NULL,
  `servicio_cot` varchar(50) NOT NULL,
  `cantidad_cot` int(11) NOT NULL,
  `precio_cot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cotizacion_servicio`
--

INSERT INTO `cotizacion_servicio` (`id_cotser`, `cod_cot`, `nombre_cot`, `servicio_cot`, `cantidad_cot`, `precio_cot`) VALUES
(933, 'COT-103', 'Reparacion de mouse', 'SER-104', 4, 14),
(934, 'COT-103', 'Limpieza de pc', 'SER-102', 5, 20),
(935, 'COT-107', 'Limpieza de pc', 'SER-102', 4, 20),
(936, 'COT-107', 'Reparacion de mouse', 'SER-104', 5, 14),
(937, 'COT-102', 'Mantenimiento de Cpu', 'SER-103', 4, 40),
(938, 'COT-102', 'Limpieza de pc', 'SER-102', 5, 20),
(939, 'COT-101', 'Mouse', 'SER-105', 3, 50),
(940, 'COT-101', 'Limpieza de pc', 'SER-102', 4, 20),
(941, 'COT-101', 'Reparacion de mouse', 'SER-104', 5, 14),
(942, 'COT-102', 'Reparacion de mouse', 'SER-104', 8, 14),
(943, 'COT-105', 'Limpieza de pc', 'SER-102', 4, 20),
(944, 'COT-105', 'Reparacion de mouse', 'SER-104', 5, 14),
(945, 'COT-108', 'Limpieza de pc', 'SER-102', 4, 20),
(946, 'COT-108', 'Mouse', 'SER-105', 5, 50),
(947, 'COT-104', 'Mouse', 'SER-105', 5, 50),
(948, 'COT-104', 'Reparacion de mouse', 'SER-104', 2, 14),
(950, 'COT-104', '', '', 0, 0),
(951, 'COT-106', 'Mantenimiento de Cpu', 'SER-103', 4, 40),
(952, 'COT-106', 'Reparacion de mouse', 'SER-104', 5, 14),
(953, 'COT-106', 'Mouse', 'SER-105', 2, 50),
(954, 'COT-109', 'Mouse', 'SER-105', 1, 50),
(955, 'COT-109', 'Reparacion de mouse', 'SER-104', 2, 14),
(956, 'COT-109', 'Limpieza de pc', 'SER-102', 6, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion_servicio2`
--

CREATE TABLE `cotizacion_servicio2` (
  `id_cotser2` int(11) NOT NULL,
  `cod_cot2` varchar(20) NOT NULL,
  `nombre_cot2` varchar(50) NOT NULL,
  `cantidad_cot2` int(11) NOT NULL,
  `precio_cot2` int(11) NOT NULL,
  `total_cot2` int(11) NOT NULL,
  `precioNeto_cot2` int(11) NOT NULL,
  `subtotal_cot2` int(11) NOT NULL,
  `IGV_cot2` int(11) NOT NULL,
  `totalall_cot2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cotizacion_servicio2`
--

INSERT INTO `cotizacion_servicio2` (`id_cotser2`, `cod_cot2`, `nombre_cot2`, `cantidad_cot2`, `precio_cot2`, `total_cot2`, `precioNeto_cot2`, `subtotal_cot2`, `IGV_cot2`, `totalall_cot2`) VALUES
(75, 'COT-103', 'Limpieza de pc', 4, 14, 56, 56, 56, 20, 76),
(76, 'COT-103', 'Limpieza de pc', 5, 20, 100, 100, 156, 20, 176),
(77, 'COT-107', 'Reparacion de mouse', 4, 20, 80, 80, 80, 20, 100),
(78, 'COT-107', 'Reparacion de mouse', 5, 14, 70, 70, 150, 20, 170),
(79, 'COT-102', 'Limpieza de pc', 4, 40, 160, 160, 160, 20, 180),
(80, 'COT-102', 'Limpieza de pc', 5, 20, 100, 100, 260, 20, 280),
(81, 'COT-101', 'Reparacion de mouse', 3, 50, 150, 150, 150, 20, 170),
(82, 'COT-101', 'Reparacion de mouse', 4, 20, 80, 80, 230, 20, 250),
(83, 'COT-101', 'Reparacion de mouse', 5, 14, 70, 70, 300, 20, 320),
(84, 'COT-105', 'Reparacion de mouse', 4, 20, 80, 80, 80, 20, 100),
(85, 'COT-105', 'Reparacion de mouse', 5, 14, 70, 70, 150, 20, 170),
(86, 'COT-108', 'Mouse', 4, 20, 80, 80, 80, 20, 100),
(87, 'COT-108', 'Mouse', 5, 50, 250, 250, 330, 20, 350),
(88, 'COT-102', 'Reparacion de mouse', 4, 40, 160, 160, 160, 20, 180),
(89, 'COT-102', 'Reparacion de mouse', 5, 20, 100, 100, 260, 20, 280),
(90, 'COT-102', 'Reparacion de mouse', 8, 14, 112, 112, 372, 20, 392),
(91, 'COT-104', 'Reparacion de mouse', 5, 50, 250, 250, 250, 20, 270),
(92, 'COT-104', 'Reparacion de mouse', 2, 14, 28, 28, 278, 20, 298),
(93, 'COT-106', 'Mouse', 4, 40, 160, 160, 160, 20, 180),
(94, 'COT-106', 'Mouse', 5, 14, 70, 70, 230, 20, 250),
(95, 'COT-106', 'Mouse', 2, 50, 100, 100, 330, 20, 350),
(96, 'COT-109', 'Limpieza de pc', 1, 50, 50, 50, 50, 20, 70),
(97, 'COT-109', 'Limpieza de pc', 2, 14, 28, 28, 78, 20, 98),
(98, 'COT-109', 'Limpieza de pc', 6, 20, 120, 120, 198, 20, 218);

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
  `Id_proovedor` int(10) NOT NULL,
  `cod_proovedor` varchar(20) NOT NULL,
  `ruc_proovedor` int(11) NOT NULL,
  `razon_proovedor` varchar(50) NOT NULL,
  `direccion_proovedor` text NOT NULL,
  `contacto_proovedor` varchar(100) NOT NULL,
  `celular1_proovedor` int(9) NOT NULL,
  `celular2_proovedor` int(9) NOT NULL,
  `email1_proovedor` varchar(50) NOT NULL,
  `email2_proovedor` varchar(50) NOT NULL,
  `web_proovedor` text NOT NULL,
  `area_proovedor` varchar(50) NOT NULL,
  `estado_proovedor` varchar(50) NOT NULL,
  `asignado_proovedor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`Id_proovedor`, `cod_proovedor`, `ruc_proovedor`, `razon_proovedor`, `direccion_proovedor`, `contacto_proovedor`, `celular1_proovedor`, `celular2_proovedor`, `email1_proovedor`, `email2_proovedor`, `web_proovedor`, `area_proovedor`, `estado_proovedor`, `asignado_proovedor`) VALUES
(1, 'PRO-100', 234343556, 'Proovedor1', 'MZ U3 LT9', 'JUAN', 988484474, 943243456, 'proovedor1@gmail.com', 'proovedor1_1@gmail.com', 'www.proovedor.com', 'Logística', 'activo', 'Yonatan'),
(2, 'PRO-101', 233454674, 'Proovedor2', 'Mz u3 lt 17', 'PERSONA', 975643433, 945236775, 'proovedor2@gmail.com', 'proovedor2_1@gmail.com', 'www.proovedor2.com', 'Sistemas', 'Neutro', 'Jesus'),
(10, 'PRO-102', 265656789, 'Proovedor3', 'Mz UJ 34', 'Lucas', 956456776, 945345675, 'proovedor3@gmail.com', 'proovedor3_1@gmail.com', 'www.facebook.com', 'Logística', 'activo', 'Yonatan'),
(11, 'PRO-103', 234467890, 'proovedor4', 'Mz u3 lt 21 - puente piedra', 'Marco', 956345346, 956456733, 'proovedor4@gmail.com', 'proovedor4@gmail.com', 'www.proovedor4.com', 'Ventas', 'Neutro', 'Yonatan');

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
(11, 'incidencia', 'INC'),
(14, 'servicios', 'SER'),
(17, 'Cliente', 'CLI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `servicio_id` int(10) NOT NULL,
  `servicio_cod` varchar(15) NOT NULL,
  `servicio_nombre` varchar(50) NOT NULL,
  `servicio_desc` text NOT NULL,
  `servicio_mat` text NOT NULL,
  `servicio_disponibles` int(11) NOT NULL,
  `servicio_pventa` varchar(50) NOT NULL,
  `servicio_categoria` varchar(50) NOT NULL,
  `servicio_estado` tinyint(1) NOT NULL,
  `servicio_proveedor` varchar(50) NOT NULL,
  `servicio_tipo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`servicio_id`, `servicio_cod`, `servicio_nombre`, `servicio_desc`, `servicio_mat`, `servicio_disponibles`, `servicio_pventa`, `servicio_categoria`, `servicio_estado`, `servicio_proveedor`, `servicio_tipo`) VALUES
(52, 'SER-102', 'Limpieza de pc', 'Limpiamos tu pc y liberación de virus', 'Antivirus', 1, '20', 'Soporte Técnico', 1, 'Proovedor2   ', 0),
(55, 'SER-103', 'Mantenimiento de Cpu', 'Para tener una limpia pc, necesitas un buen mantenimiento de CPU.\r\nCon nuestro servicio te aseguramos una buena limpieza.', 'nada', 2, '40', 'Soporte Técnico', 1, 'Proovedor2', 1),
(56, 'SER-104', 'Reparacion de mouse', 'Reparamos mouse', 'destornillador', 3, '14', 'Soporte Técnico', 1, 'Proovedor3', 0),
(57, 'SER-105', 'Mouse', 'Mouse inalambrico para pc', 'noc', 2, '50', 'Redes', 1, 'Proovedor3', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serv_categoria`
--

CREATE TABLE `serv_categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `serv_categoria`
--

INSERT INTO `serv_categoria` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Redes'),
(2, 'Desarrollo'),
(3, 'Soporte Técnico'),
(4, 'Hardware');

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
(85, 'USE31735', '::1', 'Rome', 'In silver', 1, 9459448, 'rome@gmail.com', '60d99e58d66a5e0f4f89ec3ddd1d9a80', 'artworks-Hj7CPjY6pMuIj8t8-7NBKSA-t500x500.jpg', 'en su casa', 939337843, '2', 0),
(86, 'ADM12687', '::1', 'Jesus', 'Muñoz', 0, 8938832, 'jesus@gmail.com', '110d46fcd978c24f306cd7fa23464d73', 'avatars-000315108724-vg19ut-t500x500.jpg', 'en su casa', 484848423, '5', 0),
(88, 'SER19767', '::1', 'Jesús', 'Muñoz', 1, 3442342, 'hola@gmail.com', '4d186321c1a7f0f354b297e8914ab240', 'gatito-cesped_0.jpg', 'en su casa', 46526264, '14', 0),
(89, 'LGT47144', '::1', 'Lucas', 'Vigilio Lavado', 0, 70602063, 'lucas@gmail.com', 'dc53fc4f621c80bdc2fa0329a6123708', 'jrulzejt5j451.jpg', 'en su casa', 968662473, '9', 0),
(91, 'INC12150', '::1', 'Elmer', 'Vigilio Lavado', 0, 94939843, 'Elmer@gmail.com', '2ed04acfdc51e5dc36b8e79c1ed44455', 'artworks-cYZUpWaeMzDRhrY7-sxFdxg-t500x500.jpg', 'en su casa', 93939345, '11', 0),
(92, 'USE33473', '::1', 'Ericka', 'Enriquez', 1, 8383839, 'ericka@gmail.com', '9199a71a523314906ddd3a7fb56ca122', 'Prog15.jpg', 'en su casa', 93938383, '2', 0),
(93, 'VNT44437', '::1', 'Laura', 'Bhrem', 0, 8383838, 'laura@gmail.com', '680e89809965ec41e64dc7e447f175ab', 'artworks-000087041952-9t30i4-t500x500.jpg', 'en su casa', 9292929, '7', 0),
(97, 'ALM52970', '::1', 'Grant', 'Bowtie', 1, 3854856, 'grant@gmail.com', '64fad28965d003cde964ea3016e257a3', 'artworks-000391130829-9dd4jx-t500x500.jpg', 'en su casa', 9349388, '8', 0),
(98, 'ADM99371', '::1', 'Falcon', 'Funk', 0, 9398838, 'falcon@gmail.com', 'fa0d1a60ef6616bb28038515c8ea4cb2', 'DqjbsSUWkAAxI2B.jpg', 'en su casa', 93983838, '5', 0),
(101, 'CLI18593', '::1', 'Jorge cliente', 'Vigilio Lavado', 1, 2314523, 'cliente1@gmail.com', '4983a0ab83ed86e0e7213c8783940193', 'sHLi1Z7r_400x400.jpg', 'en su casa', 93938223, '17', 0),
(102, 'CLI57860', '::1', 'Jesús', 'wdwd', 1, 3424525, 'jesus2@gmail.com', '7946959fb6d7957f4ec09c0aecebf382', '91319.jpg', 'en su casa', 3424342, '17', 0);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_entrega`
--

CREATE TABLE `venta_entrega` (
  `entrega_id` int(11) NOT NULL,
  `entrega_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta_entrega`
--

INSERT INTO `venta_entrega` (`entrega_id`, `entrega_nombre`) VALUES
(1, '10 dias'),
(2, '15 dias'),
(3, '20 dias'),
(4, '25 dias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_estado`
--

CREATE TABLE `venta_estado` (
  `est_id` int(11) NOT NULL,
  `est_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta_estado`
--

INSERT INTO `venta_estado` (`est_id`, `est_nombre`) VALUES
(1, 'Abierto'),
(2, 'Pendiente'),
(3, 'Proceso'),
(4, 'Cerrado'),
(5, 'Aprobado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_expira`
--

CREATE TABLE `venta_expira` (
  `expira_id` int(11) NOT NULL,
  `expira_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta_expira`
--

INSERT INTO `venta_expira` (`expira_id`, `expira_nombre`) VALUES
(1, '10 dias'),
(2, '15 dias'),
(3, '20 dias'),
(4, '25 dias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_moneda`
--

CREATE TABLE `venta_moneda` (
  `moneda_id` int(11) NOT NULL,
  `moneda_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta_moneda`
--

INSERT INTO `venta_moneda` (`moneda_id`, `moneda_nombre`) VALUES
(1, 'Soles'),
(2, 'Dolares'),
(3, 'Euro'),
(4, 'Yen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_pago`
--

CREATE TABLE `venta_pago` (
  `pago_id` int(11) NOT NULL,
  `pago_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta_pago`
--

INSERT INTO `venta_pago` (`pago_id`, `pago_nombre`) VALUES
(1, 'efectivo'),
(2, '10 dias'),
(3, '15 dias'),
(4, '20 dias');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`cargo_id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Id_cliente`),
  ADD UNIQUE KEY `ruc_cliente` (`ruc_cliente`),
  ADD KEY `ruc_cliente_2` (`ruc_cliente`);

--
-- Indices de la tabla `cliente_area`
--
ALTER TABLE `cliente_area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indices de la tabla `cliente_estado`
--
ALTER TABLE `cliente_estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD PRIMARY KEY (`cot_id`);

--
-- Indices de la tabla `cotizacion_servicio`
--
ALTER TABLE `cotizacion_servicio`
  ADD PRIMARY KEY (`id_cotser`);

--
-- Indices de la tabla `cotizacion_servicio2`
--
ALTER TABLE `cotizacion_servicio2`
  ADD PRIMARY KEY (`id_cotser2`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`Id_proovedor`);

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
-- Indices de la tabla `serv_categoria`
--
ALTER TABLE `serv_categoria`
  ADD PRIMARY KEY (`id_categoria`);

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
-- Indices de la tabla `venta_entrega`
--
ALTER TABLE `venta_entrega`
  ADD PRIMARY KEY (`entrega_id`);

--
-- Indices de la tabla `venta_estado`
--
ALTER TABLE `venta_estado`
  ADD PRIMARY KEY (`est_id`);

--
-- Indices de la tabla `venta_expira`
--
ALTER TABLE `venta_expira`
  ADD PRIMARY KEY (`expira_id`);

--
-- Indices de la tabla `venta_moneda`
--
ALTER TABLE `venta_moneda`
  ADD PRIMARY KEY (`moneda_id`);

--
-- Indices de la tabla `venta_pago`
--
ALTER TABLE `venta_pago`
  ADD PRIMARY KEY (`pago_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `cargo_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `Id_cliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `cliente_area`
--
ALTER TABLE `cliente_area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cliente_estado`
--
ALTER TABLE `cliente_estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  MODIFY `cot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `cotizacion_servicio`
--
ALTER TABLE `cotizacion_servicio`
  MODIFY `id_cotser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=957;

--
-- AUTO_INCREMENT de la tabla `cotizacion_servicio2`
--
ALTER TABLE `cotizacion_servicio2`
  MODIFY `id_cotser2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `Id_proovedor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `rol_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `servicio_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `serv_categoria`
--
ALTER TABLE `serv_categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `ventas_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `venta_entrega`
--
ALTER TABLE `venta_entrega`
  MODIFY `entrega_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `venta_estado`
--
ALTER TABLE `venta_estado`
  MODIFY `est_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `venta_expira`
--
ALTER TABLE `venta_expira`
  MODIFY `expira_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `venta_moneda`
--
ALTER TABLE `venta_moneda`
  MODIFY `moneda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `venta_pago`
--
ALTER TABLE `venta_pago`
  MODIFY `pago_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
