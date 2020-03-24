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
	$nama_customer = $_POST['nama_customer'];
	$alamat_customer = $_POST['alamat_customer'];
	$agama = $_POST['agama'];

	$query = mysqli_query($koneksi, "INSERT INTO tbl_customer (nama_customer, alamat_customer, agama) VALUES ('$nama_customer', '$alamat_customer', '$agama')");

	if($query){
		set_flash_message('sukses', 'Data berhasil ditambahkan!');
		header('Location: index.php');
	} else die('gagal!' . mysqli_error($koneksi));
} else {
	header('Location: tambah.php');
}

?>