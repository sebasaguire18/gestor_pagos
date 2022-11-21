-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2022 a las 04:56:15
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestor_pagos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `balance`
--

CREATE TABLE `balance` (
  `id_balance` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `id_newuser` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nit_user` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `phone_user` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `update_q` int(255) DEFAULT NULL,
  `quantity_u` int(11) DEFAULT NULL,
  `interests` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `total_quantity` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `balance`
--

INSERT INTO `balance` (`id_balance`, `id_newuser`, `name`, `address`, `nit_user`, `phone_user`, `quantity`, `update_q`, `quantity_u`, `interests`, `total_quantity`, `date`, `status`) VALUES
('637aa6e422ceb', '6375b8d5d7852', 'Yuliana Ocampo Martinez', 'Vista Hermosa Mz B # 1', '1005087224', '3136641987', '200000', 0, 0, '40000', '180000', '2022-11-20 17:15:00', 1),
('637af6149efed', '637af30aa9019', 'Anderson Aguirre Vallejo', 'Vista Hermosa Mz B # 1', '1095178897', '3127650248', '150000', NULL, NULL, '30000', '180000', '2022-11-20 22:52:52', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citys`
--

CREATE TABLE `citys` (
  `city_id` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `city_name` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `city_fecha_create` datetime NOT NULL DEFAULT current_timestamp(),
  `city_status` int(11) NOT NULL DEFAULT 1 COMMENT '1:Activo, 0:Inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `citys`
--

INSERT INTO `citys` (`city_id`, `city_name`, `city_fecha_create`, `city_status`) VALUES
('63731634e6cda', 'Armenia', '2022-11-14 23:31:48', 1),
('6373164db8b03', 'Tebaida', '2022-11-14 23:32:13', 1),
('63731656d3645', 'Calarcá', '2022-11-14 23:32:22', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `email` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `message` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extendloan`
--

CREATE TABLE `extendloan` (
  `id_extendLoan` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `id_newuser` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nit_user` int(100) NOT NULL,
  `address` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `phone_user` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `quantityP` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `quantityLoan` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `why_refuse` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `id_userRegis` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicio`
--

CREATE TABLE `inicio` (
  `id_user` int(11) NOT NULL,
  `id_newuser` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `id_roll` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inicio`
--

INSERT INTO `inicio` (`id_user`, `id_newuser`, `name`, `email`, `pass`, `id_roll`, `status`) VALUES
(1, '0', 'Administrador', 'admin@mail.com', '123', 1, 1),
(2, '0', 'Yuliana Ocampo Martinez', 'yuyis@gmail.com', '123', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `new_user`
--

CREATE TABLE `new_user` (
  `id_newuser` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nit_user` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `phone_user` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fiador` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_credito` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cuotas_credito` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nota` varchar(600) COLLATE utf8_spanish_ci NOT NULL,
  `why_refuse` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `new_user`
--

INSERT INTO `new_user` (`id_newuser`, `name`, `nit_user`, `address`, `city`, `phone_user`, `fiador`, `quantity`, `tipo_credito`, `cuotas_credito`, `nota`, `why_refuse`, `date`, `status`) VALUES
('6375b8d5d7852', 'Yuliana Ocampo Martinez', '1005087224', 'Vista Hermosa Mz B # 1', '63731634e6cda', '3136641987', '0', '200000', 'Semanal', '2', '2 de $120.000', 'solo es posible prestarle $200.000', '2022-11-17 23:08:48', 1),
('637af30aa9019', 'Anderson Aguirre Vallejo', '1095178897', 'Vista Hermosa Mz B # 1', '63731634e6cda', '3127650248', '6375b8d5d7852', '150000', 'Semanal', '3', '', '', '2022-11-20 22:39:54', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment`
--

CREATE TABLE `payment` (
  `id_payment` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `id_newuser` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nit_user` int(100) NOT NULL,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `phone_user` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `id_userRegis` int(11) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `payment`
--

INSERT INTO `payment` (`id_payment`, `id_newuser`, `nit_user`, `name`, `address`, `quantity`, `phone_user`, `id_userRegis`, `date`, `status`) VALUES
('637abc6043a6c', '6375b8d5d7852', 1005087224, 'Yuliana Ocampo Martinez', 'Vista Hermosa Mz B # 1', '60000', '3136641987', 1, '2022-11-20 18:46:40', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requirement`
--

CREATE TABLE `requirement` (
  `id_req` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_roll` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `message` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roll`
--

CREATE TABLE `roll` (
  `id_roll` int(11) NOT NULL,
  `roll_name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roll`
--

INSERT INTO `roll` (`id_roll`, `roll_name`, `status`) VALUES
(1, 'Administrador', 1),
(2, 'Cobrador', 1),
(3, 'Deudor', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indices de la tabla `inicio`
--
ALTER TABLE `inicio`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `FK_roll` (`id_roll`);

--
-- Indices de la tabla `requirement`
--
ALTER TABLE `requirement`
  ADD PRIMARY KEY (`id_req`),
  ADD KEY `FK_requirement_inicio` (`id_user`),
  ADD KEY `FK_requirement_roll` (`id_roll`);

--
-- Indices de la tabla `roll`
--
ALTER TABLE `roll`
  ADD PRIMARY KEY (`id_roll`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inicio`
--
ALTER TABLE `inicio`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `requirement`
--
ALTER TABLE `requirement`
  MODIFY `id_req` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roll`
--
ALTER TABLE `roll`
  MODIFY `id_roll` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inicio`
--
ALTER TABLE `inicio`
  ADD CONSTRAINT `FK_roll` FOREIGN KEY (`id_roll`) REFERENCES `roll` (`id_roll`);

--
-- Filtros para la tabla `requirement`
--
ALTER TABLE `requirement`
  ADD CONSTRAINT `FK_requirement_inicio` FOREIGN KEY (`id_user`) REFERENCES `inicio` (`id_user`),
  ADD CONSTRAINT `FK_requirement_roll` FOREIGN KEY (`id_roll`) REFERENCES `roll` (`id_roll`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
