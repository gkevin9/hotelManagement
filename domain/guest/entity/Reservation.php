<?php
namespace domain\guest\entity;

Class Reservation{
  private $id;
  private $bykOrang;
  private $kamar;
  private $lama;
  private $nama;
  private $namaPemesan;
  private $nomorTelepon;
  private $status;
  private $tanggalCheckIn;

  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }

  public function setBykOrang($bykOrang) {
    $this->bykOrang = $bykOrang;
  }

  public function getBykOrang() {
    return $this->bykOrang;
  }

  public function setKamar($kamar) {
    $this->kamar = $kamar;
  }

  public function getKamar() {
    return $this->kamar;
  }

  public function setLama($lama) {
    $this->lama = $lama;
  }

  public function getLama() {
    return $this->lama;
  }

  public function setNama($nama) {
    $this->nama= $nama;
  }

  public function getNama() {
    return $this->nama;
  }

  public function setNamaPemesan($namaPemesan) {
    $this->namaPemesan=$namaPemesan;
  }

  public function getNamaPemesan() {
    return $this->namaPemesan;
  }

  public function setNomorTelepon($nomorTelepon) {
    $this->nomorTelepon=$nomorTelepon;
  }

  public function getNomorTelepon() {
    return $this->nomorTelepon;
  }

  public function setStatus($status) {
    $this->status=$status;
  }

  public function getStatus() {
    return $this->status;
  }

  public function setTanggalCheckIn($tanggalCheckIn) {
    $this->tanggalCheckIn=$tanggalCheckIn;
  }

  public function getTanggalCheckIn() {
    return $this->tanggalCheckIn;
  }
}
?>
