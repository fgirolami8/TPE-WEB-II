-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2021 a las 14:40:19
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

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
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `comment` varchar(45) COLLATE utf8mb4_bin NOT NULL,
  `score` int(10) NOT NULL,
  `song` int(11) NOT NULL,
  `user` varchar(45) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `name` varchar(45) CHARACTER SET latin1 NOT NULL,
  `artist` varchar(45) CHARACTER SET latin1 NOT NULL,
  `genre` varchar(45) CHARACTER SET latin1 NOT NULL,
  `album` varchar(45) CHARACTER SET latin1 NOT NULL,
  `year` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `songs`
--

INSERT INTO `songs` (`id`, `name`, `artist`, `genre`, `album`, `year`, `image`) VALUES
(4, 'Algo peor, algo mejor', 'Callejeros', 'Rock ', 'Rocanroles sin Destino', 2004, ''),
(5, 'Almenos hoy', 'Los Cafres', 'Reggae', '¿Quién da más?', 2005, ''),
(6, 'Ángel con campera', 'NTVG', 'Rock', 'Por lo menos hoy', 2010, ''),
(7, 'Arde', 'NTVG', 'Rock', 'Por lo menos hoy', 2010, ''),
(8, 'Blues de la Artillería', 'Patricio Rey y sus Redonditos de Ricota', 'Rock ', 'La Mosca y la Sopa', 1991, ''),
(9, 'Cae el sol', 'Soda Estereo', 'Rock', 'Canción Animal', 1990, ''),
(10, 'Caldo precoz', 'La Vela Puerca', 'Rock', 'A contraluz', 2004, ''),
(11, 'Canción animal', 'Soda Estereo', 'Rock ', 'Canción Animal', 1990, ''),
(12, 'Canciones y almas', 'Callejeros', 'Rock', 'Rocanroles sin Destino', 2004, ''),
(13, 'Cero a la izquierda', 'NTVG', 'Rock ', 'Por lo menos hoy', 2010, ''),
(14, 'Chau', 'NTVG', 'Rock', 'Por lo menos hoy', 2010, ''),
(15, 'Clarobscuro', 'La Vela Puerca', 'Rock', 'A contraluz', 2004, ''),
(16, 'Con el viento', 'NTVG', 'Rock ', 'Por lo menos hoy', 2010, ''),
(17, 'Con la misma vara', 'NTVG', 'Rock ', 'Por lo menos hoy', 2010, ''),
(18, 'De atar', 'La Vela Puerca', 'Rock', 'A contraluz', 2004, ''),
(19, 'De música ligera', 'Soda Estereo', 'Rock', 'Canción Animal', 1990, ''),
(20, 'Dejá de señalar', 'Los Cafres', 'Reggae', '¿Quién da más?', 2005, ''),
(21, 'Despertar', 'Los Cafres', 'Reggae', '¿Quién da más?', 2005, ''),
(22, 'Dice', 'La Vela Puerca', 'Rock', 'A contraluz', 2004, ''),
(23, 'Distinto', 'Callejeros', 'Rock', 'Rocanroles sin Destino', 2004, ''),
(24, 'Doble filo', 'La Vela Puerca', 'Rock', 'A contraluz', 2004, ''),
(25, 'El equilibrista', 'NTVG', 'Rock ', 'Por lo menos hoy', 2010, ''),
(26, 'El pibe de los Astilleros', 'Patricio Rey y sus Redonditos de Ricota', 'Rock', 'La Mosca y la Sopa', 1991, ''),
(27, 'En el limbo', 'La Vela Puerca', 'Rock ', 'A contraluz', 2004, ''),
(28, 'En el séptimo día', 'Soda Estereo', 'Rock', 'Canción Animal', 1990, ''),
(29, 'Entre caníbales', 'Soda Estereo', 'Rock ', 'Canción Animal', 1990, ''),
(30, 'Escobas', 'La Vela Puerca', 'Rock', 'A contraluz', 2004, ''),
(31, 'Este jardín', 'Los Cafres', 'Reggae', '¿Quién da más?', 2005, ''),
(32, 'Fusilados por la Cruz Roja', 'Patricio Rey y sus Redonditos de Ricota', 'Rock', 'La Mosca y la Sopa', 1991, ''),
(33, 'Gran sequía', 'Los Cafres', 'Reggae', '¿Quién da más?', 2005, ''),
(34, 'Haciéndose pasar por luz', 'La Vela Puerca', 'Rock', 'A contraluz', 2004, ''),
(35, 'Hijo', 'Los Cafres', 'Reggae', '¿Quién da más?', 2005, ''),
(36, 'Hombre al agua', 'Soda Estereo', 'Rock', 'Canción Animal', 1990, ''),
(37, 'La llave', 'Callejeros', 'Rock', 'Rocanroles sin Destino', 2004, ''),
(38, 'Llenos de magia', 'La Vela Puerca', 'Rock', 'A contraluz', 2004, ''),
(39, 'Los indiferentes', 'NTVG', 'Rock ', 'Por lo menos hoy', 2010, ''),
(40, 'Lúcido', 'Los Cafres', 'Reggae', '¿Quién da más?', 2005, ''),
(41, 'Mar de amor', 'Los Cafres', 'Reggae', '¿Quién da más?', 2005, ''),
(42, 'Memorias del olvido', 'NTVG', 'Rock', 'Por lo menos hoy', 2010, ''),
(43, 'Mi aliento', 'Los Cafres', 'Reggae', '¿Quién da más?', 2005, ''),
(44, 'Mi Perro Dinamita', 'Patricio Rey y sus Redonditos de Ricota', 'Rock ', 'La Mosca y la Sopa', 1991, ''),
(45, 'Mostrame cómo sos', 'Los Cafres', 'Reggae', '¿Quién da más?', 2005, ''),
(46, 'Nueva Roma', 'Patricio Rey y sus Redonditos de Ricota', 'Rock ', 'La Mosca y la Sopa', 1991, ''),
(47, 'Nunca más a mi lado', 'NTVG', 'Rock', 'Por lo menos hoy', 2010, ''),
(48, 'Parte menor', 'Callejeros', 'Rock ', 'Rocanroles sin Destino', 2004, ''),
(49, 'Prohibido', 'Callejeros', 'Rock', 'Rocanroles sin Destino', 2004, ''),
(50, 'Pura vida', 'Los Cafres', 'Reggae', '¿Quién da más?', 2005, ''),
(51, 'Queso Ruso', 'Patricio Rey y sus Redonditos de Ricota', 'Rock ', 'La Mosca y la Sopa', 1991, ''),
(52, 'Rebelde, agitador y revolucionario', 'Callejeros', 'Rock', 'Rocanroles sin Destino', 2004, ''),
(53, 'Revelacíon', 'Los Cafres', 'Reggae', '¿Quién da más?', 2005, ''),
(54, 'Rocanroles sin destino', 'Callejeros', 'Rock', 'Rocanroles sin Destino', 2004, ''),
(55, 'Salando las heridas', 'Patricio Rey y sus Redonditos de Ricota', 'Rock', 'La Mosca y la Sopa', 1991, ''),
(56, 'Sé que no sé', 'Callejeros', 'Rock ', 'Rocanroles sin Destino', 2004, ''),
(57, 'Sería una pena', 'Callejeros', 'Rock', 'Rocanroles sin Destino', 2004, ''),
(58, 'Si el Amor se cae', 'Los Cafres', 'Reggae', '¿Quién da más?', 2005, ''),
(59, 'Sin palabras', 'La Vela Puerca', 'Rock', 'A contraluz', 2004, ''),
(60, 'Sueles dejarme solo', 'Soda Estereo', 'Rock ', 'Canción Animal', 1990, ''),
(61, 'Tan perfecto que asusta', 'Callejeros', 'Rock', 'Rocanroles sin Destino', 2004, ''),
(62, 'Tarea Fina', 'Patricio Rey y sus Redonditos de Ricota', 'Rock', 'La Mosca y la Sopa', 1991, ''),
(63, 'Té para tres', 'Soda Estereo', 'Rock ', 'Canción Animal', 1990, ''),
(64, 'Todo eso', 'Callejeros', 'Rock', 'Rocanroles sin Destino', 2004, ''),
(65, 'Toxi-Taxi', 'Patricio Rey y sus Redonditos de Ricota', 'Rock ', 'La Mosca y la Sopa', 1991, ''),
(66, 'Tratando de olvidar', 'Callejeros', 'Rock', 'Rocanroles sin Destino', 2004, ''),
(67, 'Tu defecto es el mio', 'NTVG', 'Rock ', 'Por lo menos hoy', 2010, ''),
(68, 'Tu voz', 'Los Cafres', 'Reggae', '¿Quién da más?', 2005, ''),
(69, 'Un frasco', 'La Vela Puerca', 'Rock', 'A contraluz', 2004, ''),
(70, 'Un lugar perfecto', 'Callejeros', 'Rock', 'Rocanroles sin Destino', 2004, ''),
(71, 'Un millón de años luz', 'Soda Estereo', 'Rock', 'Canción Animal', 1990, ''),
(72, 'Un Poco de Amor Francés', 'Patricio Rey y sus Redonditos de Ricota', 'Rock', 'La Mosca y la Sopa', 1991, ''),
(73, 'Va a escampar', 'La Vela Puerca', 'Rock', 'A contraluz', 2004, ''),
(74, 'Volar', 'NTVG', 'Rock', 'Por lo menos hoy', 2010, ''),
(75, 'Zafar', 'La Vela Puerca', 'Rock', 'A contraluz', 2004, ''),
(81, 'A lo verde', 'Callejeros', 'gyf', '5fd', 56, ''),
(95, 'a', 'Callejeros', '123', '123', 1, ''),
(97, 'qwe', 'NTVG', 'wq', 'asda', 3, ''),
(107, 'franconon', 'Callejeros', 'iubug', 'ytvytv', 875687, 'images/songsImages/619e3ec6e04d46.13190769.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(100) NOT NULL,
  `rol` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user`, `password`, `rol`) VALUES
('a', '$2y$10$A7cqyaTF825cMF43QUKjRec1fDTqs6NKaS/3PYc3b4pbsxuYKLrlu', 0),
('fran', '$2y$10$bYGRhBFgpnORHvL1FRtdg.jdNEHJRsPzY4Tpvl0XBayrviybljV1q', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`artist`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comments_songs` (`song`),
  ADD KEY `fk_comments_users` (`user`);

--
-- Indices de la tabla `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist` (`artist`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT de la tabla `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_songs` FOREIGN KEY (`song`) REFERENCES `songs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comments_users` FOREIGN KEY (`user`) REFERENCES `users` (`user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`artist`) REFERENCES `artists` (`artist`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
