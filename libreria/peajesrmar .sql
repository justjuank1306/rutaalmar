-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-04-2023 a las 00:48:00
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
CREATE DATABASE IF NOT EXISTS `peajesrmar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `peajesrmar`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

DROP TABLE IF EXISTS `asistencia`;
CREATE TABLE `asistencia` (
  `Id_Asistencia` bigint(20) NOT NULL,
  `Id_Usuario` bigint(20) NOT NULL,
  `Id_Cargo` int(11) NOT NULL,
  `Id_Estacion` int(11) NOT NULL,
  `Fecha_hora_entrada` datetime NOT NULL DEFAULT current_timestamp(),
  `Dinero_Reportado` decimal(11,2) NOT NULL,
  `Fecha_hora_salida` datetime DEFAULT NULL,
  `Observaciones` varchar(250) DEFAULT NULL,
  `Id_Firma` int(11) NOT NULL,
  `Id_Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleteria`
--

DROP TABLE IF EXISTS `boleteria`;
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

DROP TABLE IF EXISTS `cajafuerte`;
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

DROP TABLE IF EXISTS `cajamenor`;
CREATE TABLE `cajamenor` (
  `Id_CajaMenor` bigint(20) NOT NULL,
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
-- Estructura de tabla para la tabla `cargo`
--

DROP TABLE IF EXISTS `cargo`;
CREATE TABLE `cargo` (
  `Id_Cargo` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Observaciones` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`Id_Cargo`, `Nombre`, `Observaciones`) VALUES
(1, 'Analista de Sistema', 'Analista de Sistema'),
(2, 'Jefe de Peaje', 'Administrador de peaje'),
(3, 'Recolectora', 'Recaudadora de peaje'),
(4, 'Supervisora', 'Supervisora de peaje');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combustible`
--

DROP TABLE IF EXISTS `combustible`;
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

DROP TABLE IF EXISTS `consignacion`;
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

DROP TABLE IF EXISTS `destino`;
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

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa` (
  `Id_Empresa` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`Id_Empresa`, `Nombre`) VALUES
(1, 'Corumar'),
(2, 'Corumar'),
(3, 'Serasis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

DROP TABLE IF EXISTS `equipo`;
CREATE TABLE `equipo` (
  `Id_Equipo` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Id_Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacion`
--

DROP TABLE IF EXISTS `estacion`;
CREATE TABLE `estacion` (
  `Id_Estacion` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `estacion`
--

INSERT INTO `estacion` (`Id_Estacion`, `Nombre`) VALUES
(1, 'La Apartada'),
(2, 'Los Manguitos'),
(3, 'San Carlos'),
(4, 'Purgatorio'),
(5, 'Los Cedros'),
(6, 'Mata de caña'),
(7, 'Caimanera'),
(8, 'San Onofre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

DROP TABLE IF EXISTS `estado`;
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
(2, 'Inactivo', 'Estado inactivo para operaciones del sistema');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `firma`
--

DROP TABLE IF EXISTS `firma`;
CREATE TABLE `firma` (
  `Id_Firma` int(11) NOT NULL,
  `Id_Usuario` bigint(20) NOT NULL,
  `Imagen` varchar(100) NOT NULL,
  `Id_Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fondorecambio`
--

DROP TABLE IF EXISTS `fondorecambio`;
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

DROP TABLE IF EXISTS `frecuencia`;
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
-- Estructura de tabla para la tabla `mantenimiento`
--

DROP TABLE IF EXISTS `mantenimiento`;
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

DROP TABLE IF EXISTS `novedad`;
CREATE TABLE `novedad` (
  `Id_Novedad` bigint(20) NOT NULL,
  `Fecha_Hora` datetime DEFAULT NULL,
  `Id_Usuario` bigint(20) NOT NULL,
  `Id_Empresa` int(11) NOT NULL,
  `Detalle` text DEFAULT NULL,
  `Id_Estacion` int(11) NOT NULL,
  `Id_Estado` int(11) NOT NULL,
  `Fecha_Creacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
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
  `Id_Estado` int(11) NOT NULL,
  `Fecha_Creacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

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
  ADD PRIMARY KEY (`Id_Cargo`);

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
  ADD PRIMARY KEY (`Id_Empresa`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`Id_Equipo`);

--
-- Indices de la tabla `estacion`
--
ALTER TABLE `estacion`
  ADD PRIMARY KEY (`Id_Estacion`);

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
  MODIFY `Id_Asistencia` bigint(20) NOT NULL AUTO_INCREMENT;

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
  MODIFY `Id_CajaMenor` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `Id_Cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `Id_Empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `Id_Equipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estacion`
--
ALTER TABLE `estacion`
  MODIFY `Id_Estacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `Id_Estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `firma`
--
ALTER TABLE `firma`
  MODIFY `Id_Firma` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `Id_Mantenimiento` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `novedad`
--
ALTER TABLE `novedad`
  MODIFY `Id_Novedad` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_Usuario` bigint(20) NOT NULL AUTO_INCREMENT;

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
