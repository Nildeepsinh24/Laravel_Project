<?php
$db = new PDO('sqlite:database/database.sqlite');
$result = $db->query("SELECT name FROM sqlite_master WHERE type='table' ORDER BY name");
echo "Tables in database:\n";
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "- " . $row['name'] . "\n";
}
?>
