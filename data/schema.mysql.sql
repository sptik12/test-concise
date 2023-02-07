--
-- Table structure for table `product`
--
--

CREATE TABLE `product`
(
    `id`         int(11) NOT NULL AUTO_INCREMENT,
    `image`      varchar(128) NOT NULL,
    `is_deleted` smallint default 0,
    PRIMARY KEY (`id`),
    KEY `ind_is_deleted` (`is_deleted`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `store_product`
--
--

CREATE TABLE `store_product`
(
    `id`         int(11) NOT NULL AUTO_INCREMENT,
    `product_id` int(11) NOT NULL,
    `product_image` varchar(128)  NOT NULL,
    PRIMARY KEY (`id`),
    KEY `ind_product_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
