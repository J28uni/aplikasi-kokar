<?php
require_once "../db/db.php";

$query = $db->query("SELECT nama, COUNT(*) AS total_absen FROM peta GROUP BY nama");
echo json_encode($query->fetchAll());