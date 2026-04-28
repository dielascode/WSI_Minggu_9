<?php
class Barang{
    private $conn;
    private $table = "barangs";

    public function __construct($db)
    {
        $this->conn = $db;
    } 

    // Read

    public function getBarang(){
        return $this->conn->query("SELECT * FROM $this->table");
    }

    // Create

    public function store($data){
        $stmt = $this->conn->prepare ("INSERT INTO $this->table(nama_barang, deskripsi, stok, harga) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii", $data['nama_barang'], $data['deskripsi'], $data['stok'], $data['harga']);
        return $stmt->execute();
    }

    // Update

    public function update($id, $data){
        $stmt = $this->conn->prepare ("UPDATE $this->table SET nama_barang=?, deskripsi=?, stok=?, harga=? WHERE id=?");
        $stmt->bind_param("ssiii", $data['nama_barang'], $data['deskripsi'], $data['stok'], $data['harga'], $id);
        return $stmt->execute();
    }

    // Delete

    public function delete($id){
        $stmt = $this->conn->prepare ("DELETE FROM $this->table WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>