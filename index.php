<?php
// File: index.php

require_once __DIR__ . '/config/Koneksi.php';
require_once __DIR__ . '/Karyawan.php';
require_once __DIR__ . '/KaryawanTetap.php';
require_once __DIR__ . '/KaryawanKontrak.php';
require_once __DIR__ . '/KaryawanMagang.php';

$database = new Database();
$db = $database->getConnection();

$daftarKaryawanTetap   = KaryawanTetap::ambilSemua($db);
$daftarKaryawanKontrak = KaryawanKontrak::ambilSemua($db);
$daftarKaryawanMagang  = KaryawanMagang::ambilSemua($db);

$kategoriJabatan = [
    'Karyawan Tetap' => $daftarKaryawanTetap,
    'Karyawan Kontrak' => $daftarKaryawanKontrak,
    'Karyawan Magang' => $daftarKaryawanMagang
];

function ambilPropertiProtected($objek, $namaProperti) {
    try {
        $refleksi = new ReflectionProperty($objek, $namaProperti);
        $refleksi->setAccessible(true);
        return $refleksi->getValue($objek);
    } catch (ReflectionException $e) {
        return '-';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Manajemen Penggajian Karyawan</title>
</head>
<body style="font-family: 'Times New Roman', Times, serif; background-color: #f4f6f9; color: #333; margin: 0; padding: 40px;">

    <div style="text-align: center; margin-bottom: 40px; border-bottom: 3px double #333; padding-bottom: 20px;">
        <h1 style="margin: 0; font-size: 28px; text-transform: uppercase; letter-spacing: 1px;">Sistem Informasi Eksekutif</h1>
        <p style="margin: 5px 0 0 0; font-style: italic; color: #666;">Rekapitulasi Slip Kompensasi dan Profil Spesifik Karyawan Berbasis OOP & Polimorfisme</p>
    </div>

    <?php foreach ($kategoriJabatan as $namaKelompok => $listKaryawan): ?>
        
        <div style="margin-bottom: 50px;">
            <h2 style="background-color: #222; color: #fff; padding: 10px 20px; border-radius: 4px; font-size: 20px; letter-spacing: 0.5px; margin-bottom: 20px;">
                📂 Kategori: <?php echo $namaKelompok; ?> 
                <span style="font-size: 14px; font-weight: normal; float: right; font-style: italic; margin-top: 4px;">
                    Total: <?php echo count($listKaryawan); ?> Personel
                </span>
            </h2>

            <?php if (empty($listKaryawan)): ?>
                <p style="font-style: italic; color: #888; padding-left: 20px;">Tidak ada data karyawan pada kategori ini.</p>
            <?php else: ?>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 20px;">
                    
                    <?php foreach ($listKaryawan as $karyawan): ?>
                        <?php 
                        $idKaryawan       = ambilPropertiProtected($karyawan, 'id_karyawan');
                        $namaKaryawan     = ambilPropertiProtected($karyawan, 'nama_karyawan');
                        $departemen       = ambilPropertiProtected($karyawan, 'departemen');
                        $hariKerja        = ambilPropertiProtected($karyawan, 'hariKerjaMasuk');
                        $gajiDasar        = ambilPropertiProtected($karyawan, 'gajiDasarPerHari');
                        ?>
                        <div style="background-color: #fff; border: 1px solid #ccc; border-radius: 8px; padding: 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
                            
                            <div style="border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 12px;">
                                <span style="font-size: 11px; background-color: #e0e0e0; padding: 3px 6px; border-radius: 4px; font-weight: bold; letter-spacing: 0.5px;">
                                    ID: <?php echo htmlspecialchars($idKaryawan); ?>
                                </span>
                                <h3 style="margin: 8px 0 2px 0; font-size: 18px; color: #111;">
                                    <?php echo htmlspecialchars($namaKaryawan); ?>
                                </h3>
                                <p style="margin: 0; font-size: 13px; color: #777; font-style: italic;">
                                    Departemen: <?php echo htmlspecialchars($departemen); ?>
                                </p>
                            </div>

                            <div style="font-size: 14px; line-height: 1.6; color: #444;">
                                <div style="margin-bottom: 8px;">
                                    • Kehadiran: <strong><?php echo htmlspecialchars($hariKerja); ?> Hari</strong><br>
                                    • Rate Harian: <strong>Rp<?php echo number_format($gajiDasar, 0, ',', '.'); ?></strong>
                                </div>

                                <div style="background-color: #f9f9f9; border-left: 3px solid #333; padding: 8px 12px; margin-bottom: 15px; font-size: 13px; border-radius: 0 6px 6px 0;">
                                    <strong>Atribut Spesifik:</strong><br>
                                    <?php echo $karyawan->tampilkanProfilKaryawan(); ?>
                                </div>

                                <div style="margin-top: 15px; padding-top: 10px; border-top: 1px dashed #ddd; text-align: right;">
                                    <span style="font-size: 12px; color: #666; display: block; margin-bottom: 2px;">Take Home Pay (Gaji Bersih):</span>
                                    <strong style="font-size: 20px; color: #2e7d32; font-family: monospace;">
                                        Rp<?php echo number_format($karyawan->hitungGajiBersih(), 0, ',', '.'); ?>
                                    </strong>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            <?php endif; ?>
        </div>

    <?php endforeach; ?>

    <div style="text-align: center; margin-top: 60px; font-size: 12px; color: #888; border-top: 1px solid #ddd; padding-top: 20px;">
        Sistem Manajemen Penggajian Otomatis &bull; Hak Cipta Terindungi &copy; 2026
    </div>

</body>
</html>