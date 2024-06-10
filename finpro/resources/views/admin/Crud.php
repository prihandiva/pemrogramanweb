<?php
require_once 'Database.php';

class Crud
{
    private $conn;
    //new Crud() (Membuat objek baru Crud)
    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Method lainnya
    // Tambah soal (tambahSoal.php)
    public function tambahSoal($question, $id_kategori, $id_survey)
    {
        $sql = "INSERT INTO m_survey_soal (id_survey, id_kategori, no_urut, soal_jenis, soal_nama) 
                VALUES (?, ?, 1, 'pilihan', ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iis", $id_survey, $id_kategori, $question);
        return $stmt->execute();
    }

    // Edit soal (editSoal.php)
    public function editSoal($question, $id_soal)
    {
        $sql = "UPDATE m_survey_soal SET soal_nama = ? WHERE id_soal = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $question, $id_soal);
        return $stmt->execute();
    }

    // Hapus soal (hapusSoal.php)
    public function hapusSoal($question, $id_soal)
    {
        // Mulai transaksi
        $this->conn->begin_transaction();

        try {
            // Nonaktifkan pemeriksaan foreign key
            $this->conn->query("SET FOREIGN_KEY_CHECKS = 0");

            // Hapus data di tabel m_survey_soal
            $sql = "DELETE FROM m_survey_soal WHERE id_soal = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $id_soal);
            $stmt->execute();

            // Aktifkan kembali pemeriksaan foreign key
            $this->conn->query("SET FOREIGN_KEY_CHECKS = 1");

            // Commit transaksi
            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            // Rollback transaksi jika ada kesalahan
            $this->conn->rollback();
            return false;
        }
    }

    //Memapilkan jumlah responden (DashboardAdmin.php)
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
    //Tampil Maximal Jawaban (LaporanSurvey.php)
    public function tampilMaxJawaban($id_kategori)
    {
        $sqlMax = "SELECT jawaban, COUNT(*) as Jumlah FROM (
            SELECT rm.id_responden_mhs AS id_responden, rm.id_kategori, jm.jawaban, jm.id_jawaban_mhs
            FROM t_jawaban_mhs jm 
            LEFT JOIN t_responden_mhs rm ON jm.id_responden_mhs = rm.id_responden_mhs
            WHERE rm.id_kategori = $id_kategori AND jm.jawaban IS NOT NULL
            UNION 
            SELECT rd.id_responden_dosen, rd.id_kategori, jd.jawaban, jd.id_jawaban_dosen
            FROM t_jawaban_dosen jd 
            LEFT JOIN t_responden_dosen rd ON jd.id_responden_dosen = rd.id_responden_dosen
            WHERE rd.id_kategori = $id_kategori AND jd.jawaban IS NOT NULL
            UNION 
            SELECT ri.id_responden_industri, ri.id_kategori, ji.jawaban, ji.id_jawaban_industri
            FROM t_jawaban_industri ji 
            LEFT JOIN t_responden_industri ri ON ji.id_responden_industri = ri.id_responden_industri
            WHERE ri.id_kategori = $id_kategori AND ji.jawaban IS NOT NULL
            UNION 
            SELECT ro.id_responden_ortu, ro.id_kategori, jo.jawaban, jo.id_jawaban_ortu
            FROM t_jawaban_ortu jo 
            LEFT JOIN t_responden_ortu ro ON jo.id_responden_ortu = ro.id_responden_ortu
            WHERE ro.id_kategori = $id_kategori AND jo.jawaban IS NOT NULL
            UNION 
            SELECT rt.id_responden_tendik, rt.id_kategori, jt.jawaban, jt.id_jawaban_tendik
            FROM t_jawaban_tendik jt 
            LEFT JOIN t_responden_tendik rt ON jt.id_responden_tendik = rt.id_responden_tendik
            WHERE rt.id_kategori = $id_kategori AND jt.jawaban IS NOT NULL
            UNION 
            SELECT ra.id_responden_alumni, ra.id_kategori, ja.jawaban, ja.id_jawaban_alumni
            FROM t_jawaban_alumni ja 
            LEFT JOIN t_responden_alumni ra ON ja.id_responden_alumni = ra.id_responden_alumni
            WHERE ra.id_kategori = $id_kategori AND ja.jawaban IS NOT NULL
        ) AS all_responden
        GROUP BY jawaban ORDER BY Jumlah DESC LIMIT 1";
        $resultMax = $this->conn->query($sqlMax);
        $maxJawaban = $resultMax->fetch_assoc()['jawaban'];
        return $maxJawaban;
    }
    // Menampilkan kategori (LaporanSurvey.php)
    public function tampilKategori()
    {
        $sql = "SELECT id_kategori, kategori_nama FROM m_kategori";
        $result = $this->conn->query($sql);
        $kategoriList = [];
        while ($row = $result->fetch_assoc()) {
            $kategoriList[] = $row;
        }
        return $kategoriList;
    }
}
