-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-07-2021 a las 18:59:09
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `app_web_prueba_cistec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_noticias`
--

CREATE TABLE `tbl_noticias` (
  `id` int(11) NOT NULL,
  `Titular` varchar(250) DEFAULT NULL,
  `Cuerpo` text DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Slug` varchar(250) DEFAULT NULL,
  `usuarios_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_noticias`
--

INSERT INTO `tbl_noticias` (`id`, `Titular`, `Cuerpo`, `Fecha`, `Slug`, `usuarios_id`) VALUES
(1, 'Suiza gana la eurocopa', '<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Duis placerat scelerisque maximus. Proin laoreet magna id ante vehicula scelerisque. In hac habitasse platea dictumst. Nullam interdum, arcu eget ullamcorper luctus, enim leo dignissim lectus, vel dapibus risus nisl non velit. Maecenas nec molestie diam. Nullam ut scelerisque sapien. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus.\r\n</p>', '2021-07-12', 'suiza-gana-la-eurocopa', NULL),
(2, 'El bitcoin cae un 25 porciento', '<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Duis placerat scelerisque maximus. Proin laoreet magna id ante vehicula scelerisque. In hac habitasse platea dictumst. Nullam interdum, arcu eget ullamcorper luctus, enim leo dignissim lectus, vel dapibus risus nisl non velit. Maecenas nec molestie diam. Nullam ut scelerisque sapien. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus.\r\n</p>', '2021-07-12', 'el-bitcoin-cae-un-25-porciento', NULL),
(3, 'iOS14.7 ya disponible para instalar', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vitae lorem sed massa bibendum pulvinar sit amet sit amet lorem. Aenean venenatis egestas varius. Vivamus consequat vestibulum dolor sed tempor. Sed eget dolor a nisi mattis pellentesque. Sed tempor mattis nulla, nec porta elit tempus eu. Curabitur leo elit, sagittis ut urna id, euismod condimentum lectus. Integer vel euismod dolor. Aliquam justo erat, pulvinar faucibus nisl nec, mattis fringilla eros. Suspendisse volutpat fringilla ante, id euismod justo consequat a. Mauris sollicitudin, ante et mollis convallis, lacus neque vehicula lectus, eget blandit eros lacus quis massa. Proin non felis purus. Curabitur dictum massa consectetur tempor pellentesque. Nunc lorem ligula, efficitur at libero sit amet, mattis euismod arcu. Suspendisse quis nunc volutpat, tincidunt massa sit amet, auctor quam.', '2021-07-22', 'ios14.7-ya-disponible-para-instalar', 1),
(4, 'Samsung confirma Galaxy Unpacked 2021', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vitae lorem sed massa bibendum pulvinar sit amet sit amet lorem. Aenean venenatis egestas varius. Vivamus consequat vestibulum dolor sed tempor. Sed eget dolor a nisi mattis pellentesque. Sed tempor mattis nulla, nec porta elit tempus eu. Curabitur leo elit, sagittis ut urna id, euismod condimentum lectus. Integer vel euismod dolor. Aliquam justo erat, pulvinar faucibus nisl nec, mattis fringilla eros. Suspendisse volutpat fringilla ante, id euismod justo consequat a. Mauris sollicitudin, ante et mollis convallis, lacus neque vehicula lectus, eget blandit eros lacus quis massa. Proin non felis purus. Curabitur dictum massa consectetur tempor pellentesque. Nunc lorem ligula, efficitur at libero sit amet, mattis euismod arcu. Suspendisse quis nunc volutpat, tincidunt massa sit amet, auctor quam.', '2021-07-22', 'samsung-confirma-galaxy-unpacked-2021', 2),
(8, 'Europa debate la obligación de la vacuna', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vitae lorem sed massa bibendum pulvinar sit amet sit amet lorem. Aenean venenatis egestas varius. Vivamus consequat vestibulum dolor sed tempor. Sed eget dolor a nisi mattis pellentesque. Sed tempor mattis nulla, nec porta elit tempus eu. Curabitur leo elit, sagittis ut urna id, euismod condimentum lectus. Integer vel euismod dolor. Aliquam justo erat, pulvinar faucibus nisl nec, mattis fringilla eros. Suspendisse volutpat fringilla ante, id euismod justo consequat a. Mauris sollicitudin, ante et mollis convallis, lacus neque vehicula lectus, eget blandit eros lacus quis massa. Proin non felis purus. Curabitur dictum massa consectetur tempor pellentesque. Nunc lorem ligula, efficitur at libero sit amet, mattis euismod arcu. Suspendisse quis nunc volutpat, tincidunt massa sit amet, auctor quam.', '2021-07-22', 'europa-debate-la-obligaci??n-de-la-vacuna', 2),
(10, 'Comienzan los JJOO TOKIO 2020', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vitae lorem sed massa bibendum pulvinar sit amet sit amet lorem. Aenean venenatis egestas varius. Vivamus consequat vestibulum dolor sed tempor. Sed eget dolor a nisi mattis pellentesque. Sed tempor mattis nulla, nec porta elit tempus eu. Curabitur leo elit, sagittis ut urna id, euismod condimentum lectus. Integer vel euismod dolor. Aliquam justo erat, pulvinar faucibus nisl nec, mattis fringilla eros. Suspendisse volutpat fringilla ante, id euismod justo consequat a. Mauris sollicitudin, ante et mollis convallis, lacus neque vehicula lectus, eget blandit eros lacus quis massa. Proin non felis purus. Curabitur dictum massa consectetur tempor pellentesque. Nunc lorem ligula, efficitur at libero sit amet, mattis euismod arcu. Suspendisse quis nunc volutpat, tincidunt massa sit amet, auctor quam.', '2021-07-22', 'comienzan-los-jjoo-tokio-2020', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_noticias_categorias`
--

CREATE TABLE `tbl_noticias_categorias` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_noticias_categorias`
--

INSERT INTO `tbl_noticias_categorias` (`id`, `Nombre`) VALUES
(1, 'Tecnología'),
(2, 'Deportes'),
(3, 'Salud'),
(5, 'Economía'),
(6, 'Europa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_noticias_tiene_categorias`
--

CREATE TABLE `tbl_noticias_tiene_categorias` (
  `noticias_id` int(11) NOT NULL,
  `noticias_categorias_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_noticias_tiene_categorias`
--

INSERT INTO `tbl_noticias_tiene_categorias` (`noticias_id`, `noticias_categorias_id`) VALUES
(1, 2),
(2, 1),
(3, 1),
(4, 1),
(8, 6),
(10, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id` int(11) NOT NULL,
  `Usuario` varchar(250) DEFAULT NULL,
  `Contrasena` varchar(250) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id`, `Usuario`, `Contrasena`, `Email`) VALUES
(1, 'admin', 'admin', 'admin@admin.es'),
(2, 'Carlos', 'carlos', 'carlos@carlos.es'),
(6, 'Uxue', 'uxue', 'uxue@uxue.es');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_noticias`
--
ALTER TABLE `tbl_noticias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbl_noticias_tbl_usuarios1_idx` (`usuarios_id`);

--
-- Indices de la tabla `tbl_noticias_categorias`
--
ALTER TABLE `tbl_noticias_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_noticias_tiene_categorias`
--
ALTER TABLE `tbl_noticias_tiene_categorias`
  ADD KEY `fk_tbl_noticias_tiene_categorias_tbl_noticias_idx` (`noticias_id`),
  ADD KEY `fk_tbl_noticias_tiene_categorias_tbl_noticias_categorias1_idx` (`noticias_categorias_id`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_noticias`
--
ALTER TABLE `tbl_noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tbl_noticias_categorias`
--
ALTER TABLE `tbl_noticias_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_noticias`
--
ALTER TABLE `tbl_noticias`
  ADD CONSTRAINT `fk_tbl_noticias_tbl_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `tbl_usuarios` (`id`);

--
-- Filtros para la tabla `tbl_noticias_tiene_categorias`
--
ALTER TABLE `tbl_noticias_tiene_categorias`
  ADD CONSTRAINT `fk_tbl_noticias_tiene_categorias_tbl_noticias` FOREIGN KEY (`noticias_id`) REFERENCES `tbl_noticias` (`id`),
  ADD CONSTRAINT `fk_tbl_noticias_tiene_categorias_tbl_noticias_categorias1` FOREIGN KEY (`noticias_categorias_id`) REFERENCES `tbl_noticias_categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
