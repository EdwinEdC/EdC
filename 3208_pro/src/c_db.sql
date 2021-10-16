SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;

START TRANSACTION;

CREATE TABLE 'users'{
	'id' int(20) NOT NULL,
	'user_name' varchar(255) NOT NULL,
	'password' varchar(255) NOT NULL,
	'name' varchar(255) NOT NULL
} ENGINE = InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE 'users'
	ADD PRIMARY KEY('id');

ALTER TABLE 'users'
	MODIFY 'id' int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;