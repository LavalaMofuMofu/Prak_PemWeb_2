
<?php
function koneksiDatabase() {
    $host = "sql305.infinityfree.com"; 
    $username = "if0_41976100";  
    $password = "uZGwKd5ZMDt0H";      
    $database = "if0_41976100_prak501"; 

    try {
        $conn = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        die("Koneksi ke database gagal: " . $e->getMessage());
    }
}
?>