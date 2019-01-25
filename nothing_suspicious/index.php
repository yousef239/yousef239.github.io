<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test2"; 

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, name, password FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	echo "<table border = 1><tr><td>ID</td><td>Name</td><td>Password</td></tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>$row[id]</td><td>$row[name]</td><td>$row[password]</td></tr>";
    }
	echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($conn);
?>