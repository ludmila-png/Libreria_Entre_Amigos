-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-10-2025 a las 02:56:33
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
-- Base de datos: `lapiz_magico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id_autor` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `nacionalidad` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id_autor`, `nombre`, `apellido`, `nacionalidad`, `fecha_nacimiento`) VALUES
(1, 'Gabriel', 'García Márquez', 'Colombiana', '1927-03-06'),
(2, 'Isaac', 'Asimov', 'Rusa-Estadounidense', '1920-01-02'),
(3, 'Stephen', 'King', 'Estadounidense', '1947-09-21'),
(4, 'Ricardo', 'Piccardi', 'Argentina', '1963-08-24'),
(5, 'Stephenie', 'Meyer', 'Estadounidense', '1973-12-24'),
(6, 'Héctor Germán', 'Oesterheld', 'Argentina', '1919-07-23'),
(7, 'Francisco', 'Solano López', 'Argentina', '1928-10-26'),
(8, 'Paula', 'Hawkins', 'Británica', '1972-08-26'),
(9, 'Ana', 'Frank', 'Alemana', '1929-06-12'),
(10, 'María', 'Seoane', 'Argentina', '1948-01-01'),
(11, 'Héctor', 'Ruiz Núñez', 'Argentina', '1942-02-01'),
(12, 'Felipe', 'Pigna', 'Argentina', '1959-05-29'),
(13, 'Tulio', 'Halperín Donghi', 'Argentina', '1926-10-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha` date NOT NULL,
  `id_libro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id_evento`, `nombre`, `descripcion`, `fecha`, `id_libro`) VALUES
(1, '35 años después', 'Encuentro presencial con Ricardo Piccardi sobre su obra.', '2025-07-15', 4),
(2, 'Amanecer de Lecturas: 20 años de Crepúsculo', 'Encuentro conmemorativo sobre la saga Crepúsculo.', '2025-07-20', 5),
(3, 'Luces y Sombras: Club de Lectura de El Resplandor', 'Exploración de la obra de Stephen King.', '2025-07-25', 6),
(4, 'Bajo la nevada eterna – Encuentro literario sobre El Eternauta', 'Debate sobre la historieta emblemática argentina.', '2025-08-12', 7),
(5, 'Entre vagones y secretos – Encuentro literario sobre La chica del tren', 'Reflexión sobre el thriller psicológico de Paula Hawkins.', '2025-08-08', 8),
(6, 'Voces desde el escondite – Encuentro literario sobre El Diario de Ana Frank', 'Espacio para conversar sobre la obra y su legado.', '2025-08-15', 9),
(7, 'La Noche de los Lápices', 'Lectura y reflexión sobre el libro de María Seoane y Héctor Ruiz Núñez. Un espacio para dialogar sobre la memoria, la dictadura y la importancia de la voz juvenil en la historia argentina. Contaremos con la presencia de la periodista María Seoane para un intercambio con los asistentes.', '2025-10-10', 10),
(8, '25 de Mayo: El nacimiento de una Nación', 'Lectura del libro \"Revolución de Mayo\" de Felipe Pigna. Se explorarán los hechos, personajes y debates que marcaron la primera gran gesta de independencia. El autor Felipe Pigna será invitado especial para dialogar sobre el proceso revolucionario.', '2025-05-24', 11),
(9, '9 de Julio: Día de la Independencia', 'Lectura y análisis del libro \"Los Caminos de la Independencia\" de Tulio Halperín Donghi. Un recorrido por los procesos sociales y políticos que llevaron a la independencia en 1816. Invitado especial: historiador Felipe Pigna para compartir su visión y responder preguntas.', '2025-07-08', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `nombre`, `descripcion`) VALUES
(1, 'Novela', 'Obras narrativas de ficción'),
(2, 'Ciencia Ficción', 'Historias con elementos futuristas o científicos'),
(3, 'Historia', 'Libros de hechos históricos reales'),
(4, 'Terror', 'Obras que buscan generar miedo, tensión o suspenso'),
(5, 'Biografía', 'Relatos sobre la vida de una persona real'),
(6, 'Romance', 'Historias centradas en relaciones amorosas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitado`
--

CREATE TABLE `invitado` (
  `id_invitado` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `rol` varchar(100) DEFAULT NULL,
  `id_evento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `invitado`
--

INSERT INTO `invitado` (`id_invitado`, `nombre`, `apellido`, `rol`, `id_evento`) VALUES
(1, 'Pablo', 'Piccardi', 'Participante especial', 1),
(2, 'Felipe', 'Pigna', 'Historiador', 8),
(3, 'Felipe', 'Pigna', 'Historiador', 9),
(4, 'María', 'Seoane', 'Periodista', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libro` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `anio_publicacion` year(4) DEFAULT NULL,
  `id_genero` int(11) DEFAULT NULL,
  `id_autor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `titulo`, `isbn`, `anio_publicacion`, `id_genero`, `id_autor`) VALUES
(1, 'Cien Años de Soledad', '978-0307474728', '1967', 1, 1),
(2, 'Fundación', '978-0553293357', '1951', 2, 2),
(3, 'It', '978-1501142970', '1986', 1, 3),
(4, '35 Años Después', '978-9876543210', '2005', 1, 4),
(5, 'Crepúsculo', '978-0316015844', '2005', 6, 5),
(6, 'El Resplandor', '978-0307743657', '1977', 4, 3),
(7, 'El Eternauta', '978-9870001111', '1957', 3, 6),
(8, 'La chica del tren', '978-0552779777', '2015', 4, 8),
(9, 'El Diario de Ana Frank', '978-0553296983', '1947', 5, 9),
(10, 'La Noche de los Lápices', '978-9500720011', '1986', 3, 10),
(11, 'Revolución de Mayo', '978-9879876543', '2005', 3, 12),
(12, 'Los Caminos de la Independencia', '978-9500712345', '1998', 3, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participantes_evento`
--

CREATE TABLE `participantes_evento` (
  `id_participacion` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `rol` enum('invitado','organizador') DEFAULT 'invitado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `apellido_2` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `miembro?` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `apellido_2`, `telefono`, `email`, `password`, `miembro?`) VALUES
(1, 'lucas', 'cossari', NULL, '1132591231', 'lucascossari@gmail.com', '1234', 0),
(5, 'mati', 'figue', NULL, '1234', 'mati@gmail.com', '1234', 0),
(6, 'ludmi', 'cristaldo', NULL, '111111111111111', 'ludmi@gmail.com', '1234', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `id_libro` (`id_libro`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `invitado`
--
ALTER TABLE `invitado`
  ADD PRIMARY KEY (`id_invitado`),
  ADD KEY `id_evento` (`id_evento`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`),
  ADD UNIQUE KEY `isbn` (`isbn`),
  ADD KEY `id_genero` (`id_genero`),
  ADD KEY `id_autor` (`id_autor`);

--
-- Indices de la tabla `participantes_evento`
--
ALTER TABLE `participantes_evento`
  ADD PRIMARY KEY (`id_participacion`),
  ADD KEY `id_evento` (`id_evento`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `participantes_evento`
--
ALTER TABLE `participantes_evento`
  MODIFY `id_participacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id_libro`);

--
-- Filtros para la tabla `invitado`
--
ALTER TABLE `invitado`
  ADD CONSTRAINT `invitado_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`);

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`),
  ADD CONSTRAINT `libros_ibfk_2` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`);

--
-- Filtros para la tabla `participantes_evento`
--
ALTER TABLE `participantes_evento`
  ADD CONSTRAINT `participantes_evento_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`),
  ADD CONSTRAINT `participantes_evento_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
