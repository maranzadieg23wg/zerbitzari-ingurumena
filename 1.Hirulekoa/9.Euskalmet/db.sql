-- Crear tabla 'herria'
CREATE OR REPLACE TABLE `herria` (
	`id` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
	`izena` TEXT(65535),
	PRIMARY KEY(`id`)
);

-- Crear tabla 'iragarpen_eguna'
CREATE OR REPLACE TABLE `iragarpen_eguna` (
	`id` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
	`eguna` DATE,
	`eguraldia` TEXT(65535),
	`tenperatura_min` FLOAT,
	`tenperatura_max` FLOAT,
	`herria` INTEGER,
	PRIMARY KEY(`id`),
	-- Establecer la clave foránea correctamente para hacer referencia a 'herria.id'
	FOREIGN KEY(`herria`) REFERENCES `herria`(`id`) 
	ON UPDATE NO ACTION ON DELETE NO ACTION
);

-- Crear tabla 'iragarpena_orduko'
CREATE OR REPLACE TABLE `iragarpena_orduko` (
	`id` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
	`ordua` TIME,
	`eguraldia` TEXT(65535),
	`tenperatura` FLOAT,
	`prezipitazioa` FLOAT,
	`haizea_nondik` TEXT(65535),
	`haizea-km/h` FLOAT,
	`eguna` INTEGER,
	PRIMARY KEY(`id`),
	-- Establecer la clave foránea correctamente para hacer referencia a 'iragarpen_eguna.id'
	FOREIGN KEY(`eguna`) REFERENCES `iragarpen_eguna`(`id`) 
	ON UPDATE NO ACTION ON DELETE NO ACTION
);
