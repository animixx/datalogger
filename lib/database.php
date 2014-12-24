<?php

/*

-- Setting up the database (mysql expected)
CREATE DATABASE gpsdb;
USE gpsdb;

-- Setting up tables
CREATE TABLE gpsdata(
id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
type VARCHAR(5),
utctime VARCHAR(10),
date VARCHAR(6),
status CHAR,
latitude VARCHAR(9),
ns CHAR,
longitude VARCHAR(10),
ew CHAR,
speed     VARCHAR(10),
fix CHAR,
satellites VARCHAR(2),
altitude VARCHAR(10));

CREATE TABLE pmdata(
id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
value VARCHAR(255) NOT NULL,
utctime VARCHAR(10),
date VARCHAR(6));

*/
try {
    // Raspberry Pi
    // $db = new PDO('mysql:host=localhost;dbname=gpsdb;charset=utf8','root','claveEye3##');
    $db = new PDO('mysql:host=localhost;dbname=gpsdb;charset=utf8','root','nomires');


    $db->query('
CREATE TABLE gpsdata(
id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
type VARCHAR(5),
utctime VARCHAR(10),
date VARCHAR(6),
status CHAR,
latitude VARCHAR(9),
ns CHAR,
longitude VARCHAR(10),
ew CHAR,
speed     VARCHAR(10),
fix CHAR,
satellites VARCHAR(2),
altitude VARCHAR(10));

CREATE TABLE pmdata(
id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
value VARCHAR(255) NOT NULL,
utctime VARCHAR(10),
date VARCHAR(6));
');

} catch (PDOException $ex) {
    echo "Oh NOES! ". ($ex->getMessage());
}

?>

