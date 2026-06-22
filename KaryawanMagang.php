<?php
// File: models/KaryawanMagang.php
require_once __DIR__ . '/Karyawan.php';

class KaryawanMagang extends Karyawan {
    // Properti tambahan spesifik untuk Karyawan Magang
    protected $uangSakuBulanan;
    protected $sertifikatKampusMerdeka;

    public function __construct($data) {
        // Memanggil constructor dari kelas induk (Karyawan)
        parent::__construct($data);
        // Inisialisasi properti spesifik anak
        $this->uangSakuBulanan         = $data['uang_saku_bulanan'] ?? 0;
        $this->sertifikatKampusMerdeka = $data['sertifikat_kampus_merdeka'] ?? '-';
    }

    // Metode query bersyarat (WHERE) untuk mengambil data dari database
    public static function ambilSemua($db) {
        $query = "SELECT * FROM tabel_karyawan WHERE jenis_karyawan = 'magang'";
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
        return "Magang [Uang Saku: Rp" . number_format($this->uangSakuBulanan, 0, ',', '.') . " | " . $this->sertifikatKampusMerdeka . "]";
    }
}