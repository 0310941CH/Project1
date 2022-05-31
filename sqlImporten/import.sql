CREATE DATABASE `notch`;

USE `notch`;
/* Table Users */

CREATE TABLE `users` (
    id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    voornaam varchar(100) NOT NULL UNIQUE,
    achternaam varchar(100) NOT NULL UNIQUE,
    username char(100) NOT NULL UNIQUE,
    passwords varchar(255) NOT NULL UNIQUE,
    rank integer(10) NOT NULL
);

/* Table Products */
/* Main Categorie:                   Sub Categorie:
      pcLaptop                            pc
      components                          laptop
      peripherals                         cpu
                                          gpu
                                          moederbord
                                          ram
                                          ssd
                                          vent
                                          voeding
                                          headset
                                          keyboard
                                          mouse
*/

CREATE TABLE `products` (
    id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    productname VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    pictures VARCHAR(255) NOT NULL,
    maincategorie VARCHAR(255) NOT NULL,
    subcategorie VARCHAR(255) NOT NULL,
    specificaties BLOB(65535) DEFAULT NULL
);

