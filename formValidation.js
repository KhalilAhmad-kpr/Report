function confirmed() {
    var psoName = document.getElementById('psoName').value;
    var volumeRequired = parseFloat(document.getElementById('volumeRequired').value);
    var volumeAchievement = parseFloat(document.getElementById('volumeAchievement').value);
    var rgbRequired = parseFloat(document.getElementById('rgbRequired').value);
    var rgbAchievement = parseFloat(document.getElementById('rgbAchievement').value);
    var icRequired = parseFloat(document.getElementById('icRequired').value);
    var icAchievement = parseFloat(document.getElementById('icAchievement').value);
    var penetrationBoxes = parseFloat(document.getElementById('penetrationBoxes').value);
    var improvementPercentage = parseFloat(document.getElementById('improvementPercentage').value);
    var red = parseFloat(document.getElementById('red').value);
    var newOutlets = parseFloat(document.getElementById('newOutlets').value);
    var zeroSale = parseFloat(document.getElementById('zeroSale').value);
    var inefficient = parseFloat(document.getElementById('inefficient').value);
    var callCompletion = parseFloat(document.getElementById('callCompletion').value);
    var strikeRate = parseFloat(document.getElementById('strikeRate').value);

    // Validation for PSO Name dropdown
    if (psoName === "") {
        alert("Please select a PSO Name.");
        return;
    }

    // Validation for positive numbers
    if (isNaN(volumeRequired) || volumeRequired <= 0 ||
        isNaN(volumeAchievement) || volumeAchievement <= 0 ||
        isNaN(rgbRequired) || rgbRequired <= 0 ||
        isNaN(rgbAchievement) || rgbAchievement <= 0 ||
        isNaN(icRequired) || icRequired <= 0 ||
        isNaN(icAchievement) || icAchievement <= 0 ||
        isNaN(penetrationBoxes) || penetrationBoxes <= 0 ||
        isNaN(improvementPercentage) || improvementPercentage < 0 || improvementPercentage > 100 ||
        isNaN(red) || red <= 0 ||
        isNaN(newOutlets) || newOutlets <= 0 ||
        isNaN(zeroSale) || zeroSale <= 0 ||
        isNaN(inefficient) || inefficient <= 0 ||
        isNaN(callCompletion) || callCompletion < 0 || callCompletion > 100 ||
        isNaN(strikeRate) || strikeRate < 0 || strikeRate > 100) {
        alert("Please enter valid positive numbers and percentages.");
        return;
    }

    // Create a FormData object to send data to PHP
    var formData = new FormData();
    formData.append('psoName', psoName);
    formData.append('volumeRequired', volumeRequired);
    formData.append('volumeAchievement', volumeAchievement);
    formData.append('rgbRequired', rgbRequired);
    formData.append('rgbAchievement', rgbAchievement);
    formData.append('icRequired', icRequired);
    formData.append('icAchievement', icAchievement);
    formData.append('penetrationBoxes', penetrationBoxes);
    formData.append('improvementPercentage', improvementPercentage);
    formData.append('red', red);
    formData.append('newOutlets', newOutlets);
    formData.append('zeroSale', zeroSale);
    formData.append('inefficient', inefficient);
    formData.append('callCompletion', callCompletion);
    formData.append('strikeRate', strikeRate);

    // Send data to PHP file using XMLHttpRequest
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;
            alert(response); // Display response message from PHP
            // You can perform further actions based on the PHP response if needed
        }
    };
    xmlhttp.open("POST", "storeData.php", true);
    xmlhttp.send(formData);
}
