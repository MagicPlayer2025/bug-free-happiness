-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 20 2025 г., 11:49
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gotourist`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password_hash`) VALUES
(1, 'admin', '$2y$10$F0TUzac4.X.D.4aECuJLtOVY168CI71HRgubuxRQ5SVAHeUol/nYy');

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `ID` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`ID`, `name`, `description`, `img`, `category`) VALUES
(2, 'Способы сэкономить в путешествии', 'Если правильно спланировать поездку, можно значительно сократить расходы. Расскажем, как выбрать недорогие билеты, бюджетное жильё и экономить на экскурсиях <br>\n<br>\nПланируйте заранее <br>\n<br>\nЗаранее забронированные билеты и жильё зачастую стоят дешевле. Также вы получаете больший выбор и возможность подобрать наиболее удобные варианты\n<br>\n<br>\nВыбирайте бюджетные направления\n<br>\n<br>\nМногие страны предлагают высокий уровень сервиса при низких затратах. Обратите внимание на Восточную Европу, Азию и Южную Америку\n<br>\n<br>\nПутешествуйте вне сезона\n<br>\n<br>\nВ межсезонье цены ниже, туристов меньше, а погода всё ещё может быть прекрасной. Это особенно актуально для популярных курортов', '../assets/img/article_econome.jpg', 'Лайфхаки'),
(3, 'Как собрать рюкзак: полезные советы', 'Чтобы не перегрузить рюкзак, важно брать только самое необходимое. Расскажем, как правильно распределить вес и какие вещи обязательно должны быть с собой \r\n<br>\r\n<br>\r\nВыбор рюкзака\r\n<br>\r\n<br>\r\nПравильный выбор рюкзака — залог комфортного путешествия. Обратите внимание на объём, вес и эргономичность. Для коротких походов выбирайте рюкзак объёмом 30–50 литров, а для длительных — 60–80 литров. Проверьте наличие системы вентиляции спины и регулируемых лямок.\r\n<br>\r\n<br>\r\nЧто взять с собой\r\n<br>\r\n<br>\r\nСписок необходимых вещей зависит от длительности поездки и её целей. В общем случае стоит взять с собой удобную одежду и обувь, средства гигиены, аптечку с необходимыми лекарствами, документы и деньги.<br>\r\nДля организации пространства в рюкзаке используйте компрессионные мешки и органайзеры. Это поможет оптимизировать использование места и обеспечить удобный доступ к вещам.\r\n<br>\r\n<br>\r\nОрганизация пространства\r\n<br>\r\n<br>\r\nГрамотно распределите вещи в рюкзаке: тяжёлые предметы разместите ближе к спине, лёгкие — сверху. Используйте боковые карманы для быстрого доступа к необходимым вещам. Не перегружайте рюкзак — следите за равномерным распределением веса.', '../assets/img/article_bag.jpg', 'Полезные советы'),
(4, 'Лучшие пляжи для бюджетного отдыха', 'Не обязательно тратить большие деньги, чтобы отдохнуть на красивом пляже. Делимся подборкой недорогих, но живописных мест для отдыха у моря\r\n<br>\r\n<br>\r\nПляжи России\r\n<br>\r\n<br>\r\nНайдите идеальные пляжи для бюджетного отдыха:\r\n<br>\r\nЧерноморское побережье: Сочи, Анапа, Геленджик — доступные отели и развитая инфраструктура.\r\n<br>\r\nАзовское море: уютные курортные посёлки с бюджетным размещением.\r\n<br>\r\nКаспийское побережье: песчаные пляжи и возможность бюджетного отдыха.\r\n<br>\r\n<br>\r\nКак найти бюджетное жильё\r\n<br>\r\n<br>\r\nЭкономьте на проживании:  Бронируйте жильё через сервисы типа Airbnb.  Выбирайте хоумстеи и мини-гостиницы.  Рассмотрите аренду комнат у местных жителей.  Ищите специальные предложения и акции.\r\n<br>\r\n<br>\r\nПитание и развлечения\r\n<br>\r\n<br>\r\nПитайтесь бюджетно:  Посещайте местные кафе и рынки.  Готовьте самостоятельно в арендованном жилье.  Участвуйте в бесплатных мероприятиях и экскурсиях.  Занимайтесь активными видами отдыха: пляжные игры, прогулки, водные развлечения.', '../assets/img/article_beach.jpg', 'Дешёвые направления'),
(5, 'Как найти и забронировать дешёвые авиабилеты', 'Чтобы поймать выгодные цены, важно знать, когда и где искать билеты. Рассказываем о лучших сервисах и лайфхаках по поиску авиабилетов.\r\n<br>\r\n<br>\r\nПоиск дешёвых авиабилетов\r\n<br>\r\n<br>\r\nИспользуйте агрегаторы для поиска:  Сравнивайте цены разных авиакомпаний.  Следите за акциями и спецпредложениями.  Выбирайте рейсы с пересадками для экономии.  Бронируйте билеты заранее.\r\n<br>\r\n<br>\r\nСекреты бронирования\r\n<br>\r\n<br>\r\nЭкономьте с умом:  Используйте бонусные программы авиакомпаний.  Участвуйте в программах лояльности.  Покупайте билеты в обе стороны.  Следите за изменениями тарифов.\r\n<br>\r\n<br>\r\nДополнительные советы\r\n<br>\r\n<br>\r\nПолезные рекомендации:  Проверяйте правильность бронирования перед оплатой.  Изучайте условия возврата и обмена билетов.  Следите за новостями авиакомпаний и сезонными предложениями.  Используйте мобильные приложения для отслеживания цен и получения уведомлений о скидках.', '../assets/img/article_flight.jpg', 'Лайфхаки');

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE `contacts` (
  `ID` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`ID`, `phone`, `message`) VALUES
(0, '+79999', 'Здравствуйте'),
(0, '+7999999', 'вв'),
(0, '+7999', 'dd'),
(0, '777', '777');

-- --------------------------------------------------------

--
-- Структура таблицы `form`
--

CREATE TABLE `form` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `form`
--

INSERT INTO `form` (`ID`, `name`, `phone`) VALUES
(1, 'Марсель', '+7999999'),
(2, 'Марсель', '+799999');

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `name`, `url`) VALUES
(1, 'О компании', '../pages/about.php'),
(2, 'Услуги', '../pages/catalog.php'),
(5, 'Статьи', '../pages/articles.php'),
(7, 'Отзывы', '../pages/reviews.php'),
(9, 'Контакты', '../pages/contact.php'),
(10, 'Туры', '../pages/order.php');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`ID`, `name`, `text`, `date`, `image`, `rating`) VALUES
(2, 'Сергей ', 'Покупали тур во Вьетнам. Остались довольны сервисом. Всё чётко, без задержек, сопровождение 24/7.', '', '', '5'),
(3, 'Екатерина', 'Брали семейный тур в Грузию. Прекрасные экскурсии и уютные отели. Спасибо за чудесные впечатления!', '', '', '5'),
(4, 'Александр', 'Всё понравилось — бронирование быстрое, сотрудники вежливые. Отдых в Италии прошёл идеально!', '', '', '5'),
(5, 'Ольга', 'Решили с мужем поехать в Каппадокию — и не пожалели! Вид на шары на рассвете запомнится навсегда. Благодарим за организацию', '', '', '5'),
(16, 'Марсель', 'Всё понравилось!', '', '', '5');

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `image_url`) VALUES
(2, 'Поиск авиабилетов', 'Находим выгодные билеты от сотен авиакомпаний', '../assets/img/airplane.png'),
(3, 'Бронирование отелей', 'Удобный поиск и бронирование отелей по всему миру', '../assets/img/building.png'),
(4, 'Экскурсии', 'Находим интересные туры и активности в вашем городе', '../assets/img/pagoda.png'),
(5, 'Горящие туры', 'Самые выгодные предложения, ближайшие даты от проверенных агентств', '../assets/img/fire.png'),
(6, 'Маршруты', 'Составляйте путешествия с учётом бюджета и интересов', '../assets/img/route.png');

-- --------------------------------------------------------

--
-- Структура таблицы `stocks`
--

CREATE TABLE `stocks` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `stocks`
--

INSERT INTO `stocks` (`ID`, `name`, `description`, `date`, `discount`, `img`) VALUES
(1, 'Раннее бронирование туров', 'Получите скидку при покупке туров за 3 месяца до вылета', 'до 30 июня', 'до -20', '../assets/img/stocks_1.png'),
(2, 'Пляжные туры', 'Специальные предложения на отдых у моря этим летом', 'до 15 июля', ' до -15%', '../assets/img/stocks_2.png'),
(3, 'Выходные в Европе', 'Экскурсионные туры по столицам Европы по сниженной цене', 'до 31 мая', 'до -10%', '../assets/img/stocks_3.png'),
(5, 'Подарки за отзыв', 'Оставьте отзыв — получите купон на следующую поездку', 'Постоянно', 'до 10%', '../assets/img/stocks_5.jpg'),
(6, 'Семейные предложения', 'Бесплатное проживание для детей до 6 лет', 'до 1 сентября', 'до 10%', '../assets/img/stocks_6.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `tours`
--

CREATE TABLE `tours` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `departure_city` varchar(100) NOT NULL,
  `arrival_city` varchar(100) NOT NULL,
  `nights` int(11) NOT NULL,
  `flight_type` enum('Прямой','С пересадкой') NOT NULL,
  `hotel_stars` int(11) NOT NULL,
  `food_type` enum('Завтрак','Завтрак+Ужин','Завтрак+Обед','Всё включено','Без питания') NOT NULL,
  `has_transfer` enum('Да','Нет') NOT NULL,
  `has_insurance` enum('Да','Нет') NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `img_operator` enum('../assets/img/1001.png','../assets/img/travelata.png') NOT NULL,
  `partner_url` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `tours`
--

INSERT INTO `tours` (`id`, `title`, `image_url`, `description`, `departure_city`, `arrival_city`, `nights`, `flight_type`, `hotel_stars`, `food_type`, `has_transfer`, `has_insurance`, `price`, `created_at`, `img_operator`, `partner_url`) VALUES
(1, 'Гранд отель Жемчужина 4*', '../assets/img/sochi.jpg', 'Прекрасный отель на берегу моря с бассейном и спа-центром.', 'Ижевск', 'Сочи', 6, 'Прямой', 4, 'Завтрак', 'Да', 'Да', 110000.00, '2025-06-17 10:14:55', '../assets/img/1001.png', 'https://hotels.1001tur.ru/russia/sochi/zhemchuzhina4/#action=actual_tour&hash=eyJkZXN0aW5hdGlvbiI6ItCh0L7Rh9C4IiwiZGVzdGluYXRpb25faWQiOiI1ODciLCJDb3VudHJ5IjoiNTQiLCJDdXJvcnQiOiI1ODciLCJIb3RlbCI6IiIsImRhdGVSYW5nZSI6IjAyLjA3LjIwMjUgLSAwOC4wNy4yMDI1IiwiTmlnaHRPdCI6IjYiLCJOaWdodERvIjoiMTEiLCJhZHVsdHMiOiIxIiwia2lkcyI6IjAiLCJmbGlnaHRfdHlwZSI6ImFueSIsInRpY2tldF9pbmNsdWRlIjoiMSIsImZyb21fY2l0eSI6IjUzNzEzIiwiYWN0Ijoic2VhcmNoIiwibWQ1X2hhc2giOiI2NTA4NDFmY2Y5MTFkODEyZDI2ZDFhNjZmOTlkYmFmYSIsImZpcnN0UGFnZSI6MSwicGFnZVR5cGUiOiJtYWluIiwicGFnZVR5cGVOZXciOiJpbm5lciIsInNpbXBsZVNlYXJjaCI6MSwiZGF0ZXMiOiIwMi4wNy4yMDI1IC0gMDguMDcuMjAyNSIsIlNEYXkiOiIwMiIsIlNNb250aCI6IjA3IiwiU1llYXIiOiIyMDI1IiwiRURheSI6IjA4IiwiRU1vbnRoIjoiMDciLCJFWWVhciI6IjIwMjUiLCJob3RlbF9pZCI6Ijc3Nzk4OTczMTE3MTE0NjkiLCJzb3J0IjoicHJpY2UiLCJ0dXJpem1faG90ZWxfaWQiOiIyNTMyIiwidGVzdCI6Im9rIiwibm9fdG91cl9yZWNhbGxfZm9ybSI6IjEiLCJrbm93bl9ob3RlbF9pZCI6WyI3Nzc5ODk3MzExNzExNDY5Il0sInNlYXJjaF9mbGlnaHRzX2NoYXJ0ZXIiOiIxIiwic2VhcmNoX2ZsaWdodHNfcmVndWxhciI6IjEiLCJhY3R1YWxfbWQ1IjoiY2ZlMzgzMTBhMDc3NzlmODg2ZjQzOGQ3N2JiNjdhMGIifQ=='),
(4, 'Гранд отель Жемчужина 4*', '../assets/img/sochi.jpg', 'Прекрасный отель на берегу моря с бассейном и спа-центром.', 'Ижевск', 'Сочи', 6, 'Прямой', 4, 'Завтрак', 'Да', 'Да', 126226.00, '2025-06-17 15:21:22', '../assets/img/travelata.png', 'https://kzn.travelata.ru/russia/sochi/hotels/grand-otel-zhemchuzhina-grand-hotel-zhemchuzhina-4-8ab0af4.html?#?fromCity=138&dateFrom=06.07.2025&dateTo=06.07.2025&nightFrom=6&nightTo=6&adults=1&priceFrom=6000&priceTo=21000000&meal=all&productType=tourOffer&hsid=qvs0iup7z7'),
(5, 'Adonis 5*', '../assets/img/adonis.jpg', 'Расположенный в самом сердце живописной Антальи, отель Adonis предлагает гостям уникальное сочетание современного комфорта и традиционного турецкого гостеприимства.', 'Казань', 'Анталья', 7, 'Прямой', 5, 'Всё включено', 'Да', 'Да', 148484.00, '2025-06-17 15:59:36', '../assets/img/travelata.png', 'https://travelata.ru/turkey/resorts/antalya/hotels/adonis-ex-grand-adonis-5-5225802.html?#?fromCity=29&dateFrom=02.07.2025&dateTo=02.07.2025&nightFrom=7&nightTo=7&adults=1&priceFrom=6000&priceTo=50000000&meal=all&productType=tourOffer&hsid=so9yo0ht43'),
(7, 'Golden Tulip Media', '../assets/img/Golden.jpg', 'Отель Golden Tulip Media, расположенный в городе Дубай, ОАЭ, является частью сети Golden Tulip Hotels и предлагает гостям комфортные условия для отдыха и работы. Отель находится в удобной близости от деловых и туристических районов города, что делает его подходящим выбором как для деловых путешественников, так и для туристов.', 'Москва', 'Дубай', 4, 'Прямой', 4, 'Без питания', 'Нет', 'Да', 47591.00, '2025-06-18 09:10:37', '../assets/img/travelata.png', 'https://travelata.ru/uae/resorts/dubai/hotels/golden-tulip-media-ex-golden-tulip-al-thanyah-apartments-comfort-inn-apartments-4-e3e93ee.html?#?fromCity=2&dateFrom=01.07.2025&dateTo=14.07.2025&nightFrom=4&nightTo=4&adults=1&priceFrom=6000&priceTo=21000000&meal=all&productType=tourOffer&sid=zuznw86es1&hsid=oc9w8bx6y2'),
(8, 'Rove Dubai Marina', '../assets/img/rove.jpg', 'Rove Dubai Marina расположен в современном районе Дубай Марина, который известен своим оживленным ритмом жизни и развитой инфраструктурой. Отель находится недалеко от популярных достопримечательностей, пляжей и торговых центров, что делает его удобным выбором для туристов и деловых путешественников.', 'Москва', 'Дубай', 7, 'Прямой', 3, 'Без питания', 'Нет', 'Да', 54317.00, '2025-06-18 09:10:37', '../assets/img/travelata.png', 'https://travelata.ru/uae/resorts/dubai/hotels/rove-dubai-marina-3-1a6d89d.html?#?fromCity=2&dateFrom=01.07.2025&dateTo=14.07.2025&nightFrom=7&nightTo=7&adults=1&priceFrom=6000&priceTo=21000000&meal=all&productType=tourOffer&sid=ti0kjzvjj9&hsid=ppxdbm0gre'),
(9, 'Crowne Plaza Dubai Jumeirah', '../assets/img/crowne.jpg', 'Отель Crowne Plaza Dubai Jumeirah, расположенный в сердце Дубая, является частью международной сети Crowne Plaza An IHG Hotels. Он предлагает гостям современные удобства и комфортный отдых.', 'Москва', 'Дубай', 7, 'Прямой', 5, 'Завтрак', 'Нет', 'Да', 56326.00, '2025-06-18 09:17:28', '../assets/img/travelata.png', ''),
(10, 'Д\'Отель', '../assets/img/d_hotel.jpg', 'Д\'Отель находится в городе Москва, в районе Алексеевский. Отель построен в 2009 году. Состоит из одиннадцатиэтажного здания, всего 80 номеров. До центра города – 8,3 км. До Международного аэропорта Шереметьево (Sheremetyevo International Airport) – 31 км.\r\n', 'Ижевск', 'Москва', 7, 'Прямой', 4, 'Без питания', 'Нет', 'Нет', 50119.00, '2025-06-18 09:58:09', '../assets/img/travelata.png', 'https://travelata.ru/russia/moscow/hotels/dotel-dizajn-otel-klubnyj-otel-36437f9.html?#?fromCity=138&dateFrom=02.07.2025&dateTo=04.07.2025&nightFrom=7&nightTo=7&adults=1&priceFrom=6000&priceTo=21000000&meal=all&productType=tourOffer&sid=nrcbt040ay&hsid=gp3pcm3gfa'),
(11, 'Mina Hotel Arbat', '../assets/img/MinaHotelArbat.jpg', 'Mina Hotel Arbat (Мина Отель Арбат) находится в городе Владивосток, входит в сеть отелей Mina. В 450 м расположен песчано-галечный пляж Владивосток. До центра города - 3,9 км. До Международного аэропорта Владивосток (Vladivostok International Airport) - 50 км.', 'Москва', 'Владивосток', 3, 'Прямой', 3, 'Без питания', 'Нет', 'Нет', 64054.00, '2025-06-18 10:06:15', '../assets/img/travelata.png', 'https://travelata.ru/russia/primorskij-kraj-vladivostok-mina-hotel-arbat-mina-otel-arbat-3-230693a.html?#?fromCity=2&dateFrom=02.07.2025&dateTo=02.07.2025&nightFrom=3&nightTo=3&adults=1&priceFrom=6000&priceTo=21000000&meal=all&productType=tourOffer&sid=4excbxyinv&hsid=epjycjvxyt'),
(12, 'Cosmos Sochi Hotel', '../assets/img/cosmos.jpg', 'Отель Cosmos Sochi Hotel расположен в Центральном районе города Сочи, рядом с городской инфраструктурой и транспортными узлами. Гостиница подойдёт для деловых поездок и отдыха на побережье.\r\n\r\n', 'Ижевск', 'Сочи', 10, 'Прямой', 4, 'Без питания', 'Нет', 'Нет', 123359.00, '2025-06-18 10:38:52', '../assets/img/travelata.png', 'https://travelata.ru/russia/sochi/hotels/cosmos-sochi-hotel-ex-park-inn-by-radisson-sochi-city-centre-4-651215f.html?#?fromCity=138&dateFrom=02.07.2025&dateTo=02.07.2025&nightFrom=10&nightTo=10&adults=1&priceFrom=6000&priceTo=21000000&meal=all&productType=tourOffer&sid=dyidnun81p&hsid=nebepmtid9'),
(13, 'Premist Hotels Sultanahmet', '../assets/img/premist.jpg', 'Premist Hotels Sultanahmet находится в городе Стамбул, в районе Султанахмет. Отель имеет 31 номер. Построен в 2012 году, последняя реновация в 2018 году. До центра города Стамбул - 550 м. До Международного аэропорта Стамбул (Istanbul International Airport) - 42 км.', 'Казань', 'Стамбул', 14, 'С пересадкой', 4, 'Завтрак', 'Нет', 'Да', 123341.00, '2025-06-18 10:38:52', '../assets/img/travelata.png', 'https://travelata.ru/turkey/resorts/istanbul/hotels/premist-hotels-sultanahmet-4-8f0a0c1.html?#?fromCity=29&dateFrom=02.07.2025&dateTo=02.07.2025&nightFrom=14&nightTo=14&adults=1&priceFrom=6000&priceTo=50000000&meal=all&productType=tourOffer&sid=gvw1krn8zj&hsid=j5qggwfv0k'),
(14, 'Holiday Inn Express Jumeirah', '../assets/img/holiday.jpg', 'Отель Holiday Inn Express Jumeirah (Холидей Инн Экспресс Джумейра) 3* расположен в одном из деловых районов Дубая, с видом на порт Рашид Доки, в нескольких минутах езды от торгового центра, и центра основных достопримечательностей и развлечений. Номера отеля оформлены в песочно-коричневых тонах, оборудованы всеми удобствами. ', 'Москва', 'Дубай', 7, 'Прямой', 2, 'Завтрак', 'Да', 'Да', 51308.00, '2025-06-18 11:20:34', '../assets/img/1001.png', 'https://hotels.1001tur.ru/oae/dubai/holiday_inn_express_dubai_jumeirah/?tour_block=2&tour_id=MmE3OGU1NTg5MWRlOGQ3MWZmNzM0NGMzZWNhYzRiNjUsYjI2MTRjNTljNmMwNzIwZDBlM2QyMTQ4OTEzYWNhNTUsMWI1MTgyODgxNWU5MTM3NmY4MTM4MTI4YjA2ZDI5ZDAsNTU5Njc5ZjY0YTA0MWJjZmMzYTU4OGUzYTVhMGE5OWYsNDZlOGM1ZTMwNzBkMWQyYjY5NDAwNWY5NWU1MjBiNTMsZDViODhkZGQ1YWZmMTc3NjdkZGUxNzM4NzdiNWYzYmY=&tour_by_room=1'),
(15, 'Ibis Styles Dubai Jumeira 3*', '../assets/img/Ibis.jpg', 'Ibis Styles Dubai Jumeira находится в городе Дубай. Расстояние до пляжа 3,0 км, а .\r\n\r\nРядом с отелем находится: The Al Farooq Omar Bin Al Khattab Mosque And Centre, Dubai Opera, Dubai Pearl Museum, Meem Gallery, WOW Kids Amusement Arcade, Christ Church Jebel Ali, Salsali Private Museum, Etihad Museum, Pro Art Gallery, The Courtyard Playhouse, CITYWALK Dubai, Andakulova gallery, Alserkal Cultural Foundation, Sahn Eddar, IKEA Restaurant, Cavendish Restaurant, Healey\'s Bar and Terrace, Bamboo Lagoon, Minato, Radisson SAS Deira Creek hotel.', 'Москва', 'Дубай', 7, 'Прямой', 3, 'Завтрак', 'Да', 'Да', 48379.00, '2025-06-18 11:20:34', '../assets/img/1001.png', 'https://hotels.1001tur.ru/oae/dubai/ibis_styles_dubai_jumeira/?tour_block=2&tour_id=OTA2NjVlNzhlMjllYWRhYTZiNDVmNjFlYjllYjRiZDcsNDNmYjMyYjA4ZmZhMjIyN2FkNGFjNjU2NmNhYzBhYzIsNGY5ZWM4MDQ2MzdiM2RiYmQ5NTFmM2FmMzg4ZmUyM2YsZWZlZDQ1ZjkwM2JhYWJjNzI1YmQyOTZlNTQ0NTA0YzUsZGMxMTZmYjg3MjliMjMxOGUyZDM1ZjcyZDI2YjgzYzUsZTkxNGU4N2QxMjQ1ZTgxNTU5YzAzMGQ5Nzc3ZGEyMTksNWM1OTUwNzJjYmE4M2Q4NGRhNjJiMGU2Y2Y4Njk5ODAsODJjYjE4NjZjMDViODA3MDM5MzUxMmY5MjlkM2Q3ZTksNGZjNTVjY2FiOTM3OGQ1ZTRmM2ZhMzQ5NDg2OTdhM2UsNWY4YzA3NjYxMzQwYjkzMmRlOTNhM2I1NWYyZWMyYjYsYjk5YWVjN2Q0NTM4MGUxMTY3MzI2ZjBmZWZlMGU4ZGEsZWM4MGJlOTQzNTI0Mjk4YjI1MjM1ZjExNGRlYzNlNTMsMmMyNTFlMThjMjg4OTk1OGIyOTI2MDRmNDUyMGE3ZjEsYzQ1MTdkMTY4ODJhNWNjZjQwYzQ0MmM2Y2VmNGFkYWEsYTE3NTJlMDdjMDZhZWMzMDExZTk3YjljMDEwZTIzZTYsZDUzMzEzMDA1YWU2OGQ3NjY3MzU1OGRkMmM4ZTg0M2MsOGQ5N2U3YTY3OGIwNzBhZGMzYTAyNmMxNjg5ODliYzQsM2I2ZThkZDk0Nzc1OTFmNDc4ODQyZjZkYTYyNzhlNjEsYzdlNGQyZjFiNDlhNzA2YjA2ZWM1ODk1NTk0MjdmMWU=&tour_by_room=1'),
(16, 'Signature 1 Hotel Tecom 4*', '../assets/img/Signature.jpg', 'Signature 1 Hotel - Barsha Heights в Дубае – это ультрасовременный четырёхзвёздочный комплекс, расположенный в знаменитом «квартале отелей» неподалёку от парковой зоны Эмират Хиллс. Удачное нахождение между ключевыми автострадами города и минутная доступность пляжа Джумейра сделали комплекс популярным среди обеспеченных туристов.', 'Москва', 'Дубай', 7, 'Прямой', 4, 'Без питания', '', '', 47374.00, '2025-06-18 11:20:34', '../assets/img/1001.png', 'https://hotels.1001tur.ru/oae/dubai/somewhere_hotel_tecom/?tour_block=2&tour_id=ODUwYTllNWM1YzYwNWYxYTAxNjVjZGM0NjM5YmQ1NTMsY2FjMzc5MDRjZTA3MjNkOWYzMWJiZDBjZDVlZjg1NmMsMDlmMmM0ODhjNTk0MTA2NTBkMGVhM2U0OTcwYTEyMWIsMDUwYWQwYzdhODBjNzFkM2ZjNGY1NzA5ODc4YWVmY2UsMzRjMWVmNmJhOWNjN2I0MThiYzk1N2NjY2ZiOTAyYTEsODJkMDMwY2ZiNjgyMmI3NTcxZDk2Y2U2ODY4YTUwYTYsOGEzNDYwZDRmYzgwMDAyMzhiNDNhYjliMTkyYzhjNTUsNjAxMDM4MjkzYzBmY2E1YjIzMDNlM2MwMmEzZDU4YzEsYmFiMjMyYWJlYzkyZmFhODAxMDliZWRjMjg0NzA4ZDcsZDE4MjE5NjJiZTg1MjEzZWY0Zjc3ZWQ3NGRiZTQ2MjcsNGRmZWJhODMxMjg3OTI0ZWZmZGZmNzU0ZjhiMzI1MmUsMWQ0NDczNzhkZjU0M2IwNzE1NzM2ZDYzOWJlMWJlOGYsMjcyOTg3YTE3YzQ4MWZmYjViNTU0ZTVlY2NhMTRlM2QsNDZjMmEwNmRjZjkyZmQwZDFiMDg5ZGVhMzFjNmI0NDIsNzYzMDhkZTI1YmZhYzkyYTZjNmU4ODg0NTUwODgwMjAsNmFmZmZkNThkNDAxN2JjNTM1MmMyOTQ0OWViYTQwNWMsNzM0OTVlMmYwNTkyZGIzOWY2ZjI4YTQ0YzYzYzI0MDgsZWMzOTQ3MzEzZTk2YjQxZTBhZTA2Y2FhODg0NDY3NjEsZTIyZTA4ODg4MTRlYWI5NzVjYWMzYTRjNWUwMjJkZDAsM2QyYjE0YmUxMzQ3MjE0MDNiOGQ3MGMxMmIwMGZkZjcsMTZkMGM2MDhlMTdhMzk1MTMwNDg2NjQwZDM0YjZkZDgsZDU5NmRkZTcwOGQzZTAxNTBlNmRjMmE5Y2ExOWMzY2UsNzNjMjQzNjQ5ZDU0NzY0MjUxZDQ5NzQ1MWMyZWJhZjY=&tour_by_room=1'),
(17, 'Конгресс-отель Экватор', '../assets/img/congress.jpg', 'Конгресс-отель Экватор находится в городе Владивосток.\r\n\r\nРядом с отелем находится: Мост на остров Русский, Государственный морской заповедник, Свято-Никольский Кафедральный собор, Пигмалион Театр Моды При ВГУЭС, Университетская набережная, Храм Святого праведного Иоанна Кронштадтского, Памятник Муравьеву-Амурскому, Братская могила моряков Тихоокеанского флота, Скульптурная композиция \"Тигрята\", Памятный знак на месте высадки основателей Владивостока, Научный музей, Vintage, Дом Бабочек \"Восторг\", Мемориал Василию Ощепкову и его японским учителям, Музей 18+, Хуторок, Файв О\'Клок, Савой Фетэ, Кафе \"Дача\".', 'Москва', 'Владивосток', 7, 'Прямой', 3, 'Без питания', 'Нет', 'Нет', 176856.00, '2025-06-18 11:20:34', '../assets/img/1001.png', 'https://hotels.1001tur.ru/russia/vladivostok/gostinica_ekvator/?tour_block=2&tour_id=MDZhYTJmYWUyYWY5M2E5ODg3YjA5MDI0ZjAwODEwNGUsYThhNGNlNWNmM2E4NDgyN2JmMTQ1ZDhlMTA2N2U0MDg=&tour_by_room=1'),
(18, 'AKKA Lush Taksim 4*', '../assets/img/stambul.jpg', 'AKKA Lush Taksim находится в городе Стамбул.\r\n\r\nРядом с отелем находится: Мечеть Рустем-Паша, Музей турецкого и исламского искусства, Военный музей Стамбула, Ural Ataman Classic Car Museum, Les Arts Turcs Tours, Borusan Contemporary, Болгарская церковь Святого Стефана, Мечеть Фатих, Panagia Vlaherna Meryem Ana Church, Florya Ataturk Marine Mansion, Yavuz Sultan Selim Mosque, Музей Ашиян, Hisart Canli Tarih Muzesi, Shrine Of Zoodochus Pege-Balikli Kilise, Dialogue in the Dark Istanbul Sergisi, Yildiz Chalet, Molla Celebi Cami, Kanuni Sultan Suleyman Turbesi, Karakoy Junk.', 'Казань', 'Стамбул', 14, 'Прямой', 4, 'Без питания', 'Да', 'Да', 161938.00, '2025-06-18 11:20:34', '../assets/img/1001.png', 'https://hotels.1001tur.ru/turkey/istanbul/bvs_lush_hotel_taksim_special_class/?tour_block=2&tour_id=OWRkMDk1NmVjM2UyNGI3OGY0N2JkZmFlYzljODUzM2QsNDZlZDg3NzI3ZGE5ZjIzMjE5MzY2MjQ4M2FiZThmODAsNjQwODc2MTI1OTg1YTU2MGI4ZTEwNWQ1Njc4Mzg0MTksNWNlYWQ1NzMyNDc0NTk2MTI5YmQ5MjM4NzkyZjdhMjIsM2Q1MWEwMGY1NWQ4ZDFiZTY0YjFlMTJmYjIxNTA4M2EsNjNjNDkzNDIxOWQyYjExODM3MmU4MjJlNzViN2NjMjEsZGQzZThmMTdlNzgyNDEwNmFkMDNjNzE1Y2UxYmQ3YjksOTFhYTZiYTQ4YTEwNTg1ZWM1M2U3NzQ5Njk0ZGIzZmIsOGVhNjhmMjkzMzNmYTFjYTFhNjEwY2UwODQ5MGVmYjgsZmJmOTQ0ZDBiYTc3ODYzOTE2YmQ0ODQ5YmY4MTNjY2MsNjE3MDU2M2M0MTNjYTY1ODg2ZThmN2Q2NzE3ZmI5OTUsNGVjNjIyNzA1YWE4YjIyMmYwNDg3ZmRhMTFjMDU4Nzk=&tour_by_room=1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `form`
--
ALTER TABLE `form`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `stocks`
--
ALTER TABLE `stocks`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
