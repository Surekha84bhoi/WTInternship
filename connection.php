<?php
error_reporting(0);

$host = "localhost";
$user = "root";
$password = "";
$db = "user";

$conn = mysqli_connect($host, $user, $password, $db);

// Check the connection
if (!$conn) {
    echo "Connection Failed: " . mysqli_connect_error();
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $orderDate = $_POST["order_date"];
    $company = $_POST["company"];
    $owner = $_POST["owner"];
    $item = $_POST["item"];
    $quantity = $_POST["quantity"];
    $weight = $_POST["weight"];
    $requestShipment = isset($_POST["request_shipment"]) ? 1 : 0;
    $trackingID = $_POST["tracking_id"];
    $shipmentSize = $_POST["shipment_size"];
    $boxCount = $_POST["box_count"];
    $specification = $_POST["specification"];
    $checklistQuantity = $_POST["checklist_quantity"];

    $query = "INSERT INTO data VALUES('$orderDate','$company', '$owner', '$item', '$quantity', '$weight', '$requestShipment', '$trackingID',
    '$shipmentSize', '$boxCount', '$specification', '$checklistQuantity' )" ;

    $result = mysqli_query($conn, $query); 

    if($result)
    {
        echo "Data inserted into database";
    }
    else{
        echo "Failed to insert data into database";
    }
    // Perform data validation
    $errors = [];

    // Validate order date
    if (empty($orderDate)) {
        $errors[] = "Order date is required";
    }

    // Validate company
    if (empty($company)) {
        $errors[] = "Company is required";
    }

    // Validate owner
    if (empty($owner)) {
        $errors[] = "Owner is required";
    }

    // Validate item
    if (empty($item)) {
        $errors[] = "Item is required";
    }

    // Validate quantity
    if (empty($quantity) || !is_numeric($quantity) || $quantity <= 0) {
        $errors[] = "Quantity must be a positive number";
    }

    // Validate weight
    if (empty($weight) || !is_numeric($weight) || $weight <= 0) {
        $errors[] = "Weight must be a positive number";
    }

    // Validate tracking ID if request for shipment is checked
    if ($requestShipment && empty($trackingID)) {
        $errors[] = "Tracking ID is required when requesting for shipment";
    }

    // Validate box count
    if (!empty($boxCount) && (!is_numeric($boxCount) || $boxCount <= 0)) {
        $errors[] = "Box count must be a positive number";
    }

    // Validate checklist quantity
    if (empty($checklistQuantity) || !is_numeric($checklistQuantity) || $checklistQuantity <= 0) {
        $errors[] = "Checklist quantity must be a positive number";
    }

    // If there are errors, display them
    if (!empty($errors)) {
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } else {
        // Form data is valid, store it in the database
        $insertQuery = "INSERT INTO data (order_date, company, owner, item, quantity, weight, request_shipment, tracking_id, shipment_size, box_count, specification, checklist_quantity) VALUES ('$orderDate', '$company', '$owner', '$item', $quantity, $weight, $requestShipment, '$trackingID', '$shipmentSize', $boxCount, '$specification', $checklistQuantity)";
        if (mysqli_query($conn, $insertQuery)) {
            echo "Order submitted successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
    // Close the connection
    mysqli_close($conn);
?>
