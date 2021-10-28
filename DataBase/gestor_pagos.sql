-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-01-2020 a las 04:48:22
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `id_balance` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_newuser` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nit_user` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `phone_user` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `update_q` int(255) NOT NULL,
  `quantity_u` int(11) NOT NULL,
  `interests` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `balance`
--

INSERT INTO `balance` (`id_balance`, `id_user`, `id_newuser`, `name`, `address`, `nit_user`, `phone_user`, `quantity`, `update_q`, `quantity_u`, `interests`, `date`, `status`) VALUES
(1, 0, 9, 'Anderson Rivera Aguirre', 'Vista Hermosa Mz B #1', '132399823', '32399190', '150000', 0, 0, '0', '2019-12-08 18:42:18', 1),
(2, 0, 8, 'sebaspor', 'Bosques de pinares Mz 9 #193', '1213993', '234992', '150000', 0, 0, '11000', '2019-12-08 18:47:34', 1),
(3, 0, 10, 'Juan Carlos Jaramillo', 'armenia', '10290932', '3232121200', '350000', 0, 0, '35000', '2019-12-08 18:54:01', 1),
(4, 32, 11, 'Alan Mateus Ortiz Aguirre', 'Vista Hermosa Mz B #1', '1039983', '1002019', '1000000', 2600000, 2, '50000', '2019-12-08 19:06:08', 1),
(5, 32, 13, 'Alan Mateus Ortiz Aguirre', 'Vista Hermosa Mz B #1', '1090348300', '3129098763', '300000', 300000, 1, '30000', '2019-12-08 19:07:58', 1),
(6, 32, 12, 'Viviana Carolina Aguirre', 'Bosques de pinares Mz 9 #193', '1090348300', '3129098763', '500000', 500000, 2, '50000', '2019-12-16 18:00:32', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `email` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `message` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extendloan`
--

CREATE TABLE `extendloan` (
  `id_extendLoan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_newuser` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nit_user` int(100) NOT NULL,
  `address` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `phone_user` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `quantityP` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `quantityLoan` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `why_refuse` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `id_userRegis` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `extendloan`
--

INSERT INTO `extendloan` (`id_extendLoan`, `id_user`, `id_newuser`, `name`, `nit_user`, `address`, `phone_user`, `quantityP`, `quantityLoan`, `why_refuse`, `id_userRegis`, `date`, `status`) VALUES
(1, 32, 2, 'Sebastian', 10230003, 'boisqueus', '232324983', '0', '250000', '', 3, '2019-12-31 10:07:11', 1),
(101, 32, 13, 'Alan Mateus Ortiz Aguirre', 1090348300, 'Vista Hermosa Mz B #1', '3129098763', '0', '300000', 'Por quÃ© me da la gana y soy el Administrador ', 4, '2019-12-31 13:31:48', 2),
(102, 32, 11, 'Alan Mateus Ortiz Aguirre', 1039983, 'Vista Hermosa Mz B #1', '1002019', '900000', '400000', '', 5, '2019-12-31 13:51:11', 1),
(103, 32, 24, 'sdkwk', 13010, 'dkwew', '0932902309', '1520000', '700000', '', 4, '2019-12-31 13:57:07', 1),
(104, 32, 12, 'Viviana Carolina Aguirre', 1090348300, 'Bosques de pinares Mz 9 #193', '3129098763', '550000', '100000', 'Por que el precio es alto para ser el primer prestamo', 4, '2020-01-05 21:38:02', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicio`
--

CREATE TABLE `inicio` (
  `id_user` int(11) NOT NULL,
  `id_newuser` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `id_roll` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inicio`
--

INSERT INTO `inicio` (`id_user`, `id_newuser`, `name`, `email`, `pass`, `id_roll`, `status`) VALUES
(1, 0, 'Sebastian Aguirre Vallejo', 'sebas@mail.com', '123', 1, 1),
(2, 0, 'Jesus David Vallejo', 'davato@mail.com', '123', 1, 1),
(4, 0, 'Dario Ortega', 'dario@mail.com', '123', 2, 1),
(5, 0, 'Juan luis', 'Juanlucho@mail.com ', '1234', 3, 1),
(8, 0, 'Alirio Castro', 'alirio@mail.com', '123', 3, 1),
(9, 4, 'Argenis torres', 'argenisnueva@mail.com', '123', 3, 1),
(10, 2, 'Julieta MarÃ­n', 'juli@mail.com', '123', 3, 1),
(11, 1, 'Jesus David Vallejo', 'jesus@mail.com', '123', 3, 0),
(12, 5, 'Juliana Aguilar', 'juliana@mail.com', '123', 3, 1),
(13, 0, 'Alejandra SÃ¡nchez', 'alejandra@mail.com', '123', 3, 1),
(14, 0, 'Alejandra SÃ¡nchez Florez', 'aleja@mail.com', '123', 3, 1),
(15, 0, 'Alejandra SÃ¡nchez Florez', 'alejaa@mail.com', '123', 3, 1),
(16, 0, 'sebastian aguirre', 'bueno@mail.com', '123', 3, 1),
(17, 0, 'Juliana CÃ¡rdenas', 'julianac@mail.com', '123', 3, 1),
(18, 0, 'Gabriela Rodriguen', 'gab@mail.com', '123', 3, 0),
(19, 0, 'Gabriela Rodriguen', 'gabi@mail.com', '123', 3, 1),
(20, 0, 'Gabriela LÃ³pez', 'gabriela@mail.com', '123', 3, 1),
(21, 0, 'marino', 'marino@mail.com', '123', 2, 1),
(22, 0, 'david ospina', 'daviops@mail.com', '123', 3, 0),
(23, 0, 'david ospina', 'daviopsso@mail.com', '123', 3, 0),
(24, 0, 'david ospina', 'daviopsso09@mail.com', '123', 3, 0),
(25, 0, 'david ospina', 'daviopsso00@mail.com', '123', 3, 0),
(26, 0, 'david ospina', 'daviopsso0@mail.com', '123', 3, 0),
(27, 0, 'david ospina', 'mal@mail.com', '123', 3, 1),
(28, 0, 'PArcero', 'parce@mail.com', '123', 3, 1),
(29, 9, 'Anderson Rivera Aguirre', 'anderson@mail.com', '123', 3, 0),
(30, 8, 'sebaspor', 'nuevaprueba@mail.com', '123', 3, 1),
(31, 10, 'Juan Carlos Jaramillo', 'juancarlos@mail.com', '123', 3, 1),
(32, 12, 'Viviana Carolina Aguirre', 'nuevousuario@mail.com', '123', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `new_user`
--

CREATE TABLE `new_user` (
  `id_newuser` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nit_user` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `phone_user` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `why_refuse` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `new_user`
--

INSERT INTO `new_user` (`id_newuser`, `name`, `address`, `nit_user`, `phone_user`, `quantity`, `why_refuse`, `date`, `status`) VALUES
(1, 'Jesus David Vallejo', 'Bosques de pinares Mz 9 #193', '1090087609', '3293987655', '100.000', '', '2019-11-25 11:43:20', 1),
(2, 'Julieta MarÃ­n', 'Maritin plaza Calle 39 #49-02', '10928834', '7562819', '200.000', '', '2019-11-25 11:51:19', 1),
(3, 'Juan Luis FandiÃ±o', 'RincÃ³n de los angeles', '1093850903', '3009809929', '500.000', 'Por que el precio es alto para ser el primer prestamo', '2019-11-25 11:52:50', 2),
(4, 'Argenis torres', 'Bosques de pinares Mz 9#193', '193084892', '3002721298', '8.000.000', '', '2019-11-25 11:54:53', 1),
(5, 'Juliana Aguilar', 'Belmonte Alto de Pereira ', '1039904082', '3233858524', '900.000', '', '2019-11-25 22:20:21', 1),
(6, 'Viviana Carolina Aguirre', 'Vista Hermosa Mz B #1 Armenia QuindÃ­o', '109034830', '3160983892', '250.000', 'Por que es mi hermana', '2019-11-26 00:36:55', 2),
(7, 'JosÃ© Eliberto Suarez', 'Cra 15a # 98a - 06 Belmonte pereira', '1010109898', '31678978', '500.000', 'Solo es posible prestarle $ 200.000 MÃ¡ximo', '2019-11-26 11:07:22', 2),
(8, 'sebaspor', 'sdsdsaaa211', '1231232', '32423', '2323', '', '2019-12-08 18:19:59', 1),
(9, 'Anderson Rivera Aguirre', 'Barrio Vista Hermosa Mz B #1', '19029830166', '3233856522', '100.000', '', '2019-12-08 18:21:18', 1),
(10, 'Juan Carlos Jaramillo', 'armenia', '10290932', '3232121200', '200.000', '', '2019-12-08 18:52:44', 1),
(11, 'Alan Mateus Ortiz Aguirre', 'Vista Hermosa Mz B #1', '1039983', '1002019', '250.000', '', '2019-12-08 19:05:01', 1),
(12, 'Viviana Carolina Aguirre', 'Bosques de pinares Mz 9 #193', '1090348300', '3129098763', '200.000', '', '2019-12-13 03:47:59', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(11) NOT NULL,
  `id_user` int(11) DEFAULT '0',
  `id_newuser` int(11) DEFAULT '0',
  `name` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `phone_user` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_userRegis` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `payment`
--

INSERT INTO `payment` (`id_payment`, `id_user`, `id_newuser`, `name`, `address`, `quantity`, `phone_user`, `id_userRegis`, `date`, `status`) VALUES
(1, 5, 0, 'Sebastian Aguirre', 'Bosques de pinares', '50000', '3233858522', 0, '2019-12-13 14:17:25', 1),
(2, 5, 0, 'Viviana', 'Mamciodi', '90000', '2392992', 0, '2019-12-11 04:06:10', 1),
(3, 32, 13, NULL, NULL, NULL, NULL, 0, '2019-12-23 15:46:41', 1),
(4, 32, 13, 'Alan Mateus Ortiz Aguirre', 'Vista Hermosa Mz B #1', '100000', '3129098763', 0, '2019-12-23 15:47:29', 1),
(5, 32, 13, 'Alan Mateus Ortiz Aguirre', 'Vista Hermosa Mz B #1', '100000', '3129098763', 0, '2019-12-23 15:50:26', 1),
(6, 32, 13, 'Alan Mateus Ortiz Aguirre', 'Vista Hermosa Mz B #1', '100000', '3129098763', 4, '2019-12-23 15:50:43', 1),
(7, 32, 13, 'Alan Mateus Ortiz Aguirre', 'Vista Hermosa Mz B #1', '100000', '3129098763', 4, '2019-12-23 15:51:30', 1),
(8, 32, 13, 'Alan Mateus Ortiz Aguirre', 'Vista Hermosa Mz B #1', '100000', '3129098763', 4, '2019-12-23 15:51:47', 1),
(9, 0, 8, 'sebaspor', 'Bosques de pinares Mz 9 #193', '50000', '234992', 4, '2019-12-23 16:01:23', 1),
(10, 0, 8, 'sebaspor', 'Bosques de pinares Mz 9 #193', '30000', '234992', 4, '2019-12-23 16:44:17', 1),
(11, 32, 11, 'Alan Mateus Ortiz Aguirre', 'Vista Hermosa Mz B #1', '100000', '1002019', 4, '2019-12-23 16:44:43', 1),
(12, 0, 9, 'Anderson Rivera Aguirre', 'Vista Hermosa Mz B #1', '50000', '32399190', 4, '2019-12-23 16:49:11', 1),
(13, 32, 13, 'Alan Mateus Ortiz Aguirre', 'Vista Hermosa Mz B #1', '100000', '3129098763', 4, '2019-12-23 16:51:03', 1),
(14, 0, 8, 'sebaspor', 'Bosques de pinares Mz 9 #193', '4000', '234992', 4, '2019-12-23 16:51:21', 1),
(15, 0, 9, 'Anderson Rivera Aguirre', 'Vista Hermosa Mz B #1', '100000', '32399190', 4, '2019-12-31 13:37:06', 1),
(16, 0, 9, 'Anderson Rivera Aguirre', 'Vista Hermosa Mz B #1', '50000', '32399190', 1, '2019-12-31 13:41:18', 1),
(17, 32, 11, 'Alan Mateus Ortiz Aguirre', 'Vista Hermosa Mz B #1', '1000000', '1002019', 1, '2020-01-01 02:47:01', 1),
(18, 32, 11, 'Alan Mateus Ortiz Aguirre', 'Vista Hermosa Mz B #1', '250000', '1002019', 4, '2020-01-03 00:45:16', 1),
(19, 32, 11, 'Alan Mateus Ortiz Aguirre', 'Vista Hermosa Mz B #1', '50000', '1002019', 1, '2020-01-04 14:50:48', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requirement`
--

CREATE TABLE `requirement` (
  `id_req` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_roll` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
  `status` int(11) NOT NULL DEFAULT '1'
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
-- Indices de la tabla `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id_balance`);

--
-- Indices de la tabla `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indices de la tabla `extendloan`
--
ALTER TABLE `extendloan`
  ADD PRIMARY KEY (`id_extendLoan`);

--
-- Indices de la tabla `inicio`
--
ALTER TABLE `inicio`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `FK_roll` (`id_roll`);

--
-- Indices de la tabla `new_user`
--
ALTER TABLE `new_user`
  ADD PRIMARY KEY (`id_newuser`);

--
-- Indices de la tabla `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`);

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
-- AUTO_INCREMENT de la tabla `balance`
--
ALTER TABLE `balance`
  MODIFY `id_balance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `extendloan`
--
ALTER TABLE `extendloan`
  MODIFY `id_extendLoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `inicio`
--
ALTER TABLE `inicio`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `new_user`
--
ALTER TABLE `new_user`
  MODIFY `id_newuser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
