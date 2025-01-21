-- Crear la base de datos (opcional, puedes omitir si ya tienes una creada)
CREATE DATABASE IF NOT EXISTS mydatabase;
USE mydatabase;

-- Tabla "erabiltzaileak" (antes "ikasleak")
CREATE TABLE erabiltzaileak (
    id INT AUTO_INCREMENT PRIMARY KEY,
    izena VARCHAR(255) NOT NULL,
    abizena VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    pasahitza VARCHAR(255) NOT NULL,
    remember_token VARCHAR(100) NULL,
    jaiotze_data DATE NOT NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabla "moduluak"
CREATE TABLE moduluak (
    id INT AUTO_INCREMENT PRIMARY KEY,
    izena VARCHAR(255) NOT NULL,
    gela DATE NOT NULL
);

-- Tabla intermedia "erabiltzaileak_moduluak" para la relación N:M
CREATE TABLE erabiltzaileak_moduluak (
    erabiltzaile_id INT NOT NULL,
    modulu_id INT NOT NULL,
    PRIMARY KEY (erabiltzaile_id, modulu_id),
    FOREIGN KEY (erabiltzaile_id) REFERENCES erabiltzaileak(id) ON DELETE CASCADE,
    FOREIGN KEY (modulu_id) REFERENCES moduluak(id) ON DELETE CASCADE
);