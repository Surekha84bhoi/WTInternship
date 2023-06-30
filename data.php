<?php
error_reporting(0);
session_start();

if (!isset($_SESSION["username"]) || ($_SESSION["username"] != "Cust1" && $_SESSION["username"] != "Cust2")) {
    header("Location: login.php");
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Stylesheet" href="data.css">
    <title>Order Form</title>
</head>

<body>
    <!-- <center> -->
        <br>
        <h1 align="center">Order Form</h1>
        <br>
        <div>
            <br>
            <form action="connection.php" method="POST">
               <div class="box"> 
                <div class=" col">
                    <label>Order Date</label>
                    <input type="date" class="tb" name="order_date" required>
                </div>
                <br>
                <div class=" col">
                    <label>Company</label>
                    <input type="text" class="tb" name="company" required>
                </div>
                <br>
                <div class=" col">
                    <label>Owner</label>
                    <input type="text" class="tb" name="owner" required>
                </div>
                <br>
                <div class=" col">
                    <label>Item</label>
                    <input type="text" class="tb" name="item" required>
                </div>
                <br>
                <div class=" col">
                    <label>Quantity</label>
                    <input type="number" class="tb" name="quantity" required>
                </div>
                <br>
                <div class=" col">
                    <label>Weight</label>
                    <input type="number" class="tb" name="weight" required>
                </div>
                <br>
                <div class=" col">
                    <label>Request for Shipment</label>
                    <input type="text" class="tb" name="request_shipment">
                </div>
                <br>
                <div class=" col">
                    <label>Tracking ID</label>
                    <input type="text" class="tb" name="tracking_id">
                </div>
                <br>
                <div class=" col">
                    <label>Shipment Size</label>
                    <select name="shipment_size" class="tb">
                        <option value="small">Small</option>
                        <option value="medium">Medium</option>
                        <option value="large">Large</option>
                    </select>
                </div>
                <br>
                <div class=" col">
                    <label>Box Count</label>
                    <input type="number" class="tb" name="box_count">
                </div>
                <br>
                <div class=" col">
                    <label>Specification</label>
                    <textarea name="specification" class="tb"></textarea>
                </div>
                <br>
                <div class=" col">
                    <label>Checklist Quantity</label>
                    <input type="text" class="tb" name="checklist_quantity" required>
                </div>
                <br>
                <div>
                    <input type="submit" value="Submit" class="sub" style="background-color:blue; width= 250px;">
                </div>
</div>
            </form>
        </div>
    <!-- </center> -->
</body>

</html>
