<?php

$servername = "localhost";
$username = 'root';
$password = '';
$dbname = 'megatravel';
//establishes connection to database/localhost
$conn = new mysqli($servername, $username, $password, $dbname);

//error message if connection is not established
if ($conn->connect_error) {
    die("Failed to Connect: " . $conn->connect_error);
}

//insert statement into reservations table
$sql = "INSERT INTO reservations (name, email, phone, adultsNo, children, city, activity, traveldate)
VALUES ('{$_POST['name']}', '{$_POST['email']}','{$_POST['phone']}','{$_POST['adultsNo']}', '{$_POST['children']}',
 '{$_POST['city']}', '{$_POST['activity']}', '{$_POST['traveldate']}')";

//outputs message if data is inputted successfully, error if not
if ($conn->query($sql) === TRUE) {
    echo "<br><br>Your information has successfully been inserted into the database!<br>";
} else {
    echo "<br>Error: " . $sql . "<br>" . $conn->error;
}
//select statement that pulls the information entered from the reservations and puts data into a simple table
$sql = "SELECT * FROM reservations";
$result = mysqli_query($conn, $sql);
echo "<table border='3'>";
echo "<tr>";
echo "<td style='text-align: center; font-weight: bold'>Full Name</td>",
"<td style='text-align: center; font-weight: bold'>Email Address</td>",
"<td style='text-align: center; font-weight: bold'>Phone Number</td>",
"<td style='text-align: center; font-weight: bold'>Adults</td>",
"<td style='text-align: center; font-weight: bold'>Children</td>",
"<td style='text-align: center; font-weight: bold'>City</td>",
"<td style='text-align: center; font-weight: bold'>Activity</td>",
"<td style='text-align: center; font-weight: bold'>Date</td>";
echo "</tr>";

while ($row = mysqli_fetch_assoc($result)) { 
    echo "<tr>";
    foreach ($row as $field => $value) { 
        echo "<td>" . $value . "</td>"; 
    }
    echo "</tr>";
}

echo "</table>";


$conn->close();

?>
