<?php
// File: models/KaryawanTetap.php
require_once __DIR__ . '/Karyawan.php';

class KaryawanTetap extends Karyawan {
    // Properti tambahan spesifik untuk Karyawan Tetap
    protected $tunjanganKesehatan;
    protected $opsiSahamId;

    public function __construct($data) {
        // Memanggil constructor dari kelas induk (Karyawan)
        parent::__construct($data);
        // Inisialisasi properti spesifik anak
        $this->tunjanganKesehatan = $data['tunjangan_kesehatan'] ?? 0;
        $this->opsiSahamId        = $data['opsi_saham_id'] ?? '-';
    }

    // Metode query bersyarat (WHERE) untuk mengambil data dari database
    public static function ambilSemua($db) {
        $query = "SELECT * FROM tabel_karyawan WHERE jenis_karyawan = 'tetap'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $daftarKaryawan = [];
        while ($row = $stmt->fetch()) {
            $daftarKaryawan[] = new self($row);
        }
        return $daftarKaryawan;
    }

    // Kewajiban implementasi metode dari kelas abstrak induk
    public function hitungGajiBersih() {
        // Logika bisnis lengkap akan di-override di Tahap 5
        return 0;
    }

    public function tampilkanProfilKaryawan() {
        // Mengembalikan informasi profil spesifik untuk polimorfisme di Tahap 6
        return "Tetap [Tunjangan: Rp" . number_format($this->tunjanganKesehatan, 0, ',', '.') . " | Saham ID: " . $this->opsiSahamId . "]";
    }
}