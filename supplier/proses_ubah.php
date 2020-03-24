<?php 

// panggil file yang dibutuhkan
require_once '../session.php';
require_once '../koneksi.php';
require_once '../functions.php';

if (!isset($_SESSION['auth'])) {
	set_flash_message('gagal', 'Anda harus login dulu!');
	header('Location: login.php');
}

if(isset($_POST['simpan'])){
	// print_r($_POST);
	$kode_supplier = $_POST['kode_supplier'];
	$nama_supplier = $_POST['nama_supplier'];
	$alamat_supplier = $_POST['alamat_supplier'];
	$id = $_GET['id'];

	$query = mysqli_query($koneksi, "UPDATE tbl_supplier SET kode_supplier = $kode_supplier, nama_supplier = '$nama_supplier', alamat_supplier = '$alamat_supplier' WHERE id = $id");

	if($query){
		set_flash_message('sukses', 'Data berhasil diubah!');
		header('Location: index.php');
	} else die('gagal!' . mysqli_error($koneksi));
} else {
	header('Location: tambah.php');
}

?>