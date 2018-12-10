CREATE TABLE `api_user` (
  `id` int(11) UNSIGNED NOT NULL,
  `mobile` bigint(15) NOT NULL,
  `appid` varchar(200) NOT NULL COMMENT 'appid',
  `appsercet` varchar(100) NOT NULL COMMENT 'app密码',
  `timestamp` bigint(20) NOT NULL COMMENT '时间戳',
  `create_at` bigint(20) NOT NULL,
  `update_at` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `api_user`
--

INSERT INTO `api_user` (`id`, `mobile`, `appid`, `appsercet`, `timestamp`, `create_at`, `update_at`) VALUES
(9, 13466617768, 'jun', 'e10adc3949ba59abbe56e057f20f883e', 1544087223, 1544087223, 1544087223),
(10, 13466617761, 'jun', 'e10adc3949ba59abbe56e057f20f883e', 1544087543, 1544087543, 1544087543),
(11, 13466617762, 'jun', 'e10adc3949ba59abbe56e057f20f883e', 1544092010, 1544092010, 1544092010);

ALTER TABLE `api_user`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `api_user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

--
-- 表的结构 `news`
--

CREATE TABLE `news` (
  `id` bigint(20) NOT NULL,
  `cid` tinyint(3) NOT NULL COMMENT '分类id',
  `img_url` varchar(150) NOT NULL COMMENT '图片地址',
  `news_neme` varchar(100) NOT NULL COMMENT '新闻名称',
  `content` text NOT NULL COMMENT '内容',
  `create_at` bigint(20) NOT NULL COMMENT '创建时间',
  `update_at` bigint(20) NOT NULL COMMENT '修改时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`id`, `cid`, `img_url`, `news_neme`, `content`, `create_at`, `update_at`) VALUES
(21, 1, '1', '张三', '张三的歌曲', 1544095616, 1544095616),
(22, 1, '1', '历史', '历史的歌曲', 1544095616, 1544095616),
(24, 1, '1', '张三', '99', 1544095616, 1544428263),
(25, 1, '1', '张三', '张三的歌曲', 1544406931, 1544406931),
(26, 1, '1', '历史', '历史的歌曲', 1544406931, 1544406931),
(27, 1, '1', '是的范德萨', '范德萨范德萨', 1544406931, 1544406931),
(28, 1, '1', '范德萨范德萨', '方法方法发广告呵呵呵', 1544406931, 1544406931),
(29, 1, '1', '张三', '张三的歌曲', 1544431023, 1544431023),
(30, 1, '1', '历史', '历史的歌曲', 1544431023, 1544431023),
(31, 1, '1', '是的范德萨', '范德萨范德萨', 1544431023, 1544431023),
(32, 1, '1', '范德萨范德萨', '方法方法发广告呵呵呵', 1544431023, 1544431023);

ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `news`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

