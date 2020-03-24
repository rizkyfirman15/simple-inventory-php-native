<?php 

// panggil file yang dibutuhkan
require_once 'session.php';
require_once 'koneksi.php';
require_once 'functions.php';

if(isset($_POST['simpan'])){
	  $nama_toko = $_POST['nama_toko'];
    $pemilik_toko = $_POST['pemilik_toko'];
    $alamat_toko = $_POST['alamat_toko'];
    $tahun_berdiri = $_POST['tahun_berdiri'];

    $query = mysqli_query($koneksi, "UPDATE tbl_toko SET nama_toko = '$nama_toko', pemilik_toko = '$pemilik_toko', alamat_toko = '$alamat_toko', tahun_berdiri = '$tahun_berdiri' WHERE id = 1");

    if($query){
    	set_flash_message('sukses', 'Data berhasil diubah!');
		header('Location: dashboard.php');
    } else die('gagal'. mysqli_error($koneksi));
}


?>