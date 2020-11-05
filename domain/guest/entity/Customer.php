<?php
namespace domain\guest\entity;

Class Customer{
      private $id;
      private $nama;
      private $nomorIdentitas;
      private $nomorKendaraan;
      private $nomorTelepon;

      public function setId($id) {
        $this->id=$id;
      }

      public function getId() {
        return $this->id;
      }

      public function setNama($nama) {
        $this->nama=$nama;
      }

      public function getNama() {
        return $this->nama;
      }

      public function setNomorIdentitas($nomorIdentitas) {
        $this->nomorIdentitas = $nomorIdentitas;
      }

      public function getNomorIdentitas() {
        return $this->nomorIdentitas;
      }

      public function setNomorKendaraan($nomorKendaraan) {
        $this->nomorKendaraaan = $nomorKendaraan;
      }

      public function getNomorKendaraan() {
        return $this->nomorKendaraaan;
      }

      public function setNomorTelepon($nomorTelepon) {
        $this->nomorTelepon = $nomorTelepon;
      }

      public function getNomorTelepon() {
        return $this->nomorTelepon;
      }
}
?>
