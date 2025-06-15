<?php
/**
 * Kelas untuk mengatur koneksi ke database
 */
class Database {
    /**
     * Host dari database
     * @var string
     */
    private $host = 'localhost';
    
    /**
     * Username untuk koneksi ke database
     * @var string
     */
    private $username = 'root';
    
    /**
     * Password untuk koneksi ke database
     * @var string
     */
    private $password = '';
    
    /**
     * Nama database yang akan digunakan
     * @var string
     */
    private $dbname = 'portal_mahasiswa_test';
    
    /**
     * Variabel untuk menyimpan koneksi ke database
     * @var mysqli
     */
    private $conn;
    
    /**
     * Metode untuk membuat koneksi ke database
     * @return mysqli
     */
    public function connect() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
        
        return $this->conn;
    }
    
    /**
     * Metode untuk menutup koneksi ke database
     */
    public function close() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
?>