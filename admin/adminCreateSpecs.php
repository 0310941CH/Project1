<?php
session_start();
include_once("./config/connection.php");
if ($_SESSION['loggedInAdmin'] == 1) {
    $productname = $_SESSION['productname'];

    if (isset($_POST['submitCPU'])) {
        $specCPU = [
            "specs_type" => $_SESSION['subcategorie'],
            "processor" => $_POST['processor'],
            "processorSpeed" => $_POST['processorSpeed'],
            "wattage" => $_POST['wattage']];

    } elseif (isset($_POST['submitGPU'])) {
        $specCPU = [
            "specs_type" => $_SESSION['subcategorie'],
            "graphicsRam" => $_POST['graphicsRam'],
            "clockspeed" => $_POST['clockspeed']];
    } elseif (isset($_POST['submitMotherboard'])) {
        $specCPU = [
            "specs_type" => $_SESSION['subcategorie'],
            "ramtechnology" => $_POST['ramtechnology']];
    } elseif (isset($_POST['submitRAM'])) {
        $specCPU = [
            "specs_type" => $_SESSION['subcategorie'],
            "memory" => $_POST['memory'],
            "clockspeed" => $_POST['clockspeed'],
            "wattage" => $_POST['wattage']];
    } elseif (isset($_POST['submitSSD'])) {
        $specCPU = [
            "specs_type" => $_SESSION['subcategorie'],
            "storage" => $_POST['storage'],
            "wattage" => $_POST['wattage']];
    } elseif (isset($_POST['submitFans'])) {
        $specCPU = [
            "specs_type" => $_SESSION['subcategorie'],
            "totalFans" => $_POST['totalFans'],
            "fanSpeed" => $_POST['fanSpeed']];
    } elseif (isset($_POST['submitPowersupply'])) {
        $specCPU = [
            "specs_type" => $_SESSION['subcategorie'],
            "wattage" => $_POST['wattage'],
            "fansize" => $_POST['fansize']];
    } elseif (isset($_POST['submitHeadset'])) {
        $specCPU = [
            "specs_type" => $_SESSION['subcategorie'],
            "Wired" => $_POST['wired'],
            "Bluetooth" => $_POST['bluetooth'],
            "NoiceCanceling" => $_POST['noiceCanceling']];
    } elseif (isset($_POST['submitKeyboard'])) {
        $specCPU = [
            "specs_type" => $_SESSION['subcategorie'],
            "keyboardtype" => $_POST['keyboardtype'],
            "inputType" => $_POST['inputType'],
            "RGB" => $_POST['RGB']];
    } elseif (isset($_POST['submitMouse'])) {
        $specCPU = [
            "specs_type" => $_SESSION['subcategorie'],
            "buttons" => $_POST['buttons'],
            "dpi" => $_POST['dpi'],
            "mousetype" => $_POST['mousetype'],
            "bluetooth" => $_POST['bluetooth']];
    } elseif (isset($_POST['submitPC'])) {
        $specCPU = [
            "specs_type" => $_SESSION['subcategorie'],
            "operatingsystem" => $_POST['operatingsystem'],
            "motherboard" => $_POST['motherboard'],
            "ramtype" => $_POST['ramtype'],
            "rammemory" => $_POST['rammemory'],
            "cpu" => $_POST['cpu'],
            "cpumodel" => $_POST['cpumodel'],
            "gpu" => $_POST['gpu'],
            "ssd" => $_POST['ssd']];
    } elseif (isset($_POST['submitLaptop'])) {
        $specCPU = [
            "specs_type" => $_SESSION['subcategorie'],
            "screenSize" => $_POST['screenSize'],
            "resolution" => $_POST['resolution'],
            "processor" => $_POST['processor'],
            "ram" => $_POST['ram'],
            "hardDrive" => $_POST['hardDrive'],
            "operatingsystem" => $_POST['operatingsystem'],
            "bluetooth" => $_POST['bluetooth']];
    }
    if (!empty($_POST))
     {
        $stmt = $pdo->prepare('SELECT * FROM products WHERE productname=:product');
        $stmt->execute([":product" => $productname]);
        $data = $stmt->fetchAll();
        foreach ($data as $product) {
        };
        $dbspecCPU = json_encode($specCPU);

        $imagename = $_SESSION['image'];
            $sql = "UPDATE products SET specificaties=? WHERE pictures=?";
            $pdo->prepare($sql)->execute([$dbspecCPU, $imagename]);
            header("Location: adminpage.php");
    }
} else {
    header("Location: adminlogin.php");
    exit();
}
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminNavbar.css">
    <script src="./js/searchbar.js"></script>
    <script src="./js/dropdown.js"></script>
    <title>Admin Panel Create</title>
</head>

<body>
    <?php include "adminNavbar.php" ?>
    <form method="POST">
        <table>
            <tr>
                <th>Name</th>
                <th>Input</th>
            </tr>
            <?php
            if ($_SESSION['subcategorie'] == "cpu") {
                echo "<tr>" . "<td>" . "spec_type " . "</td>" . "<td>" . $_SESSION['subcategorie'] . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Processor" . "</td>" . "<td>" . "<input type=text name=processor required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "ProcessorSpeed" . "</td>" . "<td>" . "<input type=text name=processorSpeed required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Wattage" . "</td>" . "<td>" . "<input type=text name=wattage required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "<button type=submit name=submitCPU>Submit your Updates</button>" . "</td>" . "</tr>";
            } elseif ($_SESSION['subcategorie'] == "gpu") {
                echo "<tr>" . "<td>" . "spec_type " . "</td>" . "<td>" . $_SESSION['subcategorie'] . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Graphics Ram" . "</td>" . "<td>" . "<input type=text name=graphicsRam required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "ClockSpeed" . "</td>" . "<td>" . "<input type=text name=clockspeed required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "<button type=submit name=submitGPU>Submit your Updates</button>" . "</td>" . "</tr>";
            } elseif ($_SESSION['subcategorie'] == "motherboard") {
                echo "<tr>" . "<td>" . "spec_type " . "</td>" . "<td>" . $_SESSION['subcategorie'] . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Ram Technology" . "</td>" . "<td>" . "<input type=text name=ramtechnology required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "<button type=submit name=submitMotherboard>Submit your Updates</button>" . "</td>" . "</tr>";
            } elseif ($_SESSION['subcategorie'] == "ram") {
                echo "<tr>" . "<td>" . "spec_type " . "</td>" . "<td>" . $_SESSION['subcategorie'] . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Memory" . "</td>" . "<td>" . "<input type=text name=memory required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Clockspeed" . "</td>" . "<td>" . "<input type=text name=clockspeed required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Wattage" . "</td>" . "<td>" . "<input type=text name=wattage required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "<button type=submit name=submitRAM>Submit your Updates</button>" . "</td>" . "</tr>";
            } elseif ($_SESSION['subcategorie'] == "ssd") {
                echo "<tr>" . "<td>" . "spec_type " . "</td>" . "<td>" . $_SESSION['subcategorie'] . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Storage" . "</td>" . "<td>" . "<input type=text name=storage required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Wattage" . "</td>" . "<td>" . "<input type=text name=wattage required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "<button type=submit name=submitSSD>Submit your Updates</button>" . "</td>" . "</tr>";
            } elseif ($_SESSION['subcategorie'] == "fans") {
                echo "<tr>" . "<td>" . "spec_type " . "</td>" . "<td>" . $_SESSION['subcategorie'] . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Total Fans" . "</td>" . "<td>" . "<input type=text name=totalFans required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Fan Speed" . "</td>" . "<td>" . "<input type=text name=fanSpeed required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "<button type=submit name=submitFans>Submit your Updates</button>" . "</td>" . "</tr>";
            } elseif ($_SESSION['subcategorie'] == "powersupply") {
                echo "<tr>" . "<td>" . "spec_type " . "</td>" . "<td>" . $_SESSION['subcategorie'] . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Wattage" . "</td>" . "<td>" . "<input type=text name=wattage required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Fan Size" . "</td>" . "<td>" . "<input type=text name=fansize required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "<button type=submit name=submitPowersupply>Submit your Updates</button>" . "</td>" . "</tr>";
            } elseif ($_SESSION['subcategorie'] == "headset") {
                echo "<tr>" . "<td>" . "spec_type " . "</td>" . "<td>" . $_SESSION['subcategorie'] . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Wired" . "</td>" . "<td>" . "<input type=text name=wired required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Bluetooth" . "</td>" . "<td>" . "<input type=text name=bluetooth required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Noice Canceling" . "</td>" . "<td>" . "<input type=text name=noiceCanceling required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "<button type=submit name=submitHeadset>Submit your Updates</button>" . "</td>" . "</tr>";
            } elseif ($_SESSION['subcategorie'] == "keyboard") {
                echo "<tr>" . "<td>" . "spec_type " . "</td>" . "<td>" . $_SESSION['subcategorie'] . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Keyboard Type" . "</td>" . "<td>" . "<input type=text name=keyboardtype required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Input Type" . "</td>" . "<td>" . "<input type=text name=inputType required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "RGB" . "</td>" . "<td>" . "<input type=text name=RGB required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "<button type=submit name=submitKeyboard>Submit your Updates</button>" . "</td>" . "</tr>";
            } elseif ($_SESSION['subcategorie'] == "mouse") {
                echo "<tr>" . "<td>" . "spec_type " . "</td>" . "<td>" . $_SESSION['subcategorie'] . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Buttons" . "</td>" . "<td>" . "<input type=text name=buttons required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "DPI" . "</td>" . "<td>" . "<input type=text name=dpi required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Mouse Type" . "</td>" . "<td>" . "<input type=text name=mousetype required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Bluetooth" . "</td>" . "<td>" . "<input type=text name=bluetooth required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "<button type=submit name=submitMouse>Submit your Updates</button>" . "</td>" . "</tr>";
            } elseif ($_SESSION['subcategorie'] == "pc") {
                echo "<tr>" . "<td>" . "spec_type " . "</td>" . "<td>" . $_SESSION['subcategorie'] . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Operatingsystem" . "</td>" . "<td>" . "<input type=text name=operatingsystem required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Motherboard" . "</td>" . "<td>" . "<input type=text name=motherboard required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Ram Type" . "</td>" . "<td>" . "<input type=text name=ramtype required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Ram Memory" . "</td>" . "<td>" . "<input type=text name=rammemory required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "CPU" . "</td>" . "<td>" . "<input type=text name=cpu required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "CPU Model" . "</td>" . "<td>" . "<input type=text name=cpumodel required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "GPU" . "</td>" . "<td>" . "<input type=text name=gpu required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "SSD" . "</td>" . "<td>" . "<input type=text name=ssd required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "<button type=submit name=submitPC>Submit your Updates</button>" . "</td>" . "</tr>";
            } elseif ($_SESSION['subcategorie'] == "laptop") {
                echo "<tr>" . "<td>" . "spec_type " . "</td>" . "<td>" . $_SESSION['subcategorie'] . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Screen Size" . "</td>" . "<td>" . "<input type=text name=screenSize required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Resolution" . "</td>" . "<td>" . "<input type=text name=resolution required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Processor" . "</td>" . "<td>" . "<input type=text name=processor required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Ram" . "</td>" . "<td>" . "<input type=text name=ram required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Hard Drive" . "</td>" . "<td>" . "<input type=text name=hardDrive required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Operartngsystem" . "</td>" . "<td>" . "<input type=text name=operatingsystem required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "Bluetooth" . "</td>" . "<td>" . "<input type=text name=bluetooth required>" . "</td>" . "</tr>";
                echo "<tr>" . "<td>" . "<button type=submit name=submitLaptop>Submit your Updates</button>" . "</td>" . "</tr>";
            }
            ?>
        </table>
    </form>
</body>