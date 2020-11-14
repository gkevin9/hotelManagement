<?php
/**
 *
 */
namespace domain\kitchen\model;
class Menu
{
	private $id;
	private $nama;
	private $jenis;
	private $harga;
	private $listBahan;

	public function setId($id) {
		$this->$id = $id;
	}

	public function getId() {
		return $id;
	}

	public function setNama($nama) {
		$this->$nama = $nama;
	}

	public function getNama() {
		return $nama;
	}

	public function setJenis($jenis) {
		$this->$jenis = $jenis;
	}

	public function getJenis() {
		return $jenis;
	}

	public function setHarga($harga) {
		$this->$harga = $harga;
	}

	public function getHarga() {
		return $harga;
	}
}
?>
