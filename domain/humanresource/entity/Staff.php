<?php
/**
 *
 */
namespace domain\humanresource\entity;
class Staff {
	private $id;
	private $email;
	private $nama;
	private $nomor_hp;
	private $password;
	private $pekerjaan;
	private $status;

	public function setId($id) {
		$this->$id = $id;
	}

	public function getId() {
		return $id;
	}

	public function setEmail($email) {
		$this->$email = $email;
	}

	public function getEmail() {
		return $email;
	}

	public function setNama($nama) {
		$this->$nama = $nama;
	}

	public function getNama() {
		return $nama;
	}

	public function setNomorHp($nomor_hp) {
		$this->$nomor_hp = $nomor_hp;
	}

	public function getNomorHp() {
		return $nomor_hp;
	}

	public function setPassword($password) {
		$this->$password = $password;
	}

	public function getPassword() {
		return $password;
	}

	public function setPekerjaan($pekerjaan) {
		$this->$pekerjaan = $pekerjaan;
	}

	public function getPekerjaan() {
		return $pekerjaan;
	}

	public function setStatus($status) {
		$this->$status = $status;
	}

	public function getStatus() {
		return $status;
	}
}
?>
