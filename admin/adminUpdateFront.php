<?php
session_start();
include_once("./config/connection.php");
if ($_SESSION['loggedInAdmin'] == 1) {
    
} else {
    header("Location: adminlogin.php");
    exit();
}
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    
};   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../adminpage.css">
    <link rel="stylesheet" href="adminNavbar.css">
    <script src="./js/searchbar.js"></script>
    <script src="./js/dropdown.js"></script>
    <title>Admin Panel</title>
</head>

<body>
<?php include "adminNavbar.php";?>
    <?php
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id=:id');
    $stmt->execute([":id" => $id]);
    $data = $stmt->fetchAll();
    echo "<div class=alignitems>";
    echo "<table>";
    echo "<tr>";
    echo "<th>" . "<h1>" . "Specificaties" . "</h2>" . "</th>";
    echo "<th>" . "<h1>" . "Specificaties" . "</h2>" . "</th>";
    echo "<tr>";
    foreach ($data as $product) {
        // NAMEN MOETEN NOG GEGEVEN WORDEN VOOR DAT UPDATE TESTEN!!!!!!!
        echo "<div class=innerflex>";
        echo "<div class='info'>";
        echo "<form method=POST action='adminUpdateBack.php'>";
        echo "<tr>" . "<td>" . "Productname" . "</td>" .  "<td>" .  "<input type=text name=product size=50 value='$product[productname]'>" .  "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Price" . "</td>" .  "<td>" .  "<input type=text name=price value='$product[price]'>" .  "</td>" . "</tr>";
        echo "</div>";
        echo "</div>";
    }

    $specData = json_decode($product['specificaties'], true);
    if ($specData['specs_type'] == "cpu") {
        echo "<tr>" . "<td>" . "Spec Type" . "</td>" . "<td>" . $specData['specs_type'] . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Processor" . "</td>" . "<td>" . "<input type=text name=processor value='$specData[processor]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "ProcessorSpeed" . "</td>" . "<td>" . "<input type=text name=processorSpeed value='$specData[processorSpeed]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Wattage" . "</td>" . "<td>" . "<input type=text name=wattage value='$specData[wattage]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "<button type=submit value= '$product[id]' name=submitCPU>Submit your Updates</button>" . "</td>" . "</tr>";
    } elseif ($specData['specs_type'] == "gpu") {
        echo "<tr>" . "<td>" . "Spec Type" . "</td>" . "<td>" . $specData['specs_type'] . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Graphics Ram" . "</td>" . "<td>" . "<input type=text name=graphicsRam value='$specData[graphicsRam]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "ClockSpeed" . "</td>" . "<td>" . "<input type=text name=clockspeed value='$specData[clockspeed]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "<button type=submit value= '$product[id]' name=submitGPU>Submit your Updates</button>" . "</td>" . "</tr>";
    } elseif ($specData['specs_type'] == "motherboard") {
        echo "<tr>" . "<td>" . "Spec Type" . "</td>" . "<td>" . $specData['specs_type'] . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Ram Technology" . "</td>" . "<td>" . "<input type=text name=ramtechnology value='$specData[ramtechnology]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "<button type=submit value= '$product[id]' name=submitMotherboard>Submit your Updates</button>" . "</td>" . "</tr>";
    } elseif ($specData['specs_type'] == "ram") {
        echo "<tr>" . "<td>" . "Spec Type" . "</td>" . "<td>" . $specData['specs_type'] . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Memory" . "</td>" . "<td>" . "<input type=text name=memory value='$specData[memory]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Clockspeed" . "</td>" . "<td>" . "<input type=text name=clockspeed value='$specData[clockspeed]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "<button type=submit value= '$product[id]' name=submitRAM>Submit your Updates</button>" . "</td>" . "</tr>";
    } elseif ($specData['specs_type'] == "SSD") {
        echo "<tr>" . "<td>" . "Spec Type" . "</td>" . "<td>" . $specData['specs_type'] . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Storage" . "</td>" . "<td>" . "<input type=text name=storage value='$specData[storage]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Wattage" . "</td>" . "<td>" . "<input type=text name=wattage value='$specData[wattage]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "<button type=submit value= '$product[id]' name=submitSSD>Submit your Updates</button>" . "</td>" . "</tr>";
    } elseif ($specData['specs_type'] == "fans") {
        echo "<tr>" . "<td>" . "Spec Type" . "</td>" . "<td>" . $specData['specs_type'] . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Total Fans" . "</td>" . "<td>" . "<input type=text name=totalFans value='$specData[totalFans]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Fan Speed" . "</td>" . "<td>" . "<input type=text name=fanSpeed value='$specData[fanSpeed]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "<button type=submit value= '$product[id]' name=submitFans>Submit your Updates</button>" . "</td>" . "</tr>";
    } elseif ($specData['specs_type'] == "Powersupply") {
        echo "<tr>" . "<td>" . "Spec Type" . "</td>" . "<td>" . $specData['specs_type'] . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Wattage" . "</td>" . "<td>" . "<input type=text name=wattage value='$specData[wattage]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Fan Size" . "</td>" . "<td>" . "<input type=text name=fansize value='$specData[fansize]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "<button type=submit value= '$product[id]' name=submitPowersupply>Submit your Updates</button>" . "</td>" . "</tr>";
    } elseif ($specData['specs_type'] == "pc") {
        echo "<tr>" . "<td>" . "Spec Type" . "</td>" . "<td>" . $specData['specs_type'] . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Operatingsystem" . "</td>" . "<td>" . "<input type=text name=operatingsystem value='$specData[operatingsystem]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Motherboard" . "</td>" . "<td>" . "<input type=text name=motherboard value='$specData[motherboard]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Ram Type" . "</td>" . "<td>" . "<input type=text name=ramtype value='$specData[ramtype]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Ram Memory" . "</td>" . "<td>" . "<input type=text name=rammemory value='$specData[rammemory]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "CPU" . "</td>" . "<td>" . "<input type=text name=cpu value='$specData[cpu]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "CPU Model" . "</td>" . "<td>" . "<input type=text name=cpumodel value='$specData[cpumodel]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "GPU" . "</td>" . "<td>" . "<input type=text name=gpu value='$specData[gpu]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "SSD" . "</td>" . "<td>" . "<input type=text name=ssd value='$specData[ssd]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "<button type=submit value= '$product[id]' name=submitPC>Submit your Updates</button>" . "</td>" . "</tr>";
    } elseif ($specData['specs_type'] == "Laptop") {
        echo "<tr>" . "<td>" . "Spec Type" . "</td>" . "<td>" . $specData['specs_type'] . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Screen Size" . "</td>" . "<td>" . "<input type=text name=screenSize value='$specData[screenSize]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Resolution" . "</td>" . "<td>" . "<input type=text name=resolution value='$specData[resolution]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Processor" . "</td>" . "<td>" . "<input type=text name=processor value='$specData[processor]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Ram" . "</td>" . "<td>" . "<input type=text name=ram value='$specData[ram]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Hard Drive" . "</td>" . "<td>" . "<input type=text name=hardDrive value='$specData[hardDrive]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Operartngsystem" . "</td>" . "<td>" . "<input type=text name=operatingsystem value='$specData[operatingsystem]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Bluetooth" . "</td>" . "<td>" . "<input type=text name=bluetooth value='$specData[bluetooth]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "<button type=submit value= '$product[id]' name=submitLaptop>Submit your Updates</button>" . "</td>" . "</tr>";
    } elseif ($specData['specs_type'] == "keyboard") {
        echo "<tr>" . "<td>" . "Spec Type" . "</td>" . "<td>" . $specData['specs_type'] . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Keyboard Type" . "</td>" . "<td>" . "<input type=text name=keyboardtype value='$specData[keyboardtype]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Input Type" . "</td>" . "<td>" . "<input type=text name=inputType value='$specData[inputType]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "RGB" . "</td>" . "<td>" . "<input type=text name=RGB value='$specData[RGB]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "<button type=submit value= '$product[id]' name=submitKeyboard>Submit your Updates</button>" . "</td>" . "</tr>";
    } elseif ($specData['specs_type'] == "mouse") {
        echo "<tr>" . "<td>" . "Spec Type" . "</td>" . "<td>" . $specData['specs_type'] . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Buttons" . "</td>" . "<td>" . "<input type=text name=buttons value='$specData[buttons]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "DPI" . "</td>" . "<td>" . "<input type=text name=dpi value='$specData[Dpi]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Mouse Type" . "</td>" . "<td>" . "<input type=text name=mousetype value='$specData[mousetype]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Bluetooth" . "</td>" . "<td>" . "<input type=text name=bluetooth value='$specData[Bluetooth]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "<button type=submit value= '$product[id]' name=submitMouse>Submit your Updates</button>" . "</td>" . "</tr>";
    } elseif ($specData['specs_type'] == "headset") {
        echo "<tr>" . "<td>" . "Spec Type" . "</td>" . "<td>" . $specData['specs_type'] . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Wired" . "</td>" . "<td>" . "<input type=text name=wired value='$specData[Wired]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Bluetooth" . "</td>" . "<td>" . "<input type=text name=bluetooth value='$specData[Bluetooth]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "Noice Canceling" . "</td>" . "<td>" . "<input type=text name=noiceCanceling value='$specData[NoiceCanceling]'>" . "</td>" . "</tr>";
        echo "<tr>" . "<td>" . "<button type=submit value= '$product[id]' name=submitHeadset>Submit your Updates</button>" . "</td>" . "</tr>";
    }
    echo "</table>";
    echo "</div>";
    echo "</form>";

    ?>
</body>