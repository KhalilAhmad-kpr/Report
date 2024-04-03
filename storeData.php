<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "report";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the POST request
$psoName = $_POST['psoName'];
$volumeRequired = $_POST['volumeRequired'];
$volumeAchievement = $_POST['volumeAchievement'];
$rgbRequired = $_POST['rgbRequired'];
$rgbAchievement = $_POST['rgbAchievement'];
$icRequired = $_POST['icRequired'];
$icAchievement = $_POST['icAchievement'];
$penetrationBoxes = $_POST['penetrationBoxes'];
$improvementPercentage = $_POST['improvementPercentage'];
$red = $_POST['red'];
$newOutlets = $_POST['newOutlets'];
$zeroSale = $_POST['zeroSale'];
$inefficient = $_POST['inefficient'];
$callCompletion = $_POST['callCompletion'];
$strikeRate = $_POST['strikeRate'];

// Check if data already exists for the given PSO name and current date
$currentDate = date("Y-m-d");
$sql_check = "SELECT * FROM performance_data WHERE pso_name='$psoName' AND date='$currentDate'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    // Data exists, update the existing record
    $sql_update = "UPDATE performance_data SET
                   volume_required=$volumeRequired,
                   volume_achievement=$volumeAchievement,
                   rgb_required=$rgbRequired,
                   rgb_achievement=$rgbAchievement,
                   ic_required=$icRequired,
                   ic_achievement=$icAchievement,
                   penetration_boxes=$penetrationBoxes,
                   improvement_percentage=$improvementPercentage,
                   red=$red,
                   new_outlets=$newOutlets,
                   zero_sale=$zeroSale,
                   inefficient=$inefficient,
                   call_completion=$callCompletion,
                   strike_rate=$strikeRate
                   WHERE pso_name='$psoName' AND date='$currentDate'";

    if ($conn->query($sql_update) === TRUE) {
        echo "Data updated successfully.";
    } else {
        echo "Error updating data: " . $conn->error;
    }
} else {
    // Data doesn't exist, insert a new record
    $sql_insert = "INSERT INTO performance_data (pso_name, date, volume_required, volume_achievement, rgb_required, rgb_achievement, ic_required, ic_achievement, penetration_boxes, improvement_percentage, red, new_outlets, zero_sale, inefficient, call_completion, strike_rate)
                   VALUES ('$psoName', '$currentDate', $volumeRequired, $volumeAchievement, $rgbRequired, $rgbAchievement, $icRequired, $icAchievement, $penetrationBoxes, $improvementPercentage, $red, $newOutlets, $zeroSale, $inefficient, $callCompletion, $strikeRate)";

    if ($conn->query($sql_insert) === TRUE) {
        echo "Data inserted successfully.";
    } else {
        echo "Error inserting data: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
