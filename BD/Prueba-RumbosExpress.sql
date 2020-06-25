-- PUNTO 3 --

CREATE DATABASE IF NOT EXISTS prueba;
USE prueba;


-- Tabla APPX_educationlevel
DROP TABLE IF EXISTS APPX_educationlevel;

CREATE TABLE APPX_educationlevel(
  id INT(11) NOT NULL AUTO_INCREMENT,
  description VARCHAR(100) NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO APPX_educationlevel (description) VALUES
('Bachiller Académico'),
('Técnico'),
('Tecnólogo'),
('Profesional'),
('Especialización'),
('Maestría'),
('Doctorado');

-- Tabla APPX_department
DROP TABLE IF EXISTS APPX_department;

CREATE TABLE APPX_department(
  id INT(11) NOT NULL AUTO_INCREMENT,
  department_name VARCHAR(255) NOT NULL DEFAULT '',
  department_city VARCHAR(255) NOT NULL DEFAULT '',
  PRIMARY KEY (id)
);

INSERT INTO APPX_department(department_name, department_city) VALUES
('Antioquia', 'Medellin'), ('Atlántico', 'Barranquilla'), ('Bogotá', 'Bogotá'), ('Bolívar', 'Cartagena'), ('Boyacá', 'Tunja'),
('Caldas', 'Manizales'), ('Caquetá', 'Florencia'), ('Cauca', 'Popayán'), ('Cesar', 'Valledupar'), ('Córdoba', 'Montería'),
('Cundinamarca', 'Bogotá'), ('Chocó', 'Quibdó'), ('Huila', 'Neiva'), ('La Guajira', 'Riohacha'), ('Magdalena', 'Santa Marta'),
('Meta', 'Villavicencio'), ('Nariño', 'Pasto'), ('Norte de Santander', 'Cúcuta'), ('Quindio', 'Armenia'), ('Risaralda', 'Pereira'),
('Santander', 'Bucaramanga'), ('Sucre', 'Sincelejo'), ('Tolima', 'Ibagué'), ('Valle del Cauca', 'Cali'), ('Arauca', 'Arauca'),
('Casanare', 'Yopal'), ('Putumayo', 'Mocoa'), ('San Andrés y Providencia', 'San Andrés'), ('Amazonas', 'Leticia'), ('Guainía', 'Inírida'),
('Guaviare', 'San José del Guaviare'), ('Vaupés', 'Mitú'), ('Vichada', 'Puerto Carreño');

-- Tabla APPX_employee
DROP TABLE IF EXISTS APPX_employee;

CREATE TABLE APPX_employee(
  id INT(11) NOT NULL AUTO_INCREMENT,
  firstname VARCHAR(60) NOT NULL,
  lastname VARCHAR(60) NOT NULL,
  department_id INT(11) NOT NULL,
  salary DECIMAL NOT NULL,
  educationlevel_id INT(11) NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT FK_department FOREIGN KEY (department_id) REFERENCES APPX_department(id),
  CONSTRAINT FK_educationlevel FOREIGN KEY (educationlevel_id) REFERENCES APPX_educationlevel(id)
);

INSERT INTO APPX_employee (firstname, lastname, department_id, salary, educationlevel_id) VALUES
('Fernando','Perez',1,100000,2),
('Juan','Garcia',3,150050,3),
('Luz','González',23,200000,4),
('Sara','Alvarez',15,400000,5),
('Raul','Gutierrez',19,500000,6),
('Alejandro','Moreno',3,450000,7),
('Ana','Castro',1,230000,7),
('Emma','Torres',23,430000,6),
('Manuel','Iglesias',1,660000,5),
('Mariana','Vidal',3,340000,4),
('Felipe','Lozano',28,750000,3),
('Alberto','Castillo',24,120000,2),
('Andres','Molina',23,150000,2),
('Hugo','Flores',3,160000,3),
('Hector','Montes',31,340000,4),
('Andrea','Duran',17,560000,5),
('Amparo','Sierra',24,230000,6),
('Alexandra','Cortes',3,890000,7);


-- PUNTO 4 --
/*Cree una consulta SQL que devuelva como resultado el listado de personas y su nivel de
educación para las personas que trabajan en departamentos en donde la suma de los sueldos
de los empleados que los integran es superior a 300000. Debe mostrar el apellido de la
persona (lastname) y el nivel de educacional (description de la tabla educationlevel). Y debe
estar ordenado por apellido.*/

SELECT e.lastname, l.description FROM APPX_employee e
INNER JOIN APPX_department d ON e.department_id = d.id
INNER JOIN APPX_educationlevel l ON e.educationlevel_id = l.id
GROUP BY e.department_id HAVING SUM(e.salary) > 300000
ORDER BY e.lastname;