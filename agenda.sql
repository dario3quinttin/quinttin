-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2024 a las 15:50:29
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amigos`
--

CREATE TABLE `amigos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `aPaterno` varchar(50) DEFAULT NULL,
  `aMaterno` varchar(50) DEFAULT NULL,
  `apodo` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `cumpleanos` date DEFAULT NULL,
  `codigo_postal` varchar(50) DEFAULT NULL,
  `hobbies` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `amigos`
--

INSERT INTO `amigos` (`id`, `nombre`, `aPaterno`, `aMaterno`, `apodo`, `direccion`, `telefono`, `cumpleanos`, `codigo_postal`, `hobbies`) VALUES
(101, 'Diego', 'Garcia', 'Ortega', 'eldedotes', 'cuautitlan', '5518394345', '2007-07-11', '54850', 'chaqueta'),
(102, 'Allison', 'Candelario', 'Crespo', 'Candela', 'Cuautitlan', '555-123-45', '2007-07-13', '14578', 'Bailar'),
(103, 'Mayrim', 'suarez', 'chavarria', NULL, 'cuautitlan', '5619404446', '2007-12-16', '54840', NULL),
(104, 'Alejandro', 'Soberanis', 'Silva', NULL, 'Cuautitlan', '55647856', '2007-07-20', '786511', NULL),
(105, 'Vanessa', 'Garcia', 'Mu?oz', NULL, 'Cuautitlan', '5522935416', '2007-07-14', '54840', NULL),
(106, 'Yerik', 'Rojas', 'Juarez', NULL, 'Cuautitlan', '5636911391', '2007-05-22', '55850', NULL),
(107, 'Bruno', 'Rueda', 'Sosa', NULL, 'Cuautitlan', '5585678575', '2007-04-10', '54831', NULL),
(108, 'Jennifer Aylin', 'Rios', 'Manjarrez', NULL, 'Cuautitlan', '5610038382', '2007-07-27', '54840', NULL),
(109, 'Alejandro', 'Soberanis', 'Silva', NULL, 'Cuautitlan', '55647856', '2007-07-20', '786511', NULL),
(110, 'Mayrin', 'Serrano', 'Becerril', NULL, 'Cuautitlan', '5535459550', '2007-03-14', '2148724', NULL),
(111, 'Angel', 'Pallares', 'Segundo', NULL, 'Cuautitlan', '5565637776', '2007-12-21', '54850', NULL),
(112, 'Iris', 'Montoya', 'Palacios', NULL, 'Cuautitlan', '5554622574', '0000-00-00', '54831', NULL),
(113, 'Miguel', 'Martinez', 'Rivera', NULL, 'Cuatitlan', '5612660032', '2007-07-28', '54840', NULL),
(114, 'Alan', 'Briones', 'Galvan', NULL, 'Tultitlan', '5581948777', '2007-12-15', '54930', NULL),
(115, 'Angel', 'Cortes', 'Arenas', NULL, 'Cuautitlan', '5547865809', '2007-09-26', '54832', NULL),
(116, 'Dana', 'Flores', 'Hernandez', NULL, 'Cuautitlan', '5586117450', '2007-11-06', '55864', NULL),
(117, 'Valeria', 'Vivas', 'Vargas', NULL, 'Cuautitlan', '5530730418', '2007-01-19', '58040', NULL),
(118, 'Jonathan Alexander', 'Aguirre', 'Chavez', NULL, 'Cuautitlan', '5531760952', '2007-09-29', '54803', NULL),
(119, 'Emiliano Tonatiuh', 'Ramirez', 'Velazquez', NULL, 'Cuautitlan', '5533108676', '2007-09-22', '54803', NULL),
(120, 'jacqueline', 'crespo', 'candelario', 'Candela', 'Cuautitlan', '5535373728', '2007-07-13', '54850', 'Bailar'),
(121, 'Juan', 'Garc?a', 'L?pez', NULL, 'Cuautitl?n', '555-123-45', '1990-05-15', '12345', NULL),
(122, 'Mar?a', 'Mart?nez', 'Hern?ndez', NULL, 'Cuautitl?n', '555-234-56', '1988-09-20', '23456', NULL),
(123, 'Carlos', 'Rodr?guez', 'G?mez', NULL, 'Cuautitl?n', '555-345-67', '1995-03-10', '34567', NULL),
(124, 'Laura', 'Hern?ndez', 'P?rez', NULL, 'Cuautitl?n', '555-456-78', '1992-11-25', '45678', NULL),
(125, 'Jorge', 'L?pez', 'D?az', NULL, 'Cuautitl?n', '555-567-89', '1987-07-30', '56789', NULL),
(126, 'Ana', 'G?mez', 'S?nchez', NULL, 'Cuautitl?n', '555-678-90', '1993-02-05', '67890', NULL),
(127, 'Pedro', 'P?rez', 'Mart?nez', NULL, 'Cuautitl?n', '555-789-01', '1991-08-12', '78901', NULL),
(128, 'Sof?a', 'S?nchez', 'Gonz?lez', NULL, 'Cuautitl?n', '555-890-12', '1989-04-18', '89012', NULL),
(129, 'Miguel', 'D?az', 'Romero', NULL, 'Cuautitl?n', '555-901-23', '1994-06-23', '90123', NULL),
(130, 'Elena', 'Flores', 'Torres', NULL, 'Cuautitl?n', '555-012-34', '1997-01-08', '1234', NULL),
(131, 'Daniel', 'Romero', 'V?zquez', NULL, 'Cuautitl?n', '555-123-45', '1986-12-03', '56789', NULL),
(132, 'Lucia', 'Torres', 'Santos', 'leandro', 'Cuautitlan', '555-234-56', '1996-10-17', '23456', 'gym'),
(134, 'Diego', 'García', 'Ortega', 'guero', 'Cuautitlan', '5518394345', '2007-07-11', '54850', 'gym'),
(135, 'benito', 'García', 'Ortega', 'guero', 'Cuautitlan', '5518394345', '2024-05-18', '54850', 'gym'),
(136, 'Alejandro', 'reyes', 'escalona', 'toledo', 'jdfiuvhirewew', '77665566', '2007-03-31', '54850', 'chaquetear');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
