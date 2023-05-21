-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2023 a las 20:46:41
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `peajesrmar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `Id_Asistencia` bigint(20) NOT NULL,
  `Id_Usuario` bigint(20) NOT NULL,
  `Id_Cargo` int(11) NOT NULL,
  `Id_Estacion` int(11) NOT NULL,
  `Fecha_hora_entrada` datetime NOT NULL DEFAULT current_timestamp(),
  `Dinero_Reportado` decimal(11,2) NOT NULL,
  `Fecha_hora_salida` datetime DEFAULT NULL,
  `Observaciones` varchar(250) DEFAULT NULL,
  `Id_Firma` int(11) DEFAULT NULL,
  `Id_Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`Id_Asistencia`, `Id_Usuario`, `Id_Cargo`, `Id_Estacion`, `Fecha_hora_entrada`, `Dinero_Reportado`, `Fecha_hora_salida`, `Observaciones`, `Id_Firma`, `Id_Estado`) VALUES
(1, 39, 12, 1, '2023-05-18 13:00:39', '5000.00', '0000-00-00 00:00:00', '', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleteria`
--

CREATE TABLE `boleteria` (
  `Id_Boleteria` bigint(20) NOT NULL,
  `Fecha_Hora` datetime DEFAULT NULL,
  `Boleta_Inicial` decimal(11,0) DEFAULT NULL,
  `Boleta_Final` decimal(11,0) DEFAULT NULL,
  `Entrada` decimal(11,0) DEFAULT NULL,
  `Salida` decimal(11,0) DEFAULT NULL,
  `Saldo` decimal(11,0) DEFAULT NULL,
  `Id_Estacion` int(11) NOT NULL,
  `Id_Destino` int(11) NOT NULL,
  `Id_Firma` int(11) NOT NULL,
  `Id_Estado` int(11) NOT NULL,
  `Observaciones` text DEFAULT NULL,
  `Fecha_Creacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajafuerte`
--

CREATE TABLE `cajafuerte` (
  `Id_Consignacion` bigint(20) NOT NULL,
  `Concesutivo` varchar(50) NOT NULL,
  `Fecha_Hora_Recaudo` datetime DEFAULT NULL,
  `Valor_Recaudado` decimal(11,2) DEFAULT NULL,
  `Valor_Sobrante` decimal(11,2) DEFAULT NULL,
  `Valor_Prepago` decimal(11,2) DEFAULT NULL,
  `Valor_Telepeaje` decimal(11,2) DEFAULT NULL,
  `Id_Destino` int(11) NOT NULL,
  `Id_Usuario_Registra` bigint(20) NOT NULL,
  `Id_Usuario_Deposita` bigint(20) NOT NULL,
  `Id_Estacion` int(11) NOT NULL,
  `Id_Estado` int(11) NOT NULL,
  `Observaciones` text DEFAULT NULL,
  `Fecha_Creacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajamenor`
--

CREATE TABLE `cajamenor` (
  `Id_CajaMenor` bigint(20) NOT NULL,
  `Fecha_Hora` date DEFAULT NULL,
  `Entrada` decimal(11,0) DEFAULT NULL,
  `Salida` decimal(11,0) DEFAULT NULL,
  `Saldo` decimal(11,0) DEFAULT NULL,
  `Concepto` varchar(50) DEFAULT NULL,
  `Id_Estacion` int(11) DEFAULT NULL,
  `Id_Firma` int(11) DEFAULT NULL,
  `Id_Estado` int(11) NOT NULL DEFAULT 1,
  `Observaciones` text DEFAULT NULL,
  `Fecha_Creacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `cajamenor`
--

INSERT INTO `cajamenor` (`Id_CajaMenor`, `Fecha_Hora`, `Entrada`, `Salida`, `Saldo`, `Concepto`, `Id_Estacion`, `Id_Firma`, `Id_Estado`, `Observaciones`, `Fecha_Creacion`) VALUES
(1, '2023-05-18', '1000000', '0', '1000000', 'Saldo inicial ', 1, 1, 1, 'prueba', '2023-05-18 11:07:30'),
(2, '2023-05-18', '40000', '0', '1400000', 'prueba444', 1, 1, 1, 'tttttttttttt', '2023-05-18 11:17:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `Id_Cargo` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Observaciones` varchar(250) DEFAULT NULL,
  `Id_Estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`Id_Cargo`, `Nombre`, `Observaciones`, `Id_Estado`) VALUES
(1, 'Analista de Sistema', 'Analista de Sistema', 1),
(2, 'Analista de Soporte', 'Analista de Soporte', 1),
(3, 'Auditoria', 'Auditoria', 1),
(4, 'Director', 'Director', 1),
(5, 'Gerente', 'Gerente', 1),
(6, 'Interventoria', 'Interventoria', 1),
(7, 'Jefe de Peaje', 'Jefe de Peaje', 1),
(8, 'Recolector', 'Recolector', 1),
(9, 'Residente Operativo', 'Residente Operativo', 1),
(10, 'Servicios Generales', 'Servicios Generales', 1),
(11, 'Sst', 'Sst', 1),
(12, 'Supervisor', 'Supervisor', 1),
(13, 'Tecnico de pesaje', 'Tecnico de pesaje', 1),
(14, 'Tecnico de peaje', 'Tecnico de peaje', 1),
(15, 'Vigilante', 'Vigilante', 1),
(16, 'Otros', 'Otros', 1),
(18, 'peluquero', NULL, 1),
(19, 'plomero', NULL, 1),
(20, 'rana', NULL, 1),
(21, 'plomeroest', NULL, 1),
(22, 'bodegeuero', NULL, 1),
(23, 'gerente ani', NULL, 1),
(24, 'estufero', NULL, 1),
(27, 'Secretaria general de la nacion', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combustible`
--

CREATE TABLE `combustible` (
  `Id_Mantenimiento` bigint(20) NOT NULL,
  `Fecha_Hora_Encendido` datetime DEFAULT NULL,
  `Fecha_Hora_Apagado` datetime DEFAULT NULL,
  `Horometro` decimal(11,2) DEFAULT NULL,
  `Valor_Compra` decimal(11,2) DEFAULT NULL,
  `Cantidad` varchar(50) DEFAULT NULL,
  `Observaciones` text DEFAULT NULL,
  `Id_Estacion` int(11) NOT NULL,
  `Id_Firma` int(11) NOT NULL,
  `Id_Estado` int(11) NOT NULL,
  `Fecha_Creacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consignacion`
--

CREATE TABLE `consignacion` (
  `Id_ConsignacionBanc` bigint(20) NOT NULL,
  `Numero` varchar(50) DEFAULT NULL,
  `Fecha_Recaudo` datetime DEFAULT NULL,
  `Fecha_Consignacion` datetime DEFAULT NULL,
  `Valor_Consignado` decimal(11,2) DEFAULT NULL,
  `Numero_Consignacion` varchar(50) DEFAULT NULL,
  `Concepto_Consignacion` text DEFAULT NULL,
  `Id_Estacion` int(11) NOT NULL,
  `Id_Usuario` bigint(20) NOT NULL,
  `Id_Firma` int(11) NOT NULL,
  `Id_Estado` int(11) NOT NULL,
  `Fecha_Creacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE `destino` (
  `Id_Destino` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `destino`
--

INSERT INTO `destino` (`Id_Destino`, `Nombre`) VALUES
(1, 'Carril01'),
(2, 'Carril02'),
(3, 'Carril03'),
(4, 'Carril04'),
(5, 'Carril05'),
(6, 'Carril06'),
(7, 'Carril07'),
(8, 'Carril08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `Id_Empresa` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Id_Estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`Id_Empresa`, `Nombre`, `Id_Estado`) VALUES
(1, 'Corumar', 1),
(2, 'Ani', 1),
(3, 'Serasis', 1),
(4, 'Condor', 1),
(5, 'Iegrupo', 1),
(6, 'Prometalicos', 1),
(7, 'Supertransporte', 1),
(8, 'Brinks', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `Id_Equipo` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Id_Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacion`
--

CREATE TABLE `estacion` (
  `Id_Estacion` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Id_Estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `estacion`
--

INSERT INTO `estacion` (`Id_Estacion`, `Nombre`, `Id_Estado`) VALUES
(1, 'La Apartada', 1),
(2, 'Los Manguitos', 1),
(3, 'San Carlos', 1),
(4, 'Purgatorio', 1),
(5, 'Los Cedros', 1),
(6, 'Mata de caña', 1),
(7, 'Caimanera', 1),
(8, 'San Onofre', 1),
(9, 'Bascula Manguitos1', 1),
(10, 'Bascula Manguitos2', 1),
(11, 'Bascula Mata de Caña1', 1),
(12, 'Bascula Mata de Caña2', 1),
(13, 'Bascula San Onofre1', 1),
(14, 'Bascula San Onofre2', 1),
(15, 'Otros', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `Id_Estado` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Observaciones` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`Id_Estado`, `Nombre`, `Observaciones`) VALUES
(1, 'Activo', 'Habilitado para realizar funciones '),
(2, 'Seguimiento', 'Estado seguimiento para operaciones del sistema'),
(3, 'Cerrado', 'estado de cierre de novedades'),
(4, 'In', 'En turno'),
(5, 'Out', 'Fuera de turno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `firma`
--

CREATE TABLE `firma` (
  `Id_Firma` int(11) NOT NULL,
  `Id_Usuario` bigint(20) NOT NULL,
  `Imagen` varchar(100) NOT NULL,
  `Id_Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `firma`
--

INSERT INTO `firma` (`Id_Firma`, `Id_Usuario`, `Imagen`, `Id_Estado`) VALUES
(1, 39, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fondorecambio`
--

CREATE TABLE `fondorecambio` (
  `Id_FondoRecambio` bigint(20) NOT NULL,
  `Fecha_Hora` datetime DEFAULT NULL,
  `Entrada` decimal(11,0) DEFAULT NULL,
  `Salida` decimal(11,0) DEFAULT NULL,
  `Saldo` decimal(11,0) DEFAULT NULL,
  `Concepto` varchar(50) DEFAULT NULL,
  `Id_Estacion` int(11) NOT NULL,
  `Id_Firma` int(11) NOT NULL,
  `Id_Estado` int(11) NOT NULL,
  `Observaciones` text DEFAULT NULL,
  `Fecha_Creacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `frecuencia`
--

CREATE TABLE `frecuencia` (
  `Id_Frecuencia` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `frecuencia`
--

INSERT INTO `frecuencia` (`Id_Frecuencia`, `Nombre`) VALUES
(1, 'Diario'),
(2, 'Semanal'),
(3, 'Mensual'),
(4, 'Trimestral'),
(5, 'Semestral'),
(6, 'Anual');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `huella`
--

CREATE TABLE `huella` (
  `id_huella` int(11) NOT NULL,
  `documento` varchar(20) NOT NULL,
  `nombre_dedo` varchar(20) DEFAULT NULL,
  `huella` longblob DEFAULT NULL,
  `imgHuella` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `huella_temp`
--

CREATE TABLE `huella_temp` (
  `id_huella_temp` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pc_serial` varchar(100) NOT NULL,
  `imghuella` longblob DEFAULT NULL,
  `huella` longblob DEFAULT NULL,
  `fecha_actualizacion` timestamp NULL DEFAULT NULL,
  `texto` varchar(100) DEFAULT NULL,
  `statusplantilla` varchar(100) DEFAULT NULL,
  `documento` varchar(20) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `dedo` varchar(20) DEFAULT NULL,
  `opc` varchar(20) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `Id_Mantenimiento` bigint(20) NOT NULL,
  `Fecha_Diligenciamiento` datetime DEFAULT NULL,
  `Descripcion_Evento` text DEFAULT NULL,
  `Elemento_Afectado` varchar(250) DEFAULT NULL,
  `Id_Equipo` int(11) NOT NULL,
  `Id_Frecuencia` int(11) NOT NULL,
  `Fecha_Hora_Falla` datetime DEFAULT NULL,
  `Fecha_Hora_Solucion` datetime DEFAULT NULL,
  `Accion_Correctiva` text DEFAULT NULL,
  `Id_Estacion` int(11) NOT NULL,
  `Id_Firma` int(11) NOT NULL,
  `Id_Estado` int(11) NOT NULL,
  `Fecha_Creacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedad`
--

CREATE TABLE `novedad` (
  `Id_Novedad` bigint(20) NOT NULL,
  `Id_Usuario` bigint(20) NOT NULL,
  `Id_Empresa` int(11) NOT NULL,
  `Detalle_Novedad` text DEFAULT NULL,
  `Detalle_Seguimiento` text NOT NULL,
  `Id_Estacion` int(11) NOT NULL,
  `Id_Estado` int(11) NOT NULL,
  `Fecha_Creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `Fecha_Seguimiento` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `novedad`
--

INSERT INTO `novedad` (`Id_Novedad`, `Id_Usuario`, `Id_Empresa`, `Detalle_Novedad`, `Detalle_Seguimiento`, `Id_Estacion`, `Id_Estado`, `Fecha_Creacion`, `Fecha_Seguimiento`) VALUES
(1, 1, 2, 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', 'Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las Respuesta letras, al contrario de usar textos como por ejemplo \"Contenido aquí, contenido aquí\". Estos textos hacen parecerlo un español que se puede leer. Muchos paquetes de autoedición y editores de páginas web usan el Lorem Ipsum como su texto por defecto, y al hacer una búsqueda de \"Lorem Ipsum\" va a dar por resultado muchos sitios web que usan este texto si se encuentran en estado de desarrollo. Muchas versiones han evolucionado a través de los años, algunas veces por accidente, otras veces a propósito (por ejemplo insertándole humor y cosas por el estilo).', 1, 3, '2023-05-18 12:17:49', '2023-05-18 12:29:16'),
(2, 32, 1, 'Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo \"Contenido aquí, contenido aquí\". Estos textos hacen parecerlo un español que se puede leer. Muchos paquetes de autoedición y editores de páginas web usan el Lorem Ipsum como su texto por defecto, y al hacer una búsqueda de \"Lorem Ipsum\" va a dar por resultado muchos sitios web que usan este texto si se encuentran en estado de desarrollo. Muchas versiones han evolucionado a través de los años, algunas veces por accidente, otras veces a propósito (por ejemplo insertándole humor y cosas por el estilo).', '', 1, 2, '2023-05-18 12:19:23', '2023-05-18 12:29:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id_Usuario` bigint(20) NOT NULL,
  `Nombre` varchar(80) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(75) NOT NULL,
  `Identificacion` varchar(30) DEFAULT NULL,
  `Id_Cargo` int(11) NOT NULL,
  `Id_Empresa` int(11) NOT NULL,
  `Id_Estacion` int(11) NOT NULL,
  `Id_Estado` int(11) NOT NULL DEFAULT 1,
  `Fecha_Creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `Huella` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_Usuario`, `Nombre`, `Apellido`, `Email`, `Password`, `Identificacion`, `Id_Cargo`, `Id_Empresa`, `Id_Estacion`, `Id_Estado`, `Fecha_Creacion`, `Huella`) VALUES
(1, 'Juan Carlos ', 'Tejada Monterroza', 'juan.tejada@rutaalmar.com', '12345', '10767388', 1, 1, 1, 1, '2023-04-22 00:00:00', ''),
(31, 'tesoro', 'escondido', 'tesor@rutaalmar.com', '12344123', '123456789', 3, 1, 2, 1, '2023-04-25 00:00:00', ''),
(32, 'Juan Manuel', 'Tejada Martinez', 'juanmanuel@rutaalamr.com', '123', '12345678910111213', 9, 1, 3, 1, '2023-04-25 00:00:00', ''),
(34, 'clara eugenia', 'sotomayor rico', 'clara.sotomayor@rutaalmar.com', '123456', '50910000', 7, 1, 1, 1, '2023-04-26 00:00:00', ''),
(38, 'SAMUEL', 'ALARCON', 'JUAN.JUAN@RUTAALAMR.COM', '12345', '1076738899', 1, 1, 1, 1, '2023-04-28 00:00:00', ''),
(39, 'Andrea Paola', 'Martinez Martinez', 'marnezan@marnezan.com', '123456789', '1067868267', 12, 1, 1, 1, '2023-04-29 00:00:00', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`Id_Asistencia`),
  ADD KEY `Fk_Id_Firma` (`Id_Firma`),
  ADD KEY `Fk_Id_Estado` (`Id_Estado`),
  ADD KEY `Fk_Id_Cargo` (`Id_Cargo`),
  ADD KEY `Fk_Id_Usuario` (`Id_Usuario`),
  ADD KEY `Fk_Id_Estacion` (`Id_Estacion`);

--
-- Indices de la tabla `boleteria`
--
ALTER TABLE `boleteria`
  ADD PRIMARY KEY (`Id_Boleteria`),
  ADD KEY `Fk_Id_Estacion` (`Id_Estacion`),
  ADD KEY `Fk_Id_Destino` (`Id_Destino`),
  ADD KEY `Fk_Id_Firma` (`Id_Firma`),
  ADD KEY `Fk_Id_Estado` (`Id_Estado`);

--
-- Indices de la tabla `cajafuerte`
--
ALTER TABLE `cajafuerte`
  ADD PRIMARY KEY (`Id_Consignacion`),
  ADD KEY `Fk_Id_Destino` (`Id_Destino`),
  ADD KEY `Fk_Id_UsuarioRegistra` (`Id_Usuario_Registra`),
  ADD KEY `Fk_Id_UsuarioDeposita` (`Id_Usuario_Deposita`),
  ADD KEY `Fk_Id_Estacion` (`Id_Estacion`),
  ADD KEY `Fk_Id_Estado` (`Id_Estado`);

--
-- Indices de la tabla `cajamenor`
--
ALTER TABLE `cajamenor`
  ADD PRIMARY KEY (`Id_CajaMenor`),
  ADD KEY `Fk_Id_Estacion` (`Id_Estacion`),
  ADD KEY `Fk_Id_Firma` (`Id_Firma`),
  ADD KEY `Fk_Id_Estado` (`Id_Estado`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`Id_Cargo`),
  ADD KEY `Fk_Id_Estado` (`Id_Estado`);

--
-- Indices de la tabla `combustible`
--
ALTER TABLE `combustible`
  ADD PRIMARY KEY (`Id_Mantenimiento`),
  ADD KEY `Fk_Id_Estado` (`Id_Estado`) USING BTREE,
  ADD KEY `Fk_Id_Estacion` (`Id_Estacion`),
  ADD KEY `Fk_Id_Firma` (`Id_Firma`);

--
-- Indices de la tabla `consignacion`
--
ALTER TABLE `consignacion`
  ADD PRIMARY KEY (`Id_ConsignacionBanc`),
  ADD KEY `Fk_Id_Estacion` (`Id_Estacion`),
  ADD KEY `Fk_Id_Usuario` (`Id_Usuario`),
  ADD KEY `Fk_Id_Firma` (`Id_Firma`),
  ADD KEY `Fk_Id_Estado` (`Id_Estado`);

--
-- Indices de la tabla `destino`
--
ALTER TABLE `destino`
  ADD PRIMARY KEY (`Id_Destino`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`Id_Empresa`),
  ADD KEY `Fk_Id_Estado` (`Id_Estado`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`Id_Equipo`);

--
-- Indices de la tabla `estacion`
--
ALTER TABLE `estacion`
  ADD PRIMARY KEY (`Id_Estacion`),
  ADD KEY `Fk_Id_Estado` (`Id_Estado`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`Id_Estado`);

--
-- Indices de la tabla `firma`
--
ALTER TABLE `firma`
  ADD PRIMARY KEY (`Id_Firma`),
  ADD KEY `Fk_Id_Usuario` (`Id_Usuario`) USING BTREE,
  ADD KEY `Fk_Id_Estado` (`Id_Estado`);

--
-- Indices de la tabla `fondorecambio`
--
ALTER TABLE `fondorecambio`
  ADD PRIMARY KEY (`Id_FondoRecambio`),
  ADD KEY `Fk_Id_Estacion` (`Id_Estacion`) USING BTREE,
  ADD KEY `Fk_Id_Firma` (`Id_Firma`),
  ADD KEY `Fk_Id_Estado` (`Id_Estado`);

--
-- Indices de la tabla `frecuencia`
--
ALTER TABLE `frecuencia`
  ADD PRIMARY KEY (`Id_Frecuencia`);

--
-- Indices de la tabla `huella`
--
ALTER TABLE `huella`
  ADD PRIMARY KEY (`id_huella`);

--
-- Indices de la tabla `huella_temp`
--
ALTER TABLE `huella_temp`
  ADD PRIMARY KEY (`id_huella_temp`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`Id_Mantenimiento`),
  ADD KEY `Fk_Id_Equipo` (`Id_Equipo`),
  ADD KEY `Fk_Id_Frecuencia` (`Id_Frecuencia`),
  ADD KEY `Fk_Id_Firma` (`Id_Firma`),
  ADD KEY `Fk_Id_Estacion` (`Id_Estacion`),
  ADD KEY `Fk_Id_Estado` (`Id_Estado`);

--
-- Indices de la tabla `novedad`
--
ALTER TABLE `novedad`
  ADD PRIMARY KEY (`Id_Novedad`),
  ADD KEY `Fk_Id_Usuario` (`Id_Usuario`),
  ADD KEY `Fk_Id_Empresa` (`Id_Empresa`),
  ADD KEY `Fk_Id_Estacion` (`Id_Estacion`),
  ADD KEY `Fk_Id_Estado` (`Id_Estado`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_Usuario`),
  ADD KEY `Fk_Id_Empresa` (`Id_Empresa`),
  ADD KEY `Fk_Id_Estacion` (`Id_Estacion`),
  ADD KEY `Fk_Id_Estado` (`Id_Estado`),
  ADD KEY `Fk_Id_Cargo` (`Id_Cargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `Id_Asistencia` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `boleteria`
--
ALTER TABLE `boleteria`
  MODIFY `Id_Boleteria` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cajafuerte`
--
ALTER TABLE `cajafuerte`
  MODIFY `Id_Consignacion` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cajamenor`
--
ALTER TABLE `cajamenor`
  MODIFY `Id_CajaMenor` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `Id_Cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `combustible`
--
ALTER TABLE `combustible`
  MODIFY `Id_Mantenimiento` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `consignacion`
--
ALTER TABLE `consignacion`
  MODIFY `Id_ConsignacionBanc` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `destino`
--
ALTER TABLE `destino`
  MODIFY `Id_Destino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `Id_Empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `Id_Equipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estacion`
--
ALTER TABLE `estacion`
  MODIFY `Id_Estacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `Id_Estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `firma`
--
ALTER TABLE `firma`
  MODIFY `Id_Firma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fondorecambio`
--
ALTER TABLE `fondorecambio`
  MODIFY `Id_FondoRecambio` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `frecuencia`
--
ALTER TABLE `frecuencia`
  MODIFY `Id_Frecuencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `huella`
--
ALTER TABLE `huella`
  MODIFY `id_huella` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `huella_temp`
--
ALTER TABLE `huella_temp`
  MODIFY `id_huella_temp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `Id_Mantenimiento` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `novedad`
--
ALTER TABLE `novedad`
  MODIFY `Id_Novedad` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_Usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`Id_Firma`) REFERENCES `firma` (`Id_Firma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asistencia_ibfk_2` FOREIGN KEY (`Id_Estado`) REFERENCES `estado` (`Id_Estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asistencia_ibfk_3` FOREIGN KEY (`Id_Cargo`) REFERENCES `cargo` (`Id_Cargo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asistencia_ibfk_4` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asistencia_ibfk_5` FOREIGN KEY (`Id_Estacion`) REFERENCES `estacion` (`Id_Estacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `boleteria`
--
ALTER TABLE `boleteria`
  ADD CONSTRAINT `boleteria_ibfk_1` FOREIGN KEY (`Id_Destino`) REFERENCES `destino` (`Id_Destino`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `boleteria_ibfk_2` FOREIGN KEY (`Id_Firma`) REFERENCES `firma` (`Id_Firma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `boleteria_ibfk_3` FOREIGN KEY (`Id_Estado`) REFERENCES `estado` (`Id_Estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `boleteria_ibfk_4` FOREIGN KEY (`Id_Estacion`) REFERENCES `estacion` (`Id_Estacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cajafuerte`
--
ALTER TABLE `cajafuerte`
  ADD CONSTRAINT `cajafuerte_ibfk_1` FOREIGN KEY (`Id_Estado`) REFERENCES `estado` (`Id_Estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cajafuerte_ibfk_2` FOREIGN KEY (`Id_Estacion`) REFERENCES `estacion` (`Id_Estacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cajafuerte_ibfk_3` FOREIGN KEY (`Id_Usuario_Registra`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cajafuerte_ibfk_4` FOREIGN KEY (`Id_Usuario_Deposita`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cajafuerte_ibfk_5` FOREIGN KEY (`Id_Destino`) REFERENCES `destino` (`Id_Destino`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cajamenor`
--
ALTER TABLE `cajamenor`
  ADD CONSTRAINT `cajamenor_ibfk_1` FOREIGN KEY (`Id_Estado`) REFERENCES `estado` (`Id_Estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cajamenor_ibfk_2` FOREIGN KEY (`Id_Firma`) REFERENCES `firma` (`Id_Firma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cajamenor_ibfk_3` FOREIGN KEY (`Id_Estacion`) REFERENCES `estacion` (`Id_Estacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `combustible`
--
ALTER TABLE `combustible`
  ADD CONSTRAINT `combustible_ibfk_1` FOREIGN KEY (`Id_Estado`) REFERENCES `estado` (`Id_Estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `combustible_ibfk_2` FOREIGN KEY (`Id_Firma`) REFERENCES `firma` (`Id_Firma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `combustible_ibfk_3` FOREIGN KEY (`Id_Estacion`) REFERENCES `estacion` (`Id_Estacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `consignacion`
--
ALTER TABLE `consignacion`
  ADD CONSTRAINT `consignacion_ibfk_1` FOREIGN KEY (`Id_Estado`) REFERENCES `estado` (`Id_Estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consignacion_ibfk_2` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consignacion_ibfk_3` FOREIGN KEY (`Id_Estacion`) REFERENCES `estacion` (`Id_Estacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consignacion_ibfk_4` FOREIGN KEY (`Id_Firma`) REFERENCES `firma` (`Id_Firma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `firma`
--
ALTER TABLE `firma`
  ADD CONSTRAINT `firma_ibfk_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `firma_ibfk_2` FOREIGN KEY (`Id_Estado`) REFERENCES `estado` (`Id_Estado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fondorecambio`
--
ALTER TABLE `fondorecambio`
  ADD CONSTRAINT `fondorecambio_ibfk_1` FOREIGN KEY (`Id_Estacion`) REFERENCES `estacion` (`Id_Estacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fondorecambio_ibfk_2` FOREIGN KEY (`Id_Estado`) REFERENCES `estado` (`Id_Estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fondorecambio_ibfk_3` FOREIGN KEY (`Id_Firma`) REFERENCES `firma` (`Id_Firma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD CONSTRAINT `mantenimiento_ibfk_1` FOREIGN KEY (`Id_Frecuencia`) REFERENCES `frecuencia` (`Id_Frecuencia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mantenimiento_ibfk_2` FOREIGN KEY (`Id_Equipo`) REFERENCES `equipo` (`Id_Equipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mantenimiento_ibfk_3` FOREIGN KEY (`Id_Estacion`) REFERENCES `estacion` (`Id_Estacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mantenimiento_ibfk_4` FOREIGN KEY (`Id_Firma`) REFERENCES `firma` (`Id_Firma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mantenimiento_ibfk_5` FOREIGN KEY (`Id_Estado`) REFERENCES `estado` (`Id_Estado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `novedad`
--
ALTER TABLE `novedad`
  ADD CONSTRAINT `novedad_ibfk_1` FOREIGN KEY (`Id_Estacion`) REFERENCES `estacion` (`Id_Estacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `novedad_ibfk_2` FOREIGN KEY (`Id_Estado`) REFERENCES `estado` (`Id_Estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `novedad_ibfk_3` FOREIGN KEY (`Id_Empresa`) REFERENCES `empresa` (`Id_Empresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `novedad_ibfk_4` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Id_Empresa`) REFERENCES `empresa` (`Id_Empresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`Id_Estado`) REFERENCES `estado` (`Id_Estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`Id_Estacion`) REFERENCES `estacion` (`Id_Estacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_5` FOREIGN KEY (`Id_Cargo`) REFERENCES `cargo` (`Id_Cargo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
