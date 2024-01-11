<?php
require_once __DIR__ . '/functions/config.php';
require_once __DIR__ . '/functions/model.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Origin: *');

if (isset($_GET['limit']) && !empty($_GET['limit'])) {
  $api = new Users;
  echo $api->Select($_GET['limit']);
} else {
  echo json_encode(['message' => 'anda tersesat']);
}