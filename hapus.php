<?php
require 'config/Database.php';

$id = $_GET['id'];
$db = new Database();
$db->deletebarang($id);

header('Location: index.php');
