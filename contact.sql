CREATE DATABASE contact;

USE contact;

CREATE TABLE poruke (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ime_prezime VARCHAR(100) NOT NULL,
    broj_telefona VARCHAR(20),
    email VARCHAR(100),
    poruka TEXT,
    datum TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

select * from poruke;