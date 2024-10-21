-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 21-10-2024 a las 03:23:43
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
-- Base de datos: `data-jugadores`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clubes`
--

CREATE TABLE `clubes` (
  `id` int(11) NOT NULL,
  `Club` varchar(50) NOT NULL,
  `Liga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clubes`
--

INSERT INTO `clubes` (`id`, `Club`, `Liga`) VALUES
(1, 'FC Barcelona', 'España'),
(2, 'Real Madrid CF', 'Espana'),
(3, 'Newcastle United', 'Inglaterra'),
(5, 'Bayern Munich', 'Alemania'),
(20, 'Villareal', 'Espana'),
(21, 'Inter ', 'Italia'),
(22, 'Milan', 'Italia'),
(24, 'River Plate', 'Argentina'),
(26, 'Ferro', 'Argentina'),
(27, 'Al-Hilal', 'Arabia'),
(28, 'Barcelona', 'Espana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `ID_Jugador` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Posicion` varchar(50) NOT NULL,
  `Nacimiento` date NOT NULL,
  `id_club` int(11) NOT NULL,
  `Nacionalidad` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`ID_Jugador`, `Nombre`, `Posicion`, `Nacimiento`, `id_club`, `Nacionalidad`) VALUES
(37, 'Dolarsito Echeverry', 'Mediocampista', '2006-08-10', 24, 'Argentina'),
(38, 'Jamal Musiala', 'Mediocampista', '2003-10-24', 5, 'Alemania'),
(40, 'Patito Brey', 'Arquero', '2002-11-13', 1, 'Argentina'),
(43, 'Thiago Alcantara', 'Mediocampista', '1996-07-25', 5, 'Espana'),
(44, 'Lamine Yamal', 'Extremo Derecho', '2007-09-13', 1, 'Espana\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `contrasena` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `contrasena`) VALUES
(1, 'webadmin', '$2y$10$SQ9LCfDGsVXQEr0Eftx30O3K9ut/Y8ZfvJDVxeiFDeaOrRRvyGZa2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clubes`
--
ALTER TABLE `clubes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`ID_Jugador`),
  ADD KEY `id` (`id_club`) USING BTREE;

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clubes`
--
ALTER TABLE `clubes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `ID_Jugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `jugadores_ibfk_1` FOREIGN KEY (`id_club`) REFERENCES `clubes` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
