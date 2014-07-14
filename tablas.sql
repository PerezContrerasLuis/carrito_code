CREATE DATABASE carritoci

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `opcion` varchar(200) NOT NULL,
  `opciones` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;


INSERT INTO `productos` (`id`, `nombre`, `precio`, `imagen`, `opcion`, `opciones`) VALUES
(1, 'enfermera', '6.99', 'enfermera.jpg', 'color', 'rojo,azul,rosa'),
(2, 'profesora', '5.99', 'profesora.jpg', 'asignatura', 'ingles, matematicas'),
(3, 'perritos', '4.99', 'perritos.jpg', 'color', 'negro,marron,blanco'),
(4, 'gatitos', '4.99', 'gatitos.jpg', 'color', 'negro,marron,blanco'),
(9, 'Chupetes', '1.99', 'IMG-20121011-WA0011.jpg', 'color', 'azul,amarillo,verde,naranja,rojo,rosa'),
(10, 'Campanas', '1.99', 'IMG-20121011-WA0010.jpg', 'color', 'azul,amarillo,verde,naranja,rojo,rosa'),
(11, 'Cestito', '1.99', 'IMG-20121011-WA0015.jpg', 'color', 'amarillo, azul, naranja, rojo, rosa, verde'),
(12, 'Camping', '1.99', 'IMG-20121011-WA0014.jpg', 'color', 'amarillo, azul, naranja, rojo, rosa, verde'),
(13, 'Cochecito', '2.99', 'IMG-20121011-WA0000.jpg', 'color', 'amarillo, azul, naranja, rojo, rosa, verde'),
(14, 'Flores', '1.99', 'IMG-20121011-WA0018.jpg', 'color', 'amarillo, azul, naranja, rojo, rosa, verde'),
(15, 'Vestidito', '1.99', 'IMG-20121011-WA0008.jpg', 'color', 'amarillo, azul, naranja, rojo, rosa, verde'),
(16, 'Packs', '3.99', 'IMG-20121011-WA0013.jpg', 'color', 'amarillo, azul, naranja, rojo, rosa, verde');
