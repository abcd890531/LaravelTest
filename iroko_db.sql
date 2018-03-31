-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-03-2018 a las 05:17:12
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `iroko_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `card_number` decimal(16,8) NOT NULL,
  `expiration_date` date NOT NULL,
  `cvCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `bookings`
--

INSERT INTO `bookings` (`id`, `nombre`, `email`, `card_number`, `expiration_date`, `cvCode`, `hotel_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'dsfsd', 'dfsdfsd@jk.com', '4545.00000000', '2018-02-15', '45454', 1, '2018-03-31 06:06:17', '2018-03-31 07:04:45', '2018-03-31 07:04:45'),
(2, 'nombre ', 'email', '789456.00000000', '2018-02-28', '65656', 4, '2018-03-31 06:37:10', '2018-03-31 07:04:34', '2018-03-31 07:04:34'),
(3, 'rtyrty', 'rtyrty', '45654.00000000', '2018-02-28', 'rtyrty', 1, '2018-03-31 06:43:05', '2018-03-31 07:04:38', '2018-03-31 07:04:38'),
(4, 'dqwd', 'qwdqwd', '123123.00000000', '2018-03-02', 'edqwe', 1, '2018-03-31 06:43:49', '2018-03-31 07:04:48', '2018-03-31 07:04:48'),
(5, 'ddf', 'wefwef', '324234.00000000', '2018-03-01', '234234', 1, '2018-03-31 06:46:31', '2018-03-31 06:46:31', NULL),
(6, 'sergio ', 'sergio.barrios@upr.edu.cu', '12.00000000', '2018-02-28', '45', 1, '2018-03-31 06:49:11', '2018-03-31 07:04:30', '2018-03-31 07:04:30'),
(7, 'fd', 'gfdgdfg', '2.00000000', '2018-03-06', '2', 4, '2018-03-31 06:57:54', '2018-03-31 07:04:41', '2018-03-31 07:04:41'),
(8, 'ddf', 'test_laravel@gmail.com', '2.00000000', '2018-03-06', '2', 1, '2018-03-31 06:58:49', '2018-03-31 06:58:49', NULL),
(9, 'ddf', 'sergio.barrios@upr.edu.cu', '2.00000000', '2018-03-08', '2', 4, '2018-03-31 07:05:35', '2018-03-31 07:05:35', NULL),
(10, 'ddf', 'sergio.barrios@upr.edu.cu', '2.00000000', '2018-03-15', '5', 4, '2018-03-31 07:09:25', '2018-03-31 07:09:25', NULL),
(11, 'dqwd', 'sergio.barrios@upr.edu.cu', '2.00000000', '2018-03-07', '2', 1, '2018-03-31 07:11:32', '2018-03-31 07:11:32', NULL),
(12, 'dqwd', 'test_laravel@gmail.com', '2.00000000', '2018-03-15', '2', 4, '2018-03-31 07:12:02', '2018-03-31 07:12:02', NULL),
(13, 'dqwd', 'sergio.barrios@upr.edu.cu', '123.00000000', '2018-03-08', 'adfsasdasd', 4, '2018-03-31 07:13:55', '2018-03-31 07:13:55', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotels`
--

CREATE TABLE `hotels` (
  `id` int(10) UNSIGNED NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `classification` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `included` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `hotels`
--

INSERT INTO `hotels` (`id`, `picture`, `name`, `classification`, `address`, `price`, `included`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '83819_v2_isq', 'Iberostar Daiquiri', '5', 'La Habana, Ciudad de la Habana, Cuba', '150', 'Breakfast', '2018-03-29 07:38:00', '2018-03-30 10:10:13', NULL),
(2, '9220_v5_isq', 'Brisas Guardalavaca', '4', 'Guardalavaca, Holguín, Cuba', '120', 'All included\r\n	\r\n', '2018-03-29 12:14:08', '2018-03-31 01:14:44', '2018-03-31 01:14:44'),
(3, '2049899_v1_isq', 'Cayo Levisa', '2', 'Cayo Levisa, Pinar del Río, Cuba', '110', 'All inclusive', '2018-03-29 14:57:40', '2018-03-29 14:57:40', NULL),
(4, '14006_v4_isq', 'Nacional de Cuba', '3', 'Cayo Levisa, Pinar del Río, Cuba', '148', 'free transport', '2018-03-29 17:46:04', '2018-03-29 17:46:04', NULL),
(5, '4263248_v1_isq', 'NH Capri La Habana', '4', 'NH Capri La Habana', '148', 'all in', '2018-03-29 18:59:09', '2018-03-29 19:00:07', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2014_10_12_000000_create_users_table', 2),
(34, '2018_03_29_015530_create_hotels_table', 27),
(35, '2018_03_30_011218_create_rooms_table', 28),
(36, '2018_03_30_205047_create_tariffs_table', 29),
(37, '2018_03_30_224721_create_searches_table', 30),
(38, '2018_03_30_225722_create_bookings_table', 31);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_availability` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_people` int(11) NOT NULL,
  `king` int(10) UNSIGNED NOT NULL,
  `daybed` int(10) UNSIGNED NOT NULL,
  `balcony` int(10) UNSIGNED NOT NULL,
  `hotel_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `type_availability`, `total_people`, `king`, `daybed`, `balcony`, `hotel_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ROOM 1 SUITE', 'ON REQUEST', 5, 1, 0, 1, 1, '2018-03-30 06:15:34', '2018-03-30 10:24:56', NULL),
(2, 'ROOM 2 SUITE', 'ON REQUEST', 2, 1, 0, 1, 1, '2018-03-30 07:32:23', '2018-03-30 07:32:23', NULL),
(3, 'ROOM 3', 'ON REQUEST', 3, 1, 0, 1, 2, '2018-03-30 07:32:45', '2018-03-30 10:25:04', NULL),
(4, 'ROOM 1 ', 'ON REQUEST', 5, 1, 0, 1, 3, '2018-03-30 07:54:29', '2018-03-30 07:54:29', NULL),
(5, 'ROOM Iberostar 1', 'ON REQUEST', 4, 1, 0, 0, 1, '2018-03-30 07:57:10', '2018-03-30 10:25:12', NULL),
(6, 'NH ROOM', 'ON REQUEST', 1, 0, 1, 0, 5, '2018-03-30 07:57:44', '2018-03-30 10:24:48', NULL),
(8, 'Nacional de Cuba', 'AVAILABLE', 4, 1, 1, 1, 4, '2018-03-31 01:43:58', '2018-03-31 01:43:58', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `searches`
--

CREATE TABLE `searches` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `hotel_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tariffs`
--

CREATE TABLE `tariffs` (
  `id` int(10) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `taxes` int(11) NOT NULL,
  `fees` int(11) NOT NULL,
  `promo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `condition` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `policy` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tariffs`
--

INSERT INTO `tariffs` (`id`, `price`, `taxes`, `fees`, `promo`, `condition`, `policy`, `date_start`, `date_end`, `room_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 581, 90, 0, 'Promos/Special Conditions', 'Meal Plan: Breakfast', 'Penalty of 1 Booked Night(s) when cancelling', '2018-03-30', '2018-04-08', 1, '2018-03-31 01:11:40', '2018-03-31 01:13:52', NULL),
(2, 900, 80, 0, 'Promos/Special Conditions', 'Meal Plan: Breakfast', 'Penalty of 1 Booked Night(s) when cancelling', '2018-03-21', '2018-04-07', 2, '2018-03-31 01:14:25', '2018-03-31 01:17:48', '2018-03-31 01:17:48'),
(3, 900, 90, 0, '', 'Meal Plan: Breakfast', 'Penalty of 1 Booked Night(s) when cancelling', '2018-04-08', '2018-04-10', 3, '2018-03-31 01:15:31', '2018-03-31 01:15:31', NULL),
(4, 150, 50, 0, 'Promos/Special Conditions', 'Meal Plan: Breakfast', 'Penalty of 1 Booked Night(s) when cancelling', '2018-04-07', '2018-04-08', 2, '2018-03-31 01:23:20', '2018-03-31 01:23:20', NULL),
(5, 700, 70, 0, 'Promos/Special Conditions', 'Meal Plan: Breakfast', 'Penalty of 1 Booked Night(s) when cancelling', '2018-03-21', '2018-03-27', 4, '2018-03-31 01:24:04', '2018-03-31 01:24:04', NULL),
(6, 900, 80, 0, 'Promos/Special Conditions', 'Meal Plan: Breakfast', 'Penalty of 1 Booked Night(s) when cancelling', '2018-03-22', '2018-03-31', 5, '2018-03-31 01:24:43', '2018-03-31 01:24:43', NULL),
(7, 148, 40, 0, 'Promos/Special Conditions', 'Meal Plan: Breakfast', 'Penalty of 1 Booked Night(s) when cancelling', '2018-03-28', '2018-03-31', 6, '2018-03-31 01:25:17', '2018-03-31 01:25:17', NULL),
(8, 148, 80, 0, 'Promos/Special Conditions', 'Meal Plan: Breakfast', 'Penalty of 1 Booked Night(s) when cancelling', '2018-03-29', '2018-04-08', 8, '2018-03-31 02:37:41', '2018-03-31 02:37:41', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sergio Luis Barrios Blanco', 'sergio.barrios@upr.edu.cu', '$2y$10$DvPD6ahZE39x3xvDK5jQI.mo/psAYP/JvUSHNkKAnQLHjJXQH.lKe', '9YfNSMQlxS6tGOyCqE0PWXVA4MFPf1FLgpgak1XRRpevZPt794rBIsRXRGw1', '2018-02-20 16:34:22', '2018-03-30 05:26:00'),
(2, 'test_laravel', 'test_laravel@gmail.com', '$2y$10$JrN1RvjF39.BrkdDSFSibOPI/P2cX0yM.9SxWQCoNfJOJcocXA8mq', 'hei9yCGOCdjXB6b1xumDmEHKHtOHsh6qdYTnouXtx34e0xBunekOLZ9K764j', '2018-03-30 05:27:11', '2018-03-31 07:04:51');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_hotel_id_foreign` (`hotel_id`);

--
-- Indices de la tabla `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indices de la tabla `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_hotel_id_foreign` (`hotel_id`);

--
-- Indices de la tabla `searches`
--
ALTER TABLE `searches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `searches_hotel_id_foreign` (`hotel_id`);

--
-- Indices de la tabla `tariffs`
--
ALTER TABLE `tariffs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tariffs_room_id_foreign` (`room_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `searches`
--
ALTER TABLE `searches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tariffs`
--
ALTER TABLE `tariffs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`);

--
-- Filtros para la tabla `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`);

--
-- Filtros para la tabla `searches`
--
ALTER TABLE `searches`
  ADD CONSTRAINT `searches_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`);

--
-- Filtros para la tabla `tariffs`
--
ALTER TABLE `tariffs`
  ADD CONSTRAINT `tariffs_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
