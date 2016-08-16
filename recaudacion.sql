-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-07-2016 a las 22:33:07
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `recaudacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `glob_comunas`
--

CREATE TABLE IF NOT EXISTS `glob_comunas` (
  `id_co` int(11) NOT NULL COMMENT 'ID unico de la comuna',
  `id_pr` int(11) NOT NULL COMMENT 'ID de la provincia asociada',
  `str_descripcion` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'Nombre descriptivo de la comuna',
  PRIMARY KEY (`id_co`,`id_pr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='Lista de comunas por provincia';

--
-- Volcado de datos para la tabla `glob_comunas`
--

INSERT INTO `glob_comunas` (`id_co`, `id_pr`, `str_descripcion`) VALUES
(1, 1, 'ARICA'),
(2, 1, 'CAMARONES'),
(3, 2, 'PUTRE'),
(4, 2, 'GENERAL LAGOS'),
(5, 3, 'IQUIQUE'),
(6, 3, 'ALTO HOSPICIO'),
(7, 4, 'POZO ALMONTE'),
(8, 4, 'CAMIÑA'),
(9, 4, 'COLCHANE'),
(10, 4, 'HUARA'),
(11, 4, 'PICA'),
(12, 5, 'ANTOFAGASTA'),
(13, 5, 'MEJILLONES'),
(14, 5, 'SIERRA GORDA'),
(15, 5, 'TALTAL'),
(16, 6, 'CALAMA'),
(17, 6, 'OLLAGÜE'),
(18, 6, 'SAN PEDRO DE ATACAMA'),
(19, 7, 'TOCOPILLA'),
(20, 7, 'MARÍA ELENA'),
(21, 8, 'COPIAPÓ'),
(22, 8, 'CALDERA'),
(23, 8, 'TIERRA AMARILLA'),
(24, 9, 'CHAÑARAL'),
(25, 9, 'DIEGO DE ALMAGRO'),
(26, 10, 'VALLENAR'),
(27, 10, 'ALTO DEL CARMEN'),
(28, 10, 'FREIRINA'),
(29, 10, 'HUASCO'),
(30, 11, 'LA SERENA'),
(31, 11, 'COQUIMBO'),
(32, 11, 'ANDACOLLO'),
(33, 11, 'LA HIGUERA'),
(34, 11, 'PAIGUANO'),
(35, 11, 'VICUÑA'),
(36, 12, 'ILLAPEL'),
(37, 12, 'CANELA'),
(38, 12, 'LOS VILOS'),
(39, 12, 'SALAMANCA'),
(40, 13, 'OVALLE'),
(41, 13, 'COMBARBALÁ'),
(42, 13, 'MONTE PATRIA'),
(43, 13, 'PUNITAQUI'),
(44, 13, 'RÍO HURTADO'),
(45, 14, 'VALPARAÍSO'),
(46, 14, 'CASABLANCA'),
(47, 14, 'CONCÓN'),
(48, 14, 'JUAN FERNÁNDEZ'),
(49, 14, 'PUCHUNCAVÍ'),
(50, 14, 'QUINTERO'),
(51, 14, 'VIÑA DEL MAR'),
(52, 15, 'ISLA DE PASCUA'),
(53, 16, 'LOS ANDES'),
(54, 16, 'CALLE LARGA'),
(55, 16, 'RINCONADA'),
(56, 16, 'SAN ESTEBAN'),
(57, 17, 'LA LIGUA'),
(58, 17, 'CABILDO'),
(59, 17, 'PAPUDO'),
(60, 17, 'PETORCA'),
(61, 17, 'ZAPALLAR'),
(62, 18, 'QUILLOTA'),
(63, 18, 'CALERA'),
(64, 18, 'HIJUELAS'),
(65, 18, 'LA CRUZ'),
(66, 18, 'NOGALES'),
(67, 19, 'SAN ANTONIO'),
(68, 19, 'ALGARROBO'),
(69, 19, 'CARTAGENA'),
(70, 19, 'EL QUISCO'),
(71, 19, 'EL TABO'),
(72, 19, 'SANTO DOMINGO'),
(73, 20, 'SAN FELIPE'),
(74, 20, 'CATEMU'),
(75, 20, 'LLAILLAY'),
(76, 20, 'PANQUEHUE'),
(77, 20, 'PUTAENDO'),
(78, 20, 'SANTA MARÍA'),
(79, 21, 'LIMACHE'),
(80, 21, 'QUILPUÉ'),
(81, 21, 'VILLA ALEMANA'),
(82, 21, 'OLMUÉ'),
(83, 22, 'RANCAGUA'),
(84, 22, 'CODEGUA'),
(85, 22, 'COINCO'),
(86, 22, 'COLTAUCO'),
(87, 22, 'DOÑIHUE'),
(88, 22, 'GRANEROS'),
(89, 22, 'LAS CABRAS'),
(90, 22, 'MACHALÍ'),
(91, 22, 'MALLOA'),
(92, 22, 'MOSTAZAL'),
(93, 22, 'OLIVAR'),
(94, 22, 'PEUMO'),
(95, 22, 'PICHIDEGUA'),
(96, 22, 'QUINTA DE TILCOCO'),
(97, 22, 'RENGO'),
(98, 22, 'REQUÍNOA'),
(99, 22, 'SAN VICENTE'),
(100, 23, 'PICHILEMU'),
(101, 23, 'LA ESTRELLA'),
(102, 23, 'LITUECHE'),
(103, 23, 'MARCHIHUE'),
(104, 23, 'NAVIDAD'),
(105, 23, 'PAREDONES'),
(106, 24, 'SAN FERNANDO'),
(107, 24, 'CHÉPICA'),
(108, 24, 'CHIMBARONGO'),
(109, 24, 'LOLOL'),
(110, 24, 'NANCAGUA'),
(111, 24, 'PALMILLA'),
(112, 24, 'PERALILLO'),
(113, 24, 'PLACILLA'),
(114, 24, 'PUMANQUE'),
(115, 24, 'SANTA CRUZ'),
(116, 25, 'TALCA'),
(117, 25, 'CONSTITUCIÓN'),
(118, 25, 'CUREPTO'),
(119, 25, 'EMPEDRADO'),
(120, 25, 'MAULE'),
(121, 25, 'PELARCO'),
(122, 25, 'PENCAHUE'),
(123, 25, 'RÍO CLARO'),
(124, 25, 'SAN CLEMENTE'),
(125, 25, 'SAN RAFAEL'),
(126, 26, 'CAUQUENES'),
(127, 26, 'CHANCO'),
(128, 26, 'PELLUHUE'),
(129, 27, 'CURICÓ'),
(130, 27, 'HUALAÑÉ'),
(131, 27, 'LICANTÉN'),
(132, 27, 'MOLINA'),
(133, 27, 'RAUCO'),
(134, 27, 'ROMERAL'),
(135, 27, 'SAGRADA FAMILIA'),
(136, 27, 'TENO'),
(137, 27, 'VICHUQUÉN'),
(138, 28, 'LINARES'),
(139, 28, 'COLBÚN'),
(140, 28, 'LONGAVÍ'),
(141, 28, 'PARRAL'),
(142, 28, 'RETIRO'),
(143, 28, 'SAN JAVIER'),
(144, 28, 'VILLA ALEGRE'),
(145, 28, 'YERBAS BUENAS'),
(146, 29, 'CONCEPCIÓN'),
(147, 29, 'CORONEL'),
(148, 29, 'CHIGUAYANTE'),
(149, 29, 'FLORIDA'),
(150, 29, 'HUALQUI'),
(151, 29, 'LOTA'),
(152, 29, 'PENCO'),
(153, 29, 'SAN PEDRO DE LA PAZ'),
(154, 29, 'SANTA JUANA'),
(155, 29, 'TALCAHUANO'),
(156, 29, 'TOMÉ'),
(157, 29, 'HUALPÉN'),
(158, 30, 'LEBU'),
(159, 30, 'ARAUCO'),
(160, 30, 'CAÑETE'),
(161, 30, 'CONTULMO'),
(162, 30, 'CURANILAHUE'),
(163, 30, 'LOS ALAMOS'),
(164, 30, 'TIRÚA'),
(165, 31, 'LOS ANGELES'),
(166, 31, 'ANTUCO'),
(167, 31, 'CABRERO'),
(168, 31, 'LAJA'),
(169, 31, 'MULCHÉN'),
(170, 31, 'NACIMIENTO'),
(171, 31, 'NEGRETE'),
(172, 31, 'QUILACO'),
(173, 31, 'QUILLECO'),
(174, 31, 'SAN ROSENDO'),
(175, 31, 'SANTA BÁRBARA'),
(176, 31, 'TUCAPEL'),
(177, 31, 'YUMBEL'),
(178, 31, 'ALTO BIOBÍO'),
(179, 32, 'CHILLÁN'),
(180, 32, 'BULNES'),
(181, 32, 'COBQUECURA'),
(182, 32, 'COELEMU'),
(183, 32, 'COIHUECO'),
(184, 32, 'CHILLÁN VIEJO'),
(185, 32, 'EL CARMEN'),
(186, 32, 'NINHUE'),
(187, 32, 'ÑIQUÉN'),
(188, 32, 'PEMUCO'),
(189, 32, 'PINTO'),
(190, 32, 'PORTEZUELO'),
(191, 32, 'QUILLÓN'),
(192, 32, 'QUIRIHUE'),
(193, 32, 'RÁNQUIL'),
(194, 32, 'SAN CARLOS'),
(195, 32, 'SAN FABIÁN'),
(196, 32, 'SAN IGNACIO'),
(197, 32, 'SAN NICOLÁS'),
(198, 32, 'TREGUACO'),
(199, 32, 'YUNGAY'),
(200, 33, 'TEMUCO'),
(201, 33, 'CARAHUE'),
(202, 33, 'CUNCO'),
(203, 33, 'CURARREHUE'),
(204, 33, 'FREIRE'),
(205, 33, 'GALVARINO'),
(206, 33, 'GORBEA'),
(207, 33, 'LAUTARO'),
(208, 33, 'LONCOCHE'),
(209, 33, 'MELIPEUCO'),
(210, 33, 'NUEVA IMPERIAL'),
(211, 33, 'PADRE LAS CASAS'),
(212, 33, 'PERQUENCO'),
(213, 33, 'PITRUFQUÉN'),
(214, 33, 'PUCÓN'),
(215, 33, 'SAAVEDRA'),
(216, 33, 'TEODORO SCHMIDT'),
(217, 33, 'TOLTÉN'),
(218, 33, 'VILCÚN'),
(219, 33, 'VILLARRICA'),
(220, 33, 'CHOLCHOL'),
(221, 34, 'ANGOL'),
(222, 34, 'COLLIPULLI'),
(223, 34, 'CURACAUTÍN'),
(224, 34, 'ERCILLA'),
(225, 34, 'LONQUIMAY'),
(226, 34, 'LOS SAUCES'),
(227, 34, 'LUMACO'),
(228, 34, 'PURÉN'),
(229, 34, 'RENAICO'),
(230, 34, 'TRAIGUÉN'),
(231, 34, 'VICTORIA'),
(232, 35, 'VALDIVIA'),
(233, 35, 'CORRAL'),
(234, 35, 'LANCO'),
(235, 35, 'LOS LAGOS'),
(236, 35, 'MÁFIL'),
(237, 35, 'MARIQUINA'),
(238, 35, 'PAILLACO'),
(239, 35, 'PANGUIPULLI'),
(240, 36, 'LA UNIÓN'),
(241, 36, 'FUTRONO'),
(242, 36, 'LAGO RANCO'),
(243, 36, 'RÍO BUENO'),
(244, 37, 'PUERTO MONTT'),
(245, 37, 'CALBUCO'),
(246, 37, 'COCHAMÓ'),
(247, 37, 'FRESIA'),
(248, 37, 'FRUTILLAR'),
(249, 37, 'LOS MUERMOS'),
(250, 37, 'LLANQUIHUE'),
(251, 37, 'MAULLÍN'),
(252, 37, 'PUERTO VARAS'),
(253, 38, 'CASTRO'),
(254, 38, 'ANCUD'),
(255, 38, 'CHONCHI'),
(256, 38, 'CURACO DE VÉLEZ'),
(257, 38, 'DALCAHUE'),
(258, 38, 'PUQUELDÓN'),
(259, 38, 'QUEILÉN'),
(260, 38, 'QUELLÓN'),
(261, 38, 'QUEMCHI'),
(262, 38, 'QUINCHAO'),
(263, 39, 'OSORNO'),
(264, 39, 'PUERTO OCTAY'),
(265, 39, 'PURRANQUE'),
(266, 39, 'PUYEHUE'),
(267, 39, 'RÍO NEGRO'),
(268, 39, 'SAN JUAN DE LA COSTA'),
(269, 39, 'SAN PABLO'),
(270, 40, 'CHAITÉN'),
(271, 40, 'FUTALEUFÚ'),
(272, 40, 'HUALAIHUÉ'),
(273, 40, 'PALENA'),
(274, 41, 'COIHAIQUE'),
(275, 41, 'LAGO VERDE'),
(276, 42, 'AISÉN'),
(277, 42, 'CISNES'),
(278, 42, 'GUAITECAS'),
(279, 43, 'COCHRANE'),
(280, 43, 'O''HIGGINS'),
(281, 43, 'TORTEL'),
(282, 44, 'CHILE CHICO'),
(283, 44, 'RÍO IBÁÑEZ'),
(284, 45, 'PUNTA ARENAS'),
(285, 45, 'LAGUNA BLANCA'),
(286, 45, 'RÍO VERDE'),
(287, 45, 'SAN GREGORIO'),
(288, 46, 'CABO DE HORNOS'),
(289, 46, 'ANTÁRTICA'),
(290, 47, 'PORVENIR'),
(291, 47, 'PRIMAVERA'),
(292, 47, 'TIMAUKEL'),
(293, 48, 'NATALES'),
(294, 48, 'TORRES DEL PAINE'),
(295, 49, 'SANTIAGO'),
(296, 49, 'CERRILLOS'),
(297, 49, 'CERRO NAVIA'),
(298, 49, 'CONCHALÍ'),
(299, 49, 'EL BOSQUE'),
(300, 49, 'ESTACIÓN CENTRAL'),
(301, 49, 'HUECHURABA'),
(302, 49, 'INDEPENDENCIA'),
(303, 49, 'LA CISTERNA'),
(304, 49, 'LA FLORIDA'),
(305, 49, 'LA GRANJA'),
(306, 49, 'LA PINTANA'),
(307, 49, 'LA REINA'),
(308, 49, 'LAS CONDES'),
(309, 49, 'LO BARNECHEA'),
(310, 49, 'LO ESPEJO'),
(311, 49, 'LO PRADO'),
(312, 49, 'MACUL'),
(313, 49, 'MAIPÚ'),
(314, 49, 'ÑUÑOA'),
(315, 49, 'PEDRO AGUIRRE CERDA'),
(316, 49, 'PEÑALOLÉN'),
(317, 49, 'PROVIDENCIA'),
(318, 49, 'PUDAHUEL'),
(319, 49, 'QUILICURA'),
(320, 49, 'QUINTA NORMAL'),
(321, 49, 'RECOLETA'),
(322, 49, 'RENCA'),
(323, 49, 'SAN JOAQUÍN'),
(324, 49, 'SAN MIGUEL'),
(325, 49, 'SAN RAMÓN'),
(326, 49, 'VITACURA'),
(327, 50, 'PUENTE ALTO'),
(328, 50, 'PIRQUE'),
(329, 50, 'SAN JOSÉ DE MAIPO'),
(330, 51, 'COLINA'),
(331, 51, 'LAMPA'),
(332, 51, 'TILTIL'),
(333, 52, 'SAN BERNARDO'),
(334, 52, 'BUIN'),
(335, 52, 'CALERA DE TANGO'),
(336, 52, 'PAINE'),
(337, 53, 'MELIPILLA'),
(338, 53, 'ALHUÉ'),
(339, 53, 'CURACAVÍ'),
(340, 53, 'MARÍA PINTO'),
(341, 53, 'SAN PEDRO'),
(342, 54, 'TALAGANTE'),
(343, 54, 'EL MONTE'),
(344, 54, 'ISLA DE MAIPO'),
(345, 54, 'PADRE HURTADO'),
(346, 54, 'PEÑAFLOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `glob_menu`
--

CREATE TABLE IF NOT EXISTS `glob_menu` (
  `id` int(15) NOT NULL,
  `texto` varchar(50) NOT NULL,
  `texto_en` varchar(50) NOT NULL,
  `url` varchar(2000) NOT NULL,
  `id_padre` int(15) NOT NULL,
  `icono` varchar(200) NOT NULL,
  `orden` int(15) NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `glob_menu`
--

INSERT INTO `glob_menu` (`id`, `texto`, `texto_en`, `url`, `id_padre`, `icono`, `orden`, `estado`) VALUES
(2, 'Eventos', 'Events', '', 8, '<i class="fa fa-lg fa-fw txt-color-blue fa-folder-open"></i>', 2, 1),
(1, 'Ejecutivo', 'Executive', 'Recaudacion/Evento/Ejecutivo', 2, '<i class="fa fa-lg fa-fw txt-color-blue fa-calendar"></i> ', 2, 1),
(5, 'Subir Excel', 'Upload Excel', 'Recaudacion/Carga/SubirArchivo', 4, '<i class="fa fa-lg fa-fw txt-color-blue fa-cloud-upload"></i> ', 1, 1),
(4, 'Cargas', 'Loads', '', 8, '<i class="fa fa-lg fa-fw txt-color-blue fa-folder-open"></i>', 1, 1),
(6, 'Cargas Efectuadas', 'Loads Carried Out', 'Recaudacion/Carga/ListadoCargas', 4, '<i class="fa fa-lg fa-fw txt-color-blue fa-list-alt"></i> ', 2, 1),
(7, 'Asignar Carga', 'Assign Load', 'Recaudacion/Carga/AsignarCarga', 4, '<i class="fa fa-lg fa-fw txt-color-blue fa-share-alt"></i> ', 3, 1),
(8, 'Recaudación', 'Due Money', '', 0, '<i class="fa fa-lg fa-fw txt-color-blue fa-phone-square"></i>', 2, 1),
(10, 'Sistema', 'System', '', 0, '<i class="fa fa-lg fa-fw txt-color-blue fa-cogs"></i>', 1, 1),
(11, 'Usuarios', 'Users', '', 10, '<i class="fa fa-lg fa-fw txt-color-blue fa-users"></i>', 1, 1),
(12, 'Lista Usuarios', 'User List', 'Sistema/Usuario/listaUsuarios', 11, '<i class="fa fa-lg fa-fw txt-color-blue fa-list-alt"></i> ', 1, 1),
(21, 'Recaudador', 'Collectors', 'Recaudacion/Evento/Recaudador', 2, '<i class="fa fa-lg fa-fw txt-color-blue fa-calendar"></i> ', 2, 1),
(13, 'Mantenedores', 'Maintainers', '', 8, '<i class="fa fa-lg fa-fw txt-color-blue fa-folder-open"></i>', 4, 1),
(14, 'Lista Clientes', 'Client List', 'Recaudacion/Cliente/ListadoClientes', 13, '<i class="fa fa-lg fa-fw txt-color-blue fa-institution"></i> ', 1, 1),
(15, 'Lista Recaudadores', 'Collectors List', 'Recaudacion/Recaudador/ListadoRecaudares', 13, '<i class="fa fa-lg fa-fw txt-color-blue fa-truck"></i> ', 2, 1),
(16, 'Lista Ejecutivos', 'Executives List', 'Recaudacion/Ejecutivo/ListadoEjecutivos', 13, '<i class="fa fa-lg fa-fw txt-color-blue fa-group"></i> ', 4, 1),
(17, 'Lista Grupos Empresariales', 'Business Group List', 'Recaudacion/GrupoEmpresarial/ListadoGrupoEmpresa', 13, '<i class="fa fa-lg fa-fw txt-color-blue fa-sitemap"></i> ', 5, 1),
(18, 'Pagos', 'Payments', '', 8, '<i class="fa fa-lg fa-fw txt-color-blue fa-folder-open"></i>', 3, 1),
(19, 'Subir Excel', 'Upload Excel', 'Recaudacion/pago/SubirArchivo', 18, '<i class="fa fa-lg fa-fw txt-color-blue fa-cloud-upload"></i> ', 1, 1),
(20, 'Cargas Efectuadas', 'Loads Carried Out', 'Recaudacion/pago/ListadoCargas', 18, '<i class="fa fa-lg fa-fw txt-color-blue fa-list-alt"></i> ', 1, 1),
(22, 'Cliente', 'Clients', 'Recaudacion/Evento/Cliente', 2, '<i class="fa fa-lg fa-fw txt-color-blue fa-calendar"></i> ', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `glob_menu_perfil`
--

CREATE TABLE IF NOT EXISTS `glob_menu_perfil` (
  `id` int(15) NOT NULL,
  `id_sistema` int(15) NOT NULL,
  `id_perfil` int(15) NOT NULL,
  `id_menu` int(15) NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `glob_menu_perfil`
--

INSERT INTO `glob_menu_perfil` (`id`, `id_sistema`, `id_perfil`, `id_menu`, `estado`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 1, 2, 1),
(3, 1, 1, 3, 1),
(5, 1, 1, 5, 1),
(4, 1, 1, 4, 1),
(6, 1, 1, 6, 1),
(7, 1, 1, 7, 1),
(8, 1, 1, 8, 1),
(9, 1, 1, 9, 1),
(10, 1, 1, 10, 1),
(11, 1, 1, 11, 1),
(12, 1, 1, 12, 1),
(13, 1, 1, 13, 1),
(14, 1, 1, 14, 1),
(15, 1, 1, 15, 1),
(16, 1, 1, 16, 1),
(17, 1, 1, 17, 1),
(18, 1, 1, 18, 1),
(19, 1, 1, 19, 1),
(20, 1, 1, 20, 1),
(21, 1, 1, 21, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `glob_perfil`
--

CREATE TABLE IF NOT EXISTS `glob_perfil` (
  `id` int(15) NOT NULL,
  `id_sistema` int(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `glob_perfil`
--

INSERT INTO `glob_perfil` (`id`, `id_sistema`, `nombre`, `estado`) VALUES
(1, 1, 'Administrador', 1),
(2, 1, 'Consultas', 1),
(3, 1, 'Administrador Cliente', 1),
(4, 1, 'Consultas Cliente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `glob_provincias`
--

CREATE TABLE IF NOT EXISTS `glob_provincias` (
  `id_pr` int(11) NOT NULL COMMENT 'ID provincia',
  `id_re` int(11) NOT NULL COMMENT 'ID region asociada',
  `str_descripcion` varchar(30) COLLATE latin1_spanish_ci NOT NULL COMMENT 'Nombre descriptivo',
  `num_comunas` int(11) NOT NULL COMMENT 'Numero de comunas',
  PRIMARY KEY (`id_pr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='Lista de provincias por region';

--
-- Volcado de datos para la tabla `glob_provincias`
--

INSERT INTO `glob_provincias` (`id_pr`, `id_re`, `str_descripcion`, `num_comunas`) VALUES
(1, 1, 'ARICA', 2),
(2, 1, 'PARINACOTA', 2),
(3, 2, 'IQUIQUE', 2),
(4, 2, 'TAMARUGAL', 5),
(5, 3, 'ANTOFAGASTA', 4),
(6, 3, 'EL LOA', 3),
(7, 3, 'TOCOPILLA', 2),
(8, 4, 'COPIAPÓ', 3),
(9, 4, 'CHAÑARAL', 2),
(10, 4, 'HUASCO', 4),
(11, 5, 'ELQUI', 6),
(12, 5, 'CHOAPA', 4),
(13, 5, 'LIMARÍ', 5),
(14, 6, 'VALPARAÍSO', 7),
(15, 6, 'ISLA DE PASCUA', 1),
(16, 6, 'LOS ANDES', 4),
(17, 6, 'PETORCA', 5),
(18, 6, 'QUILLOTA', 5),
(19, 6, 'SAN ANTONIO', 6),
(20, 6, 'SAN FELIPE DE ACONCAGUA', 6),
(21, 6, 'MARGA MARGA', 4),
(22, 7, 'CACHAPOAL', 17),
(23, 7, 'CARDENAL CARO', 6),
(24, 7, 'COLCHAGUA', 10),
(25, 8, 'TALCA', 10),
(26, 8, 'CAUQUENES', 3),
(27, 8, 'CURICÓ', 9),
(28, 8, 'LINARES', 8),
(29, 9, 'CONCEPCIÓN', 12),
(30, 9, 'ARAUCO', 7),
(31, 9, 'BIOBÍO', 14),
(32, 9, 'ÑUBLE', 21),
(33, 10, 'CAUTÍN', 21),
(34, 10, 'MALLECO', 11),
(35, 11, 'VALDIVIA', 8),
(36, 11, 'RANCO', 4),
(37, 12, 'LLANQUIHUE', 9),
(38, 12, 'CHILOÉ', 10),
(39, 12, 'OSORNO', 7),
(40, 12, 'PALENA', 4),
(41, 13, 'COIHAIQUE', 2),
(42, 13, 'AISÉN', 3),
(43, 13, 'CAPITÁN PRAT', 3),
(44, 13, 'GENERAL CARRERA', 2),
(45, 14, 'MAGALLANES', 4),
(46, 14, 'ANTÁRTICA CHILENA', 2),
(47, 14, 'TIERRA DEL FUEGO', 3),
(48, 14, 'ULTIMA ESPERANZA', 2),
(49, 15, 'SANTIAGO', 32),
(50, 15, 'CORDILLERA', 3),
(51, 15, 'CHACABUCO', 3),
(52, 15, 'MAIPO', 4),
(53, 15, 'MELIPILLA', 5),
(54, 15, 'TALAGANTE', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `glob_regiones`
--

CREATE TABLE IF NOT EXISTS `glob_regiones` (
  `id_re` int(11) NOT NULL COMMENT 'ID unico',
  `str_descripcion` varchar(60) COLLATE latin1_spanish_ci NOT NULL COMMENT 'Nombre extenso',
  `str_romano` varchar(5) COLLATE latin1_spanish_ci NOT NULL COMMENT 'Número de región',
  `num_provincias` int(11) NOT NULL COMMENT 'total provincias',
  `num_comunas` int(11) NOT NULL COMMENT 'Total de comunas',
  PRIMARY KEY (`id_re`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='Lista de regiones de Chile';

--
-- Volcado de datos para la tabla `glob_regiones`
--

INSERT INTO `glob_regiones` (`id_re`, `str_descripcion`, `str_romano`, `num_provincias`, `num_comunas`) VALUES
(1, 'ARICA Y PARINACOTA', 'XV', 2, 4),
(2, 'TARAPACÁ', 'I', 2, 7),
(3, 'ANTOFAGASTA', 'II', 3, 9),
(4, 'ATACAMA ', 'III', 3, 9),
(5, 'COQUIMBO ', 'IV', 3, 15),
(6, 'VALPARAÍSO ', 'V', 8, 38),
(7, 'DEL LIBERTADOR GRAL. BERNARDO O''HIGGINS ', 'VI', 3, 33),
(8, 'DEL MAULE', 'VII', 4, 30),
(9, 'DEL BIOBÍO ', 'VIII', 4, 54),
(10, 'DE LA ARAUCANÍA', 'IX', 2, 32),
(11, 'DE LOS RÍOS', 'XIV', 2, 12),
(12, 'DE LOS LAGOS', 'X', 4, 30),
(13, 'AISÉN DEL GRAL. CARLOS IBAÑEZ DEL CAMPO ', 'XI', 4, 10),
(14, 'MAGALLANES Y DE LA ANTÁRTICA CHILENA', 'XII', 4, 11),
(15, 'METROPOLITANA DE SANTIAGO', 'RM', 6, 52);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `glob_sistema`
--

CREATE TABLE IF NOT EXISTS `glob_sistema` (
  `id` int(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `glob_sistema`
--

INSERT INTO `glob_sistema` (`id`, `nombre`, `estado`) VALUES
(1, 'Recaudaciones', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `glob_usuarios`
--

CREATE TABLE IF NOT EXISTS `glob_usuarios` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(200) NOT NULL,
  `nombre` varchar(2000) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(2000) DEFAULT NULL,
  `id_perfil` int(15) NOT NULL,
  `estado` int(1) NOT NULL,
  `rut_persona` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `glob_usuarios`
--

INSERT INTO `glob_usuarios` (`id`, `usuario`, `nombre`, `password`, `email`, `id_perfil`, `estado`, `rut_persona`) VALUES
(1, '14.146.571-6', 'Alejandro Comas', 'iheJtnpnXXqSLQ/RP0GVEW5fl1h3WW1qSSEvt0nJoIYFc/sZ9gAHsljqLA32WbV6EFrGfy1vnOQQSvYUf23I5Q==', 'alejandro.comas@gmail.com', 1, 1, ''),
(3, '8.869.463-5', 'Raul Hudson', '42NkMFDjhZref2/rXOh1VhS9o9nDsq4ZspYPaKtc6ukMpxhCMY6kxLY+pZywXME+hgM3JP/6aPqTjspnnWmbaQ==', 'rhudson@recuperos.cl', 1, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reca_cargas`
--

CREATE TABLE IF NOT EXISTS `reca_cargas` (
  `id_carga` int(15) NOT NULL AUTO_INCREMENT,
  `rut_cliente` varchar(15) NOT NULL,
  `fecha_carga` date NOT NULL,
  `fecha_asignacion` date DEFAULT NULL,
  `cantidad` int(15) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`id_carga`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `reca_cargas`
--

INSERT INTO `reca_cargas` (`id_carga`, `rut_cliente`, `fecha_carga`, `fecha_asignacion`, `cantidad`, `usuario`, `estado`) VALUES
(8, '84.472.400-4', '2016-05-25', NULL, 4, '14.146.571-6', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reca_cargas_det`
--

CREATE TABLE IF NOT EXISTS `reca_cargas_det` (
  `id_carga` int(15) NOT NULL,
  `rut_cliente` varchar(15) NOT NULL,
  `rut_moroso` varchar(15) NOT NULL,
  `nombre_moroso` varchar(500) NOT NULL,
  `moneda` varchar(50) NOT NULL,
  `tipo_documento` varchar(50) NOT NULL,
  `folio` varchar(50) NOT NULL,
  `monto` decimal(15,4) NOT NULL,
  `monto_pendiente` decimal(15,4) NOT NULL,
  `fecha_emision` date NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `convenio` varchar(100) NOT NULL,
  `cuota` int(15) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reca_cargas_det`
--

INSERT INTO `reca_cargas_det` (`id_carga`, `rut_cliente`, `rut_moroso`, `nombre_moroso`, `moneda`, `tipo_documento`, `folio`, `monto`, `monto_pendiente`, `fecha_emision`, `fecha_vencimiento`, `convenio`, `cuota`, `estado`) VALUES
(8, '84.472.400-4', '14.146.571-6', 'ALEJANDRO COMAS', '$', 'FAC', '999901', '10000.0000', '10000.0000', '2016-01-18', '2016-04-18', '1521', 1, 1),
(8, '84.472.400-4', '14.146.571-6', 'ALEJANDRO COMAS', '$', 'FAC', '999902', '10000.0000', '10000.0000', '2016-01-19', '2016-04-18', '1521', 1, 1),
(8, '84.472.400-4', '14.146.571-6', 'ALEJANDRO COMAS', '$', 'FAC', '999903', '1234.4000', '10000.0000', '2016-02-18', '2016-04-18', '1521', 1, 1),
(8, '84.472.400-4', '14.146.571-6', 'ALEJANDRO COMAS', '$', 'FAC', '999904', '500.5000', '10000.0000', '2015-01-18', '2016-04-18', '1521', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reca_clientes`
--

CREATE TABLE IF NOT EXISTS `reca_clientes` (
  `rut_persona` varchar(15) NOT NULL,
  `convenio` varchar(100) NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`rut_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reca_clientes`
--

INSERT INTO `reca_clientes` (`rut_persona`, `convenio`, `estado`) VALUES
('84.472.400-4', '1521', 1),
('96.571.220-8', '1521', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reca_cli_eje`
--

CREATE TABLE IF NOT EXISTS `reca_cli_eje` (
  `rut_cliente` varchar(15) NOT NULL,
  `rut_ejecutivo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reca_cli_eje`
--

INSERT INTO `reca_cli_eje` (`rut_cliente`, `rut_ejecutivo`) VALUES
('84.472.400-4', '14.146.571-6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reca_contactos`
--

CREATE TABLE IF NOT EXISTS `reca_contactos` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `rut_cliente` varchar(15) NOT NULL,
  `rut_moroso` varchar(15) NOT NULL,
  `tipo` int(15) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `movil` varchar(50) NOT NULL,
  `email` varchar(500) NOT NULL,
  `direccion` varchar(2000) NOT NULL,
  `region` int(15) NOT NULL,
  `provincia` int(15) NOT NULL,
  `comuna` int(15) NOT NULL,
  `codigo_postal` int(15) NOT NULL,
  `observacion` varchar(2000) NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `reca_contactos`
--

INSERT INTO `reca_contactos` (`id`, `rut_cliente`, `rut_moroso`, `tipo`, `nombre`, `telefono`, `movil`, `email`, `direccion`, `region`, `provincia`, `comuna`, `codigo_postal`, `observacion`, `estado`) VALUES
(1, '84.472.400-4', '94.625.000-7', 1, 'Veronica Medina', '(56) 2 2444 4000', '(56) 9 2444 4000', 'Veronica.Medina@enex.cl', '', 15, 49, 326, 7630547, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reca_convenios`
--

CREATE TABLE IF NOT EXISTS `reca_convenios` (
  `convenio` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_termino` date NOT NULL,
  `dias_recaudacion` int(15) NOT NULL,
  `cuotas` int(15) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reca_convenios`
--

INSERT INTO `reca_convenios` (`convenio`, `tipo`, `fecha_inicio`, `fecha_termino`, `dias_recaudacion`, `cuotas`, `estado`) VALUES
('1521', 'Recaudación', '0000-00-00', '0000-00-00', 120, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reca_cuentas_bancarias`
--

CREATE TABLE IF NOT EXISTS `reca_cuentas_bancarias` (
  `rut_persona` varchar(15) NOT NULL,
  `nombre_titular` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `banco` int(15) NOT NULL,
  `tipo_cuenta` varchar(20) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reca_cuentas_bancarias`
--

INSERT INTO `reca_cuentas_bancarias` (`rut_persona`, `nombre_titular`, `email`, `banco`, `tipo_cuenta`, `numero`, `estado`) VALUES
('84.472.400-4', 'Comercial Santa Elena S.A.', 'Lissette.contreras@soprole.cl', 26, 'CTACTE', '97124-3', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reca_eventos`
--

CREATE TABLE IF NOT EXISTS `reca_eventos` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) NOT NULL,
  `rut_cliente` varchar(15) NOT NULL,
  `rut_moroso` varchar(15) NOT NULL,
  `folio` varchar(50) NOT NULL,
  `convenio` varchar(100) NOT NULL,
  `cuota` int(15) NOT NULL,
  `fecha_gestion` date NOT NULL,
  `fecha_prox_ges` date NOT NULL,
  `deuda_actual` decimal(15,4) NOT NULL,
  `deuda_gestion` decimal(15,4) NOT NULL,
  `ejecutivo` varchar(15) NOT NULL,
  `observacion` varchar(2000) NOT NULL,
  `retiro` varchar(2000) NOT NULL,
  `tipo_pago` int(15) NOT NULL,
  `forma_pago` int(15) NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `reca_eventos`
--

INSERT INTO `reca_eventos` (`id`, `tipo`, `rut_cliente`, `rut_moroso`, `folio`, `convenio`, `cuota`, `fecha_gestion`, `fecha_prox_ges`, `deuda_actual`, `deuda_gestion`, `ejecutivo`, `observacion`, `retiro`, `tipo_pago`, `forma_pago`, `estado`) VALUES
(1, 'SEGUI', '84.472.400-4', '94.625.000-7', '17558086', '1521', 1, '2016-05-17', '2016-05-18', '167351.0000', '167351.0000', '14.146.571-6', '', '', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reca_fracciones`
--

CREATE TABLE IF NOT EXISTS `reca_fracciones` (
  `nombre` varchar(100) NOT NULL,
  `observacion` varchar(500) NOT NULL,
  `ejecutivo` varchar(15) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reca_fracciones`
--

INSERT INTO `reca_fracciones` (`nombre`, `observacion`, `ejecutivo`, `estado`) VALUES
('Grupo Soprole', 'Ninguna', '14.146.571-6', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reca_frac_persona`
--

CREATE TABLE IF NOT EXISTS `reca_frac_persona` (
  `fraccion` varchar(100) NOT NULL,
  `persona` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reca_frac_persona`
--

INSERT INTO `reca_frac_persona` (`fraccion`, `persona`) VALUES
('Grupo Soprole', '84.472.400-4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reca_parametros`
--

CREATE TABLE IF NOT EXISTS `reca_parametros` (
  `id_parametro` int(15) NOT NULL,
  `tipo1` varchar(50) NOT NULL,
  `tipo2` varchar(50) NOT NULL,
  `val1` varchar(2000) NOT NULL,
  `val2` varchar(2000) NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`id_parametro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reca_parametros`
--

INSERT INTO `reca_parametros` (`id_parametro`, `tipo1`, `tipo2`, `val1`, `val2`, `estado`) VALUES
(1, 'DOCUMENTO', 'FAC', 'Factura', '', 1),
(2, 'DOCUMENTO', 'CRE', 'Nota de Crédito', '', 1),
(3, 'DOCUMENTO', 'DEB', 'Nota de Débito', '', 1),
(4, 'BANCO', '1', 'Abn Amro Bank (Chile)', '', 1),
(5, 'BANCO', '2', 'American Express Bank', '', 1),
(6, 'BANCO', '3', 'BBVA', '', 1),
(7, 'BANCO', '4', 'BCI', '', 1),
(8, 'BANCO', '5', 'Bice', '', 1),
(9, 'BANCO', '6', 'Central de Chile', '', 1),
(10, 'BANCO', '7', 'Chile', '', 1),
(11, 'BANCO', '8', 'Citibank N.A.', '', 1),
(12, 'BANCO', '9', 'Corpbanca', '', 1),
(13, 'BANCO', '10', 'De la Nacion Argentina', '', 1),
(14, 'BANCO', '11', 'Del Desarrollo', '', 1),
(15, 'BANCO', '12', 'Do Brasil', '', 1),
(16, 'BANCO', '13', 'Do Estado de Sao Paulo', '', 1),
(17, 'BANCO', '14', 'Dresdner Banque Nationale de Paris', '', 1),
(18, 'BANCO', '15', 'Estado de Chile', '', 1),
(19, 'BANCO', '16', 'Exterior', '', 1),
(20, 'BANCO', '17', 'Falabella', '', 1),
(21, 'BANCO', '18', 'HNS Banco', '', 1),
(22, 'BANCO', '19', 'HSBC Bank USA', '', 1),
(23, 'BANCO', '20', 'Internacional', '', 1),
(24, 'BANCO', '21', 'Itaú', '', 1),
(25, 'BANCO', '22', 'Letras', '', 1),
(26, 'BANCO', '23', 'Of America N.T.', '', 1),
(27, 'BANCO', '24', 'Paris', '', 1),
(28, 'BANCO', '25', 'Ripley', '', 1),
(29, 'BANCO', '26', 'Santander-Santiago', '', 1),
(30, 'BANCO', '27', 'Security', '', 1),
(31, 'BANCO', '28', 'Sudamericano', '', 1),
(32, 'BANCO', '29', 'Sudameris', '', 1),
(33, 'BANCO', '30', 'The bank of Tokio', '', 1),
(34, 'BANCO', '31', 'The Chase Manhattan Bank N.A.', '', 1),
(35, 'BANCO', '32', 'The First National Bank of Boston', '', 1),
(36, 'TIPO_CUENTA_BANCARIA', 'CTACTE', 'Cuenta Corriente', '', 1),
(37, 'TIPO_CUENTA_BANCARIA', 'CTAVIS', 'Cuenta Vista', '', 1),
(38, 'TIPO_CUENTA_BANCARIA', 'CTARUT', 'Cuenta Rut', '', 1),
(39, 'TIPO_CUENTA_BANCARIA', 'CTAAHO', 'Cuenta de Ahorro', '', 1),
(40, 'TIPO_CONTACTO', '1', 'Laboral', '', 1),
(41, 'TIPO_CONTACTO', '2', 'Domicilio', '', 1),
(42, 'TIPO_CONTACTO', '3', 'Móvil', '', 1),
(43, 'TIPO_MONEDAS', '$', 'Pesos', '', 1),
(44, 'TIPO_MONEDAS', 'UF', 'Unidad de Fomento', '', 1),
(45, 'TIPO_MONEDAS', 'USD', 'Dólar', '', 1),
(46, 'TIPO_GESTION', 'INCOBRABLE', 'Incobrable', '', 1),
(47, 'TIPO_GESTION', 'CLIENTE', 'Moroso tiene problemas con Cliente', '', 1),
(48, 'TIPO_GESTION', 'RECAUDADOR', 'Pago Comprometido', '', 1),
(49, 'TIPO_GESTION', 'EJECUTIVO', 'Continua Seguimiento con Ejecutivo', '', 1),
(50, 'TIPO_PAGO', '1', 'Nota de crédito', '', 1),
(51, 'TIPO_PAGO', '2', 'Cheque', '', 1),
(52, 'TIPO_PAGO', '3', 'Vale Vista', '', 1),
(53, 'TIPO_PAGO', '4', 'Transferencia Electronica', '', 1),
(54, 'TIPO_PAGO', '5', 'Deposito Bancario', '', 1),
(55, 'TIPO_PAGO', '6', 'Efectivo', '', 1),
(56, 'FORMA_PAGO', '1', 'Moroso efectúa pago directamente', '', 1),
(57, 'FORMA_PAGO', '2', 'Moroso entrega pago al recaudador', '', 1),
(58, 'ESTADOS', '1', 'Activo', 'Activo', 1),
(59, 'ESTADOS', '0', 'Inactivo', 'Anulado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reca_personas`
--

CREATE TABLE IF NOT EXISTS `reca_personas` (
  `rut` varchar(15) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `contacto` varchar(2000) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `movil` varchar(50) DEFAULT NULL,
  `direccion` varchar(2000) DEFAULT NULL,
  `region` int(15) DEFAULT NULL,
  `provincia` int(15) DEFAULT NULL,
  `comuna` int(15) DEFAULT NULL,
  `codigo_postal` int(15) DEFAULT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`rut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reca_personas`
--

INSERT INTO `reca_personas` (`rut`, `nombre`, `contacto`, `email`, `telefono`, `movil`, `direccion`, `region`, `provincia`, `comuna`, `codigo_postal`, `estado`) VALUES
('84.472.400-4', 'Comercial Santa Elena S.A.', 'Lissette Contreras', 'Lissette.contreras@soprole.cl', '(56) 2 24365044', '', 'Avenida Vitacura N° 4465', 15, 49, 326, 7630290, 1),
('94.625.000-7', 'Inversiones Enex S.A.', 'Veronica Medina', 'Veronica.Medina@enex.cl', '56 2 24444000', '', 'Avenida Vitacura 3350', 15, 49, 326, 7630547, 1),
('96.571.220-8', 'Banchile Inversiones S.A', 'alguien', 'asdf@azsdf.cl', '2222222', '922222', 'asdfasdfasdf', 0, 0, 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
