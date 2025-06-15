<?php
require_once 'config/Database.php';

class Mahasiswa {
    private $conn;
    private $table = 'mahasiswa';
    public $id; // Auto increment
    public $nim;
    public $nama;
    public $password;
    
    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function login($nim, $password) {
        $nim = $this->conn->real_escape_string($nim);
        $password = $this->conn->real_escape_string($password);

        $query = "SELECT * FROM " . $this->table . " WHERE nim = '$nim' AND password = '$password'";
        // Kalau dieksekusi, querynya harusnya seperti ini:
        // SELECT * FROM mahasiswa WHERE nim = '672022204' AND password = 'admin'
        
        // Ini untutk mengeksekusi query
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $this->id = $row['id'];
            $this->nim = $row['nim'];
            $this->nama = $row['nama'];

            return true;
        }
        return false;
    }

    public function getMahasiswaById($id) {
        $id = $this->conn->real_escape_string($id);
        $query = "SELECT * FROM " . $this->table . " WHERE id = '$id'";

        if ($result->num_rows >0) {
        $row = $result->fetch_assoc();
            $this->id = $row['id'];
            $this->nim = $row['nim'];
            $this->nama = $row['nama'];

            return true;
        }
        return false;
    }
}
?>