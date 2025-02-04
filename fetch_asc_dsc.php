<?php
header('Content-Type: application/json');
include 'db.php';

// $column = isset($_GET['column']) ? $_GET['column'] : 'dmn_no'; // Default column
// $order = isset($_GET['order']) && $_GET['order'] === 'desc' ? 'DESC' : 'ASC'; // Default order ASC

$column = $_GET['column'];
$order = $_GET['order'];
$sql = "SELECT * FROM DOMAIN ORDER BY $column $order";

$result = mysqli_query($conn, $sql);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);
?>
