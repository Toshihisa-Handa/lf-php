-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2021 年 2 月 17 日 09:55
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
(26, 55, '私にとってCDを買うということは、好きなメロディと言葉と思い出が形になって、いつもそばにいてくれることのような気がして、私はある曲を熱烈に好きになるとどうしてもパッケージに手が伸びます。\r\n\r\nパッケージ文化がここまで残っているのは日本くらいと耳にしますが、どうかなくならないで。', '2020-09-30 03:41:09', 9),
(27, 50, 'て', '2020-09-30 03:50:20', 9),
(28, 50, 'tgd', '2020-09-30 03:50:26', 9),
(29, 48, 'ddd', '2020-09-30 04:02:43', 0),
(30, 48, 'gっだ', '2020-09-30 04:03:27', 0),
(31, 48, 'gggggg', '2020-09-30 11:02:42', 0),
(32, 48, 'aaa', '2020-10-02 12:32:24', 9),
(33, 117, 'fff', '2021-02-15 12:10:27', 142),
(34, 117, 'fff', '2021-02-15 12:10:36', 142),
(35, 117, 'fff', '2021-02-15 12:10:59', 142),
(36, 117, 'gg', '2021-02-15 12:12:04', 142),
(37, 117, 'gg', '2021-02-15 12:12:50', 142),
(38, 117, 'ggg', '2021-02-15 12:13:28', 142),
(39, 117, 'gg', '2021-02-15 12:13:32', 142),
(40, 117, 'testtest', '2021-02-15 12:15:09', 142),
(41, 117, 'aiute', '2021-02-15 12:16:18', 142),
(42, 117, 'コメントDD', '2021-02-15 13:18:19', NULL),
(43, 117, 'dd', '2021-02-15 18:26:27', 139),
(44, 117, 'っfg', '2021-02-15 18:41:06', 139),
(45, 117, 'aaa', '2021-02-15 18:52:33', 139),
(46, 120, 'ddd', '2021-02-15 18:53:45', 139),
(47, 120, 'gg', '2021-02-15 18:53:48', 139),
(48, 117, 'ggg', '2021-02-15 18:53:59', 139),
(49, 121, 'ddd', '2021-02-15 19:12:40', NULL),
(50, 121, 'ddd', '2021-02-15 19:16:56', NULL),
(51, 120, 'ee', '2021-02-16 08:58:35', NULL),
(52, 120, '', '2021-02-16 08:58:36', NULL),
(53, 120, 'ee', '2021-02-16 08:58:37', NULL),
(54, 119, 'ff', '2021-02-16 09:01:25', NULL),
(55, 119, 'ff', '2021-02-16 09:01:28', NULL),
(56, 119, 'ff', '2021-02-16 09:02:19', NULL),
(57, 119, 'ggg', '2021-02-16 09:02:35', NULL),
(58, 121, 'gg', '2021-02-16 09:05:37', 139),
(59, 120, 'gg', '2021-02-16 09:24:17', 139),
(60, 120, 'gg', '2021-02-16 09:24:20', 139),
(61, 122, 'fff', '2021-02-16 09:24:37', NULL),
(62, 125, 'ddd', '2021-02-17 09:05:03', 139),
(63, 125, 'ggg', '2021-02-17 09:05:13', NULL),
(64, 125, 'ff', '2021-02-17 09:05:20', NULL),
(65, 125, 'gg', '2021-02-17 10:21:17', NULL),
(66, 125, 'gg', '2021-02-17 10:21:19', NULL),
(67, 125, 'ggg', '2021-02-17 10:43:29', NULL),
(68, 125, 'jj', '2021-02-17 10:44:11', NULL),
(69, 125, 'gg', '2021-02-17 10:44:27', 139),
(70, 123, 'gg', '2021-02-17 10:45:46', 139),
(71, 123, 'ggg', '2021-02-17 10:45:58', NULL),
(72, 126, 'っg', '2021-02-17 11:07:15', 147),
(73, 126, 'っf', '2021-02-17 11:07:19', 147),
(74, 127, 'gg', '2021-02-17 11:07:30', 147),
(75, 127, 'っg', '2021-02-17 11:07:33', 147),
(76, 127, 'っg', '2021-02-17 11:07:43', NULL);

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
(114, '66テスト55', '2021021090443test.jpg', 'test5566', 'eee5566', '2021-02-10 18:28:20', 87),
(117, '夜景', '20210212368995test4.jpg', '123', '333', '2021-02-12 15:34:00', 139),
(118, '大田の空', '20210212824432tes1.jpg', '空', '広い', '2021-02-12 16:10:20', 140),
(119, '大田の月', '20210212841760tes2.jpg', '月', '丸い', '2021-02-12 16:10:38', 140),
(120, 'aaadd', '20210215734460tes1.jpg', 'aa', 'aaa', '2021-02-15 17:52:22', 139),
(121, 'aaadd', '20210215948615tes3.jpg', 'aaaa', '', '2021-02-15 18:20:22', 139),
(122, 'eee', '20210216428573tes3.jpg', 'ee', 'ee', '2021-02-16 09:21:41', 145),
(123, 'eee', '20210216952037tes2.jpg', 'ee', 'ee', '2021-02-16 09:21:48', 145),
(125, 'tttt11', '2021021698210test4.jpg', 'tt11', 'tt11', '2021-02-16 09:22:01', 145),
(126, 'テスト', '20210217566569tes1.jpg', 'test', 'っっっt', '2021-02-17 11:03:55', 147),
(128, 'ff', '20210217379467test3.jpg', 'fffff', '', '2021-02-17 11:25:21', 147);

-- --------------------------------------------------------

--
-- テーブルの構造 `fcomment`
--

CREATE TABLE `fcomment` (
  `fcomment_id` int(11) NOT NULL,
  `flower_id` int(11) NOT NULL,
  `fcomment` text NOT NULL,
  `created_at` datetime NOT NULL,
  `user_id` int(11) DEFAULT '0'
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
(13, 22, 'ff', '2020-10-03 14:45:12', 9),
(14, 54, 'ddd', '2021-02-15 19:11:16', 139),
(15, 54, 'gg', '2021-02-15 19:11:22', 139),
(16, 54, 'ggg', '2021-02-15 19:11:44', 142),
(31, 52, 'eee', '2021-02-16 08:59:02', 0),
(32, 54, '', '2021-02-16 09:03:04', 0),
(33, 54, 'gg', '2021-02-16 09:03:06', 0),
(34, 54, 'テスト\r\n', '2021-02-16 09:03:15', 0),
(35, 52, 'hh', '2021-02-16 09:05:45', 139),
(36, 52, '', '2021-02-16 09:05:45', 139),
(37, 52, 'hh', '2021-02-16 09:05:51', 139),
(38, 52, 'jj', '2021-02-16 09:05:57', 139),
(39, 50, 'dd', '2021-02-16 09:23:54', 139),
(40, 50, 'ff', '2021-02-16 09:24:07', 139),
(41, 54, '', '2021-02-16 12:18:41', 146),
(42, 54, '', '2021-02-16 15:14:39', 146),
(43, 54, 'test', '2021-02-17 09:04:53', 139),
(44, 54, 'ff', '2021-02-17 09:05:27', 0),
(45, 54, 'fff', '2021-02-17 09:05:45', 0),
(46, 54, 'ggg', '2021-02-17 10:44:34', 139),
(47, 54, 'hhh', '2021-02-17 10:44:40', 139),
(48, 56, 'ddd', '2021-02-17 11:06:29', 147),
(49, 55, 'っg', '2021-02-17 11:06:54', 147),
(50, 55, 'っg', '2021-02-17 11:06:54', 147),
(51, 55, 'っs', '2021-02-17 11:06:58', 147),
(52, 56, 'っf', '2021-02-17 11:07:55', 0);

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
(49, 'hhhh55', 111155, 'hhh55', 'hhhh55', 'hhhhhh55', '2021-02-10 17:14:51', 87, '20210210588961test.jpg'),
(50, 'ニット', 123, '11', '編み物', 'あったかい', '2021-02-12 15:21:47', 139, '20210212225962test3.jpg'),
(51, '大田の山', 3000, '高い', '山', '大きな山', '2021-02-12 16:14:23', 140, '20210212664148tes1.jpg'),
(52, '大田の月', 500, '丸々い', '月', '丸い', '2021-02-12 16:14:47', 140, '20210212661468tes2.jpg'),
(53, 'っf', 123, '11111', '1111', '11t', '2021-02-15 11:08:28', 142, '20210215352172tes2.jpg'),
(54, '花', 1220, '可憐', '花束', '可愛い', '2021-02-15 17:30:44', 139, '20210215722878test2.jpg'),
(64, '山田', 123, 'rr', 'fff', '33', '2021-02-17 12:15:20', 147, '20210217441361test4.jpg');

-- --------------------------------------------------------

--
-- テーブルの構造 `map`
--

CREATE TABLE `map` (
  `id` int(100) NOT NULL,
  `lat` double(9,6) DEFAULT '0.000000',
  `lon` double(9,6) DEFAULT '0.000000',
  `pincolor` varchar(255) DEFAULT 'red',
  `maptitle` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `map`
--

INSERT INTO `map` (`id`, `lat`, `lon`, `pincolor`, `maptitle`, `description`, `created_at`, `user_id`) VALUES
(7, 36.332006, 139.455727, 'red', '22277', '33377', '2021-02-15 09:11:49', 142),
(11, 36.000000, 139.000000, 'red', 'カンセキ', 'カンセキへようこそ', '2021-02-16 11:04:56', 146),
(12, 36.000000, 139.000000, 'red', '多摩川です', '大きい川です', '2021-02-17 10:58:44', 147);

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
(23, 9, 'はんはん花屋', '花花', '半田', 'han.com', 'han@han', 12345678, '10時', '18時', '水曜日', '群馬', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12843.652577602017!2d139.33744687088088!3d36.41129665791912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601ee2508e16739b%3A0xe08ad4135955f445!2z5aSn5bed576O6KGT6aSo!5e0!3m2!1sja!2sjp!4v1599721104441!5m2!1sja!2sjp', 'test', '1601106414560-924670187bethany-cirlincione-_-ejuGChMiY-unsplash.jpg', '1601106414565-46450745davidxxx-smxW_YX-BsM-unsplash (1).jpg', '1601106414575-996655118gabriella-clare-marino-DvCs8zhR5nk-unsplash.jpg', 'おいでなすって', 'ありがとうございますaaaaaaaaaaaasasadadfsshdjfhakdhfakjdfnajkdnfjkanfdkanfkadjnfjadknfkjadndkjfnadknfaldfnaknfajdfn;akfnad', '2020-09-11 19:44:45', NULL),
(24, 10, '増子商店', '素敵なお店', '増子', 'http://second-cube.sakura.ne.jp/manulboy-re/', 'a@a', 12345678, '10時', '18時', '水曜日', '群馬', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12843.652577602017!2d139.33744687088088!3d36.41129665791912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601ee2508e16739b%3A0xe08ad4135955f445!2z5aSn5bed576O6KGT6aSo!5e0!3m2!1sja!2sjp!4v1599721104441!5m2!1sja!2sjp', 'test', '1599821362377-918662507museums-victoria-bzbCh0rFB_k-unsplash.jpg', '1599821362385-519226748nordwood-themes-LrAsfltinp0-unsplash.jpg', '1599821362386-825581758serg-b-NaaiDPPlXwk-unsplash.jpg', 'sss', 'っっf', '2020-09-11 19:50:14', NULL),
(25, 11, 'ひまわり', 'てるこ', 'ちゅーりっぷ', 'http://second-cube.sakura.ne.jp/manulboy-re/', 'han@han', 12345678, '10時', '18時', '水曜日', '東京都', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12843.652577602017!2d139.33744687088088!3d36.41129665791912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601ee2508e16739b%3A0xe08ad4135955f445!2z5aSn5bed576O6KGT6aSo!5e0!3m2!1sja!2sjp!4v1599721104441!5m2!1sja!2sjp', 'test', '1599824084687-842039863dlanor-s-ATgfRqpFfFI-unsplash.jpg', '1599824084689-474941935nathan-dumlao-tSGHEbYSUGw-unsplash.jpg', '1599824084700-817019760sarah-gualtieri-tr9GO9WXNRI-unsplash.jpg', 'sss', '　　　っっっっっf', '2020-09-15 20:45:36', ''),
(30, 21, '奥田商店', 'キレイなお店', '奥田', 'http://second-cube.sakura.ne.jp/manulboy-re/', 'okusho@.com', 12345678, '10時', '18時', '水曜日', '神奈川県', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12843.652577602017!2d139.33744687088088!3d36.41129665791912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601ee2508e16739b%3A0xe08ad4135955f445!2z5aSn5bed576O6KGT6aSo!5e0!3m2!1sja!2sjp!4v1599721104441!5m2!1sja!2sjp', 'test', '1600206047310-828289552received_354830925686284.png', '1600206047313-898146963stephanie-harvey-N9lmtlOuaDM-unsplash.jpg', '1600206047316-50976543serg-b-NaaiDPPlXwk-unsplash.jpg', 'ようこそ', '素敵なお花とおまちしています。', '2020-09-16 06:41:55', '綺麗'),
(41, 139, '足利商店1', '栃木いいとこ一度はおいで', '足利きみこ', 'https://www.yahoo.co.jp/', 'ashi@com.jp1', 123451, '', '', '', '足利市足立区1-1', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3214.194978145105!2d139.45368295096196!3d36.33182407994984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601f222de357d387%3A0x8e491e61b209d17!2z6Laz5Yip6aeF!5e0!3m2!1sja!2sjp!4v1613376318039!5m2!1sja!2sjp\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0', '20210215871800tes3.jpg', '20210215525350tes2.jpg', '20210212287869test2.jpg', '20210215190610test3.jpg', 'ようこそ', 'フラワーパークの街です', '2021-02-12 15:16:20', '綺麗'),
(42, 140, '太田商店', NULL, '太田', 'http-ota', 'ota@com.jp', 11111, '11', '12', '木曜日', '大田市', 'https', 'test', NULL, NULL, NULL, '太田へようこそ', 'お酒も美味しい', '2021-02-12 16:08:57', '大きい'),
(43, 142, 'testeeee', NULL, 'te1', '', 'te1@com.jp', 0, '', '', '', '', '', '20210215442984test2.jpg', '20210216506063test4.jpg', NULL, NULL, '', '', '2021-02-15 09:11:47', ''),
(44, 143, '', NULL, 'te5', '', 'te5@com.jp', 0, '', '', '', '', '', '20210215403048tes1.jpg', NULL, NULL, NULL, '', '', '2021-02-15 16:32:07', ''),
(45, 144, '', NULL, 'tete', '', 'tete@com.jp', 0, '', '', '', '', '', NULL, NULL, NULL, NULL, '', '', '2021-02-15 16:36:55', ''),
(46, 145, '', NULL, '半田', '', 'handa@com.jp', 0, '', '', '', '', '', '20210216496575tes1.jpg', '20210216709626test2.jpg', '2021021686269test4.jpg', '20210216425737test3.jpg', '', '', '2021-02-16 09:19:43', ''),
(47, 146, 'カンセキ花屋', '', 'カンセキ', 'https://www.yahoo.co.jp/', 'kanseki@com.jp', 12345, '7:00', '20:22', '水曜', '栃木県宇都宮市西川田２丁目４', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12303.37248983055!2d139.8570005317637!3d36.51886757566555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601f5d030c39544d%3A0xcb417823e36f537b!2z44Kr44Oz44K744Kt44K544K_44K444Ki44Og44Go44Gh44GO!5e0!3m2!1sja!2sjp!4v1613441302272!5m2!1sja!2sjp\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"', '20210216998315test3.jpg', '2021021613563tes2.jpg', '20210216794623tes3.jpg', '20210216148505tes1.jpg', 'ようこそ', '徒然なるままにどうぞ', '2021-02-16 11:04:26', '華やかに'),
(48, 147, '岩', '123456789012345', '3多摩川奈', 'https://www.yahoo.co.jp/', 'te1@com.jp', 1111111111, '3:07', '5:03', '金曜日', '多摩川-ー', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d414860.8275680323!2d139.146677133377!3d35.674534317417965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6019373811f2001b%3A0x73a6456539078ad!2z5aSa5pGp5bed!5e0!3m2!1sja!2sjp!4v1613527317487!5m2!1sja!2sjp&quot; width=&quot;600&quot; height=&quot;450&quot; frameborder=&quot;0&quot; style=&quot;border:0;&quot; allowfullscreen=&quot;&quot; aria-hidden=&quot;false&quot; tabindex=&quot;0&quot;', '20210217752964tes1.jpg', '20210217687454tes3.jpg', '20210217317364test4.jpg', '20210217598683test2.jpg', 'ようこそ1', '大きな川のほとりで1', '2021-02-17 10:58:38', '大きい川1');

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
(138, '栃木商店', 'tochi@com.jp', '$2y$10$x6BVGMy5j6OoA7UwEQywOOWXE0ZgnvlUvP5nMjW4wgdt57Tx9tmlG', '2021-02-12 15:12:09'),
(139, '足利', 'ashi@com.jp', '$2y$10$KNydJlkFHy.PoM9XGDi4zOwC8bjeO5Gskf3Nu88AOE.Ab/h4Jw2yG', '2021-02-12 15:15:20'),
(140, '太田', 'ota@com.jp', '$2y$10$8MrCJne9h4KqwoaXne3e7Oq1Xoef5xaMamtb/fzII8HXJmpEWaYQ.', '2021-02-12 16:07:27'),
(141, '群馬', 'gun@com.jp', '$2y$10$T3sde78gcuULOeZ41gdOZ.ITo3xYVzuNP3g8KaPuh03FPuXNkF4Ii', '2021-02-12 17:18:52'),
(142, 'te1', 'te1@com.jp', '$2y$10$ii87Z21f2V877YkaSxsEIuQtKj/WQtLIL3hZMTQDOS7.NvvThbyE2', '2021-02-15 09:11:42'),
(143, 'te5', 'te5@com.jp', '$2y$10$uTDkD.ZbOWEBsR19i0arrudAZzi1ZEgA.Psqs15B4W7ptuRzZjJ6e', '2021-02-15 16:32:04'),
(144, 'tete', 'tete@com.jp', '$2y$10$ZM6TFsKtwSEy1QdRKf704.FRoEzKySm4TkfdaY7fj/HtJAt0wWwty', '2021-02-15 16:36:52'),
(145, '半田', 'handa@com.jp', '$2y$10$/BPtciaOxjFq3efUFT8buu/9sQDHQjxiFbh.W1BF6SxkRz6diRcJC', '2021-02-16 09:19:29'),
(146, 'カンセキ', 'kanseki@com.jp', '$2y$10$CysjmWUM1agmHboHMIq6K.Wa2CDpq172EPJiEmP.nWTpbyYYVzeX6', '2021-02-16 11:02:28'),
(147, '多摩川', 'tamagawa@com.jp', '$2y$10$BL3m6wEvjMpurng8MTdjzuSTksLCjU/V3HKR2oBJsQseRAbtSLOqq', '2021-02-17 10:58:02');

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
  MODIFY `dcomment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- テーブルの AUTO_INCREMENT `diary`
--
ALTER TABLE `diary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- テーブルの AUTO_INCREMENT `fcomment`
--
ALTER TABLE `fcomment`
  MODIFY `fcomment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- テーブルの AUTO_INCREMENT `flower`
--
ALTER TABLE `flower`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- テーブルの AUTO_INCREMENT `map`
--
ALTER TABLE `map`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- テーブルの AUTO_INCREMENT `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- テーブルの AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
