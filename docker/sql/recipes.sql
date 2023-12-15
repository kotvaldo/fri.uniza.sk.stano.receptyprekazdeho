DROP TABLE IF EXISTS `recipes`;
CREATE TABLE `recipes`
(
    `id`       int(11)      NOT NULL AUTO_INCREMENT,
    `title`    varchar(255) NOT NULL,
    `text`     text         NOT NULL,
    `date_created` DATETIME NULL,
    `user_login`  varchar(255) NOT NULL,
    `category_name`  varchar(255) NOT NULL,
    `picture`  varchar(255) NULL,


    constraint profiles_pk1
        primary key (id)

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

