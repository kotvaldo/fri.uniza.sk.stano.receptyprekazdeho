DROP TABLE IF EXISTS `profiles`;
CREATE TABLE `profiles`
(
    `id`       int(11)      NOT NULL AUTO_INCREMENT,
    `login`    varchar(255) NOT NULL,
    `email`    varchar(255) NOT NULL,
    `password` varchar(255) not null,
    `picture`  varchar(255) null,
    constraint profiles_pk1
        primary key (id),
    constraint profiles_pk2
        unique (email),
    constraint profiles_pk3
        unique (login)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

