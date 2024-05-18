<?php
require_once 'Database.php';

class Crud
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Tambah soal
    public function tambahSoal($question, $id_kategori,$id_survey)
    {        
        $sql = "INSERT INTO m_survey_soal (id_survey, id_kategori, no_urut, soal_jenis, soal_nama) 
                VALUES (?, ?, 1, 'pilihan', ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iis",$id_survey, $id_kategori, $question);
        return $stmt->execute();
    }

    // Edit soal
    public function editSoal($question, $id_soal)
    {

        $sql = "UPDATE m_survey_soal SET soal_nama = ? WHERE id_soal = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $question, $id_soal);
        return $stmt->execute();
    }

    // Method lainnya
    public function tampilJumlah($id_survey)
    {
        // Pastikan objek koneksi telah didefinisikan dengan benar
        if (!$this->conn) {
            return false;
        }

        switch ($id_survey) {
            case 1:
                $table = 't_responden_mhs';
                break;
            case 2:
                $table = 't_responden_dosen';
                break;
            case 3:
                $table = 't_responden_ortu';
                break;
            case 4:
                $table = 't_responden_tendik';
                break;
            case 5:
                $table = 't_responden_industri';
                break;
            case 6:
                $table = 't_responden_alumni';
                break;
            default:
                return false; // Id survey tidak valid
        }

        $sql = "SELECT COUNT(DISTINCT responden_nama) AS jumlah_responden FROM $table";
        $result = $this->conn->query($sql);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['jumlah_responden'];
        } else {
            // Menangani kesalahan eksekusi query
            echo "Error: " . $this->conn->error;
            return false;
        }
    }
    public function rataRata()
    {
    }
}
