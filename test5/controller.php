<?php

@session_start();

$playerList = [];

if (!empty($_SESSION['numId'])) {
    $numId = $_SESSION['numId'];
} else {
    $numId = 1;
}

$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (isset($data)) {
    foreach ($data as $player){
        $playerList[] = ['id' => $numId++, 'name' => $player, 'score' => rand(1, 100)];
    }
}

$_SESSION['numId'] = $numId;

$json = json_encode($playerList, JSON_UNESCAPED_UNICODE);
header('Content-Type: application/json');

echo $json;
exit();
