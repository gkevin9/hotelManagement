<?php
namespace domain\guest\entity;

Class Payment{
      private $docNo;
      private $jumlah;
      private $kasir;
      private $metode;
      private $tanggal;
      private $bill;

      public function setBill($bill) {
        $this->bill = $bill;
      }

      public function getBill() {
        return $this->bill;
      }

      public function setDocno($docno) {
        $this->docNo = $docno;
      }

      public function getDocno() {
        return $this->docNo;
      }

      public function setJumlah($jumlah) {
        $this->jumlah = $jumlah;
      }

      public function getJumlah() {
        return $this->jumlah;
      }

      public function setKasir($kasir) {
        $this->kasir = $kasir;
      }

      public function getKasir() {
        return $this->kasir;
      }

      public function setMetode($metode) {
        $this->metode = $metode;
      }

      public function getMetode() {
        return $this->metode;
      }

      public function setTanggal($tanggal) {
        $this->tanggal = $tanggal;
      }

      public function getTanggal() {
        return $this->tanggal;
      }
}
?>
