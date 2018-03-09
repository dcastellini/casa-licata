--
DROP DATABASE IF EXISTS `Licata`;
--

CREATE DATABASE IF NOT EXISTS `Licata`;
--
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "-03:00";
--
DROP TABLE IF EXISTS Licata.`Recibo_Detalle`;
DROP TABLE IF EXISTS Licata.`Recibo`;
DROP TABLE IF EXISTS Licata.`Factura`;
DROP TABLE IF EXISTS Licata.`Factura_Detalle`;
DROP TABLE IF EXISTS Licata.`Material_Stock`;
DROP TABLE IF EXISTS Licata.`Tipo_Material`;
DROP TABLE IF EXISTS Licata.`Proveedor`;
DROP TABLE IF EXISTS Licata.`Cliente`;
DROP TABLE IF EXISTS Licata.`Tipo_Documento`;
DROP TABLE IF EXISTS Licata.`Usuario`;
DROP TABLE IF EXISTS Licata.`Diametro_Barra_Acero`;


/*  TABLA DE USUARIOS   */

CREATE TABLE IF NOT EXISTS Licata.`Usuario` (
  `usuario`           varchar(50)  NOT NULL,
  `password`          varchar(200) NOT NULL,
  `nombre`            varchar(100) NOT NULL,
  `apellido`          varchar(100) NOT NULL,
  `email`             varchar(200) NOT NULL,
  `usu_creacion`      varchar(50)  NOT NULL,
  `fhcreacion`        date         NOT NULL,
  `usu_modif`         varchar(50)  NOT NULL,
  `fhmodif`           timestamp    NOT NULL,
  PRIMARY KEY (`usuario`)
);
CREATE FULLTEXT INDEX idx_usuario ON Licata.`Usuario`(`usuario`);

/* TABLA DE DOCUMENTOS */

CREATE TABLE IF NOT EXISTS Licata.`Tipo_Documento`(
    `tipo`                 varchar(4)   NOT NULL,
    `descripcion`          varchar(200) NOT NULL,
	`habilitado`           int(1)       NOT NULL,
	`usu_deshab`           varchar(50)          ,
	`fh_deshab`            date                 ,
 	`usu_creacion`         varchar(40)  NOT NULL,
    `fhcreacion`           date         NOT NULL,
    `usu_modif`            varchar(40)  NOT NULL,
    `fhmodif`              timestamp    NOT NULL,
	PRIMARY KEY (`tipo`)
);
CREATE FULLTEXT INDEX idx_tipo ON Licata.`Tipo_Documento`(`tipo`);


/* TABLA DE CLIENTES */

CREATE TABLE IF NOT EXISTS Licata.`Cliente` (
    `id_cliente`           int(15)     NOT NULL AUTO_INCREMENT,
    `nombre`               varchar(40)         ,
    `apellido`             varchar(40)         ,
    `razon_social`         varchar(40)         ,	
    `tipo_documento`       varchar(4)  NOT NULL,
	`documento`            int(30)     NOT NULL,
	`email`                varchar(40)         ,
    `calle`                varchar(40) NOT NULL,
    `numero`               int(40)     NOT NULL,
    `piso`                 int(1)              ,
    `departamento`         varchar(1)          ,
    `localidad`            varchar(40) NOT NULL,
    `codigo_postal`        int(4)              ,
    `telefono`             int(40)             ,
    `celular`              int(40)             ,
	`habilitado`           int(1)      NOT NULL,
	`usu_deshab`           varchar(50)         ,
	`fh_deshab`            date                ,
 	`usu_creacion`         varchar(40) NOT NULL,
    `fhcreacion`           date        NOT NULL,
    `usu_modif`            varchar(40) NOT NULL,
    `fhmodif`              timestamp   NOT NULL,
    PRIMARY KEY (`id_cliente`),
	CONSTRAINT `tipo_documento_fk_cliente` FOREIGN KEY (`tipo_documento`)  REFERENCES `Tipo_Documento` (`tipo`)
);
CREATE UNIQUE INDEX  idx_id_cliente ON Licata.`Cliente`(`id_cliente`) USING HASH;

/* TABLA DE PROVEEDORES */ 

CREATE TABLE IF NOT EXISTS Licata.`Proveedor` (
    `id_proveedor`         int(15)     NOT NULL AUTO_INCREMENT,
    `nombre`               varchar(40)         ,
    `apellido`             varchar(40)         ,
    `razon_social`         varchar(40)         ,	
    `tipo_documento`       varchar(4)  NOT NULL,
	`documento`            int(30)     NOT NULL,
	`email`                varchar(40)         ,
    `calle`                varchar(40) NOT NULL,
    `numero`               int(40)     NOT NULL,
    `piso`                 int(1)              ,
    `departamento`         varchar(1)          ,
    `localidad`            varchar(40) NOT NULL,
    `codigo_postal`        int(4)              ,
    `telefono`             int(40)             ,
    `celular`              int(40)             ,
 	`usu_creacion`         varchar(40) NOT NULL,
    `fhcreacion`           date        NOT NULL,
    `usu_modif`            varchar(40) NOT NULL,
    `fhmodif`              timestamp   NOT NULL,
    PRIMARY KEY (`id_proveedor`),
	CONSTRAINT `tipo_documento_fk_proveedor` FOREIGN KEY (`tipo_documento`)  REFERENCES `Tipo_Documento` (`tipo`)
);
CREATE UNIQUE INDEX  idx_id_proveedor ON Licata.`Proveedor`(`id_proveedor`) USING HASH;


/* TIPO DE MATERIALES */

CREATE TABLE IF NOT EXISTS Licata.`Tipo_Material` (
    `tipo_material`        varchar(1)   NOT NULL,
    `descripcion`          varchar(200) NOT NULL,
	`usu_creacion`         varchar(40)  NOT NULL,
    `fhcreacion`           date         NOT NULL,
    `usu_modif`            varchar(40)  NOT NULL,
    `fhmodif`              timestamp    NOT NULL,
	PRIMARY KEY (`tipo_material`)
);
CREATE FULLTEXT INDEX  idx_tipo_material ON Licata.`Tipo_Documento`(`tipo`);

/* TABLA MATERIALES EN STOCK */

CREATE TABLE IF NOT EXISTS Licata.`Material_Stock` (
    `id_material`          int(15)      NOT NULL AUTO_INCREMENT,
    `descripcion`          varchar(200)         ,
	`tipo_material`        varchar(1)   NOT NULL,
    `cant_min`             varchar(40)          ,
    `cant_stock`           varchar(40)          ,	
    `id_proveedor`         int(15)      NOT NULL,	
	`unidad_medida`        VARCHAR(10)  NOT NULL,
	`precio_lista`         int          NOT NULL,
	`precio_venta`         int          NOT NULL,
	`ganancia`             int                  ,
 	`usu_creacion`         varchar(40)  NOT NULL,
    `fhcreacion`           date         NOT NULL,
    `usu_modif`            varchar(40)  NOT NULL,
    `fhmodif`              timestamp    NOT NULL,
    PRIMARY KEY (`id_material`),
	CONSTRAINT `tipo_material_fk` FOREIGN KEY (`tipo_material`)  REFERENCES `Tipo_Material` (`tipo_material`),
	CONSTRAINT `material_stock_proveedor` FOREIGN KEY (`id_proveedor`)  REFERENCES `Proveedor` (`id_proveedor`)
);
CREATE UNIQUE INDEX  idx_id_material ON Licata.`Material_Stock`(`id_material`) USING HASH;

/* TABLA DE FACTURAS */

CREATE TABLE IF NOT EXISTS Licata.`Factura` (
    `id_factura`           int(15)      NOT NULL AUTO_INCREMENT,
    `usuario`              varchar(40)  NOT NULL,
    `fhemision`            varchar(40)  NOT NULL,
    `numero`               varchar(40)  NOT NULL,
    `letra`                varchar(1)   NOT NULL,
    `id_cliente`           int          NOT NULL,
    `nombre`               varchar(40)          ,
    `apellido`             varchar(40)          ,
    `razon_social`         varchar(40)  NOT NULL,    
    `tipo_documento`       varchar(4)   NOT NULL,
    `documento`            int(30)      NOT NULL,
    `tp_pago`              varchar(40)  NOT NULL,
    `ineto`                int          NOT NULL,
    `ibruto`               int          NOT NULL,
    `piva`                 int          NOT NULL,
    `iiva`                 int          NOT NULL,
    `cobrada`              int          NOT NULL,
    `anulada`              int                  ,
    `fh_anulada`           date                 ,
    `usuario_anulada`      varchar(50)          ,
    `descuento`            int                  ,
    `ibruto_desc`          int                  ,
    `ineto_desc`           int                  , 
    `marca_acopio`         int          NOT NULL,    
    `usu_creacion`         varchar(40)  NOT NULL,
    `fhcreacion`           date         NOT NULL,
    `usu_modif`            varchar(40)  NOT NULL,
    `fhmodif`              timestamp    NOT NULL,
     PRIMARY KEY (`id_factura`),
     CONSTRAINT `factura_cliente_fk` FOREIGN KEY (`id_cliente`)  REFERENCES `Cliente` (`id_cliente`)
);
CREATE INDEX  idx_id_factura ON Licata.`Factura`(`id_factura`) USING HASH;
CREATE INDEX  idx_numero_factura ON Licata.`Factura`(`numero`) USING HASH;
CREATE INDEX  idx_fhemision_factura ON Licata.`Factura`(`fhemision`) USING HASH;

/* TABLA DE DETALLE DE FACTURA */

CREATE TABLE IF NOT EXISTS Licata.`Factura_Detalle` (
    `id_factura`           varchar(40)  NOT NULL,
    `item`                 int          NOT NULL,
    `material`             varchar(40)  NOT NULL,
    `cantidad`             int          NOT NULL,   
    `ineto`                int          NOT NULL,
    `iiva`                 int          NOT NULL,
    `descuento`            int                  ,
    `ibruto_desc`          int                  ,
    `ineto_desc`           int                  ,
    `mercaderia_retirada`  int                  ,
    `usu_creacion`         varchar(40)  NOT NULL,
    `fhcreacion`           date         NOT NULL,
    `usu_modif`            varchar(40)  NOT NULL,
    `fhmodif`              timestamp    NOT NULL,
    PRIMARY KEY (`id_factura`,`item`)
);
CREATE UNIQUE INDEX  idx_factura_detalle ON Licata.`Factura_Detalle`(`id_factura`,`item`) USING HASH;
    
/* TABLA DE RECIBOS */

CREATE TABLE IF NOT EXISTS Licata.`Recibo` (
    `id_recibo`            int(15)      NOT NULL AUTO_INCREMENT,
    `usuario`              varchar(40)  NOT NULL,
    `fhemision`            varchar(40)  NOT NULL,
    `numero`               varchar(40)  NOT NULL,
    `letra`                varchar(1)   NOT NULL,
    `id_cliente`           int          NOT NULL,
    `nombre`               varchar(40)          ,
    `apellido`             varchar(40)          ,
    `razon_social`         varchar(40)  NOT NULL,    
    `tipo_documento`       varchar(4)   NOT NULL,
    `documento`            int(30)      NOT NULL,
    `tp_pago`              varchar(40)  NOT NULL,
    `ineto`                int          NOT NULL,
    `ibruto`               int          NOT NULL,
    `piva`                 int          NOT NULL,
    `iiva`                 int          NOT NULL,
    `cobrada`              int          NOT NULL,
    `anulada`              int                  ,
    `fh_anulada`           date                 ,
    `usuario_anulada`      varchar(50)          ,
    `descuento`            int                  ,
    `ibruto_desc`          int                  ,
    `ineto_desc`           int                  , 
    `marca_acopio`         int          NOT NULL,    
    `usu_creacion`         varchar(40)  NOT NULL,
    `fhcreacion`           date         NOT NULL,
    `usu_modif`            varchar(40)  NOT NULL,
    `fhmodif`              timestamp    NOT NULL,
     PRIMARY KEY (`id_recibo`),
     CONSTRAINT `recibo_cliente_fk` FOREIGN KEY (`id_cliente`)  REFERENCES `Cliente` (`id_cliente`)
);
CREATE INDEX  idx_id_recibo ON Licata.`Recibo`(`id_recibo`) USING HASH;
CREATE INDEX  idx_numero_recibo ON Licata.`Recibo`(`numero`) USING HASH;
CREATE INDEX  idx_fhemision_recibo ON Licata.`Recibo`(`fhemision`) USING HASH;

/* TABLA DE DETALLE DE RECIBO */

CREATE TABLE IF NOT EXISTS Licata.`Recibo_Detalle` (
    `id_recibo`            varchar(40)  NOT NULL,
    `item`                 int          NOT NULL,
    `material`             varchar(40)  NOT NULL,
    `cantidad`             int          NOT NULL,   
    `ineto`                int          NOT NULL,
    `iiva`                 int          NOT NULL,
    `descuento`            int                  ,
    `ibruto_desc`          int                  ,
    `ineto_desc`           int                  ,
    `mercaderia_retirada`  int                  ,
    `usu_creacion`         varchar(40)  NOT NULL,
    `fhcreacion`           date         NOT NULL,
    `usu_modif`            varchar(40)  NOT NULL,
    `fhmodif`              timestamp    NOT NULL,
    PRIMARY KEY (`id_recibo`,`item`)
);
CREATE UNIQUE INDEX  idx_recibo_detalle ON Licata.`Recibo_Detalle`(`id_recibo`,`item`) USING HASH;

/* TABLA DE PESO POR DIAMETRO DE VARILLAS */

CREATE TABLE IF NOT EXISTS Licata.`Diametro_Barra_Acero` (
    `diametro`             decimal(6,3) NOT NULL,
    `peso_varilla`         decimal(6,3) NOT NULL,
    `usu_creacion`         varchar(40)  NOT NULL,
    `fhcreacion`           date         NOT NULL,
    `usu_modif`            varchar(40)  NOT NULL,
    `fhmodif`              timestamp    NOT NULL,
    PRIMARY KEY (`diametro`)
);


/* INSERTO USUARIO ADMINISTRADOR */

INSERT INTO Licata.`Usuario` 
(`usuario`,`password`,`nombre`,`apellido`,`email`,`usu_creacion`,`fhcreacion`,`usu_modif`,`fhmodif`)
VALUES 
('admin',MD5('admin'),'Admin','Admin','admin@admin.com','admin',SYSDATE(),'admin',SYSDATE());

/* INSERTO TIPO MATERIAL */

INSERT INTO Licata.`Tipo_Material` 
(`tipo_material`,`descripcion`,`usu_creacion`,`fhcreacion`,`usu_modif`,`fhmodif`)
VALUES 
('1','Materiales Gruesos','admin',SYSDATE(),'admin',SYSDATE()),
('2','Electricidad','admin',SYSDATE(),'admin',SYSDATE()),
('3','Sanitarios','admin',SYSDATE(),'admin',SYSDATE()),
('4','Ferreteria','admin',SYSDATE(),'admin',SYSDATE()),
('5','Ceramicas','admin',SYSDATE(),'admin',SYSDATE()),
('6','Aberturas','admin',SYSDATE(),'admin',SYSDATE());

/* INSERTO DIAMETRO DE VARILLAS */

INSERT INTO Licata.`Diametro_Barra_Acero` 
(`diametro`,`peso_varilla`,`usu_creacion`,`fhcreacion`,`usu_modif`,`fhmodif`)
VALUES 
(6,2.66,'admin',SYSDATE(),'admin',SYSDATE()),
(8,4.74,'admin',SYSDATE(),'admin',SYSDATE()),
(10,7.40,'admin',SYSDATE(),'admin',SYSDATE()),
(12,10.7,'admin',SYSDATE(),'admin',SYSDATE()),
(16,18.9,'admin',SYSDATE(),'admin',SYSDATE()),
(20,29.6,'admin',SYSDATE(),'admin',SYSDATE()),
(25,46.2,'admin',SYSDATE(),'admin',SYSDATE()),
(32,75.7,'admin',SYSDATE(),'admin',SYSDATE()),
(40,118.3,'admin',SYSDATE(),'admin',SYSDATE());


