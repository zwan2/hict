CREATE DATABASE hict;
USE hict;

CREATE TABLE member (
	student_number int(9),
	password char(20),
	name char(20),
	email char(30),
	tel char(15),

	admin_code tinyint(1),
	member_code smallint UNSIGNED NOT NULL AUTO_INCREMENT,

	PRIMARY KEY (member_code)
);

CREATE TABLE fail_check (
	fail_ip char(20),
	fail_time int UNSIGNED,
	fail_count tinyint(2),
	PRIMARY KEY (fail_ip)
);

CREATE TABLE booking (
	booking_id int UNSIGNED NOT NULL AUTO_INCREMENT,
	name char(20),
	start_time datetime,
	end_time datetime,
	total_number tinyint,
	purpose tinyint,
	tool char(30),
	extra text,
	PRIMARY KEY (booking_id)
);

INSERT INTO member (student_number, password, name, email, tel, admin_code, member_code) VALUES ('111111111', '11','11','11', '11','11','1');