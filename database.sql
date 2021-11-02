CREATE TABLE IF NOT EXISTS `complaints` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `detail` text,
  `submited_at` timestamp NULL DEFAULT NULL,
  `closed_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `complaint_id` int unsigned NOT NULL,
  `user_id` int unsigned NOT NULL,
  `action` varchar(255) NOT NULL,
  `status_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `status` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `status` (`id`, `name`) VALUES
	(1, 'Baru'),
	(2, 'Dalam Tindakan'),
	(3, 'Selesai');

CREATE TABLE IF NOT EXISTS `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `email`, `name`, `password`, `is_admin`, `created_at`, `updated_at`) VALUES
	(1, 'admin@gmail.com', 'Administrator', '$2y$10$WT/NWmEDxogVjhSkMihPI.PmLoseBtBpzOYNKwr5fNLY3pogKHY0u', 1, '2021-11-01 08:04:33', NULL),
	(2, 'user@gmail.com', 'User', '$2y$10$WT/NWmEDxogVjhSkMihPI.PmLoseBtBpzOYNKwr5fNLY3pogKHY0u', 0, '2021-11-01 08:04:33', NULL);
