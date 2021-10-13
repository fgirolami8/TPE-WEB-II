-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2021 a las 22:01:48
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_musica2021`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artists`
--

CREATE TABLE `artists` (
  `artist` varchar(45) CHARACTER SET latin1 NOT NULL,
  `beginnings` int(11) NOT NULL,
  `albums` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `artists`
--

INSERT INTO `artists` (`artist`, `beginnings`, `albums`) VALUES
('Callejeros', 1995, 5),
('La Vela Puerca', 1995, 11),
('Los Cafres', 1987, 15),
('NTVG', 1994, 16),
('Patricio Rey y sus Redonditos de Ricota', 1976, 10),
('Soda Estereo', 1982, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `songs`
--

CREATE TABLE `songs` (
  `name` varchar(45) CHARACTER SET latin1 NOT NULL,
  `artist` varchar(45) CHARACTER SET latin1 NOT NULL,
  `genre` varchar(45) CHARACTER SET latin1 NOT NULL,
  `album` varchar(45) CHARACTER SET latin1 NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `songs`
--

INSERT INTO `songs` (`name`, `artist`, `genre`, `album`, `year`) VALUES
('A lo verde', 'La Vela Puerca', 'Rock', 'A contraluz', 2004),
('A pesar', 'Los Cafres', 'Reggae', '¿Quién da más?', 2005),
('Al sol', 'Los Cafres', 'Reggae', '¿Quién da más?', 2005),
('Algo peor, algo mejor', 'Callejeros', 'Rock ', 'Rocanroles sin Destino', 2004),
('Almenos hoy', 'Los Cafres', 'Reggae', '¿Quién da más?', 2005),
('Ángel con campera', 'NTVG', 'Rock', 'Por lo menos hoy', 2010),
('Arde', 'NTVG', 'Rock', 'Por lo menos hoy', 2010),
('Blues de la Artillería', 'Patricio Rey y sus Redonditos de Ricota', 'Rock ', 'La Mosca y la Sopa', 1991),
('Cae el sol', 'Soda Estereo', 'Rock', 'Canción Animal', 1990),
('Caldo precoz', 'La Vela Puerca', 'Rock', 'A contraluz', 2004),
('Canción animal', 'Soda Estereo', 'Rock ', 'Canción Animal', 1990),
('Canciones y almas', 'Callejeros', 'Rock', 'Rocanroles sin Destino', 2004),
('Cero a la izquierda', 'NTVG', 'Rock ', 'Por lo menos hoy', 2010),
('Chau', 'NTVG', 'Rock', 'Por lo menos hoy', 2010),
('Clarobscuro', 'La Vela Puerca', 'Rock', 'A contraluz', 2004),
('Con el viento', 'NTVG', 'Rock ', 'Por lo menos hoy', 2010),
('Con la misma vara', 'NTVG', 'Rock ', 'Por lo menos hoy', 2010),
('De atar', 'La Vela Puerca', 'Rock', 'A contraluz', 2004),
('De música ligera', 'Soda Estereo', 'Rock', 'Canción Animal', 1990),
('Dejá de señalar', 'Los Cafres', 'Reggae', '¿Quién da más?', 2005),
('Despertar', 'Los Cafres', 'Reggae', '¿Quién da más?', 2005),
('Dice', 'La Vela Puerca', 'Rock', 'A contraluz', 2004),
('Distinto', 'Callejeros', 'Rock', 'Rocanroles sin Destino', 2004),
('Doble filo', 'La Vela Puerca', 'Rock', 'A contraluz', 2004),
('El equilibrista', 'NTVG', 'Rock ', 'Por lo menos hoy', 2010),
('El pibe de los Astilleros', 'Patricio Rey y sus Redonditos de Ricota', 'Rock', 'La Mosca y la Sopa', 1991),
('En el limbo', 'La Vela Puerca', 'Rock ', 'A contraluz', 2004),
('En el séptimo día', 'Soda Estereo', 'Rock', 'Canción Animal', 1990),
('Entre caníbales', 'Soda Estereo', 'Rock ', 'Canción Animal', 1990),
('Escobas', 'La Vela Puerca', 'Rock', 'A contraluz', 2004),
('Este jardín', 'Los Cafres', 'Reggae', '¿Quién da más?', 2005),
('Fusilados por la Cruz Roja', 'Patricio Rey y sus Redonditos de Ricota', 'Rock', 'La Mosca y la Sopa', 1991),
('Gran sequía', 'Los Cafres', 'Reggae', '¿Quién da más?', 2005),
('Haciéndose pasar por luz', 'La Vela Puerca', 'Rock', 'A contraluz', 2004),
('Hijo', 'Los Cafres', 'Reggae', '¿Quién da más?', 2005),
('Hombre al agua', 'Soda Estereo', 'Rock', 'Canción Animal', 1990),
('La llave', 'Callejeros', 'Rock', 'Rocanroles sin Destino', 2004),
('Llenos de magia', 'La Vela Puerca', 'Rock', 'A contraluz', 2004),
('Los indiferentes', 'NTVG', 'Rock ', 'Por lo menos hoy', 2010),
('Lúcido', 'Los Cafres', 'Reggae', '¿Quién da más?', 2005),
('Mar de amor', 'Los Cafres', 'Reggae', '¿Quién da más?', 2005),
('Memorias del olvido', 'NTVG', 'Rock', 'Por lo menos hoy', 2010),
('Mi aliento', 'Los Cafres', 'Reggae', '¿Quién da más?', 2005),
('Mi Perro Dinamita', 'Patricio Rey y sus Redonditos de Ricota', 'Rock ', 'La Mosca y la Sopa', 1991),
('Mostrame cómo sos', 'Los Cafres', 'Reggae', '¿Quién da más?', 2005),
('Nueva Roma', 'Patricio Rey y sus Redonditos de Ricota', 'Rock ', 'La Mosca y la Sopa', 1991),
('Nunca más a mi lado', 'NTVG', 'Rock', 'Por lo menos hoy', 2010),
('Parte menor', 'Callejeros', 'Rock ', 'Rocanroles sin Destino', 2004),
('Prohibido', 'Callejeros', 'Rock', 'Rocanroles sin Destino', 2004),
('Pura vida', 'Los Cafres', 'Reggae', '¿Quién da más?', 2005),
('Queso Ruso', 'Patricio Rey y sus Redonditos de Ricota', 'Rock ', 'La Mosca y la Sopa', 1991),
('Rebelde, agitador y revolucionario', 'Callejeros', 'Rock', 'Rocanroles sin Destino', 2004),
('Revelacíon', 'Los Cafres', 'Reggae', '¿Quién da más?', 2005),
('Rocanroles sin destino', 'Callejeros', 'Rock', 'Rocanroles sin Destino', 2004),
('Salando las heridas', 'Patricio Rey y sus Redonditos de Ricota', 'Rock', 'La Mosca y la Sopa', 1991),
('Sé que no sé', 'Callejeros', 'Rock ', 'Rocanroles sin Destino', 2004),
('Sería una pena', 'Callejeros', 'Rock', 'Rocanroles sin Destino', 2004),
('Si el Amor se cae', 'Los Cafres', 'Reggae', '¿Quién da más?', 2005),
('Sin palabras', 'La Vela Puerca', 'Rock', 'A contraluz', 2004),
('Sueles dejarme solo', 'Soda Estereo', 'Rock ', 'Canción Animal', 1990),
('Tan perfecto que asusta', 'Callejeros', 'Rock', 'Rocanroles sin Destino', 2004),
('Tarea Fina', 'Patricio Rey y sus Redonditos de Ricota', 'Rock', 'La Mosca y la Sopa', 1991),
('Té para tres', 'Soda Estereo', 'Rock ', 'Canción Animal', 1990),
('Todo eso', 'Callejeros', 'Rock', 'Rocanroles sin Destino', 2004),
('Toxi-Taxi', 'Patricio Rey y sus Redonditos de Ricota', 'Rock ', 'La Mosca y la Sopa', 1991),
('Tratando de olvidar', 'Callejeros', 'Rock', 'Rocanroles sin Destino', 2004),
('Tu defecto es el mio', 'NTVG', 'Rock ', 'Por lo menos hoy', 2010),
('Tu voz', 'Los Cafres', 'Reggae', '¿Quién da más?', 2005),
('Un frasco', 'La Vela Puerca', 'Rock', 'A contraluz', 2004),
('Un lugar perfecto', 'Callejeros', 'Rock', 'Rocanroles sin Destino', 2004),
('Un millón de años luz', 'Soda Estereo', 'Rock', 'Canción Animal', 1990),
('Un Poco de Amor Francés', 'Patricio Rey y sus Redonditos de Ricota', 'Rock', 'La Mosca y la Sopa', 1991),
('Va a escampar', 'La Vela Puerca', 'Rock', 'A contraluz', 2004),
('Volar', 'NTVG', 'Rock', 'Por lo menos hoy', 2010),
('Zafar', 'La Vela Puerca', 'Rock', 'A contraluz', 2004);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user`, `password`) VALUES
('brian', '$2y$10$ytBuHvBzz0N0nZizMmfwcOczfDFpAPpHVgFEa6ZGRxcdsBkupF/gy');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`artist`);

--
-- Indices de la tabla `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`name`),
  ADD KEY `artist` (`artist`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`artist`) REFERENCES `artists` (`artist`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
