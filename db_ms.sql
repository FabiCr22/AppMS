-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-03-2020 a las 05:37:42
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_ms`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `Id_Admin` bigint(20) UNSIGNED NOT NULL,
  `Ci_Admin` varchar(10) NOT NULL,
  `Nombre_Admin` varchar(75) NOT NULL,
  `Email_Admin` varchar(50) NOT NULL,
  `Pass_Admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `familia_producto`
--

INSERT INTO `administrador` (`Id_Admin`, `Ci_Admin`, `Nombre_Admin`, `Email_Admin`, `Pass_Admin`) VALUES
(1, '0201609377', 'Ernesto Wilson Tamami Rumiguano', 'macroshow1979@hotmail.com', '$2y$10$V1u8l45seJHzCioqlq/H/ezaP31Py8DoUYRUjZHSqMGGlPkNNJJby');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familia_producto`
--

CREATE TABLE `familia_producto` (
  `Id_FamiliaProd` bigint(20) UNSIGNED NOT NULL,
  `Nombre_FamiliaProd` varchar(25) NOT NULL,
  `Id_TipoProd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `familia_producto`
--

INSERT INTO `familia_producto` (`Id_FamiliaProd`, `Nombre_FamiliaProd`, `Id_TipoProd`) VALUES
(1, 'Abrazadera', 1),
(2, 'Aceite Instrumento', 1),
(3, 'Acople', 1),
(4, 'Adaptador', 1),
(5, 'Afinador', 1),
(6, 'Agarradera', 1),
(7, 'Aislamiento', 1),
(8, 'Apagador', 1),
(9, 'Arco', 1),
(10, 'Arné', 1),
(11, 'Aro', 1),
(12, 'Asiento Batería', 1),
(13, 'Atril', 1),
(14, 'Baquetas', 1),
(15, 'Barra de Tensión', 1),
(16, 'Base', 1),
(17, 'Bastón', 1),
(18, 'Bisagra', 1),
(19, 'Boquilla', 1),
(20, 'Botón', 1),
(21, 'Brazo', 1),
(22, 'Cable', 1),
(23, 'Cable Armado', 1),
(24, 'Cable Disman', 1),
(25, 'Cable Instrumento', 1),
(26, 'Cable Micrófono', 1),
(27, 'Caja Barra de Tensión', 1),
(28, 'Caja de Ritmos', 1),
(29, 'Cajetín', 1),
(30, 'Cancionero', 1),
(31, 'Candado', 1),
(32, 'Candado de Bombo', 1),
(33, 'Candado de Tambor', 1),
(34, 'Caña', 1),
(35, 'Capo Drastro', 1),
(36, 'Cejilla', 1),
(37, 'Chupeta', 1),
(38, 'Clam', 1),
(39, 'Clavijero', 1),
(40, 'Claw', 1),
(41, 'Clip Micrófono', 1),
(42, 'Cobertor', 1),
(43, 'Colgador Line Array', 1),
(44, 'Colgante Saxo', 1),
(45, 'Conector', 1),
(46, 'Correa', 1),
(47, 'Crema Instrumento', 1),
(48, 'Cuello', 1),
(49, 'Cuerdas', 1),
(50, 'Cuerdas Bajo', 1),
(51, 'Cuerdas Charango', 1),
(52, 'Cuerdas Guitarra', 1),
(53, 'Cuerdas Requinto', 1),
(54, 'Cuerdas Viola', 1),
(55, 'Cuerdas Violín', 1),
(56, 'Descansa Pie', 1),
(57, 'Diafragma', 1),
(58, 'Disco de Vinyl', 1),
(59, 'Escobilla', 1),
(60, 'Esponja Micrófono', 1),
(61, 'Esquinero', 1),
(62, 'Estuche', 1),
(63, 'Fader', 1),
(64, 'Floyd Rose Guitarra', 1),
(65, 'Franela', 1),
(66, 'Gota Guitarra', 1),
(67, 'Grill Micrófono', 1),
(68, 'Hombreras', 1),
(69, 'Inversor', 1),
(70, 'Jack', 1),
(71, 'Kickport', 1),
(72, 'Kit Limpieza', 1),
(73, 'Kit Percusión', 1),
(74, 'Llave Tambor', 1),
(75, 'Líquido para Limpieza', 1),
(76, 'Maza', 1),
(77, 'Metrónomo', 1),
(78, 'Montaje Campana', 1),
(79, 'Multipedal Efectos', 1),
(80, 'Otro', 1),
(81, 'Pad Batería', 1),
(82, 'Palanca Trémolo', 1),
(83, 'Palillos', 1),
(84, 'Pedal Efectos', 1),
(85, 'Pedestal', 1),
(86, 'Pedestal Caja', 1),
(87, 'Pedestal Instrumento', 1),
(88, 'Pedestal Micrófono', 1),
(89, 'Peinilla Güiro', 1),
(90, 'Pergamino', 1),
(91, 'Perilla Bajo', 1),
(92, 'Pez Violín', 1),
(93, 'Plug', 1),
(94, 'Protector', 1),
(95, 'Protector Batería', 1),
(96, 'Puente Violín', 1),
(97, 'Regulador', 1),
(98, 'Repuesto', 1),
(99, 'Seguro Metálico', 1),
(100, 'Simbra', 1),
(101, 'Soporte', 1),
(102, 'Sordina', 1),
(103, 'Stand Batería', 1),
(104, 'Sujetador Bombo', 1),
(105, 'Tapa', 1),
(106, 'Tom', 1),
(107, 'Trémolo', 1),
(108, 'Tornillo', 1),
(109, 'Uñeta', 1),
(110, 'Vitela', 1),
(111, 'Accesorio Amplificación', 2),
(112, 'Amplificador Audio', 2),
(113, 'Amplificador Bajo', 2),
(114, 'Amplificador Guitarra', 2),
(115, 'Bocina', 2),
(116, 'Caja Amplificada', 2),
(117, 'Caja Directa', 2),
(118, 'Caja Pasiva', 2),
(119, 'Consola Analógica', 2),
(120, 'Consola Digital', 2),
(121, 'Driver', 2),
(122, 'Ecualizador', 2),
(123, 'Line Array', 2),
(124, 'Medusa', 2),
(125, 'Micrófono de Cable', 2),
(126, 'Micrófono Inalámbrico', 2),
(127, 'Monitoreo', 2),
(128, 'Parlante', 2),
(129, 'Potencia', 2),
(130, 'Procesador de Efectos', 2),
(131, 'Rack', 2),
(132, 'Radio', 2),
(133, 'Set de Mano', 2),
(134, 'Sub Bajo', 2),
(135, 'Accesorio DJ', 3),
(136, 'Agujas y Cápsulas', 3),
(137, 'Audífonos DJ', 3),
(138, 'Controlador', 3),
(139, 'Interfaz MIDI', 3),
(140, 'Mezcladora', 3),
(141, 'Tornamesa', 3),
(142, 'Audífonos de Estudio', 4),
(143, 'Interfaz de Audio', 4),
(144, 'Kit Estudio', 4),
(145, 'Micrófono de Estudio', 4),
(146, 'Monitor de Estudio', 4),
(147, 'Barra de Luces', 5),
(148, 'Cámara de Humo', 5),
(149, 'DMX', 5),
(150, 'Luz Fija', 5),
(151, 'Luz Laser', 5),
(152, 'Luz Led', 5),
(153, 'Luz Robótica', 5),
(154, 'Máquina de Burbujas', 5),
(155, 'Tacho', 5),
(156, 'Acordeón', 6),
(157, 'Armónica', 6),
(158, 'Bajo Eléctrico', 6),
(159, 'Bandolín', 6),
(160, 'Batería Acústica', 6),
(161, 'Batería Eléctrica', 6),
(162, 'Bombo', 6),
(163, 'Bongos', 6),
(164, 'Cajón Percusión', 6),
(165, 'Campana de Mano', 6),
(166, 'Castañuelas', 6),
(167, 'Chajchas', 6),
(168, 'Charango', 6),
(169, 'Cencerro', 6),
(170, 'Clarinete', 6),
(171, 'Clave', 6),
(172, 'Congas', 6),
(173, 'Corneta', 6),
(174, 'Cortinas', 6),
(175, 'Flauta Dulce', 6),
(176, 'Flauta de Pan', 6),
(177, 'Flauta Travesa', 6),
(178, 'Flautín', 6),
(179, 'Güiro', 6),
(180, 'Guitarra Acústica', 6),
(181, 'Guitarra Eléctrica', 6),
(182, 'Guitarra Electroacústica', 6),
(183, 'Jam Block', 6),
(184, 'Lira', 6),
(185, 'Maracas', 6),
(186, 'Melódica', 6),
(187, 'Ocarina', 6),
(188, 'Pandereta', 6),
(189, 'Platillo', 6),
(190, 'Quena', 6),
(191, 'Requinto', 6),
(192, 'Rondador', 6),
(193, 'Saxofón', 6),
(194, 'Shaker', 6),
(195, 'Sintetizador', 6),
(196, 'Tambor', 6),
(197, 'Tambora', 6),
(198, 'Teclado', 6),
(199, 'Timbales', 6),
(200, 'Triángulo', 6),
(201, 'Trombón', 6),
(202, 'Trompeta', 6),
(203, 'Tumbas', 6),
(204, 'Ukelele', 6),
(205, 'Violín', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Id_Prod` bigint(20) UNSIGNED NOT NULL,
  `Nombre_Prod` varchar(50) NOT NULL,
  `Descripcion_Prod` text NOT NULL DEFAULT 'Indefinido',
  `Imagen_Prod` varchar(255) NOT NULL DEFAULT 'Sin imagen',
  `Precio_Prod` decimal(10,2) NOT NULL,
  `Tipo_Prod` int(11) NOT NULL,
  `Familia_Prod` int(11) NOT NULL,
  `FechaSubida_Prod` datetime NOT NULL DEFAULT current_timestamp(),
  `Ci_Admin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `CiRuc_User` varchar(13) NOT NULL,
  `Id_Sem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seminario`
--

CREATE TABLE `seminario` (
  `Id_Sem` bigint(20) UNSIGNED NOT NULL,
  `Titulo_Sem` varchar(50) NOT NULL,
  `Descripcion_Sem` text NOT NULL DEFAULT 'Indefinido',
  `Imagen_Sem` varchar(255) NOT NULL DEFAULT 'Sin imagen',
  `Fecha_Sem` date NOT NULL,
  `Hora_Sem` time NOT NULL,
  `Ci_Admin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `Id_TipoProd` bigint(20) UNSIGNED NOT NULL,
  `Nombre_TipoProd` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`Id_TipoProd`, `Nombre_TipoProd`) VALUES
(1, 'Accesorio'),
(2, 'Equipo de Amplificación'),
(3, 'Equipo de DJ'),
(4, 'Estudio de Grabación'),
(5, 'Iluminación'),
(6, 'Instrumento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id_User` bigint(20) UNSIGNED NOT NULL,
  `CiRuc_User` varchar(13) NOT NULL,
  `Nombre_User` varchar(75) NOT NULL,
  `Telefono_User` varchar(15) NOT NULL DEFAULT 'Indefinido',
  `Email_User` varchar(50) NOT NULL,
  `Direccion_User` varchar(75) NOT NULL DEFAULT 'Indefinido',
  `Descripcion_User` text NOT NULL DEFAULT 'Indefinido',
  `Pass_User` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`Ci_Admin`),
  ADD UNIQUE KEY `Id_Admin` (`Id_Admin`);

--
-- Indices de la tabla `familia_producto`
--
ALTER TABLE `familia_producto`
  ADD UNIQUE KEY `Id_FamiliaProd` (`Id_FamiliaProd`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD UNIQUE KEY `Id_Prod` (`Id_Prod`),
  ADD KEY `Ci_Admin` (`Ci_Admin`);

--
-- Indices de la tabla `seminario`
--
ALTER TABLE `seminario`
  ADD UNIQUE KEY `Id_Sem` (`Id_Sem`),
  ADD KEY `seminario_ibfk_1` (`Ci_Admin`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD UNIQUE KEY `Id_TipoProd` (`Id_TipoProd`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`CiRuc_User`),
  ADD UNIQUE KEY `Id_User` (`Id_User`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `Id_Admin` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `familia_producto`
--
ALTER TABLE `familia_producto`
  MODIFY `Id_FamiliaProd` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Id_Prod` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `seminario`
--
ALTER TABLE `seminario`
  MODIFY `Id_Sem` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `Id_TipoProd` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_User` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`Ci_Admin`) REFERENCES `administrador` (`Ci_Admin`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `seminario`
--
ALTER TABLE `seminario`
  ADD CONSTRAINT `seminario_ibfk_1` FOREIGN KEY (`Ci_Admin`) REFERENCES `administrador` (`Ci_Admin`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
