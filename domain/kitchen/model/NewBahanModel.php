<?php
/**
 * Kevin
 */
namespace domain\kitchen\model;
class NewBahanModel
{
	private $id;
	private $nama;
	private $harga;
	private $jumlah;
	private $exp_date;

	public function setId($id) {
		$this->id = $id;
	}

	public function getId() {
		return $this->id;
	}

	public function setNama($nama) {
		$this->nama = $nama;
	}

	public function getNama() {
		return $this->nama;
	}

	public function setHarga($harga) {
		$this->harga = $harga;
	}

	public function getHarga() {
		return $this->harga;
	}

	public function setJumlah($jumlah) {
		$this->jumlah = $jumlah;
	}

	public function getJumlah() {
		return $this->jumlah;
	}

	public function setExpDate($exp_date) {
		$this->exp_date = $exp_date;
	}

	public function getExpDate() {
		return $this->exp_date;
	}
}
?>
