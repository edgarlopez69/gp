-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05_2020 a las 17:40:40
-- Versión del servidor: 5.7.14
-- Versión de PHP: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gygy`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `actividad_insertar` (IN `id` INT(10), IN `descripcion` TEXT)  NO SQL
BEGIN
	INSERT INTO actividad VALUES (null, id, descripcion, CURRENT_TIMESTAMP);
    SELECT "Actividad registrada" AS Mensaje;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `articulos_insertar` (IN `descr` TEXT, IN `precio` FLOAT, IN `cantidad` INT(10), IN `img1` TEXT, IN `img2` TEXT, IN `img3` TEXT)  NO SQL
BEGIN
	INSERT INTO articulos VALUES (null, descr, precio, cantidad, img1, img2, img3);
    SELECT "Articulo añadido" AS Mensaje;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `articulos_update` (IN `descr` TEXT, IN `precio` FLOAT, IN `cantidad` INT(10), IN `img1` TEXT, IN `img2` TEXT, IN `img3` TEXT, IN `id` INT(10))  NO SQL
BEGIN
		UPDATE `articulos` SET `articulo_descripción` = descr, `articulo_precio` = precio, `articulo_cantidad` = cantidad, `articulo_imagen_1` = img1, `articulo_imagen2_2` = img2, `articulo_imagen_3` = img3 WHERE `articulos_identificador` = id;
    SELECT "Articulo actualizado" AS Mensaje;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `carrito_crear` (IN `articulos` TEXT)  NO SQL
BEGIN
	INSERT INTO carrito VALUES (null, articulos);
    SELECT "Articulos ingresados" AS Mensaje;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `carrito_getArticulos` (IN `id` INT(10))  NO SQL
BEGIN
	SELECT carrito_articulos FROM carrito WHERE carrito_identificador = id;
    SELECT "Articulos recibidos" AS Mensaje;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `carrito_update` (IN `id` INT(10), IN `articulos` TEXT)  NO SQL
BEGIN
    UPDATE carrito SET carrito_articulos = articulos WHERE carrito_identificador = id;
    SELECT "Carrito Actualizado" AS Mensaje;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `compras_insertar`(IN `usuario` INT(10), IN `articulos` TEXT, IN `informacion` INT(10), IN `cupon` INT(10), IN `subtotal` FLOAT, IN `iva` FLOAT, IN `total` FLOAT, IN `factura` INT(10), IN `plataforma` TEXT, IN `referencia` TEXT, IN `estatus` TEXT, IN `env_datos` TEXT, IN `fact_data` TEXT)
    NO SQL
BEGIN
DECLARE envio int(10);
INSERT INTO `envios` VALUES(null,"","","","No enviado", env_datos,"");
SET envio = (SELECT `envio_identificador` FROM `envios` ORDER BY `envio_identificador` DESC LIMIT 1);
    INSERT INTO compras VALUES (null, usuario, articulos, informacion, cupon, subtotal, iva, total, factura, envio, plataforma, referencia, estatus, env_datos, fact_data, CURDATE() );
    SELECT `compra_identificador` FROM `compras` ORDER BY `compra_identificador` DESC LIMIT 1;

END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `compras_updateStatus` (IN `id` INT(10), IN `status` TEXT)  NO SQL
BEGIN
	UPDATE compras SET compra_estatus = status WHERE compra_identificador = id;
    SELECT "Status actualizado" AS Mensaje;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `compras_getIncompletes`()
    NO SQL
BEGIN
SELECT * FROM `compras` WHERE `compra_estatus` = "Incomplete" AND `compra_plataforma` = "OXXO";
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `cupones_create` (IN `descuento` TEXT, IN `condicion` TEXT, IN `vencimiento` TEXT, IN `limite` TEXT, IN `canjeados` TEXT)  NO SQL
BEGIN
	INSERT INTO cupones VALUES (null, descuento, condicion, vencimiento, limite, canjeados);
    SELECT "cupon insertado" AS Mensaje;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `envios_crear` (IN `proveedor` TEXT, IN `fecha_envio` TEXT, IN `fecha_arribo` TEXT, IN `status` TEXT)  NO SQL
BEGIN
	INSERT INTO envios VALUES (null, proveedor, fecha_envio, fecha_arribo, status);
    SELECT "Envio creado" AS Mensaje;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `envios_updateStatus` (IN `id` INT(10), IN `status` TEXT)  NO SQL
BEGIN
	UPDATE envios SET envio_estatus = status WHERE envio_identificador = id;
    SELECT "Status cambiado" AS Mensaje;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `facturas_insert` (IN `rfc` TEXT, IN `razon_soc` TEXT, IN `id` INT(10))  NO SQL
BEGIN
	INSERT INTO facturas VALUES (null, rfc, razon_soc, id);
    SELECT "Factura creada" AS Mensaje;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `informacion_insertar` (IN `calle` TEXT, IN `n_e` TEXT, IN `n_i` TEXT, IN `colonia` TEXT, IN `codigo_p` INT(10), IN `municipio` TEXT, IN `estado` TEXT, IN `pais` TEXT)  NO SQL
BEGIN
	INSERT into informacion VALUES (null, calle, n_e, n_i, colonia, codigo_p, municipio, estado, pais);
    SELECT "Informacion insertada" AS Mensaje;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `plataforma_insert` (IN `popup` TEXT, IN `slider1` TEXT, IN `slider2` TEXT, IN `slider3` TEXT, IN `slider4` TEXT, IN `slider5` TEXT, IN `articulos_home` TEXT)  NO SQL
BEGIN
	INSERT INTO `plataforma` VALUES (null, popup, slider1, slider2, slider3, slider4, slider5, articulos_home);
    SELECT "Plataforma insertada" AS Mensaje;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `plataforma_update` (IN `popup` TEXT, IN `slider1` TEXT, IN `slider2` TEXT, IN `slider3` TEXT, IN `slider4` TEXT, IN `slider5` TEXT, IN `articulos_home` TEXT)  NO SQL
BEGIN
	UPDATE `plataforma` SET `plataforma_popup` = popup, `plataforma_slider_1` = slider1, `plataforma_slider_2` = slider2, `plataforma_slider_3` = slider3,  `plataforma_slider_4` = slider4, `plataforma_slider_5` = slider5, `plataforma_articulos_home` = articulos_home;
    SELECT "Plataforma actualizada" AS Mensaje;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `usuarios_cambiarContra` (IN `id` INT(10), IN `oldcontra` TEXT, IN `newcontra` TEXT)  NO SQL
BEGIN 
    declare pwdant varchar(500);
    DECLARE user_type int(10);
    set user_type = (SELECT `usuario_plataforma` FROM `usuarios` where `usuario_identificador` = id);
    IF user_type = "tradicional"
    THEN
        set pwdant = (select `usuario_contraseña`  from `usuarios` where `usuario_identificador` = id);

        IF SHA(oldcontra) = pwdant
        THEN
            UPDATE `usuarios` SET `usuario_contraseña` = SHA(newcontra) WHERE `usuario_identificador` = id;
            select "Contraseña Actualizada" AS Mensaje;
        else
            select "Las contraseñas no coinciden" AS Mensaje;
        END IF;
    ELSE
        select "Usuario invalido" AS Mensaje;
    END IF;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `usuarios_login`(IN `mail` TEXT, IN `contra` TEXT)
    NO SQL
BEGIN 
    declare pwd varchar(500);
    
    
    IF EXISTS (select usuario_contraseña  from usuarios where usuario_correo = mail)
    THEN
        set pwd = (select usuario_contraseña  from usuarios where usuario_correo = mail);
        IF SHA(contra) = pwd
        THEN
            select "Login exitoso" AS Mensaje, `usuario_identificador`, `usuario_tipo`  from `usuarios` where `usuario_correo` = mail;
        else
            select "Datos erroneos" AS Mensaje, 0 AS `usuario_identificador`, "NA" AS usuario_tipo;
        END IF;
    else
        select "Usuario no existe" AS Mensaje, 0 AS usuario_identificador, "NA" AS usuario_tipo;
    END IF;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `usuarios_nuevo`(IN `correo` TEXT, IN `usuario_contraseña` TEXT, IN `usuario_nombre` TEXT, IN `telefono` TEXT)
    NO SQL
BEGIN
declare infoid int(10);
declare factinfoid int(10);

declare carid int(10);
declare factid int(10);

IF EXISTS (select `usuario_correo`  from `usuarios` where `usuario_correo` = correo)
THEN
  SELECT "Email ya usado" AS Mensaje, 0 AS usuario_identificador;
ELSE
  
    INSERT INTO `informacion`VALUES (null,usuario_nombre,telefono,"","","","",0,"","","");
    set infoid = (SELECT `información_identificador` FROM `informacion` ORDER BY `información_identificador` DESC LIMIT 1);

    INSERT INTO `carrito` VALUES (null, "");
    set carid = (SELECT `carrito_identificador` FROM `carrito` ORDER BY `carrito_identificador` DESC LIMIT 1);

    INSERT INTO `informacion`VALUES (null,usuario_nombre,"","","","","",0,"","","");
    set factinfoid = (SELECT `información_identificador` FROM `informacion` ORDER BY `información_identificador` DESC LIMIT 1);

    INSERT INTO `facturas` VALUES (null, "", "", "", 1);
    set factid = (SELECT `factura_identificador` FROM `facturas` ORDER BY `factura_identificador` DESC LIMIT 1);

    INSERT INTO usuarios VALUES (null,"tradicional",correo,SHA(usuario_contraseña),1,1,infoid,factid,"default.png",carid);
    SELECT "Usuario insertado" AS Mensaje, `usuario_identificador` FROM `usuarios` ORDER BY `usuario_identificador` DESC LIMIT 1;
END IF;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `usuarios_nuevo_goog`(IN `correo` TEXT, IN `usuario_png` TEXT, IN `usuario_nombre` TEXT)
    NO SQL
BEGIN
declare infoid int(10);
declare factinfoid int(10);

declare carid int(10);
declare factid int(10);

IF EXISTS (select `usuario_correo`  from `usuarios` where `usuario_correo` = correo)
THEN
  SELECT "Email ya usado" AS Mensaje, 0 AS usuario_identificador;
ELSE
  
    INSERT INTO `informacion`VALUES (null,usuario_nombre,"","","","",0,"","","");
    set infoid = (SELECT `información_identificador` FROM `informacion` ORDER BY `información_identificador` DESC LIMIT 1);

    INSERT INTO `carrito` VALUES (null, "");
    set carid = (SELECT `carrito_identificador` FROM `carrito` ORDER BY `carrito_identificador` DESC LIMIT 1);

    INSERT INTO `informacion`VALUES (null,usuario_nombre,"","","","",0,"","","");
    set factinfoid = (SELECT `información_identificador` FROM `informacion` ORDER BY `información_identificador` DESC LIMIT 1);

    INSERT INTO `facturas` VALUES (null, "", "", "", 1);
    set factid = (SELECT `factura_identificador` FROM `facturas` ORDER BY `factura_identificador` DESC LIMIT 1);

    INSERT INTO usuarios VALUES (null,"google",correo,SHA("*"),1,1,infoid,factid,usuario_png,carid);
    SELECT "Usuario insertado" AS Mensaje, `usuario_identificador` FROM `usuarios` ORDER BY `usuario_identificador` DESC LIMIT 1;
END IF;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `usuarios_checarCorreo`(IN `mail` TEXT)
    NO SQL
BEGIN
IF EXISTS (select `usuario_correo`  from `usuarios` where `usuario_correo` = mail)
THEN
SELECT "Correo Existe" As Mensaje;
ELSE
SELECT "Correo No Existe" AS Mensaje;
END IF;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `usuarios_checarPlataforma`(IN `mail` TEXT)
    NO SQL
BEGIN
IF EXISTS (select `usuario_plataforma`  from `usuarios` where `usuario_correo` = mail)
THEN
SELECT `usuario_plataforma`  from `usuarios` where `usuario_correo` = mail ;
ELSE
SELECT "No existe" AS usuario_plataforma;
END IF;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `usuarios_idByemail`(IN `mail` TEXT)
    NO SQL
BEGIN
SELECT `usuario_identificador` FROM `usuarios` WHERE `usuario_correo` = mail;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `usuarios_getDataByID`(IN `usr_id` INT(10))
    NO SQL
BEGIN
SELECT `usuario_correo`, `usuario_información`, `usuario_factura`, `usuario_carrito` FROM `usuarios` WHERE `usuario_identificador` = usr_id;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `plataforma_getPopup`()
    NO SQL
BEGIN
SELECT `plataforma_popup` FROM `plataforma`;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `plataforma_getProd`()
    NO SQL
BEGIN
SELECT `plataforma_articulos_home` FROM `plataforma`;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `plataforma_getSlid`()
    NO SQL
BEGIN
SELECT `plataforma_slider_1`, `plataforma_slider_2`, `plataforma_slider_3`, `plataforma_slider_4`, `plataforma_slider_5` FROM `plataforma`;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `api_checkKey`(IN `apikey` TEXT)
    NO SQL
BEGIN 
    
    
    IF EXISTS (select `api_key`  from `api_keys` where `api_key` = apikey)
    THEN
		select "Valid key" AS Mensaje, `api_location_for`  from `api_keys` where `api_key` = apikey;
    else
    	select "Invalid Key" AS Mensaje;
	END IF;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `usuarios_cambiarImagen`(IN `id` INT(10), IN `img` TEXT)
    NO SQL
BEGIN
UPDATE `usuarios` SET `usuario_imagen` = img;
SELECT "Imagen actualizada" AS Mensaje;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `articulos_getRawArt`()
    NO SQL
BEGIN
SELECT  * from `articulos`; 
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `articulos_getFilArt`(IN `likeness` TEXT)
    NO SQL
BEGIN
SELECT  * from `articulos` WHERE `articulo_descripción` LIKE  CONCAT ( "%", likeness, "%" ); 
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `articulos_getProd`(IN `id` TEXT)
    NO SQL
BEGIN
SELECT * FROM `articulos` WHERE `articulo_identificador` = id;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `articulos_checkExistence`(IN `id` TEXT, IN `ammount` INT(10))
    NO SQL
BEGIN
DECLARE inventario INT (10);
DECLARE dif INT (10);

set inventario = (SELECT `articulo_cantidad` FROM `articulos` where `articulo_identificador` = id);
IF (inventario >= ammount)
THEN
    SELECT "Valid" AS Mensaje, 0 AS Diference;
ELSE
    set dif = inventario - ammount;
    SELECT "Invalid" AS Mensaje, dif AS Diference;
END IF;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `articulos_modifExistence`(IN `id` TEXT, IN `new_cant` INT(10))
    NO SQL
BEGIN
DECLARE old_cant int(10);
DECLARE cant_modif int(10);

set old_cant = (SELECT `articulo_cantidad` from `articulos` where `articulo_identificador` = id);

set cant_modif = old_cant + new_cant;

UPDATE `articulos` SET `articulo_cantidad` = cant_modif WHERE `articulo_identificador` = id;
SELECT "Unidad modificada" AS Mensaje;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `token_addPassRecoveryToken`(IN `usrID` INT(10), IN `infodata` TEXT)
    NO SQL
BEGIN
DECLARE user_type int(10);
set user_type = (SELECT `usuario_plataforma` FROM `usuarios` where `usuario_identificador` = usrID);
IF user_type = "tradicional"
THEN
INSERT INTO `tokens` VALUES (null, usrID, infodata, "PassRecovery",  CURRENT_TIMESTAMP + INTERVAL 2 HOUR, 0);
SELECT "Token Inserted" AS Mensaje, `token_id` FROM `tokens` ORDER BY `token_id` DESC LIMIT 1;
ELSE
    SELECT "Cuenta Invalida" AS Mensaje, 0 AS token_id ;
END IF;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `token_getDataForPassRecovery`(IN `tkn_id` INT(10))
    NO SQL
BEGIN
IF EXISTS (select * FROM `tokens`WHERE `token_id` = tkn_id )
THEN
  select  * FROM `tokens` WHERE `token_id` = tkn_id;
ELSE
  select 0 As token_usuario, "NONE" AS token_contenido, "NONE" AS token_tipo, CURRENT_TIMESTAMP AS token_expiracion, 0 AS  token_status ;
END IF;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `token_deactivate`(IN `tkn_id` INT(10))
    NO SQL
BEGIN
UPDATE `tokens` SET `token_status` = 1 WHERE `token_id` = tkn_id;
SELECT "Token desactivado" AS Mensaje;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `token_isActive`(IN `tkn_id` INT(10))
    NO SQL
BEGIN
DECLARE status_token int(10);
set status_token = (SELECT `token_status` FROM `tokens` WHERE `token_id` = tkn_id);
IF status_token = 0
  THEN
    SELECT "true" AS Mensaje;
  ELSE
    SELECT "false" AS Mensaje;
END IF;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `token_changeUserPassId`(IN `userID` INT(10), IN `newPass` TEXT)
    NO SQL
BEGIN
UPDATE `usuarios` SET `usuario_contraseña` = SHA(newPass) WHERE `usuarios`.`usuario_identificador` = userID;
SELECT "Contraseña Actualizada" As Mensaje;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `informacion_actualizar` (IN `info_id` INT(10),IN `telefono` TEXT,IN `calle` TEXT, IN `n_e` TEXT, IN `n_i` TEXT, IN `colonia` TEXT, IN `codigo_p` INT(10), IN `municipio` TEXT, IN `estado` TEXT, IN `pais` TEXT)  NO SQL
BEGIN
  INSERT into informacion VALUES (null, calle, n_e, n_i, colonia, codigo_p, municipio, estado, pais);
    UPDATE `informacion` SET `información_telefono` = telefono,`información_calle` = calle, `información_numero-externo` = n_e, `información_numero-interno` = n_i, `información_colonia` = colonia, `información_codigo_postal` = codigo_p,  `información_municipio` = municipio, `información_estado` = estado, `información_país` = pais WHERE `información_identificador` = info_id;
    SELECT "Informacion actualizada" AS Mensaje;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `informacion_modificar`(IN `id` INT(10), IN `nombre` TEXT,IN `telefono` TEXT, IN `calle` TEXT, IN `ne` TEXT, IN `ni` TEXT, IN `colonia` TEXT, IN `cp` INT(10), IN `municipio` TEXT, IN `estado` TEXT, IN `pais` TEXT)
    NO SQL
BEGIN
DECLARE info_id int(10);
set info_id = (SELECT `usuario_información` FROM `usuarios` WHERE `usuario_identificador` = id);
UPDATE `informacion` SET `información_nombre` = nombre,`información_telefono` = telefono, `información_calle` = calle, `información_numero_externo` = ne, `información_numero_interno` = ni, `información_colonia`= colonia, `información_codigo_postal`= cp, `información_municipio` = municipio, `información_estado` = estado, `información_país` = pais WHERE `información_identificador` = info_id;
SELECT "Proceso terminado" AS Mensaje;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `informacion_obtener`(IN `id` INT(10))
    NO SQL
BEGIN
DECLARE info_id int(10);
set info_id = (SELECT `usuario_información` FROM `usuarios` WHERE `usuario_identificador` = id);
SELECT * FROM `informacion` WHERE `información_identificador` = info_id;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `facturas_modificar`(IN `id` INT(10), IN `rfc` TEXT, IN `rs` TEXT, IN `info` TEXT, IN `nombre` TEXT)
    NO SQL
BEGIN
DECLARE fact_id int(10);
set fact_id = (SELECT `usuario_factura` FROM `usuarios` WHERE `usuario_identificador` = id);
UPDATE `facturas` SET `factura_nombre` = nombre, `factura_rfc` = rfc, `factura_razon_social` = rs, `factura_información` = info WHERE `factura_identificador` = fact_id;
SELECT "Proceso terminado" AS Mensaje;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `facturas_obtener`(IN `id` INT(10))
    NO SQL
BEGIN
DECLARE fact_id int(10);
set fact_id = (SELECT `usuario_factura` FROM `usuarios` WHERE `usuario_identificador` = id);
SELECT * FROM `facturas` WHERE `factura_identificador` = fact_id;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `usuarios_nameById`(IN `id` INT(10))
    NO SQL
BEGIN
declare id_info int(10);
IF EXISTS (select `usuario_información`  from `usuarios` where `usuario_identificador` = id)
    THEN
      set id_info = (select `usuario_información`  from `usuarios` where `usuario_identificador` = id);
      SELECT "Busqueda exitosa" As Mensaje, `información_nombre`  from `informacion` where `información_identificador` = id_info;
    else
      select "Usuario no existe" AS Mensaje, "No" AS `información_nombre`;
  END IF;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `admin_CheckByID`(IN `id` INT(10))
    NO SQL
BEGIN
SELECT `usuario_tipo` FROM `usuarios` WHERE `usuario_identificador` = id;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `admin_deleteProductByID`(IN `id` TEXT)
    NO SQL
BEGIN
DELETE FROM `articulos` WHERE `articulo_identificador` = id;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `admin_getEnvioById`(IN `id` INT(10))
    NO SQL
BEGIN
SELECT * FROM `envios` WHERE `envio_identificador` = id;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `admin_getInventory`()
    NO SQL
BEGIN
SELECT * FROM `articulos`;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `admin_newProduct`(IN `id` TEXT, IN `descript` TEXT, IN `ext` TEXT, IN `precio` FLOAT(10), IN `cant` INT(10), IN `img1` TEXT, IN `img2` TEXT, IN `img3` TEXT, IN `marca` TEXT, IN `cats` TEXT)
    NO SQL
BEGIN
DECLARE newProdId varchar(500);
IF EXISTS (select `articulo_identificador`  from `articulos` where `articulo_identificador` = id)
THEN
    set newProdId = CONCAT( id, "_extra");
    INSERT INTO `articulos` VALUES (newProdId,descript,ext,marca,cats,precio,cant,img1,img2,img3);
ELSE
    INSERT INTO `articulos` VALUES (id,descript,ext,marca,cats,precio,cant,img1,img2,img3);
END IF;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `admin_updateProduct`(IN `id` TEXT, IN `descript` TEXT, IN `ext` TEXT, IN `precio` FLOAT(10), IN `cant` INT(10), IN `img1` TEXT, IN `img2` TEXT, IN `img3` TEXT, IN `marca` TEXT, IN `cats` TEXT)
    NO SQL
BEGIN
UPDATE `articulos` SET `articulo_descripción` = descript, `articulo_extracto` = ext,`articulo_marca` = marca,`articulo_cats` = cats, `articulo_precio` = precio, `articulo_cantidad` = cant, `articulo_imagen_1` = img1, `articulo_imagen_2` = img2, `articulo_imagen_3` = img3 WHERE `articulo_identificador` = id;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `admin_updateProdCant`(IN `id` TEXT, IN `cant` INT(10))
    NO SQL
BEGIN
UPDATE `articulos` SET`articulo_cantidad` = cant WHERE `articulo_identificador` = id;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `admin_getCompras`()
    NO SQL
BEGIN
SELECT * FROM `compras`;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `admin_updateEnvio`(IN `id` INT(10), IN `proveedor` TEXT, IN `f_envio` DATE, IN `f_arribo` DATE, IN `estatus` TEXT, IN `referencia` TEXT)
    NO SQL
BEGIN
UPDATE `envios` SET `envio_proovedor` = proveedor, `envio_fecha_envio` = f_envio, `envio_fecha_arribo` = f_arribo, `envio_estatus` = estatus, `envio_seguimiento` = referencia WHERE `envio_identificador` = id;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `admin_getCupones`()
    NO SQL
BEGIN
SELECT * FROM `cupones`;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `admin_getUserData`()
    NO SQL
BEGIN
SELECT `usuario_identificador`,`usuario_plataforma`,`usuario_correo`,`usuario_estatus`,`usuario_tipo`,`usuario_información`,`usuario_factura`,`usuario_imagen` FROM `usuarios` WHERE `usuario_correo` != "" && `usuario_correo` != "admin@gygybalcazar.com";
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `admin_getPlataforma`()
    NO SQL
BEGIN
SELECT * FROM `plataforma`;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `admin_updateProductSlider`(IN `products` TEXT)
    NO SQL
BEGIN
UPDATE `plataforma` SET `plataforma_articulos_home` = products WHERE 1;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `admin_deleteUserByID`(IN `userID` INT(10))
    NO SQL
BEGIN
declare info_id int(10);
declare fact_id int(10);
declare carrito_id int(10);

SET info_id = (SELECT `usuario_información` FROM `usuarios` WHERE `usuario_identificador` = userID);
SET fact_id = (SELECT `usuario_factura` FROM `usuarios` WHERE `usuario_identificador` = userID);
SET carrito_id = (SELECT `usuario_carrito` FROM `usuarios` WHERE `usuario_identificador` = userID);

DELETE FROM `usuarios` WHERE `usuario_identificador` = userID;
DELETE FROM `informacion` WHERE `información_identificador` = info_id;
DELETE FROM `facturas` WHERE `factura_identificador` = fact_id;
DELETE FROM `carrito` WHERE `carrito_identificador` = carrito_id;

END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `admin_changePsw`(IN `id` INT(10), IN `newpass` TEXT)
    NO SQL
BEGIN
UPDATE `usuarios` SET `usuario_contraseña` = SHA(usuario_contraseña) WHERE `usuario_identificador` = id;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `admin_userUpdate`(IN `id` INT(10), IN `tipo` INT(10))
    NO SQL
BEGIN
UPDATE `usuarios` SET `usuario_tipo` = tipo WHERE `usuario_identificador` = id;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `admin_newUser`(IN `correo` TEXT, IN `usuario_contraseña` TEXT, IN `usuario_nombre` TEXT, IN `tipo` INT(10))
    NO SQL
BEGIN
declare infoid int(10);
declare factinfoid int(10);

declare carid int(10);
declare factid int(10);

IF EXISTS (select `usuario_correo`  from `usuarios` where `usuario_correo` = correo)
THEN
  SELECT "Email ya usado" AS Mensaje, 0 AS usuario_identificador;
ELSE
  
    INSERT INTO `informacion`VALUES (null,usuario_nombre,"","","","","",0,"","","");
    set infoid = (SELECT `información_identificador` FROM `informacion` ORDER BY `información_identificador` DESC LIMIT 1);

    INSERT INTO `carrito` VALUES (null, "");
    set carid = (SELECT `carrito_identificador` FROM `carrito` ORDER BY `carrito_identificador` DESC LIMIT 1);

    INSERT INTO `informacion`VALUES (null,usuario_nombre,"","","","",0,"","","");
    set factinfoid = (SELECT `información_identificador` FROM `informacion` ORDER BY `información_identificador` DESC LIMIT 1);

    INSERT INTO `facturas` VALUES (null, "", "", "", 1);
    set factid = (SELECT `factura_identificador` FROM `facturas` ORDER BY `factura_identificador` DESC LIMIT 1);

    INSERT INTO usuarios VALUES (null,"tradicional",correo,SHA(usuario_contraseña),1,1,infoid,factid,"default.png",carid);
    SELECT "Usuario insertado" AS Mensaje, `usuario_identificador` FROM `usuarios` ORDER BY `usuario_identificador` DESC LIMIT 1;
END IF;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `admin_getCompraByEnvio`(IN `envio` INT(10))
    NO SQL
BEGIN
SELECT * FROM `compras` where `compra_envio` = envio;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `admin_deleteCategoriaById`(IN `id` INT(10))
    NO SQL
BEGIN
DELETE FROM `categorias` WHERE `categoria_id` = id;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `admin_getCategorias`()
    NO SQL
BEGIN
SELECT * FROM `categorias`;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `admin_newCategoria`(IN `nombre` TEXT, IN `id` TEXT)
    NO SQL
BEGIN
INSERT INTO `categorias` VALUES (null, nombre, id);
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `admin_updateCategoria`(IN `id` INT(10), IN `nombre` TEXT, IN `sub` TEXT)
    NO SQL
BEGIN
UPDATE `categorias` SET `categoria_nombre` = nombre, `categoria_sub` = sub WHERE `categoria_id` = id;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `compra_updateStatus`(IN `id` INT(10), IN `statuse` TEXT)
    NO SQL
BEGIN
UPDATE `compras` SET `compra_estatus` = statuse WHERE `compra_identificador` = id;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `compra_updateReference`(IN `id` INT(10), IN `reference` TEXT)
    NO SQL
BEGIN
UPDATE `compras` SET `compra_referencia` = reference WHERE `compra_identificador` = id;
END$$

CREATE DEFINER=`glassprotechcom`@`localhost` PROCEDURE `compra_getByID`(IN `id` INT(10))
    NO SQL
BEGIN
SELECT * FROM `compras` WHERE `compra_identificador` = id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `actividad_identificador` int(10) NOT NULL,
  `actividad_usuario` int(10) NOT NULL,
  `actividad_descripción` text NOT NULL,
  `actividad_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `articulo_identificador` text NOT NULL,
  `articulo_descripción` text NOT NULL,
  `articulo_extracto` text NOT NULL,
  `articulo_marca` text NOT NULL,
  `articulo_cats` text NOT NULL,
  `articulo_precio` float NOT NULL,
  `articulo_cantidad` int(10) NOT NULL,
  `articulo_imagen_1` text NOT NULL,
  `articulo_imagen_2` text NOT NULL,
  `articulo_imagen_3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `carrito_identificador` int(10) NOT NULL,
  `carrito_articulos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `compra_identificador` int(10) NOT NULL,
  `compra_usuario` int(10) NOT NULL,
  `compra_articulos` text NOT NULL,
  `compra_información` int(10) NOT NULL,
  `compra_cupon` int(10) NOT NULL,
  `compra_subtotal` float NOT NULL,
  `compra_iva` float NOT NULL,
  `compra_total` float NOT NULL,
  `compra_factura` int(10) NOT NULL,
  `compra_envio` int(10) NOT NULL,
  `compra_plataforma` text NOT NULL,
  `compra_referencia` text NOT NULL,
  `compra_estatus` text NOT NULL,
  `compra_sending` text NOT NULL,
  `compra_fact_data` text NOT NULL,
  `compra_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupones`
--

CREATE TABLE `cupones` (
  `cupon_identificador` int(10) NOT NULL,
  `cupon_codigo` text NOT NULL,
  `cupon_descuento` text NOT NULL,
  `cupon_condición` text NOT NULL,
  `cupon_vencimiento` text NOT NULL,
  `cupon_limite` text NOT NULL,
  `cupon_canjeados` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `envio_identificador` int(10) NOT NULL,
  `envio_proovedor` text NOT NULL,
  `envio_fecha_envio` date NOT NULL,
  `envio_fecha_arribo` date NOT NULL,
  `envio_estatus` text NOT NULL,
  `envio_datos` text NOT NULL,
  `envio_seguimiento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `factura_identificador` int(10) NOT NULL,
  `factura_nombre` text NOT NULL,
  `factura_rfc` text NOT NULL,
  `factura_razon_social` text NOT NULL,
  `factura_información` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion`
--

CREATE TABLE `informacion` (
  `información_identificador` int(10) NOT NULL,
  `información_telefono` text NOT NULL,
  `información_nombre` text NOT NULL,
  `información_calle` text NOT NULL,
  `información_numero_externo` text NOT NULL,
  `información_numero_interno` text NOT NULL,
  `información_colonia` text NOT NULL,
  `información_codigo_postal` int(10) NOT NULL,
  `información_municipio` text NOT NULL,
  `información_estado` text NOT NULL,
  `información_país` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma`
--

CREATE TABLE `plataforma` (
  `plataforma_popup` text NOT NULL,
  `plataforma_slider_1` text NOT NULL,
  `plataforma_slider_2` text NOT NULL,
  `plataforma_slider_3` text NOT NULL,
  `plataforma_slider_4` text NOT NULL,
  `plataforma_slider_5` text NOT NULL,
  `plataforma_articulos_home` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `tipo_identificador` int(10) NOT NULL,
  `tipo_descripción` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_identificador` int(10) NOT NULL,
  `usuario_plataforma` text NOT NULL,
  `usuario_correo` text NOT NULL,
  `usuario_contraseña` text NOT NULL,
  `usuario_estatus` text NOT NULL,
  `usuario_tipo` int(10) NOT NULL,
  `usuario_información` int(10) NOT NULL,
  `usuario_factura` int(10) NOT NULL,
  `usuario_imagen` text NOT NULL,
  `usuario_carrito` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tokens` (
  `token_id` int(11) NOT NULL,
  `token_usuario` int(11) DEFAULT '0',
  `token_contenido` text,
  `token_tipo` text,
  `token_expiracion` timestamp NULL DEFAULT NULL,
  `token_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`actividad_identificador`),
  ADD KEY `actividad_usuario` (`actividad_usuario`);

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`articulo_identificador`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`carrito_identificador`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`compra_identificador`),
  ADD KEY `compra_usuario` (`compra_usuario`),
  ADD KEY `compra_información` (`compra_información`),
  ADD KEY `compra_cupon` (`compra_cupon`),
  ADD KEY `compra_factura` (`compra_factura`),
  ADD KEY `compra_envio` (`compra_envio`);

--
-- Indices de la tabla `cupones`
--
ALTER TABLE `cupones`
  ADD PRIMARY KEY (`cupon_identificador`);

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`envio_identificador`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`factura_identificador`);

--
-- Indices de la tabla `informacion`
--
ALTER TABLE `informacion`
  ADD PRIMARY KEY (`información_identificador`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`tipo_identificador`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_identificador`),
  ADD KEY `usuario_tipo` (`usuario_tipo`),
  ADD KEY `usuario_factura` (`usuario_factura`),
  ADD KEY `usuario_carrito` (`usuario_carrito`),
  ADD KEY `usuario_información` (`usuario_información`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `actividad_identificador` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `articulo_identificador` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `carrito_identificador` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `compra_identificador` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cupones`
--
ALTER TABLE `cupones`
  MODIFY `cupon_identificador` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
  MODIFY `envio_identificador` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `factura_identificador` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `informacion`
--
ALTER TABLE `informacion`
  MODIFY `información_identificador` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `tipo_identificador` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_identificador` int(10) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `actividad_ibfk_1` FOREIGN KEY (`actividad_usuario`) REFERENCES `usuarios` (`usuario_identificador`);

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`compra_usuario`) REFERENCES `usuarios` (`usuario_identificador`),
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`compra_información`) REFERENCES `informacion` (`información_identificador`),
  ADD CONSTRAINT `compras_ibfk_3` FOREIGN KEY (`compra_cupon`) REFERENCES `cupones` (`cupon_identificador`),
  ADD CONSTRAINT `compras_ibfk_4` FOREIGN KEY (`compra_factura`) REFERENCES `facturas` (`factura_identificador`),
  ADD CONSTRAINT `compras_ibfk_5` FOREIGN KEY (`compra_envio`) REFERENCES `envios` (`envio_identificador`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`usuario_tipo`) REFERENCES `tipo_usuario` (`tipo_identificador`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`usuario_tipo`) REFERENCES `tipo_usuario` (`tipo_identificador`),
  ADD CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`usuario_tipo`) REFERENCES `tipo_usuario` (`tipo_identificador`),
  ADD CONSTRAINT `usuarios_ibfk_4` FOREIGN KEY (`usuario_factura`) REFERENCES `facturas` (`factura_identificador`),
  ADD CONSTRAINT `usuarios_ibfk_5` FOREIGN KEY (`usuario_carrito`) REFERENCES `carrito` (`carrito_identificador`),
  ADD CONSTRAINT `usuarios_ibfk_6` FOREIGN KEY (`usuario_información`) REFERENCES `informacion` (`información_identificador`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



--
-- Estructura de tabla para la tabla `api_keys`
--

CREATE TABLE `api_keys` (
  `api_id` int(10) NOT NULL,
  `api_location_from` text NOT NULL,
  `api_location_for` text NOT NULL,
  `api_key` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `api_keys`
--

INSERT INTO `api_keys` (`api_id`, `api_location_from`, `api_location_for`, `api_key`) VALUES
(1, 'app', 'api', 'testKey');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `api_keys`
--
ALTER TABLE `api_keys`
  ADD PRIMARY KEY (`api_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `api_keys`
--
ALTER TABLE `api_keys`
  MODIFY `api_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

CREATE TABLE `categorias` (
  `categoria_id` int(11) NOT NULL,
  `categoria_nombre` text NOT NULL,
  `categoria_sub` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

INSERT INTO `cupones` (`cupon_identificador`, `cupon_codigo`, `cupon_descuento`, `cupon_condición`, `cupon_vencimiento`, `cupon_limite`, `cupon_canjeados`) VALUES
(1, 'dasdssd', '0', 'Never', 'Never', '0', '0');