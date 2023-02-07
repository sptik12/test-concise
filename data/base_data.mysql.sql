--
-- Initial data for table `product`
--
INSERT INTO `product` (`image`, `is_deleted`) VALUES ('apple.png', 0);
INSERT INTO `product` (`image`, `is_deleted`) VALUES ('orange.png', 0);
INSERT INTO `product` (`image`, `is_deleted`) VALUES ('pear.png', 0);
INSERT INTO `product` (`image`, `is_deleted`) VALUES ('avocado.png', 1);
INSERT INTO `product` (`image`, `is_deleted`) VALUES ('lemon.png', 1);

--
-- Initial data for table `store_product`
--
INSERT INTO `store_product` (`product_id`, `product_image`) VALUES (1, 'apple_store.png');
INSERT INTO `store_product` (`product_id`, `product_image`) VALUES (3, 'pear_store.png');
INSERT INTO `store_product` (`product_id`, `product_image`) VALUES (5, 'lemon.png');

