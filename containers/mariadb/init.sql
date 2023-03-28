USE app;
SET time_zone = "+04:00"; #Tbilisi

CREATE TABLE `visitors`
(
    `id`          INT(11)          NOT NULL AUTO_INCREMENT,
    `ip_address`  varchar(255),
    `user_agent`  varchar(255),
    `view_date`   DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `page_url`    varchar(255) NOT NULL,
    `views_count` INT(255)     NOT NULL,
    PRIMARY KEY (`id`)
);