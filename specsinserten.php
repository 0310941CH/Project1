<?php
$host = 'localhost';
$db   = 'notch';
$user = 'bit_academy';
$pass = 'bit_academy';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $options);

$specsPC = [
    "spec_type" => "pc",
    "operatingsystem" => "Unknown",
    "motherboard" => "B460M Motherboard",
    "ramtype" => "DDR4",
    "rammemory" => "16 GB",
    "cpu" => "Intel",
    "cpumodel" => "Core i9 10900KF",
    "gpu" => "NVIDIA RTX 3090 24GB",
    "ssd" => "1 TB SSD",
  ];

  $specsPC1 = [
    "spec_type" => "pc",
    "operatingsystem" => "Windows",
    "motherboard" => "Unknown",
    "ramtype" => "DIMM",
    "rammemory" => "8 GB",
    "cpu" => "Intel",
    "cpumodel" => "Core i5",
    "gpu" => "AMD Radeon RX 6500 XT",
    "ssd" => "500 GB SSD",
  ];

  $specsPC2 = [
    "spec_type" => "pc",
    "operatingsystem" => "Windows",
    "motherboard" => "Unknown",
    "ramtype" => "DIMM",
    "rammemory" => "16 GB",
    "cpu" => "Intel",
    "cpumodel" => "Core i5",
    "gpu" => "NVIDIA GeForce RTX 3070",
    "ssd" => "1 TB SSD",
  ];

  $specsLaptop = [
    "spec_type" => "pc",
    "screenSize" => "14.1 Inch",
    "resolution" => "1920 x 1080",
    "processor" => "Intel Celeron B830",
    "ram" => "12 GB DDR4",
    "hardDrive" => "512 GB SSD",
    "operatingsystem" => "Windows 11",
    "bluetooth" => "Ja"
  ];

  $specsLaptop1 = [
    "spec_type" => "pc",
    "screenSize" => "14.1 Inch",
    "resolution" => "2880 x 1800",
    "processor" => "AMD Ryzen 5",
    "ram" => "16 GB DDR4",
    "hardDrive" => "512 GB SSD",
    "operatingsystem" => "Windows 11",
    "bluetooth" => "Ja"
  ];

  $specsLaptop2 = [
    "spec_type" => "pc",
    "screenSize" => "15.6 Inch",
    "resolution" => "1920 x 1080",
    "processor" => "Intel Core i7",
    "ram" => "32 GB DDR4",
    "hardDrive" => "1 TB SSD",
    "operatingsystem" => "Windows 10",
    "bluetooth" => "Ja"
  ];

  $specsCpu = [
    "spec_type" => "cpu",
    "processor" => "AMD ryzen 5",
    "processorSpeed" => "4.6 GHz",
    "wattage" => "65 watt"
  ];

  $specsCpu1 = [
    "spec_type" => "cpu",
    "processor" => "Intel Core i5",
    "processorSpeed" => "2.9 GHz",
    "wattage" => "65 watt"
  ];
  $specsCpu2 = [
    "spec_type" => "cpu",
    "processor" => "Intel Core i3",
    "processorSpeed" => "3.6 GHz",
    "wattage" => "65 watt"
  ];

  $specsGpu = [
    "spec_type" => "gpu",
    "graphicsRam" => "4Gb",
    "clockspeed" => "2.7 GHz"
  ];

  $specsGpu1 = [
    "spec_type" => "gpu",
    "graphicsRam" => "16Gb",
    "clockspeed" => "2 GHz"
  ];

  $specsGpu2 = [
    "spec_type" => "gpu",
    "graphicsRam" => "8Gb",
    "clockspeed" => "1.7 GHz"
  ];

  $specsMotherboard = [
    "specs_type" => "moederbord",
    "ramtechnology" => "DDR4"
  ];
  $specsMotherboard1 = [
    "specs_type" => "moederbord",
    "ramtechnology" => "DDR4"
  ];
  $specsMotherboard2 = [
    "specs_type" => "moederbord",
    "ramtechnology" => "DDR3"
  ];
  $specsram = [
    "specs_type" => "ram",
    "memory" => "8 GB",
    "clockspeed" => "3.2 GHz"
  ];

  $specsram1 = [
    "specs_type" => "ram",
    "memory" => "16 GB",
    "clockspeed" => "2.6 GHz"
  ];
  $specsram2 = [
    "specs_type" => "ram",
    "memory" => "32 GB",
    "clockspeed" => "3.2 GHz"
  ];

  $specsSSD = [
    "specs_type" => "SSD",
    "storage" => "500 GB",
    "wattage" => "5.9 Watt"
  ];

  $specsSSD1 = [
    "specs_type" => "SSD",
    "storage" => "500 GB",
    "wattage" => "Unknown"
  ];
  $specsSSD2 = [
    "specs_type" => "SSD",
    "storage" => "1 TB",
    "wattage" => "Unknown"
  ];

  $specsFans = [
    "specs_type" => "vent",
    "totalFans" => "1",
    "fanSpeed" => "2500 RPM"
  ];
  $specsFans1 = [
    "specs_type" => "vent",
    "totalFans" => "1",
    "fanSpeed" => "1500 RPM"
  ];
  $specsFans2 = [
    "specs_type" => "vent",
    "totalFans" => "1",
    "fanSpeed" => "Unkown"
  ];

  $specsPowersupply = [
    "specs_type" => "voeding",
    "wattage" => "850 Watt",
    "fansize" => "120 millimeters"
  ];
  $specsPowersupply1 = [
    "specs_type" => "voeding",
    "wattage" => "850 Watt",
    "fansize" => "120 millimeters"
  ];
  $specsPowersupply2 = [
    "specs_type" => "voeding",
    "wattage" => "850 Watt",
    "fansize" => "Unknown"
  ];

  $specsHeadset = [
    "specs_type" => "headset",
    "Wired" => "Yes",
    "Bluetooth" => "No",
    "NoiceCanceling" => "No"
  ];
  $specsHeadset1 = [
    "specs_type" => "headset",
    "Wired" => "Yes",
    "Bluetooth" => "No",
    "NoiceCanceling" => "No"
  ];
  $specsHeadset2 = [
    "specs_type" => "headset",
    "Wired" => "Yes",
    "Bluetooth" => "No",
    "NoiceCanceling" => "Yes"
  ];

  $specskeyboard = [
    "specs_type" => "keyboard",
    "keyboardtype" => "Gaming",
    "inputType" => "USB", 
    "RGB" => "Yes"
  ];
  $specskeyboard1 = [
    "specs_type" => "keyboard",
    "keyboardtype" => "Gaming",
    "inputType" => "USB", 
    "RGB" => "No"
  ];
  $specskeyboard2 = [
    "specs_type" => "keyboard",
    "keyboardtype" => "Gaming",
    "inputType" => "USB", 
    "RGB" => "Yes"
  ];

  $specsMouse = [
    "specs_type" => "keyboard",
    "buttons" => "6 buttons",
    "Dpi" => "12000 DPI",
    "mousetype" => "Gaming",
    "Bluetooth" => "No"
  ];
  $specsMouse1 = [
    "specs_type" => "keyboard",
    "buttons" => "8 buttons",
    "Dpi" => "20000 DPI",
    "mousetype" => "Gaming",
    "Bluetooth" => "No"
  ];
  $specsMouse2 = [
    "specs_type" => "keyboard",
    "buttons" => "6 buttons",
    "Dpi" => "16000 DPI",
    "mousetype" => "Gaming",
    "Bluetooth" => "Yes"
  ];
  // DEZE DATA KUN JE INSERTEN DIT IS EEN JSON STRING
  $dbSpecPC = json_encode($specsPC);
  $dbSpecPC1 = json_encode($specsPC1);
  $dbSpecPC2 = json_encode($specsPC2);
  
  $dbSpecLaptop = json_encode($specsLaptop);
  $dbSpecLaptop1 = json_encode($specsLaptop1);
  $dbSpecLaptop2 = json_encode($specsLaptop2);

  $dbSpecCpu = json_encode($specsCpu);
  $dbSpecCpu1 = json_encode($specsCpu1);
  $dbSpecCpu2 = json_encode($specsCpu2);

  $dbSpecGpu = json_encode($specsGpu);
  $dbSpecGpu1 = json_encode($specsGpu1);
  $dbSpecGpu2 = json_encode($specsGpu2);

  $dbSpecMotherboard = json_encode($specsMotherboard);
  $dbSpecMotherboard1 = json_encode($specsMotherboard1);
  $dbSpecMotherboard2 = json_encode($specsMotherboard2);

  $dbSpecram = json_encode($specsram);
  $dbSpecram1 = json_encode($specsram1);
  $dbSpecram2 = json_encode($specsram2);

  $dbSpecSSD = json_encode($specsSSD);
  $dbSpecSSD1 = json_encode($specsSSD1);
  $dbSpecSSD2 = json_encode($specsSSD2);

  $dbSpecFans = json_encode($specsFans);
  $dbSpecFans1 = json_encode($specsFans1);
  $dbSpecFans2 = json_encode($specsFans2);

  $dbSpecPowersupply = json_encode($specsPowersupply);
  $dbSpecPowersupply1 = json_encode($specsPowersupply1);
  $dbSpecPowersupply2 = json_encode($specsPowersupply2);

  $dbSpecHeadset = json_encode($specsHeadset);
  $dbSpecHeadset1 = json_encode($specsHeadset1);
  $dbSpecHeadset2 = json_encode($specsHeadset2);

  $dbSpeckeyboard = json_encode($specskeyboard);
  $dbSpeckeyboard1 = json_encode($specskeyboard1);
  $dbSpeckeyboard2 = json_encode($specskeyboard2);

  $dbSpecMouse = json_encode($specsMouse);
  $dbSpecMouse1 = json_encode($specsMouse1);
  $dbSpecMouse2 = json_encode($specsMouse2);

  $data = $pdo->prepare("INSERT INTO `products` (`productname`, `price`, `pictures`, `maincategorie`, `subcategorie`, `specificaties`) VALUES 
        ('Captiva High End Gaming PC', 8330.77 , 'pc1.jpg', 'pcLaptop', 'pc', '$dbSpecPC'),
        ('Game PC Redux Gamer Entry i210 R65XT', 954.74 , 'pc2.jpg', 'pcLaptop', 'pc', '$dbSpecPC1'),
        ('Game PC Redux Gamer i230 R37', 1836.20 , 'pc3.jpg', 'pcLaptop', 'pc', '$dbSpecPC2'),
        ('HP SGIN Laptop', 377.27 , 'laptop1.jpg', 'pcLaptop', 'laptop', '$dbSpecLaptop'),
        ('Lenovo Laptop IdeaPad 5 Pro', 749.00 , 'laptop2.jpg', 'pcLaptop', 'laptop', '$dbSpecLaptop1'),
        ('MSI GS66 Stealth', 2323.60 , 'laptop3.jpg', 'pcLaptop', 'laptop', '$dbSpecLaptop2'),
        ('AMD Ryzen 5 5600X', 199.00 , 'cpu1.jpg', 'components', 'cpu', '$dbSpecCpu'),
        ('Intel Core i5-9400F', 165.50 , 'cpu2.jpg', 'components', 'cpu', '$dbSpecCpu1'),
        ('Intel CPU BX8070110100F Core i3', 85.98 , 'cpu3.jpg', 'components', 'cpu', '$dbSpecCpu2'),
        ('MSI Radeon RX 6500 XT MECH 2X 4G OC', 217.00 , 'gpu1.jpg', 'components', 'gpu', '$dbSpecGpu'),
        ('PNY NVIDIA Quadro P5000 Graphics Card', 1999.99 , 'gpu2.jpg', 'components', 'gpu', '$dbSpecGpu1'),
        ('Gigabyte GeForce RTX 3070 GAMING OC 8G', 1059.00 , 'gpu3.jpg', 'components', 'gpu', '$dbSpecGpu2'),
        ('GIGABYTE Z590 AORUS Master', 299.99 , 'moederbord1.jpg', 'components', 'moederbord', '$dbSpecMotherboard'),
        ('MSI MPG B550 Gaming Plus', 117.00 , 'moederbord2.jpg', 'components', 'moederbord', '$dbSpecMotherboard1'),
        ('Andifany X79 Moederbord', 148.98 , 'moederbord3.jpg', 'components', 'moederbord', '$dbSpecMotherboard2'),
        ('OFFTEK 8GB Vervanging RAM', 41.87 , 'ram1.jpg', 'components', 'ram', '$dbSpecram'),
        ('Corsair Vengeance LPX 16GB', 74.90 , 'ram2.jpg', 'components', 'ram', '$dbSpecram1'),
        ('Corsair Vengeance RGB Pro 32GB', 134.99 , 'ram3.jpg', 'components', 'ram', '$dbSpecram2'),
        ('Samsung 980 M.2 NVME 500GB SSD', 60.30 , 'ssd1.jpg', 'components', 'ssd', '$dbSpecSSD'),
        ('Seagate Firecuda 510 500GB SSD', 89.98 , 'ssd2.jpg', 'components', 'ssd', '$dbSpecSSD1'),
        ('Samsung 970 EVO Interne SSD: 1TB', 157.47 , 'ssd3.jpg', 'components', 'ssd', '$dbSpecSSD2'),
        ('Gembird FANPS hardwarekoeling Computer behuizing Ventilator', 4.95 , 'vent1.jpg', 'components', 'vent', '$dbSpecFans'),
        ('Noctua NF-A8 PWM, 80mm', 15.95 , 'vent2.jpg', 'components', 'vent', '$dbSpecFans1'),
        ('Titan TFD-8025M12B hardwarekoeling Computer behuizing Ventilator', 29.95 , 'vent3.jpg', 'components', 'vent', '$dbSpecFans2'),
        ('Gigabyte Modulaire - 850W', 124.55 , 'voeding1.jpg', 'components', 'voeding', '$dbSpecPowersupply'),
        ('Aerocool LUX850 - 850W', 75.90 , 'voeding2.jpg', 'components', 'voeding', '$dbSpecPowersupply1'),
        ('MSI MPG A850GF - 850W', 133.15 , 'voeding3.jpg', 'components', 'voeding', '$dbSpecPowersupply2'),
        ('Sennheiser Consumer Audio Headset', 46.68 , 'headset1.jpg', 'peripherals', 'headset', '$dbSpecHeadset'),
        ('EPOS Audio H6PRO Closed Acoustic Gaming Headset', 170.31 , 'headset2.jpg', 'peripherals', 'headset', '$dbSpecHeadset1'),
        ('HyperX Cloud II - Gaming Headset', 99.99 , 'headset3.jpg', 'peripherals', 'headset', '$dbSpecHeadset2'),
        ('HP Pavilion Gaming Keyboard 500 EURO QWERTY', 59.99 , 'keyboard1.jpg', 'peripherals', 'keyboard', '$dbSpeckeyboard'),
        ('OMEN Encoder Customizable Mechanical Gaming Keyboard', 49.00 , 'keyboard2.jpg', 'peripherals', 'keyboard', '$dbSpeckeyboard1'),
        ('Mars Gaming MKREVOES', 27.50 , 'keyboard3.jpg', 'peripherals', 'keyboard', '$dbSpeckeyboard2'),
        ('Corsair Harpoon Rgb Pro', 29.90 , 'muis1.jpg', 'peripherals', 'mouse', '$dbSpecMouse'),
        ('Razer DeathAdder V2 Gaming Mouse', 39.99 , 'muis2.jpg', 'peripherals', 'mouse', '$dbSpecMouse1'),
        ('Razer Basilisk X Hyperspeed', 37.21 , 'muis3.jpg', 'peripherals', 'mouse', '$dbSpecMouse2')");

     
        $data->execute(); 


?>