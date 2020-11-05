<?php
/**
 * Kevin
 */
namespace domain\kitchen\entity;
class Bahan
{
	private $id;
	private $nama;
	private $harga;
	private $jumlah;
	private $exp_date;

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

	public function setHarga($harga) {
		$this->$harga = $harga;
	}

	public function getHarga() {
		return $harga;
	}

	public function setJumlah($jumlah) {
		$this->$jumlah = $jumlah;
	}

	public function getJumlah() {
		return $jumlah;
	}

	public function setExpDate($exp_date) {
		$this->$exp_date = $exp_date;
	}

	public function getExpDate() {
		return $exp_date;
	}
}
?>
