    
$servername = "localhost";
$username = 'root';
$password = '';
$dbname = 'megaTravel';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Failed to Connect: " . $conn->connect_error);
}

$sql = "CREATE DATABASE megaTravel";
if ($conn->query($sql) === TRUE) {
    echo "Database created!";
} else {
    echo "A problem occurred creating your database. Try again!: " . $conn->error;
}

$sql = "INSERT INTO reservations (name, email, phone, adultsno, children, city, activity, date)
VALUES ('{$_POST['name']}', '{$_POST['email']}','{$_POST['phone']}','{$_POST['adultsno']}', '{$_POST['children']}',
 {$_POST['city']}', '{$_POST['activity]}', '{$_POST['date']} )";

if ($conn->query($sql) === TRUE) {
    echo "<br><br>Success!<br>";
} else {
    echo "<br>Error: " . $sql . "<br>" . $conn->error;
}

$sql = "SELECT * FROM reservations";
$result = mysqli_query($conn, $sql);
echo "<br>";
echo "<table border='3'>";
echo "<tr>";
echo "<td style='text-align: center;'>ID</td>", 
<td style='text-align: center;'>name</td>",<td style='text-align: center;'>email</td>",
<td style='text-align: center;'>phone</td>",<td style='text-align: center;'>adultsno</td>",
"<td style='text-align: center;'>children</td>",<td style='text-align: center;'>city</td>",
"<td style='text-align: center;'>activity</td>", "<td style='text-align: center;'>date</td>";
echo "</tr>";

}

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
