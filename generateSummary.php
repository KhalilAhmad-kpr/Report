<?php
// Database credentials
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

// Get current date
$currentDate = date("Y-m-d");

// Fetch data for the current date
$sql = "SELECT * FROM performance_data WHERE date='$currentDate'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Create a responsive table with Bootstrap classes
    echo '<!DOCTYPE html>';
    echo '<html lang="en">';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<title>Performance Summary</title>';
    echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">';
    echo '</head>';
    echo '<body>';

    echo '<div class="container">';
    echo '<div class="table-responsive">';
    echo '<table class="table table-bordered table-striped">';
    echo '<thead class="thead-dark">
            <tr>
                <th>PSO Name</th>
                <th>Volume Required</th>
                <th>Volume Achievement</th>
                <th>RGB Required</th>
                <th>RGB Achievement</th>
                <th>IC Required</th>
                <th>IC Achievement</th>
                <th>Penetration Boxes</th>
                <th>Improvement Percentage</th>
                <th>RED</th>
                <th>New Outlets</th>
                <th>Zero Sale</th>
                <th>Inefficient</th>
                <th>Call Completion</th>
                <th>Strike Rate</th>
            </tr>
        </thead>';
    echo '<tbody>';

    // Variables to store the sum and average values
    $totalVolumeRequired = 0;
    $totalVolumeAchievement = 0;
    $totalRgbRequired = 0;
    $totalRgbAchievement = 0;
    $totalIcRequired = 0;
    $totalIcAchievement = 0;
    $totalPenetrationBoxes = 0;
    $totalImprovementPercentage = 0;
    $totalRed = 0;
    $totalNewOutlets = 0;
    $totalZeroSale = 0;
    $totalInefficient = 0;
    $totalCallCompletion = 0;
    $totalStrikeRate = 0;
    $rowCount = 0;

    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row['pso_name'] . '</td>
                <td>' . $row['volume_required'] . '</td>
                <td>' . $row['volume_achievement'] . '</td>
                <td>' . $row['rgb_required'] . '</td>
                <td>' . $row['rgb_achievement'] . '</td>
                <td>' . $row['ic_required'] . '</td>
                <td>' . $row['ic_achievement'] . '</td>
                <td>' . $row['penetration_boxes'] . '</td>
                <td>' . $row['improvement_percentage'] . '</td>
                <td>' . $row['red'] . '</td>
                <td>' . $row['new_outlets'] . '</td>
                <td>' . $row['zero_sale'] . '</td>
                <td>' . $row['inefficient'] . '</td>
                <td>' . $row['call_completion'] . '</td>
                <td>' . $row['strike_rate'] . '</td>
            </tr>';

        // Calculate sum and average
        $totalVolumeRequired += $row['volume_required'];
        $totalVolumeAchievement += $row['volume_achievement'];
        $totalRgbRequired += $row['rgb_required'];
        $totalRgbAchievement += $row['rgb_achievement'];
        $totalIcRequired += $row['ic_required'];
        $totalIcAchievement += $row['ic_achievement'];
        $totalPenetrationBoxes += $row['penetration_boxes'];
        $totalImprovementPercentage += $row['improvement_percentage'];
        $totalRed += $row['red'];
        $totalNewOutlets += $row['new_outlets'];
        $totalZeroSale += $row['zero_sale'];
        $totalInefficient += $row['inefficient'];
        $totalCallCompletion += $row['call_completion'];
        $totalStrikeRate += $row['strike_rate'];
        $rowCount++;
    }

    // Calculate averages
    $averageImprovementPercentage = $totalImprovementPercentage / $rowCount;
    $averageCallCompletion = $totalCallCompletion / $rowCount;
    $averageStrikeRate = $totalStrikeRate / $rowCount;

    // Display summary row with totals and averages
    echo '<tr class="table-info">
            <td>Total/Average</td>
            <td>' . $totalVolumeRequired . '</td>
            <td>' . $totalVolumeAchievement . '</td>
            <td>' . $totalRgbRequired . '</td>
            <td>' . $totalRgbAchievement . '</td>
            <td>' . $totalIcRequired . '</td>
            <td>' . $totalIcAchievement . '</td>
            <td>' . $totalPenetrationBoxes . '</td>
            <td>' . $averageImprovementPercentage . '</td>
            <td>' . $totalRed . '</td>
            <td>' . $totalNewOutlets . '</td>
            <td>' . $totalZeroSale . '</td>
            <td>' . $totalInefficient . '</td>
            <td>' . $averageCallCompletion . '</td>
            <td>' . $averageStrikeRate . '</td>
        </tr>';

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
    echo '</div>';

    echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>';
    echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>';
    echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>';
    echo '</body>';
    echo '</html>';
} else {
    echo "No data found for the current date.";
}

// Close connection
$conn->close();
?>
