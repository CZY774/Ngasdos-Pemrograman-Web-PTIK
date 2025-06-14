<?php
// require_once untuk menghindari error jika file config/Database.php tidak ditemukan
require_once 'config/Database.php';

class MataKuliah {
    /**
     * Object connection database
     * @var Object
     */
    private $conn;
    
    /**
     * Nama table database
     * @var String
     */
    private $table = 'mata_kuliah';
    
    /**
     * Properties object
     * @var String
     */
    public $id;
    public $kode_mk;
    public $nama_mk;
    public $sks;
    public $semester;
    public $dosen;
    public $mahasiswa_id;
    
    /**
     * Constructor
     */
    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }
    
    /**
     * Buat mata kuliah baru
     * @return boolean
     */
    public function create() {
        $kode_mk = $this->conn->real_escape_string($this->kode_mk);
        $nama_mk = $this->conn->real_escape_string($this->nama_mk);
        $sks = $this->conn->real_escape_string($this->sks);
        $semester = $this->conn->real_escape_string($this->semester);
        $dosen = $this->conn->real_escape_string($this->dosen);
        $mahasiswa_id = $this->conn->real_escape_string($this->mahasiswa_id);
        
        $query = "INSERT INTO " . $this->table . " 
                  (kode_mk, nama_mk, sks, semester, dosen, mahasiswa_id) 
                  VALUES ('$kode_mk', '$nama_mk', '$sks', '$semester', '$dosen', '$mahasiswa_id')";
        
        if ($this->conn->query($query)) {
            return true;
        }
        
        return false;
    }
    
    /**
     * Baca semua mata kuliah berdasarkan mahasiswa
     * @param String $mahasiswa_id
     * @return Object
     */
    public function readByMahasiswa($mahasiswa_id) {
        $mahasiswa_id = $this->conn->real_escape_string($mahasiswa_id);
        
        $query = "SELECT * FROM " . $this->table . " WHERE mahasiswa_id = '$mahasiswa_id' ORDER BY created_at DESC";
        $result = $this->conn->query($query);
        
        return $result;
    }
    
    /**
     * Baca mata kuliah berdasarkan id
     * @param String $id
     * @return boolean
     */
    public function readSingle($id) {
        $id = $this->conn->real_escape_string($id);
        
        $query = "SELECT * FROM " . $this->table . " WHERE id = '$id'";
        $result = $this->conn->query($query);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $this->id = $row['id'];
            $this->kode_mk = $row['kode_mk'];
            $this->nama_mk = $row['nama_mk'];
            $this->sks = $row['sks'];
            $this->semester = $row['semester'];
            $this->dosen = $row['dosen'];
            $this->mahasiswa_id = $row['mahasiswa_id'];
            return true;
        }
        
        return false;
    }
    
    /**
     * Ubah mata kuliah
     * @return boolean
     */
    public function update() {
        $kode_mk = $this->conn->real_escape_string($this->kode_mk);
        $nama_mk = $this->conn->real_escape_string($this->nama_mk);
        $sks = $this->conn->real_escape_string($this->sks);
        $semester = $this->conn->real_escape_string($this->semester);
        $dosen = $this->conn->real_escape_string($this->dosen);
        $id = $this->conn->real_escape_string($this->id);
        $mahasiswa_id = $this->conn->real_escape_string($this->mahasiswa_id);
        
        $query = "UPDATE " . $this->table . " 
                  SET kode_mk = '$kode_mk', nama_mk = '$nama_mk', sks = '$sks', 
                      semester = '$semester', dosen = '$dosen' 
                  WHERE id = '$id' AND mahasiswa_id = '$mahasiswa_id'";
        
        if ($this->conn->query($query)) {
            return true;
        }
        
        return false;
    }
    
    /**
     * Hapus mata kuliah
     * @param String $id
     * @param String $mahasiswa_id
     * @return boolean
     */
    public function delete($id, $mahasiswa_id) {
        $id = $this->conn->real_escape_string($id);
        $mahasiswa_id = $this->conn->real_escape_string($mahasiswa_id);
        
        $query = "DELETE FROM " . $this->table . " WHERE id = '$id' AND mahasiswa_id = '$mahasiswa_id'";
        
        if ($this->conn->query($query)) {
            return true;
        }
        
        return false;
    }
}
?>