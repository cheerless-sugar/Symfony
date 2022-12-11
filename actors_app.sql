-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 07 2022 г., 05:14
-- Версия сервера: 10.5.11-MariaDB-log
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `actors_app`
--

-- --------------------------------------------------------

--
-- Структура таблицы `actor`
--

CREATE TABLE `actor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `actor`
--

INSERT INTO `actor` (`id`, `name`, `surname`, `email`) VALUES
(2, 'Arina', 'Violy', 'a.violy@yahoo.com'),
(3, 'Ecaterina', 'Yokihomo', 'kateyoki@mail.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `actor_performance`
--

CREATE TABLE `actor_performance` (
  `id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL,
  `performance_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `actor_performance`
--

INSERT INTO `actor_performance` (`id`, `actor_id`, `performance_id`, `role_id`) VALUES
(1, 2, 2, 3),
(2, 3, 3, 1),
(5, 3, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20221203230442', '2022-12-03 23:04:55', 2085),
('DoctrineMigrations\\Version20221203231202', '2022-12-03 23:12:12', 1048),
('DoctrineMigrations\\Version20221203235400', '2022-12-03 23:54:04', 64),
('DoctrineMigrations\\Version20221204010835', '2022-12-04 01:08:42', 74);

-- --------------------------------------------------------

--
-- Структура таблицы `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `performance`
--

CREATE TABLE `performance` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` double NOT NULL,
  `image_url` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `performance`
--

INSERT INTO `performance` (`id`, `name`, `budget`, `image_url`, `description`) VALUES
(1, 'Затерянный остров Мадагаскар', 23000, 'https://i.ibb.co/xjR8hCr/mad.png', 'Затерянный остров Мадагаскар. Мы видим, как к нам приближается огромный слон. Мы понимаем, что это наш последний шанс. Слон останавливается в нескольких метрах от нас. Он поворачивается, смотрит своими огромными глазами и говорит человеческим голосом: \"Простите, ребята, похоже, я забыл кое-что у себя дома\".'),
(2, 'Возведение королевы Маргарет II на трон', 30000, 'https://i.ibb.co/rmdyxGN/queen.png', 'В 16 лет Маргарет приезжает в Лондон, где ей предстоит стать королевой. Она попадает в водоворот интриг и заговоров, но ей удается избежать гибели.'),
(3, 'Дед Мороз и Лето', 40000, 'https://cdn.discordapp.com/attachments/832336514779447316/1048809870511571036/Santa.png', 'Однажды Дед Мороз накануне Нового года, отправившись в свой традиционный путь с мешком подарков для детей, случайно узнаёт, что бывает лето, о котором он ничего не знает.\r\nРасспросив на новогоднем утреннике у детей про лето, Дед Мороз на самом деле так ничего толком не понял. Вернувшись к себе домой на север, он стал теперь красить все новогодние игрушки в непонятный зелёный цвет, напевая непонятную песенку о непонятном лете. Даже во сне Дед Мороз видит зелёные кошмары о том, как все смеются над ним и его незнанием. Промучавшись всю зиму, Дед Мороз решает попасть в город и посмотреть на лето своими глазами.\r\nОчутившись в городе на жаре, Дед Мороз почувствовал себя плохо, но дети нашли выход: накормили его мороженым и, усадив в тележку мороженщицы, повезли за город показывать лето.\r\nУвидев, благодаря детям, всю красоту летней природы: зелёный лес, зелёную траву, лягушек и бабочек, счастливый Дед Мороз подарил детям мороженое и улетел к себе на север на воздушном шаре.'),
(4, '«Опера «Риголетто»', 16000, 'https://cdn.discordapp.com/attachments/832336514779447316/1048806018659909662/jester.png', '«Опера «Риголетто», написанная в 1851 году на либретто Марии Пьяве, по драме Виктора Гюго, представляет собой социальную фреску эпохи нестабильного короля Франции Франциска I. Нравы, разврат, разврат с пальто оружие воспроизведено точно так же, как у В. Гюго. Цензура, запрещающая это появление, требует от авторов сменить тему, действие переносится в Мантую, чтобы не оскорбить королевскую власть. В центре оперы Верде психологическая драма, поэтому сложно охарактеризовано лицо главного героя Риголетто: придворного шута, глубоко страдающего любящего отца и безжалостного мстителя. В «Риголетто» композитор утверждает свою полную зрелость, в которой психологическая тонкость соперничает с музыкальной красотой. Ведь сам автор любил подчеркивать: «Самое прекрасное, что я положил на музыку, — это Риголетто».'),
(5, 'Призрак и 3 тыквы', 26000, 'https://cdn.discordapp.com/attachments/832336514779447316/1048806068614078504/pumpkin.png', 'В небольшой пригород приезжает новый учитель. На первый взгляд он очень приятный человек, но на деле оказывается совсем не таким. Однажды он попадает в дом к семье, где уже два года никто не живет. А когда он выходит из дома, то видит, как один из членов семьи убивает другого. Учитель начинает свое расследование и выясняет, что все члены семьи были убиты.'),
(6, 'Приключение улитки Робаунбер в лесу', 35000, 'https://cdn.discordapp.com/attachments/832336514779447316/1048806903842603038/snail.png', 'Маленький Робунбер, уставший от шумных соседей, отправляется в лес за медом, где встречает необычного соседа - улитку. Вместе они отправляются в путешествие, чтобы узнать, зачем на самом деле пчелы собирают мед.');

-- --------------------------------------------------------

--
-- Структура таблицы `performance_role`
--

CREATE TABLE `performance_role` (
  `id` int(11) NOT NULL,
  `performance_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `performance_role`
--

INSERT INTO `performance_role` (`id`, `performance_id`, `role_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(5, 1, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `name`, `fee`) VALUES
(1, 'Main', 0.3),
(2, 'Minor', 0.2),
(3, 'Episodic', 0.15),
(4, 'Exit role', 0.1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `actor_performance`
--
ALTER TABLE `actor_performance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_65BFB4A10DAF24A` (`actor_id`),
  ADD KEY `IDX_65BFB4AB91ADEEE` (`performance_id`),
  ADD KEY `IDX_65BFB4AD60322AC` (`role_id`);

--
-- Индексы таблицы `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Индексы таблицы `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `performance_role`
--
ALTER TABLE `performance_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9F920457B91ADEEE` (`performance_id`),
  ADD KEY `IDX_9F920457D60322AC` (`role_id`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `actor`
--
ALTER TABLE `actor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `actor_performance`
--
ALTER TABLE `actor_performance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `performance`
--
ALTER TABLE `performance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `performance_role`
--
ALTER TABLE `performance_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `actor_performance`
--
ALTER TABLE `actor_performance`
  ADD CONSTRAINT `FK_65BFB4A10DAF24A` FOREIGN KEY (`actor_id`) REFERENCES `actor` (`id`),
  ADD CONSTRAINT `FK_65BFB4AB91ADEEE` FOREIGN KEY (`performance_id`) REFERENCES `performance` (`id`),
  ADD CONSTRAINT `FK_65BFB4AD60322AC` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Ограничения внешнего ключа таблицы `performance_role`
--
ALTER TABLE `performance_role`
  ADD CONSTRAINT `FK_9F920457B91ADEEE` FOREIGN KEY (`performance_id`) REFERENCES `performance` (`id`),
  ADD CONSTRAINT `FK_9F920457D60322AC` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
