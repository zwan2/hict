CREATE DATABASE hict;
USE hict;

CREATE TABLE member (
	student_number int(9),
	password char(20),
	name char(20),
	email char(30),
	tel char(15),

	admin_code tinyint(1),

	PRIMARY KEY (student_number)
);

CREATE TABLE fail_check (
	fail_ip char(20),
	fail_time int UNSIGNED,
	fail_count tinyint(2),
	PRIMARY KEY (fail_ip)
);

CREATE TABLE booking (
	booking_id int UNSIGNED NOT NULL AUTO_INCREMENT,
	booking_state tinyint(1),
	student_number int(9),
	name char(20),
	start_time datetime,
	end_time datetime,
	total_number tinyint,
	purpose char(50),
	tool char(50),
	extra text,
	PRIMARY KEY (booking_id)
);

INSERT INTO member (student_number, password, name, email, tel, admin_code) VALUES ('111111111', '11','11','11', '11','11');