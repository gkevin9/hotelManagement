<?php
namespace domain\task\entity;
Class Schedule{
        private $hari;
        private $id;
        private $jam;
        private $lokasi;

        /**
         * Get the value of hari
         */
        public function getHari() {
                return $this->hari;
        }

        /**
         * Set the value of hari
         *
         * @return  self
         */
        public function setHari($hari) {
                $this->hari = $hari;
        }

        /**
         * Get the value of id
         */
        public function getId() {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */
        public function setId($id) {
                $this->id = $id;
        }

        /**
         * Get the value of jam
         */
        public function getJam() {
                return $this->jam;
        }

        /**
         * Set the value of jam
         *
         * @return  self
         */
        public function setJam($jam) {
                $this->jam = $jam;
        }

        /**
         * Get the value of lokasi
         */
        public function getLokasi() {
                return $this->lokasi;
        }

        /**
         * Set the value of lokasi
         *
         * @return  self
         */
        public function setLokasi($lokasi) {
                $this->lokasi = $lokasi;
        }
}
?>
