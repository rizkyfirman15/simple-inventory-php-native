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
	$kode_barang = $_POST['kode_barang'];
	$nama_barang = $_POST['nama_barang'];
	$stok_barang = $_POST['stok_barang'];
	$jenis_barang = $_POST['jenis_barang'];
	$id = $_GET['id'];

	$query = mysqli_query($koneksi, "UPDATE tbl_barang SET kode_barang = '$kode_barang', nama_barang = '$nama_barang', stok_barang = $stok_barang, jenis_barang = '$jenis_barang' WHERE id = $id");

	if($query){
		set_flash_message('sukses', 'Data berhasil diubah!');
		header('Location: index.php');
	} else die('gagal!' . mysqli_error($koneksi));
} else {
	header('Location: tambah.php');
}

?>