CREATE DATABASE contact;

USE contact;

CREATE TABLE poruke (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ime_prezime NCHAR(100) NOT NULL,
    broj_telefona INT(20),
    email NCHAR(100),
    poruka TEXT,
    datum TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

select * from poruke;
