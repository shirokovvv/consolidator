CREATE TABLE IF NOT EXISTS `xdb_users` (
`id` integer not null auto_increment primary key,
`username` char(50) not null comment 'Логин пользователя',
`surname` char(50) not null comment 'Имя',
`auth_key` char(30) not null comment 'Идентификационный ключ',
`activation_key` char(255) comment 'Ключ активации',
`confirm` tinyint not null default 0 comment 'Одобрен',
`email` char(50) not null comment 'EMail',
`status` smallint not null comment 'Статус',
`password` char(100) not null comment 'Пароль',
`password_reset_token` char(100) comment 'Сброс пароля',
`firmid` integer not null comment 'Представитель',
`createdt` date comment 'Дата создания',
`deleted` integer not null comment '-Удалено'
)
ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE `xdb_users` ADD UNIQUE INDEX (username);
ALTER TABLE `xdb_users` ADD UNIQUE INDEX (email);

INSERT INTO `xdb_users` (username,password,surname,email,auth_key,confirm,status,firmid,deleted) VALUES ("super","356a192b7913b04c54574d18c28d46e6395428ab","Владимир","jaffar-vrn@mail.ru","","1","1","0","0");

CREATE TABLE IF NOT EXISTS `xdb_user_status` (
`id` integer not null auto_increment primary key,
`name` char(50) not null comment 'Наименование статуса'
)
ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO `xdb_user_status` (name) VALUES ("Суперадминистратор");
INSERT INTO `xdb_user_status` (name) VALUES ("Администратор");
INSERT INTO `xdb_user_status` (name) VALUES ("Оператор");
INSERT INTO `xdb_user_status` (name) VALUES ("Гость");
INSERT INTO `xdb_user_status` (name) VALUES ("Перевозчик");
INSERT INTO `xdb_user_status` (name) VALUES ("Клиент");
INSERT INTO `xdb_user_status` (name) VALUES ("Экспедитор");

CREATE TABLE IF NOT EXISTS `xdb_user_confirm` (
`id` integer not null auto_increment primary key,
`name` char(50) not null comment 'Наименование статуса'
)
ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO `xdb_user_confirm` (name) VALUES ("Подтверждён");
INSERT INTO `xdb_user_confirm` (name) VALUES ("Одобрен");

