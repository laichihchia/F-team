-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-06-10 06:44:00
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `fteam`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `sid` int(11) NOT NULL,
  `ad-name` varchar(255) NOT NULL,
  `ad-account` varchar(255) NOT NULL,
  `ad-password` varchar(255) NOT NULL,
  `ad-email` varchar(255) NOT NULL,
  `ad-avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `admin`
--

INSERT INTO `admin` (`sid`, `ad-name`, `ad-account`, `ad-password`, `ad-email`, `ad-avatar`) VALUES
(1, 'Admin', 'admin', 'admin', '26fteam@gmail.com', 'User_icon_2.svg.png');

-- --------------------------------------------------------

--
-- 資料表結構 `cart`
--

CREATE TABLE `cart` (
  `sid` int(11) NOT NULL,
  `produst_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `price` varchar(50) NOT NULL,
  `member_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `cart`
--

INSERT INTO `cart` (`sid`, `produst_id`, `name`, `qty`, `price`, `member_id`) VALUES
(34, '2', '他家蠻酷的 整組滑板 8.125', 2, '6980', '1412'),
(36, '2', '他家蠻酷的 整組滑板 8.125', 2, '6980', '1422'),
(150, '3', '真結合 整組滑板 7.875', 4, '6120', '14'),
(153, '3', '真結合 整組滑板 7.875', 4, '7650', '6'),
(159, '3', '真結合 整組滑板 7.875', 4, '7650', '10'),
(160, '1', '那隻狗有三對內內0.0 整組滑板 8.0', 1, '7000', '10');

-- --------------------------------------------------------

--
-- 資料表結構 `category`
--

CREATE TABLE `category` (
  `sid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_sid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `category`
--

INSERT INTO `category` (`sid`, `name`, `parent_sid`) VALUES
(1, '滑板', '0'),
(2, '噴漆', '0'),
(3, '長板', '1'),
(4, '技術板', '1'),
(5, '交通板', '1'),
(6, '板身', '1'),
(7, '輪架', '1'),
(8, '培林', '1'),
(9, '輪子', '1');

-- --------------------------------------------------------

--
-- 資料表結構 `favorite`
--

CREATE TABLE `favorite` (
  `sid` int(11) NOT NULL,
  `mem_id` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_brand` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_info` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `favorite`
--

INSERT INTO `favorite` (`sid`, `mem_id`, `product_img`, `product_brand`, `product_name`, `product_info`, `product_price`, `product_id`) VALUES
(9, '10', '637894482023930000.jpg', 'POLAR', '那隻狗有三對內內0.0 整組滑板 8.0', '已完成組裝✅\r\n板身：POLAR 被正妹瞪好爽 整組滑板 8.0\r\n砂紙：MOB x INDEPENDENT 世界第一的砂紙\r\n輪架：INDEPENDENT 中空輕量化輪架\r\n輪子：OJ WHEELS 最高品質系列 101A 54MM\r\n培林：BRONSON G3 高轉速培林\r\nPS211F119998000', '7000', 1),
(10, '10', '637894482025330000.jpg', 'POLAR', '他家蠻酷的 整組滑板 8.125', '已完成組裝✅\r\n板身：POLAR 他家蠻酷的 整組滑板 8.125\r\n砂紙：MOB x INDEPENDENT 世界第一的砂紙\r\n輪架：INDEPENDENT 中空輕量化輪架\r\n輪子：OJ WHEELS 最高品質系列 101A 54MM\r\n培林：BRONSON G3 高轉速培林\r\nPS211F121998125', '6980', 2),
(14, '10', '637889068679000000.jpg', 'INDEPENDENT', '培林', '操你媽', '1200', 21),
(25, '15', '637894482023930000.jpg', 'POLAR', '那隻狗有三對內內0.0 整組滑板 8.0', '已完成組裝✅\r\n板身：POLAR 被正妹瞪好爽 整組滑板 8.0\r\n砂紙：MOB x INDEPENDENT 世界第一的砂紙\r\n輪架：INDEPENDENT 中空輕量化輪架\r\n輪子：OJ WHEELS 最高品質系列 101A 54MM\r\n培林：BRONSON G3 高轉速培林\r\nPS211F119998000', '7000', 1),
(28, '15', '637894482031430000.jpg', 'POLAR', '真結合 整組滑板 7.875', '已完成組裝✅\r\n板身：（兒童/成人小尺寸）POLAR 真結合 整組滑板 7.875\r\n砂紙：MOB x INDEPENDENT 世界第一的砂紙\r\n輪架：INDEPENDENT 中空輕量化輪架\r\n輪子：OJ WHEELS 最高品質系列 101A 54MM\r\n培林：BRONSON G3 高轉速培林\r\nPS211F118997875', '7650', 3),
(46, '15', '637894482033000000.jpg', 'POLAR', '鯊魚跳起來 整組滑板 8.25', '已完成組裝✅\r\n板身：POLAR 鯊魚跳起來 整組滑板 8.25\r\n砂紙：MOB x INDEPENDENT 世界第一的砂紙\r\n輪架：INDEPENDENT 質感黑色基本款輪架\r\n輪子：OJ WHEELS 最高品質系列 101A 54MM\r\n培林：BRONSON G3 高轉速培林\r\nPS211F113998250', '8990', 4),
(47, '1438', '637894482023930000.jpg', 'POLAR', '那隻狗有三對內內0.0 整組滑板 8.0', '已完成組裝✅\r\n板身：POLAR 被正妹瞪好爽 整組滑板 8.0\r\n砂紙：MOB x INDEPENDENT 世界第一的砂紙\r\n輪架：INDEPENDENT 中空輕量化輪架\r\n輪子：OJ WHEELS 最高品質系列 101A 54MM\r\n培林：BRONSON G3 高轉速培林\r\nPS211F119998000', '7000', 1),
(48, '1438', '637894482025330000.jpg', 'POLAR', '他家蠻酷的 整組滑板 8.125', '已完成組裝✅\r\n板身：POLAR 他家蠻酷的 整組滑板 8.125\r\n砂紙：MOB x INDEPENDENT 世界第一的砂紙\r\n輪架：INDEPENDENT 中空輕量化輪架\r\n輪子：OJ WHEELS 最高品質系列 101A 54MM\r\n培林：BRONSON G3 高轉速培林\r\nPS211F121998125', '6980', 2),
(49, '1438', '637894482031430000.jpg', 'POLAR', '真結合 整組滑板 7.875', '已完成組裝✅\r\n板身：（兒童/成人小尺寸）POLAR 真結合 整組滑板 7.875\r\n砂紙：MOB x INDEPENDENT 世界第一的砂紙\r\n輪架：INDEPENDENT 中空輕量化輪架\r\n輪子：OJ WHEELS 最高品質系列 101A 54MM\r\n培林：BRONSON G3 高轉速培林\r\nPS211F118997875', '7650', 3),
(50, '1438', '637894482033000000.jpg', 'POLAR', '鯊魚跳起來 整組滑板 8.25', '已完成組裝✅\r\n板身：POLAR 鯊魚跳起來 整組滑板 8.25\r\n砂紙：MOB x INDEPENDENT 世界第一的砂紙\r\n輪架：INDEPENDENT 質感黑色基本款輪架\r\n輪子：OJ WHEELS 最高品質系列 101A 54MM\r\n培林：BRONSON G3 高轉速培林\r\nPS211F113998250', '8990', 4),
(51, '1438', '637883215517930000.jpg', 'SANTA CRUZ', 'DECODER HAND 9.51IN x 32.26IN CRUZER SHAPED CRUZER', '11116545-129806', '5600', 9),
(52, '1438', '637883215377670000.jpg', 'SANTA CRUZ', 'PRISMATIC DOT 8.8IN x 27.7IN CRUZER SHARK', '11116543-129804', '6600', 11),
(53, '1490', '637894482023930000.jpg', 'POLAR', '那隻狗有三對內內0.0 整組滑板 8.0', '已完成組裝✅\r\n板身：POLAR 被正妹瞪好爽 整組滑板 8.0\r\n砂紙：MOB x INDEPENDENT 世界第一的砂紙\r\n輪架：INDEPENDENT 中空輕量化輪架\r\n輪子：OJ WHEELS 最高品質系列 101A 54MM\r\n培林：BRONSON G3 高轉速培林\r\nPS211F119998000', '7000', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `lesson`
--

CREATE TABLE `lesson` (
  `sid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `duringtime_begin` date NOT NULL,
  `duringtime_end` date NOT NULL,
  `number_of_people` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `lesson`
--

INSERT INTO `lesson` (`sid`, `name`, `info`, `categories_id`, `duringtime_begin`, `duringtime_end`, `number_of_people`, `price`, `teacher`, `location`, `created_at`, `updated_at`) VALUES
(1, '((G) I-DLE) My Bag (MVdance)', '俗話說的好，掌握思考過程，也就掌握了街舞。我認為，我想，把街舞的意義想清楚，對各位來說並不是一件壞事。這必定是個前衛大膽的想法。\n\n', 0, '2022-06-05', '2022-07-05', 8, 3000, '小ㄗ', '台北市信義區', '2022-06-01 08:40:20', NULL),
(2, '流行熱門舞蹈課程(單堂無進度)', ' 總結來說，跳舞可以說是有著成為常識的趨勢。諸葛亮曾經提到過，少壯不努力，老大徒傷悲。才須學也，非學無以廣才，非志無以成學。這句話幾乎解讀出了問題的根本。', 0, '2022-07-31', '2022-08-31', 5, 2250, '小雞', '台北市北投區', '2022-06-01 09:48:46', NULL),
(3, 'New Jazz 基礎爵士(單堂無進度)', '土光敏夫曾經說過，風險和利益的大小是成正比的。但願各位能從這段話中獲得心靈上的滋長。透過逆向歸納，得以用最佳的策略去分析跳舞。', 0, '2022-06-16', '2022-07-16', 6, 2500, '圈圈', '台北市大安區', '2022-06-01 09:52:50', NULL),
(4, 'Jessi - Zoom (MVdance)', ' 帶著這些問題，我們一起來審視跳舞。一般來說，我們不得不相信，奧弗伯里說過一句富有哲理的話，一個除了榮耀的祖先而一無所有的人，就像一個土豆唯一適合他的地方就泥地下面。這把視野帶到了全新的高度。', 0, '2022-06-10', '2022-07-10', 6, 3000, '小佑', '台北市松山區', '2022-06-01 09:55:51', '2022-06-08 11:36:01'),
(5, 'GIDLE - TOMBOY (MVdance)', ' 跳舞對我來說有著舉足輕重的地位，必須要嚴肅認真的看待。我們都有個共識，若問題很困難，那就勢必不好解決。了解清楚跳舞到底是一種怎麼樣的存在，是解決一切問題的關鍵。', 1, '2022-07-14', '2022-08-14', 5, 3000, '大壯', '台北市中正區', '2022-06-01 09:58:41', NULL),
(6, '基礎嘻哈爵士 Jazz HIPHOP (單堂無進度)', '  街舞絕對是史無前例的。生活中，若街舞出現了，我們就不得不考慮它出現了的事實。謹慎地來說，我們必須考慮到所有可能。', 1, '2022-07-24', '2022-08-24', 5, 2250, '小ㄗ', '台北市信義區', '2022-06-01 10:06:46', NULL),
(7, '新手Jazz爵士入門(適合真正零基礎)', '        所謂街舞，關鍵是街舞需要如何解讀。諸葛亮講過，士之相知，溫不增華，寒不改葉，能四時而不衰，歷夷險而益固。這段話的餘韻不斷在我腦海中迴盪著。\r\n\r\n', 1, '2022-07-01', '2022-08-01', 5, 2250, '小雞', '台北市北投區', '2022-06-01 10:10:14', NULL),
(8, 'POPPING街舞', '        街舞勢必能夠左右未來。動機，可以說是最單純的力量。生活中，若街舞出現了，我們就不得不考慮它出現了的事實。我們要學會站在別人的角度思考。\r\n\r\n', 1, '2022-06-28', '2022-07-28', 6, 2500, '圈圈', '台北市大安區', '2022-06-01 10:18:02', '2022-06-08 11:35:31'),
(9, 'Breaking街舞體驗', '儘管街舞看似不顯眼，卻佔據了我的腦海。蒙田曾說過一句意義深遠的話，各市有各市的風俗，各鄉有各鄉的。這段話非常有意思。\r\n\r\n', 0, '2022-07-09', '2022-08-09', 6, 3000, '小佑', '台北市松山區', '2022-06-01 10:28:35', NULL),
(10, 'LA STYLE - TBC舞蹈', '        白哲特在不經意間這樣說過，堅強的信念能贏得強者的心，並使他們變得更堅強。。這不禁令我重新仔細的思考。白哲特說過一句很有意思的話，堅強的信念能贏得強者的心，並使他們變得更堅強。這段話讓我的心境提高了一個層次。街舞的出現，重寫了人生的意義。\r\n\r\n', 1, '2022-06-19', '2022-07-19', 8, 3000, '大壯', '台北市中正區', '2022-06-01 10:32:15', NULL),
(11, '454', '6456', 0, '2022-07-24', '2022-08-14', 5, 3000, '564', '45645', '2022-06-02 19:39:22', NULL),
(39, 'Mysql&PHP', '聽不懂背就對了', NULL, '2022-03-27', '2022-08-24', 44, 3000, '林心得', '204教室', '2022-06-05 23:20:35', '2022-06-08 11:01:54'),
(40, 'Mysql&PHP', '聽不懂背就對了', NULL, '2022-03-27', '2022-08-24', 44, 3000, '林心得', '204教室', '2022-06-05 23:21:47', NULL),
(42, '324', '43242', NULL, '2022-06-17', '2022-07-01', 342, 4234, '4234', '4234', '2022-06-06 14:06:31', NULL),
(44, '122314', '跑跑跑\r\n', NULL, '2022-06-14', '2022-06-30', 24324, 3000, '4234', 'fdsf', '2022-06-06 18:27:52', NULL),
(46, '爽辣', 'dsadas', NULL, '2022-06-15', '2022-06-24', 11, 1, 'sad', 'sdads', '2022-06-07 13:39:44', '2022-06-08 11:41:03'),
(47, '太棒了', 'dsfsf', NULL, '2022-06-29', '2022-07-01', 7777, 32213, 'ddf', 'fdsf', '2022-06-07 13:56:16', '2022-06-07 13:58:46'),
(48, '煩死了', 'fdsffs', NULL, '2022-06-16', '2022-06-25', 213, 342, 'dfdsfsd', 'fdsfsf', '2022-06-07 16:47:50', '2022-06-07 16:49:21'),
(49, '修改中', '修改中', NULL, '2022-05-12', '2022-06-01', 2312, 23131, '3123', '3123', '2022-06-07 17:19:45', '2022-06-07 17:28:14'),
(50, '更新中', '課程內容', NULL, '2022-06-14', '2022-07-14', 100, 4000, '老師', '位置', '2022-06-08 11:07:51', '2022-06-08 11:56:55'),
(51, '跳起來', '312312', NULL, '2022-06-06', '2022-06-23', 22, 0, '1233', '3123', '2022-06-08 11:37:06', '2022-06-08 14:13:50'),
(52, '在哪在哪裡', 'fdsfsdf', NULL, '2022-06-10', '2022-06-30', 123, 21312312, 'fdsfdsf', 'dfsd', '2022-06-08 11:38:30', '2022-06-08 11:39:45');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `sid` int(11) NOT NULL,
  `mem-name` varchar(255) NOT NULL,
  `mem-nickname` varchar(255) NOT NULL,
  `mem-level` varchar(255) NOT NULL,
  `mem-account` varchar(255) NOT NULL,
  `mem-password` varchar(255) NOT NULL,
  `mem-email` varchar(255) NOT NULL,
  `mem-mobile` varchar(255) NOT NULL,
  `mem-birthday` date DEFAULT NULL,
  `mem-address` varchar(255) NOT NULL,
  `mem-avatar` varchar(255) NOT NULL,
  `mem-created_at` datetime NOT NULL,
  `mem-bollen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`sid`, `mem-name`, `mem-nickname`, `mem-level`, `mem-account`, `mem-password`, `mem-email`, `mem-mobile`, `mem-birthday`, `mem-address`, `mem-avatar`, `mem-created_at`, `mem-bollen`) VALUES
(1, '安安', '哈哈', '平民', 'gfdgdgdg', 'dfgdgdfgdgf', 'garylin0969@gmail.com', '0955555555', '2022-05-02', '台北市', '', '2022-05-31 16:15:43', 0),
(3, '安安', '哈哈', '平民', 'gfdgdgdg', 'sdfsdfsdfsdfsd', 'garylin0969@gmail.com', '0955555555', '2022-05-02', 'sdfsdf', '', '2022-05-31 17:00:44', 0),
(4, '林宸皞', '', '平民', 'jghghjhgjop[u[', 'uopiui[op[o', '', '', NULL, '', '', '2022-06-01 00:19:27', 0),
(5, '林宸皞', '', '平民', 'jghghjhgjop[u[', 'uopiui[op[o', '', '', NULL, '', '', '2022-06-01 00:30:14', 0),
(6, 'gary', '', '平民', 'gary', 'gary', '', '', NULL, '', '23c751784e5af37463cfdb622abfd824.jpg', '2022-06-02 00:18:40', 1),
(8, 'gary', '', '平民', 'vxcvxcv', 'xcvxcvxcvx', '', '', NULL, '', '', '2022-06-02 17:21:19', 1),
(10, 'aaaa', '', '平民', 'aaaa', 'aaaa', '', '', NULL, '', 'ecca2292b6dd157b459e19b0690d56fd.png', '2022-06-03 13:44:21', 1),
(11, 'shinder', '', '平民', '111', '111', '', '', NULL, '', 'images.png', '2022-06-06 14:42:09', 0),
(12, 'shinder01', 'shinder\'s fans', '平民', 'shinder01', 'shinder01', '', '0912312311', NULL, '', 'images.png', '2022-06-07 00:45:30', 1),
(13, 'shinder02', 'shinder02', '平民', 'shinder02', 'shinder02', '', '', NULL, '', 'images.png', '2022-06-07 22:09:01', 1),
(14, 'shinder03', '', '平民', 'shinder03', 'shinder03', '', '', NULL, '', '02216d360e3ba0dc6a29e7fea1bbec88.jpg', '2022-06-08 13:52:44', 1),
(15, 'kevin', '', '平民', 'kevin', 'kevin', '', '', NULL, '', 'images.png', '2022-06-09 16:28:59', 1),
(1438, '林玟葶', '老婆', '平民', '222', '222', '', '', NULL, '', '79981805580302ef5252b0a29d9e4107.jpg', '2022-06-05 03:54:23', 1),
(1452, '林宸皞6', '', '平民', '11115', '111145', '', '', NULL, '', 'images.png', '2022-06-07 17:01:52', 1),
(1453, '林宸皞', '', '平民', '888', '888', '', '', NULL, '', 'images.png', '2022-06-07 18:47:10', 1),
(1454, '會員', '', '平民', '555', '555', '', '', NULL, '', 'images.png', '2022-06-06 22:15:17', 1),
(1455, 'gary', '', '平民', '777', '777', '', '', NULL, '', 'images.png', '2022-06-07 23:05:47', 1),
(1456, '好吧', '', '平民', '444', '444', '', '', NULL, '', 'images.png', '2022-06-07 23:14:41', 0),
(1458, 'gary', '', '平民', 'uuu', 'uuu', '', '', NULL, '', 'images.png', '2022-06-08 00:55:15', 1),
(1459, '林玟葶', '', '平民', 'mmm', 'mmm', '', '', NULL, '', 'a53d5f10b80316bc634ff2c4e0fb97cc.jpg', '2022-06-08 02:47:33', 1),
(1461, 'ui', '', '平民', 'uiui', 'uiui', '', '', NULL, '', 'images.png', '2022-06-07 21:32:22', 1),
(1462, '林玟葶', '', '平民', 'ttt', 'ttt', '', '', NULL, '', '1c5b6a049c15ed8e44fb92cc28a05202.jpg', '2022-06-08 23:22:56', 1),
(1467, '林宸皞', '', '平民', '444', '444', '', '', NULL, '', 'images.png', '2022-06-09 03:03:38', 1),
(1468, 'hjkhjkhjkj', '', '平民', 'hjkhjk', 'hjkhjkhjk', '', '', NULL, '', 'images.png', '2022-06-09 03:17:06', 1),
(1469, 'hjkhjkhjkjp55', '', '平民', 'hjkhjk', 'hjkhjkhjk', '', '', NULL, '', 'images.png', '2022-06-09 03:17:49', 1),
(1470, '會員', '', '平民', 'hfghfgh', 'fghfghg', '', '', NULL, '', 'images.png', '2022-06-09 03:17:59', 1),
(1471, '會員', '', '平民', 'yyy', 'yyy', '', '', NULL, '', 'images.png', '2022-06-09 03:18:17', 1),
(1472, '林宸皞', '', '平民', '555', '555', '', '', NULL, '', 'images.png', '2022-06-09 03:19:17', 1),
(1473, '會員', '', '平民', 'erer', 'erer', '', '', NULL, '', 'images.png', '2022-06-09 03:19:25', 1),
(1474, '會員', '', '平民', 'tyty', 'tytyty', '', '', NULL, '', 'images.png', '2022-06-09 03:25:09', 1),
(1475, '林宸皞', '', '平民', 'erer', 'erer', '', '', NULL, '', 'images.png', '2022-06-09 03:25:39', 1),
(1476, '會員', '', '平民', 'uiouio', 'uiouiouio', '', '', NULL, '', 'images.png', '2022-06-09 03:26:30', 1),
(1477, '林玟葶', '', '平民', 'ererere', 'rererewfedfse', '', '', NULL, '', 'images.png', '2022-06-09 03:26:52', 1),
(1478, '好吧', '', '平民', 'fff', 'fffsdfdsfsdf', '', '', NULL, '', 'images.png', '2022-06-09 03:27:52', 1),
(1479, 'hdfgzdhrtyh', '', '平民', 'tytysadtht', 'hdfhaethyet', '', '', NULL, '', '3191872d134ffb077b1a2d6c29d96625.gif', '2022-06-09 03:29:23', 1),
(1480, '會員', '', '平民', 'dfsdfgvw', 'rfgsdafvsdf', '', '', NULL, '', 'images.png', '2022-06-09 03:32:31', 1),
(1481, 'FVAETYHERTH', '', '平民', 'garyfsdf', 'sdfwer21Q3TG', '', '', NULL, '', '39d9c431be99ac82db8269e4482f2b47.gif', '2022-06-09 03:32:49', 1),
(1484, '會員', '', '平民', '5554', '5554', '', '', NULL, '', 'images.png', '2022-06-09 04:08:54', 0),
(1485, 'garyIII', '', '平民', 'III', 'III', '', '', NULL, '', 'images.png', '2022-06-09 04:09:45', 0),
(1486, '幹幹幹', '', '平民', '000', '000', '', '', NULL, '', '81b532bf70063913d76f8b3a5f405135.jpg', '2022-06-09 15:17:34', 1),
(1487, '會員', '', '平民', 'yyy', 'yyy', '', '', NULL, '', 'images.png', '2022-06-09 20:32:24', 1),
(1488, '會員', '', '平民', '444', '444', '', '', NULL, '', 'images.png', '2022-06-10 01:37:44', 1),
(1490, '會員', '', '平民', '7878', '7878', '', '', NULL, '', 'images.png', '2022-06-10 02:17:03', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `news`
--

CREATE TABLE `news` (
  `sid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `news`
--

INSERT INTO `news` (`sid`, `title`, `info`, `image`, `created_at`, `update_at`) VALUES
(1, '滑板系列', 'Carson經常關注Supreme、A Bathing Ape等潮牌，緊貼潮流時尚，對近兩年高端時尚品牌如Louise Vuitton、Dior與街頭藝術家合作推出的聯乘作品更是不掩欣賞之情。街頭藝術對他來說，已經不是少數人追捧的文化現象，而是漸漸走進高級藝術的殿堂。在購藏這批滑板之前，他亦有收藏過去幾年Supreme推出的部分滑板，而當友人提及蘇富比即將上拍過去二十年所有Supreme滑板時，他知道這就是入手全套滑板千載難逢的良機。', '001.jpeg', '2022-06-03 08:40:07', '2022-06-03 08:40:07'),
(2, '國外選手來台', '「其實台灣街道上有一些很好的板點，甚至很多都尚未被開發，不少國外來的選手都說台灣像滑板天堂，Spot（板點）超多超棒，我相信這也是為什麼，近幾年一直有國外職業選手會選擇來台灣取景拍攝滑板影片的原因」，此次的訪問對象，同時也是台灣少見的職業滑板選手－柯家恩這樣說，趁此機會，就讓他帶我們暢滑台北街頭，一併也聊聊他最喜愛的滑板大小事。\r\n\r\n', '002.jpeg', '2022-06-03 08:40:07', '2022-06-03 08:40:07'),
(3, '台灣滑板店引進nike sb', 'Nike SB 的全稱是skateboarding（滑板運動），在 15年前，街頭流行風格最具代表性的鞋就是 Dunk SB。\r\n200年 Nike SB 系列，發布了第一款鞋 Nike Dunk SB首度問世，俗稱的四大天王 Danny supa、mulder、Gino、Forbes\r\n個人也因為鞋身用料質感以及zoom air鞋墊加持。開始入坑', '003.jpeg', '2022-06-03 08:40:07', '2022-06-03 08:40:07'),
(4, '他花22年滑進東奧！美國「滑板機器人」奪金大熱門竟重摔', '2020東京奧運在本屆賽事中，首次將街頭運動「滑板」（Skateboarding）列入正式比賽項目。世界積分排名第一的「美國滑板機器人」休斯頓（Nyjah Huston）在賽前被外界看好是奪下歷史首面滑板金牌的人選，不料卻在昨（25）日的街道賽中，技巧動作部分多次出現嚴重失誤，不僅摔掉金牌，更僅拿到第七名。儘管無緣獎牌，休斯頓賽後依然維持王者風範，主動擁抱拿下金牌的日本選手堀米雄斗。\r\n\r\n', '004.jpeg', '2022-06-03 08:40:07', '2022-06-03 08:40:07'),
(5, '華麗搖滾學院風！Dior 2022早秋系列時裝秀：女子滑板手帥氣開場、全新包款與晚禮服造型初亮相！', 'Dior 日前首次在首爾舉行時裝秀！在韓國梨花女子大學打造了一座時尚滑板場，展示其 2022 年秋季系列。藉由學院歷史提倡女性權力以促進性別平等，在一眾女子滑板手踩着滑板出場展開序幕，傳遞品牌願景。', '005.jpeg', '2022-06-03 08:40:07', '2022-06-03 08:40:07'),
(6, '領獎選手平均年齡14歲，「滑板」為什麼被奧運青睞？', '日本滑板選手西矢椛以奧運史上第二年輕金牌得主之姿，摘下東京奧運滑板冠軍。第一本滑板雜誌創辦人曾說滑板是一項「沒有歷史的運動」，6月21日滑板迷們慶祝的「滑板日」也聲明，玩滑板是對「獨立」的叛逆慶祝。滑板究竟為什麼吸引年輕人？又為什麼被奧運會看中？', '006.jpeg', '2022-06-03 08:40:07', '2022-06-03 08:40:07'),
(7, '滑板獎落誰家？', 'Carson經常關注Supreme、A Bathing Ape等潮牌，緊貼潮流時尚，對近兩年高端時尚品牌如Louise Vuitton、Dior與街頭藝術家合作推出的聯乘作品更是不掩欣賞之情。街頭藝術對他來說，已經不是少數人追捧的文化現象，而是漸漸走進高級藝術的殿堂。在購藏這批滑板之前，他亦有收藏過去幾年Supreme推出的部分滑板，而當友人提及蘇富比即將上拍過去二十年所有Supreme滑板時，他知道這就是入手全套滑板千載難逢的良機。', '007.jpeg', '2022-06-03 08:40:07', '2022-06-03 08:40:07');

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `sid` int(50) NOT NULL,
  `member_sid` int(50) NOT NULL,
  `total` int(50) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`sid`, `member_sid`, `total`, `order_date`) VALUES
(202200015, 1438, 14630, '2022-06-06 22:26:57'),
(202200016, 1438, 15970, '2022-06-06 23:54:02'),
(202200017, 1439, 15970, '2022-06-07 01:32:57'),
(202200018, 1438, 30620, '2022-06-07 02:46:55'),
(202200019, 1453, 12792, '2022-06-07 19:24:44'),
(202200020, 1454, 7504, '2022-06-07 22:32:04'),
(202200021, 1454, 5600, '2022-06-07 22:33:21'),
(202200022, 1454, 0, '2022-06-07 22:33:38'),
(202200023, 1438, 22224, '2022-06-08 18:20:33'),
(202200024, 1438, 8990, '2022-06-09 20:00:41'),
(202200025, 1487, 5584, '2022-06-09 20:36:49'),
(202200026, 1438, 5300, '2022-06-10 02:16:40'),
(202200027, 1490, 5600, '2022-06-10 02:17:22'),
(202200084, 14, 5584, '2022-06-08 21:33:22'),
(202200086, 13, 21574, '2022-06-08 23:08:08'),
(202200087, 6, 23620, '2022-06-08 23:08:31'),
(202200088, 10, 14650, '2022-06-08 23:33:07'),
(202200089, 10, 15990, '2022-06-08 23:34:09'),
(202200090, 10, 13980, '2022-06-08 23:34:43');

-- --------------------------------------------------------

--
-- 資料表結構 `order_details`
--

CREATE TABLE `order_details` (
  `sid` int(11) NOT NULL,
  `order_sid` int(11) NOT NULL,
  `member_sid` int(11) NOT NULL,
  `produst_sid` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `order_details`
--

INSERT INTO `order_details` (`sid`, `order_sid`, `member_sid`, `produst_sid`, `price`, `quantity`) VALUES
(18, 202200015, 1438, 3, 7650, 1),
(19, 202200015, 1438, 2, 6980, 1),
(20, 202200016, 1438, 2, 6980, 1),
(21, 202200016, 1438, 4, 8990, 1),
(22, 202200017, 1439, 2, 6980, 1),
(23, 202200017, 1439, 4, 8990, 4),
(24, 202200018, 1438, 2, 6980, 2),
(25, 202200018, 1438, 4, 8990, 1),
(26, 202200018, 1438, 1, 7000, 3),
(27, 202200018, 1438, 3, 7650, 7),
(28, 202200019, 1453, 4, 7192, 1),
(29, 202200019, 1453, 1, 5600, 1),
(30, 202200020, 1454, 6, 7504, 1),
(31, 202200021, 1454, 1, 5600, 1),
(32, 202200023, 1438, 3, 7650, 1),
(33, 202200023, 1438, 2, 5584, 1),
(34, 202200023, 1438, 4, 8990, 1),
(35, 202200024, 1438, 4, 8990, 1),
(36, 202200025, 1487, 2, 5584, 1),
(37, 202200026, 1438, 10, 5300, 1),
(38, 202200027, 1490, 1, 5600, 1),
(76, 202200084, 14, 2, 5584, 3),
(77, 202200086, 13, 2, 5584, 3),
(78, 202200086, 13, 1, 7000, 1),
(79, 202200086, 13, 4, 8990, 4),
(80, 202200087, 6, 2, 6980, 3),
(81, 202200087, 6, 4, 8990, 1),
(82, 202200087, 6, 7, 7650, 1),
(83, 202200088, 10, 15, 5300, 3),
(84, 202200088, 10, 47, 1700, 3),
(85, 202200088, 10, 3, 7650, 4),
(86, 202200089, 10, 4, 8990, 1),
(87, 202200089, 10, 1, 7000, 1),
(88, 202200090, 10, 2, 6980, 1),
(89, 202200090, 10, 1, 7000, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `produst`
--

CREATE TABLE `produst` (
  `sid` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `price` varchar(50) NOT NULL,
  `create_at` varchar(50) NOT NULL,
  `update_at` varchar(50) NOT NULL,
  `category_id` varchar(50) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `produst`
--

INSERT INTO `produst` (`sid`, `img`, `brand`, `name`, `info`, `price`, `create_at`, `update_at`, `category_id`, `color`) VALUES
(1, '637894482023930000.jpg', 'POLAR', '那隻狗有三對內內0.0 整組滑板 8.0', '已完成組裝✅\r\n板身：POLAR 被正妹瞪好爽 整組滑板 8.0\r\n砂紙：MOB x INDEPENDENT 世界第一的砂紙\r\n輪架：INDEPENDENT 中空輕量化輪架\r\n輪子：OJ WHEELS 最高品質系列 101A 54MM\r\n培林：BRONSON G3 高轉速培林\r\nPS211F119998000', '7000', '2021-12-05', '2022-04-08', '3', 'blue'),
(2, '637894482025330000.jpg', 'POLAR', '他家蠻酷的 整組滑板 8.125', '已完成組裝✅\r\n板身：POLAR 他家蠻酷的 整組滑板 8.125\r\n砂紙：MOB x INDEPENDENT 世界第一的砂紙\r\n輪架：INDEPENDENT 中空輕量化輪架\r\n輪子：OJ WHEELS 最高品質系列 101A 54MM\r\n培林：BRONSON G3 高轉速培林\r\nPS211F121998125', '6980', '2021-08-25', '2022-04-08', '3', 'yellow'),
(3, '637894482031430000.jpg', 'POLAR', '真結合 整組滑板 7.875', '已完成組裝✅\r\n板身：（兒童/成人小尺寸）POLAR 真結合 整組滑板 7.875\r\n砂紙：MOB x INDEPENDENT 世界第一的砂紙\r\n輪架：INDEPENDENT 中空輕量化輪架\r\n輪子：OJ WHEELS 最高品質系列 101A 54MM\r\n培林：BRONSON G3 高轉速培林\r\nPS211F118997875', '7650', '2021-07-28', '2022-03-24', '3', 'blue'),
(4, '637894482033000000.jpg', 'POLAR', '鯊魚跳起來 整組滑板 8.25', '已完成組裝✅\r\n板身：POLAR 鯊魚跳起來 整組滑板 8.25\r\n砂紙：MOB x INDEPENDENT 世界第一的砂紙\r\n輪架：INDEPENDENT 質感黑色基本款輪架\r\n輪子：OJ WHEELS 最高品質系列 101A 54MM\r\n培林：BRONSON G3 高轉速培林\r\nPS211F113998250', '8990', '2021-3-15', '2022-5-31', '3', 'pink'),
(5, '637894482056430000.jpg', 'PALACE', '杜賓狗狗 整組滑板 8.0', '已完成組裝✅\r\n板身：PALACE 杜賓狗狗 整組滑板 8.0\r\n砂紙：MOB x INDEPENDENT 世界第一的砂紙\r\n輪架：INDEPENDENT 中空輕量化輪架\r\n輪子：OJ WHEELS 最高品質系列 101A 54MM\r\n培林：BRONSON G3 高轉速培林\r\nPL221F112998000', '6600', '2021-08-12', '2022-5-06', '3', 'white'),
(6, '637894482043800000.jpg', 'PALACE', '一堆圖欸 整組滑板 8.06', '已完成組裝✅\r\n板身：PALACE 一堆圖欸 整組滑板 8.06\r\n砂紙：MOB x INDEPENDENT 世界第一的砂紙\r\n輪架：INDEPENDENT 中空輕量化輪架\r\n輪子：OJ WHEELS 最高品質系列 101A 54MM\r\n培林：BRONSON G3 高轉速培林\r\nPL221F103998060', '9380', '2021-08-25', '2022-04-08', '3', 'yellow'),
(7, '637894482063130000.jpg', 'PALACE', '超派法鬥 整組滑板 7.75', '已完成組裝✅\r\n板身：PALACE 超派法鬥 整組滑板 7.75\r\n砂紙：MOB x INDEPENDENT 世界第一的砂紙\r\n輪架：INDEPENDENT 中空輕量化輪架\r\n輪子：OJ WHEELS 最高品質系列 101A 54MM\r\n培林：BRONSON G3 高轉速培林\r\nPL212F120997750', '7650', '2021-07-28', '2022-03-24', '3', 'blue'),
(8, '637894482088500000.jpg', 'FUCKING AWESOME', '巴黎的PASS時光 整組滑板 8.18（原木色隨幾不挑色）', '已完成組裝✅\r\n板身：FUCKING AWESOME 巴黎的PASS時光 整組滑板 8.18（原木色隨幾不挑色）\r\n砂紙：MOB x INDEPENDENT 世界第一的砂紙\r\n輪架：INDEPENDENT 中空輕量化輪架\r\n輪子：OJ WHEELS 最高品質系列 101A 54MM\r\n培林：BRONSON G3 高轉速培林\r\nFA221F104998180', '7880', '2021-3-15', '2022-5-31', '3', 'blue'),
(9, '637883215517930000.jpg', 'SANTA CRUZ', 'DECODER HAND 9.51IN x 32.26IN CRUZER SHAPED CRUZER', '11116545-129806', '5600', '2021-08-25', '2022-04-20', '4', 'black'),
(10, '637873706641370000.jpg', 'SANTA CRUZ', 'FLIER COLLAGE DOT 8.8IN x 27.7IN CRUZER SHARK', '11116544-129805', '5300', '2021-07-28', '2022-04-20', '4', 'green'),
(11, '637883215377670000.jpg', 'SANTA CRUZ', 'PRISMATIC DOT 8.8IN x 27.7IN CRUZER SHARK', '11116543-129804', '6600', '2021-03-15', '2022-04-21', '4', 'blue'),
(12, '637883215206270000.jpg', 'SANTA CRUZ', 'RASTA TIE DYE 8.79IN x 29.05IN CRUZER STREET CRUZER', '11116542-129803', '5580', '2021-08-12', '2022-5-31', '4', 'green'),
(13, '637883214704170000.jpg', 'SANTA CRUZ', 'RAINBOW TIE DYE 8.79IN x 29.05IN CRUZER STREET CRUZER', '11116540-129801', '6700', '2019-08-27', '2022-02-23', '4', 'blue'),
(14, '637886525279000000.jpg', 'SANTA CRUZ', 'CLASIC WAVE SPLICE 8.8IN x 27.7IN CRUZER SHARK', '11116441-124572', '4930', '2020-05-20', '2022-01-06', '4', 'red'),
(15, '637883214259270000.jpg', 'SANTA CRUZ', 'AMOEBA STREET SKATE 8.4IN x 29.4IN', '11116435-124566', '5300', '2019-01-24', '2022-03-05', '4', 'black'),
(16, '637894497999700000.jpg', 'HOCKEY', 'HP SYNTHETIC', 'HK221F113998250', '2800', '2021-12-05', '2022-04-20', '6', 'black'),
(17, '637894498003270000.jpg', 'HOCKEY', 'UNCLE BOB', 'HK221F111998', '2650', '2021-07-28', '2022-03-24', '6', 'black'),
(18, '637884746574500000.jpg', 'INDEPENDENT', '144 HOLLOW REYNOLDS BLOCK SILVER MID TRUCKS', '33132473-124418', '2400', '2021-03-15', '2022-04-20', '7', ''),
(19, '637886518587700000.jpg', 'INDEPENDENT', 'STAGE 11 BTG SPEED BLUE SILVER STANDARD TRUCKS', '33132510-132442', '2200', '2021-07-28', '2022-04-21', '7', ''),
(20, '637885826662400000.jpg', 'BRONSON', 'SAMARRIA BREVARD PRO BEARING G3', '33531356-1321510\r\n盒：33531356-132151', '1350', '2021-08-25', '2022-04-20', '8', ''),
(21, '637889068679000000.jpg', 'INDEPENDENT', '培林', '操你媽', '1200', '2021-08-25', '2022-06-02 16:10:03', '8', ''),
(22, '637884050205800000.jpg', 'OJ WHEELS', 'TEAM LINE ORIGINAL WHITE BLACK/ORANNGR HARDLINE 99A 55MM', '22222972-132923', '1500', '2021-08-25', '2022-04-08', '9', ''),
(23, '637884051043030000.jpg', 'OJ WHEELS', 'WOOTEN SCREAMING CAST ELITE WHITE BLUE HARDLINE 101A 55MM', '22223007-132941', '1500', '2021-07-28', '2022-04-21', '9', ''),
(24, '637890068368500000.jpg', 'BULLET', 'MATTE BLACK DELUXE HELMET 防護頭盔', '成人：58cm – 61cm', '1080', '2019-07-14', '2022-05-23', '10', ''),
(25, '637890059759030000.jpg', 'BULLET', 'BLACK SETS ADULT 護具組', '8898201-14117 護腕 護肘 護膝', '1600', '2021-12-05', '2022-06-02 11:32:15', '10', ''),
(47, 'd3776160c3c09f0bc7df9ee084a2d7e2.jpg', 'BULLET', 'BLACK ORIGINAL WHITE', '77687972-132923', '1700', '2022-06-02 15:58:07', '2022-06-02 20:30:22', '', '');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `produst`
--
ALTER TABLE `produst`
  ADD PRIMARY KEY (`sid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `admin`
--
ALTER TABLE `admin`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `cart`
--
ALTER TABLE `cart`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `category`
--
ALTER TABLE `category`
  MODIFY `sid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `favorite`
--
ALTER TABLE `favorite`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `lesson`
--
ALTER TABLE `lesson`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1491;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `news`
--
ALTER TABLE `news`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `sid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202200092;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order_details`
--
ALTER TABLE `order_details`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `produst`
--
ALTER TABLE `produst`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
