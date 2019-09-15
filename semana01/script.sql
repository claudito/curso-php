
-- Base de Datos
CREATE DATABASE db_curso_php;


-- Tabla
CREATE TABLE alumno(

codigo int auto_increment primary key,
nombres varchar(100),
apellidos varchar(100),
fecha_nacimiento date

)ENGINE=INNODB;

-- INSERT
-- 1990-07-15

INSERT INTO alumno(nombres,apellidos,fecha_nacimiento)
VALUES
('LUIS','CLAUDIO','1990-07-15'),
('OMAR','FERNANDEZ','1998-09-12'),
('MARIA','TORRES','2000-09-09');

-- SELECT

SELECT 

codigo,
nombres,
apellidos,
fecha_nacimiento

FROM alumno;
