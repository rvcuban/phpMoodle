create DATABASE if NOT EXISTS lpi_database ;
USE lpi_database ;
CREATE OR REPLACE TABLE login_table(
    id INT PRIMARY KEY AUTO_INCREMENT,
    var_email VARCHAR(50) NOT NULL UNIQUE,
    var_pass VARCHAR(255) NOT NULL,
    var_name VARCHAR(255) NOT NULL,
    var_role VARCHAR(50) NOT NULL DEFAULT 'sin_asignar',
    var_status VARCHAR(10) NOT NULL DEFAULT 'off'
);

INSERT INTO login_table (id, var_email, var_pass,var_name, var_role, var_status) VALUES ('admin','admin','admin','ADMIN','on');
INSERT INTO login_table (id, var_email, var_pass,var_name, var_role, var_status) VALUES ('alumno1','alumno1','Javier','STUDENT','on');
INSERT INTO login_table (id, var_email, var_pass,var_name, var_role, var_status) VALUES ('alumno2','alumno2','Sofia','STUDENT','on');
INSERT INTO login_table (id, var_email, var_pass,var_name, var_role, var_status) VALUES ('profesor1','profesor1','Rodo','DOCENTE','on');
INSERT INTO login_table (id, var_email, var_pass,var_name, var_role, var_status) VALUES ('profesor2','profesor2','manuel','DOCENTE','on');

ALTER TABLE login_table MODIFY COLUMN id INT AUTO_INCREMENT;

CREATE OR REPLACE TABLE courses_table(
    id_cursos INT PRIMARY KEY,
    id_profesor int NOT NULL ,
    nombre_curso VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_profesor) REFERENCES login_table(id)
);

INSERT INTO courses_table(id_cursos,id_profesor,nombre_curso ) VALUES (001,5,'Introduction to Computer Science');
INSERT INTO courses_table(id_cursos,id_profesor,nombre_curso ) VALUES (002,5,'CUANTIC COMPUTERING');
INSERT INTO courses_table(id_cursos,id_profesor,nombre_curso ) VALUES (003,5,'Introduction to Computer Science');
INSERT INTO courses_table(id_cursos,id_profesor,nombre_curso ) VALUES (004,5,'CUANTIC COMPUTERING');
INSERT INTO courses_table(id_cursos,id_profesor,nombre_curso ) VALUES (005,5,'Introduction to Computer Science');
INSERT INTO courses_table(id_cursos,id_profesor,nombre_curso ) VALUES (006,5,'CUANTIC COMPUTERING');
INSERT INTO courses_table(id_cursos,id_profesor,nombre_curso ) VALUES (007,5,'Introduction to Computer Science');
INSERT INTO courses_table(id_cursos,id_profesor,nombre_curso ) VALUES (008,5,'CUANTIC COMPUTERING');
INSERT INTO courses_table(id_cursos,id_profesor,nombre_curso ) VALUES (009,5,'Introduction to Computer Science');
INSERT INTO courses_table(id_cursos,id_profesor,nombre_curso ) VALUES (010,5,'CUANTIC COMPUTERING');


