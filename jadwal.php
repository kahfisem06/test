<?php

// Data id dan nama disimpan dalam sebuah array
$data = array(
    array("id" => 1, "nama" => "Mangga"),
    array("id" => 2, "nama" => "Apel"),
    array("id" => 3, "nama" => "Jeruk")
);

// Jika method request adalah GET dan parameter id tersedia
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    // Ambil nilai parameter id
    $id = $_GET['id'];
    
    // Cari data dengan id yang sesuai
    $result = null;
    foreach ($data as $item) {
        if ($item['id'] == $id) {
            $result = $item;
            break;
        }
    }
    
    // Jika data ditemukan, tampilkan sebagai response
    if ($result != null) {
        header('Content-Type: application/json');
        echo json_encode($result);
    }
    // Jika data tidak ditemukan, tampilkan response error
    else {
        header("HTTP/1.1 404 Not Found");
        echo "Data dengan id $id tidak ditemukan";
    }
}
// Jika method request adalah GET dan parameter id tidak tersedia
else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Tampilkan semua data sebagai response
    header('Content-Type: application/json');
    echo json_encode($data);
}
// Jika method request bukan GET, tampilkan response error
else {
    header("HTTP/1.1 400 Bad Request");
    echo "Method request tidak diizinkan";
}
?>
