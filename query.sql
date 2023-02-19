select * from [dbo].[registros_new]
CREATE TABLE registros_new (
    id INT PRIMARY KEY IDENTITY(1,1),
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    direccion VARCHAR(100) NOT NULL,
    distrito VARCHAR(50) NOT NULL,
    edad INT NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    genero VARCHAR(10) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    comentario VARCHAR(500) NOT NULL
);

SELECT id, nombre, apellido, '', '', edad, '', email, telefono, '' FROM registros;

INSERT INTO registros_new (id, nombre, apellido, direccion, distrito, edad, fecha_nacimiento, genero, email, telefono, comentario)
SELECT id, nombre, apellido, '', '', edad, '', '', email, telefono, '' FROM registros;

SET IDENTITY_INSERT registros_new ON;

INSERT INTO registros_new (id, nombre, apellido, direccion, distrito, edad, fecha_nacimiento, genero, email, telefono, comentario)
SELECT id, nombre, apellido, '', '', edad, '', genero, email, telefono, ''
FROM registros;

SET IDENTITY_INSERT registros_new OFF;

