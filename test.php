<?php

$arr = [
    ['msg' => 'Hello', 'sender_id' => 1, 'date' => '15-06-2024'],
    ['msg' => 'Hi', 'sender_id' => 1, 'date' => '15-06-2024'],
    ['msg' => 'ok', 'sender_id' => 1, 'date' => '15-06-2024'],
    ['msg' => 'whats up', 'sender_id' => 1, 'date' => '16-06-2024'],
    ['msg' => 'yes', 'sender_id' => 1, 'date' => '17-06-2024'],
    ['msg' => 'no', 'sender_id' => 1, 'date' => '17-06-2024'],

];
$msg_arr = [];

foreach ($arr as $message) {

     $msg_arr[$message['date']][] = $message;
    
}

echo '<pre>';
print_r($msg_arr);
echo '</pre>';

