<?php
/**
 *
 */
namespace domain\kitchen\entity;
class Menu
{
	private $id;
	private $nama;
	private $jenis;
	private $harga;

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

	public function setJenis($jenis) {
		$this->jenis = $jenis;
	}

	public function getJenis() {
		return $this->jenis;
	}

	public function setHarga($harga) {
		$this->harga = $harga;
	}

	public function getHarga() {
		return $this->harga;
	}
}
?>
