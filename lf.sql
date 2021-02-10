-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2021 年 2 月 10 日 12:54
-- サーバのバージョン： 5.7.32
-- PHP のバージョン: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `lf`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `dcomment`
--

CREATE TABLE `dcomment` (
  `dcomment_id` int(11) NOT NULL,
  `diary_id` int(11) NOT NULL,
  `dcomment` text NOT NULL,
  `created_at` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `dcomment`
--

INSERT INTO `dcomment` (`dcomment_id`, `diary_id`, `dcomment`, `created_at`, `user_id`) VALUES
(1, 64, 'ddd', '2020-09-29 01:32:58', NULL),
(2, 48, 'ああああ', '2020-09-29 12:22:52', NULL),
(3, 48, 'ff', '2020-09-29 23:49:43', NULL),
(4, 48, 'fff', '2020-09-30 01:04:38', NULL),
(5, 48, 'fff', '2020-09-30 01:04:46', NULL),
(6, 48, 'ggg', '2020-09-30 01:04:52', NULL),
(7, 48, 'ffff', '2020-09-30 01:06:39', NULL),
(8, 48, 'ffffgggg', '2020-09-30 01:08:36', NULL),
(9, 48, 'どうも', '2020-09-30 01:09:03', NULL),
(10, 48, 'test', '2020-09-30 02:07:42', 0),
(11, 48, 'ttt', '2020-09-30 02:08:12', 9),
(12, 48, 'fff', '2020-09-30 02:15:14', 0),
(13, 48, 'aaaa', '2020-09-30 02:31:29', 0),
(14, 48, 'えいgこ', '2020-09-30 02:32:08', 29),
(15, 48, 'っg', '2020-09-30 02:32:24', 0),
(16, 48, 'っg', '2020-09-30 02:32:24', 0),
(17, 48, 'っh', '2020-09-30 02:32:39', 0),
(18, 48, 'らくりま', '2020-09-30 02:32:53', 0),
(19, 48, 'ようこそ', '2020-09-30 02:33:04', 0),
(20, 48, '加川です\r\n', '2020-09-30 02:33:30', 11),
(21, 48, 'っfっg', '2020-09-30 02:33:50', 11),
(22, 48, 'dddtttebfvcad', '2020-09-30 02:42:27', 0),
(23, 55, 'あああ', '2020-09-30 03:39:24', 0),
(24, 55, 'っっg', '2020-09-30 03:39:29', 0),
(25, 55, 'ffg', '2020-09-30 03:40:46', 9),
(26, 55, '私にとってCDを買うということは、好きなメロディと言葉と思い出が形になって、いつもそばにいてくれることのような気がして、私はある曲を熱烈に好きになるとどうしてもパッケージに手が伸びます。\r\n\r\nパッケージ文化がここまで残っているのは日本くらいと耳にしますが、どうかなくならないで。', '2020-09-30 03:41:09', 9),
(27, 50, 'て', '2020-09-30 03:50:20', 9),
(28, 50, 'tgd', '2020-09-30 03:50:26', 9),
(29, 48, 'ddd', '2020-09-30 04:02:43', 0),
(30, 48, 'gっだ', '2020-09-30 04:03:27', 0),
(31, 48, 'gggggg', '2020-09-30 11:02:42', 0),
(32, 48, 'aaa', '2020-10-02 12:32:24', 9);

-- --------------------------------------------------------

--
-- テーブルの構造 `diary`
--

CREATE TABLE `diary` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `text` text,
  `created_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `diary`
--

INSERT INTO `diary` (`id`, `title`, `image`, `tag`, `text`, `created_at`, `user_id`) VALUES
(114, '66テスト55', '2021021090443test.jpg', 'test5566', 'eee5566', '2021-02-10 18:28:20', 87);

-- --------------------------------------------------------

--
-- テーブルの構造 `fcomment`
--

CREATE TABLE `fcomment` (
  `fcomment_id` int(11) NOT NULL,
  `flower_id` int(11) NOT NULL,
  `fcomment` text NOT NULL,
  `created_at` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `fcomment`
--

INSERT INTO `fcomment` (`fcomment_id`, `flower_id`, `fcomment`, `created_at`, `user_id`) VALUES
(1, 17, 'ddd', '2020-09-30 04:15:44', 0),
(2, 31, 'fdd', '2020-09-30 04:16:10', 9),
(3, 31, 'fff', '2020-09-30 04:32:20', 0),
(4, 31, 'hhh', '2020-09-30 04:32:23', 0),
(5, 31, 'らくりま', '2020-09-30 04:32:36', 0),
(6, 31, 'どこまでも', '2020-09-30 04:33:45', 9),
(7, 30, 'っっd', '2020-09-30 04:48:11', 0),
(8, 30, 'っっっっっdっっg￥￥\r\n\r\nがdじゃおdj\r\n\r\nぐい', '2020-09-30 04:59:14', 0),
(9, 31, '果てしなく', '2020-09-30 04:59:47', 9),
(10, 24, 'ggg', '2020-09-30 05:17:04', 32),
(11, 24, 'test', '2020-09-30 11:02:15', 0),
(12, 24, 'ほしい！', '2020-09-30 15:21:47', 0),
(13, 22, 'ff', '2020-10-03 14:45:12', 9);

-- --------------------------------------------------------

--
-- テーブルの構造 `flower`
--

CREATE TABLE `flower` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `feature` varchar(255) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `text` text,
  `created_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `flower`
--

INSERT INTO `flower` (`id`, `name`, `price`, `feature`, `tag`, `text`, `created_at`, `user_id`, `image`) VALUES
(47, '山田', 3000, 'eee', 'ee', 'eee', '2021-02-10 16:12:41', 87, '20210210826263test.jpg'),
(49, 'hhhh55', 111155, 'hhh55', 'hhhh55', 'hhhhhh55', '2021-02-10 17:14:51', 87, '20210210588961test.jpg');

-- --------------------------------------------------------

--
-- テーブルの構造 `map`
--

CREATE TABLE `map` (
  `id` int(100) NOT NULL,
  `lat` int(100) NOT NULL DEFAULT '0',
  `lon` int(100) NOT NULL DEFAULT '0',
  `pincolor` varchar(255) NOT NULL DEFAULT 'red',
  `maptitle` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `map`
--

INSERT INTO `map` (`id`, `lat`, `lon`, `pincolor`, `maptitle`, `description`, `created_at`, `user_id`) VALUES
(1, 0, 0, 'red', NULL, NULL, '2021-02-10 20:42:17', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `web` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tell` int(11) DEFAULT NULL,
  `open` varchar(255) DEFAULT NULL,
  `close` varchar(255) DEFAULT NULL,
  `holiday` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `map` varchar(500) DEFAULT NULL,
  `account_img` varchar(255) DEFAULT NULL,
  `shop_img` varchar(255) DEFAULT NULL,
  `img1` varchar(255) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `feature` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `shop`
--

INSERT INTO `shop` (`id`, `user_id`, `name`, `title`, `account_name`, `web`, `email`, `tell`, `open`, `close`, `holiday`, `location`, `map`, `account_img`, `shop_img`, `img1`, `img2`, `message`, `comment`, `created_at`, `feature`) VALUES
(23, 9, 'はんはん花屋', '花花', '半田', 'han.com', 'han@han', 12345678, '10時', '18時', '水曜日', '群馬', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12843.652577602017!2d139.33744687088088!3d36.41129665791912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601ee2508e16739b%3A0xe08ad4135955f445!2z5aSn5bed576O6KGT6aSo!5e0!3m2!1sja!2sjp!4v1599721104441!5m2!1sja!2sjp', '1601106414553-944794372behzad-ghaffarian-O7HlEjtaekU-unsplash.jpg', '1601106414560-924670187bethany-cirlincione-_-ejuGChMiY-unsplash.jpg', '1601106414565-46450745davidxxx-smxW_YX-BsM-unsplash (1).jpg', '1601106414575-996655118gabriella-clare-marino-DvCs8zhR5nk-unsplash.jpg', 'おいでなすって', 'ありがとうございますaaaaaaaaaaaasasadadfsshdjfhakdhfakjdfnajkdnfjkanfdkanfkadjnfjadknfkjadndkjfnadknfaldfnaknfajdfn;akfnad', '2020-09-11 19:44:45', NULL),
(24, 10, '増子商店', '素敵なお店', '増子', 'http://second-cube.sakura.ne.jp/manulboy-re/', 'a@a', 12345678, '10時', '18時', '水曜日', '群馬', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12843.652577602017!2d139.33744687088088!3d36.41129665791912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601ee2508e16739b%3A0xe08ad4135955f445!2z5aSn5bed576O6KGT6aSo!5e0!3m2!1sja!2sjp!4v1599721104441!5m2!1sja!2sjp', '1599821362364-782632120jessica-s-irvin-vG5QNhFCOMM-unsplash.jpg', '1599821362377-918662507museums-victoria-bzbCh0rFB_k-unsplash.jpg', '1599821362385-519226748nordwood-themes-LrAsfltinp0-unsplash.jpg', '1599821362386-825581758serg-b-NaaiDPPlXwk-unsplash.jpg', 'sss', 'っっf', '2020-09-11 19:50:14', NULL),
(25, 11, 'ひまわり', 'てるこ', 'ちゅーりっぷ', 'http://second-cube.sakura.ne.jp/manulboy-re/', 'han@han', 12345678, '10時', '18時', '水曜日', '東京都', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12843.652577602017!2d139.33744687088088!3d36.41129665791912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601ee2508e16739b%3A0xe08ad4135955f445!2z5aSn5bed576O6KGT6aSo!5e0!3m2!1sja!2sjp!4v1599721104441!5m2!1sja!2sjp', '1599824084680-86200323waldemar-brandt-q3RGXuBc_SU-unsplash.jpg', '1599824084687-842039863dlanor-s-ATgfRqpFfFI-unsplash.jpg', '1599824084689-474941935nathan-dumlao-tSGHEbYSUGw-unsplash.jpg', '1599824084700-817019760sarah-gualtieri-tr9GO9WXNRI-unsplash.jpg', 'sss', '　　　っっっっっf', '2020-09-15 20:45:36', ''),
(30, 21, '奥田商店', 'キレイなお店', '奥田', 'http://second-cube.sakura.ne.jp/manulboy-re/', 'okusho@.com', 12345678, '10時', '18時', '水曜日', '神奈川県', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12843.652577602017!2d139.33744687088088!3d36.41129665791912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601ee2508e16739b%3A0xe08ad4135955f445!2z5aSn5bed576O6KGT6aSo!5e0!3m2!1sja!2sjp!4v1599721104441!5m2!1sja!2sjp', '1600206047305-987887004cafe.jpg', '1600206047310-828289552received_354830925686284.png', '1600206047313-898146963stephanie-harvey-N9lmtlOuaDM-unsplash.jpg', '1600206047316-50976543serg-b-NaaiDPPlXwk-unsplash.jpg', 'ようこそ', '素敵なお花とおまちしています。', '2020-09-16 06:41:55', '綺麗'),
(31, 1, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-10 20:44:36', NULL),
(32, 7, '7', '7', '7', '7', '7', 7, '7', '7', '7', '7', '7', NULL, NULL, NULL, NULL, '7', '7', '2021-02-10 21:36:54', '7');

-- --------------------------------------------------------

--
-- テーブルの構造 `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `created_at`) VALUES
(82, '山田', 'yamada@jp.jp', '$2y$10$LfAchVkjl.64YD.QWW69ieHN.x2WMyNfXg9dRN0xiWJ5vukRjl7D.', '2021-02-05 09:45:38'),
(83, 'nas', 'toshihisa.handa@caters.co.jp', '$2y$10$TYos1XFUUxReujNMwBaQ2.m2JY.jQ5GG977RuW4MMbMxRvFMu56bG', '2021-02-05 09:47:11'),
(84, '中山', 'naka@com.jp', '$2y$10$cN7627v1OPm.AVseszNtYe/xiY.M/2AQmkVXQMcCxGNggONBgeqj.', '2021-02-10 15:44:08'),
(85, 'aaaaaaa', 'a@ac.com', '$2y$10$A3sZZQKgdJ93i1rQ6lbZE.XmKQg9AdqEEG7RCrvWSkDs2j0Y1Z77O', '2021-02-10 15:44:40'),
(86, 'へえ', 'hee@com.jp', '$2y$10$y.QpO5ZXn9S1HB5DdLN96eTMAbIRzj.voDfesyWAsoAIWeoiLDdsW', '2021-02-10 15:46:37'),
(87, 'test', 'test@com.jp', '$2y$10$A7PTtSiOmtfMTQD/Z452U.UaBayNVnBb6rhvcAz.m8Cv/YnIigCqi', '2021-02-10 15:57:22'),
(88, 'aaaaa', 'aa@aa.com', '$2y$10$g.91QvacTXlk2jUTOdGkheUJn3beGl2.o1nJ57b8jFvFIoarnQEkm', '2021-02-10 18:25:48'),
(89, 'test2', 'test2@com.jp', '$2y$10$Wnwtv4I4E0D279gKVECNYu7bRWf6v/FO46TOSV7ElM9DDhkkkpJB6', '2021-02-10 20:11:26'),
(90, 'test3', 'test3@com.jp', '$2y$10$m/WKZ7EufweouQLi2nh0m.nVFkkHjbXlD26q2MRp6ZTXTEBBC.ieW', '2021-02-10 20:23:47'),
(91, 'test5', 'test5@com.jp', '$2y$10$O3VgapEX4ooAVFIxK/h8fupEaVgBwoO6fYS.gq195KCa6fmEzq.YO', '2021-02-10 20:28:56'),
(99, 'test9', 'test9@com.jp', '$2y$10$s67YOjlkLAW/hfm0hqCSUuuZUd.0Fyxs0vjStWx1ZHEw8byYpFFT.', '2021-02-10 21:46:25'),
(100, 'test6', 'test6@com.jp', '$2y$10$ZmWBeIPlxzN7z5NVIIhmZeJKA9vqZBP5VO8.QttIxOs7zUZfVYW2i', '2021-02-10 21:46:53'),
(101, 'test7', 'test7@com.jp', '$2y$10$.H8ZiA5a07CpjWj0eXuQHup0flDJYAOQ0cWXcbndB4tpleTkV6DiS', '2021-02-10 21:48:30');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `dcomment`
--
ALTER TABLE `dcomment`
  ADD PRIMARY KEY (`dcomment_id`);

--
-- テーブルのインデックス `diary`
--
ALTER TABLE `diary`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `fcomment`
--
ALTER TABLE `fcomment`
  ADD PRIMARY KEY (`fcomment_id`);

--
-- テーブルのインデックス `flower`
--
ALTER TABLE `flower`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `dcomment`
--
ALTER TABLE `dcomment`
  MODIFY `dcomment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- テーブルの AUTO_INCREMENT `diary`
--
ALTER TABLE `diary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- テーブルの AUTO_INCREMENT `fcomment`
--
ALTER TABLE `fcomment`
  MODIFY `fcomment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- テーブルの AUTO_INCREMENT `flower`
--
ALTER TABLE `flower`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- テーブルの AUTO_INCREMENT `map`
--
ALTER TABLE `map`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- テーブルの AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
