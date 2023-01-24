CREATE DATABASE LIBRO_RECLAMACIONES;
/***CREACION DE TABLA login***/
CREATE TABLE  usuario(
usu_id int auto_increment not null primary key,
usu_nombre varchar(150)  null,
usu_apellido varchar(150)  null,
usu_correo varchar(150) not null, /**/
usu_password varchar(29) not null, /**/

usu_celular varchar(15) not null, /**/
usu_tipo_documento varchar(150) not null, /**/
usu_numero_documento int not null, /**/
fech_nacimiento datetime not null, /**/


fech_creacion datetime  null,
fech_modificacion datetime  null,
fech_eliminacion datetime  null,
flag int not null /**/
);

INSERT INTO usuario(usu_nombre,usu_apellido,usu_correo,usu_password,usu_celular,usu_tipo_documento,usu_numero_documento,fech_nacimiento,flag) VALUES
('Eduardo','Pacompia','eduardopacompialopez@gmail.com','123456',"987564854",'DNI',23654856,'1986-05-04',1);


SELECT * FROM USUARIO;

SELECT * FROM usuario WHERE usu_correo='eduardopacompialopez@gmail.com' and usu_password='123456' and flag=1
/***********************************  CREANDO  TABLA SEDES ************************************************************/
CREATE TABLE sede (
sede_id int auto_increment not null primary key,
sede_nombre varchar(150) not null,
flag int not null
);

INSERT INTO sede(sede_nombre, flag) VALUES
('DIRCOCOR - SEDE CENTRAL',1),
('DIVINANT',1),
('DIVIDCVCO',1),
('DIVPEICC',1),
('DIVECIPP',1)

SELECT * FROM sede where flag=1

/***********************************  CREANDO  TABLA TIPO_DOCUMENTO ************************************************************/

CREATE TABLE tipo_documento (
tipo_docu_id int auto_increment not null primary key,
tipo_docu_nombre varchar(150) not null,
flag int not null
);

INSERT INTO tipo_documento(tipo_docu_nombre,flag) VALUES
('DNI',1),
('CARNET DE EXTRANJERIA',1),
('CEDULA DE EXTRANJERIA',1),
('SALVO CONDUCTO', 1)


SELECT * FROM tipo_documento

/***********************************  CREANDO  TABLA caso ************************************************************/
CREATE TABLE CASO(
caso_id int auto_increment not null primary key,
usu_id int not null,
sede_id int not null,
caso_date datetime not null,
caso_time datetime not null,
caso_titulo varchar(150) not null,
caso_descripcion varchar(1500) not null,
flag int not null
)


INSERT INTO caso(caso_id,usu_id,sede_id,caso_date,caso_time,caso_titulo,caso_descripcion,flag) VALUES (NULL,?,?,?,?,?,?,1)

select * from caso







