CREATE DATABASE senatilib;
USE senatilib;

CREATE TABLE categorias(
	idcategoria  INT AUTO_INCREMENT PRIMARY KEY,
	categoria 		VARCHAR(50) NOT NULL,
	imgdefault		VARCHAR(100),
	estado			CHAR(1) NOT NULL DEFAULT '1',
	create_at		DATETIME NOT NULL DEFAULT NOW(),
	update_at		DATETIME NULL,
	
	CONSTRAINT uk_categoria_cat UNIQUE (categoria)
)ENGINE = INNODB;

INSERT INTO categorias(categoria, imgdefault) VALUES
('informática', 'informatica.jpg'),
('Matematicas', 'matematica.jpg'),
('Comunicación', 'comunicacion.jpg');

CREATE TABLE subcategorias(
	idsubcategoria			INT AUTO_INCREMENT PRIMARY KEY,
	idcategoria				INT NOT NULL,
	subcategoria			VARCHAR(70) NOT NULL,
	estado					CHAR(1) NOT NULL DEFAULT '1',
	create_at				DATETIME NOT NULL DEFAULT NOW(),
	update_at				DATETIME NULL,
	
	CONSTRAINT fk_idcategoria_sub	FOREIGN KEY (idcategoria) REFERENCES categorias(idcategoria),
	CONSTRAINT uk_subcategoria_sub UNIQUE(subcategoria)
)ENGINE = INNODB;
	

INSERT INTO subcategorias(idcategoria, subcategoria) VALUES
(1, 'Microsoft office'),
(1, 'Base e datos'),
(1,'Seguridad informatica'),
(1, 'programación'),
(1, 'diseño grafico');

CREATE TABLE editoriales(
	ideditorial 		INT AUTO_INCREMENT PRIMARY KEY,
	editorial			VARCHAR(150) NOT NULL,
	pais					CHAR(2) NOT NULL,
	email					VARCHAR(150) ,
	telefono 			VARCHAR(15) ,
	estado				CHAR(1) NOT NULL DEFAULT '1',
	create_at			DATETIME NOT NULL DEFAULT NOW(),
	update_at			DATETIME NULL,
	
	CONSTRAINT uk_editorial_ed UNIQUE(editorial, pais)
	
)ENGINE = INNODB;

INSERT INTO editoriales(editorial, pais) VALUES
('Apress', 'US'),
('Progmatic', 'ES'),
('Macro','PE');

CREATE TABLE materiales(
	idmaterial 			INT AUTO_INCREMENT PRIMARY KEY,
	idsubcategoria		INT NOT NULL,
	ideditorial			INT NULL,
	titulo				VARCHAR(200) NOT NULL,
	sinopsis				VARCHAR(300) NOT NULL,
	versionmat			TINYINT	NOT NULL DEFAULT 1,
	autor					VARCHAR(1000) NOT NULL,
	cantidadpaginas	SMALLINT NOT NULL,
	apublicacion		CHAR(4) NOT NULL,
	caratula				VARCHAR(100) NULL,
	materialpdf			VARCHAR(100) NOT NULL,
	estado				CHAR(1) NOT NULL DEFAULT '1',
	create_at			DATETIME NOT NULL DEFAULT NOW(),
	update_at			DATETIME NULL,
	
	CONSTRAINT fk_idsubcategoria_mat FOREIGN KEY (idsubcategoria) REFERENCES subcategorias(idsubcategoria),
	CONSTRAINT fk_editoriales_mat FOREIGN KEY (ideditorial) REFERENCES editoriales(ideditorial)
	
)ENGINE = INNODB;


INSERT INTO materiales(idsubcategoria, ideditorial, titulo, sinopsis, autor, cantidadpaginas,apublicacion, materialpdf)
VALUES
(1,3,'Aprende Exel Facil', 'MS EXCEL 365, Integracion con Power BI', 'Carlos Prada', 3000, '2022', 'ruta'),
(4,1,'JS como debe ser', 'Aprende js desde cero', 'Moran gozales', 100, '2022', 'ruta');
