-- phpMyAdmin SQL Dump
-- version 4.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-11-11 01:44:17
-- 服务器版本： 10.1.7-MariaDB
-- PHP Version: 5.6.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shorturl`
--

-- --------------------------------------------------------

--
-- 表的结构 `url_list`
--

CREATE TABLE IF NOT EXISTS `url_list` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `posttime` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `url_list`
--

INSERT INTO `url_list` (`id`, `url`, `alias`, `status`, `posttime`) VALUES
(1, 'https://www.loacg.com/System/', '4OWU1O', 1, 1445682878),
(2, 'https://www.loacg.com/online-music/', '0NTcwM', 1, 1445685420),
(70, 'http://konachan.com/image/fb8f6e2c8742cff4987d2994f69e52b9/Konachan.com - 208724 animal_ears autumn blush breasts fang inubashiri_momiji kumashou_(nabeyama_kaidou) leaves nude onsen short_hair touhou towel wet.jpg', '2ODk4Z', 1, 1446197425),
(71, 'http://baike.baidu.com/link?url=B8iGCLSkCH0Vm4InA50ZuF3-Ew1UgE5DCRzmxccmWWWuAtQeG8joqpr_MqFaexjR6ASkP66-pvMHUG3vJUIMMi4RrrPBy_3w2iqK6DK6QFm1BWS88KpSgVh68MB3N5Zp', 'xYTJkN', 1, 1446556459),
(75, 'https://www.loacg.com', 'jNDE5Z', 1, 1446628987),
(80, 'https://s.taobao.com/search?ie=utf8&amp;initiative_id=staobaoz_20151104&amp;stats_click=search_radio_all%3A1&amp;js=1&amp;imgfile=&amp;q=jumper500&amp;suggest=0_5&amp;_input_charset=utf-8&amp;wq=jumper&amp;suggest_query=jumper&amp;source=suggest', 'jNWNjM', 1, 1446644376),
(82, 'https://www.baidu.com/s?wd=%E5%B0%8F%E7%B1%B33%E5%88%B7%E5%85%A5%E7%AC%AC%E4%B8%89%E6%96%B9recovery&amp;rsv_spt=1&amp;rsv_iqid=0xff429c630000142a&amp;issp=1&amp;f=3&amp;rsv_bp=0&amp;rsv_idx=2&amp;ie=utf-8&amp;tn=baiduhome_pg&amp;rsv_enter=1&amp;rsv_sug3=2', 'iNTA4Y', 1, 1446708775),
(85, 'http://www.baidu.com', 'kZDNkM', 1, 1447064662),
(86, 'www.baidu.com', 'hZmJkZ', 1, 1447064674),
(89, 'http://potplayer.daum.net/?lang=zh_CN', 'mMzc3N', 1, 1447073532);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `url_list`
--
ALTER TABLE `url_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_url` (`url`) USING BTREE,
  ADD KEY `url` (`id`,`url`,`alias`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `url_list`
--
ALTER TABLE `url_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=90;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
