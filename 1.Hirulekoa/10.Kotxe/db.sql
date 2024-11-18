CREATE DATABASE kotxe_jabe;

USE kotxe_jabe;

CREATE TABLE jabeak (
    id INT AUTO_INCREMENT PRIMARY KEY,
    DNI VARCHAR(9) NOT NULL,
    izena VARCHAR(100) NOT NULL
);

CREATE TABLE kotxeak (
    id INT AUTO_INCREMENT PRIMARY KEY,
    jabea_id INT,
    matrikula VARCHAR(7) NOT NULL,
    matrikulazio_data DATE,
    itv BOOLEAN,
    FOREIGN KEY (jabea_id) REFERENCES jabeak(id) ON DELETE SET NULL
);