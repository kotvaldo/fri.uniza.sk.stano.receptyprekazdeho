DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`
(
    `id`       int(11)      NOT NULL AUTO_INCREMENT,
    `nazov`    varchar(255) NOT NULL,
    constraint profiles_pk1
        primary key (id)

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

INSERT INTO `categories` (`id`, `nazov`)
VALUES (1, 'Bezlepkové jedlá'),
       (2, 'Dezerty'),
       (3, 'Hlavné jedlá'),
       (4, 'Polievky'),
       (5, 'Predjedlá'),
       (6, 'Vegetariánske jedlá');