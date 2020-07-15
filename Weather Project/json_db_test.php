<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);

$conn = new mysqli("sql202.epizy.com", "epiz_24252701", "cXReFkZL9NV", "epiz_24252701_weather");
$stmt = $conn->prepare("SELECT * FROM `$obj->table` WHERE Date = ?");
$stmt->bind_param("s", $obj->day);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>