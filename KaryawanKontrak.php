<?php
// File: models/KaryawanKontrak.php
require_once __DIR__ . '/Karyawan.php';

class KaryawanKontrak extends Karyawan {
    // Properti tambahan spesifik untuk Karyawan Kontrak
    protected $durasiKontrakBulan;
    protected $agensiPenyalur;

    public function __construct($data) {
        // Memanggil constructor dari kelas induk (Karyawan)
        parent::__construct($data);
        // Inisialisasi properti spesifik anak (jika null, diberikan default)
        $this->durasiKontrakBulan = $data['durasi_kontrak_bulan'] ?? 0;
        $this->agensiPenyalur     = $data['agensi_penyalur'] ?? '-';
    }

    // Metode query bersyarat (WHERE) untuk mengambil data dari database
    public static function ambilSemua($db) {
        $query = "SELECT * FROM tabel_karyawan WHERE jenis_karyawan = 'kontrak'";
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
        return "Kontrak [" . $this->durasiKontrakBulan . " Bulan via " . $this->agensiPenyalur . "]";
    }
}