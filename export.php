<?php

include __DIR__ . "/db.php";

$stmt= $pdo->prepare('SELECT * FROM user_date');
$stmt->execute();
$users = $stmt->fetchAll();

$file_name= "files/import.csv";
$file_handle = fopen($file_name, "w");

if($users) fputcsv($file_handle, array_keys($users[0]));
foreach($users as $row){
    fputcsv($file_handle, $row);
}

fclose($file_handle);