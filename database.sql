CREATE DATABASE IF NOT EXISTS worldnews  CHARACTER SET utf8 COLLATE utf8_general_ci;
USE worldnews;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

--
-- Base de datos: `worldnews`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `author` smallint(6) NOT NULL,
  `edited_by` smallint(6) DEFAULT NULL,
  `section_id` smallint(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `text` text NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `state` enum('in process','review','published','inactive') NOT NULL,
  `published_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  CONSTRAINT pk_articles PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `deleted_articles`
--

DROP TABLE IF EXISTS `deleted_articles`;
CREATE TABLE IF NOT EXISTS `deleted_articles` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `article_id` smallint(6) NOT NULL,
  `edited_by` smallint(6) NOT NULL,
  `section_id` smallint(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `text` text NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `state` enum('in process','review','published','inactive') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
    CONSTRAINT pk_deleted_articles PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `sections`
--

DROP TABLE IF EXISTS `sections`;
CREATE TABLE IF NOT EXISTS `sections` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `user_id` smallint(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `state` enum('active','inactive') DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  CONSTRAINT pk_sections PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `usertype` enum('journalist','admin','editor') NOT NULL,
  `state` enum('active','inactive') DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  CONSTRAINT pk_users PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- ALTER TABLES----------------------------

ALTER TABLE `articles`

    ADD CONSTRAINT uc_article UNIQUE(title, slug),
    ADD CONSTRAINT fk_articles_author FOREIGN KEY(author) REFERENCES users(id) ON DELETE restrict ON UPDATE restrict,
    ADD CONSTRAINT fk_articles_editor FOREIGN KEY(edited_by) REFERENCES users(id) ON DELETE restrict ON UPDATE restrict,
    ADD CONSTRAINT fk_articles_sections FOREIGN KEY(section_id) REFERENCES sections(id) ON DELETE restrict ON UPDATE restrict;

ALTER TABLE `deleted_articles`

    ADD CONSTRAINT fk_deleted_articles_articles FOREIGN KEY(article_id) REFERENCES articles(id) ON DELETE restrict ON UPDATE restrict,
    ADD CONSTRAINT fk_deleted_articles_editors FOREIGN KEY(edited_by) REFERENCES users(id) ON DELETE restrict ON UPDATE restrict;

ALTER TABLE `sections`

    ADD CONSTRAINT uk_sections_name UNIQUE(name),
    ADD CONSTRAINT fk_sections_users FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE restrict ON UPDATE restrict;

ALTER TABLE `users`

    ADD CONSTRAINT uc_user UNIQUE(email, username);
