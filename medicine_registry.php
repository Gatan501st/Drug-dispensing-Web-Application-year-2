<?php 
$host = "localhost";
$username = "root";
$password = "";
$database = "drug_dispensing_app";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT drug_name, drug_ID, chemical_composition, description, price, stock FROM medicine";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Drug Dispensing App - Registered Drugs</title>
</head>
<body>

<h1>Registered Drugs</h1>
<?php
session_start();

$username = $_SESSION['username']['full_name'];
echo "Welcome Pharmacist: " . $username;
?>
<table border="1">
    <tr>
        <th>Drug Name</th>
        <th>Drug ID</th>
        <th>Chemical Composition</th>
        <th>Description</th>
        <th>Price</th>
        <th>Stock</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['drug_name'] . "</td>";
            echo "<td>" . $row['drug_ID'] . "</td>";
            echo "<td>" . $row['chemical_composition'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['stock'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No drugs found.</td></tr>";
    }
    ?>
</table>
<button onclick="location.href='logout.php'">LOGOUT</button>
<button onclick="location.href='welcomepharmacist.php'" type="button">back to the pharmacist page</button>
</body>
</html>