CREATE DATABASE hict;
USE hict;

CREATE TABLE member (
	student_number tinyint(9),
	password char(20),
	name char(20),
	major char(20),
	email char(30),
	tel tinyint(15),

	admin_code BIT,
	member_code smallint,

	PRIMARY KEY (member_code)
);

INSERT INTO member (student_number, password, name, major, email, tel, admin_code, member_code) VALUES ('111111111', '11','11','11','11','11','11','1');