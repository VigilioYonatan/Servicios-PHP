-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2021 a las 12:53:03
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
  `ruc_cliente` varchar(50) NOT NULL,
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
(6, 'CLI-101', '2012154556', 'empresa', 'Jr. Plaza 343. Puente Piedra', 'contacto', 967575844, 968650700, 'email1@gmail.com', 'email2@gmail.com', 'www.empresa.com', 'area', 'activo', 'Yonatan'),
(14, 'CLI-102', '2010007845', 'GlobalTec SAC', ' Jr, Niquel 240, Los Olivos 15311', 'Vallejo Gillermo Fiordo', 995645784, 2147483647, 'Globaltec@gmail.com', 'Globaltec@gmail.com', 'globaltec.com.pe', 'transporte', 'potencial', 'jESUS'),
(15, 'CLI-103', '2147483647', 'Cliente3', 'Mz u3 lt 17', 'Juan', 964533677, 978346577, 'cliente3@gmail.com', 'cliente3_2@gmail.com', 'cliente3.com', 'Logística', 'Neutro', 'Yonatan'),
(21, 'CLI-104', '2576489006', 'cliente6', 'en su casa xd', 'Lucas', 945354367, 964563457, 'cliente6@gmail.com', 'cliente62@gmail.com', 'www.cliente6.com', 'Operaciones', 'potencial', 'Yonatan Vigilio');

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
(4, 'Descartado'),
(6, 'adad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_servicio`
--

CREATE TABLE `compra_servicio` (
  `compra_id` int(11) NOT NULL,
  `compra_op` varchar(50) NOT NULL,
  `compra_ot` varchar(50) NOT NULL,
  `compra_cot` varchar(50) NOT NULL,
  `compra_cliente` varchar(50) NOT NULL,
  `compra_asignado` varchar(50) NOT NULL,
  `compra_entrega` varchar(50) NOT NULL,
  `compra_estado` varchar(50) NOT NULL,
  `compra_pago` varchar(50) NOT NULL,
  `compra_direccion` varchar(100) NOT NULL,
  `compra_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `compra_moneda` varchar(50) NOT NULL,
  `compra_fechaActual` timestamp NOT NULL DEFAULT current_timestamp(),
  `compra_responsable` varchar(50) NOT NULL,
  `compra_operativo` text NOT NULL,
  `compra_requiere` text NOT NULL,
  `compra_item` varchar(50) NOT NULL,
  `compra_nota` text NOT NULL,
  `compra_cantidad` int(11) NOT NULL,
  `compra_observaciones` text NOT NULL,
  `compra_proveedor` varchar(50) NOT NULL,
  `compra_costo` int(11) NOT NULL,
  `compra_cot_prov` varchar(20) NOT NULL,
  `compra_ocp` varchar(50) NOT NULL,
  `compra_añadido` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compra_servicio`
--

INSERT INTO `compra_servicio` (`compra_id`, `compra_op`, `compra_ot`, `compra_cot`, `compra_cliente`, `compra_asignado`, `compra_entrega`, `compra_estado`, `compra_pago`, `compra_direccion`, `compra_creacion`, `compra_moneda`, `compra_fechaActual`, `compra_responsable`, `compra_operativo`, `compra_requiere`, `compra_item`, `compra_nota`, `compra_cantidad`, `compra_observaciones`, `compra_proveedor`, `compra_costo`, `compra_cot_prov`, `compra_ocp`, `compra_añadido`) VALUES
(44, 'OP-110', 'OT-109', 'COT-112', 'Cliente3 ', 'Yonatan Vigilio ', '15 dias', 'Aprobado', '10 dias', 'Mz u3 lt 17', '2021-11-11 06:49:24', 'Dolares', '2021-11-11 11:51:29', 'Ericka', 'Estos son las operaciones', 'No requiere', 'Limpieza de pc', 'nota 4', 6, 'O1', 'Proovedor1', 80, 'cot-2020-21', '', 1),
(45, 'OP-110', 'OT-109', 'COT-112', 'Cliente3 ', 'Yonatan Vigilio ', '15 dias', 'Aprobado', '10 dias', 'Mz u3 lt 17', '2021-11-11 06:49:24', 'Dolares', '2021-11-11 11:51:29', 'Ericka', 'Estos son las operaciones', 'No requiere', 'Mantenimiento de Cpu', 'nota 5', 4, 'O2', 'Proovedor1', 40, 'cot-2020-21', '', 1),
(46, 'OP-110', 'OT-109', 'COT-112', 'Cliente3 ', 'Yonatan Vigilio ', '15 dias', 'Aprobado', '10 dias', 'Mz u3 lt 17', '2021-11-11 06:49:24', 'Dolares', '2021-11-11 11:51:29', 'Ericka', 'Estos son las operaciones', 'No requiere', 'Reparacion de mouse Gamers', 'no6', 3, 'O3', 'Proovedor1', 50, 'cot-2020-21', '', 1),
(63, 'OP-109', 'OT-108', 'COT-111', 'cliente6 ', 'Yonatan Vigilio ', '15 dias', 'Aprobado', '10 dias', 'en su casa xd', '2021-11-10 04:18:51', 'Dolares', '2021-11-10 09:28:06', 'Laura', 'operacionesxd', 'requierexd', 'Limpieza de pc', 'NOTA1', 3, 'observ1', 'Proovedor1', 50, 'COT-2021-2022', '', 1),
(64, 'OP-109', 'OT-108', 'COT-111', 'cliente6 ', 'Yonatan Vigilio ', '15 dias', 'Aprobado', '10 dias', 'en su casa xd', '2021-11-10 04:18:51', 'Dolares', '2021-11-10 09:28:06', 'Laura', 'operacionesxd', 'requierexd', 'Mantenimiento de Cpu', 'NOTA2', 4, 'observ2', 'Proovedor1', 60, 'COT-2021-2022', '', 1),
(65, 'OP-109D', 'OT-108', 'COT-111', 'cliente6 ', 'Yonatan Vigilio ', '15 dias', 'Aprobado', '10 dias', 'en su casa xd', '2021-11-10 04:18:51', 'Dolares', '2021-11-10 09:28:06', 'Laura', 'operacionesxd', 'requierexd', 'Reparacion de mouse Gamers', 'NOTA3', 5, 'observ3', 'Proovedor1', 70, 'COT-2021-2022', '', 1),
(66, 'OP-109D', 'OT-108', 'COT-111', 'cliente6 ', 'Yonatan Vigilio ', '15 dias', 'Aprobado', '10 dias', 'en su casa xd', '2021-11-10 04:18:51', 'Dolares', '2021-11-10 09:28:06', 'Laura', 'operacionesxd', 'requierexd', 'Instalacion de Programas', 'NOTA4', 6, 'observ4', 'Proovedor1', 80, 'COT-2021-2022', '', 1),
(67, 'OP-107', 'OT-104', 'COT-110', 'empresa', 'Yonatan Vigilio', '10 dias', 'Aprobado', '10 dias', 'Jr. Plaza 343. Puente Piedra', '2021-11-07 22:30:33', 'Soles', '2021-11-08 03:33:02', 'Rome', 'Detalle Operativo', 'Requiere', 'Reparacion de mouse Gamers', 'nota1', 4, 'observ1', 'Proovedor1', 40, 'COT-2022-2023', '', 1),
(68, 'OP-107', 'OT-104', 'COT-110', 'empresa', 'Yonatan Vigilio', '10 dias', 'Aprobado', '10 dias', 'Jr. Plaza 343. Puente Piedra', '2021-11-07 22:30:33', 'Soles', '2021-11-08 03:33:02', 'Rome', 'Detalle Operativo', 'Requiere', 'Mantenimiento de Cpu', 'nota2', 5, 'observ2', 'Proovedor1', 20, 'COT-2022-2023', '', 1),
(69, 'OP-107', 'OT-104', 'COT-110', 'empresa', 'Yonatan Vigilio', '10 dias', 'Aprobado', '10 dias', 'Jr. Plaza 343. Puente Piedra', '2021-11-07 22:30:33', 'Soles', '2021-11-08 03:33:02', 'Rome', 'Detalle Operativo', 'Requiere', 'Limpieza de pc', 'nota3', 6, 'observ3', 'Proovedor1', 30, 'COT-2022-2023', '', 1),
(70, 'OP-103', 'OT-101', 'COT-109', 'empresa ', 'Yonatan Vigilio ', '10 dias', 'Aprobado', 'Contado', 'Jr. Plaza 343. Puente Piedra', '2021-11-06 22:20:49', 'Dolares', '2021-11-07 11:40:00', 'Rome', 'Detalle Operativo', 'Requiere', 'Reparacion de mouse Gamers', 'nota1', 5, 'observacion1', 'Proovedor1', 20, 'COT-5050-5051', 'OCP-109', 1),
(71, 'OP-103', 'OT-101', 'COT-109', 'empresa ', 'Yonatan Vigilio ', '10 dias', 'Aprobado', 'Contado', 'Jr. Plaza 343. Puente Piedra', '2021-11-06 22:20:49', 'Dolares', '2021-11-07 11:40:00', 'Rome', 'Detalle Operativo', 'Requiere', 'Limpieza de pc', 'nota2', 10, 'observacion2', 'Proovedor1', 25, 'COT-5050-5051', 'OCP-109', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condiciones_generales`
--

CREATE TABLE `condiciones_generales` (
  `id_condicion` int(11) NOT NULL,
  `texto_condicion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `condiciones_generales`
--

INSERT INTO `condiciones_generales` (`id_condicion`, `texto_condicion`) VALUES
(0, 'Cuenta corriente en Dolares         \r\nBco. Scotiabank: 000-34533433\r\nCCI DOLARES: 009-021-0000463603-77\r\nCuenta corriente en soles Bco.\r\nScotiabank: 2824507\r\nCCI Soles: 009-021-0000026452345-74');

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
(60, 'COT-101', 'empresa ', 'Yonatan Vigilio ', 'Aprobado', '10 dias', 'Soles', '20 dias', '15 dias', 'Jr. Plaza 343. Puente Piedra', 'Cuenta corriente en Dolares         \r\nBco. Scotiabank: 000-34533433\r\nCCI DOLARES: 009-021-0000463603-77\r\nCuenta corriente en soles Bco.\r\nScotiabank: 2824507\r\nCCI Soles: 009-021-0000026452345-74', 'Telef: 01-05440920 \r\nCelulares: 958529197\r\n9580703', '2021-11-03 08:24:04'),
(62, 'COT-102', 'Cliente3', 'Yonatan Vigilio', 'Abierto', '10 dias', 'Soles', '10 dias', '15 dias', 'Mz u3 lt 17', 'Cuenta corriente en Dolares         \r\nBco. Scotiabank: 000-34533433\r\nCCI DOLARES: 009-021-0000463603-77\r\nCuenta corriente en soles Bco.\r\nScotiabank: 2824507\r\nCCI Soles: 009-021-0000026452345-74', 'Telef: 01-05440920 \r\nCelulares: 958529197\r\n9580703', '2021-11-03 11:04:01'),
(63, 'COT-103', 'Cliente3', 'Yonatan Vigilio', 'Cerrado', '15 dias', 'Dolares', '15 dias', '10 dias', 'Mz u3 lt 17', 'Cuenta corriente en Dolares         \r\nBco. Scotiabank: 000-34533433\r\nCCI DOLARES: 009-021-0000463603-77\r\nCuenta corriente en soles Bco.\r\nScotiabank: 2824507\r\nCCI Soles: 009-021-0000026452345-74', 'Telef: 01-05440920 \r\nCelulares: 958529197\r\n9580703', '2021-11-03 21:44:02'),
(64, 'COT-104', 'cliente3 ', 'Yonatan Vigilio ', 'Aprobado', '10 dias', 'Dolares', '15 dias', '15 dias', 'Mz u3 lt 17', 'Cuenta corriente en Dolares         \r\nBco. Scotiabank: 000-34533433\r\nCCI DOLARES: 009-021-0000463603-77\r\nCuenta corriente en soles Bco.\r\nScotiabank: 2824507\r\nCCI Soles: 009-021-0000026452345-74', 'Telef: 01-05440920 \r\nCelulares: 958529197\r\n9580703', '2021-11-03 21:58:24'),
(65, 'COT-105', 'cliente3', 'Yonatan Vigilio', 'Aprobado', 'efectivo', 'Dolares', '15 dias', '15 dias', 'Mz u3 lt 17', 'Cuenta corriente en Dolares         \r\nBco. Scotiabank: 000-34533433\r\nCCI DOLARES: 009-021-0000463603-77\r\nCuenta corriente en soles Bco.\r\nScotiabank: 2824507\r\nCCI Soles: 009-021-0000026452345-74', 'Telef: 01-05440920 \r\nCelulares: 958529197\r\n9580703', '2021-11-04 22:10:03'),
(67, 'COT-106', 'GlobalTec SAC', 'Yonatan Vigilio', 'Aprobado', '10 dias', 'Soles', '20 dias', '10 dias', ' Jr, Niquel 240, Los Olivos 15311', 'Cuenta corriente en Dolares         \r\nBco. Scotiabank: 000-34533433\r\nCCI DOLARES: 009-021-0000463603-77\r\nCuenta corriente en soles Bco.\r\nScotiabank: 2824507\r\nCCI Soles: 009-021-0000026452345-74', 'Telef: 01-05440920 \r\nCelulares: 958529197\r\n9580703', '2021-11-05 19:28:56'),
(68, 'COT-107', 'empresa ', 'Yonatan Vigilio ', 'Aprobado', '10 dias', 'Dolares', '15 dias', '15 dias', 'Jr. Plaza 343. Puente Piedra', 'Cuenta corriente en Dolares         \r\nBco. Scotiabank: 000-34533433\r\nCCI DOLARES: 009-021-0000463603-77\r\nCuenta corriente en soles Bco.\r\nScotiabank: 2824507\r\nCCI Soles: 009-021-0000026452345-74', 'Telef: 01-05440920 \r\n                  Celulares: ', '2021-11-06 07:39:07'),
(69, 'COT-108', 'empresa ', 'Yonatan Vigilio ', 'Aprobado', '10 dias', 'Soles', '15 dias', '10 dias', 'Jr. Plaza 343. Puente Piedra', 'Cuenta corriente en Dolares         \r\nBco. Scotiabank: 000-34533433\r\nCCI DOLARES: 009-021-0000463603-77\r\nCuenta corriente en soles Bco.\r\nScotiabank: 2824507\r\nCCI Soles: 009-021-0000026452345-74', 'Telef: 01-05440920 \r\n                  Celulares: ', '2021-11-06 11:12:47'),
(71, 'COT-109', 'empresa ', 'Yonatan Vigilio ', 'Aprobado', 'Contado', 'Dolares', '10 dias', '10 dias', 'Jr. Plaza 343. Puente Piedra', 'Cuenta corriente en Dolares         \r\nBco. Scotiabank: 000-34533433\r\nCCI DOLARES: 009-021-0000463603-77\r\nCuenta corriente en soles Bco.\r\nScotiabank: 2824507\r\nCCI Soles: 009-021-0000026452345-74', 'Telef: 01-05440920 \r\n                  Celulares: ', '2021-11-06 22:20:49'),
(72, 'COT-110', 'empresa ', 'Yonatan Vigilio ', 'Pendiente', '10 dias', 'Euro', '10 dias', '15 dias', 'Jr. Plaza 343. Puente Piedra', 'Cuenta corriente en Dolares         \r\nBco. Scotiabank: 000-34533433\r\nCCI DOLARES: 009-021-0000463603-77\r\nCuenta corriente en soles Bco.\r\nScotiabank: 2824507\r\nCCI Soles: 009-021-0000026452345-74', 'Telef: 01-05440920 \r\nCelulares: 958529197\r\n9580703', '2021-11-07 22:30:33'),
(73, 'COT-111', 'cliente6  ', 'Yonatan Vigilio  ', 'Pendiente', '10 dias', 'Dolares', '15 dias', '20 dias', 'en su casa xd', 'Cuenta corriente en Dolares         \r\nBco. Scotiabank: 000-34533433\r\nCCI DOLARES: 009-021-0000463603-77\r\nCuenta corriente en soles Bco.\r\nScotiabank: 2824507\r\nCCI Soles: 009-021-0000026452345-74', 'Telef: 01-05440920 Celulares: 958529197 958070', '2021-11-10 04:18:51'),
(74, 'COT-112', 'Cliente3 ', 'Yonatan Vigilio ', 'Aprobado', '10 dias', 'Dolares', '15 dias', '15 dias', 'Mz u3 lt 17', 'Cuenta corriente en Dolares         \r\nBco. Scotiabank: 000-34533433\r\nCCI DOLARES: 009-021-0000463603-77\r\nCuenta corriente en soles Bco.\r\nScotiabank: 2824507\r\nCCI Soles: 009-021-0000026452345-74', 'Telef: 01-05440920 Celulares: 958529197 958070', '2021-11-11 06:49:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion_estado`
--

CREATE TABLE `cotizacion_estado` (
  `id_estado` int(11) NOT NULL,
  `nombre_estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cotizacion_estado`
--

INSERT INTO `cotizacion_estado` (`id_estado`, `nombre_estado`) VALUES
(1, 'ABIERTO'),
(2, 'APROBADO'),
(3, 'PENDIENTES'),
(4, 'PROCESO'),
(5, 'CERRADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion_expira`
--

CREATE TABLE `cotizacion_expira` (
  `cotizacion_id` int(11) NOT NULL,
  `cotizacion_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cotizacion_expira`
--

INSERT INTO `cotizacion_expira` (`cotizacion_id`, `cotizacion_nombre`) VALUES
(1, '10 dias'),
(3, '15 dias'),
(4, '20 dias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion_moneda`
--

CREATE TABLE `cotizacion_moneda` (
  `cotizacion_id` int(11) NOT NULL,
  `cotizacion_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cotizacion_moneda`
--

INSERT INTO `cotizacion_moneda` (`cotizacion_id`, `cotizacion_nombre`) VALUES
(1, 'Soles'),
(2, 'Dolares'),
(3, 'Euro'),
(4, 'Yen'),
(6, 'pesos venezolanos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion_pago`
--

CREATE TABLE `cotizacion_pago` (
  `id_cotizacion` int(11) NOT NULL,
  `nombre_cotizacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cotizacion_pago`
--

INSERT INTO `cotizacion_pago` (`id_cotizacion`, `nombre_cotizacion`) VALUES
(1, 'contado'),
(2, '10 dias'),
(3, '15 dias'),
(4, '20 dias'),
(5, '25 dias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion_servicio`
--

CREATE TABLE `cotizacion_servicio` (
  `id_cotser` int(11) NOT NULL,
  `cod_cot` varchar(20) NOT NULL,
  `nombre_cot` varchar(50) NOT NULL,
  `servicio_cot` varchar(50) NOT NULL,
  `nota_cot` varchar(100) NOT NULL,
  `cantidad_cot` int(11) NOT NULL,
  `precio_cot` int(11) NOT NULL,
  `observacion_cot` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cotizacion_servicio`
--

INSERT INTO `cotizacion_servicio` (`id_cotser`, `cod_cot`, `nombre_cot`, `servicio_cot`, `nota_cot`, `cantidad_cot`, `precio_cot`, `observacion_cot`) VALUES
(1012, '', '', '', 'efef', 0, 0, ''),
(1013, '', '', '', 'gfgfg', 0, 0, ''),
(1014, 'COT-101', 'Limpieza de pc', 'SER-102', 'nota1', 3, 20, ''),
(1015, 'COT-101', 'Instalacion de Programas', 'SER-105', 'nota2', 4, 50, ''),
(1016, 'COT-102', 'Limpieza de pc', 'SER-102', 'notacualquiera', 5, 20, ''),
(1017, 'COT-102', 'Reparacion de mouse Gamers', 'SER-104', 'herramientas', 4, 14, ''),
(1018, 'COT-102', 'Instalacion de Programas', 'SER-105', 'herramientas2', 8, 50, ''),
(1019, 'COT-103', 'Limpieza de pc', 'SER-102', 'nota1', 4, 20, ''),
(1020, 'COT-103', 'Mantenimiento de Cpu', 'SER-103', 'nota4', 5, 40, ''),
(1021, 'COT-103', 'Reparacion de mouse Gamers', 'SER-104', 'nota2', 6, 14, ''),
(1022, 'COT-104', 'Reparacion de mouse Gamers', 'SER-104', 'nota1', 4, 14, ''),
(1023, 'COT-104', 'Limpieza de pc', 'SER-102', 'nota2', 3, 20, ''),
(1024, 'COT-104', 'Instalacion de Programas', 'SER-105', 'nota4', 4, 50, ''),
(1025, 'COT-105', 'Limpieza de pc', 'SER-102', 'nota1', 1, 20, ''),
(1026, 'COT-105', 'Mantenimiento de Cpu', 'SER-103', 'nota2', 2, 40, ''),
(1027, 'COT-105', 'Reparacion de mouse Gamers', 'SER-104', 'nota3', 1, 14, ''),
(1034, 'COT-106', 'Limpieza de pc', 'SER-102', 'nota1', 1, 20, ''),
(1035, 'COT-106', 'Mantenimiento de Cpu', 'SER-103', 'nota2', 2, 40, ''),
(1036, 'COT-106', 'Instalacion de Programas', 'SER-105', 'dsd', 4, 50, ''),
(1037, 'COT-107', 'Limpieza de pc', 'SER-102', '4', 5, 20, ''),
(1038, 'COT-108', 'Limpieza de pc', 'SER-102', 'fgfg', 2, 20, ''),
(1039, 'COT-108', 'Reparacion de mouse Gamers', 'SER-104', 'dff', 4, 14, ''),
(1040, 'COT-108', 'Instalacion de Programas', 'SER-105', 'dffdf', 5, 50, ''),
(1041, 'COT-109', 'Reparacion de mouse Gamers', 'SER-104', 'nota1', 4, 14, ''),
(1042, 'COT-109', 'Limpieza de pc', 'SER-102', 'nota2', 5, 20, ''),
(1043, 'COT-110', 'Reparacion de mouse Gamers', 'SER-104', 'nota1', 4, 14, 'ob1'),
(1044, 'COT-110', 'Mantenimiento de Cpu', 'SER-103', 'nota2', 5, 40, 'ob2'),
(1045, 'COT-110', 'Limpieza de pc', 'SER-102', 'nota3', 6, 20, 'ob3'),
(1046, 'COT-110', 'Instalacion de Programas', 'SER-105', '', 0, 50, ''),
(1047, 'COT-111', 'Limpieza de pc', 'SER-102', 'nota1', 1, 20, 'observ1'),
(1048, 'COT-111', 'Mantenimiento de Cpu', 'SER-103', 'nota2', 2, 40, 'observ2'),
(1049, 'COT-111', 'Reparacion de mouse Gamers', 'SER-104', 'nota3', 5, 14, 'observ3'),
(1050, 'COT-111', 'Instalacion de Programas', 'SER-105', 'nota4', 4, 50, 'observ4'),
(1051, 'COT-112', 'Limpieza de pc', 'SER-102', 'nota 1 ', 5, 20, 'O1'),
(1052, 'COT-112', 'Mantenimiento de Cpu', 'SER-103', 'nota 2', 7, 40, 'O2'),
(1053, 'COT-112', 'Reparacion de mouse Gamers', 'SER-104', 'nota 3', 8, 14, 'O3'),
(1054, 'COT-112', 'Instalacion de Programas', 'SER-105', 'nota 4', 2, 50, ''),
(1055, 'COT-109', 'Instalacion de Programas', 'SER-105', '', 0, 50, ''),
(1056, 'COT-109', 'Mantenimiento de Cpu', 'SER-103', '', 0, 40, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion_servicio2`
--

CREATE TABLE `cotizacion_servicio2` (
  `id_cotser2` int(11) NOT NULL,
  `cod_cot2` varchar(20) NOT NULL,
  `nombre_cot2` varchar(50) NOT NULL,
  `nota_cot2` varchar(150) NOT NULL,
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

INSERT INTO `cotizacion_servicio2` (`id_cotser2`, `cod_cot2`, `nombre_cot2`, `nota_cot2`, `cantidad_cot2`, `precio_cot2`, `total_cot2`, `precioNeto_cot2`, `subtotal_cot2`, `IGV_cot2`, `totalall_cot2`) VALUES
(184, 'COT-101', 'Instalacion de Programas', 'nota2', 3, 20, 60, 60, 60, 20, 80),
(185, 'COT-101', 'Instalacion de Programas', 'nota2', 4, 50, 200, 200, 260, 20, 280),
(186, 'COT-102', 'Instalacion de Programas', 'herramientas2', 5, 20, 100, 100, 100, 20, 120),
(187, 'COT-102', 'Instalacion de Programas', 'herramientas2', 4, 14, 56, 56, 156, 20, 176),
(188, 'COT-102', 'Instalacion de Programas', 'herramientas2', 8, 50, 400, 400, 556, 20, 576),
(189, 'COT-103', 'Reparacion de mouse Gamers', 'nota2', 4, 20, 80, 80, 80, 20, 100),
(190, 'COT-103', 'Reparacion de mouse Gamers', 'nota2', 5, 40, 200, 200, 280, 20, 300),
(191, 'COT-103', 'Reparacion de mouse Gamers', 'nota2', 6, 14, 84, 84, 364, 20, 384),
(192, 'COT-104', 'Instalacion de Programas', 'nota4', 4, 14, 56, 56, 56, 20, 76),
(193, 'COT-104', 'Instalacion de Programas', 'nota4', 3, 20, 60, 60, 116, 20, 136),
(194, 'COT-104', 'Instalacion de Programas', 'nota4', 4, 50, 200, 200, 316, 20, 336),
(195, 'COT-105', 'Reparacion de mouse Gamers', 'nota3', 1, 20, 20, 20, 20, 20, 40),
(196, 'COT-105', 'Reparacion de mouse Gamers', 'nota3', 2, 40, 80, 80, 100, 20, 120),
(197, 'COT-105', 'Reparacion de mouse Gamers', 'nota3', 1, 14, 14, 14, 114, 20, 134),
(210, 'COT-106', 'Mantenimiento de Cpu', 'nota2', 1, 20, 20, 20, 20, 20, 40),
(211, 'COT-106', 'Mantenimiento de Cpu', 'nota2', 2, 40, 80, 80, 100, 20, 120),
(212, 'COT-108', 'Instalacion de Programas', 'instalacionxd', 2, 20, 40, 40, 40, 20, 60),
(213, 'COT-108', 'Instalacion de Programas', 'instalacionxd', 4, 14, 56, 56, 96, 20, 116),
(214, 'COT-108', 'Instalacion de Programas', 'instalacionxd', 5, 50, 250, 250, 346, 20, 366),
(215, 'COT-109', 'Limpieza de pc', 'nota2', 4, 14, 56, 56, 56, 20, 76),
(216, 'COT-109', 'Limpieza de pc', 'nota2', 5, 20, 100, 100, 156, 20, 176),
(217, 'COT-110', 'Limpieza de pc', 'nota3', 4, 14, 56, 56, 56, 20, 76),
(218, 'COT-110', 'Limpieza de pc', 'nota3', 5, 40, 200, 200, 256, 20, 276),
(219, 'COT-110', 'Limpieza de pc', 'nota3', 6, 20, 120, 120, 376, 20, 396),
(220, 'COT-111', 'Instalacion de Programas', 'nota4', 1, 20, 20, 20, 20, 40, 60),
(221, 'COT-111', 'Instalacion de Programas', 'nota4', 2, 40, 80, 80, 100, 40, 140),
(222, 'COT-111', 'Instalacion de Programas', 'nota4', 5, 14, 70, 70, 170, 40, 210),
(223, 'COT-111', 'Instalacion de Programas', 'nota4', 4, 50, 200, 200, 370, 40, 410),
(224, 'COT-112', 'Reparacion de mouse Gamers', 'nota 3', 5, 20, 100, 100, 100, 40, 140),
(225, 'COT-112', 'Reparacion de mouse Gamers', 'nota 3', 7, 40, 280, 280, 380, 40, 420),
(226, 'COT-112', 'Reparacion de mouse Gamers', 'nota 3', 8, 14, 112, 112, 492, 40, 532),
(227, 'COT-112', 'Instalacion de Programas', 'nota 4', 5, 20, 100, 100, 100, 50, 150),
(228, 'COT-112', 'Instalacion de Programas', 'nota 4', 7, 40, 280, 280, 380, 50, 430),
(229, 'COT-112', 'Instalacion de Programas', 'nota 4', 8, 14, 112, 112, 492, 50, 542),
(230, 'COT-112', 'Instalacion de Programas', 'nota 4', 2, 50, 100, 100, 592, 50, 642);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `igv`
--

CREATE TABLE `igv` (
  `igv_id` int(11) NOT NULL,
  `igv_numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `igv`
--

INSERT INTO `igv` (`igv_id`, `igv_numero`) VALUES
(2, 25);

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
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `id_ingresos` int(11) NOT NULL,
  `codigo_ingresos` varchar(20) NOT NULL,
  `cod_ingresos` varchar(25) NOT NULL,
  `nombre_ingresos` varchar(100) NOT NULL,
  `fabricante_ingresos` varchar(30) NOT NULL,
  `modelo_ingresos` varchar(30) NOT NULL,
  `categoria_ingresos` varchar(30) NOT NULL,
  `pcosto_ingresos` int(11) NOT NULL,
  `lote_ingresos` varchar(30) NOT NULL,
  `umedida_ingresos` varchar(30) NOT NULL,
  `unidades_ingresos` int(11) NOT NULL,
  `descripcion_ingresos` text NOT NULL,
  `rucprov_ingresos` varchar(25) NOT NULL,
  `razon_ingresos` varchar(25) NOT NULL,
  `guia_ingresos` varchar(50) NOT NULL,
  `almacen_ingresos` varchar(25) NOT NULL,
  `ocp_ingresos` varchar(20) NOT NULL,
  `op_ingresos` varchar(20) NOT NULL,
  `moneda_ingresos` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ingresos`
--

INSERT INTO `ingresos` (`id_ingresos`, `codigo_ingresos`, `cod_ingresos`, `nombre_ingresos`, `fabricante_ingresos`, `modelo_ingresos`, `categoria_ingresos`, `pcosto_ingresos`, `lote_ingresos`, `umedida_ingresos`, `unidades_ingresos`, `descripcion_ingresos`, `rucprov_ingresos`, `razon_ingresos`, `guia_ingresos`, `almacen_ingresos`, `ocp_ingresos`, `op_ingresos`, `moneda_ingresos`) VALUES
(10, 'ALM-108', 'SERIA-0002', 'REPARACION DE USB', 'FABRICANTE 2', 'MODELO 2', 'CATEGORIA 2', 20, 'LOTE 2', 'LITROS', 0, 'descripcion2', '234343556', 'Proovedor1', 'guia 2', 'ALMACEN 1', 'OCP2', 'OP2', 'Dolares'),
(11, 'ALM-109', 'SERIA-0003', 'REPARACION DE USB', 'FABRICANTE 1', 'MODELO 1', 'CATEGORIA 1', 59, 'LOTE 1', 'KG', 8, 'descripcion', '234343556', 'Proovedor1', 'GUIA 1', 'ALMACEN 2', 'OCP1', 'OP1', 'Yen'),
(12, 'ALM-110', 'SERIA-0004', 'REPARACION DE USB', 'FABRICANTE 3', 'MODELO 2', 'CATEGORIA 2', 50, 'LOTE 3', 'LITROS', 50, 'descripcion', '234343556', 'Proovedor1', 'guia  4', 'ALMACEN 2', 'ocp43535', 'op435', 'Yen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos_almacen`
--

CREATE TABLE `ingresos_almacen` (
  `id_ingresos` int(11) NOT NULL,
  `nombre_ingresos` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ingresos_almacen`
--

INSERT INTO `ingresos_almacen` (`id_ingresos`, `nombre_ingresos`) VALUES
(1, 'ALMACEN 1'),
(2, 'ALMACEN 2'),
(3, 'ALMACEN 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos_categorias`
--

CREATE TABLE `ingresos_categorias` (
  `id_ingresos` int(11) NOT NULL,
  `nombre_ingresos` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ingresos_categorias`
--

INSERT INTO `ingresos_categorias` (`id_ingresos`, `nombre_ingresos`) VALUES
(1, 'CATEGORIA 1'),
(2, 'CATEGORIA 2'),
(3, 'CATEGORIA 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos_fabricante`
--

CREATE TABLE `ingresos_fabricante` (
  `id_ingresos` int(11) NOT NULL,
  `nombre_ingresos` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ingresos_fabricante`
--

INSERT INTO `ingresos_fabricante` (`id_ingresos`, `nombre_ingresos`) VALUES
(1, 'FABRICANTE 1'),
(2, 'FABRICANTE 2'),
(3, 'FABRICANTE 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos_lote`
--

CREATE TABLE `ingresos_lote` (
  `id_ingresos` int(11) NOT NULL,
  `nombre_ingresos` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ingresos_lote`
--

INSERT INTO `ingresos_lote` (`id_ingresos`, `nombre_ingresos`) VALUES
(1, 'LOTE 1'),
(2, 'LOTE 2'),
(3, 'LOTE 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos_modelo`
--

CREATE TABLE `ingresos_modelo` (
  `id_ingresos` int(11) NOT NULL,
  `nombre_ingresos` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ingresos_modelo`
--

INSERT INTO `ingresos_modelo` (`id_ingresos`, `nombre_ingresos`) VALUES
(1, 'MODELO 1'),
(2, 'MODELO 2'),
(3, 'MODELO 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos_salida`
--

CREATE TABLE `ingresos_salida` (
  `id_salida` int(11) NOT NULL,
  `codigo_salida` varchar(20) NOT NULL,
  `cod_salida` varchar(25) NOT NULL,
  `nombre_salida` varchar(100) NOT NULL,
  `fabricante_salida` varchar(30) NOT NULL,
  `modelo_salida` varchar(30) NOT NULL,
  `categoria_salida` varchar(30) NOT NULL,
  `pcosto_salida` int(11) NOT NULL,
  `lote_salida` varchar(30) NOT NULL,
  `umedida_salida` varchar(30) NOT NULL,
  `unidades_salida` int(11) NOT NULL,
  `descripcion_salida` text NOT NULL,
  `ruc_prov_salida` varchar(25) NOT NULL,
  `razon_salida` varchar(25) NOT NULL,
  `guia_salida` varchar(50) NOT NULL,
  `almacen_salida` varchar(30) NOT NULL,
  `ocp_salida` varchar(20) NOT NULL,
  `op_salida` varchar(20) NOT NULL,
  `moneda_salida` varchar(20) NOT NULL,
  `responsable_salida` varchar(25) NOT NULL,
  `vendedor_salida` varchar(25) NOT NULL,
  `occ_salida` varchar(25) NOT NULL,
  `cot_salida` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ingresos_salida`
--

INSERT INTO `ingresos_salida` (`id_salida`, `codigo_salida`, `cod_salida`, `nombre_salida`, `fabricante_salida`, `modelo_salida`, `categoria_salida`, `pcosto_salida`, `lote_salida`, `umedida_salida`, `unidades_salida`, `descripcion_salida`, `ruc_prov_salida`, `razon_salida`, `guia_salida`, `almacen_salida`, `ocp_salida`, `op_salida`, `moneda_salida`, `responsable_salida`, `vendedor_salida`, `occ_salida`, `cot_salida`) VALUES
(1, 'ALM-108', 'SERIA-0002', 'REPARACION DE USB', 'FABRICANTE 2', 'MODELO 2', 'CATEGORIA 2', 20, 'LOTE 2', 'LITROS', 0, 'descripcion2', '234343556', 'Proovedor1', 'guia 2', 'ALMACEN 1', 'OCP2', 'OP2', 'Dolares', 'Lucas', '', 'oc.44', 'COT-oo'),
(2, 'ALM-109', 'SERIA-0003', 'REPARACION DE USB', 'FABRICANTE 1', 'MODELO 1', 'CATEGORIA 1', 59, 'LOTE 1', 'KG', 0, 'descripcion', '234343556', 'Proovedor1', 'GUIA salida', 'ALMACEN 2', 'OCP1', 'OP1', 'Yen', 'Lucas', '', 'OCC-22', 'COT-22'),
(3, 'ALM-110', 'SERIA-0004', 'REPARACION DE USB', 'FABRICANTE 3', 'MODELO 2', 'CATEGORIA 2', 50, 'LOTE 3', 'LITROS', 19, 'descripcion', '234343556', 'Proovedor1', 'guia  de salida xd', 'ALMACEN 2', 'ocp43535', 'op435', 'Yen', 'Lucas', 'laura', 'occ-2323', 'cot-223');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos_um`
--

CREATE TABLE `ingresos_um` (
  `id_ingresos` int(11) NOT NULL,
  `nombre_ingresos` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ingresos_um`
--

INSERT INTO `ingresos_um` (`id_ingresos`, `nombre_ingresos`) VALUES
(1, 'UND'),
(2, 'LITROS'),
(3, 'KG');

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
-- Estructura de tabla para la tabla `oc_cliente`
--

CREATE TABLE `oc_cliente` (
  `oc_id` int(11) NOT NULL,
  `oc_codigo` varchar(15) NOT NULL,
  `oc_ruc` int(11) NOT NULL,
  `oc_razon` varchar(100) NOT NULL,
  `oc_descripcion` text NOT NULL,
  `oc_cotizacion` varchar(50) NOT NULL,
  `oc_archivo` varchar(250) NOT NULL,
  `oc_tiempo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `oc_cliente`
--

INSERT INTO `oc_cliente` (`oc_id`, `oc_codigo`, `oc_ruc`, `oc_razon`, `oc_descripcion`, `oc_cotizacion`, `oc_archivo`, `oc_tiempo`) VALUES
(17, 'OCC-109', 2012154556, 'empresa', 'Descripcion', 'COT-101', 'GESTIÓN PEDIDOS .mdb', '10 dias'),
(18, 'OCC-110', 2012154556, 'empresa', 'Descripcion', 'COT-105', 'Diagrama_ERP.pdf', '20 dias'),
(20, 'OCC-111', 2010007845, 'GlobalTec SAC', 'nueva descripcion', 'COT-103', 'prueba.pdf', '10 dias'),
(21, 'OCC-112', 2012154556, 'empresa', 'descripcion', 'COT-102', 'prueba.pdf', '20 dias'),
(22, 'OCC-113', 2010007845, 'GlobalTec SAC', 'descripcion', 'COT-102', 'prueba.pdf', '15 dias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oc_proveedor`
--

CREATE TABLE `oc_proveedor` (
  `ocp_id` int(11) NOT NULL,
  `ocp_codigo` varchar(10) NOT NULL,
  `ocp_ruc_prov` int(11) NOT NULL,
  `ocp_estado` varchar(50) NOT NULL,
  `ocp_responsable` varchar(50) NOT NULL,
  `ocp_moneda` varchar(50) NOT NULL,
  `ocp_entrega` varchar(50) NOT NULL,
  `ocp_razon_prov` varchar(50) NOT NULL,
  `ocp_contacto` varchar(50) NOT NULL,
  `ocp_direccion` varchar(100) NOT NULL,
  `oc_cot_prov` varchar(20) NOT NULL,
  `ocp_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `oc_proveedor`
--

INSERT INTO `oc_proveedor` (`ocp_id`, `ocp_codigo`, `ocp_ruc_prov`, `ocp_estado`, `ocp_responsable`, `ocp_moneda`, `ocp_entrega`, `ocp_razon_prov`, `ocp_contacto`, `ocp_direccion`, `oc_cot_prov`, `ocp_creacion`) VALUES
(3, 'OCP-102', 234343556, 'ABIERTO', 'Yonatan Vigilio', '', '15 dias', 'Proovedor1', 'xd', 'MZ U3 LT9', '', '2021-11-13 10:10:17'),
(24, 'OCP-103', 234343556, 'ABIERTO', 'Lucas', 'Soles', 'contado', 'Proovedor1', 'JUAN', 'MZ U3 LT9', 'cot-2020-21', '2021-11-18 08:19:53'),
(26, 'OCP-104', 234343556, 'ABIERTO', 'Lucas', 'pesos venezolanos', '15 dias', 'Proovedor1', 'JUAN', 'MZ U3 LT9', 'cot-2021-2022', '2021-11-18 08:29:47'),
(27, 'OCP-105', 233454674, 'ABIERTO', 'Lucas', 'Soles', '15 dias', 'Proovedor2', 'PERSONA', 'Mz u3 lt 17', 'cot-202020', '2021-11-18 08:31:55'),
(28, 'OCP-106', 233454674, 'EN PROCESO', 'Lucas', 'Yen', '10 dias', 'Proovedor2', 'PERSONA', 'Mz u3 lt 17', 'cot-123456', '2021-11-18 08:44:25'),
(30, 'OCP-107', 234343556, 'ABIERTO', 'Lucas', 'Dolares', '15 dias', 'Proovedor1', 'JUAN', 'MZ U3 LT9', 'COT-55555', '2021-11-19 01:58:51'),
(31, 'OCP-108', 234343556, 'OC ENVIADAS', 'Lucas', 'pesos venezolanos', '15 dias', 'Proovedor1', 'JUAN', 'MZ U3 LT9', 'COT-66666', '2021-11-19 02:00:54'),
(34, 'OCP-109', 234343556, 'ABIERTO', 'Vincent', 'Dolares', '10 dias', 'Proovedor1', 'JUAN', 'MZ U3 LT9', 'COT-5050-5051', '2021-11-20 06:29:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oc_proveedortabla`
--

CREATE TABLE `oc_proveedortabla` (
  `ocp_id` int(11) NOT NULL,
  `ocp_cod` varchar(20) NOT NULL,
  `ocp_op` varchar(20) NOT NULL,
  `ocp_item_id` int(11) NOT NULL,
  `ocp_item` varchar(50) NOT NULL,
  `ocp_nota` text NOT NULL,
  `ocp_cantidad` int(11) NOT NULL,
  `ocp_costo` int(11) NOT NULL,
  `ocp_total1` int(11) NOT NULL,
  `ocp_subtotal` int(11) NOT NULL,
  `ocp_igv` int(11) NOT NULL,
  `ocp_total2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `oc_proveedortabla`
--

INSERT INTO `oc_proveedortabla` (`ocp_id`, `ocp_cod`, `ocp_op`, `ocp_item_id`, `ocp_item`, `ocp_nota`, `ocp_cantidad`, `ocp_costo`, `ocp_total1`, `ocp_subtotal`, `ocp_igv`, `ocp_total2`) VALUES
(152, 'vacio', 'OP-109', 5, 'Mantenimiento de Cpu', 'nota2', 2, 36, 0, 0, 0, 0),
(153, 'vacio', 'OP-110', 32, 'Mantenimiento de Cpu', 'nota 2', 7, 0, 0, 0, 0, 0),
(154, 'vacio', 'OP-110', 33, 'Reparacion de mouse Gamers', 'sdsd', 8, 0, 0, 0, 0, 0),
(210, 'OCP-103', 'OP-110', 44, 'Limpieza de pc', 'nota 1 ', 5, 0, 0, 0, 0, 0),
(211, 'OCP-103', 'OP-110', 45, 'Mantenimiento de Cpu', 'nota 2', 7, 0, 0, 0, 0, 0),
(212, 'OCP-103', 'OP-110', 46, 'Reparacion de mouse Gamers', 'nota 3', 8, 0, 0, 0, 0, 0),
(213, 'OCP-104', 'OP-110', 48, 'Mantenimiento de Cpu', 'nota 2', 7, 0, 0, 0, 0, 0),
(214, 'OCP-104', 'OP-110', 49, 'Reparacion de mouse Gamers', 'nota 3', 8, 0, 0, 0, 0, 0),
(215, 'OCP-105', 'OP-110', 47, 'Limpieza de pc', 'nota 1 ', 5, 0, 0, 0, 0, 0),
(216, 'OCP-106', 'OP-107', 50, 'Reparacion de mouse Gamers', 'nota1', 4, 0, 0, 0, 0, 0),
(217, 'OCP-106', 'OP-107', 51, 'Mantenimiento de Cpu', 'nota2', 5, 0, 0, 0, 0, 0),
(218, 'OCP-106', 'OP-107', 52, 'Limpieza de pc', 'nota3', 6, 0, 0, 0, 0, 0),
(219, 'OCP-107', 'OP-107', 53, 'Reparacion de mouse Gamers', 'nota1', 4, 0, 0, 0, 0, 0),
(220, 'OCP-107', 'OP-107', 54, 'Mantenimiento de Cpu', 'nota2', 5, 0, 0, 0, 0, 0),
(221, 'OCP-107', 'OP-107', 55, 'Limpieza de pc', 'nota3', 6, 0, 0, 0, 0, 0),
(222, 'OCP-108', 'OP-108', 59, 'Instalacion de Programas', 'nota4', 4, 0, 0, 0, 0, 0),
(223, 'OCP-108', 'OP-108', 58, 'Reparacion de mouse Gamers', 'nota3', 5, 0, 0, 0, 0, 0),
(231, 'OCP-109', 'OP-103', 70, 'Reparacion de mouse Gamers', 'nota1', 4, 0, 0, 0, 0, 0),
(232, 'OCP-109', 'OP-103', 71, 'Limpieza de pc', 'nota2', 5, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oc_proveedortabla2`
--

CREATE TABLE `oc_proveedortabla2` (
  `ocp2_id` int(11) NOT NULL,
  `ocp2_cod` varchar(20) NOT NULL,
  `ocp2_op` varchar(20) NOT NULL,
  `ocp2_item_id` int(11) NOT NULL,
  `ocp2_item` varchar(50) NOT NULL,
  `ocp2_nota` varchar(100) NOT NULL,
  `ocp2_cantidad` int(11) NOT NULL,
  `ocp2_costo` int(11) NOT NULL,
  `ocp2_total1` int(11) NOT NULL,
  `ocp2_subtotal` int(11) NOT NULL,
  `ocp2_igv` int(11) NOT NULL,
  `ocp2_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `oc_proveedortabla2`
--

INSERT INTO `oc_proveedortabla2` (`ocp2_id`, `ocp2_cod`, `ocp2_op`, `ocp2_item_id`, `ocp2_item`, `ocp2_nota`, `ocp2_cantidad`, `ocp2_costo`, `ocp2_total1`, `ocp2_subtotal`, `ocp2_igv`, `ocp2_total`) VALUES
(128, 'OCP-103', 'OP-110', 44, 'Limpieza de pc', 'nota 4', 6, 80, 480, 480, 25, 505),
(129, 'OCP-103', 'OP-110', 45, 'Mantenimiento de Cpu', 'nota 5', 4, 40, 160, 640, 25, 665),
(130, 'OCP-103', 'OP-110', 46, 'Reparacion de mouse Gamers', 'no6', 3, 50, 150, 790, 25, 815),
(131, 'OCP-104', 'OP-110', 48, 'Mantenimiento de Cpu', 'nota 2', 5, 20, 100, 100, 25, 125),
(132, 'OCP-104', 'OP-110', 49, 'Reparacion de mouse Gamers', 'nota 3', 4, 40, 160, 260, 25, 285),
(133, 'OCP-105', 'OP-115', 47, 'Limpieza de pc2', 'nota 4', 5, 6, 30, 30, 25, 55),
(134, 'OCP-106', 'OP-107', 50, 'Reparacion de mouse Gamers', 'nota5', 2, 80, 160, 160, 25, 185),
(135, 'OCP-106', 'OP-107', 51, 'Mantenimiento de Cpu', 'nota6', 7, 20, 140, 300, 25, 325),
(136, 'OCP-106', 'OP-107', 52, 'Limpieza de pc', 'nota7', 9, 10, 90, 390, 25, 415),
(137, 'OCP-107', 'OP-107', 53, 'Reparacion de mouse Gamers', 'NOTA1', 5, 8, 40, 40, 25, 65),
(138, 'OCP-107', 'OP-107', 54, 'Mantenimiento de Cpu', 'NOTA2', 7, 14, 98, 138, 25, 163),
(139, 'OCP-107', 'OP-107', 55, 'Limpieza de pc', 'NOTA3', 9, 18, 162, 300, 25, 325),
(140, 'OCP-108', 'OP-104', 59, 'Instalacion de Programas', 'nota4745', 7, 43, 301, 301, 25, 326),
(141, 'OCP-108', 'OP-3434', 58, 'Reparacion de mouse Gamers', 'nota33434', 12, 84, 1008, 1309, 25, 1334),
(149, 'OCP-109', 'OP-103', 70, 'Reparacion de mouse Gamers', 'nota1', 5, 20, 100, 100, 25, 125),
(150, 'OCP-109', 'OP-103', 71, 'Limpieza de pc', 'nota2', 10, 25, 250, 350, 25, 375);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oc_proveedor_estado`
--

CREATE TABLE `oc_proveedor_estado` (
  `ocp_id` int(11) NOT NULL,
  `ocp_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `oc_proveedor_estado`
--

INSERT INTO `oc_proveedor_estado` (`ocp_id`, `ocp_nombre`) VALUES
(1, 'ABIERTO'),
(2, 'OC ENVIADAS'),
(3, 'CERRADO'),
(4, 'EN PROCESO'),
(5, 'PEDIDO RECIBIDO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opcotizacion_servicio`
--

CREATE TABLE `opcotizacion_servicio` (
  `op_id` int(11) NOT NULL,
  `op_codigo` varchar(50) NOT NULL,
  `op_ot` varchar(50) NOT NULL,
  `op_cot` varchar(50) NOT NULL,
  `op_cliente` varchar(50) NOT NULL,
  `op_asignado` varchar(50) NOT NULL,
  `op_entrega` varchar(50) NOT NULL,
  `op_estado` varchar(50) NOT NULL,
  `op_pago` varchar(50) NOT NULL,
  `op_direccion` varchar(150) NOT NULL,
  `op_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `op_moneda` varchar(50) NOT NULL,
  `op_fechaActual` datetime NOT NULL DEFAULT current_timestamp(),
  `op_responsable` varchar(50) NOT NULL,
  `op_operativo` varchar(100) NOT NULL,
  `op_requiere` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `opcotizacion_servicio`
--

INSERT INTO `opcotizacion_servicio` (`op_id`, `op_codigo`, `op_ot`, `op_cot`, `op_cliente`, `op_asignado`, `op_entrega`, `op_estado`, `op_pago`, `op_direccion`, `op_creacion`, `op_moneda`, `op_fechaActual`, `op_responsable`, `op_operativo`, `op_requiere`) VALUES
(37, 'OP-103', 'OT-101', 'COT-109', 'empresa ', 'Yonatan Vigilio ', '10 dias', 'Aprobado', 'Contado', 'Jr. Plaza 343. Puente Piedra', '2021-11-06 22:20:49', 'Dolares', '2021-11-07 06:40:00', 'Rome', 'Detalle Operativo', 'Requiere'),
(38, 'OP-104', 'OT-101', 'COT-109', 'empresa ', 'Yonatan Vigilio ', '10 dias', 'Aprobado', 'Contado', 'Jr. Plaza 343. Puente Piedra', '2021-11-06 22:20:49', 'Dolares', '2021-11-07 06:42:37', 'Rome', 'Detalle Operativo', 'Requiere'),
(39, 'OP-105', 'OT-101', 'COT-109', 'empresa ', 'Yonatan Vigilio ', '10 dias', 'Aprobado', 'Contado', 'Jr. Plaza 343. Puente Piedra', '2021-11-06 22:20:49', 'Dolares', '2021-11-07 07:02:08', 'Rome', 'Detalle Operativo', 'Requiere'),
(40, 'OP-106', 'OT-102', 'COT-104', 'cliente3 ', 'Yonatan Vigilio ', '15 dias', 'Aprobado', '10 dias', 'Mz u3 lt 17', '2021-11-03 21:58:24', 'Dolares', '2021-11-07 07:04:04', 'Ericka', 'Detalle Operativo', 'Requiere'),
(41, 'OP-107', 'OT-104', 'COT-110', 'empresa', 'Yonatan Vigilio', '10 dias', 'Aprobado', '10 dias', 'Jr. Plaza 343. Puente Piedra', '2021-11-07 22:30:33', 'Euro', '2021-11-07 22:33:02', 'Rome', 'Detalle Operativo', 'Requiere'),
(42, 'OP-108', 'OT-108', 'COT-111', 'cliente6 ', 'Yonatan Vigilio ', '15 dias', 'Aprobado', '10 dias', 'en su casa xd', '2021-11-10 04:18:51', 'Dolares', '2021-11-10 04:27:16', 'Laura', 'operacionesxd', 'requierexd'),
(43, 'OP-109', 'OT-108', 'COT-111', 'cliente6 ', 'Yonatan Vigilio ', '15 dias', 'Aprobado', '10 dias', 'en su casa xd', '2021-11-10 04:18:51', 'Dolares', '2021-11-10 04:28:06', 'Laura', 'operacionesxd', 'requierexd'),
(44, 'OP-110', 'OT-109', 'COT-112', 'Cliente3 ', 'Yonatan Vigilio ', '15 dias', 'Aprobado', '10 dias', 'Mz u3 lt 17', '2021-11-11 06:49:24', 'Dolares', '2021-11-11 06:51:29', 'Ericka', 'Estos son las operaciones', 'No requiere');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opcotizacion_servicio2`
--

CREATE TABLE `opcotizacion_servicio2` (
  `op2_id` int(11) NOT NULL,
  `op2_cod` varchar(15) NOT NULL,
  `op2_cot` varchar(50) NOT NULL,
  `op2_nombre` varchar(50) NOT NULL,
  `op2_nota` varchar(250) NOT NULL,
  `op2_cantidad` int(11) NOT NULL,
  `op2_observaciones` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `opcotizacion_servicio2`
--

INSERT INTO `opcotizacion_servicio2` (`op2_id`, `op2_cod`, `op2_cot`, `op2_nombre`, `op2_nota`, `op2_cantidad`, `op2_observaciones`) VALUES
(1, '', 'OT-5', 'Limpieza de pc', '4', 5, 'xd'),
(30, 'OP-103', 'COT-109', 'Reparacion de mouse Gamers', 'nota1', 4, 'observacion1'),
(31, 'OP-103', 'COT-109', 'Limpieza de pc', 'nota2', 5, 'observacion2'),
(32, 'OP-104', 'COT-109', 'Reparacion de mouse Gamers', 'nota1', 4, 'observacion1'),
(33, 'OP-104', 'COT-109', 'Limpieza de pc', 'nota2', 5, 'observacion2'),
(34, 'OP-105', 'COT-109', 'Reparacion de mouse Gamers', 'nota1', 4, 'observacion1'),
(35, 'OP-105', 'COT-109', 'Limpieza de pc', 'nota2', 5, 'observacion2'),
(36, 'OP-106', 'COT-104', 'Reparacion de mouse Gamers', 'nota1', 4, 'o1'),
(37, 'OP-106', 'COT-104', 'Limpieza de pc', 'nota2', 3, 'o2'),
(38, 'OP-106', 'COT-104', 'Instalacion de Programas', 'nota4', 4, 'o3'),
(39, 'OP-107', 'COT-110', 'Reparacion de mouse Gamers', 'nota1', 4, 'observ1'),
(40, 'OP-107', 'COT-110', 'Mantenimiento de Cpu', 'nota2', 5, 'observ2'),
(41, 'OP-107', 'COT-110', 'Limpieza de pc', 'nota3', 6, 'observ3'),
(42, 'OP-108', 'COT-111', 'Limpieza de pc', 'nota1', 1, 'observ1'),
(43, 'OP-108', 'COT-111', 'Mantenimiento de Cpu', 'nota2', 2, 'observ2'),
(44, 'OP-108', 'COT-111', 'Reparacion de mouse Gamers', 'nota3', 5, 'observ3'),
(45, 'OP-108', 'COT-111', 'Instalacion de Programas', 'nota4', 4, 'observ4'),
(46, 'OP-109', 'COT-111', 'Limpieza de pc', 'nota1', 1, 'observ1'),
(47, 'OP-109', 'COT-111', 'Mantenimiento de Cpu', 'nota2', 2, 'observ2'),
(48, 'OP-109', 'COT-111', 'Reparacion de mouse Gamers', 'nota3', 5, 'observ3'),
(49, 'OP-109', 'COT-111', 'Instalacion de Programas', 'nota4', 4, 'observ4'),
(50, 'OP-110', 'COT-112', 'Limpieza de pc', 'nota 1 ', 5, 'O1'),
(51, 'OP-110', 'COT-112', 'Mantenimiento de Cpu', 'nota 2', 7, 'O2'),
(52, 'OP-110', 'COT-112', 'Reparacion de mouse Gamers', 'nota 3', 8, 'O3');

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
-- Estructura de tabla para la tabla `otcotizacion_servicio`
--

CREATE TABLE `otcotizacion_servicio` (
  `ot_id` int(11) NOT NULL,
  `ot_codigo` varchar(50) NOT NULL,
  `ot_cot` varchar(50) NOT NULL,
  `ot_cliente` varchar(50) NOT NULL,
  `ot_asignado` varchar(50) NOT NULL,
  `ot_estado` varchar(50) NOT NULL,
  `ot_pago` varchar(20) NOT NULL,
  `ot_moneda` varchar(20) NOT NULL,
  `ot_entrega` varchar(20) NOT NULL,
  `ot_expira` varchar(50) NOT NULL,
  `ot_direccion` varchar(50) NOT NULL,
  `ot_fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `ot_codserv` varchar(50) NOT NULL,
  `ot_servicio` varchar(100) NOT NULL,
  `ot_nota` varchar(100) NOT NULL,
  `ot_cantidad` int(11) NOT NULL,
  `ot_observaciones` varchar(100) NOT NULL,
  `ot_tecnico` varchar(50) NOT NULL,
  `ot_operativo` varchar(50) NOT NULL,
  `ot_requiere` varchar(100) NOT NULL,
  `ot_fechaEdit` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `otcotizacion_servicio`
--

INSERT INTO `otcotizacion_servicio` (`ot_id`, `ot_codigo`, `ot_cot`, `ot_cliente`, `ot_asignado`, `ot_estado`, `ot_pago`, `ot_moneda`, `ot_entrega`, `ot_expira`, `ot_direccion`, `ot_fecha`, `ot_codserv`, `ot_servicio`, `ot_nota`, `ot_cantidad`, `ot_observaciones`, `ot_tecnico`, `ot_operativo`, `ot_requiere`, `ot_fechaEdit`) VALUES
(80, 'OT-100', 'COT-107', 'empresa ', 'Yonatan Vigilio ', 'Aprobado', '10 dias', 'Dolares', '15 dias', '15 dias', 'Jr. Plaza 343. Puente Piedra', '2021-11-06 07:39:07', '', 'Limpieza de pc', '4', 5, 'limpieza', 'Rome', 'Detalle Operativo', 'Requiere', '2021-11-06 08:23:35'),
(101, 'OT-101', 'COT-109', 'empresa ', 'Yonatan Vigilio ', 'Aprobado', 'Contado', 'Dolares', '10 dias', '10 dias', 'Jr. Plaza 343. Puente Piedra', '2021-11-06 22:20:49', '', '', '', 0, '', 'Rome', 'Detalle Operativo', 'Requiere', '2021-11-07 06:39:56'),
(102, 'OT-102', 'COT-104', 'cliente3 ', 'Yonatan Vigilio ', 'Aprobado', '10 dias', 'Dolares', '15 dias', '15 dias', 'Mz u3 lt 17', '2021-11-03 21:58:24', '', '', '', 0, '', 'Ericka', 'Detalle Operativo', 'Requiere', '2021-11-07 07:03:31'),
(103, 'OT-103', 'COT-110', 'empresa', 'Yonatan Vigilio', 'Aprobado', '10 dias', 'Euro', '10 dias', '15 dias', 'Jr. Plaza 343. Puente Piedra', '2021-11-07 22:30:33', '', 'Limpieza de pc', 'nota3', 6, 'observ3', 'Ericka', 'detalle', 'requiere', '2021-11-07 22:31:49'),
(104, 'OT-104', 'COT-110', 'empresa', 'Yonatan Vigilio', 'Aprobado', '10 dias', 'Euro', '10 dias', '15 dias', 'Jr. Plaza 343. Puente Piedra', '2021-11-07 22:30:33', '', '', '', 0, '', 'Rome', 'Detalle Operativo', 'Requiere', '2021-11-07 22:32:24'),
(105, 'OT-105', 'COT-110', 'empresa', 'Yonatan Vigilio', 'Aprobado', '10 dias', 'Euro', '10 dias', '15 dias', 'Jr. Plaza 343. Puente Piedra', '2021-11-07 22:30:33', '', '', '', 0, '', 'Rome', 'Detalle Operativo', 'Requiere', '2021-11-07 22:36:39'),
(106, 'OT-106', 'COT-110', 'empresa', 'Yonatan Vigilio', 'Aprobado', '10 dias', 'Euro', '10 dias', '15 dias', 'Jr. Plaza 343. Puente Piedra', '2021-11-07 22:30:33', '', '', '', 0, '', 'Rome', 'Detalle Operativo', 'Requiere', '2021-11-09 15:25:01'),
(107, 'OT-107', 'COT-111', 'cliente6 ', 'Yonatan Vigilio ', 'Aprobado', '10 dias', 'Dolares', '15 dias', '20 dias', 'en su casa xd', '2021-11-10 04:18:51', '', '', '', 0, '', 'Rome', 'Detalles Operativos', 'requiere', '2021-11-10 04:22:42'),
(108, 'OT-108', 'COT-111', 'cliente6 ', 'Yonatan Vigilio ', 'Aprobado', '10 dias', 'Dolares', '15 dias', '20 dias', 'en su casa xd', '2021-11-10 04:18:51', '', '', '', 0, '', 'Laura', 'operacionesxd', 'requierexd', '2021-11-10 04:26:21'),
(109, 'OT-109', 'COT-112', 'Cliente3 ', 'Yonatan Vigilio ', 'Aprobado', '10 dias', 'Dolares', '15 dias', '15 dias', 'Mz u3 lt 17', '2021-11-11 06:49:24', '', '', '', 0, '', 'Ericka', 'Estos son las operaciones', 'No requiere', '2021-11-11 06:51:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otcotizacion_servicio2`
--

CREATE TABLE `otcotizacion_servicio2` (
  `ot2_id` int(11) NOT NULL,
  `ot2_cod` varchar(15) NOT NULL,
  `ot2_cot` varchar(50) NOT NULL,
  `ot2_codserv` varchar(50) NOT NULL,
  `ot2_nombre` varchar(50) NOT NULL,
  `ot2_nota` varchar(250) NOT NULL,
  `ot2_cantidad` int(11) NOT NULL,
  `ot2_observaciones` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `otcotizacion_servicio2`
--

INSERT INTO `otcotizacion_servicio2` (`ot2_id`, `ot2_cod`, `ot2_cot`, `ot2_codserv`, `ot2_nombre`, `ot2_nota`, `ot2_cantidad`, `ot2_observaciones`) VALUES
(48, 'OT-115', 'COT-106', 'SER-102', 'Limpieza de pc', 'nota1', 1, ''),
(49, 'OT-115', 'COT-106', 'SER-103', 'Mantenimiento de Cpu', 'nota2', 2, ''),
(50, 'OT-115', 'COT-106', 'SER-105', 'Instalacion de Programas', 'dsd', 4, ''),
(95, 'OT-101', 'COT-109', '', 'Reparacion de mouse Gamers', 'nota1', 4, 'observacion1'),
(96, 'OT-101', 'COT-109', '', 'Limpieza de pc', 'nota2', 5, 'observacion2'),
(97, 'OT-102', 'COT-104', '', 'Reparacion de mouse Gamers', 'nota1', 4, 'o1'),
(98, 'OT-102', 'COT-104', '', 'Limpieza de pc', 'nota2', 3, 'o2'),
(99, 'OT-102', 'COT-104', '', 'Instalacion de Programas', 'nota4', 4, 'o3'),
(100, 'OT-104', 'COT-110', '', 'Reparacion de mouse Gamers', 'nota1', 4, 'observ1'),
(101, 'OT-104', 'COT-110', '', 'Mantenimiento de Cpu', 'nota2', 5, 'observ2'),
(102, 'OT-104', 'COT-110', '', 'Limpieza de pc', 'nota3', 6, 'observ3'),
(103, 'OT-105', 'COT-110', '', 'Reparacion de mouse Gamers', 'nota1', 4, 'fgfg'),
(104, 'OT-105', 'COT-110', '', 'Mantenimiento de Cpu', 'nota2', 5, 'fgfg'),
(105, 'OT-105', 'COT-110', '', 'Limpieza de pc', 'nota3', 6, 'fgfgfg'),
(106, 'OT-106', 'COT-110', '', 'Reparacion de mouse Gamers', 'nota1', 4, 'ob1'),
(107, 'OT-106', 'COT-110', '', 'Mantenimiento de Cpu', 'nota2', 5, 'ob2'),
(108, 'OT-106', 'COT-110', '', 'Limpieza de pc', 'nota3', 6, 'ob3'),
(109, 'OT-107', 'COT-111', '', 'Limpieza de pc', 'nota1', 1, 'observacion1'),
(110, 'OT-107', 'COT-111', '', 'Mantenimiento de Cpu', 'nota2', 2, 'observacion2'),
(111, 'OT-107', 'COT-111', '', 'Reparacion de mouse Gamers', 'nota3', 5, 'observacion3'),
(112, 'OT-107', 'COT-111', '', 'Instalacion de Programas', 'nota4', 4, 'observacion4'),
(113, 'OT-108', 'COT-111', '', 'Limpieza de pc', 'nota1', 1, 'observ1'),
(114, 'OT-108', 'COT-111', '', 'Mantenimiento de Cpu', 'nota2', 2, 'observ2'),
(115, 'OT-108', 'COT-111', '', 'Reparacion de mouse Gamers', 'nota3', 5, 'observ3'),
(116, 'OT-108', 'COT-111', '', 'Instalacion de Programas', 'nota4', 4, 'observ4'),
(117, 'OT-109', 'COT-112', '', 'Limpieza de pc', 'nota 1 ', 5, 'O1'),
(118, 'OT-109', 'COT-112', '', 'Mantenimiento de Cpu', 'nota 2', 7, 'O2'),
(119, 'OT-109', 'COT-112', '', 'Reparacion de mouse Gamers', 'nota 3', 8, 'O3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pie_pagina`
--

CREATE TABLE `pie_pagina` (
  `id_pie` int(11) NOT NULL,
  `texto_pie` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pie_pagina`
--

INSERT INTO `pie_pagina` (`id_pie`, `texto_pie`) VALUES
(0, 'Telef: 01-05440920342423434');

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
(11, 'PRO-103', 234467890, 'proovedor4', 'Mz u3 lt 21 - puente piedra', 'Marco', 956345346, 956456733, 'proovedor4@gmail.com', 'proovedor4@gmail.com', 'www.proovedor4.com', 'Ventas', 'Neutro', 'Yonatan'),
(16, 'PRO-104', 235435443, 'proveedor5', 'en su casa', 'Jaime', 956345345, 953452674, 'proveedor5@gmail.com', 'proveedor52@gmail.com', 'www.FACEBOOK.com', '', 'activo', '');

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
  `servicio_foto` text NOT NULL,
  `servicio_tipo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`servicio_id`, `servicio_cod`, `servicio_nombre`, `servicio_desc`, `servicio_mat`, `servicio_disponibles`, `servicio_pventa`, `servicio_categoria`, `servicio_estado`, `servicio_proveedor`, `servicio_foto`, `servicio_tipo`) VALUES
(52, 'SER-102', 'Limpieza de pc', 'Limpiamos tu pc y liberación de virus', 'Antivirus', 1, '20', 'Soporte Técnico', 1, 'Proovedor2       ', 'limpieza.jpg', 1),
(55, 'SER-103', 'Mantenimiento de Cpu', 'Para tener una limpia pc, necesitas un buen mantenimiento de CPU.\r\nCon nuestro servicio te aseguramos una buena limpieza.', 'nada', 2, '40', 'Soporte Técnico', 1, 'Proovedor2  ', 'Mantenimiento-PC.jpg', 1),
(56, 'SER-104', 'Reparacion de mouse Gamers', 'Reparamos mouse', 'destornillador', 3, '14', 'Soporte Técnico', 1, 'Proovedor3   ', 'maxresdefault.jpg', 0),
(57, 'SER-105', 'Instalacion de Programas', 'Instalamos programas para tu pc.\r\nAntivirus\r\nProgramas para estudios\r\nProgramas de edicion\r\netc', 'noc', 2, '50', 'Redes', 1, 'Proovedor3 ', 'instalacion.jpg', 0);

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
  `user_nacimiento` date NOT NULL DEFAULT current_timestamp(),
  `user_foto` varchar(100) NOT NULL,
  `user_direccion` text NOT NULL,
  `user_telefono` int(20) NOT NULL,
  `user_rol` varchar(20) NOT NULL DEFAULT 'guest',
  `cargo_id` int(10) NOT NULL,
  `user_ingreso` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `user_cod_empleado`, `user_ip`, `user_nombre`, `user_apellido`, `user_estado`, `user_dni`, `user_correo`, `user_contraseña`, `user_nacimiento`, `user_foto`, `user_direccion`, `user_telefono`, `user_rol`, `cargo_id`, `user_ingreso`) VALUES
(84, 'USU-100', '::1', 'Yonatan Vigilio', 'Vigilio Lavado', 1, 70602063, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2021-11-12', 'img_CB56ADDB03464AD5804E06CB1826645D.2019.11.08.11.51.06.jpg', 'MZ U3 LT 17 - PUENTE PIEDRA', 968662473, '5', 0, '2021-11-13 00:41:15'),
(85, 'USU-101', '::1', 'Rome', 'In silver', 1, 9459448, 'rome@gmail.com', '60d99e58d66a5e0f4f89ec3ddd1d9a80', '2021-11-12', 'artworks-Hj7CPjY6pMuIj8t8-7NBKSA-t500x500.jpg', 'en su casa', 939337843, '2', 0, '2021-11-13 00:41:15'),
(86, 'USU-102', '::1', 'Jesus', 'Muñoz', 0, 8938832, 'jesus@gmail.com', '110d46fcd978c24f306cd7fa23464d73', '2021-11-12', 'avatars-000315108724-vg19ut-t500x500.jpg', 'en su casa', 484848423, '5', 0, '2021-11-13 00:41:15'),
(88, 'USU-103', '::1', 'Jesús', 'Muñoz', 1, 3442342, 'hola@gmail.com', '4d186321c1a7f0f354b297e8914ab240', '2021-11-12', 'gatito-cesped_0.jpg', 'en su casa', 46526264, '14', 0, '2021-11-13 00:41:15'),
(89, 'USU-104', '::1', 'Lucas', 'Vigilio Lavado', 0, 70602063, 'lucas@gmail.com', 'dc53fc4f621c80bdc2fa0329a6123708', '2021-11-12', 'jrulzejt5j451.jpg', 'en su casa', 968662473, '9', 0, '2021-11-13 00:41:15'),
(91, 'USU-105', '::1', 'Elmer', 'Vigilio Lavado', 0, 94939843, 'Elmer@gmail.com', '2ed04acfdc51e5dc36b8e79c1ed44455', '2021-11-12', '5509a6db-3bb0-456d-b24c-5f40b4574894.jpg', 'en su casa', 93939345, '11', 0, '2021-11-13 00:41:15'),
(92, 'USU-106', '::1', 'Ericka', 'Enriquez', 1, 8383839, 'ericka@gmail.com', '9199a71a523314906ddd3a7fb56ca122', '2021-11-12', 'Prog15.jpg', 'en su casa', 93938383, '2', 0, '2021-11-13 00:41:15'),
(93, 'USU-107', '::1', 'Laura', 'Bhrem', 0, 8383838, 'laura@gmail.com', '680e89809965ec41e64dc7e447f175ab', '2021-11-12', 'artworks-000087041952-9t30i4-t500x500.jpg', 'en su casa', 9292929, '7', 0, '2021-11-13 00:41:15'),
(97, 'USU-108', '::1', 'Grant', 'Bowtie', 1, 3854856, 'grant@gmail.com', '64fad28965d003cde964ea3016e257a3', '2021-11-12', 'artworks-000391130829-9dd4jx-t500x500.jpg', 'en su casa', 9349388, '8', 0, '2021-11-13 00:41:15'),
(98, 'USU-109', '::1', 'Falcon', 'Funk', 0, 9398838, 'falcon@gmail.com', 'fa0d1a60ef6616bb28038515c8ea4cb2', '2021-11-12', 'DqjbsSUWkAAxI2B.jpg', 'en su casa', 93983838, '5', 0, '2021-11-13 00:41:15'),
(101, 'USU-110', '::1', 'Jorge cliente', 'Vigilio Lavado', 1, 2314523, 'cliente1@gmail.com', '4983a0ab83ed86e0e7213c8783940193', '2021-11-12', 'sHLi1Z7r_400x400.jpg', 'en su casa', 93938223, '17', 0, '2021-11-13 00:41:15'),
(102, 'USU-111', '::1', 'Jesús', 'wdwd', 1, 3424525, 'jesus2@gmail.com', '7946959fb6d7957f4ec09c0aecebf382', '2021-11-12', '91319.jpg', 'en su casa', 3424342, '17', 0, '2021-11-13 00:41:15'),
(103, 'USU-112', '::1', 'Mateo', 'Gomez', 0, 3432546, 'mateo@gmail.com', '5b4c6f05e39f90fcebd51be99338c42e', '2021-11-12', '1.jpg', 'en su casa', 994563456, '1', 0, '2021-11-13 00:41:15'),
(104, 'USU-113', '::1', 'JesusMuñoz', 'Muñoz', 1, 3424525, 'jesusm@gmail.com', 'b8e993f73151de2e3d72fea8c3c7250c', '1994-04-10', '2.jpg', 'en su casa', 2147483647, '1', 0, '2021-11-13 00:41:15'),
(105, 'USU-114', '::1', 'Yonatan', 'Vigilio Lavado', 1, 70602063, 'vigilio@gmail.com', '3b57a1b866d2ab42769474b498039c86', '1998-10-21', 'gato-ksgH--984x468@Las Provincias.jpg', 'en su casa', 968662473, '1', 0, '2021-11-13 00:41:55'),
(106, 'USU-115', '::1', 'Naomi', 'Ramirez2', 1, 1234556788, 'ramirez2@gmail.com', '9f5cbf232cd3b8667024266c6f895c8c', '1999-05-02', '58956274_303.jpg', 'en su departamenteo', 99999999, '1', 0, '2021-11-13 00:50:21'),
(108, 'USU-116', '::1', 'Vincent', 'Ramirez Lopez', 1, 32432525, 'vincent@gmail.com', 'b15ab3f829f0f897fe507ef548741afb', '2002-02-21', '2.png', 'en su casa', 2147483647, '9', 0, '2021-11-20 01:46:44');

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
(3, '20 dias');

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
(3, '20 dias');

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
(1, 'Contado'),
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
-- Indices de la tabla `compra_servicio`
--
ALTER TABLE `compra_servicio`
  ADD PRIMARY KEY (`compra_id`);

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD PRIMARY KEY (`cot_id`);

--
-- Indices de la tabla `cotizacion_estado`
--
ALTER TABLE `cotizacion_estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `cotizacion_expira`
--
ALTER TABLE `cotizacion_expira`
  ADD PRIMARY KEY (`cotizacion_id`);

--
-- Indices de la tabla `cotizacion_moneda`
--
ALTER TABLE `cotizacion_moneda`
  ADD PRIMARY KEY (`cotizacion_id`);

--
-- Indices de la tabla `cotizacion_pago`
--
ALTER TABLE `cotizacion_pago`
  ADD PRIMARY KEY (`id_cotizacion`);

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
-- Indices de la tabla `igv`
--
ALTER TABLE `igv`
  ADD PRIMARY KEY (`igv_id`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`id_ingresos`);

--
-- Indices de la tabla `ingresos_almacen`
--
ALTER TABLE `ingresos_almacen`
  ADD PRIMARY KEY (`id_ingresos`);

--
-- Indices de la tabla `ingresos_categorias`
--
ALTER TABLE `ingresos_categorias`
  ADD PRIMARY KEY (`id_ingresos`);

--
-- Indices de la tabla `ingresos_fabricante`
--
ALTER TABLE `ingresos_fabricante`
  ADD PRIMARY KEY (`id_ingresos`);

--
-- Indices de la tabla `ingresos_lote`
--
ALTER TABLE `ingresos_lote`
  ADD PRIMARY KEY (`id_ingresos`);

--
-- Indices de la tabla `ingresos_modelo`
--
ALTER TABLE `ingresos_modelo`
  ADD PRIMARY KEY (`id_ingresos`);

--
-- Indices de la tabla `ingresos_salida`
--
ALTER TABLE `ingresos_salida`
  ADD PRIMARY KEY (`id_salida`);

--
-- Indices de la tabla `ingresos_um`
--
ALTER TABLE `ingresos_um`
  ADD PRIMARY KEY (`id_ingresos`);

--
-- Indices de la tabla `oc_cliente`
--
ALTER TABLE `oc_cliente`
  ADD PRIMARY KEY (`oc_id`);

--
-- Indices de la tabla `oc_proveedor`
--
ALTER TABLE `oc_proveedor`
  ADD PRIMARY KEY (`ocp_id`);

--
-- Indices de la tabla `oc_proveedortabla`
--
ALTER TABLE `oc_proveedortabla`
  ADD PRIMARY KEY (`ocp_id`);

--
-- Indices de la tabla `oc_proveedortabla2`
--
ALTER TABLE `oc_proveedortabla2`
  ADD PRIMARY KEY (`ocp2_id`);

--
-- Indices de la tabla `oc_proveedor_estado`
--
ALTER TABLE `oc_proveedor_estado`
  ADD PRIMARY KEY (`ocp_id`);

--
-- Indices de la tabla `opcotizacion_servicio`
--
ALTER TABLE `opcotizacion_servicio`
  ADD PRIMARY KEY (`op_id`);

--
-- Indices de la tabla `opcotizacion_servicio2`
--
ALTER TABLE `opcotizacion_servicio2`
  ADD PRIMARY KEY (`op2_id`);

--
-- Indices de la tabla `otcotizacion_servicio`
--
ALTER TABLE `otcotizacion_servicio`
  ADD PRIMARY KEY (`ot_id`);

--
-- Indices de la tabla `otcotizacion_servicio2`
--
ALTER TABLE `otcotizacion_servicio2`
  ADD PRIMARY KEY (`ot2_id`);

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
  MODIFY `Id_cliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `cliente_area`
--
ALTER TABLE `cliente_area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `cliente_estado`
--
ALTER TABLE `cliente_estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `compra_servicio`
--
ALTER TABLE `compra_servicio`
  MODIFY `compra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  MODIFY `cot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `cotizacion_estado`
--
ALTER TABLE `cotizacion_estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `cotizacion_expira`
--
ALTER TABLE `cotizacion_expira`
  MODIFY `cotizacion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cotizacion_moneda`
--
ALTER TABLE `cotizacion_moneda`
  MODIFY `cotizacion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cotizacion_pago`
--
ALTER TABLE `cotizacion_pago`
  MODIFY `id_cotizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cotizacion_servicio`
--
ALTER TABLE `cotizacion_servicio`
  MODIFY `id_cotser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1061;

--
-- AUTO_INCREMENT de la tabla `cotizacion_servicio2`
--
ALTER TABLE `cotizacion_servicio2`
  MODIFY `id_cotser2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT de la tabla `igv`
--
ALTER TABLE `igv`
  MODIFY `igv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `id_ingresos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `ingresos_almacen`
--
ALTER TABLE `ingresos_almacen`
  MODIFY `id_ingresos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ingresos_categorias`
--
ALTER TABLE `ingresos_categorias`
  MODIFY `id_ingresos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ingresos_fabricante`
--
ALTER TABLE `ingresos_fabricante`
  MODIFY `id_ingresos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ingresos_lote`
--
ALTER TABLE `ingresos_lote`
  MODIFY `id_ingresos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ingresos_modelo`
--
ALTER TABLE `ingresos_modelo`
  MODIFY `id_ingresos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ingresos_salida`
--
ALTER TABLE `ingresos_salida`
  MODIFY `id_salida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ingresos_um`
--
ALTER TABLE `ingresos_um`
  MODIFY `id_ingresos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `oc_cliente`
--
ALTER TABLE `oc_cliente`
  MODIFY `oc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `oc_proveedor`
--
ALTER TABLE `oc_proveedor`
  MODIFY `ocp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `oc_proveedortabla`
--
ALTER TABLE `oc_proveedortabla`
  MODIFY `ocp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT de la tabla `oc_proveedortabla2`
--
ALTER TABLE `oc_proveedortabla2`
  MODIFY `ocp2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT de la tabla `oc_proveedor_estado`
--
ALTER TABLE `oc_proveedor_estado`
  MODIFY `ocp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `opcotizacion_servicio`
--
ALTER TABLE `opcotizacion_servicio`
  MODIFY `op_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `opcotizacion_servicio2`
--
ALTER TABLE `opcotizacion_servicio2`
  MODIFY `op2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `otcotizacion_servicio`
--
ALTER TABLE `otcotizacion_servicio`
  MODIFY `ot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT de la tabla `otcotizacion_servicio2`
--
ALTER TABLE `otcotizacion_servicio2`
  MODIFY `ot2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `Id_proovedor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `rol_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `servicio_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT de la tabla `serv_categoria`
--
ALTER TABLE `serv_categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

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
