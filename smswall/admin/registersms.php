<?php

include('init_db.php');

$title = "";
$link = "SMS";
$content = strip_tags($_GET['text']);
$temp = strip_tags($_GET['org']);
if(!strcmp($temp,'enof')){
	$title = "&of";
	$link = "WEB";
}
$timestamp = time();
$modo_type = $config['modo_type'];
$etat_bulle = $config['bulle'];
//$db->exec('INSERT INTO "items" VALUES(NULL,'.$db->quote($title).','.$db->quote($link).','.$db->quote($content).','.$timestamp.','.$modo_type.');');
$db->exec('INSERT INTO "items" VALUES(NULL,'.$db->quote($title).','.$db->quote($link).','.$db->quote($content).','.$timestamp.','.$modo_type.','.$etat_bulle.',NULL);');
?>