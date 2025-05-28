DROP TABLE IF EXISTS `pacientes`;

CREATE TABLE `pacientes` (
  `id`                     INT AUTO_INCREMENT PRIMARY KEY,
  `tipo_documento`         ENUM('CC','CE','TI','Pasaporte','NIUP','Otro') NOT NULL,
  `identificacion`         VARCHAR(50) NOT NULL UNIQUE,
  `nombre`                 VARCHAR(100) NOT NULL,
  `apellidos`              VARCHAR(100) NOT NULL,
  `estado_civil`           ENUM('Soltero','Casado','Unión Libre','Divorciado','Viudo') NOT NULL,
  `genero`                 ENUM('Masculino','Femenino','Otro') NOT NULL,
  `edad`                   INT UNSIGNED NOT NULL,
  `fecha_nacimiento`       DATE NOT NULL,
  `departamento_nacimiento`  VARCHAR(100) NOT NULL,
  `municipio_nacimiento`     VARCHAR(100) NOT NULL,
  `fecha_expedicion`       DATE NOT NULL,
  `departamento_expedicion`  VARCHAR(100) NOT NULL,
  `municipio_expedicion`     VARCHAR(100) NOT NULL,
  `departamento_residencia`  VARCHAR(100) NOT NULL,
  `municipio_residencia`     VARCHAR(100) NOT NULL,
  `direccion`              VARCHAR(255) NOT NULL,
  `correo`                 VARCHAR(100) NOT NULL,
  `eps`                    VARCHAR(100) NOT NULL,
  `regimen`                ENUM('contributivo','subsidiado') NOT NULL,
  `rh`                     ENUM('O+','O-','A+','A-','B+','B-','AB+','AB-') NOT NULL,
  `tipo_enfermedad`        VARCHAR(50) NOT NULL,
  `estrato`                TINYINT UNSIGNED NOT NULL,
  `fecha_registro`         DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX idx_correo (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;






