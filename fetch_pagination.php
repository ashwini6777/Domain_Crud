<?php
include 'db.php'; 
header('Content-Type: application/json');

// Records per page
$limit = 5; 
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$start = ($page - 1) * $limit;

// Fetch total records
$total_result = $conn->query("SELECT COUNT(*) AS total FROM DOMAIN");
if (!$total_result) {
    echo json_encode(["error" => "Error fetching total records"]);
    exit;
}
$total_row = $total_result->fetch_assoc();
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $limit);

// Fetch paginated data
$sql = "SELECT * FROM DOMAIN ORDER BY dmn_no DESC LIMIT $start, $limit";
$result = $conn->query($sql);

$rows = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
} else {
    echo json_encode(["error" => "Error fetching records"]);
    exit;
}

// Return JSON response
echo json_encode([
    "data" => $rows, 
    "total_pages" => $total_pages, 
    "current_page" => $page
]);

$conn->close();
?>
