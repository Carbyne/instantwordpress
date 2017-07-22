<?php
mysqli_report(MYSQLI_REPORT_STRICT);
try {
    $mysqli = new mysqli("db","root","root","wordpress");
} catch (Exception $e) {
	fwrite(STDOUT,"connection_error");
	exit();
}
$siteurl = $mysqli->query("SELECT option_value FROM wp_options WHERE option_name='siteurl' limit 1")->fetch_assoc()["option_value"];
$mysqli->close();
fwrite(STDOUT,"$siteurl");
?>