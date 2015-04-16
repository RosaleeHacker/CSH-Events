<?php
//$servername = "localhost";
//$username = ;
//$password = ;
//$dbname = ;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";


//$month = mysqli_real_escape_string($conn, $_POST['month']);
//$day = mysqli_real_escape_string($conn, $_POST['day']);
//$year = mysqli_real_escape_string($conn, $_POST['year']);
$date = mysqli_real_escape_string($conn, $_POST['date']);
$category = mysqli_real_escape_string($conn, $_POST['category']);
$details = mysqli_real_escape_string($conn, $_POST['details']);
$location = mysqli_real_escape_string($conn, $_POST['location']);
$start = mysqli_real_escape_string($conn, $_POST['start']);
$end = mysqli_real_escape_string($conn, $_POST['end']);
$user = mysqli_real_escape_string($conn, $_POST['user']);
$status = mysqli_real_escape_string($conn, $_POST['status']);
$name = mysqli_real_escape_string($conn, $_POST['name']);

$sql = "INSERT INTO calendar (month, day, year, category, details, location, start, end, user, status, name) VALUES ($month, $day, $year, $category, $details, $location, $start, $end, $user, $status, $name)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "SELECT * FROM calendar WHERE month='$month' AND day='$currentDay' AND year='$year' AND status='active' ORDER BY id ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<br> $row[start] $row[name] <br>";
     }
} 
else {
     echo "0 results";
}

$conn->close();
?>