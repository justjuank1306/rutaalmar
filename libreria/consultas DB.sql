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