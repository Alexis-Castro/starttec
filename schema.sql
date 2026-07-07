CREATE DATABASE IF NOT EXISTS devwebcamp
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE devwebcamp;

-- ============================================
-- Tabla: usuarios
-- ============================================
CREATE TABLE IF NOT EXISTS usuarios (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    confirmado TINYINT(1) NOT NULL DEFAULT 0,
    token VARCHAR(255) DEFAULT NULL,
    admin TINYINT(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB;

-- ============================================
-- Tabla: categorias (de proyectos)
-- ============================================
CREATE TABLE IF NOT EXISTS categorias (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

-- ============================================
-- Tabla: cargos
-- ============================================
CREATE TABLE IF NOT EXISTS cargos (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

-- ============================================
-- Tabla: proyectos
-- ============================================
CREATE TABLE IF NOT EXISTS proyectos (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    link_video VARCHAR(500) DEFAULT NULL,
    imagen_previa VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    categoria_id INT UNSIGNED NOT NULL,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ============================================
-- Tabla: imagenes_proyecto (galería)
-- ============================================
CREATE TABLE IF NOT EXISTS imagenes_proyecto (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    imagen VARCHAR(255) NOT NULL,
    proyecto_id INT UNSIGNED NOT NULL,
    FOREIGN KEY (proyecto_id) REFERENCES proyectos(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ============================================
-- Tabla: personal (equipo)
-- ============================================
CREATE TABLE IF NOT EXISTS personal (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    imagen VARCHAR(255) NOT NULL,
    cargo_id INT UNSIGNED NOT NULL,
    redes VARCHAR(500) DEFAULT NULL,
    FOREIGN KEY (cargo_id) REFERENCES cargos(id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ============================================
-- Tabla: servicios
-- ============================================
CREATE TABLE IF NOT EXISTS servicios (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    imagen VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE
) ENGINE=InnoDB;

-- ============================================
-- Tabla: empresa (info de la compañía)
-- ============================================
CREATE TABLE IF NOT EXISTS empresa (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    ciudad VARCHAR(100) NOT NULL,
    video_inicio VARCHAR(255) DEFAULT NULL,
    imagen_inicio VARCHAR(255) NOT NULL,
    nro_clientes VARCHAR(10) NOT NULL,
    nro_proyectos VARCHAR(10) NOT NULL,
    nro_years VARCHAR(10) NOT NULL
) ENGINE=InnoDB;

-- ============================================
-- Tabla: contactos
-- ============================================
CREATE TABLE IF NOT EXISTS contactos (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(150) NOT NULL,
    asunto VARCHAR(255) DEFAULT NULL,
    email VARCHAR(255) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    mensaje TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- Tabla: cotizaciones
-- ============================================
CREATE TABLE IF NOT EXISTS cotizaciones (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(150) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    servicio VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ============================================
-- Tabla: newsletter
-- ============================================
CREATE TABLE IF NOT EXISTS newsletter (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
