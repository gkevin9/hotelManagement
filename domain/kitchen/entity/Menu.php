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
	private $bahan;

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

	/**
	 * Get the value of bahan
	 */ 
	public function getBahan()
	{
		return $this->bahan;
	}

	/**
	 * Set the value of bahan
	 *
	 * @return  self
	 */ 
	public function setBahan($bahan)
	{
		$this->bahan = $bahan;

		return $this;
	}
}
?>
