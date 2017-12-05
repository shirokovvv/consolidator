CREATE TABLE IF NOT EXISTS `xdb_partners` (
`id` integer not null auto_increment primary key,
`typof` integer not null comment '1-Юрид лицо/2-физ лицо',
`name` char(50) not null comment 'Краткое наименование/ФИО',
`fullname` char(200) not null comment 'Полное наименование/Фамилия имя отчество',
`director` char(60) comment 'Руководитель',
`jaddress` char(200) comment 'Юридический адрес/Адрес прописки',
`paddress` char(200) comment 'Почтовый адрес/Фактический адрес',
`phone` char(50) comment 'Телефон/телефон',
`wmail` char(30) comment 'Рабочий e-mail/e-mail',
`inn` char(20) comment 'ИНН/ИНН',
`kpp` char(10) comment 'КПП/Паспорт',
`ogrn` char(20) comment 'ОГРН/Пенсионный',
`okved` char(50) comment 'ОКВЭД',
`okpo` char(20) comment 'ОКПО',
`okato` char(20) comment 'ОКАТО',
`rs` char(20) comment 'Расчетный счет/Расчетный счет',
`bank` char(100) comment 'Банк/Банк',
`ks` char(20) comment 'Корреспондентский счет/Корреспондентский счет',
`bik` char(20) comment 'БИК/БИК'
)
ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;
