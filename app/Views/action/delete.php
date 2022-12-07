<?php
$db = \Config\Database::connect();

$query = $db->query("DELETE FROM interco WHERE id_flow");

$query = $db->query("DELETE FROM interco WHERE id_flow = '$row->id_flow'");
