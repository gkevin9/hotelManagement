<?php 
namespace domain\humanresource\model;

class NewStaffModel {
	private $email;
	private $nama;
	private $nomor_hp;
	private $password;
	private $pekerjaan;
	private $status;

	public function setEmail($email) {
		$this->email = $email;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setNama($nama) {
		$this->nama = $nama;
	}

	public function getNama() {
		return $this->nama;
	}

	public function setNomorHp($nomor_hp) {
		$this->nomor_hp = $nomor_hp;
	}

	public function getNomorHp() {
		return $this->nomor_hp;
	}

	public function setPassword($password) {
		$this->password = $password;
	}

	public function getPassword() {
		return $this->password;
	}

	public function setPekerjaan($pekerjaan) {
		$this->pekerjaan = $pekerjaan;
	}

	public function getPekerjaan() {
		return $this->pekerjaan;
	}

	public function setStatus($status) {
		$this->status = $status;
	}

	public function getStatus() {
		return $this->status;
	}
}

?>