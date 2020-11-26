<?php
namespace domain\room\entity;
use JsonSerializable;
Class Kamar implements JsonSerializable{
        private $harga;
        private $jmlh_org;
        private $kategori;
        private $no_kamar;
        private $status;

        /**
         * Get the value of harga
         */
        public function getHarga() {
        return $this->harga;
        }

        /**
         * Set the value of harga
         *
         * @return  self
         */
        public function setHarga($harga) {
        $this->harga = $harga;
        }

        /**
         * Get the value of jmlh_org
         */
        public function getJmlhOrg() {
        return $this->jmlh_org;
        }

        /**
         * Set the value of jmlh_org
         *
         * @return  self
         */
        public function setJmlhOrg($jmlh_org) {
        $this->jmlh_org = $jmlh_org;
        }

        /**
         * Get the value of kategori
         */
        public function getKategori() {
        return $this->kategori;
        }

        /**
         * Set the value of kategori
         *
         * @return  self
         */
        public function setKategori($kategori) {
        $this->kategori = $kategori;
        }

        /**
         * Get the value of no_kamar
         */
        public function getNoKamar() {
        return $this->no_kamar;
        }

        /**
         * Set the value of no_kamar
         *
         * @return  self
         */
        public function setNoKamar($no_kamar) {
        $this->no_kamar = $no_kamar;

        }

        /**
         * Get the value of status
         */
        public function getStatus() {
        return $this->status;
        }

        /**
         * Set the value of status
         *
         * @return  self
         */
        public function setStatus($status) {
        $this->status = $status;

        }

        public function jsonSerialize()
        {
                return 
                [
                        'no_kamar' => $this->getNoKamar(),
                        'harga' => $this->getHarga(),
                        'jmlh_org' => $this->getJmlhOrg(),
                        'kategor' => $this->getKategori(),
                        'status' => $this->getStatus()
                ];
        }
}
?>
