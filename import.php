<?php

include __DIR__ . "/db.php";


if (isset($_FILES["uploaded_file"]) && $_FILES["uploaded_file"]["type"] === 'text/csv' && $_FILES["uploaded_file"]["size"] < 360) {

$file_name=$_FILES["uploaded_file"]["tmp_name"];

if($file_handle = fopen($file_name, "r")){
    fgetcsv($file_handle);
    while ($data = fgetcsv($file_handle)) {
        $stmt= $pdo->prepare('INSERT INTO user_date (name, surname, email, age) VALUES ( :name, :surname, :email, :age)');
        $stmt->execute([
            "name"=> $data[1],
            "surname"=> $data[2],
            "email"=> $data[3],
            "age"=> $data[4]?: null,
        ]);
    }
    fclose($file_handle);
}
} else {
    echo "File CVS non caricato";
}

$uploads_dir = 'uploads/';
$extension = strtolower(pathinfo($_FILES["profile_image"]["name"], PATHINFO_EXTENSION));
if (isset($_FILES["profile_image"]) && explode('/', $_FILES["profile_image"]["type"])[0] === 'image' && $_FILES["profile_image"]["size"] < 1024 * 1024) {
    $new_name = rand(100000, 9999999) . '.' . $extension;
    // $new_name = '1393922.png';
    $dir_list = scandir($uploads_dir);
    while (true) {
        // verificare se il nome nuovo con l'estensione esiste già
        // se non esiste già usalo
        // altrimenti creare uno nuovo
        if (!in_array($new_name, $dir_list)) break;
        $new_name = rand(100000, 9999999) . '.' . $extension;
    }

    // copiare l'immagine nella cartella delle immagini
    move_uploaded_file($_FILES["profile_image"]["tmp_name"], $uploads_dir . $new_name);

    // caricare nel database il nome dell'immagine     
} else {
    echo 'Immagine non caricata';
}

