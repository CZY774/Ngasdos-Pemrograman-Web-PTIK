<?php
// require_once untuk menghindari error jika file config/Database.php tidak ditemukan
require_once 'config/Database.php';

class Mahasiswa {
    /**
     * Koneksi database
     *
     * @var object
     */
    private $conn;
    
    /**
     * Nama tabel
     *
     * @var string
     */
    private $table = 'mahasiswa';
    
    /**
     * ID mahasiswa
     *
     * @var int
     */
    public $id;
    /**
     * NIM mahasiswa
     *
     * @var string
     */
    public $nim;
    /**
     * Nama mahasiswa
     *
     * @var string
     */
    public $nama;
    /**
     * Password mahasiswa
     *
     * @var string
     */
    public $password;
    
    /**
     * Konstruktor
     */
    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }
    
    /**
     * Login mahasiswa
     *
     * @param string $nim NIM mahasiswa
     * @param string $password Password mahasiswa
     * @return boolean
     */
    public function login($nim, $password) {
        /**
         * Escaping inputan
         */
        $nim = $this->conn->real_escape_string($nim);
        $password = $this->conn->real_escape_string($password);
        
        /**
         * Query login
         */
        $query = "SELECT * FROM " . $this->table . " WHERE nim = '$nim' AND password = MD5('$password')";
        $result = $this->conn->query($query);
        
        if ($result->num_rows > 0) {
            /**
             * Jika data ada, maka simpan ke property
             */
            $row = $result->fetch_assoc();
            $this->id = $row['id'];
            $this->nim = $row['nim'];
            $this->nama = $row['nama'];
            return true;
        }
        
        return false;
    }
    
    /**
     * Get mahasiswa by ID
     *
     * @param int $id ID mahasiswa
     * @return boolean
     */
    public function getMahasiswaById($id) {
        /**
         * Escaping inputan
         */
        $id = $this->conn->real_escape_string($id);
        
        /**
         * Query get data
         */
        $query = "SELECT * FROM " . $this->table . " WHERE id = '$id'";
        $result = $this->conn->query($query);
        
        if ($result->num_rows > 0) {
            /**
             * Jika data ada, maka simpan ke property
             */
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