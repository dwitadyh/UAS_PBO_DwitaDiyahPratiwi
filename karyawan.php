<?php
// File: models/Karyawan.php

abstract class Karyawan {
    // Properti terenkapsulasi dengan hak akses protected
    protected $id_karyawan;
    protected $nama_karyawan;
    protected $departemen;
    protected $hariKerjaMasuk;
    protected $gajiDasarPerHari;
    protected $jenis_karyawan;

    // Constructor untuk inisialisasi data awal dari database
    public function __construct($data) {
        $this->id_karyawan      = $data['id_karyawan'];
        $this->nama_karyawan    = $data['nama_karyawan'];
        $this->departemen       = $data['departemen'];
        $this->hariKerjaMasuk   = $data['hari_kerja_masuk'];
        $this->gajiDasarPerHari = $data['gaji_dasar_per_hari'];
        $this->jenis_karyawan   = $data['jenis_karyawan'];
    }

    // Metode abstract (tanpa body/isi) yang WAJIB diimplementasikan oleh subclass
    abstract public function hitungGajiBersih();
    abstract public function tampilkanProfilKaryawan();
}