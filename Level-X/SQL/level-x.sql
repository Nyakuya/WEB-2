-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2018 a las 15:45:19
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `level-x`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `valoracion` int(11) NOT NULL,
  `id_juego` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `comentario`, `valoracion`, `id_juego`, `id_usuario`) VALUES
(1, 'Uno de los mejores juegos que haya jugado. Hace falta probarlo para entenderlo, no se lo puede describir en una palabra. Un gran mundo abierto, mucho contenido de calidad que no es repetitivo, rejugabilidad, una maravilla.', 5, 2, 1),
(2, 'No está perfectamente optimizado, (con todo al minimo, viendose completamente pixeleado y asqueroso, me andaba a 20fps con una 650ti, que mueve juegos como borderlands 2 a full grafica sin pestañar).\r\nSin embargo hoy en dia el 85% de los juegos salen mal optimizados, así que es lo normal.\r\n\r\nEs un buen juego, frenetico, rejugable, con buena dificultad y decente personalizacion.', 3, 1, 7),
(3, 'Se disfruta mas con amigos, pero esta bastante bien al jugarlo sin ellos. Se puede conseguir casi todo el contenido simplemente jugando y subiendo de nivel para conseguir loot boxes con recompensas.', 4, 3, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `id_juego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id_imagen`, `nombre`, `id_juego`) VALUES
(42, 'images/item-game-images/5bf2a90a6a09e.jpg', 1),
(43, 'images/item-game-images/5bf2ace8e9d02.jpg', 2),
(44, 'images/item-game-images/5bf2aceeec9ca.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `id_juego` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `plot` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id_juego`, `nombre`, `plot`) VALUES
(1, 'Doom', 'Shooter en primera persona; Desarrollado por id Software y distribuido por Bethesda Softworks para multiplataforma tras la adquisición de la IP en 2009. El juego está ambientado en el planeta Marte, en una instalación de la UAC invadida por las fuerzas del infierno.'),
(2, 'The Witcher 3: Wild Hunt', 'Rol, aventura y mundo abierto en tercera persona; Desarrollado por CD Projekt RED y distribuido por Warner Bros para multiplataforma. El jugador encarna a Geralt de Rivia, un brujo cazador de monstruos conocido como Lobo Blanco, el cual emprende un largo viaje a través de Los reinos del norte. El jugador lucha contra el peligroso mundo mediante magia y espadas mientras interactúa con los NPC y completa tanto misiones secundarias como la misión principal de la historia. Se han lanzado dos expansiones para este juego: Hearts of Stone y Blood and Wine.'),
(3, 'Overwatch', 'Moba shooter en primera persona; Desarrollado y distribuido por Blizzard Entertainment para multiplataforma. Overwatch pone a los jugadores en equipos de seis personas, donde cada uno escogerá un héroe de entre varios divididos por 4 clases, cada uno con habilidades únicas y cada clase con enfoques bien definidos. Las clases son: Ataque, Defensa, Tanque y Soporte. Los jugadores de cada grupo deberán trabajar en equipo para ganar la partida.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reviews`
--

CREATE TABLE `reviews` (
  `id_review` int(11) NOT NULL,
  `review` text NOT NULL,
  `autor_de_review` text NOT NULL,
  `id_juego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reviews`
--

INSERT INTO `reviews` (`id_review`, `review`, `autor_de_review`, `id_juego`) VALUES
(1, 'Doom no se aleja del espíritu que condujo a sus antepasados a la grandeza; una decisión que consolida su relevancia a pesar de su estructura predecible y multijugador poco imaginativo.', 'Brandom', 1),
(2, 'La conclusión de la saga de juegos de Geralt no podría ser mejor. El gran mundo abierto, la gran narración de historias y las docenas de horas de diversión pura: este juego es una necesidad absoluta para todos los fanáticos de los juegos de rol.', 'Brandom', 2),
(3, 'Impresionante juego competitivo.\r\nLos héroes únicos hacen de este juego una experiencia sin igual.\r\nLos mapas son muy detallados y tienen el tamaño perfecto para un juego competitivo de este género.\r\nEl sistema de liga es cómodo y destaca el trabajo en equipo.\r\nHay 1000 cosas para desbloquear y puedes desbloquearlo jugando y subiendo de nivel.', 'Brandom', 3),
(4, 'Independientemente de lo que Bethesda pueda creer, Doom tiene que ver con su campaña para un solo jugador, que es una bestia brillante y manchada de sangre.\r\n\r\nEs extenso, increíblemente agitado, increíblemente satisfactorio, gloriosamente glorioso para la vista, y una actualización más que digna de la original clásica.', 'Salaman', 1),
(5, 'El primer shooter de Blizzard sobresale por encima de la competencia actual en todos los aspectos. Un estilo audiovisual distintivo y un montón de detalles agradables son adiciones agradecidas en un juego precisamente diseñado.', 'Salaman', 3),
(6, 'Su mundo sorprendentemente cohesivo es tan hermoso como exigente, y está repleto de contenido maduro que lo lanza de una respuesta emocional a otra. Su narración es magnífica, su combate refinado, y su naturaleza a menudo implacable. Solo se presta a una experiencia brillantemente gratificante.', 'Salaman', 2),
(7, '[PROS]: Genial juego, me conectó desde el principio y he pasado demasiadas horas en ese maravilloso mundo. Más que cualquier otro juego que haya jugado. El relato de la historia y las decisiones significativas fueron un punto culminante. También disfruté mucho la forma en que se desarrollan las diferentes construcciones en combate. ¡Disfrutar!\r\n\r\n[CONTRAS]: ¿Estás bromeando?', 'Derpres', 2),
(8, '[PROS]: Muy bien hecho. Un juego de disparos tanto para aquellos que prometen sus vidas en el juego en línea, como para aquellos interesados principalmente en la ocasional incursión. Es un clásico instantáneo que, con el tipo de buen soporte post-lanzamiento por el que se conoce a Blizzard, podría ser el shooter de toda una generación de jugadores.\r\n\r\n[CONTRAS]: El principal inconveniente de este juego es que si no tienes amigos con los que jugar, no tendrás la misma satisfacción que los que tienen su propia fiesta. Este juego está fuertemente basado en el trabajo en equipo y las tácticas.', 'Derpres', 3),
(9, '[PROS]: La expresión más emocionante e inteligente de FPS en años.\r\nEl multijugador es infinitamente jugable, inteligente, brutal y divertido.\r\nSnapMap es potente y accesible, y podría llevar a un gran contenido durante años.\r\n\r\n[CONTRAS]: La hora de apertura de la campaña frena el alcance y la calidad reales de Doom.', 'Derpres', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` varchar(200) NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `username`, `password`, `admin`) VALUES
(1, 'admin', '$2y$10$fbSvTyM8PP5r5s64YBnjrOo1IrFSDWHTkU9Z9hQ.SAWwl7YmFpdha', 1),
(7, 'user', '$2y$10$x85agH5cTdUijoBAO.h.fOxm.4QJo9OzOPS7v4maVCDyxwJohWo3m', 0),
(8, 'randomAcount', '$2y$10$YXtAvE55tiMtnPEsFRAnzur1Yxz5mgyIPkeyj1ZDvF6BZ0Hqpq69e', 0),
(9, 'loloaweo', '$2y$10$Xq6G6KoW9FhshS/IGMp4.ev5lgNHxfTxRCVUgmbBXgFk5h51EtWQe', 1),
(10, 'AnotherRandomAccount', '$2y$10$UU5ETqSd4tYwHKSkW4upF.6ORZ4KPmtoC0Mps.jJHzi1rxKcmxVTq', 0),
(11, 'otroUser', '$2y$10$Gi./yo.njgc6eR8gfd6xyO9VDewUW2zww7EV3FpSYKiPti3ZMbcOC', 0),
(14, 'borrar1', '$2y$10$XBKKhyO0iX.xYCcBKGmWW.gTerYCxB8xC32o4fqn0YC0tDF5owwRy', 0),
(15, 'borrar2', '$2y$10$y9PP95Sqhk.cNcBP8Bhi../Rd/Fd96Zsx8aSHf2Y.GWq5PUFZybN.', 0),
(16, 'borrar3', '$2y$10$zP80lwQiJxJae1yytfLg4OPVY22ROmXpl6U69k5slwlQLjLcAW29W', 0),
(17, 'asdasd', '$2y$10$2weKnScVP0mWxZ77s.HDQ.HrwPjsuBQkfvlx5O6aYAsOypGhAeHaG', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagen`);

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`id_juego`);

--
-- Indices de la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id_review`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `id_juego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
