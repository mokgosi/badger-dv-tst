DROP TABLE IF EXISTS `users`;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`first_name`, `last_name`, `email`, `username`, `password`) VALUES
    ('Robin', 'Jackman', 'robin@where.com', 'robin', 'jackman'),
    ('Taylor', 'Edward', 'taylor@where.com', 'taylor', 'edward'),
    ('Vivian', 'Dickens', 'vivian@where.com', 'vivian', 'dickens'),
    ('Harry', 'Clifford', 'harry@where.com', 'harry', 'clifford');
