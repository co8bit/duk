CREATE USER 'dukName'@'localhost' IDENTIFIED BY 'dukPassword';
GRANT USAGE ON *.* TO 'dukName'@'localhost' IDENTIFIED BY 'dukPassword' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
CREATE DATABASE IF NOT EXISTS `duk`;
GRANT ALL PRIVILEGES ON `duk`.* TO 'dukName'@'localhost';

/*使用数据库*/
use duk;

/*创建表*/
create table user(
	uid bigint NOT NULL AUTO_INCREMENT,
	name varchar(100) NOT NULL,/*TODO：唯一*/
	pwd varchar(100) NOT NULL,

	/*个人身份信息*/
	realName varchar(100) not null,
	phone varchar(13) not null,
	mail text not null,
	content text not NULL,/*个人简介*/
	logoPic varchar(150) not null,/*头像*/
	

	tag text not null,
	zanTable text not null,
	state int not null,/*0是正常*/

	rongyun_token text not null,/*融云的Token*/

	primary key(uid)
) CHARACTER SET utf8 COLLATE utf8_general_ci;
INSERT INTO `duk`.`user` (`uid`, `name`, `pwd`, `realName`, `content`, `logoPic`, `tag`) VALUES (NULL, 'wbx', 'wbx', '王博鑫', '我很懒，没有签名', '',  '');



create table question(
	qid bigint NOT NULL AUTO_INCREMENT,
	uid bigint NOT NULL,
	title TEXT NOT NULL,
	tag TEXT NOT NULL,
	pic text not null,
	
	createTime datetime NOT NULL,
	content text not null,

	state int not null,/*0:未完成;1:完成*/
	comment TEXT not null,/*评论*/

	zan int not null,

	primary key(qid)
) CHARACTER SET utf8 COLLATE utf8_general_ci;
INSERT INTO `duk`.`question` (`qid`, `uid`, `title`, `tag`, `createTime`, `content`, `state`, `comment`, `zan`,`pic`) VALUES (NULL, '1', '这是标题', '这是标签', '2015-08-07 04:00:00', '这是内容', '0', '', '','');



create table qreply(
	qrid bigint NOT NULL AUTO_INCREMENT,
	uid bigint NOT NULL,
	qid bigint not null,/*回复哪个帖子*/
	
	createTime datetime NOT NULL,
	content text not null,

	zan int not null,

	primary key(qrid)
) CHARACTER SET utf8 COLLATE utf8_general_ci;

/*收藏的帖子*/
create table collectq(
	cqid bigint NOT NULL AUTO_INCREMENT,
	uid bigint NOT NULL,/*谁收藏的*/
	qid bigint not null,/*收藏哪个帖子*/
	
	createTime datetime NOT NULL,
	
	primary key(cqid)
) CHARACTER SET utf8 COLLATE utf8_general_ci;


create table follow(
	id bigint NOT NULL AUTO_INCREMENT,
	from_uid bigint DEFAULT NULL,/*from_uid的人关注to_uid的人*/
	to_uid bigint DEFAULT NULL,

	createTime datetime NOT NULL,
	state tinyint(1) DEFAULT '0',

	primary key(id)
) CHARACTER SET utf8 COLLATE utf8_general_ci;