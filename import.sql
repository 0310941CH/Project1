CREATE DATABASE `notch`;

USE `notch`;
/* Table Users */

CREATE TABLE `users` (
    id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    voornaam varchar(100) NOT NULL,
    achternaam varchar(100) NOT NULL,
    username char(100) NOT NULL,
    passwords varchar(255) NOT NULL,
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
    price FLOAT(10, 2) NOT NULL,
    pictures VARCHAR(255) NOT NULL,
    maincategorie VARCHAR(255) NOT NULL,
    subcategorie VARCHAR(255) NOT NULL
);

INSERT INTO `products` (`productname`, `price`, `pictures`, `summary`, `maincategorie`, `subcategorie`) VALUES
("Captiva High End Gaming PC", 8330.77 , "pc1.jpg", "pcLaptop", "pc"),
("Game PC Redux Gamer Entry i210 R65XT", 954.74 , "pc2.jpg", "pcLaptop", "pc"),
("Game PC Redux Gamer i230 R37", 1836.20 , "pc3.jpg", "pcLaptop", "pc"),

("HP SGIN Laptop", 377.27 , "laptop1.jpg", "pcLaptop", "laptop"),
("Lenovo Laptop IdeaPad 5 Pro", 749.00 , "laptop2.jpg", "pcLaptop", "laptop"),
("MSI GS66 Stealth", 2323.60 , "laptop3.jpg", "pcLaptop", "laptop"),

("AMD Ryzen 5 5600X", 199.00 , "cpu1.jpg", "components", "cpu"),
("Intel Core i5-9400F", 165.50 , "cpu2.jpg", "components", "cpu"),
("Intel CPU BX8070110100F Core i3", 85.98 , "cpu3.jpg", "components", "cpu"),

("MSI Radeon RX 6500 XT MECH 2X 4G OC", 217.00 , "gpu1.jpg", "components", "gpu"),
("PNY NVIDIA Quadro P5000 Graphics Card", 1999.99 , "gpu2.jpg", "components", "gpu"),
("Gigabyte GeForce RTX 3070 GAMING OC 8G", 1059.00 , "gpu3.jpg", "gpu"),

("GIGABYTE Z590 AORUS Master", 299.99 , "moederbord1.jpg", "components", "moederbord"),
("MSI MPG B550 Gaming Plus", 117.00 , "moederbord2.jpg", "components", "moederbord"),
("Andifany X79 Moederbord", 148.98 , "moederbord3.jpg", "components", "moederbord"),

("OFFTEK 8GB Vervanging RAM", 41.87 , "ram1.jpg", "components", "ram"),
("Corsair Vengeance LPX 16GB", 74.90 , "ram2.jpg", "components", "ram"),
("Corsair Vengeance RGB Pro 32GB", 134.99 , "ram3.jpg", "components", "ram"),

("Samsung 980 M.2 NVME 500GB SSD", 60.30 , "ssd1.jpg", "components", "ssd"),
("Seagate Firecuda 510 500GB SSD", 89.98 , "ssd2.jpg", "components", "ssd"),
("Samsung 970 EVO Interne SSD: 1TB", 157.47 , "ssd3.jpg", "components", "ssd"),

("Gembird FANPS hardwarekoeling Computer behuizing Ventilator", 4.95 , "vent1.jpg", "components", "vent"),
("Noctua NF-A8 PWM, 80mm", 15.95 , "vent2.jpg", "components", "vent"),
("Titan TFD-8025M12B hardwarekoeling Computer behuizing Ventilator", 29.95 , "vent3.jpg", "components", "vent"),

("Gigabyte Modulaire - 850W", 124.55 , "voeding1.jpg", "components", "voeding"),
("Aerocool LUX850 - 850W", 75.90 , "voeding2.jpg", "components", "voeding"),
("MSI MPG A850GF - 850W", 133.15 , "voeding3.jpg", "components", "voeding"),

("Sennheiser Consumer Audio Headset", 46.68 , "headset1.jpg", "peripherals", "headset"),
("EPOS Audio H6PRO Closed Acoustic Gaming Headset", 170.31 , "headset2.jpg", "peripherals", "headset"),
("HyperX Cloud II - Gaming Headset", 99.99 , "headset3.jpg", "peripherals", "headset"),

("HP Pavilion Gaming Keyboard 500 EURO QWERTY", 59.99 , "keyboard1.jpg", "peripherals", "keyboard"),
("OMEN Encoder Customizable Mechanical Gaming Keyboard", 49.00 , "keyboard2.jpg", "peripherals", "keyboard"),
("Mars Gaming MKREVOES", 27.50 , "keyboard3.jpg", "peripherals", "keyboard"),

("Corsair Harpoon Rgb Pro", 29.90 , "muis1.jpg", "peripherals", "mouse"),
("Razer DeathAdder V2 Gaming Mouse", 39.99 , "muis2.jpg", "peripherals", "mouse"),
("Razer Basilisk X Hyperspeed", 37.21 , "muis3.jpg", "peripheralskeyboardMouse", "mouse");


/* Beschrijvingen moeten nog gedaan worden. */