<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "user";

// Create a connection to the database
$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
   
    echo "Connection Failed: " . mysqli_connect_error();
}

// Retrieve data from the database
$query = "SELECT SUM(quantity) AS Cust1_quantity, SUM(weight) AS Cust1_weight, 
    SUM(box_count) AS Cust1_box_count FROM data WHERE item = 'Cust1'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$Cust1Quantity = $row['Cust1_quantity'];
$Cust1Weight = $row['Cust1_weight'];
$Cust1BoxCount = $row['Cust1_box_count'];

$query = "SELECT SUM(quantity) AS Cust2_quantity, SUM(weight) AS Cust2_weight, 
    SUM(box_count) AS Cust2_box_count FROM data WHERE item = 'Cust2'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$Cust2Quantity = $row['Cust2_quantity'];
$Cust2Weight = $row['Cust2_weight'];
$Cust2BoxCount = $row['Cust2_box_count'];

$totalQuantity = $Cust1Quantity + $Cust2Quantity;
$totalWeight = $Cust1Weight + $Cust2Weight;
$totalBoxCount = $Cust1BoxCount + $Cust2BoxCount;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>

<body>
    <br><br><br>
    <table border="1" cellspacing="0" align="center" width="50%" >

        <tr>
            <th bgcolor="00ffff">Item/Customer  </th>
            <th bgcolor= "lightslateblue">Cust1</th>
            <th bgcolor= "lightslateblue" >Cust2</th>
            <th bgcolor= "lightslateblue">Total</th>
        </tr>
        <tr>
            <td bgcolor="yellow">Quantity</td>
            <td bgcolor="silver"><?php echo $Cust1Quantity; ?></td>
            <td bgcolor="silver"><?php echo $Cust2Quantity; ?></td>
            <td bgcolor="silver"><?php echo $totalQuantity; ?></td>
        </tr>
        <tr>
            <td bgcolor = "yellow">Weight</td>
            <td bgcolor="00ffff"><?php echo $Cust1Weight; ?></td>
            <td bgcolor="00ffff"><?php echo $Cust2Weight; ?></td>
            <td bgcolor="00ffff"><?php echo $totalWeight; ?></td>
        </tr>
        <tr>
            <td bgcolor="yellow">Box Count</td>
            <td bgcolor="lightgrey"><?php echo $Cust1BoxCount; ?></td>
            <td bgcolor="lightgrey"><?php echo $Cust2BoxCount; ?></td>
            <td bgcolor="lightgrey"><?php echo $totalBoxCount; ?></td>
        </tr>
    </table>
</body>
    
</html>
