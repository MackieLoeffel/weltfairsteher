ALTER TABLE `suggested` ADD `suggested_category` ENUM('food','energy','culture','climate-change','production','selfmade','water') NOT NULL DEFAULT 'selfmade';
  -- must allow NULL, because can't use default value with TEXT in MySQL
ALTER TABLE `suggested` ADD `goals` TEXT;
ALTER TABLE `suggested` ADD `duration` TEXT;
ALTER TABLE `suggested` ADD `aid` TEXT;
ALTER TABLE `suggested` ADD `allow_continuous_use` BOOLEAN NOT NULL DEFAULT false;

CREATE TABLE `website`.`suggested_dimension` (
       `id` INT NOT NULL AUTO_INCREMENT,
       `suggested_id` INT NOT NULL,
       `dimension` VARCHAR(255) NOT NULL DEFAULT ''
       , PRIMARY KEY (`id`)) DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
