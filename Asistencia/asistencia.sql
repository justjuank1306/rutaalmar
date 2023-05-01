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


TABLE `usuario` (
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