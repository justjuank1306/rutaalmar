SELECT TbCajamenor.Id_CajaMenor,TbCajamenor.Fecha_Hora,TbCajamenor.Entrada,TbCajamenor.Salida,TbCajamenor.Saldo,TbCajamenor.Concepto,TbUsuario.Nombre,TbCajamenor.Fecha_Creacion,TbEstacion.Nombre
FROM cajamenor TbCajamenor 
JOIN firma TbFirma ON TbCajamenor.Id_Firma = TbFirma.Id_Firma 
JOIN usuario TbUsuario ON TbFirma.Id_Usuario = TbUsuario.Id_Usuario 
JOIN estacion TbEstacion on TbCajamenor.Id_Estacion=TbEstacion.Id_Estacion
WHERE TbCajamenor.Id_Estado <> 0


SELECT Tbusuario.Id_Usuario,Tbusuario.Nombre,Tbusuario.Apellido,Tbusuario.Email,Tbusuario.Password,Tbusuario.Identificacion,Tbusuario.,Tbusuario.Fecha_Creacion,TbEstacion.Nombre
FROM cajamenor TbCajamenor 
JOIN firma TbFirma ON TbCajamenor.Id_Firma = TbFirma.Id_Firma 
JOIN usuario TbUsuario ON TbFirma.Id_Usuario = TbUsuario.Id_Usuario 
JOIN estacion TbEstacion on TbCajamenor.Id_Estacion=TbEstacion.Id_Estacion
WHERE TbCajamenor.Id_Estado <> 0


-- consulta libro de asistencia
SELECT TbAsistencia.Id_Asistencia,
                         TbAsistencia.Identificacion,
                         CONCAT(TbUsuario2.Nombre , ' - ',TbUsuario2.Apellido)As Nombre,
                         TbCargo.Nombre Cargo,
						 TbAsistencia.Tipo,
                         TbAsistencia.Fecha_Hora,
                         TbAsistencia.Dinero_Reportado,
                         CONCAT(TbUsuario.Nombre , ' - ',TbUsuario.Apellido)As Registrado_Por
                FROM asistenciav2 TbAsistencia
                JOIN usuario TbUsuario ON TbAsistencia.Id_Usuario = TbUsuario.Id_Usuario 
				JOIN usuario TbUsuario2 ON TbAsistencia.Identificacion = TbUsuario2.Identificacion 
                JOIN cargo TbCargo ON TbUsuario.Id_cargo = TbCargo.Id_cargo 
                JOIN empresa TbEmpresa ON TbUsuario.Id_Empresa = TbEmpresa.Id_Empresa
                JOIN estacion TbEstacion on TbUsuario.Id_Estacion = TbEstacion.Id_Estacion
                JOIN estado TbEstado on TbAsistencia.Id_Estado = TbEstado.Id_Estado
              WHERE TbAsistencia.Id_Estado <> 0


UPDATE asistenciav2 SET Id_Estado = '5', Dinero_Entregado = '5000', Salida = 'salida', firma_Salida = 'hgggggg' WHERE asistenciav2.Identificacion = '1067868267' and asistenciav2.Id_Estado = '4';              



SELECT
  TbEmpleado.Id_Empleado,
  TbEmpleado.Nombre,
  TbEmpleado.Apellido,
  TbEmpleado.Identificacion,
  TbCargo.Nombre Cargo,
  TbEmpresa.Nombre Empresa,
  TbEstacion.Nombre Estacion,
  TbEstado.Nombre Estado,
  TbEmpleado.Fecha_Creacion
  FROM empleado TbEmpleado
  JOIN cargo TbCargo ON TbEmpleado.Id_cargo = TbCargo.Id_cargo 
  JOIN empresa TbEmpresa ON TbEmpleado.Id_Empresa = TbEmpresa.Id_Empresa
  JOIN estacion TbEstacion on TbEmpleado.Id_Estacion = TbEstacion.Id_Estacion
  JOIN estado TbEstado on TbEmpleado.Id_Estado = TbEstado.Id_Estado
  WHERE TbEmpleado.Identificacion='$cedula' AND TbEmpleado.Id_Estado = '1' 