CREATE TABLE student (
    id int,
    name VARCHAR(255)
);

INSERT INTO student(id, name) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C');

CREATE TABLE myblob (
    id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name varchar(255) NOT NULL,
    mime varchar(255) NOT NULL,
    data LONGBLOB NOT NULL
);