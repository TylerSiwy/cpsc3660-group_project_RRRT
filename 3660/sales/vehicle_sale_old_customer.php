<?php
include '../credentials.php';
$servername = getServerName();
$username = getUserName();
$password = getPassword();
$dbname = getdbName();

//For Sale
$VIN = $_POST['vin_input'];
$SID = $_POST['sid_input'];
$EID = $_POST['eid_input'];
$commission = (int)$_POST['commission_input'];
$sale_date = $_POST['sale_date_input'];
$downpayment = (int)$_POST['downpayment_input'];
$sale_price = (int)$_POST['sale_price_input'];
$interest_rate = (int)$_POST['i_rate_input'];

//For Customer
$first = $_POST["first_input"];
$last = $_POST["last_input"];
$phone_number = $_POST["phone_input"];

//Employee EID
$EID = $_POST['eid_input'];

//Insert new sale
$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
die("Connection failed: " . $con->connect_error);
}

$sql = "INSERT INTO Sale (_sid, sale_price, intrest_rate, downpayment, commission, sale_date) 
VALUES 
('$SID', '$sale_price', '$interest_rate', '$downpayment', '$commission', '$sale_date')";

if(mysqli_query($con, $sql)){
echo "Sale inserted successfully.<BR>";
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
mysqli_close($con);


//Insert into Sale_Employee


$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
die("Connection failed: " . $con->connect_error);
}

$sql = "INSERT INTO Sale_Employee (eid, _sid) 
VALUES 
(\"$EID\", \"$SID\")";

if(mysqli_query($con, $sql)){
echo "Sale_employee inserted successfully.<BR>";
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
mysqli_close($con);


//Insert into Sale_Vehicle 
$servername = getServerName();
$username = getUserName();
$password = getPassword();
$dbname = getdbName();

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
die("Connection failed: " . $con->connect_error);
}

$sql = "INSERT INTO Sale_Vehicle (vin, _sid) 
VALUES 
(\"$VIN\", \"$SID\")";

if(mysqli_query($con, $sql)){
echo "Sale_vehicle inserted successfully.<BR>";
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
mysqli_close($con);


//Insert into Sale_Customer
$servername = getServerName();
$username = getUserName();
$password = getPassword();
$dbname = getdbName();

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
die("Connection failed: " . $con->connect_error);
}

$sql = "INSERT INTO Sale_Customer (first_name , last_name, phone_number, _sid) 
VALUES 
(\"$first\", \"$last\", \"$phone_number\", \"$SID\")";

// Check if it worked correctly
if(mysqli_query($con, $sql)){
echo "Sale_Customer inserted successfully.<BR>";
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
mysqli_close($con);



?>