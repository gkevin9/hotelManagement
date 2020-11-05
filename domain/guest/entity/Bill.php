<?php
namespace domain\guest\entity;

Class Bill{
        private $amount;
        private $custStay;
        private $deskripsi;
        private $docno;
        private $quantity;

        public function setAmount($amount) {
          $this->amount =$amount;
        }

        public function getAmount() {
          return $this->amount;
        }

        public function setCustStay($custStay) {
          $this->custStay = $custStay;
        }

        public function getCustStay() {
          return $this->custStay;
        }

        public function setDeskripsi($deskripsi) {
          $this->deskripsi = $deskripsi;
        }

        public function getDeskripsi() {
          return $this->deskripsi;
        }

        public function setDocno($docno) {
          $this->docno = $docno;
        }

        public function getDocno() {
          return $this->docno;
        }

        public function setQuantity($quantity) {
          $this->quantity = $quantity;
        }

        public function getQuantity() {
          return $this->quantity;
        }
}
?>
