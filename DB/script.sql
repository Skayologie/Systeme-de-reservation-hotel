DROP DATABASE IF EXISTS Hotel_db;
CREATE DATABASE Hotel_db;

USE Hotel_db;
CREATE TABLE tarif (
    tarif_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    period INT(11),
    price int(11)
);

CREATE TABLE room (
    room_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    number INT(11),
    type ENUM('king','double','suite','single'),
    availability tinyint(1),
    tarif_id int ,
	FOREIGN KEY (tarif_id) REFERENCES tarif(tarif_id)
);

