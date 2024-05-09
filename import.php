<?php

include __DIR__ . "/db.php";

$file_name= "files/import.csv";

if($file_handle = fopen($file_name, "r")){
    fgetcsv($file_handle);
    while ($data = fgetcsv($file_handle)) {
        $stmt= $pdo->prepare('INSERT INTO user_date (name, surname, email, age) VALUES ( :name, :surname, :email, :age)');
        $stmt->execute([
            "name"=> $data[1],
            "surname"=> $data[2],
            "email"=> $data[3],
            "age"=> $data[4],
        ]);
    }
    fclose($file_handle);
}
