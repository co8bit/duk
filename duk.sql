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
	content text not NULL,/*个人简介*/
	logoPic varchar(150) not null,/*头像*/
	concernProblem text not NULL,/*关注的问题*/
	concernUser text not NULL,/*关注的用户*/

	tag text not null,

	primary key(uid)
) CHARACTER SET utf8 COLLATE utf8_general_ci;
INSERT INTO `duk`.`user` (`uid`, `name`, `pwd`, `realName`, `content`, `logoPic`, `concernProblem`, `concernUser`, `tag`) VALUES (NULL, 'wbx', 'wbx', '王博鑫', '我很懒，没有签名', '', '', '', '');
