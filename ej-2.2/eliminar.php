<?php

require "db.php";

$db = getDB();
$id = $_GET["id"];

$stmt = $db->prepare("DELETE FROM productos WHERE id = ?");
$stmt->execute([$id]);

header("Location: index.php");
exit;